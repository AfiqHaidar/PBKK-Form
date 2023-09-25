<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|alpha:ascii',
            'Email' => 'required|email:rfc',
            'Age' => 'required|numeric|between:2.50,99.90',
            'Address' => 'required',
            'image' => 'required|image|max:2048', // Changed to validate image type and max size.
        ]);

        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/image', $imageName);

        $results = [
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Age' => $request->Age,
            'Address' => $request->Address,
            'image' => $imageName,
        ];

        return redirect('/form')->with(['data' => $results, 'status' => 'Estd. 2023']);
    }
}
