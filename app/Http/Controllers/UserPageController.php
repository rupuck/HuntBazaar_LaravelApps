<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\CustomerResponse;
use DB;
 

class UserPageController extends Controller
{


    public function verifyLink(Request $request) {

        $inv = DB::table('invitation')
        ->join('customer_response','invitation.invitationID', '=','customer_response.invitationID')
        ->where('link_token', '=', $request->token)
        ->first();
        
        if(!$inv){
            $inv = Invitation::where('link_token', $request->token)->first();
            return view('form_invitation')->with(['inv' => $inv]);
        }
        else{
            return ($inv);
        } 

    }
}
