<?php

namespace App\Http\Controllers;

class InitializeController extends Controller
{
    public function index()
    {
        return response()->json(
            [
                'type_of_trash' =>
                    [
                        1 => 'Bike',
                        2 => 'Car',
                        3 => 'Heavy Trash',
                        4 => 'Other',
                    ]
            ]
        );
    }
}
