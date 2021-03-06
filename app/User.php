<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Model {

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public static function deleteUser($id) {
        $user = self::findOrFail($id);
        Storage::disk('public')->delete($user->image);
        self::destroy($id);
    }

    public static function getUsers() {
        return self::orderBy('name')->get();
    }

    public static function getUser($id) {
        return self::findOrFail($id);
    }

    public static function loginUser($request) {
        $user = self::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return false;
        }
        session([
            'name' => $user->name,
            'role' => $user->role_id,
            'id' => $user->id,
            'image' => $user->image,
        ]);
        return true;
    }

    public static function editUser($request, $id) {
        $user = self::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        if($user->id !=session('id')){
        $user->role_id = $request->role ?? 35;
        } else {
            session(['name'=>$request->name]);
        }
        if($request->image) {
            Storage::disk('public')->delete($user->image);
            $user->image = $request->image->store('images/users', 'public');
        }
        $user->save();
    }

    public static function store($request) {
        $user = new self();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $request->image->store('images/users','public');
        $user->role_id = $request->role ?? 35;
        $user->save();
    }

}
