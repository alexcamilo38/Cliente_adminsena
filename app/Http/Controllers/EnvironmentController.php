<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnvironmentController extends Controller
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
        $environments = $this->fetchDataFromApi($url . '/environment/list');

        return view('environments.index', compact('environments'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $environment = $this->fetchDataFromApi($url . '/environment/' . $id);

        return view('environments.show', compact('environment'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $training_centers  = Http::get($url .'/trainingcenter/list')->json();
        return view('environments.create',compact('training_centers'));
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/environment/admin', $request->all());

        return redirect()->route('environments.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $environments = $this->fetchDataFromApi($url . '/environment/' . $id);
        $training_centers = $this->fetchDataFromApi($url . '/trainingcenter/' . $id);
        return view('environments.edit', compact('environments','training_centers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/environment/' . $id, $request->all());

        return redirect()->route('environments.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/environment/' . $id);
        return redirect()->route('environments.index');
    }
}
