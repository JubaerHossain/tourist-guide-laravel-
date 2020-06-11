@extends('frontend.layout.app')
@section('title','Restaurants')
@section('content')
    <div class="hero-wrap restaurants js-fullheight">
        <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{route('front.hotel')}}">Home</a></span>
                             <span>Restaurants</span>
                        </p>
                        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Restaurants</h1>
                    </div>
                </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
          <div class="row">
          <div class="col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                  <div class="destination">
                    <a href="{{route('front.single_restaurant')}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-1.jpg);">
                      <div class="icon d-flex justify-content-center align-items-center">
                        <button class="btn btn-outline-danger">Explore</button>
                      </div>
                    </a>
                    <div class="text p-3">
                      <h3><a href="{{route('front.single_restaurant')}}">Luxury Restaurant</a></h3>
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
                    <a href="{{route('front.single_restaurant')}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-2.jpg);">
                      <div class="icon d-flex justify-content-center align-items-center">
                        <button class="btn btn-outline-danger">Explore</button>
                      </div>
                    </a>
                    <div class="text p-3">
                      <h3><a href="{{route('front.single_restaurant')}}">Luxury Restaurant</a></h3>
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
                  <a href="{{route('front.single_restaurant')}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-3.jpg);">
                    <div class="icon d-flex justify-content-center align-items-center">
                      <button class="btn btn-outline-danger">Explore</button>
                    </div>
                  </a>
                  <div class="text p-3">
                    <h3><a href="{{route('front.single_restaurant')}}">Luxury Restaurant</a></h3>
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
                    <a href="{{route('front.single_restaurant')}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/restaurant-4.jpg);">
                      <div class="icon d-flex justify-content-center align-items-center">
                        <button class="btn btn-outline-danger">Explore</button>
                      </div>
                    </a>
                    <div class="text p-3">
                      <h3><a href="{{route('front.single_restaurant')}}">Luxury Restaurant</a></h3>
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
            {{-- <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div> --}}
          </div> 
          </div>
        </div>
       </section> 
@endsection