<?php

namespace App\Exports;

use App\Models\Skpd;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SKPDExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize
{
    use Exportable;
    public function headings(): array
    {
        return [
            'ID',
            'SKPD'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }

    public function query()
    {
        return Skpd::query()
            ->select('id', 'skpd');
    }
}
