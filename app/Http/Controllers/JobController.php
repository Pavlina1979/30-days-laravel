<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
  public function index(Job $jobs)
  {
    $jobs = Job::with('employer')->latest()->paginate(8);

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
