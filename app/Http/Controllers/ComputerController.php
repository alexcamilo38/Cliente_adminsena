<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComputerController extends Controller
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
        $computer = $this->fetchDataFromApi($url . '/computer/list');

        return view('computer.index', compact('computer'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/computer/' . $id);

        return view('computer.show', compact('computer'));
    }
    
    public function create()
    {
        $url = env('URL_SERVER_API');
        $environments = Http::get($url .'/environment/list')->json();

        return view('computer.computador',compact('environments'));
    }

    public function model(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/computer/model', $request->all());

        return redirect()->route('computer.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->fetchDataFromApi($url . '/computer/' . $id);
        $environments = $this->fetchDataFromApi($url . '/environments/' . $id);
        return view('computer.edit', compact('computer','environments'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/computer/' . $id, $request->all());

        return redirect()->route('computer.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/computer/' . $id);
        return redirect()->route('computer.index');
    }
}
