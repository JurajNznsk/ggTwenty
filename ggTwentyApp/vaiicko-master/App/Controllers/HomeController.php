<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class HomeController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return $this->app->getAuth()->isLogged();
    }
    public function index(Request $request): Response
    {
        return $this->html();
    }
}
