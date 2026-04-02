<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BeritaController extends Controller
{
    public function index()
    {
        $apiUrl = config('services.backend.url') . '/berita';
        
        try {
            $response = Http::get($apiUrl);
            $berita_list = $response->successful() ? $response->json() : [];
        } catch (\Exception $e) {
            $berita_list = [];
        }

        return view('user.berita', compact('berita_list'));
    }

    public function show($id)
    {
        $apiUrl = config('services.backend.url') . '/berita/' . $id;

        try {
            $response = Http::get($apiUrl);
            $berita = $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            $berita = null;
        }

        if (!$berita) {
            abort(404);
        }

        return view('user.berita-detail', compact('berita'));
    }
}
