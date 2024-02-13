<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function showContactPage()
{
    return view('contacts.nosContact');
}
public function requireContact(Request $request){
    $request->validate([
     'name' =>'required',
     'surname' =>'required',
     'email' =>'required | email',
     'description' =>'required',
    ]);

    $contacts = new Contact();

    $contacts ->name = $request ->name;
    $contacts ->surname = $request ->surname;
    $contacts ->email = $request ->email;
    $contacts ->description = $request ->description;

    $contacts->save();
    return redirect()->route('contacts.nosContact')->with('success', ' Messsage envoyer');
}
}


