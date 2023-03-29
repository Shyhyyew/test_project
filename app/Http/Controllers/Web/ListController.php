<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __invoke()
    {
        $data = Data::all();
        return view('list', compact('data'));
    }
}
