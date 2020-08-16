<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryEdit;
use App\Http\Requests\CategoryHandler;
use Illuminate\Http\Request;

class CategoryCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::getCategories();
        return view('admin.category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryHandler $request)
    {
        Category::store($request);
        return redirect('admin/categories')->with('status', 'הקטגוריה נוספה בהצלחה.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date['category'] = Category::getCategoryById($id);
        return view('admin.category.edit', $date);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEdit $request, $id){
        Category::updateCategory($id, $request);
        return redirect('admin/categories')->with('status', 'הקטגוריה עודכנה בהצלחה.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
