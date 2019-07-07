<?php


namespace App\Imports;


use App\Contact;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ContactImport implements ToModel, WithHeadingRow, WithValidation
{

    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        return Contact::create([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'department' => $row['department'],
            'phone_number_work' => $row['phone_number_work'],
            'phone_number_home' => $row['phone_number_home'],
            'phone_number_cell' => $row['phone_number_cell'],
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'phone_number_work' => 'required|numeric',
        ];
    }
}