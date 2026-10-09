<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProgramController extends Controller
{
     // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ;
    }

    public function index()
    {
        $url = env('URL_SERVER_API');$url = env('URL_SERVER_API');
        $programs = $this->fetchDataFromApi($url . '/program/list');

        return view('programs.index', compact('programs'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $program = $this->fetchDataFromApi($url . '/program/' . $id);

        return view('programs.show', compact('program'));
    }

     public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = Http::get($url .'/areas/list')->json();
        return view('programs.create',compact('areas'));
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/program/admin', $request->all());

        return redirect()->route('programs.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $program = $this->fetchDataFromApi($url . '/program/' . $id);
        $areas = $this->fetchDataFromApi($url . '/areas/' . $id);
        return view('programs.edit', compact('program','areas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/program/' . $id, $request->all());

        return redirect()->route('programs.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/program/' . $id);
        return redirect()->route('programs.index');
    }
}
