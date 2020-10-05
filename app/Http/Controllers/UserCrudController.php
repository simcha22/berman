<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserSignup;

class UserCrudController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['users'] = User::getUsers();
        return view('admin.user.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['roles'] = Role::getAll();
        return view('admin.user.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSignup $request) {
        User::store($request);
        return redirect('admin/users')->with('status', 'המשתמש נוסף בהצלחה');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['user'] = User::getUser($id);
        $data['roles'] = Role::getAll();
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSignup $request, $id) {
        User::editUser($request, $id);
        return redirect('admin/users')->with('status', 'המשתמש עודכן בהצלחה');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if ($id == session('id')) {
            return redirect('admin/users')->with('status-fail', 'שגיאה לא ניתן למחוק משתמש זה');
        }
        User::deleteUser($id);
        return redirect('admin/users')->with('status', 'המשתמש נמחק בהצלחה!!');
    }

}
