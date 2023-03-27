<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('create');
    }
}
