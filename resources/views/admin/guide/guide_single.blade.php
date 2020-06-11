@extends('layouts.admin')
@section('title','Guide Profile')
@section('style')
<link rel="stylesheet" href="{{asset('assets/frontend/css/guide_dash.css')}}">
    <style>
    .file-upload {
	position: relative;
	display: inline-block;
}

.file-upload__label {
  display: block;
  border-radius: .4em;
  transition: background .3s;  
  &:hover {
     cursor: pointer;
     background: #000;
  }
}    
.file-upload__input {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    font-size: 1;
    width:0;
    height: 100%;
    opacity: 0;
  }
  .img {cursor: -webkit-grab; cursor: grab;}
</style>
@endsection
@section('content')
<div class="pb-2">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="breadcrumbs-area clearfix">
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li><span>Guide profile</span></li>
                        </ul>
                        <ul class="breadcrumbs pull-right">
                            <li>
                                <button onclick="Approve({{$guide->id}})" class="btn btn-sm {{$guide->verified_at  == 1 ?'btn-info':'btn-warning'}}">
                                    {{$guide->verified_at == 1 ?'Aprrove':'Not Approve'}}
                                </button>
                                <form id="app-form-{{ $guide->id }}" action="{{ route('admin.guide_approve', $guide->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('POST')
                                   </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<main role="main" class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                  </div>
            <div class="container">
                <div class="row">
                      
                  <div class="col-md-8">
                      <div class="card pb-5 p-4">
                        <h3 class="pb-4">Profile completed <span style="color:{{ $total >80 ?'green' :'crimson' }}">{{ round($total) }}%</span></h3>
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ $total }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $total }}%">
                                {{ round($total) }}%
                            </div>
                          </div>
                      </div>
                      <div class="card pt-4">
                          <div class="fb-profile pb-5">
                              <img align="left" class="fb-image-lg" src="@if($guide->back_pic != null)
                              {{ asset('guide/profile/cover/'.$guide->back_pic) }}
                              @else
                              {{asset('assets/frontend/images/bg_2.jpg')}}
                              @endif" alt="Profile image example" class="img-fluid"/>
                              <img align="left" class="fb-image-profile thumbnail" src="@if($guide->profile_pic != null)
                              {{ asset('guide/profile/'.$guide->profile_pic) }}
                              @else
                              {{asset('assets/frontend/images/avatar.jpg')}}
                              @endif" alt="Profile" width="200"/>
                              
                          </div> 
                          <div class="card-body pt-5 p-5">
                                  <h3 class="pb-2"><i class="fas fa-user pr-2"></i> {{@$guide->name}}</h3>
                                  @if (@$guide->location)                                                
                                  <p><b><i class="fas fa-map-marker-alt pr-2"></i> </b>{{@$guide->location}}</p>
                                  @endif
                                  @if (@$guide->language)                                                
                                  <p><b><i class="fas fa-globe pr-2"></i> </b> {{@$guide->language}}</p> 
                                  @endif
                                  @if (@$guide->rate)                                                
                                  <p><b><i class="fas fa-dollar-sign pr-2"></i> </b> {{@$guide->rate}} $(Hourly)</p> 
                                  @endif
                                  <p><b><i class="{{@$guide->verified_at == 1?'fas fa-check-circle':'fas fa-times-circle red'}} pr-2"></i>  </b> {{@$guide->verified_at == 1 ?'Verified':'Not verified'}} </p>
                                  
                                  
                          </div> 
                           
                      </div> 
                      
                  </div>
                </div>
            </div>
</main>

@endsection
@section('script')
<script>
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