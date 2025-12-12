<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
  public function index(Job $jobs)
  {
    $jobs = Job::with('employer')->latest()->paginate(3);

    return view('jobs.index', [
      'jobs' => $jobs
    ]);
  }

  public function create()
  {
    return view('jobs.create');
  }

  public function show(Job $job)
  {
    return view('jobs.show', [
      'job' => $job
    ]);
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required|min:3',
      'salary' => 'required'
    ]);
    Job::create([...$data, 'employer_id' => 1]);
    return redirect()->route('job.index');
  }

  public function edit(Job $job)
  {
    if (Auth::guest()) {
      return redirect()->route('session.login');
    }

    dd($job->employer);

    if ($job->employer()->user->isNot(Auth::user())) {
      abort(403);
    }

    return view('jobs.edit', [
      'job' => $job
    ]);
  }

  public function update(Job $job, Request $request)
  {
    $data = $request->validate([
      'title' => 'required|min:3',
      'salary' => 'required'
    ]);

    $job->update($data);

    return redirect()->route('job.show', $job);
  }

  public function destroy(Job $job)
  {
    $job->delete();
    return redirect()->route('job.index');
  }
}
