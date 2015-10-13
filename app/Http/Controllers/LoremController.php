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
    return 'Lorem Ipsum';
  }

  /**
  * Responds to requests to POST /lorem-ipsum
  */
  public function postIndex() {
    return 'Lorem Ipsum';
  }
}
