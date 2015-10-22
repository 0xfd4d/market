<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Items;
use App\Library\Request;
use App\Library\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Items::getItems();
        View::view('app', [
            'title' => 'Home',
            'view' => 'items/index',
            'params' => [
                    'items' => $items,
                    'request' => $request
                ]
            ]
        );
    }
    public function show(Request $request)
    {
        $item = Items::getItemById($request->params[0]);
        View::view('app', [
            'title' => 'Home',
            'view' => 'items/show',
            'params' => [
                    'item' => $item
                ]
            ]
        );
    }
    public function create(Request $request)
    {
        if(!Auth::isAdmin())
        {
            header('Location: /');
            exit();
        }
        View::view('app', [
            'title' => 'Create',
            'view' => 'items/create',
            'params' => [
                    'request' => $request
                ]
            ]
        );
    }
    public function store(Request $request)
    {
        if(!Auth::isAdmin())
        {
            header('Location: /');
            exit();
        }
        $errors = Items::validateCreateItem($request);
        if(empty($errors[0]))
        {
            Items::putItem($request);
        }
        else {
            $request->errors = $errors;
            $this->create($request);
        }
    }
    // public function update(Request $request)
    // {
    //
    // }
}
