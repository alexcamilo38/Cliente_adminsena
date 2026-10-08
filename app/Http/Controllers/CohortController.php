<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CohortController extends Controller
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
        $cohorts = $this->fetchDataFromApi($url . '/cohorts/list');

        return view('cohorts.index', compact('cohorts'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $cohort = $this->fetchDataFromApi($url . '/cohorts/' . $id);

        return view('cohorts.show', compact('cohort'));
    }
}
