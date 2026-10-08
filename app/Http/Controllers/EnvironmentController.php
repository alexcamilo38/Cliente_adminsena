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
}
