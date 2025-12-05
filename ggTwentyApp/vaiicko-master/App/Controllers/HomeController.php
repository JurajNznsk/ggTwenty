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
    public function add(Request $request) : Response
    {
        // Nebol odoslaný formulár
        if (!$request->hasValue('submit')) {
            $message = 'Neodoslany';
            return $this->html(compact('message'));
        }

        $name = $request->value('character-name');
        $hp = (int)$request->value('character-hp');
        $currentHp = $hp;
        $ac = (int)$request->value('character-ac');
        $userId = (int)$this->app->getAuth()->user->getId();

        $character = new Character();
        $character->setName($name);
        $character->setHp($hp);
        $character->setCurrentHp($currentHp);
        $character->setAc($ac);
        $character->setUserId($userId);

        try {
            $character->save();
            return $this->redirect('?c=home&a=index');
        } catch (\Exception $e) {
            $message = 'Error saving character: ' . $e->getMessage();
            return $this->html(compact('message'));
        }
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