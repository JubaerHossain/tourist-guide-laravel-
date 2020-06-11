<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="{{asset('assets/frontend/js/jquery.min.js')}}" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery-migrate-3.0.1.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/popper.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend')}}/js/bootstrap.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.easing.1.3.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.waypoints.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.stellar.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.magnific-popup.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/aos.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.animateNumber.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap-datepicker.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/js/scrollax.min.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
{{-- <script src="{{asset('assets/frontend/')}}/js/google-map.js" type="ea8a45411e9627b0c948ad7e-text/javascript"></script> --}}
<script src="{{asset('assets/frontend/js/main.js')}}" type="ea8a45411e9627b0c948ad7e-text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}

<script src="{{asset('assets/frontend/js/rocket-loader.min.js')}}" data-cf-settings="ea8a45411e9627b0c948ad7e-|49" defer=""></script>
<script src="{{asset('js/sweet-alert.js')}}"></script>
<script src="{{asset('assets/frontend/js/toastr.js')}}"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>

