<?php

namespace App\Controllers;

use App\Configuration;
use Exception;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use Framework\Http\Responses\ViewResponse;

class LoginController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return !$this->app->getAuth()->isLogged();
    }
    public function index(Request $request): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }
    public function login(Request $request): Response
    {
        $logged = null;
        if ($request->hasValue('submit'))
        {
            $logged = $this->app->getAuth()->login($request->value('username'), $request->value('password'));
            if ($logged)
            {
                return $this->redirect($this->url("home.index"));
            }
        }

        $message = $logged === false ? 'Bad username or password!' : null;
        return $this->html(compact("message"));
    }
}
