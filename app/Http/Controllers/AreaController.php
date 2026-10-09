<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
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
        $areas = $this->fetchDataFromApi($url . '/areas/list');

        return view('areas.index', compact('areas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('areas.show', compact('areas'));
    }

     public function create()
    {
        return view('areas.create');
    }

    public function salida(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/areas/store', $request->all());

        return redirect()->route('areas.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $areas = $this->fetchDataFromApi($url . '/areas/' . $id);
        return view('areas.edit', compact('areas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/areas/' . $id, $request->all());

        return redirect()->route('areas.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/areas/' . $id);
        return redirect()->route('areas.index');
    }
   
}
