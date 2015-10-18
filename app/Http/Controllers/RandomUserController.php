<?php

namespace DevTools\Http\Controllers;

use DevTools\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RandomUserController extends Controller {

  public function __construct() {
    # Put anything here that should happen before any of the other actions
  }

  /**
  * Responds to requests to GET /random-user-generator
  */
  public function getIndex() {
    $name = true;
    $address = true;
    $email = true;
    $phone_number = true;

    return view('randomuser')
      ->with('name', $name)
      ->with('address', $address)
      ->with('email', $email)
      ->with('phone_number', $phone_number);
  }

  /**
  * Responds to requests to POST /random-user-generator
  */
  public function postIndex(Request $request) {
    // validate data
    $this->validate($request, [
      'number_of_users' => 'required|numeric|max:9',
    ]);

    $faker = \Faker\Factory::create();

    // collect all form values
    $number_of_users = $request->input('number_of_users');
    $name = $request->input('name');
    $address = $request->input('address');
    $email = $request->input('email');
    $phone_number = $request->input('phone_number');

    // create an empty array to hold user information
    $user_info = array();

    // create user content based on number of users requested and form values
    for ($i = 0; $i < $number_of_users; $i++) {
      if (isset($name)) {
        $user_info[$i]['name'] = $faker->firstName . ' ' . $faker->lastName;
      }
      if (isset($address)) {
        $user_info[$i]['address'] = $faker->address;
      }
      if (isset($email)) {
        $user_info[$i]['email'] = $faker->email;
      }
      if (isset($phone_number)) {
        $user_info[$i]['phone_number'] = $faker->phoneNumber;
      }
    }

    return view('randomuser')
      ->with('user_info', $user_info)
      ->with('number_of_users', $number_of_users)
      ->with('name', $name)
      ->with('address', $address)
      ->with('email', $email)
      ->with('phone_number', $phone_number);
  }
}
