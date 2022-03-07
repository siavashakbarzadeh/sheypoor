<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class ContactUsController extends Controller
{
public function getContactus()
{
return view('contactus');
}

public function postContactus(Request $request)
{
$this->validate($request, [
'fullname' => 'required',
'email' => 'required',
'description' => 'required',
'g-recaptcha-response' => 'required|captcha',
]);

// Write here your database logic

\Session::put('success', 'Youe Request Submited Successfully..!!');
return redirect()->back();
}
}