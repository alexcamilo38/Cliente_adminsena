<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    //
     // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ;
    }

    public function index()
    {
        $url = env('URL_SERVER_API');$url = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url . '/teacher/list');

        return view('teacher.index', compact('teachers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/teacher/' . $id);

        return view('teacher.show', compact('teacher'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = Http::get($url .'/areas/list')->json();
        $training_centers  = Http::get($url .'/trainingcenter/list')->json();

        return view('teacher.registro',compact('areas','training_centers'));
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/teacher/admin', $request->all());

        return redirect()->route('teacher.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $teachers = $this->fetchDataFromApi($url . '/teacher/' . $id);
        $areas = $this->fetchDataFromApi($url . '/areas/' . $id);
        $training_centers = $this->fetchDataFromApi($url . '/trainingcenter/' . $id);
        return view('teacher.edit', compact('teachers','areas','training_centers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/teacher/' . $id, $request->all());

        return redirect()->route('teacher.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teacher/' . $id);
        return redirect()->route('teacher.index');
    }


}
