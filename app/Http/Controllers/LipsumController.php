<?php

namespace DeveloperStuff\Http\Controllers;

use DeveloperStuff\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Badcow\LoremIpsum\Generator;

class LipsumController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    private $formdata = [
      'num_paragraphs' => '',
    ];

    /**
    * Responds to requests to GET /users
    */
    public function getIndex() {
      return view('lorem_ipsum')->with('formdata',$this->formdata);
      // return 'List all the users';
    }

    public function postIndex(Request $request) {

      // $faker = Faker::create();

      $this->validate($request,
          ['num_paragraphs' => 'required|numeric|min:1|max:10']
      );

      $num_paragraphs = $request->input('num_paragraphs');

      $generator = new Generator();
      $paragraphs = $generator->getParagraphs($num_paragraphs);
      // echo implode('<p>', $paragraphs);


      // $jsonpath = public_path();
      //   $jsonpath .= '/downloads/randomusers.json';
      //   $json = fopen($jsonpath, 'w');
      //   fwrite($json, json_encode($users));
      //   fclose($json);
      //   $csv = new \SplFileObject('downloads/randomusers.csv', 'w');
      //   foreach ($users as $user) {
      //       $csv->fputcsv($user);
      //   }
        return view('lorem_ipsum')->with('paragraphs', $paragraphs)->with('formdata', $this->formdata);




    }

}
