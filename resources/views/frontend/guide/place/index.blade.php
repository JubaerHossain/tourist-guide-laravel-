@extends('frontend.layout.app')
@section('title','Place')
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
                        <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.details')}}" role="tab">Detals Guide</a>
                        <a class="list-group-item pro-guide list-group-item-action active"  role="tab" href="{{route('guide.place')}}">Add Place</a>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>   
                                    @foreach (@Auth::user()->guide->guide_posts as $key => $item) 
                                  <tr>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->title }}</td>
                                  <td>
                                    <img align="left" class="" src="
                                        @if($item->image != null)
                                        {{ asset('guide/place/'.$item->image) }}
                                        @else
                                        {{asset('assets/frontend/images/avatar.jpg')}}
                                        @endif" alt="Profile" width="70"/>
                                  </td>
                                  <td>{{ $item->rate }}$</td>
                                    <td>
                                    <button class="btn btn-success btn-sm"  data-target="#edit{{$item->id}}" data-toggle="modal"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="delePro({{$key}})"><i class="fas fa-trash-alt"></i></button>
                                    <form id="delete-form-{{ $key }}" action="{{ route('guide.place_delete', $item->id) }}" method="POST" style="display: none;">
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
                  <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Place</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <form  action="{{route('guide.add_place')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                    <label for="name">Name*</label><br>
                                      <input type="text" name="name" class="form-control" placeholder="EX: Baecelona ">                                
                            </div> 
                            <div class="form-group">
                                    <label for="name">Title*</label><br>
                                      <input type="text" name="title" class="form-control" placeholder="EX: Barcelona's Kickstart ">                                
                            </div> 
                            <div class="form-group">     
                              <label for="name">Image*</label><br>
                              <input type="file" class="pb-2" name="image" onchange="place(this)">                                     
                              <img align="right" class="place_pic border" src="{{asset('assets/frontend/images/file_pic.png')}}" alt="Profile image example" width="100" height="100"/>
                              
                            </div>
                            <div class="form-group">
                                    <label for="name">Rate*</label><br>
                                    <input type="text" class="form-control" name="rate" placeholder="EX: 20$ ">                                
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
        @foreach (@Auth::user()->guide->guide_posts as $key => $item)
        <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content passions">
                <div class="modal-header">
                  <h5 class="modal-title text-white" id="edit">Edit Place</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <form  action="{{route('guide.update_place',$item->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                    <label for="name">Name*</label><br>
                                    <input type="text" name="name" class="form-control" placeholder="EX: Baecelona " value="{{ $item->name }}">                                
                            </div> 
                            <div class="form-group">
                                    <label for="name">Title*</label><br>
                                    <input type="text" name="title" class="form-control" placeholder="EX: Barcelona's Kickstart " value="{{ $item->title }}">                                
                            </div> 
                            <div class="form-group">     
                              <label for="name">Image*</label><br>
                                <input type="file" class="pb-2" name="image" onchange="Updateplace(this)">                                     
                              <img align="right" class="up-pic border" src="@if($item->image != null)
                              {{ asset('guide/place/'.$item->image) }}
                              @else
                              {{asset('assets/frontend/images/avatar.jpg')}}
                              @endif" alt="Profile image example" width="100" height="100"/>
                              
                            </div>
                            <div class="form-group">
                                    <label for="name">Rate*</label><br>
                                    <input type="text" class="form-control" name="rate" placeholder="EX: 20$ " value="{{ $item->rate }}">                                
                            </div> 
                            <button type="submit" class="btn btn-outline-danger up_btn" >Update</button>
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
	function place(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.place_pic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	function Updateplace(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.up-pic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
   @endpush