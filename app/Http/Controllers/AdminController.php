<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;




class AdminController extends Controller
{
    public function sendInvitation(Request $request) { 
        $check = Invitation::where('invitationEmail', $request->invitationEmail)->first(); 
        if(!$check){
        $invitation = new Invitation();
        $invitation->invitationEmail = $request->invitationEmail;
        $invitation->adminID = session('adminActive');
        $invitation->generateToken();
        $invitation->save();

        Mail::to($request->invitationEmail)
        ->send(new InvitationMail($invitation));
        return response()->json(['success' => true]);
    }
    else{
        return response()->json(['success' => false]);
    }

    }
}
