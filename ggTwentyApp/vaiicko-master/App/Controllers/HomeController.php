<?php

namespace App\Controllers;

use App\Configuration;
use App\Models\Character;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class HomeController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    public function index(Request $request) : Response
    {
        $characters = Character::getAll('user_id = ?', [$this->app->getAuth()->user->getId()]);

        return $this->html(compact('characters'));
    }
    public function character(Request $request): Response
    {
        $id = (int)$request->value('id');
        $char = Character::getOne($id);

        return $this->html(compact('char'));
    }
    public function logout(Request $request): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect(Configuration::LOGIN_URL);
    }

}