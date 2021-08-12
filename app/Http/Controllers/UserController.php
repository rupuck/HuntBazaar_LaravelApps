<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerResponse;
use App\Models\Invitation;
use App\Mail\ThankYou;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;

class UserController extends Controller
{
    public function saveResponse(Request $request) {
        $resp = new CustomerResponse();
        $resp->invitationID = $request->invitationID;
        $resp->customerResponseName = $request->customerResponseName;
        $resp->customerResponseDOB = $request->customerResponseDOB;
        $resp->customerResponseGender = $request->customerResponseGender;
        $resp->customerRegistrationCode = $this->generateRegistrationCode();
        $resp->customerResponseFav = $request->customerResponseFav;
        
        $inv = Invitation::where('invitationID', $request->invitationID)->first();
        $inv->invitationStatus = 1;
        $inv->save();
        $resp->save();

        Mail::to($inv->invitationEmail)
        ->later(now()->addMinutes(60), new ThankYou($resp));

        
        return response()->json(['success' => true]);
    }

    public function generateRegistrationCode($length = 7) {
       
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        while(true){
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $check = CustomerResponse::where('customerRegistrationCode', $randomString)->first();
            if(!$check) break;
        }
        return $randomString;
    }

}
