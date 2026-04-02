<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminPpdbController extends Controller
{
    protected $adminToken = 'admin-secret-token-12345';

    protected function getApiUrl($path = '')
    {
        return config('services.backend.url') . $path;
    }

    public function index()
    {
        try {
            $response = Http::withHeaders([
                'X-Admin-Token' => $this->adminToken
            ])->get($this->getApiUrl('/admin/pendaftar'));

            $pendaftar_list = $response->successful() ? $response->json()['data'] : [];
        } catch (\Exception $e) {
            $pendaftar_list = [];
        }

        return view('admin.ppdb.index', compact('pendaftar_list'));
    }

    public function show($id)
    {
        try {
            $response = Http::withHeaders([
                'X-Admin-Token' => $this->adminToken
            ])->get($this->getApiUrl("/admin/pendaftar/{$id}"));

            $pendaftar = $response->successful() ? $response->json()['data'] : null;
        } catch (\Exception $e) {
            $pendaftar = null;
        }

        if (!$pendaftar) return abort(404);

        return view('admin.ppdb.detail-1', compact('pendaftar'));
    }

    public function showNext($id)
    {
        try {
            $response = Http::withHeaders([
                'X-Admin-Token' => $this->adminToken
            ])->get($this->getApiUrl("/admin/pendaftar/{$id}"));

            $pendaftar = $response->successful() ? $response->json()['data'] : null;
        } catch (\Exception $e) {
            $pendaftar = null;
        }

        if (!$pendaftar) return abort(404);

        return view('admin.ppdb.detail-2', compact('pendaftar'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $response = Http::withHeaders([
                'X-Admin-Token' => $this->adminToken
            ])->put($this->getApiUrl("/admin/pendaftar/{$id}/status"), [
                'status' => $request->status
            ]);

            return response()->json($response->json());
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghubungi backend.'], 500);
        }
    }

    public function daftarSiswa()
    {
        try {
            $response = Http::withHeaders([
                'X-Admin-Token' => $this->adminToken
            ])->get($this->getApiUrl('/admin/pendaftar'), [
                'status' => 'Terverifikasi'
            ]);

            $students = $response->successful() ? $response->json()['data'] : [];
        } catch (\Exception $e) {
            $students = [];
        }

        return view('admin.daftar-siswa', compact('students'));
    }
}
