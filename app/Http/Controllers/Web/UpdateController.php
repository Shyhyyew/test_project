<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke()
    {
        return view('update');
    }
}
