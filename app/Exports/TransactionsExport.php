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
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:C2');
        $sheet->mergeCells('D1:E1');
        $sheet->mergeCells('F1:G1');
        $sheet->mergeCells('H1:H2');
        $sheet->mergeCells('I1:I2');
        return [
            1 => ['font' => ['bold' => true], ['alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            ]]],
            2 => ['font' => ['bold' => true], ['alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            ]]],
        ];
    }

    public function headings(): array
    {
        return [
            [
                'NO URUT',
                'JENIS TRX',
                'SKPD',
                'SPM/SPD',
                '',
                'SP2D',
                '',
                'URAIAN TRANSAKSI',
                'NILAI TRANSAKSI'
            ],
            [
                '',
                '',
                '',
                'NOMOR',
                'NILAI BELANJA',
                'NOMOR',
                'NILAI BELANJA',
                '',
                ''
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
