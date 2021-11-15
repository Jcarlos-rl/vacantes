<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile()
    {
        $user = auth()->user();
        $postulant =  Postulant::where('user_id', auth()->user()->id)->first();
        return view('user.profile', compact('user', 'postulant'));
    }
}
