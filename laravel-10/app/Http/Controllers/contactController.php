<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\contactRequest;
use Illuminate\Contracts\View\View as ViewView;

class contactController extends Controller
{
    public function create():View
    {
        return view('contact');
    }
 
    public function store(contactRequest $request):View
    {
        Mail::to('administrateur@chezmoi.com')
            ->send(new Contact($request->except('_token')));
        return view('confirm');
    }
}
