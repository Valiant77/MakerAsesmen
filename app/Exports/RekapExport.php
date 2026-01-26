<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $userId;

    public function __construct($id)
    {
        $this->userId = $id;
    }
    
    public function collection()
    {
        return Absen::where('user_id', $this->userId)
        ->where('status', 'Diterima')
        ->orderBy('created_at', 'asc')
        ->get(['created_at', 'kategori', 'alasan']);
    }

    public function headings(): array
    {
        return [
            'Tanggal dan Jam',
            'Kategori',
            'Alasan',
        ];
    }
}
