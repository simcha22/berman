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
    public static function editPage($request){
        $page =self::findOrFail($request->page);

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->save();
    }
    public static function getAll(){
        return self::orderBy('name')->get();
    }
    public static function getPageBySlug($slug){
        return self::where('slug', $slug)->firstOrFail();
    }
    public static function getPageById($id){
        return self::findOrFail($id);
    }
    public static function deletePage($id){
        self::destroy($id);
    }
}
