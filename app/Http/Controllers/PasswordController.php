<?php

namespace DeveloperStuff\Http\Controllers;

use DeveloperStuff\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Storage;

class PasswordController extends Controller {

    private function scrape($json_file, $word_type) {
            $rawdata = file_get_contents($json_file);
            $object = json_decode($rawdata, true);
            return $object[$word_type];
    }


    public function __construct() {
        # Put anything here that should happen before any of the other actions
        $this->nouns = $this->scrape('words/nouns.json', 'nouns');
        $this->adverbs = $this->scrape('words/adverbs.json', 'adverbs');
        $this->adjectives = $this->scrape('words/adjs.json', 'adjs');
        $this->allverbs = $this->scrape('words/verbs.json', 'verbs');

        $this->verbs = array();

        foreach ($this->allverbs as $verb) {
            array_push($this->verbs, $verb['past']);
        }
    }

    private $formdata = [
        'num_words' => '',
        'number_yes' => '',
        'symbol_yes' => '',
    ];

    public function getIndex() {
        return view('pw_generator')
            ->with('formdata',$this->formdata);
    }

    public function postIndex(Request $request) {

    $num_words = $request->input('num_words');

    $symbol = $request->input('symbol');
    if ($symbol == 'on') {
        $this->formdata['symbol_yes'] = 'checked';
    }

    $number = $request->input('number');
    if ($number == 'on') {
        $this->formdata['number_yes'] = 'checked';
    }


    $word_list = Storage::get('words.txt');
    // $trimmed = trim($word_list,'\n');
    $words = preg_split("/[\s,]+/", $word_list);
    $word_list_length = count($words);



    $special_char = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "?");
    $random_special_char = $special_char[rand(0,count($special_char)-1)];

    // generate the password
    $password = "";

    if ($num_words == 'memorable') {
        $adjective = $this->adjectives[rand(0, (count($this->adjectives) - 1))];
        $noun = $this->nouns[rand(0, (count($this->nouns) - 1))];
        $verb = $this->verbs[rand(0, (count($this->verbs) - 1))];
        $adverb = $this->adverbs[rand(0, (count($this->adverbs) - 1))];

        $password = $adjective . " " . $noun . " " .$verb . " " . $adverb;

    } else {
        for ($i=0; $i < $num_words; $i++) {
            $word_index = rand(0,$word_list_length);
            // dump($word_index);
            $new_word = trim($words[$word_index]);

            if ($i < $num_words-1) {
                $password .= $new_word." ";
            } else {
                $password .= $new_word;
            }
        }
    }

    if ($symbol == "on") {
        $password .= $random_special_char;
    }

    if ($number == "on") {
        $password .= rand(0,9);
    }


    // $password = "cats".$num_words;

    return view('pw_generator')
        ->with('password', $password)
        ->with('formdata', $this->formdata);




    }

}
