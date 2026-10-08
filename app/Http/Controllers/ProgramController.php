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
}
