<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class AuthController extends Controller
{
    public function adminDoLogin(Request $request) {
        $admin = Admin::where(['adminUsername' => $request->username, 'adminStatus' => 1])->first();
        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Your account is not available or is blocked right now.']);
        } else {
            if ($request->password == $admin->adminPassword) {
                $userID = $admin->adminID;
                $nama = $admin->adminName;
                
                $request->session()->put('adminActive', $userID);
                $request->session()->put('adminName', $nama);

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Invalid username or password !']);
            }
        }
    }

    public function adminDoLogout(Request $request) {
        $request->session()->flush();
        return redirect('/admin/login');
    }

}
