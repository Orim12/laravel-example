<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;

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
    $job = Job::create([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'employer_id' => 1,
    ]);

    // Stuur mail via de queue (voorbeeld e-mailadres)
    Mail::to('jeffrey@laracasts.com')->queue(new JobPosted($job));

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

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'first_name' => ['required', 'min:1'],
        'last_name' => ['required', 'min:1'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'confirmed', Password::min(6)],
    ]);
    $user = User::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);
    Auth::login($user);
    return redirect('/jobs');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/jobs');
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
});

Route::get('/test', function () {
    $job = \App\Models\Job::latest()->first() ?? \App\Models\Job::factory()->make();
    return new \App\Mail\JobPosted($job);
});

# api calls
Route::get('/foo', function () {
    return ['foo' => 'bar'];
});