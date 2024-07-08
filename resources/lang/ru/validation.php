<?php

return [
    'main'=>'Главная',
    'custom' => [
        'name' =>[
            "required" => 'field "Name" is required',
            "min" => "ру Field 'Name' must contain at least 2 characters",
            "max" => "the 'Name' field must contain a maximum of 50 characters"
        ],
        'company' =>[
            "max" => "the 'Name' field must contain a maximum of 50 characters"
        ],
        'email' => [
            'required' => 'We need to know your email address!',
        ],
        'telephone' => [
            "required" => 'field "Telephone" is required',
            "min" => "Field 'Telephone' must contain at least 5 characters",
            "max" => "the 'Telephone' field must contain a maximum of 15 characters"
        ],
        'message' => [
            "max" => "the 'Name' field must contain a maximum of 200 characters"
        ],
        'number-persons' => [
            "required" => 'field "Number-persons" is required',
            "in" => "the number of persons must be from 1 to 6"
        ],
        'type' => [
            "required" => 'field "Type" is required',
            "in" => "Wrong type of hotel"
        ],
        'arrival-date' => [
            "required" => 'field "Arrival-date" is required',
            "date_format" => "Date format must be d/m/Y"
        ],
        'date-departure' => [
            "required" => 'field "Date-departure" is required',
            "date_format" => "Date format must be d/m/Y",
            "after" => "The date-departure must be a date after arrival-date."
        ],
    ],

];
