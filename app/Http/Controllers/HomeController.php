<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Postulant;
use App\Models\Vacancy;
use App\Mail\AcceptMail;

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

    public function postulant()
    {
        $user = auth()->user();
        $postulant =  Postulant::where('user_id', auth()->user()->id)->first();
        $vacancy = null;

        if($postulant){
            $vacancy = Vacancy::where('id', $postulant->vacancy_id)->first();
        }

        return view('user.postulant', compact('user', 'postulant', 'vacancy'));
    }

    public function postulantUpdate(Request $request)
    {
        $postulant = Postulant::find($request->id);

        $data = [
            'vacancy' => $postulant->vacancy->name,
            'name'    => $postulant->user->name
        ];

        if($request->status){
            $postulant->level = $request->level+1;
            $postulant->save();
            $data['text'] = 'Felicidades!, pasaste a la siguente etapa. A la brevedad te mandaremos la información para tu examen de conocimientos.';
        }else{
            $postulant->status = false;
            $postulant->save();

            $data['text'] = 'Lo sentimos, pero hubo problemas con tu documentación adjunta. Por esta razón se te rechazo la postulación.';

        }

        Mail::to($postulant->user->email)->send(new AcceptMail($data));

        return $postulant;

    }
}
