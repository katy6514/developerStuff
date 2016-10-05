<?php

namespace DeveloperStuff\Http\Controllers;

use DeveloperStuff\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Storage;

class FuriosaController extends Controller {

    private $formdata = [
        'num_words' => '',
        'rev_yes' => '',
        'separator' => '',
        'separator_none' => '',
        'separator_space' => '',
        'separator_dash' => '',
        'separator_dot' => '',
    ];

    public function getIndex() {
        return view('fr_pw_generator')
            ->with('formdata',$this->formdata);
    }

    public function postIndex(Request $request) {

        // generate the password
        $num_words = $request->input('num_words');
        $separator = $request->input('separator');


        if ($separator == ' ') {
            $this->formdata['separator_space'] = 'checked';
        } else if ($separator == '.') {
            $this->formdata['separator_dot'] = 'checked';
        } else if ($separator == '') {
            $this->formdata['separator_none'] = 'checked';
        } else {
            $this->formdata['separator_dash'] = 'checked';
        }


        $password = "";

        if ($num_words == 'movie_line') {
            $line_list = Storage::get('furyRoadLines.txt');
            $lines = preg_split("/[\n,]+/", $line_list);
            $line_list_length = count($lines);

            $line_index = rand(0,$line_list_length);
            $new_line = trim($lines[$line_index]);
            $new_line = str_replace(' ', $separator, $new_line);
            $password = $new_line;

        } else {
            $word_list = Storage::get('furyRoadWords.txt');
            $words = preg_split("/[\s,]+/", $word_list);
            $word_list_length = count($words);

            for ($i=0; $i < $num_words; $i++) {
                $word_index = rand(0,$word_list_length);
                $new_word = trim($words[$word_index]);

                if ($i < $num_words-1) {
                    $password .= $new_word.$separator;
                } else {
                    $password .= $new_word;
                }
            }
        }


        // extras
        $rev_it_up = $request->input('rev_it_up');
        if ($rev_it_up == "on") {
            $this->formdata['rev_yes'] = 'checked';
            $password .= "V8!";
        }



        return view('fr_pw_generator')
            ->with('password', $password)
            ->with('formdata', $this->formdata);
    }
}
