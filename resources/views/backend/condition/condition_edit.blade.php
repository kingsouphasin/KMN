@extends('admin.admin_master2')
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
				  <h3 class="box-title">Edit Condition </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="POST" action="{{route('condition.update', $condition->id)}}" enctype="multipart/form-data">
	 	@csrf	   

	 <div class="form-group">
		<h5>Condition Note  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="condition_note" class="form-control" value="{{ $condition->note }}" > 
	 @error('note') 
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