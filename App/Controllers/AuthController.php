<?php
namespace App\Controllers;

use App\Models\UserModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->getPostParams()['login'];
        $password = $request->getPostParams()['password'];
//        echo ($login.' '.$password);
        if (isset($login) and $login != '') {
            $user = UserModel::getWhere('email', '=', $login)[0];
            if ($user){
                if ($password == $user->password){
                    $_SESSION['login'] = $user->email;
                    $_SESSION['name'] = $user->name;
                    $_SESSION['surname'] = $user->surnname;
                    $_SESSION['id'] = $user->id;

                    $_SESSION['msg'] = "Вы успешно вошли в систему";
                }
                else $_SESSION['msg'] = "Неправильный пароль";
            }
            else $_SESSION['msg'] = "Неправильный логин";
        }
        header('Location: /');
        exit();
    }
    public function logout(Request $request){
        $_SESSION = null;
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        header('Location: /');
        exit();
    }
}