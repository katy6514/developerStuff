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

        // $password_hashed = crypt($password_in, '$1$8hcR1Ck3$');
        if ($encryption_type == 'pw_hash') {
            $password_hashed = password_hash($password_in, PASSWORD_DEFAULT);
        } elseif ($encryption_type == 'pw_bcrypt') {
            $password_hashed = crypt($password_in, '$2a$07$usesomesillystringforsalt$');
        } elseif ($encryption_type == 'pw_md5') {
            $password_hashed = crypt($password_in, '$1$rasmusle$');
            // $password_hashed = crypt($password_in, '$1$dblrecak$');
        } else {
            $password_hashed = crypt($password_in, '$5$rounds=5000$usesomesillystringforsalt$');
        }

        $ht_pair = $username . ":" . $password_hashed;



        // $password = "cats".$num_words;

        return view('ht_generator')
            ->with('ht_pair', $ht_pair)
            ->with('formdata', $this->formdata);




    }

}
