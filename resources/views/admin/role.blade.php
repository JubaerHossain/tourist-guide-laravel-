@extends('layouts.admin')
@section('title','Role')
@section('style')		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<style>

		#imgArray input[type="file"] {
			display: none;
		}
		.custom-file-upload {
			border: 1px solid #ccc;
			display: inline-block;
			padding: 6px 12px;
			cursor: pointer;
		}
		#imgArray li{
			display: inline-block;
			list-style: none;
		}
		.active img {
			border: 2px solid #333 !important;
		}
		.swal2-popup .swal2-input {
    height: 40px !important;
   }
	 .swal2-popup .swal2-input, .swal2-popup .swal2-file, .swal2-popup .swal2-textarea, .swal2-popup .swal2-select, .swal2-popup .swal2-radio, .swal2-popup .swal2-checkbox {
    margin: 0 auto !important;
	 }
	 .swal2-title{
		font-size: 20px !important
    }
		.btn-info {
    background-color: #520e98 !important;
    border-color: #520e98 !important;
}
	
	</style>
@endsection
@section('content')
<div class="">
		<div class="row align-items-center">
				<div class="col-sm-6">
						<div class="breadcrumbs-area clearfix">
								<ul class="breadcrumbs pull-left">
										<li><a href="{{ route('admin.dashboard') }}">Home</a></li>
										<li><span>Add role</span></li>
								</ul>
						</div>
				</div>
		</div>
</div>
<main role="main" class="col-md-12">
	<div class="dashboard-item">
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-3">
				
					<form class="mx-auto" method="post" action="{{ route('admin.add_role') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
						<label for="exampleInputname">Role name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="E.g  Admin" name="name">
						</div>						
					    <button type="submit" class="btn btn-primary mt-3 mb-3" style="background:#8818fd;">Submit</button>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped text-center">
						<thead style="background: rgb(0, 105, 217);color: #fff;">							
							<th>SL No</th>
							<th>Role</th>
							<th>Action</th>
						</thead>
						<tbody>
								@php
								$role = DB::table('roles')->orderBy('name', 'asc')->get();
							  @endphp
							@foreach($role as $key => $c)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{$c->name}}</td>
								
								<td>								  
									 <button data-toggle="modal" onclick="role({{$c->id}})" data-target="#exampleModal" class="btn btn-info btn-sm">
										<i class="fa fa-edit" aria-hidden="true"></i>
									 </button>

									 <button onclick="delePro({{$key}})" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									 </button>
									 <form id="delete-form-{{ $key }}" action="{{ route('admin.role_delete', $c->id) }}" method="POST" style="display: none;">
										@csrf
										@method('DELETE')
									 </form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">Role Update</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<div class="modal-body">
						<form class="mx-auto" method="post" action="{{ route('admin.role_update') }}" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
							<label for="exampleInputname">Role name</label>
								<input type="text" class="form-control" id="name"  name="name">
								<input type="text" hidden class="form-control" id="id"  name="id">
							</div>						
							<button type="submit" class="btn btn-primary mt-3 mb-3" style="background:#8818fd;">Submit</button>
						</form>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
				</div>
			  </div>
			</div>
		  </div>
</main>

@endsection
@section('script')
<script src="{{asset('js/sweet-alert.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
			function delePro(id) {
			swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, do it!',
					cancelButtonText: 'No, cancel!',
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false,
					reverseButtons: true
			}).then((result) => {
					if (result.value) {
							event.preventDefault();
							document.getElementById('delete-form-'+id).submit();
					} else if (
							result.dismiss === swal.DismissReason.cancel
					) {
							swal(
									'Cancelled',
									'Your data is safe :)',
									'error'
							)
					}
			})
	}

	function role(id) {
		$.ajaxSetup({

			headers: {

				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			}

			});
		   
			$.ajax({

			type:'POST',

			url:'/admin/role-find',

			data:{id:id},

			success:function(data){
				$('#name').val(data.name);
				$('#id').val(data.id);


			}

			});	
	}
</script>
@endsection
