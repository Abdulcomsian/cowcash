<?php


namespace App\Utils;

use App\Models\UserCows;
use Illuminate\Support\Facades\File;
use Auth;

class HelperFunctions
{
    public static function saveFile($oldFile = null, $newFile, $filePath)
    {
        try {
            $public_path = public_path($filePath);
            File::isDirectory($public_path) or File::makeDirectory($public_path, 0777, true, true);
            if ($oldFile) {
                @unlink($oldFile);
            }
            $filename = date('YmdHi_') . $newFile->getClientOriginalName();
            $newFile->move($public_path, $filename);

            return $filePath . $filename;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public static function profileImagePath()
    {
        return 'uploads/profile_images/';
    }

    public static function CowsImagePath()
    {
        return 'uploads/cowImages/';
    }

    public static function boughtcows($cowid)
    {
        if (Auth::check()) {
            $boghtcows = UserCows::where(['cow_id' => $cowid, 'user_id' => Auth::user()->id])->first();
            if ($boghtcows) {
                return $boghtcows->qty;
            } else {
                return 0;
            }
        }
    }
}
