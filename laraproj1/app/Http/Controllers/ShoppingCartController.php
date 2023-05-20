<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //get cart list
    $thiscart= ShoppingCart::where("user_id",user()->user_id)
    ->where("orderstatus","incart")
    ->findall();
        return $thiscart;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $course_id,$price)
    {
    //
    $newOrder=ShoppingCart::firstOrCreate(
      [  "user_id"=>user()->user_id],
      [  "course_id"=> course_id],
      [  "price"=> $price],
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
  public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
