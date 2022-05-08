<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Recipient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Order all for each branch
    public function branch1(){
        $orders = Order::where('original_branch', '1')->orderBy('id', 'ASC')->get();

        return view('backend.order.order_view', compact('orders'));
    }
    public function branch2(){
        $orders = Order::where('original_branch', '2')->orderBy('id', 'ASC')->get();

        return view('backend.order.order_view', compact('orders'));
    }
    public function branch3(){
        $orders = Order::where('original_branch', '3')->orderBy('id', 'ASC')->get();

        return view('backend.order.order_view', compact('orders'));
    }

    // All Pending order for each branch
    public function pending1(){
        $branch1 = Order::where('original_branch', '1')->where('status', 'Pending')->get();

        return view('backend.order.order_view1', compact('branch1'));
    }
    public function pending2(){
        $branch2 = Order::where('original_branch', '2')->where('status', 'Pending')->get();

        return view('backend.order.order_view2', compact('branch2'));
    }
    public function pending3(){
        $branch3 = Order::where('original_branch', '3')->where('status', 'Pending')->get();

        return view('backend.order.order_view3', compact('branch3'));
    } 

    // All Confirmed order for each branch
    public function confirmed1(){
        $branch1 = Order::where('original_branch', '1')->where('status', 'Confirmed')->get();

        return view('backend.order.orderConfirmed_view1', compact('branch1'));
    }
    public function confirmed2(){
        $branch2 = Order::where('original_branch', '2')->where('status', 'Confirmed')->get();

        return view('backend.order.orderConfirmed_view2', compact('branch2'));
    }
    public function confirmed3(){
        $branch3 = Order::where('original_branch', '3')->where('status', 'Confirmed')->get();

        return view('backend.order.orderConfirmed_view3', compact('branch3'));
    } 

    // All Processing order for each branch
    public function processing1(){
        $branch1 = Order::where('original_branch', '1')->where('status', 'Processing')->get();

        return view('backend.order.orderProcessing_view1', compact('branch1'));
    }
    public function processing2(){
        $branch2 = Order::where('original_branch', '2')->where('status', 'Processing')->get();

        return view('backend.order.orderProcessing_view2', compact('branch2'));
    }
    public function processing3(){
        $branch3 = Order::where('original_branch', '3')->where('status', 'Processing')->get();

        return view('backend.order.orderProcessing_view3', compact('branch3'));
    } 

    // All arrived order for each branch
    public function arrived1(){
        $branch1 = Order::where('original_branch', '1')->where('status', 'Arrived')->get();

        return view('backend.order.orderArrived_view1', compact('branch1'));
    }
    public function arrived2(){
        $branch2 = Order::where('original_branch', '2')->where('status', 'Arrived')->get();

        return view('backend.order.orderArrived_view2', compact('branch2'));
    }
    public function arrived3(){
        $branch3 = Order::where('original_branch', '3')->where('status', 'Arrived')->get();

        return view('backend.order.orderArrived_view3', compact('branch3'));
    }

    // All picked order for each branch
    public function picked1(){
        $branch1 = Order::where('original_branch', '1')->where('status', 'Picked')->get();

        return view('backend.order.orderPicked_view1', compact('branch1'));
    }
    public function picked2(){
        $branch2 = Order::where('original_branch', '2')->where('status', 'Picked')->get();

        return view('backend.order.orderPicked_view2', compact('branch2'));
    }
    public function picked3(){
        $branch3 = Order::where('original_branch', '3')->where('status', 'Picked')->get();

        return view('backend.order.orderPicked_view3', compact('branch3'));
    }

    // Update Status 
    public function pendingToConfirmed($id){
        $order = Order::find($id)->update([
            'confirmed_date' => Carbon::now(),
            'status' => 'Confirmed'
        ]);
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending1.view')->with($notification);
    }
    public function ConfirmedToProcessing($id){
        $order = Order::find($id)->update([
            'processing_date' => Carbon::now(),
            'status' => 'Processing'
        ]);
        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed1.view')->with($notification);
    }
    public function ProcessingToArrived($id){
        $order = Order::find($id)->update([
            'arrvied_date' => Carbon::now(),
            'status' => 'Arrived'
        ]);
        $notification = array(
            'message' => 'Order Arrived Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing1.view')->with($notification);
    }
    public function ArrivedToPicked($id){
        $order = Order::find($id)->update([
            'picked_date' => Carbon::now(),
            'status' => 'Picked'
        ]);
        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing1.view')->with($notification);
    }

    // Status for Admin Branch1 - from Original Branch
    public function PendingAdmin1(){
        $branch1 = Order::where('original_branch', '1')->where('status', 'Pending')->get();

        return view('backend.order.admin1_view.order_view1', compact('branch1'));
    }
    public function ConfirmedAdmin1(){
        $branch1 = Order::where('original_branch', '1')->where('status', 'Confirmed')->get();

        return view('backend.order.admin1_view.orderConfirmed_view1', compact('branch1'));
    }
    public function ProcessingAdmin1(){
        $branch1 = Order::where('destination_branch', '1')->where('status', 'Processing')->get();

        return view('backend.order.admin1_view.orderProcessing_view1', compact('branch1'));
    }
    public function ArrivedAdmin1(){
        $branch1 = Order::where('destination_branch', '1')->where('status', 'Arrived')->get();

        return view('backend.order.admin1_view.orderArrived_view1', compact('branch1'));
    }
    public function PickedAdmin1(){
        $branch1 = Order::where('destination_branch', '1')->where('status', 'Picked')->get();

        return view('backend.order.admin1_view.orderPicked_view1', compact('branch1'));
    }

    // Status for Admin Branch2 - from Original Branch
    public function PendingAdmin2(){
        $branch1 = Order::where('original_branch', '2')->where('status', 'Pending')->get();

        return view('backend.order.admin2_view.order_view2', compact('branch1'));
    }
    public function ConfirmedAdmin2(){
        $branch1 = Order::where('original_branch', '2')->where('status', 'Confirmed')->get();

        return view('backend.order.admin2_view.orderConfirmed_view2', compact('branch1'));
    }
    public function ProcessingAdmin2(){
        $branch1 = Order::where('destination_branch', '2')->where('status', 'Processing')->get();

        return view('backend.order.admin2_view.orderProcessing_view2', compact('branch1'));
    }
    public function ArrivedAdmin2(){
        $branch1 = Order::where('destination_branch', '2')->where('status', 'Arrived')->get();

        return view('backend.order.admin2_view.orderArrived_view2', compact('branch1'));
    }
    public function PickedAdmin2(){
        $branch1 = Order::where('destination_branch', '2')->where('status', 'Picked')->get();

        return view('backend.order.admin2_view.orderPicked_view2', compact('branch1'));
    }
    // Update Status Sub Admin Branch 
    public function pendingToConfirmed1($id){
        $order = Order::find($id)->update([
            'confirmed_date' => Carbon::now(),
            'status' => 'Confirmed'
        ]);
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('PendingAdmin1')->with($notification);
    }
    public function ConfirmedToProcessing1($id){
        $order = Order::find($id)->update([
            'processing_date' => Carbon::now(),
            'status' => 'Processing'
        ]);
        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ConfirmedAdmin1')->with($notification);
    }
    public function ProcessingToArrived1($id){
        $order = Order::find($id)->update([
            'arrvied_date' => Carbon::now(),
            'status' => 'Arrived'
        ]);
        $notification = array(
            'message' => 'Order Arrived Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ProcessingAdmin1')->with($notification);
    }
    public function ArrivedToPicked1($id){
        $order = Order::find($id)->update([
            'picked_date' => Carbon::now(),
            'status' => 'Picked'
        ]);
        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ArrivedAdmin1')->with($notification);
    }
    // update status branch2
    public function pendingToConfirmed2($id){
        $order = Order::find($id)->update([
            'confirmed_date' => Carbon::now(),
            'status' => 'Confirmed'
        ]);
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('PendingAdmin2')->with($notification);
    }
    public function ConfirmedToProcessing2($id){
        $order = Order::find($id)->update([
            'processing_date' => Carbon::now(),
            'status' => 'Processing'
        ]);
        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ConfirmedAdmin2')->with($notification);
    }
    public function ProcessingToArrived2($id){
        $order = Order::find($id)->update([
            'arrvied_date' => Carbon::now(),
            'status' => 'Arrived'
        ]);
        $notification = array(
            'message' => 'Order Arrived Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ProcessingAdmin2')->with($notification);
    }
    public function ArrivedToPicked2($id){
        $order = Order::find($id)->update([
            'picked_date' => Carbon::now(),
            'status' => 'Picked'
        ]);
        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ArrivedAdmin2')->with($notification);
    }

    // order Detail && Sub Detail
    public function detail($id){
        $order = Order::find($id);
        $orderItem = OrderItem::with('order')->where('order_id', $id)->orderBy('id', 'ASC')->get();
        $recipient = Recipient::find($order->recipient_id);

        return view('backend.order.order_detail',  compact('order', 'orderItem', 'recipient'));
    }
    public function sub_detail($id){
        $order = Order::find($id);
        $orderItem = OrderItem::with('order')->where('order_id', $id)->orderBy('id', 'ASC')->get();
        $recipient = Recipient::find($order->recipient_id);

        return view('backend.order.order_detail_sub',  compact('order', 'orderItem', 'recipient'));
    }
    public function sub_detail2($id){
        $order = Order::find($id);
        $orderItem = OrderItem::with('order')->where('order_id', $id)->orderBy('id', 'ASC')->get();
        $recipient = Recipient::find($order->recipient_id);

        return view('backend.order.order_detail_sub2',  compact('order', 'orderItem', 'recipient'));
    }
}
