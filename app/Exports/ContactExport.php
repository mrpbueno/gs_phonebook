<?php

namespace App\Exports;

use App\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ContactExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    /**
    * @return Collection
    */
    public function collection()
    {
        return Contact::all(
            'first_name',
            'last_name',
            'department',
            'phone_number_work',
            'phone_number_home',
            'phone_number_cell'
        );
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'first_name',
            'last_name',
            'department',
            'phone_number_work',
            'phone_number_home',
            'phone_number_cell'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
