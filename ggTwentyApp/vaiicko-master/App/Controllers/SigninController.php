<?php

namespace App\Controllers;

use App\Configuration;
use App\Models\User;
use Exception;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use Framework\Http\Responses\ViewResponse;

/**
 * Class AuthController
 *
 * This controller handles authentication actions such as login, logout, and redirection to the login page. It manages
 * user sessions and interactions with the authentication system.
 *
 * @package App\Controllers
 */
class SigninController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return !$this->app->getAuth()->isLogged();
    }
    public function index(Request $request): Response
    {
        return $this->redirect('signin');
    }

    public function signin(Request $request): Response
    {
//        $id = (int)$request->value('id');
//        if ($id === 0) {
//            $user = new User();
//            $user->setId((int)$request->value(1));
//            $user->setUsername($request->value('username') ?? 'default_username');
//            $user->setPassword($request->value('password') ?? 'default_password');
//        }
//
//        try {
//            $user->save();
//            $this->loginAfterSignin($user->getId(), $user->getPassword());
//            return $this->redirect($this->url("home.index"));
//        } catch (Exception $e) {
//        }

        return $this->redirect('signin');
    }
    private function loginAfterSignin(string $username, string $password)
    {
        $this->app->getAuth()->login($username, $password);
    }
}
