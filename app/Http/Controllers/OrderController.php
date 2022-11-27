<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    //check out function for order items assumed that this table is for one user
    function checkout(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order === null) {
            return response()->json(['message'=>'Wrong Order ID'],404);
        }
        $order_items = OrderItems::all()->where('order_id', $id)->all();
        $total = $order->total_price;
        if ($order_items === null) {
            return response()->json(['message'=>'Wrong Order ID'],404);
        }
        foreach ($order_items as $order_item) {
            $item = Product::find($order_item->item_id);
            if ($item->quantity < $order_item->items_quantity || $item == null) {
                return response()->json(['message'=>'Failed'],404);
            } else if($order_item->deleted_at==null){
                $item->quantity = $item->quantity-$order_item->items_quantity;
                $item->save();
                $total += $order_item->items_quantity * ($item->price - ($item->price - ($item->price * $item->discount) / 100));//this equation can be added inside add/update product as it will calculate the total price just once
                $order_item->deleted_at=DB::raw('CURRENT_TIMESTAMP');
                $order_item->save();
            }
        }
        $order->total_price = $total;
        $order->save();
        return $order;
    }
}
