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

    public function create()
    {
        $url = env('URL_SERVER_API');
        $programs = Http::get($url .'/program/list')->json();
        return view('offers.create',compact('programs'));
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/offer/admin', $request->all());

        return redirect()->route('offers.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $offers = $this->fetchDataFromApi($url . '/offer/' . $id);
        $programs = $this->fetchDataFromApi($url . '/program/' . $id);
        return view('offers.edit', compact('offers','programs'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/offer/' . $id, $request->all());

        return redirect()->route('offers.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/offer/' . $id);
        return redirect()->route('offers.index');
    }
}
