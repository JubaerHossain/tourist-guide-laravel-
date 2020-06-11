@extends('frontend.layout.app')
@section('title','Dashboard guide')
@push('css')
<link rel="stylesheet" href="{{asset('assets/frontend/css/guide_dash.css')}}">
@endpush
@section('content')
    <section class="profile-section">
        <div class="container pt-5 pb-4 p-5">
            <div class="row">                
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item pro-guide list-group-item-action active" href="{{route('front.guide_dashboard')}}" role="tab">Profile</a>
                    <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.edit_profile')}}" role="tab">Edit Profile</a>
                    <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.introduce_profile')}}" role="tab">Introduce</a>
                    <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.details')}}" role="tab">Detals Guide</a>
                    <a class="list-group-item pro-guide list-group-item-action"  role="tab" href="{{route('guide.place')}}">Add Place</a>
                    <a class="list-group-item pro-guide list-group-item-action" href="{{route('guide.earning')}}" role="tab">Balance</a>
                </div>
                <div class="col-md-10">
                            <div class="card p-4 pb-5">
                                    <h3 class="pb-4">Your Profile completed <span style="color:{{ $total >80 ?'green' :'crimson' }}">{{ round($total) }}%</span></h3>
                                   @if (@Auth::user()->guide->verified_at == 1)                                       
                                   <span class="alert-success p-2">You are active now !</span>
                                   @endif
                                   @if (!(round($total) >= 80))
                                   <span class="alert-danger p-2">You can not approve yet !</span>
                                   <p>You need to update your profile for getting upto 80% </p> 
                                   @else
                                   @if (@Auth::user()->guide->verified_at == 0)                                       
                                     <span class="alert-danger p-2">You are processing to approve!</span>
                                   @endif                                   
                                   @endif                                   
                                    <br>
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ $total }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $total }}%">
                                          {{ round($total) }}%
                                      </div>
                                    </div>
                            </div>
                            <div class="card pt-5">        
                                    <div class="fb-profile pb-5">
                                        <img align="left" class="fb-image-lg" src="@if(Auth::check())
                                        @if(App\User::find(Auth::id())->guide->back_pic != null)
                                        {{ asset('guide/profile/cover/'.Auth::user()->guide->back_pic) }}
                                        @else
                                        {{asset('assets/frontend/images/bg_2.jpg')}}
                                        @endif
                                        @endif" alt="Profile image example" class="img-fluid"/>
                                        <img align="left" class="fb-image-profile thumbnail" src="@if(Auth::check())
                                        @if(App\User::find(Auth::id())->guide->profile_pic != null)
                                        {{ asset('guide/profile/'.Auth::user()->guide->profile_pic) }}
                                        @else
                                        {{asset('assets/frontend/images/avatar.jpg')}}
                                        @endif
                                        @endif" alt="Profile"/>
                                        
                                    </div> 
                                    <div class="card-body pt-5 p-5">
                                            <h3 class="pb-2"><i class="fas fa-user pr-2"></i> {{@Auth::user()->name}}</h3>
                                            @if (@Auth::user()->guide->location)                                                
                                            <p><b><i class="fas fa-map-marker-alt pr-2"></i> </b>{{@Auth::user()->guide->location}}</p>
                                            @endif
                                            @if (@Auth::user()->guide->language)                                                
                                            <p><b><i class="fas fa-globe pr-2"></i> </b> {{@Auth::user()->guide->language}}</p> 
                                            @endif
                                            @if (@Auth::user()->guide->rate)                                                
                                            <p><b><i class="fas fa-dollar-sign pr-2"></i> </b> {{@Auth::user()->guide->rate}} $(Hourly)</p> 
                                            @endif
                                            <p><b><i class="{{@Auth::user()->verified_at == 1?'fas fa-check-circle':'fas fa-times-circle red'}} pr-2"></i>  </b> {{@Auth::user()->verified_at == 1 ?'Verified':'Not verified'}} </p>                                            
                                        

                                    </div> 
                            </div>           
                    
                </div>
            </div>
        </div>
    </section>
   @endsection
   @push('js')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
   @endpush