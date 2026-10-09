<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
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
        $courses = $this->fetchDataFromApi($url . '/course/list');

        return view('course.index', compact('courses'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $course = $this->fetchDataFromApi($url . '/course/' . $id);

        return view('course.show', compact('course'));
    }
    
    public function create()
    {
        $url = env('URL_SERVER_API');
        $training_centers  = Http::get($url .'/trainingcenter/list')->json();
        $cohorts  = Http::get($url .'/cohorts/list')->json();
        $environments  = Http::get($url .'/environment/list')->json();
        return view('course.registro',compact('training_centers','cohorts','environments'));
    }

    public function dato(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/course/admin', $request->all());

        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/course/' . $id);
        $training_centers = $this->fetchDataFromApi($url . '/trainingcenter/' . $id);
        $cohorts = $this->fetchDataFromApi($url . '/cohorts/' . $id);
        $environments = $this->fetchDataFromApi($url . '/environment/' . $id);
        return view('course.edit', compact('courses','training_centers','cohorts','environments'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/course/' . $id, $request->all());

        return redirect()->route('course.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/course/' . $id);
        return redirect()->route('course.index');
    }
}
