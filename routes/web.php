<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

# web routes
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => Job::with('employer')->paginate(3)]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find((int)$id);

    if (!$job) {
        abort(404);
    }

    return view('job', ['job' => $job]);
});

# api calls
Route::get('/foo', function () {
    return ['foo' => 'bar'];
});