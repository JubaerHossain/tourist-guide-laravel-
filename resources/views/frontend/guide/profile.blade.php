@extends('frontend.layout.app')
@section('title','Local guide')
@section('content')
    <section class="profile-section">
        <div class="container-fluid pt-5 pb-4 p-5">
            <div class="row">
                    <div class="col-md-4 pb-4">
                            <div class="card hovercard">
                                <div class="cardheader">
                                        <img align="left" src="
                                        @if(@$user->guide->back_pic != null)
                                        {{ asset('guide/profile/cover/'.@$user->guide->back_pic) }}
                                        @else
                                        {{asset('assets/frontend/images/bg_2.jpg')}}
                                        @endif"/>
                                </div>
                                <div class="avatar text-center">
                                        <img alt="" src="@if(@$user->guide->profile_pic != null)
                                        {{ asset('guide/profile/'.@$user->guide->profile_pic) }}
                                        @else
                                        {{asset('assets/frontend/images/avatar.jpg')}}
                                        @endif">
                                </div>
                                <div class="info">
                                    <div class="title text-center">
                                        <a> {{ $user->name }} </a>
                                        <p class="rate"><b>Rating: </b>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                    </p>
                                    </div>
                                      <div class="desc p-0">
                                        <p><b><i class="fas fa-map-marker-alt"></i> </b> {{ $user->guide->location }}</p>
                                        <p><b><i class="fas fa-globe"></i> </b>  {{ $user->guide->language }} </p>
                                       
                                        <p><b><i class="fas fa-dollar-sign"> </i> </b> {{ $user->guide->rate }}$ (Hour)</p>
                                        <p><b><i class="fas fa-check-circle green"></i></b> Verified</p>
                                      </div>
                                </div>
                            </div>                    
                          </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                                <h3>Hi There! Nice to meet you</h3>
                        </div>
                        <div class="col-md-12">
                                <img src="@if(@$user->guide->guide_videos->first()->image != null)
                                {{ asset('guide/introduce/'.@$user->guide->guide_videos->first()->image) }}
                                @else
                                {{asset('assets/frontend/images/image_1.jpg')}}
                                @endif" alt="" class="img-fluid">

                                <p>{{@$user->guide->guide_videos->first()->title}}</p>

                        </div>
                        <div class="col-md-12">
                            <h3>My passions</h3>
                            <ul>
                                @foreach (@$user->guide->guide_details as $item)                                    
                                  <li>{{ $item->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <h3>Book one of my offers in {{(@$user->guide->state)}}</h3>
                            <div class="row pt-2">
                              @foreach (@$user->guide->guide_posts->where('status',1) as $item)   
                                <div class="col-md-6 pb-4">
                                    <div class="card">
                                            <img class="card-img-top" src="@if($item->image != null)
                                            {{ asset('guide/place/'.$item->image) }}
                                            @else
                                            {{asset('assets/frontend/images/image_1.jpg')}}
                                            @endif" alt="Card image cap" class="img-fluid">
                                            <div class="card-body">
                                                <div class="info">
                                                    <div class="title text-left">
                                                       <span>Enjoy {{ $item->name }} with <a href="{{ route('front.local_guide',@$user->id)}}">{{ @$user->guide->name }}</a></span><br>
                                                       <span><b>{{ $item->title }} Tour with a Local</b></span><br>
                                                        {{-- <small class="rate">
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star-o"></i>
                                                            <span>reviews (10)</span>
                                                        </small><br> --}}
                                                    <small class="pl-1"><i class="fas fa-dollar-sign"> </i> </b> {{ $item->rate }}$ (Hour)</small>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>               
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
   @endsection