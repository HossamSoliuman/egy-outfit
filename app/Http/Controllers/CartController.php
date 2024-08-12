<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $newQuantity = 1;
        if ($request->quantity) {
            $newQuantity = $request->quantity;
        } elseif (isset($cart[$request->id])) {
            $newQuantity = $cart[$request->id]['quantity'] + 1;
        }



        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = min($newQuantity, 5);
        } else {
            $cart[$request->id] = [
                'id' => $request->id,
                "name" => $request->name,
                "price" => $request->price,
                "quantity" => min($newQuantity, 5),
                "cover" => $request->cover,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['cartItems' => $cart]);
    }



    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        return response()->json(['cartItems' => $cart]);
    }

    public function getCartItems()
    {
        $cart = session()->get('cart', []);

        return response()->json(['cartItems' => $cart]);
    }
}
