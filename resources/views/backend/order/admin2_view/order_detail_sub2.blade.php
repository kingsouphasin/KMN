@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 <div class="content-header">
             <div class="d-flex slign-items-center">
                 <div class="mr-auto">
                     <h3 class="page-title">Order Details</h3>
                     <div class="d-inline-block align-items-center">
                         <nav>
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                 <li class="breadcrumb-item" aria-current="page">Order Details</li>
                             </ol>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			
            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>User Details</strong></h4>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Name : </th>
                            <th>{{ $order->user->name }} </th>
                        </tr>
                        <tr>
                            <th>Gender : </th>
                            <th>{{ $order->user->gender }} </th>
                        </tr>
                        <tr>
                            <th>Phone : </th>
                            <th>{{ $order->user->phone }} </th>
                        </tr>
                        <tr>
                            <th>Email : </th>
                            <th>{{ $order->user->email }} </th>
                        </tr>
                    </table>
                </div>
                
                {{-- Sender --}}
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Sender Details</strong></h4>
                    </div>
                    <table class="table">
                    
                        <tr>
                            <th>Name : </th>
                            
                            <th>{{ $sender->name}}</th>
                        
                        </tr>
                        
                        <tr>
                            <th>Surname : </th>
                            <th>{{ $sender->surname}}</th>
                        </tr>
                        <tr>
                            <th>Tel : </th>
                            <th>{{ $sender->tel}}</th>
                        </tr>
                        <tr>
                            <th>Address : </th>
                            <th>{{ $sender->address}}</th>
                        </tr>
                        
                    </table>
                </div>

                {{-- Recipient --}}
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Recipient Details</strong></h4>
                    </div>
                    <table class="table">
                    
                        <tr>
                            <th>Name : </th>
                            
                            <th>{{ $recipient->name}}</th>
                        
                        </tr>
                        
                        <tr>
                            <th>Surname : </th>
                            <th>{{ $recipient->surname}}</th>
                        </tr>
                        <tr>
                            <th>Tel : </th>
                            <th>{{ $recipient->tel}}</th>
                        </tr>
                        <tr>
                            <th>Address : </th>
                            <th>{{ $recipient->address}}</th>
                        </tr>
                        
                    </table>
                </div>
                
            </div>
            

            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Order Details </strong><span class="text-danger"> Invoice {{ $order->invoice_id}}</span></h4>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Invoice ID : </th>
                            <th class="text-danger">{{ $order->invoice_id}} </th>
                        </tr>
                        <tr>
                            <th>Original Branch : </th>
                            <th class="text-danger">{{ $order->original->name }} </th>
                        </tr>
                        <tr>
                            <th>Destination Branch : </th>
                            <th class="text-danger">{{ $order->destination->name }} </th>
                        </tr>
                        <tr>
                            <th>Name : </th>
                            <th>{{ $order->user->name }} </th>
                        </tr>
                        <tr>
                            <th>Phone : </th>
                            <th>{{ $order->user->phone }} </th>
                        </tr>
                        <tr>
                            <th>Gender : </th>
                            <th>{{ $order->user->gender }} </th>
                        </tr>
                        
                        <tr>
                            <th>Order Date : </th>
                            <th class="text-danger">{{ $order->order_date }} </th>
                        </tr>

                        <tr>
                            <th>Order Month : </th>
                            <th class="text-danger">{{ $order->order_month }} </th>
                        </tr>

                        <tr>
                            <th>Order Year : </th>
                            <th>{{ $order->order_year }}</th>
                        </tr>
                        <tr>
                            <th>Order Status : </th>
                            <th><span class="badge badge-pill badge-primary">{{ $order->status }}</span> </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>
                                @if ($order->status == 'Pending')
                                    <a href="{{route('pendingToConfirmed2', $order->id)}}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                
                                @elseif ($order->status == 'Confirmed')
                                    <a href="{{route('ConfirmedToProcessing2', $order->id)}}" class="btn btn-block btn-success" id="processing">Processing Order</a>
                                @elseif ($order->status == 'Processing')
                                    <a href="{{route('ProcessingToArrived2', $order->id)}}" class="btn btn-block btn-success" id="picked">Arrived Order</a>
                                @elseif ($order->status == 'Arrived')
                                    <a href="{{route('ArrivedToPicked2', $order->id)}}" class="btn btn-block btn-success" id="picked">Pick Order</a>
                                @endif
                            </th>
                        </tr>

                    </table>
                </div>
            </div>

            

            <div class="col-md-12 col-12">
                <div class="box box-bordered border-primary">
                    
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Order Items</strong></h4>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                
                                <td class="col-md-3">
                                    <label for=""> Parcel Name </label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""> Width + Height </label>
                                </td>
                            
                                <td class="col-md-2">
                                    <label for=""> Weight </label>
                                </td>
                               
                                <td class="col-md-1">
                                    <label for=""> Category </label>
                                </td>
                                @if ($order->status == 'Pending')
                                    <td class="col-md-1">
                                    <label for=""> Edit </label>
                                </td>
                                @endif
                                
                            </tr>

                            @foreach ($orderItem as $item)
                            <tr>
                            
                                <td class="col-md-3">
                                    <label for=""> {{ $item->parcel_name }} </label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""> {{ $item->width_height }} </label>
                                </td>
                        
                                <td class="col-md-2">
                                    <label for=""> {{ $item->weight }} </label>
                                </td>
                                
                                <td class="col-md-2">
                                    <label for=""> {{ $item->categories->name}} </label>
                                </td>
                                
                                @if ($order->status == 'Pending')
                                    <td>
                                        <a href="{{route('SubAdmin_Edit_view_branch2', $item->id)}}" class="btn btn-info" title="Edit Data" ><i class="fa fa-pencil"></i> </a>
                                    </td>
                                @endif
                                
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection