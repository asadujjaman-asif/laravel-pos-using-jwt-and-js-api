<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Http\Requests\StoreCartDetailRequest;
use App\Http\Requests\UpdateCartDetailRequest;
use Illuminate\Http\Request;
use App\Helper\General;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getList()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCart(Request $request)
    {
        $cartDetail=new CartDetail();
        $max=CartDetail::max('id');
        $cartDetail->invoice = General::createVoucher($max);
        $cartDetail->total_price = General::calculateTotalPrice($request->product_id);
        $cartDetail->payment_status = General::calculateTotalPrice($request->product_id);
        $cartDetail->status = 0;
        $cartDetail->order_date = 0;
        $cartDetail->delivery_date = null;
        $cartDetail->store_id = $request->store_id;
        $cartDetail->customer_id = $request->customer_id;
        $cartDetail->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartDetailRequest $request, CartDetail $cartDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartDetail $cartDetail)
    {
        //
    }
}
