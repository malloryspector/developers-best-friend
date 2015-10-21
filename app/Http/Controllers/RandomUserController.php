<?php

namespace DevTools\Http\Controllers;

use DevTools\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RandomUserController extends Controller {

  /**
  * Responds to requests to GET /random-user-generator
  */
  public function getIndex() {

    // set the default value for initial load
    $number_of_users = 1;

    // set to keep user input if there is an error
    $name = old('name');
    $address = old('address');
    $email = old('email');
    $phone_number = old('phone_number');
    $username = old('username');
    $password = old('password');
    $birthday = old('birthday');
    $blurb = old('blurb');

    return view('randomuser')
      ->with('number_of_users', $number_of_users)
      ->with('name', $name)
      ->with('address', $address)
      ->with('email', $email)
      ->with('phone_number', $phone_number)
      ->with('username', $username)
      ->with('password', $password)
      ->with('birthday', $birthday)
      ->with('blurb', $blurb);
  }

  /**
  * Responds to requests to POST /random-user-generator
  */
  public function postIndex(Request $request) {
    // validate data
    $this->validate($request, [
      'number_of_users' => 'required|numeric|max:9',
    ]);

    // collect all submitted form values
    $number_of_users = $request->input('number_of_users');
    $name = $request->input('name');
    $address = $request->input('address');
    $email = $request->input('email');
    $phone_number = $request->input('phone_number');
    $username = $request->input('username');
    $password = $request->input('password');
    $birthday = $request->input('birthday');
    $blurb = $request->input('blurb');

    // generate random users
    $user_info = self::createRandomUser($number_of_users, $name, $address, $email, $phone_number, $username, $password, $birthday, $blurb);

    return view('randomuser')
      ->with('user_info', $user_info)
      ->with('number_of_users', $number_of_users)
      ->with('name', $name)
      ->with('address', $address)
      ->with('email', $email)
      ->with('phone_number', $phone_number)
      ->with('username', $username)
      ->with('password', $password)
      ->with('birthday', $birthday)
      ->with('blurb', $blurb);
  }

  /**
  * Private function to create a random user.
  *
  * @return array $user_info
  */
  private function createRandomUser($number_of_users, $name, $address, $email, $phone_number, $username, $password, $birthday, $blurb) {

    $faker = \Faker\Factory::create();

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
      if (isset($username)) {
        $user_info[$i]['username'] = $faker->userName;
      }
      if (isset($password)) {
        $user_info[$i]['password'] = $faker->password;
      }
      if (isset($birthday)) {
        $user_info[$i]['birthday'] = $faker->date;
      }
      if (isset($blurb)) {
        $user_info[$i]['blurb'] = $faker->paragraph($nbSentences = 3);
      }
    }

    return $user_info;
  }
}
