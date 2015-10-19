<?php

namespace DevTools\Http\Controllers;

use Badcow\LoremIpsum\Generator;
use DevTools\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremController extends Controller {

  /**
  * Responds to requests to GET /lorem-ipsum
  */
  public function getIndex() {
    // generate one paragraph for intial pageload value
    $number_of_paragraphs = 1;

    // return the lorem view with generated paragraphs and user input
    return view('lorem')
      ->with('number_of_paragraphs', $number_of_paragraphs);
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

    // generate paragraphs
    $paragraphs = self::createParagraphs($number_of_paragraphs);

    // return the lorem view with generated paragraphs and user input
    return view('lorem')
      ->with('paragraphs', $paragraphs)
      ->with('number_of_paragraphs', $number_of_paragraphs);
  }

  /**
  * Private function with logic to create paragraphs.
  *
  * @return array $paragraphs
  */
  private function createParagraphs($number_of_paragraphs) {
    // use lorem ipsum package to generate paragraphs
    $generator = new Generator();
    $paragraphs = $generator->getParagraphs($number_of_paragraphs);

    return $paragraphs;
  }
}
