<?php

namespace App\Http\Controllers;

use Anhoder\Matcher\BoyerMooreMatcher;
use App\Models\Jobs;

use App\Models\Category;


class JobController extends Controller
{

    public function index()
    {

        $search = strtolower(request('search'));


        // memeriksa apakah parameter search ada atau tidak
        if ($search) {


            // Mengambil waktu awal pencarian
            $startTime = microtime(true);
            //-----------------------------------------------------------------------------------------

            // $foundJobs = Jobs::where('title', 'LIKE', '%' . $search . '%')->latest()->get();

            // $jobs = Jobs::all(); // Ambil semua data dari tabel Jobs

            $jobs = Jobs::with(['category', 'company', 'author'])->latest()->get();

            $foundJobs = [];

            // Menggunakan algoritma Boyer-Moore untuk mencari kata dalam teks (judul lowongan kerja)
            $boyerMoore = new BoyerMooreMatcher($search);

            foreach ($jobs as $job) {
                $title = strtolower($job->title);

                if ($boyerMoore->match($title, \Anhoder\Matcher\BoyerMooreMatcher::MODE_ONLY_ONE)) {
                    $foundJobs[] = $job;
                }
            }

            //------------------------------------------------------------------------------------------------
            // Mengambil waktu akhir pencarian
            $endTime = microtime(true);

            $executionTimeInMilliseconds = ($endTime - $startTime) * 1000;

            // Menghitung selisih waktu pencarian dalam milidetik
            $executionTime = number_format($executionTimeInMilliseconds / 1000, 2);
        } else {
            // memeriksa jika parameter search tidak ada maka akan menampilkan semua lowongan kerja dengan paginasi
            $foundJobs = Jobs::with(['category', 'company', 'author'])->latest()->paginate(20);
            $executionTime = 0;
        }

        return view('job.index', [
            'jobs' => $foundJobs,
            'categories' => Category::all(),
            'search_job' => request('search'),
            'found_job' => count($foundJobs),
            'execution_time' => $executionTime
        ]);
    }



    public function show(Jobs $job)
    {
        return view('job.show', [
            'categories' => Category::all(),
            'job' => $job,
            'jobs' => Jobs::where('user_id', $job->author->id)->latest()->take(7)->get(),
        ]);
    }
}
