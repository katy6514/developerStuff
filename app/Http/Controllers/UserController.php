<?php

namespace DeveloperStuff\Http\Controllers;

use DeveloperStuff\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

class UserController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    private $formdata = [
        'num_users' => '',
        'phone_yes' => '',
        'photo_yes' => '',
        'address_yes' => '',
    ];

    /**
    * Responds to requests to GET /users
    */
    public function getIndex() {
        return view('user_generator')
            ->with('formdata',$this->formdata);
        // return 'List all the users';
    }

    public function postIndex(Request $request) {
        // dump($request->input());

        $faker = Faker::create();

        $num_users = $request->input('num_users');

        $address = $request->input('address');
        if ($address == 'on') {
            $this->formdata['address_yes'] = 'checked';
        }

        $phone = $request->input('phone');
        if ($phone == 'on') {
            $this->formdata['phone_yes'] = 'checked';
        }

        $photo = $request->input('photo');
        if ($photo == 'on') {
            $this->formdata['photo_yes'] = 'checked';
        }

        for ($i = 0; $i < $num_users; $i++) {
            $users[$i]['name'] = $faker->name;
            $users[$i]['username'] = "@".$faker->username;
            if ($i % 2 == 0) {
                $fname = $faker->firstName;
                $lname = $faker->lastName;
                $email = strtolower(substr($fname,0,1)).$lname."@".$faker->freeEmailDomain;

                $users[$i]['name'] = $fname." ".$lname;
                $users[$i]['email'] = $email;
            } else {
                $users[$i]['email'] = $faker->email;
            }
            if ($address == 'on') {
                $users[$i]['streetaddress'] = $faker->streetAddress;
                $users[$i]['city'] = $faker->city;
                $users[$i]['postcode'] = $faker->postcode;
                $users[$i]['state'] = $faker->stateAbbr;
            }
            if ($phone == 'on') {
                $users[$i]['phone'] = $faker->phoneNumber;
            }
            if ($photo == 'on') {
                $users[$i]['photo'] = $faker->imageUrl($width = 200, $height = 200, 'animals');
            }
        }

        $jsonpath = public_path();
        $jsonpath .= '/downloads/randomusers.json';
        $json = fopen($jsonpath, 'w');
        fwrite($json, json_encode($users));
        fclose($json);

        $csv = new \SplFileObject('downloads/randomusers.csv', 'w');
        foreach ($users as $user) {
            $csv->fputcsv($user);
        }

        return view('user_generator')->with('users', $users)->with('formdata', $this->formdata);

    }

}
