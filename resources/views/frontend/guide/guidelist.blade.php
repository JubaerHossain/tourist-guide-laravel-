@extends('frontend.layout.app')
@section('title','Guyidelist')
@section('content')
    <div class="hero-wrap guide-list {{-- js-fullheight --}}">
        <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text {{-- js-fullheight --}} align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }" style="top:100px">
                        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{route('front.hotel')}}">Home</a></span>
                             <span>Guide-list</span>
                        </p>
                        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Serch result</h1>
                    </div>
                </div>
        </div>
    </div>
    <section class="ftco-section bg-light guide-pro pt-5">
        <div class="container pt-5">
            <div class="row justify-content-start pb-3">
            <div class="col-md-7 heading-section ftco-animate ">
            <h2><strong>Guide-list</strong></h2>
            </div>
            </div>
            <div class="row">
            @foreach ($guide as $item)    
            <div class="col-lg-3 col-sm-6 pb-4">
                <div class="card hovercard">
                    <div class="cardheader">
                        <img align="left" src="
                        @if(@$item->back_pic != null)
                        {{ asset('guide/profile/cover/'.@$item->back_pic) }}
                        @else
                        {{asset('assets/frontend/images/bg_2.jpg')}}
                        @endif"/>
                    </div>
                    <div class="avatar text-center">
                        <img alt="" src="@if(@$item->profile_pic != null)
                        {{ asset('guide/profile/'.@$item->profile_pic) }}
                        @else
                        {{asset('assets/frontend/images/avatar.jpg')}}
                        @endif">
                    </div>
                    <div class="info">
                        <div class="title text-center">
                            <a target="_blank" href="">{{ $item->name }}</a>
                        </div>
                        <div class="desc p-0">
                            <p><b>Location:</b> {{ $item->location }}</p>
                            <p><b>Language:</b> {{ $item->lanuage }}</p>
                            <p class="rate"><b>Rating: </b>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                            </p>
                            <p><b>Rate : </b>{{ $item->rate }}$ (Hour)</p>
                        </div>
                    </div>
                    <div class="bottom text-center">
                        <a href="{{-- {{ route('front.local_guide',$item->user->id)}} --}}" class="btn btn-outline-danger btn-sm">See more</a>
                    </div>
                </div>
        
            </div>            
            @endforeach
            </div>
        </div>
   </section>
   <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
               <h2 class="mb-4"><strong>Popular</strong> Restaurants</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="destination">
                <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-1.jpg);">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                  </div>
                </a>
                <div class="text p-3">
                  <h3><a href="#">Luxury Restaurant</a></h3>
                  <p class="rate">
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star-o"></i>
                    <span>8 Rating</span>
                  </p>
                  <p>Far far away, behind the word mountains, far from the countries</p>
                  <hr>
                  <p class="bottom-area d-flex">
                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                    <span class="ml-auto"><a href="#">Discover</a></span>
                  </p>
              </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="destination">
                <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-2.jpg);">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                  </div>
                </a>
                <div class="text p-3">
                  <h3><a href="#">Luxury Restaurant</a></h3>
                  <p class="rate">
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star-o"></i>
                    <span>8 Rating</span>
                  </p>
                  <p>Far far away, behind the word mountains, far from the countries</p>
                  <hr>
                  <p class="bottom-area d-flex">
                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                    <span class="ml-auto"><a href="#">Book Now</a></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="destination">
              <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-3.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
                </div>
              </a>
              <div class="text p-3">
                <h3><a href="#">Luxury Restaurant</a></h3>
                <p class="rate">
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star-o"></i>
                  <span>8 Rating</span>
                </p>
                <p>Far far away, behind the word mountains, far from the countries</p>
                <hr>
                <p class="bottom-area d-flex">
                  <span><i class="icon-map-o"></i> San Franciso, CA</span>
                  <span class="ml-auto"><a href="#">Book Now</a></span>
                </p>
              </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="destination">
                <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-4.jpg);">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                  </div>
                </a>
                <div class="text p-3">
                  <h3><a href="#">Luxury Restaurant</a></h3>
                    <p class="rate">
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star-o"></i>
                    <span>8 Rating</span>
                  </p>
                  <p>Far far away, behind the word mountains, far from the countries</p>
                  <hr>
                  <p class="bottom-area d-flex">
                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                    <span class="ml-auto"><a href="#">Book Now</a></span>
                  </p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection