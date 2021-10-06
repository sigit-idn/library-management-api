<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function get() {
        return response()->json([
            "message" => "Get users successfully",
            "data" => User::all()
        ]);
    }

    function getOne($id) {
        return response()->json([
            "message" => "Get user data successfully",
            "data" => User::find($id)
        ]);
    }

    function post(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            "message" => "Create user successfuly",
            "data"    => $user
        ]);
    }

    function put(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name ? $request->name : $user->name;
        $user->email = $request->email ? $request->email : $user->email;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();

        return response()->json([
            "message" => "Update user successfuly",
            "data"    => $user
        ]);
    }

    function delete($id) {
        $user = User::find($id);
        $user->delete();
        
        return response()->json([
            "message" => "Delete user successfuly",
            "data"    => $user
        ]);
    }
}
