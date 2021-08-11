<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\Admin;
use DB;
use Session;

class AdminPageController extends Controller
{
    public function adminLogin(Request $request) {
        return view("admin.login")->with(['next' => $request->next]);
    }

    public function dashboard() {
        $inv = DB::table('invitation')
        ->join('admin','invitation.adminID', '=','admin.adminID')
        ->get();
        foreach($inv as $i){
            if($i->invitationStatus == "0")
            $i->invitationStatus = "Haven't Responded";
            else if ($i->invitationStatus == "1") $i->invitationStatus = "Responded";
        }
        return view("admin.index")->with(['inv' => $inv]);
    }


}
