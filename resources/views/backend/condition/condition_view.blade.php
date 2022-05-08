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
				  <h3 class="box-title">Condition List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>id </th>
								<th>Condition</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
	 @foreach($condition as $item)
	 <tr>
		<td>{{ $item->id }}</td>
		<td>{{ $item->note }}</td>
		<td>
            <a href="{{route('condition.edit', $item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
            <a href="{{route('condition.delete', $item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
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
				  <h3 class="box-title">Add Condition </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{route('condition.store')}}" enctype="multipart/form-data">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Condition Note<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="note" class="form-control" > 
	 @error('note') 
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