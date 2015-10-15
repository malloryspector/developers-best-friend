<?php

namespace DevTools\Http\Controllers;

use DevTools\Http\Controllers\Controller;

class PasswordController extends Controller {

  public function __construct() {
    # Put anything here that should happen before any of the other actions
  }

  /**
  * Responds to requests to GET /xkcd-password-generator
  */
  public function getIndex() {
    return view('xkcdpassword');
  }

  /**
  * Responds to requests to POST /xkcd-password-generator
  */
  public function postIndex() {
    return view('xkcdpassword');
  }
}
