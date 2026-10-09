<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
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
        $Training_centers = $this->fetchDataFromApi($url . '/trainingcenter/list');

        return view('trainingcenters.index', compact('Training_centers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $Training_centers = $this->fetchDataFromApi($url . '/trainingcenter/' . $id);

        return view('trainingcenters.show', compact('Training_centers'));
    }

    public function registro()
    {
        return view('trainingcenters.registrar');
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/trainingcenter/dato', $request->all());

        return redirect()->route('trainingcenters.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $Training_centers = $this->fetchDataFromApi($url . '/trainingcenter/' . $id);
        return view('trainingcenters.edit', compact('Training_centers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/trainingcenter/' . $id, $request->all());

        return redirect()->route('trainingcenters.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/trainingcenter/' . $id);
        return redirect()->route('trainingcenters.index');
    }
}
