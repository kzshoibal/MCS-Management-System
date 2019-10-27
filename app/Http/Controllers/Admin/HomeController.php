<?php

namespace App\Http\Controllers\Admin;


class HomeController
{
    public function index()
    {
//        session()->flash('success', 'Category created successfully');
//        session()->flash('message', 'this is message created successfully');

        return view('home');
    }

    public function test()
    {
        return view ('test/index');
    }
}
