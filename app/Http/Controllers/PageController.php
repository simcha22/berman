<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
class PageController extends Controller
{
    public function displayController($slug){
        $data['page'] = Page::getPageBySlug($slug);
        return view('PageTemplate',$data);
    }
}
