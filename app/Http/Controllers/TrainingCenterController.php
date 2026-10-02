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
        $Training_centers = $this->fetchDataFromApi($url . '/trainingcenters/list');

        return view('trainingcenters.index', compact('Training_centers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $Training_centers = $this->fetchDataFromApi($url . '/trainingcenters/' . $id);

        return view('trainingcenters.show', compact('Training_centers'));
    }
}
