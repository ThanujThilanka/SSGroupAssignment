<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;


class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return array|Factory|View|string
     * @throws Throwable
     */
    public function index(Request $request)
    {
        try {
            $value = $this->service->index();
            return $value;
        } catch (Exception $exception) {
            return response()->json([$exception]);
        }

    }

    public function searchByOrganizationId($id)
    {
        try {
            $value = $this->service->searchByOrganizationId($id);
            return $value;
        } catch (Exception $exception) {
            return response()->json([$exception]);
        }


    }

    public function search($name)
    {
        try {
            $value = $this->service->search($name);
            return $value;
        } catch (Exception $exception) {
            return response()->json([$exception]);
        }

    }

}
