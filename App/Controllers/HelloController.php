<?php

namespace src\Controllers;

class HelloController extends \Framework\Controller
{
    public function hello($name, $value)
    {
        return $this->view('hello.php', ['name' =>  $name, 'value' => $value]);
    }
}
