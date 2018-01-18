<?php

namespace App\Http\Controllers\Authority;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }
    public function index()
    {
        return view('authority.home');
    }
}
