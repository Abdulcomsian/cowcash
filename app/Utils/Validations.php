<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class Validations
{
    //store Package
    public static function storePackages($request)
    {
        $request->validate([
            'Pkgname' => ['required', 'string', 'max:255'],
            'amount' => ['required'],
            'coins_to_get' => ['required', 'integer']
        ]);
    }

    public static function updateUserPassword($request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'oldpassword' => ['required', 'string', 'min:8'],
        ]);
    }
}
