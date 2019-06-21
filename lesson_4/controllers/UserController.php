<?php
namespace App\controllers;

use App\models\User;

class UserController extends Controller
{
    protected $defaultAction = 'users';

    public function userAction()
    {
        echo '{"user": 12, "date": "2018-09-12"}';
    }

    public function usersAction()
    {
        $params = [
            'users' => User::getAll(),
        ];

        echo $this->render('users', $params);
    }
}