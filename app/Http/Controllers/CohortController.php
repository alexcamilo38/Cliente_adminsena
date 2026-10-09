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
    public function create()
    {
        $url = env('URL_SERVER_API');
        $offer = Http::get($url .'/offer/list')->json();
        return view('cohorts.create',compact('offer'));
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/cohorts/admin', $request->all());

        return redirect()->route('cohorts.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $cohorts = $this->fetchDataFromApi($url . '/cohorts/' . $id);
        $offers = $this->fetchDataFromApi($url . '/offer/' . $id);
        return view('cohorts.edit', compact('cohorts','offers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/cohorts/' . $id, $request->all());

        return redirect()->route('cohorts.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/cohorts/' . $id);
        return redirect()->route('cohorts.index');
    }
}
