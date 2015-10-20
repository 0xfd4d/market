<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Items;
use App\Library\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Items::getItems();
        View::view('app', [
            'title' => 'Shop',
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

    }
    public function create(Request $request)
    {
        Items::putItem($request);
    }
    // public function update(Request $request)
    // {
    //
    // }
}
