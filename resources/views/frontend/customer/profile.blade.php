@extends('frontend.layout.app')
@section('title','Profile')
@push('css')
<link rel="stylesheet" href="{{asset('assets/frontend/css/guide_dash.css')}}">
@endpush
@section('content')
    <section class="profile-section">
        <div class="container pt-5 pb-4 p-5">
            <div class="row">
                <div class="col-md-2 pb-5">
                    <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item pro-guide list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Profile</a>
                    <a class="list-group-item pro-guide list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Edit Profile</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="card">
                                    <div class="fb-profile pb-5">
                                        <img align="left" class="fb-image-lg" src="@if(Auth::check())
                                        @if(App\User::find(Auth::id())->customer->back_pic != null)
                                        {{ asset('customer/profile/cover/'.Auth::user()->customer->back_pic) }}
                                        @else
                                        {{asset('assets/frontend/images/bg_2.jpg')}}
                                        @endif
                                        @endif" alt="Profile image example" class="img-fluid"/>
                                        <img align="left" class="fb-image-profile thumbnail" src="@if(Auth::check())
                                        @if(App\User::find(Auth::id())->customer->profile_pic != null)
                                        {{ asset('customer/profile/'.Auth::user()->customer->profile_pic) }}
                                        @else
                                        {{asset('assets/frontend/images/avatar.jpg')}}
                                        @endif
                                        @endif" alt="Profile"/>
                                    </div> 
                                    <div class="card-body pt-5 p-5 pro-text">
                                        <h4 class="text-center pb-5"><span>Your balance : </span> {{@Auth::user()->account->total_balance}}$ </h4>
                                            <h3 class="pb-2"><i class="fas fa-user pr-2"></i> {{@Auth::user()->name}}</h3>
                                            @if (@Auth::user()->customer->location)                                                
                                            <p><b><i class="fas fa-map-marker-alt pr-2"></i> </b>{{@Auth::user()->customer->location}}</p>
                                            @endif
                                            @if (@Auth::user()->customer->language)                                                
                                            <p><b><i class="fas fa-language pr-2"></i> </b> {{@Auth::user()->customer->language}}</p> 
                                            @endif
                                            @if (@Auth::user()->customer->country)                                                
                                            <p><b><i class="fas fa-globe pr-2"></i> </b> {{@Auth::user()->customer->country}}</p> 
                                            @endif
                                            <p><b><i class="{{@Auth::user()->customer->verified_at == 1?'fas fa-check-circle green':'fas fa-times-circle red'}} pr-2"></i>  </b> {{@Auth::user()->customer->verified_at == 1 ?'Verified':'Not verified'}} </p>
                                    </div> 
                            </div>           
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <form  action="{{route('customer.profile_update')}}" enctype="multipart/form-data" method="POST">
                            <div class="card">
                                    <div class="fb-profile pb-5">
                                   
                                        <div class="cover-pic">
                                            <img align="left" class="fb-image-lg" src="@if(Auth::check())
                                            @if(App\User::find(Auth::id())->customer->back_pic != null)
                                            {{ asset('customer/profile/cover/'.Auth::user()->customer->back_pic) }}
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
                                            @if(App\User::find(Auth::id())->customer->profile_pic != null)
                                            {{ asset('customer/profile/'.Auth::user()->customer->profile_pic) }}
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
                                        <input type="text" name="location" class="form-control location_val" placeholder="Ex: Tamil nadu"  value="{{@Auth::user()->customer->location}}">
                                      
                                        <label for="language">Language*</label> 
                                        <input type="text" name="language" class="form-control" placeholder="Ex: Tamil, English, Bangla"  value="{{@Auth::user()->customer->location}}">
                                                                                       
                                        @php
                                        $countries = DB::table('countries')->orderBy('name', 'asc')->get();
                                       @endphp                                            
                                        <label for="rate">Country</label> 
                                        <select name="country" class="form-control">
                                            <option value=""> ---- Select country ----</option>
                                            @foreach ($countries as $item)                                                    
                                            <option {{ $item->name == @Auth::user()->customer->country?'selected':'' }} value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>  
                                       
                                        <label for="state">State*</label> 
                                        <select class="form-control" name="state" id="">
                                            <option value="{{@Auth::user()->customer->state}}">{{@Auth::user()->customer->state}}</option>
                                        </select>                                   
                                            
                                            <p><b><i class="{{@Auth::user()->verified_at == 1?'fas fa-check-circle':'fas fa-times-circle red'}} pr-2"></i>  </b> {{@Auth::user()->verified_at == 1 ?'Verified':'Not verified'}} </p>
                                    </div> 
                                    <button type="submit" class="btn btn-outline-danger up_btn" >update</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @endsection
   @push('js')
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