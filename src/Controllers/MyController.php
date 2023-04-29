<?php

namespace App\Controllers;

use Framework\Controller;

class MyController extends Controller
{
    public function index($name, $value = null)
    {
        return $this->view('index.php', ['name' =>  $name, 'value' => $value]);
    }
}
