<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
  public function create()
  {
    return view('auth.login');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);

    if (!Auth::attempt($data)) {
      throw ValidationException::withMessages([
        'email' => 'Wrong email',
        'password' => 'Wrong password'
      ]);
    }

    $request->session()->regenerate();

    return redirect()->route('job.index');
  }

  public function destroy()
  {
    Auth::logout();

    return redirect()->route('home');
  }
}
