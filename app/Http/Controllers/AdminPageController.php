<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminPageController extends Controller
{
    public function adminLogin(Request $request) {
        return view("admin.login")->with(['next' => $request->next]);
    }

    public function dashboard() {
        $value = Session::get('adminActive');
        return view("admin.index");
    }


}
