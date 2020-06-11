@extends('frontend.layout.app')
@section('title','Details')
@push('css')
<link rel="stylesheet" href="{{asset('assets/frontend/css/guide_dash.css')}}">
@endpush
@section('content')
    <section class="profile-section">
        <div class="container pt-5 pb-4 p-5">
            <div class="row">                
                <div class="col-md-2 pb-5">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item pro-guide list-group-item-action " href="{{route('front.guide_dashboard')}}" role="tab">Profile</a>
                        <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.edit_profile')}}" role="tab">Edit Profile</a>
                        <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.introduce_profile')}}" role="tab">Introduce</a>
                        <a class="list-group-item pro-guide list-group-item-action active" href="{{route('guide.details')}}" role="tab">Detals Guide</a>
                        <a class="list-group-item pro-guide list-group-item-action"  role="tab" href="{{route('guide.place')}}">Add Place</a>
                        <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.earning')}}" role="tab">Balance</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="float-right pb-3">
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalLong">Add</button>
                </div>
                <div class="col-auto table-responsive">
                        <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>   
                                    @foreach (@Auth::user()->guide->guide_details as $key => $item) 
                                  <tr>
                                  <td>{{ $item->title }}</td>
                                    <td>
                                    <button class="btn btn-success btn-sm"  data-target="#edit{{$item->id}}" data-toggle="modal"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="delePro({{$key}})"><i class="fas fa-trash-alt"></i></button>
                                    <form id="delete-form-{{ $key }}" action="{{ route('guide.detals_delete', $item->id) }}" method="POST" style="display: none;">
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
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content passions">
                <div class="modal-header">
                  <h5 class="modal-title text-white" id="exampleModalLongTitle">Add passions</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <form  action="{{route('guide.detals_add')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                    <label for="name">Your passions*</label><br>
                                     <textarea name="title" class="form-control" ></textarea>                                 
                                    <br>
                                </div> 
                            <button type="submit" class="btn btn-outline-danger up_btn" >Add</button>
                            </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 
                </div>
              </div>
            </div>
    </div>
    @foreach (@Auth::user()->guide->guide_details as $item)  
        <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content passions">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Add passions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form  action="{{route('guide.detals_update',$item->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                    <label for="name">Your passions*</label><br>
                                        <textarea name="title" class="form-control" class="pass_title">{{ $item->title }}</textarea>                             
                                    <br>
                                </div> 
                            <button type="submit" class="btn btn-outline-danger up_btn" >Add</button>
                            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
                </div>
                </div>
            </div>
        </div>
    @endforeach
    </section>
   @endsection
   @push('js')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    </script>
   @endpush