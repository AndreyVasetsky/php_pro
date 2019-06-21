<?php
namespace App\controllers;

use App\models\repositories\UserRepository;

class UserController extends Controller
{
    protected $defaultAction = 'users';

    public function userAction()
    {
        echo '{"user": 12, "date": "2018-09-12"}';
    }

    public function usersAction()
    {
//        try {
//            if ($this->request->getParams()['get']['id']) {
//                throw new ErrorEx('Нет данных');
//            }
//        } catch (ErrorEx $ex) {
//            echo $ex->log();
//        } catch (\Exception $ex){
//            var_dump($ex);
//
//        } finally {
//            echo "Good";
//        }


        $userRepository = new UserRepository();

        $user = $userRepository->getOne(21);
        $userRepository->save($user);

        $params = [
            'users' => $userRepository->getAll(),
        ];

        echo $this->render('users', $params);
    }
}

//class ErrorEx extends \Exception
//{
//    public function log()
//    {
//        echo 'LogError' . $this->getMessage();
//    }
//}