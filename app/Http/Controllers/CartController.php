<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('shop.cart');
    }

    public function addtocart($product_id)
    {
        echo $product_id;
        // $cookie = Cookie::make($name, $value, $minutes, $path, $domain,$secure, $httpOnly);
        $product_detail = Product::find($product_id)->toArray();
        // dd($product_detail);
        $cookie_name = 'mishan_laravel_userid_'.Auth::user()->id;
        $cookie_value = [
            '23' => 'laptop',
            '21' => 'cpu'
        ];
        $cookie = Cookie::make($cookie_name, $cookie_value, true, 60);

        dd($cookie);
            // $addtocart = new Cart();
            // $addtocart->user_id=Auth::user()->id;
            // $addtocart->product_id=$product_id;
            // $addtocart->save();
            // return redirect()->route('shop')->with('Success','Product Added To Cart');
        
       
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
