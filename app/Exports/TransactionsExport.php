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

    public function config(String $role, $skpd)
    {
        $this->role = $role;
        $this->skpd = $skpd;
        return $this;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:C2');
        $sheet->mergeCells('D1:E1');
        $sheet->mergeCells('F1:G1');
        $sheet->mergeCells('H1:H2');
        $sheet->mergeCells('I1:I2');
        $sheet->mergeCells('J1:L1');
        $sheet->mergeCells('M1:O1');
        $sheet->mergeCells('P1:R1');
        $sheet->mergeCells('S1:U1');
        $sheet->mergeCells('V1:X1');
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
                'NO URUT ',
                'JENIS TRX',
                'SKPD',
                'SPM/SPD',
                '',
                'SP2D',
                '',
                'URAIAN TRANSAKSI',
                'NILAI TRANSAKSI',
                'PPN',
                '',
                '',
                'PPH21',
                '',
                '',
                'PPH22',
                '',
                '',
                'PPH23',
                '',
                '',
                'PPHFIN',
                '',
                '',
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
                '',
                'Jenis',
                'Jumlah',
                'NTPN',
                // pph21
                'Jenis',
                'Jumlah',
                'NTPN',
                // pph22
                'Jenis',
                'Jumlah',
                'NTPN',
                // pph23
                'Jenis',
                'Jumlah',
                'NTPN',
                // pphfin
                'Jenis',
                'Jumlah',
                'NTPN',
            ],
        ];
    }

    public function query()
    {
        $data = Transaction::query()
            ->select(
                'no_urut',
                'trx',
                'skpd',
                'nomor_spd',
                'nilai_spd',
                'nomor_sp2d',
                'nilai_sp2d',
                'uraian_transaksi',
                'nilai_transaksi',
                'ppn_jenis',
                'ppn_jumlah',
                'ppn_ntpn',
                'pph21_jenis',
                'pph21_jumlah',
                'pph21_ntpn',
                'pph22_jenis',
                'pph22_jumlah',
                'pph22_ntpn',
                'pph23_jenis',
                'pph23_jumlah',
                'pph23_ntpn',
                'pphfin_jenis',
                'pphfin_jumlah',
                'pphfin_ntpn',
            )
            ->join('skpd', 'skpd.id', 'transactions.skpd_id');
        if ($this->role != 'admin') {
            $data->where('skpd_id', $this->skpd);
        }
        return $data;
    }
}
