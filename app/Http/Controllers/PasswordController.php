<?php

namespace DevTools\Http\Controllers;

use DevTools\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller {

  /**
  * Responds to requests to GET /xkcd-password-generator
  */
  public function getIndex() {

    // set default values for initial load
    $number_of_words = 4;
    $add_a_number = false;
    $additional_number_qty = false;
    $add_a_symbol = false;
    $additional_symbol_qty = false;
    $separator = "hyphen";

    // create password
    $password = self::createPassword($number_of_words, $add_a_number, $additional_number_qty, $add_a_symbol, $additional_symbol_qty, $separator);

    // return the xkcdpassword view with password and default input
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

    // get the input values from submitted form
    $number_of_words = $request->input('number_of_words');
    $add_a_number = $request->input('add_a_number');
    $additional_number_qty = $request->input('additional_numbers');
    $add_a_symbol = $request->input('add_a_symbol');
    $additional_symbol_qty = $request->input('additional_symbols');
    $separator = $request->input('separator');

    // generate password
    $password = self::createPassword($number_of_words, $add_a_number, $additional_number_qty, $add_a_symbol, $additional_symbol_qty, $separator);

    // return the xkcdpassword view with password and default input
    return view('xkcdpassword')
      ->with('password', $password)
      ->with('number_of_words', $number_of_words)
      ->with('add_a_number', $add_a_number)
      ->with('additional_numbers', $additional_number_qty)
      ->with('add_a_symbol', $add_a_symbol)
      ->with('additional_symbols', $additional_symbol_qty)
      ->with('separator', $separator);
  }

  /**
  * Private function to create password.
  * Logic is duplicated for both postIndex() and getIndex().
  * Separated into a private function to avoid duplication.
  *
  * @return string $password
  */
  private function createPassword($number_of_words, $add_a_number, $additional_number_qty, $add_a_symbol, $additional_symbol_qty, $separator) {
    // to do - move these to storage
    $words = array("notice", "yarn", "want", "second", "cat", "impolite", "pump", "playground", "blue", "box", "day", "produce", "table", "sheet", "apparatus", "protect", "late", "house", "lumpy", "wooden", "banana", "balloon", "dog", "index", "receipt", "proposal", "dear", "faint", "song", "big", "impact", "crowd", "silk", "poem", "define", "budget", "cow", "chicken", "crime", "stock", "arrival", "high", "portrait", "police", "afford");
    $symbols = array("!", "@", "#", "$", "%", "?", "&", "*");
    //$file = file_get_contents(storage_path() . ‘/app/words/words.txt’);

    /**
     * Create an empty array to store the words that will be used
     * to create the password
     */
    $password_words = array();

    /**
     * Generate a password based on the value of $number_of_words (how many words to use)
     * Get a random word from $word and set it to $rand_word
     * Set random word $rand_word into our chosen words array $password_words
     */
    for ($i = 0; $i < $number_of_words; $i++) {
      $rand_word = $words[rand(0, count($words)-1)];
      $password_words[$i] = $rand_word;
    }

    /**
     * Add number(s) at the end of a random word if checked
     *
     * For the quantity of numbers specified $additional_number_qty, grab a random number
     * from 1 to 9, randomly choose a word from the $password_words array
     * and concatenate the number at the end of the word
     */
    if (isset($add_a_number)) {
      for ($i = 1; $i <= $additional_number_qty; $i++) {
        $add_number = rand(1, 9);
        $num_place = rand(0, count($password_words)-1);
        $password_words[$num_place] = $password_words[$num_place] . $add_number;
      }
    }

    /**
     * Add symbol(s) at the end of a random word if checked
     *
     * For the quantity of symbols specified $additional_symbol_qty, grab a random symbol
     * from the $symbols array, randomly choose a word from the $password_words
     * array and concatenate the symbol at the end of the word
     */
    if (isset($add_a_symbol)) {
      for ($i = 1; $i <= $additional_symbol_qty; $i++) {
        $add_symbol = $symbols[rand(0, count($symbols)-1)];
        $sym_place = rand(0, count($password_words)-1);
        $password_words[$sym_place] = $password_words[$sym_place] . $add_symbol;
      }
    }

    /**
     * Change the separator $separator match chosen value
     */
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

    /**
     * Add chosen or default separator $separator between array of chosen words
     */
    $password = implode($separator, $password_words);

    return $password;
  }
}
