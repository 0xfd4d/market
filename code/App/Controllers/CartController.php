<?php

namespace App\Controllers;

use App\Library\Auth;
use App\Library\View;
use App\Library\Cart;
use App\Library\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            header('Location: /');
            exit();
        }
        $items = Cart::getItemsByUserId(Auth::user()['id']);
        View::view('app', [
            'title' => 'Корзина',
            'view' => 'cart/index',
            'params' => [
                'items' => $items,
                'price_count' => Cart::countAllPrices($items)
                ],
            ]
        );
    }
    public function add(Request $request)
    {
        if (!Auth::check()) {
            header('Location: /');
            exit();
        }
        $item = Cart::putItemByUserId(Auth::user()['id'], $request->params[0]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function remove(Request $request)
    {
        if (!Auth::check()) {
            header('Location: /');
            exit();
        }
        Cart::removeItemById($request->params[0]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
