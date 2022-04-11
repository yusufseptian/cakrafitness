<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function test()
    {
        echo password_hash('asdfghjkl', PASSWORD_BCRYPT);
    }
}
