<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function get() {
        return response()->json(([
            "message" => "Get users successfully",
            "data" => Admin::all()
        ]));
    }

    function post(Request $request) {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return response()->json([
            "message" => "Create admin successfuly",
            "data"    => $admin
        ]);
    }

    function put(Request $request, $id) {
        $admin = Admin::find($id);
        $admin->name = $request->name ? $request->name : $admin->name;
        $admin->email = $request->email ? $request->email : $admin->email;
        $admin->password = $request->password ? Hash::make($request->password) : $admin->password;
        $admin->save();

        return response()->json([
            "message" => "Update admin successfuly",
            "data"    => $admin
        ]);
    }

    function delete(Request $request, $id) {
        $admin = Admin::find($id);
        $admin->delete();
        
        return response()->json([
            "message" => "Delete admin successfuly",
            "data"    => $admin
        ]);
    }
}
