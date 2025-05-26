<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Http\Request;

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

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function (Request $request) {
    $validated = $request->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    Job::create([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'employer_id' => 1,
    ]);
    return redirect('/jobs');
});

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => Job::with('employer')->paginate(3)]);
});

Route::get('/jobs/{job}', function (Job $job) {
    return view('job', ['job' => $job]);
});

Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

Route::patch('/jobs/{job}', function (Request $request, Job $job) {
    $request->validate([
        'title' => 'required|min:3',
        'salary' => 'required',
    ]);

    $job->update([
        'title' => $request->input('title'),
        'salary' => $request->input('salary'),
    ]);

    return redirect("/jobs/{$job->id}");
});

Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();

    return redirect('/jobs');
});

# api calls
Route::get('/foo', function () {
    return ['foo' => 'bar'];
});