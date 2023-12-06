<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function role()
    {
        return config('products.role');
    }
}
