<?php

namespace DevTools\Http\Controllers;

use DevTools\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller {

  public function __construct() {
    # Put anything here that should happen before any of the other actions
  }

  /**
  * Responds to requests to GET /xkcd-password-generator
  */
  public function getIndex() {

    // to do - move these to storage
    $words = array("notice", "yarn", "want", "second", "cat", "impolite", "pump", "playground", "blue", "box", "day", "produce", "table", "sheet", "apparatus", "protect", "late", "house", "lumpy", "wooden", "banana", "balloon", "dog", "index", "receipt", "proposal", "dear", "faint", "song", "big", "impact", "crowd", "silk", "poem", "define", "budget", "cow", "chicken", "crime", "stock", "arrival", "high", "portrait", "police", "afford");
    $symbols = array("!", "@", "#", "$", "%", "?", "&", "*");
    //$file = file_get_contents(storage_path() . ‘/app/words/words.txt’);

    $number_of_words = 4;
    $separator = "-";

    $password_words = array();

    for ($i = 0; $i < $number_of_words; $i++) {
      $rand_word = $words[rand(0, count($words)-1)];
      $password_words[$i] = $rand_word;
    }

    $password = implode($separator, $password_words);

    return view('xkcdpassword')
      ->with('password', $password)
      ->with('number_of_words', $number_of_words);
  }

  /**
  * Responds to requests to POST /xkcd-password-generator
  */
  public function postIndex(Request $request) {
    // validate data
    $this->validate($request, [
      'number_of_words' => 'required|numeric|max:9',
    ]);

    // to do - move these to storage
    $words = array("notice", "yarn", "want", "second", "cat", "impolite", "pump", "playground", "blue", "box", "day", "produce", "table", "sheet", "apparatus", "protect", "late", "house", "lumpy", "wooden", "banana", "balloon", "dog", "index", "receipt", "proposal", "dear", "faint", "song", "big", "impact", "crowd", "silk", "poem", "define", "budget", "cow", "chicken", "crime", "stock", "arrival", "high", "portrait", "police", "afford");
    $symbols = array("!", "@", "#", "$", "%", "?", "&", "*");
    //$file = file_get_contents(storage_path() . ‘/app/words/words.txt’);

    $number_of_words = $request->input('number_of_words');
    $add_a_number = $request->input('add_a_number');
    $additional_number_qty = $request->input('additional_numbers');
    $add_a_symbol = $request->input('add_a_symbol');
    $additional_symbol_qty = $request->input('additional_symbols');
    $separator = $request->input('separator');

    $password_words = array();

    for ($i = 0; $i < $number_of_words; $i++) {
      $rand_word = $words[rand(0, count($words)-1)];
      $password_words[$i] = $rand_word;
    }

    if (isset($add_a_number)) {
      for ($i = 1; $i <= $additional_number_qty; $i++) {
        $add_number = rand(1, 9);
        $num_place = rand(0, count($password_words)-1);
        $password_words[$num_place] = $password_words[$num_place] . $add_number;
      }
    }

    if (isset($add_a_symbol)) {
      for ($i = 1; $i <= $additional_symbol_qty; $i++) {
        $add_symbol = $symbols[rand(0, count($symbols)-1)];
        $sym_place = rand(0, count($password_words)-1);
        $password_words[$sym_place] = $password_words[$sym_place] . $add_symbol;
      }
    }

    if (isset($separator)) {
      if ($separator == "hyphen") {
        $separator = "-";
      } elseif ($separator == "space") {
        $separator = " ";
      } elseif ($separator == "no space") {
        $separator = "";
      } elseif ($separator == "dot") {
        $separator = ".";
      }
    }

    $password = implode($separator, $password_words);

    return view('xkcdpassword')
      ->with('password', $password)
      ->with('number_of_words', $number_of_words)
      ->with('add_a_number', $add_a_number)
      ->with('additional_numbers', $additional_number_qty)
      ->with('add_a_symbol', $add_a_symbol)
      ->with('additional_symbols', $additional_symbol_qty)
      ->with('separator', $separator);
  }
}
