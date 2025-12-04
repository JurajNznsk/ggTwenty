<?php

namespace App\Controllers;

use App\Configuration;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class MonstersController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index(Request $request) : Response
    {
        return $this->html();
    }
    public function logout(Request $request): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect(Configuration::LOGIN_URL);
    }

}
