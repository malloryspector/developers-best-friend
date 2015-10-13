<?php

namespace DevTools\Http\Controllers;

use DevTools\Http\Controllers\Controller;

class RandomUserController extends Controller {

  public function __construct() {
    # Put anything here that should happen before any of the other actions
  }

  /**
  * Responds to requests to GET /random-user-generator
  */
  public function getIndex() {
    return 'Random User';
  }

  /**
  * Responds to requests to POST /random-user-generator
  */
  public function postIndex() {
    return 'Random User';
  }
}
