@extends('layouts.login')
@section('title','Registration | Unistag')
@section('style')
    <style>
    .card{ border: none;margin: 0 auto;position: relative;z-index: 999;background:rgba(255,255,255,0.04);-webkit-box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);color: white;} 
    .lin,.btn-link{font-family: serif;color:white}.lin:hover{color: #007bff;text-decoration: none}
    </style>
@endsection
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card py-2" style="border:none;">
                    <div class="d-flex text-center">
                            <div class="col-md-12">
                             {{--    <img src="{{asset('asset/back')}}/images/icon/logo.png" width="20%" class="brand_logo" alt="Logo"> --}}
                            </div>
                        </div>
                        
                        <div class="card-body">
                         <h2 class="text-center pb-4">Registration</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input id="name" placeholder="E.g John" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                    <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                            </div>
                                            <input id="email" type="email" placeholder="E.g Example@.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                    <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-globe"></i></div>
                                            </div>
                                            @php
                                            $countries = DB::table('countries')->orderBy('name', 'asc')->get();
                                           @endphp
                                            <select name="country" class="form-control">
                                                <option value=""> ---- Select country ----</option>
                                                @foreach ($countries as $item)                                                    
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>

                                    </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                    <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-city"></i></div>
                                            </div>
                                                    <select class="form-control" name="state" id="">
                                                        <option value=""> ---- Select State ---- </option>
                                                    </select>

                                    </div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                    <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                            </div>
                                            <input id="password" placeholder="E.g ********" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    </div>
                            </div>
                        </div>
                       

                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                        </div>
                                        <input id="password-confirm" placeholder="E.g ********" type="password" class="form-control" name="password_confirmation" required>
                        
                                </div> 
                            </div>
                        </div>
                         <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                    <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                            </div>
                                            <input id="password" type="text" placeholder="E.g 01XXXXXXXX" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required>

                                    </div>
                            </div>
                        </div>
                        <div class="form-group row">

                                <div class="col-md-10 offset-md-1">
                                        <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user-cog"></i></div>
                                                </div>
                                                <select name="role" class="form-control">
                                                    <option value=""> ---- Select role ----</option>
                                                    <option value="customer">Customer</option>
                                                    <option value="guide">Guide</option>
                                                </select>
    
                                        </div>
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
        $(document).ready(function () {
    
            $("select[name='country']").change(function () {
                var ca = $("select[name='country']").val();  
                console.log(window.origin+'/state/'+ca);
                          
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
@endsection
