<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function getCategories(){
        $categories = self::all();
        return $categories;
    }
}
