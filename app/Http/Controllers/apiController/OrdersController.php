<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Recipient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function insert(Request $request){

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->recipient_id = $request->recipient_id;
        $order->original_branch = $request->original_branch;
        $order->destination_branch = $request->destination_branch ;
        $order->order_date = Carbon::now()->format('d F Y');
        $order->order_month = Carbon::now()->format('F Y');
        $order->order_year = Carbon::now()->format('Y');
        $order->status = 'Pending';
        $order->save();
        
        foreach($request->order_items as $item){
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->category_id = $item['category_id'];
            $orderItem->parcel_name = $item['parcel_name'];
            $orderItem->weight = $item['weight'];
            $orderItem->width_height = $item['width_height'];
            $orderItem->save();
        }

        return response('Success', 200);

    }
    public function show($id){
        return new OrderResource(Order::find($id));
    }
    public function delete($id){
        Order::destroy($id);
        return response('delete successful', 200);
    }
    public function showItem($id){
        $orderItem = OrderItem::find($id);
        return $orderItem;
    }
}