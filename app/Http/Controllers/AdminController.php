<?php

namespace App\Http\Controllers;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;




class AdminController extends Controller
{
    public function sendInvitation(Request $request) {      
        $invitation = new Invitation();
        $invitation->invitationEmail = $request->invitationEmail;
        $invitation->adminID = session('adminActive');
        $invitation->generateToken();
        $invitation->save();

        Mail::to($request->invitationEmail)->send(new InvitationMail());
        return response()->json(['success' => true]);

    }
}
