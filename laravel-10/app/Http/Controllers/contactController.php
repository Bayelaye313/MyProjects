<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\View\View;

class contactController extends Controller
{
    public function create():View
    {
        return view('contact');
    }
 
    public function store(contactRequest $request):View
    {
        return view('confirm');
    }
}
