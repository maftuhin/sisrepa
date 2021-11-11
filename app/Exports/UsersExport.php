<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize
{
    use Exportable;

    public function forRole(String $role)
    {
        $this->role = $role;
        return $this;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'NAMA',
            'SKPD',
            'ROLE',
            'EMAIL',
        ];
    }

    public function query()
    {
        return User::query()
            ->select("users.*", "skpd.skpd")
            ->join('skpd', 'skpd.id', 'users.skpd');
    }
}
