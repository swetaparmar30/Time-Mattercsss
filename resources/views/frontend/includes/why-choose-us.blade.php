<!-- <section class="why-choose-sec time-matter-common time-matter-common-padding">
    <div class="container-md">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810" height="810"
                    class="img-fluid desktop-img">

            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-side">
                <h2>Why Choose TimeMatters</h2>

                <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810" height="810"
                    class="img-fluid mobile-img">

                <article>
                    
                    <div class="content">
                        <h3>Independent & Vendor-Neutral</h3>
                        <p>100% impartial, no ties to staffing suppliers.</p>
                    </div>
                </article>

                <article>
                    
                    <div class="content">
                        <h3>Simplified Supplier Oversight</h3>
                        <p>One point of contact across all staffing vendors.</p>
                    </div>

                </article>
                <article>
                   
                    <div class="content">
                        <h3>Cost Control & Efficiency</h3>
                        <p>Rate standardization, compliance, and spend optimization.</p>
                    </div>
                </article>
                <article>

                    
                    <div class="content">
                        <h3>Accountability & Transparency</h3>
                        <p>Performance scorecards and real-time reporting for clear vendor evaluation.</p>
                    </div>
                </article>


                <article>
                   
                    <div class="content">
                        <h3>Proven Experience</h3>
                        <p>Decades of expertise helping organizations manage complex supplier networks.</p>
                    </div>
                </article>



            </div>
        </div>
    </div>
</section> -->

<section class="why-choose-sec time-matter-common time-matter-common-padding">
    <div class="container-md">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                @if (!empty($why_choose->why_choose_img1))
                    @php
                        $why_img = App\Models\MediaImage::select('name', 'alt_text')
                            ->where('id', $why_choose->why_choose_img1)
                            ->first();
                    @endphp

                    @if (!empty($why_img->name))
                        <img src="{{ asset('uploads/' . $why_img->name) }}" alt="{{ $why_img->alt_text }}" width="810"
                            height="810" class="img-fluid desktop-img">
                    @else
                        <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810"
                            height="810" class="img-fluid desktop-img">
                    @endif
                @else
                    <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810"
                        height="810" class="img-fluid desktop-img">
                @endif


                <!-- <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810" height="810" class="img-fluid desktop-img"> -->

            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-side">

                <h2>{{ $why_choose->why_choose_title ?? '' }}</h2>
                @if (!empty($why_choose->why_choose_img1))
                    @php
                        $why_img = App\Models\MediaImage::select('name', 'alt_text')
                            ->where('id', $why_choose->why_choose_img1)
                            ->first();
                    @endphp

                    @if (!empty($why_img->name))
                        <img src="{{ asset('uploads/' . $why_img->name) }}" alt="{{ $why_img->alt_text }}" width="810"
                            height="810" class="img-fluid mobile-img">
                    @else
                        <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810"
                            height="810" class="img-fluid mobile-img">
                    @endif
                @else
                    <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp ') }}" alt="" width="810"
                        height="810" class="img-fluid mobile-img">
                @endif

                <!-- <img src="{{ asset('front-assets/src/images/why-choose-us-img.webp') }}" alt="" width="810"
                    height="810" class="img-fluid mobile-img"> -->

                <!-- 1 -->
                <article>
                    <div class="content">
                        <h3>{{ $why_choose->why_choose_title1 ?? '' }}</h3>
                        <p>{{ $why_choose->why_choose_description1 ?? '' }}</p>
                    </div>
                </article>

                <!-- 2 -->
                <article>
                    <div class="content">
                        <h3>{{ $why_choose->why_choose_title2 ?? '' }}</h3>
                        <p>{{ $why_choose->why_choose_description2 ?? '' }}</p>
                    </div>
                </article>

                <!-- 3 -->
                <article>
                    <div class="content">
                        <h3>{{ $why_choose->why_choose_title3 ?? '' }}</h3>
                        <p>{{ $why_choose->why_choose_description3 ?? '' }}</p>
                    </div>
                </article>

                <!-- 4 -->
                <article>
                    <div class="content">
                        <h3>{{ $why_choose->why_choose_title4 ?? '' }}</h3>
                        <p>{{ $why_choose->why_choose_description4 ?? '' }}</p>
                    </div>
                </article>

                <!-- 5 -->
                <article>
                    <div class="content">
                        <h3>{{ $why_choose->why_choose_title5 ?? '' }}</h3>
                        <p>{{ $why_choose->why_choose_description5 ?? '' }}</p>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>