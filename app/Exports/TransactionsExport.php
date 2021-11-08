<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionsExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize
{
    use Exportable;

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            2 => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            [
                "-",
                "-",
                '-',
                'SPM/SPD',
                '-',
                'SP2D',
                '-',
                '-',
                '-'
            ],
            [
                'NO URUT',
                'JENIS TRX',
                'SKPD',
                'NOMOR',
                'NILAI BELANJA',
                'NOMOR',
                'NILAI BELANJA',
                'URAIAN TRANSAKSI',
                'NILAI TRANSAKSI'
            ],
        ];
    }

    public function query()
    {
        return Transaction::query()
            ->select('no_urut', 'trx', 'skpd', 'nomor_spd', 'nilai_spd', 'nomor_sp2d', 'nilai_sp2d', 'uraian_transaksi', 'nilai_transaksi')
            ->join('skpd', 'skpd.id', 'transactions.skpd_id');
    }
}
