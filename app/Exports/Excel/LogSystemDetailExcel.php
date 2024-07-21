<?php

namespace App\Exports\Excel;

use App\Models\LogSystem;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LogSystemDetailExcel implements FromCollection, ShouldAutoSize, WithStyles, WithEvents
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = LogSystem::query()->where('id', $this->request->id)->with('user');

        return $query->get();
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:A12')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
            ],
        ]);

        $sheet->getStyle('B1:B12')->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
            ],
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $data = $this->collection()->first();
                $headings = [
                    'ID',
                    'User ID',
                    'User Name',
                    'IP Address',
                    'Device',
                    'Browser Name',
                    'Browser Version',
                    'Module',
                    'Action',
                    'Data ID',
                    'Data',
                    'Created At',
                ];

                $mappedData = [
                    $data->id,
                    $data->user_id,
                    $data->user->name,
                    $data->ip_address,
                    $data->device,
                    $data->browser_name,
                    $data->browser_version,
                    $data->module,
                    $data->action,
                    $data->data_id,
                    $data->data,
                    $data->created_at,
                ];

                foreach ($headings as $index => $heading) {
                    $row = $index + 1;
                    $sheet->setCellValue("A{$row}", $heading);
                    $sheet->setCellValue("B{$row}", $mappedData[$index]);
                }

                // Remove any extraneous data in columns C to L
                $lastColumn = $sheet->getHighestColumn();
                $lastRow = $sheet->getHighestRow();

                for ($col = ord('C'); $col <= ord($lastColumn); $col++) {
                    for ($row = 1; $row <= $lastRow; $row++) {
                        $sheet->setCellValue(chr($col) . $row, '');
                    }
                }

                foreach ($headings as $index => $heading) {
                    $row = $index + 1;
                    $sheet->getStyle("A{$row}:B{$row}")->applyFromArray([
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                    ]);
                }
            }
        ];
    }
}
