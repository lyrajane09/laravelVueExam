<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRole;
use App\User;

class AdminController extends Controller
{
   /**
    * @return dashboard
    */
    public function index(){
        return response()->json([]);
    }

    /**
     * @return roles
     */
    public function roles(){
        return response()->json(['roles' => UserRole::all()]);
    }

    /**
     * @return users
     */
    public function users(){
        return response()->json(['users' => User::with('user_role')->get(), 'roles' => UserRole::all()]);
    }

    /**
     * @description add role
     */
    public function addRole(Request $request){
        UserRole::create([
            'display_name' => $request->name,
            'description'  => $request->description
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * @description add user
     */
    public function addUser(Request $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);
        return response()->json(['success' => true]);
    }
}
