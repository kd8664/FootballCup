<?php
namespace App\Controllers;

use App\Models\MatchModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;

class MatchController extends Controller
{
    public function index(Request $request){
        return $this->view('matches.php', ['user' =>  $request->getUser(), 'message' => $request->getSession()['msg'], 'matches' => MatchModel::all()]);

    }


}