<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $userList;

    function __construct($user){
        $this->userList = $user;
    }

    public function headings():array{
        return [
            'name',
            'email'
        ];
    }


    public function collection()
    {
        return collect($this->userList);
    }
}
