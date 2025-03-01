<?php

require_once("validation.php");

$validator=new Validation();

$validator->validate([
    'name'=>['required','string'],
    'email'=>['required','email'],
    'phone'=>['required','numeric'],
    'password'=>['required','min3','string']
]);


var_dump($validator->errors());
