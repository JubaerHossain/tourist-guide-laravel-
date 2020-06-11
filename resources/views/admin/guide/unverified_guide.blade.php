@extends('layouts.admin')
@section('title','Unverified guide list')
@section('style')		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

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
	 i{
		 cursor: pointer;		 
	 }
	
	</style>
@endsection
@section('content')
<div class="pb-3">
		<div class="row align-items-center">
				<div class="col-sm-6">
						<div class="breadcrumbs-area clearfix">
								<ul class="breadcrumbs pull-left">
										<li><a href="{{ route('admin.dashboard') }}">Home</a></li>
										<li><span>Unverified guide list</span></li>
								</ul>
						</div>
				</div>
		</div>
</div>
<main role="main" class="col-md-12">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		
		</div>
	<div class="dashboard-item">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped text-center">
						<thead style="background: rgb(0, 105, 217);color: #fff;">							
							<th>Name</th>
							<th>Phone</th>
							<th>Country</th>
							<th>Image</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($guide as $key => $c)
							@if (!@$c->user->email_verified_at)
							
							<tr>
								<td>{{$c->name}}</td>
								<td>{{$c->user->phone}}</td>
								<td>{{$c->country}}</td>
								<td>
                                        <img align="left" class="fb-image-profile thumbnail" src="
                                        @if($c->profile_pic != null)
                                        {{ asset('guide/profile/'.$c->profile_pic) }}
                                        @else
                                        {{asset('assets/frontend/images/avatar.jpg')}}
                                        @endif" alt="Profile" width="70"/>
                                </td>
								<td>
									<a class="btn btn-primary btn-sm" href="{{route('admin.guide_view',$c->id)}}"><i class="fa fa-eye"></i></a>
								  
								  
									 <button onclick="delePro({{$key}})" class="btn btn-danger btn-sm">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									 </button>
									 <form id="delete-form-{{ $key }}" action="{{ route('admin.guide_delete', $c->user->id) }}" method="POST" style="display: none;">
										@csrf
										@method('DELETE')
									 </form>
								</td>
							</tr>
								
							@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection
@section('script')
<script src="{{asset('js/sweet-alert.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
	$(".js-example-tags").select2({
      tags: true
    }); 
			function delePro(id) {
			swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete!',
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

	function Approve(id) {
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
								document.getElementById('app-form-'+id).submit();
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
</script>
@endsection
