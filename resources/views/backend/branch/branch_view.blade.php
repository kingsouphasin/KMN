@extends('admin.admin_master2')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand name </th>
								<th>Division</th>
								<th>District</th>
								<th>State</th>
                                <th>Tel</th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($branch as $item)
	 <tr>
		<td>{{ $item->name }}</td>
		<td>{{ $item->division }}</td>
        <td>{{ $item->district }}</td>
        <td>{{ $item->state }}</td>
        <td>{{ $item->tel }}</td>
		<td>
            <a href="{{route('branch.edit', $item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
            <a href="{{route('branch.delete', $item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
 	        <i class="fa fa-trash"></i></a>
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


<!--   ------------ Add Brand Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Branch </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{route('branch.store')}}" enctype="multipart/form-data">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Branch Name<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="branch_name" class="form-control" > 
	 @error('ame') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	<div class="form-group">
		<h5>Division<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="division" class="form-control" >
     @error('division') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>

    <div class="form-group">
		<h5>District<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="district" class="form-control" >
     @error('district') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>

    <div class="form-group">
		<h5>State<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="state" class="form-control" >
     @error('state') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>

    <div class="form-group">
		<h5>Tel<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="tel" class="form-control" >
     @error('state') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
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