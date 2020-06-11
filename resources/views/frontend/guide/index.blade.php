@extends('frontend.layout.app')
@section('title','Become a guide')
@section('content')
    <div class="hero-wrap guide js-fullheight">
        <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-3 bread pb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Ready to offer the world your skills and passion?</h1>
                        <a href="{{route('login')}}" class="btn-guide">Become a tourist guide</a>
                    </div>
                </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
              <div class="col-md-12 pb-5">  <h3 class="text-center">Who are we looking for?</h3></div>
                <div class="col-md-4">
                    <ul class="list-unstyled text-center">
                        <li><i class="fas fa-user"></i></li>
                        <li><b>dfdfdf</b></li>
                        <li><p>dfdfdf</p></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled text-center">
                        <li><i class="fas fa-user"></i></li>
                        <li><b>dfdfdf</b></li>
                        <li><p>dfdfdf</p></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled text-center">
                        <li><i class="fas fa-user"></i></li>
                        <li><b>dfdfdf</b></li>
                        <li><p>dfdfdf</p></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-5">  <h3 class="text-center">What can you offer?</h3></div>
                <div class="col-md-8">
                    <ul class="list-unstyled text-justify guide-i">
                        <li><i class="fas fa-arrow-circle-right"></i><span>A private home dinner with local typical food or your fav home dishes</span></li>
                        <li><i class="fas fa-arrow-circle-right"></i><span>A dinner party with your selected menu and drinks in a cozy atmosphere</span></li>
                        <li><i class="fas fa-arrow-circle-right"></i><span>A private tour of your city's hidden gems</span></li>
                        <li><i class="fas fa-arrow-circle-right"></i><span>A personalized tour by car, taking your guests to all the beautiful spots your region has to offer</span></li>
                        <li><i class="fas fa-arrow-circle-right"></i><span>A cooking class to share your cooking skills with your guests</span></li>
                         <li><i class="fas fa-arrow-circle-right"></i><span>A workshop teaching your guests to make local crafts you know all about</span></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled text-center">
                    <li><img src="{{asset('assets/frontend/images/destination-3.jpg')}}" alt="" class="img-fluid"></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                            <a href="{{route('login')}}" class="btn-guide">Become a tourist guide</a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-5">  <h3 class="text-center">What Withlocals can offer to you</h3></div>
                <div class="col-md-6">
                    <ul class="list-unstyled text-justify guide-i">
                        <li><i class="fas fa-check"></i><span>A private home dinner with local typical food or your fav home dishes</span></li>
                        <li><i class="fas fa-check"></i><span>A dinner party with your selected menu and drinks in a cozy atmosphere</span></li>
                        <li><i class="fas fa-check"></i><span>A private tour of your city's hidden gems</span></li>
                        <li><i class="fas fa-check"></i><span>A personalized tour by car, taking your guests to all the beautiful spots your region has to offer</span></li>
                        <li><i class="fas fa-check"></i><span>A cooking class to share your cooking skills with your guests</span></li>
                         <li><i class="fas fa-check"></i><span>A workshop teaching your guests to make local crafts you know all about</span></li>
                    </ul>
                </div>
                <div class="col-md-6">
                        <ul class="list-unstyled text-justify guide-i">
                                <li><i class="fas fa-check"></i><span>A private home dinner with local typical food or your fav home dishes</span></li>
                                <li><i class="fas fa-check"></i><span>A dinner party with your selected menu and drinks in a cozy atmosphere</span></li>
                                <li><i class="fas fa-check"></i><span>A private tour of your city's hidden gems</span></li>
                                <li><i class="fas fa-check"></i><span>A personalized tour by car, taking your guests to all the beautiful spots your region has to offer</span></li>
                                <li><i class="fas fa-check"></i><span>A cooking class to share your cooking skills with your guests</span></li>
                                 <li><i class="fas fa-check"></i><span>A workshop teaching your guests to make local crafts you know all about</span></li>
                            </ul>
                </div>
                <div class="col-md-12 pt-5">
                    <div class="text-center">
                        <a href="{{route('login')}}" class="btn-guide">Become a tourist guide</a>
                    </div>
                 </div>
            </div>
        </div>
    </section>
   @endsection