<?php

return [
    'name.required' => 'Name is required',
    'name.string' => 'Name must be a string',
    'name.min' => 'Name must be at least 3 characters',
    'name.max' => 'Name must not exceed 255 characters',

    'email.required' => 'Email is required',
    'email.email' => 'Email must be a valid email address',
    'email.unique' => 'This email is already taken',

    'phone.required' => 'Phone number is required',
    'phone.digits_between' => 'Phone number must be between 10 and 14 digits',
    'phone.unique' => 'This phone number is already taken',

    'password.required' => 'Password is required',
    'password.string' => 'Password must be a string',
    'password.confirmed' => 'Password confirmation does not match',
];
