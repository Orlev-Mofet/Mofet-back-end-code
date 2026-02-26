<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Collection;

class UsersExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $data;


    public function __construct(Collection $data)
    {
        $this->data = $data->map(function ($item, $index) {
            $dataItem = array();
            $dataItem['number']             = $index + 1;
            $dataItem['country_code']       = $item->country_code;
            $dataItem['phone_code']         = $item->phone_code;
            $dataItem['phone_number']       = $item->phone_number;
            $dataItem['first_name']         = $item->first_name;
            $dataItem['surname']            = $item->surname;
            $dataItem['year_of_birth']      = $item->year_of_birth;
            $dataItem['city']               = $item->city;
            $dataItem['gender']             = $item->gender;
            $dataItem['grade']              = $item->grade;
            $dataItem['field_of_interest']  = $item->field_of_interest;
            return $dataItem;
        });
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }


    public function headings(): array
    {
        // Define the headings
        return [
            "Number",
            "Country Code", 
            "Phone Code", 
            "Phone Number", 
            "First Name", 
            "Surname",
            "Year Of Birth", 
            "City",
            "Gender",
            "Grade",
            "Field Of Interest", 
        ];
    }
}
