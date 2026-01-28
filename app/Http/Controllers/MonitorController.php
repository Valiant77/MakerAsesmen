<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;

class MonitorController extends Controller
{
    public function show()
    {
        $admin = User::findOrFail(auth()->user()->id);
        $amount = Absen::where('status', 'Menunggu')->count();
        $message = 'Halaman ini berisi pengawasan aktivitas pengguna secara real-time.';
        $users = User::where('role', 'user')->get();
        
        $absens = Absen::where('status', 'Diterima')
        ->whereIn('kategori', ['Hadir', 'Telat', 'Hadir Telat'])->whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')->from('absens')->where('status', 'Diterima')->whereIn('kategori', ['Hadir', 'Telat', 'Hadir Telat'])->groupBy('user_id');
    })->whereIn('user_id', $users->pluck('id'))->orderBy('created_at', 'desc')->get();


        return view('monitoring', compact('admin', 'amount', 'message', 'users', 'absens'));
    }
}
