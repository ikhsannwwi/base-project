<?php

namespace App\Exports\Excel;

use App\Models\LogSystem;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LogSystemExcel implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = LogSystem::query()->with('user');

        if (isset($this->request->date) || isset($this->request->user) || isset($this->request->module)) {
            if (!empty($this->request->date)) {
                $dateRange = explode(' to ', $this->request->date);
                if (count($dateRange) === 2) {
                    $dateStart = $dateRange[0];
                    $dateEnd = $dateRange[1];
                    $query->whereBetween('created_at', [$dateStart, $dateEnd]);
                }
            }
            
            if ($this->request->user != "") {
                $userid = $this->request->user;
                $query->where("user_id", $userid);
            }
            
            if ($this->request->module != "") {
                $moduleid = $this->request->module;
                $module = Module::select('identifier')->where('id', $moduleid)->first();
                $query->where("module", $module->identifier);
            }
        }

        $data = $query->get();

        // Add a sequential ID to each item
        $data->transform(function ($item, $key) {
            $item->no = $key + 1; // Adding sequential ID
            return $item;
        });

        return $data;
    }

    public function headings(): array
    {
        $headers = [
            'No',
            'User',
            'Module',
            'Action',
            'DateTime',
        ];

        return $headers;
    }


    public function map($row): array
    {
        $mappedColumns = [
            $this->getRowIndex(),
            $row->user->name,
            $row->module,
            $row->action,
            $row->created_at,
        ];

        return $mappedColumns;
    }

    private $rowIndex = 0;

    public function getRowIndex()
    {
        return ++$this->rowIndex;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => '000000'],
            ],
        ]);

        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle("A2:E{$lastRow}")->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
            ],
        ]);
    }
}
