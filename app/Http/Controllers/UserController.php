<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        for ($i = 1; $i < 10; $i++)
        {
            print $i . "<br>";
        }
    }
}
