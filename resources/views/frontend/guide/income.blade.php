@extends('frontend.layout.app')
@section('title','Dashboard guide')
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
                        <a class="list-group-item pro-guide list-group-item-action"  role="tab" href="{{route('guide.place')}}">Add Place</a>
                        <a class="list-group-item pro-guide list-group-item-action active" href="{{route('guide.earning')}}" role="tab">Balance</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-auto table-responsive">
                        <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Income</th>
                                  </tr>
                                </thead>
                                <tbody>                                        
                                  <tr>
                                    <td>{{@Auth::user()->name}}</td>
                                    <td>{{$income->total_balance}}</td>
                                  </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @endsection
   @push('js')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
   @endpush