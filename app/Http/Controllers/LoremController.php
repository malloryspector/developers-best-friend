<?php

namespace DevTools\Http\Controllers;

use DevTools\Http\Controllers\Controller;

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
  public function postIndex() {
    // get the post value

    $generator = new Badcow\LoremIpsum\Generator();
    $paragraphs = $generator->getParagraphs(5);
    echo implode('<p>', $paragraphs);


    return view('lorem');
  }
}
