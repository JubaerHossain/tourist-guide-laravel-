@extends('frontend.layout.app')
@section('title','Profile update')
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
                        <a class="list-group-item pro-guide list-group-item-action active" href="{{route('guide.edit_profile')}}" role="tab">Edit Profile</a>
                        <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.introduce_profile')}}" role="tab">Introduce</a>
                        <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.details')}}" role="tab">Detals Guide</a>
                        <a class="list-group-item pro-guide list-group-item-action"  role="tab" href="{{route('guide.place')}}">Add Place</a>
                        <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.earning')}}" role="tab">Balance</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="tab-content" id="nav-tabContent">
                            <form  action="{{route('guide.profile_update')}}" enctype="multipart/form-data" method="POST">
                                <div class="card">
                                        <div class="fb-profile pb-5">
                                       @csrf
                                            <div class="cover-pic">
                                                <img align="left" class="fb-image-lg" src="@if(Auth::check())
                                                @if(App\User::find(Auth::id())->guide->back_pic != null)
                                                {{ asset('guide/profile/cover/'.Auth::user()->guide->back_pic) }}
                                                @else
                                                {{asset('assets/frontend/images/bg_2.jpg')}}
                                                @endif
                                                @endif" alt="Profile image example" class="img-fluid"/>
                                                @csrf
                                                    <div class="text-block"> 
                                                        <label class="file-upload cover btn btn-outline-danger" style="display:none">
                                                            Change cover picture <input type="file" name="back_pic" onchange="readURL(this);"/>
                                                        </label>
                                                    </div>
                                            </div>
                                       
                                           
                                                <img align="left" class="fb-image-profile profile thumbnail" src="@if(Auth::check())
                                                @if(App\User::find(Auth::id())->guide->profile_pic != null)
                                                {{ asset('guide/profile/'.Auth::user()->guide->profile_pic) }}
                                                @else
                                                {{asset('assets/frontend/images/avatar.jpg')}}
                                                @endif
                                                @endif" alt="Profile image example"/>
                                                <div class="profile-block"> 
                                                    <label class="file-upload profile btn btn-outline-danger btn-profile">
                                                        Browse for file <input type="file" name="profile_pic" onchange="profile(this)"/>
                                                    </label>
                                                </div>
                                           
                                        </div> 
                                        <div class="card-body pt-5 p-5 information-profile">   
                                                <label for="name">Name*</label>                                            
                                                <input type="text" name="name" class="form-control" placeholder="Ex: John smith"  value="{{@Auth::user()->name}}">

                                                <label for="location">Location*</label> 
                                                <input type="text" name="location" class="form-control location_val" placeholder="Ex: Tamil nadu"  value="{{@Auth::user()->guide->location}}">
                                              
                                                <label for="language">Language*</label> 
                                                <input type="text" name="language" class="form-control" placeholder="Ex: Tamil, English, Bangla"  value="{{@Auth::user()->guide->location}}">
                                                                                               
                                                <label for="rate">Rate*</label> 
                                                <input type="text" name="rate" class="form-control" placeholder="Ex: 8 $" value="{{@Auth::user()->guide->rate}}">  
                                                @php
                                                $countries = DB::table('countries')->orderBy('name', 'asc')->get();
                                               @endphp                                            
                                                <label for="rate">Country</label> 
                                                <select name="country" class="form-control">
                                                    <option value=""> ---- Select country ----</option>
                                                    @foreach ($countries as $item)                                                    
                                                    <option {{ $item->name == @Auth::user()->guide->country?'selected':'' }} value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>  
                                               
                                                <label for="state">State*</label> 
                                                <select class="form-control" name="state" id="">
                                                    <option value="{{@Auth::user()->guide->state}}">{{@Auth::user()->guide->state}}</option>
                                                </select> 

                                                <div class="form-group">     
                                                    <label for="name">NID*</label><br>
                                                    <input type="file" class="file-pic" name="nid" onchange="NID(this)">                                     
                                                    <img align="right" class="nid_pic border" src="@if(Auth::check())
                                                    @if(App\User::find(Auth::id())->guide->nid != null)
                                                    {{ asset('guide/Nid/'.Auth::user()->guide->nid) }}
                                                    @else
                                                    {{asset('assets/frontend/images/file_pic.png')}}
                                                    @endif
                                                    @endif" alt="Profile image example" width="100" height="100"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Birth certificate</label><br>
                                                    <input type="file" class="file-pic" name="bc" onchange="BC(this)">                                      
                                                    <img align="right" class="bc_pic border" src="@if(Auth::check())
                                                    @if(App\User::find(Auth::id())->guide->bc != null)
                                                    {{ asset('guide/BC/'.Auth::user()->guide->bc) }}
                                                    @else
                                                    {{asset('assets/frontend/images/file_pic.png')}}
                                                    @endif
                                                    @endif" alt="Profile image example" width="100" height="100"/> <br>
                                                </div>                                
                                                <div class="form-group">
                                                    <label for="name">Passport*</label><br>
                                                    <input type="file" class="file-pic" name="pid" onchange="PID(this)">                                       
                                                    <img align="right" class="pid_pic border" src="@if(Auth::check())
                                                    @if(App\User::find(Auth::id())->guide->pid != null)
                                                    {{ asset('guide/PID/'.Auth::user()->guide->pid) }}
                                                    @else
                                                    {{asset('assets/frontend/images/file_pic.png')}}
                                                    @endif
                                                    @endif" alt="Profile image example" width="100" height="100"/> <br>
                                                </div>                         
                                                
                                                <p><b><i class="{{@Auth::user()->verified_at == 1?'fas fa-check-circle':'fas fa-times-circle red'}} pr-2"></i>  </b> {{@Auth::user()->verified_at == 1 ?'Verified':'Not verified'}} </p>
                                        </div> 
                                        <button type="submit" class="btn btn-outline-danger up_btn" >update</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </section>
   @endsection
   @push('js')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script>
      $('.cover-pic').mouseenter(function() {
          $('.cover').css("display","block")
        });
       </script>
       <script>
      $('.cover-pic').mouseleave(function() {
          $('.cover').css("display","none")
        });
       </script>
       <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.fb-image-lg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function profile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.thumbnail')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function NID(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.nid_pic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function BC(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.bc_pic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function PID(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.pid_pic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

       </script>
       <script>
        $(document).ready(function () {
    
            $("select[name='country']").change(function () {
                var ca = $("select[name='country']").val();                
                          
                $.ajax({
                    url: window.origin+'/state/'+ca,
                    method: 'GET',
                    success:function (data) {
    //                    console.log(data.state[0]);
                        $("select[name='state']").html("");
                        for(var i=0;i<data.state[0].length;i++){
                            $("select[name='state']").append("<option value='"+data.state[0][i]+"'>"+data.state[0][i]+"</option>");
                        }
                    }
                });
            });
    
        });
    </script>
   @endpush