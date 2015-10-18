<?php

namespace DevTools\Http\Controllers;

use Badcow\LoremIpsum\Generator;
use DevTools\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremController extends Controller {

  public function __construct() {
    # Put anything here that should happen before any of the other actions
  }

  /**
  * Responds to requests to GET /lorem-ipsum
  */
  public function getIndex() {
    return view('lorem');
  }

  /**
  * Responds to requests to POST /lorem-ipsum
  */
  public function postIndex(Request $request) {
    // validate data
    $this->validate($request, [
      'number_of_paragraphs' => 'required|numeric|max:9',
    ]);

    // set the number of paragraphs requested to a variable
    $number_of_paragraphs = $request->input('number_of_paragraphs');

    // use lorem ipsum package to generate paragraphs
    $generator = new Generator();
    $paragraphs = $generator->getParagraphs($number_of_paragraphs);

    // return the lorem view with generated paragraphs
    return view('lorem')
      ->with('paragraphs', $paragraphs)
      ->with('number_of_paragraphs', $number_of_paragraphs);
  }
}
