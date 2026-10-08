<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnnouncementController extends Controller
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
        $announcements = $this->fetchDataFromApi($url . '/announcements/list');

        return view('announcements.index', compact('announcements'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $announcement = $this->fetchDataFromApi($url . '/announcements/' . $id);

        return view('announcements.show', compact('announcement'));
    }

    
}
