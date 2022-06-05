@extends('admin.admin_master_branch3')
@section('admin')

    <div class="container-full">
        <div class="col" style="display: flex; justify-content:center; align-items:center;
            width:100%; height:500px;">
            <div class="d-flex align-items-center justify-content-center">					 	
				<img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
				<h3><b>KMN</b> welcome {{Auth::user()->name}}</h3>
			</div>
        </div>
    </div>

@endsection