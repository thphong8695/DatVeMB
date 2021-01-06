<?php

namespace App\Exports;

use App\DatVeMB;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class DatVeExport implements ShouldAutoSize,WithEvents, FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct(string $from,string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function view(): View
    {
        $datvemb = DatVeMB::WhereBetween('created_at', [$this->from,$this->to])->orWhereBetween('created_at', [$this->to,$this->from])->orderBy('updated_at','DESC')->get();
        return view('exports.datve',[    
                'datvemb' => $datvemb,  
                'from' => $this->from,
                'to' => $this->to,
            ]);
    }
    public function registerEvents(): array
    {

        return [
            AfterSheet::class    => function(AfterSheet $event) {
                

                $count = DatVeMB::WhereBetween('created_at', [$this->from,$this->to])->orWhereBetween('created_at', [$this->to,$this->from])->count();
                
                $sum = 15;
                $last = Coordinate::stringFromColumnIndex($sum);
                $c = $count + 4;
                $cellRange = 'A4:'.$last.'4';
                $cellRange3 = 'A1:V2';
                $cellRange2 = 'A1:'.$last.'1000';
                $event->sheet->getStyle('A1:'.$last.'' . $event->sheet->getHighestRow())
                ->getAlignment()->setWrapText(true); 
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                $event->sheet->getDelegate()->getStyle($cellRange3)->getFont()->setSize(17);
                $event->sheet->getColumnDimension('M')->setWidth(20);

                $event->sheet->getStyle($cellRange)->applyFromArray(
                    array(
                        'fill' => array(
                          'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => array('argb' => '87CEFA')
                        ),
                        'font' => array(
                            'name' => 'Times New Roman',
                            'bold' => true,
                        ),
                    )
                );
                $event->sheet->getStyle($cellRange2)->applyFromArray(
                    array(
                        'font' => array(
                            'name' => 'Times New Roman',
                        ),
                    )
                );
                $event->sheet->getStyle($cellRange3)->applyFromArray(
                    array(
                        'fill' => array(
                          
                            'color' => ['argb' => '000000'],
                        ),
                        'font' => array(
                            'name' => 'Times New Roman',
                            'bold' => true,
                        ),
                    )
                );
                $event->sheet->getStyle('A4:'.$last.''.$c.'')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->getStyle($cellRange)->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
                );
                $event->sheet->getStyle($cellRange3)->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
                );
                $event->sheet->getStyle($cellRange2)->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
                );

            },
        ];
    }
}
