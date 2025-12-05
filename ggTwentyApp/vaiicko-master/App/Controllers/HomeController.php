<?php

namespace App\Controllers;

use App\Configuration;
use App\Models\Character;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use HttpException;

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

        $imgFile = $request->file('character-img');
        $uniqueName = time() . '-' . $imgFile->getName();
        $targetPath = Configuration::UPLOAD_DIR . '/characters/' . $uniqueName;

        if (!$imgFile->store($targetPath))
        {
            throw new HttpException(500, 'Failed to upload image.');
        }


        $character = new Character();
        $character->setName($name);
        $character->setHp($hp);
        $character->setCurrentHp($currentHp);
        $character->setAc($ac);
        $character->setUserId($userId);
        $character->setImageUrl($targetPath);

        try {
            $character->save();
            return $this->redirect('?c=home&a=index');
        } catch (\Exception $e) {
            $message = 'Error saving character: ' . $e->getMessage();
            return $this->html(compact('message'));
        }
    }
    public function edit(Request $request): Response
    {
        $id = (int)$request->value('character-id');
        $char = Character::getOne($id);

        $char->setName($request->value('character-name'));
        $char->setHp((int)$request->value('character-hp'));
        $char->setCurrentHp((int)$request->value('character-cur-hp'));
        $char->setAc((int)$request->value('character-ac'));

        $imgFile = $request->file('character-img');
        if ($imgFile && $imgFile->isOk())
        {
            $oldFileUrl = $char->getImageUrl();
            if (file_exists($oldFileUrl) && is_file($oldFileUrl))
                unlink($oldFileUrl);

            $newFileName = time() . '-' . $imgFile->getName();
            $targetPath = Configuration::UPLOAD_DIR . '/characters/' . $newFileName;
            if ($imgFile->store($targetPath))
                $char->setImageUrl($targetPath);
        }

        try {
            $char->save();

            return $this->json([
                'status' => 'success',
                'message' => 'Character updated successfully.',
                'new_image_url' => $char->getImageUrl()
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'status' => 'error',
                'message' => 'Error saving character to database.',
                'detail' => $e->getMessage()
            ], 500);
        }
    }
    public function delete(Request $request): Response
    {
        try {
            $id = (int)$request->value('id');
            $char = Character::getOne($id);

            if (is_null($char)) {
                throw new HttpException(404);
            }
            @unlink($char->getImageUrl());
            $char->delete();

        } catch (Exception $e) {
            throw new HttpException(500, 'DB Chyba: ' . $e->getMessage());
        }

        return $this->redirect('?c=home&a=index');
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