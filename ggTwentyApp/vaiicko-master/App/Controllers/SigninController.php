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
        $user = new User();
        $user->setUsername($request->value('username') ?? 'aa');
        $user->setPassword($request->value('password') ?? '');

        try {
            $user->save();
        } catch (Exception $e) {}

        return $this->html();
    }
    public function login(Request $request): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }
}
