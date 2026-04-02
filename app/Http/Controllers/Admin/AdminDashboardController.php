<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $apiUrl = config('services.backend.url') . '/admin/stats';
        $adminToken = 'admin-secret-token-12345'; // Matching backend middleware

        try {
            $response = Http::withHeaders([
                'X-Admin-Token' => $adminToken
            ])->get($apiUrl);

            $stats = $response->successful() ? $response->json() : [
                'total_pendaftar' => 0,
                'terverifikasi' => 0,
                'pending' => 0,
                'ditolak' => 0
            ];
        } catch (\Exception $e) {
            $stats = [
                'total_pendaftar' => 0,
                'terverifikasi' => 0,
                'pending' => 0,
                'ditolak' => 0
            ];
        }

        return view('admin.dashboard', compact('stats'));
    }
}
