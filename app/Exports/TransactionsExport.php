<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TransactionsExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, WithTitle, WithEvents
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function query()
    {
        $query = Transaction::query();

        if ($this->start_date) {
            $query->where('date', '>=', $this->start_date);
        }

        if ($this->end_date) {
            $query->where('date', '<=', $this->end_date);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Obat Keluar',
            'Tanggal Keluar',
            'Kode Obat',
            'Nama Obat',
            'Jumlah Obat Keluar',
            'Keterangan',
        ];
    }

    public function map($transaction): array
    {
        return [
            // Ensure the data maps correctly to the headings
            $transaction->id, // or another field that represents 'No'
            $transaction->code_transaction,
            $transaction->date,
            $transaction->drug->code,
            $transaction->drug->medicine->name,
            $transaction->quantity_sell,
            $transaction->description,
        ];
    }

    public function startCell(): string
    {
        return 'A6';
    }

    public function title(): string
    {
        return 'Laporan Obat Keluar';
    }

    public function registerEvents(): array
    {
        $start_date = $this->start_date ? $this->start_date : 'Tidak Ditentukan';
        $end_date = $this->end_date ? $this->end_date : 'Tidak Ditentukan';

        return [
            AfterSheet::class => function (AfterSheet $event) use ($start_date, $end_date) {
                $sheet = $event->sheet->getDelegate();
                $sheet->mergeCells('A1:H1');
                $sheet->setCellValue('A1', 'APOTIK SANIKA JAMBI');
                $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $sheet->mergeCells('A2:H2');
                $sheet->setCellValue('A2', 'LAPORAN OBAT KELUAR');
                $sheet->getStyle('A2')->getFont()->setSize(14)->setBold(true);
                $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $sheet->mergeCells('A3:H3');
                $sheet->setCellValue('A3', 'Jl. RB. Siagian No.19, Pasir Putih, Kec. Jambi Sel., Kota Jambi, Jambi 36129, No.Telpon : 0852-6893-9186');
                $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $sheet->mergeCells('A4:H4');
                $sheet->setCellValue('A4', "Periode: $start_date - $end_date");
                $sheet->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // Add Logo
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Logo');
                $drawing->setPath(public_path('/assets/img/logo/sanika3.png')); // Change path to your logo
                $drawing->setHeight(50);
                $drawing->setCoordinates('A1');
                $drawing->setOffsetX(10);
                $drawing->setWorksheet($sheet);
            },
        ];
    }
}
