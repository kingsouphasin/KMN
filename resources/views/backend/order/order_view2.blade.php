@extends('admin.admin_master2')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Order List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Date </th>
                                <th>Time </th>
								<th>User</th>
								<th>Email</th>
								<th>Destination_branch</th>
								<th>Status</th>
                                <th>Actions</th>
							</tr>
						</thead>
						<tbody>
	 @foreach($branch2 as $item)
	 
	 <tr>
		<td> {{ $item->order_date }}  </td>
        <td> {{ $item->created_at }}  </td>
		<td> {{ $item->user->name }} </td>
        <td> {{ $item->user->email }} </td>
        <td> {{ $item->destination->name }} </td>
        <td> <span class="badge badge-pill badge-primary">{{ $item->status }}</span> </td>

		<td width="25%">
 			<a href="{{route('detail_branch2',$item->id)}}" class="btn btn-info" title="View"><i class="fa fa-eye"></i> </a>
		</td>
							 
	 </tr>
	 
	  @endforeach

	  
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection