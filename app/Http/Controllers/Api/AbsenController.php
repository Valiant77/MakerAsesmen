<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
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
            'task' =>  'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('absens', 'public');
        }

        if (!in_array($data['kategori'], ['Pulang', 'Lembur'])) {
            $data['task'] = '-'
        }

        $absen = Absen::create($data);

        return response()->json(['message' => 'Absensi berhasil disimpan', 'data' => $absen], 201);
    }
}
