<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class UsersExport implements FromCollection, WithHeadings,WithEvents
{
    use Exportable, RegistersEventListeners;
    public function registerEvents(): array
    {
        return [
            BeforeExport::class  => function(BeforeExport $event) {
                $event->writer->setCreator('Patrick');
            },
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getDelegate()->setRightToLeft(true);
                $event->sheet->styleCells(
                'B1:D1',
                [
                    //Set border Style
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'EB2B02'],
                        ],

                    ],

                    //Set font style
                    'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                        'bold'      =>  true,
                        'color' => ['argb' => 'EB2B02'],
                    ],

                    //Set background style
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => 'dff0d8',
                         ]
                    ],

                ]
            );
            },
        ];
    }

    public function headings(): array {
        return ['Name','Roll NO'];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
