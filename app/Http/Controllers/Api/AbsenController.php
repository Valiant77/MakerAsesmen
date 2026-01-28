<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        // Logic to store attendance data
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'kategori' => 'required|string',
            'status' => 'required|string',
            'tanggal' => 'required|date',
            'alasan' => 'required|string',
            'photos' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        if ($request->HasFile('photos')) {
            $data['photos'] = $request->file('photos')->store('absens', 'public');
        }

        $absen = Absen::create($data);

        return response()->json(['message' => 'Absensi berhasil disimpan', 'data' => $absen], 201);
    }
}
