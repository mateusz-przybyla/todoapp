<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $validationRules = ["name" => "required", "email" => ["required", "email"], "message" => "required"];

    public function index(){
        return view('contact');
    }

    public function store(Request $request)
    {
        //Log::info($request);

        $validatedData = $request->validate($this->validationRules);

        Message::create($validatedData);

        return redirect()->route("contact")->with("status", "Your message has been sent!");
    }
}
