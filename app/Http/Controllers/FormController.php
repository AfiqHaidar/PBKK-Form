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
            'name' => 'required|alpha:ascii',
            'email' => 'required|email:rfc',
            'value' => 'required|numeric|between:2.50,99.90',
            'description' => 'required',
            'image' => 'required|image|max:2048', // Changed to validate image type and max size.
        ]);

        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/image', $imageName);

        $results = [
            'name' => $request->name,
            'email' => $request->email,
            'value' => $request->value,
            'description' => $request->description,
            'image' => $imageName,
        ];

        return redirect('/form')->with(['data' => $results, 'status' => 'Success!']);
    }
}
