<?php

namespace DeveloperStuff\Http\Controllers;

use DeveloperStuff\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HTpasswordController extends Controller {


    public function __construct() {
        # Put anything here that should happen before any of the other actions

    }

    private $formdata = [
        'username' => '',
        'htpassword' => '',
    ];

    public function getIndex() {
        return view('ht_generator')
            ->with('formdata',$this->formdata);
    }

    public function postIndex(Request $request) {
        $this->validate($request,
                   [
                       'username' => 'required',
                       'htpassword' => 'required'
                   ]
               );
        $username = $request->input('username');
        $password_in = $request->input('htpassword');
        $encryption_type = $request->input('encryption');

        $password_hashed = crypt($password_in, '$2a$07$N14lhw48Y01leV3r5a73wlyd4$');
// usesomesillystringforsalt
// h01lyw4N15a73w84lleV3rYd4
        $ht_pair = $username . ":" . $password_hashed;

        // $password = "cats".$num_words;

        return view('ht_generator')
            ->with('ht_pair', $ht_pair)
            ->with('formdata', $this->formdata);




    }

}
