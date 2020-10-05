<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public static function store($request){
        $page = new self();
        
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->save();
    }
    public static function getAll(){
        return self::orderBy('name')->get();
    }
}
                                                                                                    