<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApprenticeController extends Controller
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
        $apprentices = $this->fetchDataFromApi($url . '/apprentice/list');

        return view('apprentice.index', compact('apprentices'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $apprentices = $this->fetchDataFromApi($url . '/apprentice/' . $id);

        return view('apprentice.show', compact('apprentices'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $courses  = Http::get($url .'/course/list')->json();
        $computers  = Http::get($url .'/computer/list')->json();
        return view('apprentice.registro',compact('courses','computers'));
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/apprentice/admin', $request->all());

        return redirect()->route('apprentice.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $apprentices = $this->fetchDataFromApi($url . '/apprentice/' . $id);
        $courses = $this->fetchDataFromApi($url . '/course/' . $id);
        $computers = $this->fetchDataFromApi($url . '/computer/' . $id);
        return view('apprentice.edit', compact('apprentices','courses','computers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/apprentice/' . $id, $request->all());

        return redirect()->route('apprentice.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/apprentice/' . $id);
        return redirect()->route('apprentice.index');
    }
}
