@extends('frontend.layout.app')
@section('title','Tourist guide')
@section('content')
<div class="hero-wrap js-fullheight">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
      <div class="col-md-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Explore <br></strong> your amazing city</h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Find great places to stay, eat, shop, or visit from local experts</p>  
        <div class="block-17 my-4">
            <form action="{{ route('front.guide_search') }}" method="post" class="d-block d-flex">
              @csrf
              <div class="fields d-block d-flex">
                <div class="textfield-search one-third">
                    <input type="text" class="form-control" name="location" placeholder="Ex: Mumbai,India">
                </div>
                <div class="select-wrap one-third">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                @php
                    $guid = DB::table('guides')->where('verified_at',1)->orderBy('name', 'asc')->get();
                @endphp
                <select name="state" id="" class="form-control" placeholder="Keyword search">
                    <option value="">Where</option>
                    @foreach ($guid as $item)                  
                    <option value="{{$item->state}}">{{$item->state}} , {{$item->country}}</option>
                    @endforeach
                </select>
                </div>
              </div>
                 <input type="submit" class="search-submit btn btn-primary" value="Search">
            </form>
            </div>        
      </div>
          {{-- <div class="col-md-4 banner-right">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
               
                <li class="nav-item">
                   <a class="nav-link active" id="guide-tab" data-toggle="tab" href="#guide" role="tab" aria-controls="guide" aria-selected="true">Guides</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Hotels</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" id="restaurants-tab" data-toggle="tab" href="#restaurants" role="tab" aria-controls="restaurants" aria-selected="false">Restaurants</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="false">flights</a>
                </li>
              </ul>
              <div class="tab-content p-5" id="myTabContent">
              
              <div class="tab-pane fade active show" id="guide" role="tabpanel" aria-labelledby="guide-tab">
                <form class="form-wrap">
                  <input type="text" class="form-control" name="name" placeholder="Where are you to go ?">
                  <input type="text" class="form-control" name="to" placeholder="Pick up point " >
                  <input type="text" class="form-control" data-provide="datepicker" name="start" placeholder="Date " >
                  <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults " >
                  <button class="btn btn-outline-danger" type="submit">Search Guides</button>
                </form>
              </div>
              <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                <form class="form-wrap">
                  <input type="text" class="form-control" name="name" placeholder="From " >
                  <input type="text" class="form-control" name="to" placeholder="To ">
                  <input type="text" class="form-control date-picker" name="start" placeholder="Start " >
                  <input type="text" class="form-control date-picker" name="return" placeholder="Return ">
                  <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults ">
                  <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child ">
                  <button class="btn btn-outline-danger" type="submit">Search Hotel</button>
                </form>
              </div>
              <div class="tab-pane fade" id="restaurants" role="tabpanel" aria-labelledby="restaurants-tab">
                <form class="form-wrap">
                  <input type="text" class="form-control" name="name" placeholder="From " >
                  <input type="text" class="form-control" name="to" placeholder="To ">
                  <input type="text" class="form-control date-picker" name="start" placeholder="Start " >
                  <input type="text" class="form-control date-picker" name="return" placeholder="Return ">
                  <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults ">
                  <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child ">
                  <button class="btn btn-outline-danger" type="submit">Search Restaurants</button>
                </form>
              </div>
              <div class="tab-pane fade" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                <form class="form-wrap">
                  <input type="text" class="form-control" name="name" placeholder="From " >
                  <input type="text" class="form-control" name="to" placeholder="To ">
                  <input type="text" class="form-control date-picker" name="start" placeholder="Start " >
                  <input type="text" class="form-control date-picker" name="return" placeholder="Return ">
                  <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults ">
                  <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child ">
                  <button class="btn btn-outline-danger" type="submit">Search Flights</button>
                </form>
              </div>
              </div>
          </div> --}}
          
    </div>
  </div>
</div>
<section class="ftco-section services-section bg-light">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
            <div class="media-body p-2 mt-2">
              <h3 class="heading mb-3">Best Price Guarantee</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Travellers Love Us</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
        </div>
        </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
        <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
          <div class="media-body p-2 mt-2">
            <h3 class="heading mb-3">Best Travel Agent</h3>
            <p>A small river named Duden flows by their place and supplies.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services d-block text-center">
          <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
          <div class="media-body p-2 mt-2">
            <h3 class="heading mb-3">Our Dedicated Support</h3>
            <p>A small river named Duden flows by their place and supplies.</p>
          </div>
        </div>
      </div>
      </div>
    </div>
</section>
<section class="ftco-section bg-light guide-pro">
  <div class="container">
    <div class="row justify-content-start pb-3">
    <div class="col-md-7 heading-section ftco-animate">
     <h2><strong>Top Rating</strong>  Guide</h2>
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
                <a href="{{ route('front.local_guide',$item->user->id)}}" class="btn btn-outline-danger btn-sm">See more</a>
            </div>
        </div>

      </div>            
      @endforeach
  </div>
  </div>
</section>
<section class="ftco-section ftco-destination">
    <div class="container-fluid">
      <div class="row justify-content-start pb-3">
        <div class="col-md-7 heading-section ftco-animate">
          <h2 class="mb-4"><strong>Popular</strong> Destination</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="destination-slider owl-carousel ftco-animate">
            <div class="item hover1">
              <div class="destination">
                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-1.jpg);">
                  <div class="icon  justify-content-center align-items-center">
                   <button class="btn btn-outline-danger">Explore</button>
                  </div>
                </a>
                <div class="texto">
                 <h5>Paris, Italy</h5>
                  <p class="listing">42+ Tours and activites Connect with 32+ locals</p>
                </div>
              </div>
            </div>
          <div class="item hover1">
            <div class="destination">
              <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-2.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                </div>
              </a>
              <div class="texto">
                 <h5>San Francisco, USA</h5>
                 <p class="listing">42+ Tours and activites Connect with 32+ locals</p>
              </div>
            </div>
          </div>
          <div class="item hover1">
            <div class="destination">
              <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-3.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                </div>
              </a>
              <div class="texto">
                <h5>Lodon, UK</h5>
                <p class="listing">42+ Tours and activites Connect with 32+ locals</p>
              </div>
            </div>
          </div>
          <div class="item hover1">
            <div class="destination">
              <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-4.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                </div>
              </a>
              <div class="texto">
                <h5>Lion, Singapore</h5>
                <p class="listing">42+ Tours and activites Connect with 32+ locals</p>
              </div>
            </div>
          </div>
          <div class="item hover1">
            <div class="destination">
              <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-5.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                </div>
              </a>
              <div class="texto">
                <h5>Australia</h5>
                <p class="listing">42+ Tours and activites Connect with 32+ locals</p>
              </div>
            </div>
          </div>
          <div class="item hover1">
            <div class="destination">
              <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-6.jpg);">
                <div class="icon d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-danger">Explore</button>
                </div>
              </a>
              <div class="texto">
                <h5>Paris, Italy</h5>
                <p class="listing">42+ Tours and activites Connect with 32+ locals</p>
              </div>
            </div>
          </div>
          </div>
        </div>  
      </div>    
    </div>
</section>
<section class="ftco-section bg-light">
  <div class="container-fluid">
    <div class="row justify-content-start pb-3">
      <div class="col-md-7 heading-section ftco-animate"> 
        <h2 class="mb-4"><strong>Popular</strong> Experiences</h2>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm col-md-6 col-lg ftco-animate hover15">
        <div class="destination">
          <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-1.jpg);">
            <div class="icon d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-danger btn-sm">Explore</button>
            </div>
          </a>
          <div class="text p-3">
            <div class="d-flex">
            <div class="one">
              <h3><a href="#">Paris, Italy</a></h3>
              <p class="rate">
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star-o"></i>
                <span>8 Rating</span>
              </p>
            </div>
              <div class="two">
              </div>
            </div>
          <p>Far far away, behind the word mountains, far from the countries</p>
          </div>
        </div>
      </div>
      <div class="col-sm col-md-6 col-lg ftco-animate hover15">
        <div class="destination">
          <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-2.jpg);">
            <div class="icon d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-danger btn-sm">Explore</button>
            </div>
          </a>
          <div class="text p-3">
            <div class="d-flex">
              <div class="one">
                <h3><a href="#">Paris, Italy</a></h3>
                <p class="rate">
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star-o"></i>
                  <span>8 Rating</span>
                </p>
              </div>
            <div class="two">
            </div>
            </div>
          <p>Far far away, behind the word mountains, far from the countries</p>
          </div>
        </div>
      </div>
      <div class="col-sm col-md-6 col-lg ftco-animate hover15">
        <div class="destination">
          <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-3.jpg);">
            <div class="icon d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-danger btn-sm">Explore</button>
            </div>
          </a>
          <div class="text p-3">
              <div class="d-flex">
                <div class="one">
                  <h3><a href="#">Paris, Italy</a></h3>
                  <p class="rate">
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star"></i>
                    <i class="icon-star-o"></i>
                    <span>8 Rating</span>
                  </p>
                </div>
            </div>
          <p>Far far away, behind the word mountains, far from the countries</p>
          </div>
        </div>
      </div>
      <div class="col-sm col-md-6 col-lg ftco-animate hover15">
        <div class="destination">
          <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-4.jpg);">
            <div class="icon d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-danger btn-sm">Explore</button>
            </div>
          </a>
          <div class="text p-3">
            <div class="d-flex">
            <div class="one">
              <h3><a href="#">Paris, Italy</a></h3>
              <p class="rate">
              <i class="icon-star"></i>
              <i class="icon-star"></i>
              <i class="icon-star"></i>
              <i class="icon-star"></i>
              <i class="icon-star-o"></i>
              <span>8 Rating</span>
              </p>
            </div>
            <div class="two">            
            </div>
            </div>
              <p>Far far away, behind the word mountains, far from the countries</p>
          </div>
        </div>
      </div>
      <div class="col-sm col-md-6 col-lg ftco-animate hover15">
        <div class="destination">
          <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/destination-5.jpg);">
            <div class="icon d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-danger btn-sm">Explore</button>
            </div>
          </a>
          <div class="text p-3">
            <div class="d-flex">
              <div class="one">
                <h3><a href="#">Paris, Italy</a></h3>
                <p class="rate">
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star-o"></i>
                  <span>8 Rating</span>
                </p>
              </div>
            </div>
          <p>Far far away, behind the word mountains, far from the countries</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-counter img" id="section-counter">
  <div class="container">
    <div class="row justify-content-center pb-3">
      <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
        <h2 class="mb-4">Client's satisfiction</h2>
        <span class="subheading">More than 100,000 customer</span>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="100000">0</strong>
                <span>Happy Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="40000">0</strong>
                <span>Destination Places</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="87000">0</strong>
                <span>Hotels</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="56400">0</strong>
                <span>Restaurant</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section">
    <div class="container">
      <div class="row justify-content-start  pb-3">
        <div class="col-md-7 heading-section ftco-animate">
            <h2 class="mb-4"><strong>Top 10 </strong>  Destination</h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-1.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
            <div class="text p-3">
              <div class="d-flex">
              <div class="one">
              <h3><a href="#">Hotel, Italy</a></h3>
              </div>
              <div class="two">
              </div>
              </div>
               <p>Far far away, behind the word mountains, far from the countries</p>
               <p class="bottom-area d-flex">
                  <a href="">Find the best things to do in Italy</a>
                </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-2.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
            <div class="text p-3">
              <div class="d-flex">
                <div class="one">
                  <h3><a href="#">Hotel, Italy</a></h3>
                </div>
              </div>
              <p>Far far away, behind the word mountains, far from the countries</p>
              <p class="bottom-area d-flex">
                  <a href="">Find the best things to do in Italy</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-3.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
            <div class="text p-3">
              <div class="d-flex">
                <div class="one">
                  <h3><a href="#">Hotel, Italy</a></h3>
                </div>
              </div>
                <p>Far far away, behind the word mountains, far from the countries</p>
                <p class="bottom-area d-flex">
                    <a href="">Find the best things to do in Italy</a>
                  </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-4.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                 <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
          <div class="text p-3">
          <div class="d-flex">
          <div class="one">
          <h3><a href="#">Hotel, Italy</a></h3>
          </div>
          </div>
            <p>Far far away, behind the word mountains, far from the countries</p>
          <p class="bottom-area d-flex">
            <a href="">Find the best things to do in Italy</a>
          </p>
          </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-5.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
            <div class="text p-3">
              <div class="d-flex">
              <div class="one">
              <h3><a href="#">Hotel, Italy</a></h3>              
              </div>
              </div>
            <p>Far far away, behind the word mountains, far from the countries</p>
            <p class="bottom-area d-flex">
                <a href="">Find the best things to do in Italy</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-1.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
            <div class="text p-3">
                <div class="d-flex">
                  <div class="one">
                    <h3><a href="#">Hotel, Italy</a></h3>
                  </div>
                </div>
               <p>Far far away, behind the word mountains, far from the countries</p>
               <p class="bottom-area d-flex">
                  <a href="">Find the best things to do in Italy</a>
                </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-2.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                 <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
            <div class="text p-3">
              <div class="d-flex">
                <div class="one">
                  <h3><a href="#">Hotel, Italy</a></h3>
                </div>
              </div>
            <p>Far far away, behind the word mountains, far from the countries</p>
            <p class="bottom-area d-flex">
                <a href="">Find the best things to do in Italy</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-3.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
            <div class="text p-3">
              <div class="d-flex">
                <div class="one">
                  <h3><a href="#">Hotel, Italy</a></h3>
                </div>
              </div>
              <p>Far far away, behind the word mountains, far from the countries</p>
              <p class="bottom-area d-flex">
                  <a href="">Find the best things to do in Italy</a>
                </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-4.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
              <div class="text p-3">
              <div class="d-flex">
                <div class="one">
                  <h3><a href="#">Hotel, Italy</a></h3>
                </div>
              </div>
              <p>Far far away, behind the word mountains, far from the countries</p>
              <p class="bottom-area d-flex">
                  <a href="">Find the best things to do in Italy</a>
                </p>
              </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 ftco-animate hover14">
          <div class="destination">
            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/hotel-5.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <button class="btn btn-outline-danger">Explore</button>
              </div>
            </a>
              <div class="text p-3">
                <div class="d-flex">
                  <div class="one">
                    <h3><a href="#">Hotel, Italy</a></h3>
                  </div>
                </div>
              <p>Far far away, behind the word mountains, far from the countries</p>
              <p class="bottom-area d-flex">
                  <a href="">Find the best things to do in Italy</a>
                </p>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-start">
        <div class="col-md-5 heading-section ftco-animate">
          <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
          <p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
        </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 heading-section ftco-animate">
        <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
        <div class="row ftco-animate">
          <div class="col-md-12">
              <div class="carousel-testimony owl-carousel">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img mb-5" style="background-image: url(assets/frontend/images/person_1.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                         <button class="btn btn-outline-danger">Explore</button>
                      </span>
                    </div>
                    <div class="text ml-md-4">
                      <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p class="name">Dennis Green</p>
                      <span class="position">Guest from italy</span>
                  </div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img mb-5" style="background-image: url(assets/frontend/images/person_2.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <button class="btn btn-outline-danger">Explore</button>
                      </span>
                    </div>
                    <div class="text ml-md-4">
                      <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p class="name">Dennis Green</p>
                      <span class="position">Guest from London</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img mb-5" style="background-image: url(assets/frontend/images/person_3.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <button class="btn btn-outline-danger">Explore</button>
                      </span>
                    </div>
                    <div class="text ml-md-4">
                      <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p class="name">Dennis Green</p>
                      <span class="position">Guest from Philippines</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
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
@push('js')
    
@endpush