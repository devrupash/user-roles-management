<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $roles = $user->roles;
        return response()->json($roles);
    }

    function onlyForAdmin(Request $request)
    {
        // $user = $request->user();
        
        // if ($user->roles->contains('name', 'admin')) {
        //     return response()->json([
        //         'message' => 'Welcome, Admin!',
        //         'user' => $user,
        //     ]);
        // }
        // abort(403, 'Unauthorized action.');

        return response("This is admin only area.");
    }

    function onlyForEditor(Request $request)
    {
        // $user = $request->user();
        
        // if ($user->roles->contains('name', 'editor')) {
        //     return response()->json([
        //         'message' => 'Welcome, Editor!',
        //         'user' => $user,
        //     ]);
        // }
        // abort(403, 'Unauthorized action.');

        return response("This is editor only area.");
    }

    function onlyForAuthor(Request $request){
        // $user = $request->user();
        // if ($user->roles->contains('name', 'author')) {
        //     return response()->json([
        //         'message' => 'Welcome, Author!',
        //         'user' => $user,
        //     ]);
        // }
        // abort(403, 'Unauthorized action.');

        return response("This is author only area.");
    }

    public function secretMessage(Request $request){

        $secret = $request->input('password');
        if($secret !== 'secret'){
            abort(403, 'Unauthorized action.');
        }
        return response("This is a very secret message");
        
    }


}
