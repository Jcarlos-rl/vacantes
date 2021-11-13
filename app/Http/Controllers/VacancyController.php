<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Document;
use App\Models\Postulant;
use Illuminate\Support\Str;
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
        $vacantes = Vacancy::all();
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('vacantes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $data = $request->validate([
            'nombre'      => 'required',
            'categoria'   => 'required',
            'folio'       => 'required',
            'descripcion' => 'required'
        ]);

        Vacancy::create([
            'name' => $data['nombre'],
            'category_id' => $data['categoria'],
            'folio' => $data['folio'],
            'descripcion' => $data['descripcion'],
            'slug'  => Str::slug($data['nombre']),
            'acta'  => (isset($request->acta)) ? true:false,
            'ine'   => (isset($request->ine)) ? true:false,
            'cv'  => (isset($request->cv)) ? true:false,
            'ced_prof'  => (isset($request->ced_prof)) ? true:false,
            'ced_esp'  => (isset($request->ced_esp)) ? true:false,
            'doc_migr'  => (isset($request->doc_migr)) ? true:false,
            'cert_med'  => (isset($request->cert_med)) ? true:false,
            'cert_prep'  => (isset($request->cert_prep)) ? true:false,
            'cert_prep_tec'  => (isset($request->cert_prep_tec)) ? true:false,
            'curp'  => (isset($request->curp)) ? true:false,
            'licencia_manejo'  => (isset($request->licencia_manejo)) ? true:false,
            'comprobante_domicilio'  => (isset($request->comprobante_domicilio)) ? true:false,
        ]);

        return redirect()->action([VacancyController::class, 'index']);
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
        $postulant =  Postulant::where('user_id', auth()->user()->id)->first();

        if($vacante == null){
            return abort(404);
        }else{
            return view('vacantes.show', compact('vacante', 'postulant'));
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
        return 'edit';
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

    public function subscribeVacancy(Request $request){

        Postulant::create([
            'vacancy_id' => $request->vacante_id,
            'user_id'  => $request->id
        ]);

        return response()->json([
            'status' => 200,
            'data' => true
        ]);
    }
}
