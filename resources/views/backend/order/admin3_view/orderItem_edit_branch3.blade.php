@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			 


<!--   ------------ Add Brand Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit OrderItem </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="POST" action="{{route('SubAdmin_update_branch3', $orderItem->id)}}" enctype="multipart/form-data">
	 	@csrf	   

	<div class="form-group">
		<h5>Parcel Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 		<input type="text"  name="parcel_name" class="form-control" value="{{ $orderItem->parcel_name }}" > 
	 		@error('parcel_name') 
	 			<span class="text-danger">{{ $message }}</span>
	 		@enderror 
		</div>
	</div>

	<div class="form-group">
		<h5>Width_Height  <span class="text-danger">*</span></h5>
		<div class="controls">
	 		<input type="text"  name="width_height" class="form-control" value="{{ $orderItem->width_height }}" > 
	 		@error('width_height') 
	 			<span class="text-danger">{{ $message }}</span>
	 		@enderror 
		</div>
	</div>

	<div class="form-group">
		<h5> Weight  <span class="text-danger">*</span></h5>
		<div class="controls">
	 		<input type="text"  name="weight" class="form-control" value="{{ $orderItem->weight }}" > 
	 		@error('weight') 
	 			<span class="text-danger">{{ $message }}</span>
	 		@enderror 
		</div>
	</div>
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection