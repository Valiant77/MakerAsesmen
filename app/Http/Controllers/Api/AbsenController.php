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
            'alasan' => 'nullable|string',
        ]);

        if ($request->HasFile('photos')) {
            $data['photos'] = $request->file('photos')->store('photos', 'public');
        }

        $absen = Absen::create($data);

        return response()->json(['message' => 'Absensi berhasil disimpan', 'data' => $absen], 201);
    }
}
