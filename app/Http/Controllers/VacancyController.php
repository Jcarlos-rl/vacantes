<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy, $slug)
    {
        $vacante = Vacancy::where('slug', $slug)->first();

        if($vacante == null){
            return abort(404);
        }else{
            return view('vacantes.show', compact('vacante'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }

    public function files(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $request->type.'_'.time().'.'.$file->extension();
        $fileDB = $this->saveFilesDB(['name' => $nameFile, 'type' => $request->type]);

        $file->move(public_path('storage/documents/'.$fileDB['user_id']), $nameFile);
        return response()->json([
            'status' => 200,
            'data' => $fileDB
        ]);
    }

    private function saveFilesDB($data)
    {
        return auth()->user()->documentos()->create([
            'name' => $data['name'],
            'type' => $data['type']
        ]);
    }

    public function getFileUser(Request $request){
        $file = Document::where('type', $request->type)->where('user_id', $request->id)->get();
        return $file;
    }

    public function deleteFile(Document $document){

        if(File::exists('storage/documents/'.auth()->user()->id.'/'.$document->name)){
            File::delete('storage/documents/'.auth()->user()->id.'/'.$document->name);
        }

        $document->delete();

        return response('Documento Eliminado', 200);
    }
}
