<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OfferController extends Controller
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
        $offers = $this->fetchDataFromApi($url . '/offer/list');

        return view('offers.index', compact('offers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $offer = $this->fetchDataFromApi($url . '/offer/' . $id);

        return view('offers.show', compact('offer'));
    }
}
