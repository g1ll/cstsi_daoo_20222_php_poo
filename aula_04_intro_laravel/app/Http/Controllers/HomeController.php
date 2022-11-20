<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $message = "Mundo";

    public function index(){
        echo "Olá $this->message!!";
        dd($this); //var_dump($this);die;
    }
}
