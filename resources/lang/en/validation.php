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

    'password.required' => 'The password field is required.',
    'password.string' => 'The password must be a string.',
    'password.min' => 'The password must be at least 6 characters.',
    'password.max' => 'The password must not be greater than 32 characters.',
    'password.confirmed' => 'Password confirmation does not match',

    'login.required' => 'Data enter is required to login',
    'login.string' => 'data is email or phone number',
];
