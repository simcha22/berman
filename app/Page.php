<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public static function getAll(){
        return self::orderBy('name')->get();
    }
}
                                                                                                    