<section class="fix-it-yourself-sec sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center justify-content-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @if(isset($calltoaction->calltoaction_title) && $calltoaction->calltoaction_title !='')
                <h2>{{ $calltoaction->calltoaction_title }}</h2>
                @endif

                @if(isset($calltoaction->call_button_desc) && $calltoaction->call_button_desc !='')
                    <p>{{ $calltoaction->call_button_desc }}</p>
                @endif
                <div class="get-quote-content-sec-button">
                @if(isset($calltoaction->button_name) && $calltoaction->button_name !='')
                    @if(isset($calltoaction->button_url) && $calltoaction->button_url !='')
                        @if($quote->button_url == '#getafreequote')
                            <button class="common-btn first-btn" data-bs-target="#getafreequote" data-bs-toggle="modal"> 
                        @else
                            <a class="common-btn first-btn" href="{{$calltoaction->button_url}}"> 
                        @endif
                    @else
                    <a class="common-btn first-btn"> 
                    @endif
                        {{$calltoaction->button_name}}
                        @if($quote->button_url == '#getafreequote')
                            </button>
                        @else
                            </a>
                        @endif
                @endif

                @if(isset($calltoaction->call_button_name) && $calltoaction->call_button_name !='')
                    @if(isset($calltoaction->call_button_url) && $calltoaction->call_button_url !='')
                        <a class="common-btn second-btn" href="{{$calltoaction->call_button_url}}"> 
                    @else
                        <a class="common-btn second-btn"> 
                    @endif
                    <img src="{{ asset('front-assets/src/images/white-yellow-call-icon.webp')}}" class="normal-icon" alt="" height="25" width="25"><img src="{{ asset('front-assets/src/images/blue-white-call-icon.webp')}}" class="hover-icon" alt="" height="25" width="25">{{$calltoaction->call_button_name}}
                    </a>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>