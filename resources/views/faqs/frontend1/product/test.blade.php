@extends('frontend.layouts.index')
@section('content')
   <section class="common-prodoor-padding common-prodoor product-details-section residential-product-details-section ">
        <div class="container-md">
            <div class="row desktop-product-details-sec">
                <div class="col-12 text-center">
                    <h2>Door Selections</h2>
                </div>
                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 left-side">
                    <ul class="nav nav-tabs">
                        <li data-bs-active="#panelstyles"><a data-bs-toggle="tab" href="#panelstyles" class="active">panel styles</a></li>
                        <li data-bs-active="#modelselection"><a data-bs-toggle="tab" href="#modelselection">MODEL SELECTION</a></li>
                        <li data-bs-active="#configuration "><a data-bs-toggle="tab" href="#configuration">configuration</a></li>
                        <li data-bs-active="#coloroptions"><a data-bs-toggle="tab" href="#coloroptions">color options</a></li>
                        <li data-bs-active="#glassoptions"><a data-bs-toggle="tab" href="#glassoptions">glass options</a></li>
                        <li data-bs-active="#windowsoptions"><a data-bs-toggle="tab" href="#windowsoptions">windows options</a></li>
                        <li data-bs-active="#literature"><a data-bs-toggle="tab" href="#literature">Literature</a></li>
                        <li data-bs-active="#warrantyinformation"><a data-bs-toggle="tab" href="#warrantyinformation">warranty information</a></li>
                    </ul>
                </div>

                 <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 right-side">
                    <div class="tab-content">
                        <div id="panelstyles" class="tab-pane fade active show panelstyles">
                            <div class="row image-and-title">
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Short Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/Flush-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Flush Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/long-panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Long Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Short Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/Flush-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Flush Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/long-panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Long Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Short Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/Flush-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Flush Panel</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/long-panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>Long Panel</h5>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div id="modelselection" class="tab-pane fade modelselection">
                            <div class="model-box-section">
                                <div class="row">
                                    <div class="col-3">
                                        <article>
                                            <img src="{{asset('front-assets/images/non-insulated.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                            <h5>NON-INSULATED</h5>
                                        </article>
                                    </div>
                                    <div class="col-9">
                                        <div class="box-sec">
                                            <article>
                                                <h4>DESIGN</h4>
                                                <ul>
                                                    <li>Short</li>
                                                    <li>Long</li>
                                                    <li>Flush</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>MODEL</h4>
                                                <ul>
                                                    <li>5110</li>
                                                    <li>5111</li>
                                                    <li>5122</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>EXT. STEEL</h4>
                                                <ul>
                                                    <li>.019” 24 ga</li>
                                                    <li>.019” 24 ga</li>
                                                    <li>.019” 24 ga</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>MAX-WIDTH</h4>
                                                <ul>
                                                    <li>20’2”</li>
                                                    <li>20’2”</li>
                                                    <li>20’2”</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>WARRANTY</h4>
                                                <ul>
                                                    <li>Lifetime*</li>
                                                    <li>Lifetime*</li>
                                                    <li>Lifetime*</li>
                                                </ul>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="model-box-section">
                                <div class="row">
                                    <div class="col-3">
                                        <article>
                                            <img src="{{asset('front-assets/images/insulated-garage-panel-1.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                            <h5>INSULATED 2-LAYER</h5>
                                        </article>
                                    </div>
                                    <div class="col-9">
                                        <div class="box-sec">
                                            <article>
                                                <h4>DESIGN</h4>
                                                <ul>
                                                    <li>Short</li>
                                                    <li>Long</li>
                                                    <li>Flush</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>MODEL</h4>
                                                <ul>
                                                    <li>5210</li>
                                                    <li>5211</li>
                                                    <li>5222</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>EXT. STEEL</h4>
                                                <ul>
                                                    <li>.019" nom.</li>
                                                    <li>.019" nom.</li>
                                                    <li>.019" nom.</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>MAX-WIDTH</h4>
                                                <ul>
                                                    <li>20’2”</li>
                                                    <li>20’2”</li>
                                                    <li>20’2”</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>WARRANTY</h4>
                                                <ul>
                                                    <li>Lifetime*</li>
                                                    <li>Lifetime*</li>
                                                    <li>Lifetime*</li>
                                                </ul>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="model-box-section">
                                <div class="row">
                                    <div class="col-3">
                                        <article>
                                            <img src="{{asset('front-assets/images/insulated-garage-panel-2.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                            <h5>INSULATED 3-LAYER</h5>
                                        </article>
                                    </div>
                                    <div class="col-9">
                                        <div class="box-sec">
                                            <article>
                                                <h4>DESIGN</h4>
                                                <ul>
                                                    <li>Short</li>
                                                    <li>Long</li>
                                                    <li>Flush</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>MODEL</h4>
                                                <ul>
                                                    <li>6410</li>
                                                    <li>6411</li>
                                                    <li>6422</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>EXT. STEEL</h4>
                                                <ul>
                                                    <li>.016" 26 ga.</li>
                                                    <li>.016" 26 ga.</li>
                                                    <li>.016" 26 ga.</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>MAX-WIDTH</h4>
                                                <ul>
                                                    <li>20’2”</li>
                                                    <li>20’2”</li>
                                                    <li>20’2”</li>
                                                </ul>
                                            </article>
                                            <article>
                                                <h4>WARRANTY</h4>
                                                <ul>
                                                    <li>Lifetime*</li>
                                                    <li>Lifetime*</li>
                                                    <li>Lifetime*</li>
                                                </ul>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="configuration" class="tab-pane fade configuration">
                            <div class="row image-and-title">
                                <h3>Short Panel</h3>
                                <div class="col-3">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel-001.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>8'” - 9'11”</h5>
                                    </article>
                                </div>
                                <div class="col-3">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel-002.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>10’0” - 11’11”</h5>
                                    </article>
                                </div>
                                <div class="col-3">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel-003.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>12’0” - 13’11”</h5>
                                    </article>
                                </div>
                                <div class="col-3">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel-004.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>14’0” - 15’11”</h5>
                                    </article>
                                </div>
                                <div class="col-3">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel-005.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>16’0” - 18’11”</h5>
                                    </article>
                                </div>
                                <div class="col-3">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel-006.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>19’0” - 19’11”</h5>
                                    </article>
                                </div>
                                <div class="col-3">
                                    <article>
                                        <img src="{{asset('front-assets/images/Short-Panel-007.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>20’0” - 20’2” DES</h5>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div id="coloroptions" class="tab-pane fade coloroptions">
                            <div class="row image-and-title">
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-almond.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>almond</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-black.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>black</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-bronze.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>bronze</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-brown.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>brown</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-grey.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>grey</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-sandstone.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>sandstone</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-tan.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>tan</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/garage-door-white.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                        <h5>white</h5>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div id="glassoptions" class="tab-pane fade glassoptions">
                            <div class="row image-and-title">
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/satin-garage-door-glass.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>satin garage door glass</h5>
                                    </article>
                                </div>
                                <div class="col-2">
                                    <article>
                                        <img src="{{asset('front-assets/images/clear-garage-door-glass.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>clear garage door glass</h5>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div id="windowsoptions" class="tab-pane fade windowsoptions">
                            <div class="row image-and-title">
                                <div class="col-4">
                                    <article>
                                        <img src="{{asset('front-assets/images/stockbridge-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>stockbridge garage windows</h5>
                                    </article>
                                </div>
                                <div class="col-4">
                                    <article>
                                        <img src="{{asset('front-assets/images/stockton-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>stockton garage windows</h5>
                                    </article>
                                </div>
                                <div class="col-4">
                                    <article>
                                        <img src="{{asset('front-assets/images/prairie-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>prairie garage windows</h5>
                                    </article>
                                </div>
                                <div class="col-4">
                                    <article>
                                        <img src="{{asset('front-assets/images/cascade-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>cascade garage windows</h5>
                                    </article>
                                </div>
                                <div class="col-4">
                                    <article>
                                        <img src="{{asset('front-assets/images/waterton-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>waterton garage windows</h5>
                                    </article>
                                </div>
                                <div class="col-4">
                                    <article>
                                        <img src="{{asset('front-assets/images/plain-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                        <h5>plain garage windows</h5>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div id="literature" class="tab-pane fade literature">
                            <div class="row image-and-title">
                                <div class="col-2">
                                    <article>
                                        <a href=""><img src="{{asset('front-assets/images/ClassicPremium-May2023.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy"></a>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div id="warrantyinformation" class="tab-pane fade warrantyinformation">
                            <div class="warrantyinformation-sec">
                                <article>
                                    <div class="warranty-title">
                                        <img src="{{asset('front-assets/images/warranty-title-bg.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                                        <div class="text-sec">
                                            <h3>Lifetime</h3>
                                            <h4>Section Warranty</h4>
                                        </div>
                                    </div>
                                    <p style=" letter-spacing: 0.02em; ">All residential doors have a limited lifetime section warranty. Warranting against rust-through for as long as you own your home. See our full warranty for further details</p>
                                    <a href="" class="download-pdf" aria-label="download pdf"><img src="{{asset('front-assets/images/download-pdf.png')}}" class="img-fluid"  loading="lazy" alt="" width="40" height="30"></a>
                                </article>
                            </div>

                            <div class="warrantyinformation-sec">
                                <article>
                                    <div class="warranty-title">
                                        <img src="{{asset('front-assets/images/warranty-title-bg.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                                        <div class="text-sec">
                                            <h3>3 Years</h3>
                                            <h4>Window Warranty</h4>
                                        </div>
                                    </div>
                                    <p style=" letter-spacing: -0.02em; ">A limited 3-year window warranty is also included, when applicable. See our full warranty for further details.</p>
                                    <a href="" class="download-pdf" aria-label="download pdf"><img src="{{asset('front-assets/images/download-pdf.png')}}" class="img-fluid"  loading="lazy" alt="" width="40" height="30"></a>
                                </article>
                            </div>

                            <div class="warrantyinformation-sec">
                                <article>
                                    <div class="warranty-title">
                                        <img src="{{asset('front-assets/images/warranty-title-bg.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                                        <div class="text-sec">
                                            <h3>3 Years</h3>
                                            <h4>Hardware Warranty</h4>
                                        </div>
                                    </div>
                                    <p>Our industry-leading hardware comes with a 3-year  limited warranty. See our warranty for further details.</p>
                                    <a href="" class="download-pdf" aria-label="download pdf"><img src="{{asset('front-assets/images/download-pdf.png')}}" class="img-fluid"  loading="lazy" alt="" width="40" height="30"></a>
                                </article>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="row mobile-product-details-sec">
                <h2>Door Selections</h2>
            
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
                    <div class="accordion" id="footerAccordion">
            
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true"><span>panel styles</span></button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#footerAccordion" style="">
                                <div class="card-body">
                                    <div class="row image-and-title">
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Short Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Flush-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Flush Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/long-panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Long Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Short Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Flush-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Flush Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/long-panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Long Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Short Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Flush-Panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Flush Panel</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/long-panel.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>Long Panel</h5>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingTwo">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false"><span>MODEL SELECTION</span></button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#footerAccordion">
                                <div class="card-body">
                                    <div class="model-box-section">
                                        <div class="row">
                                            <div class="col-12">
                                                <article>
                                                    <img src="{{asset('front-assets/images/non-insulated.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                    <h5>NON-INSULATED</h5>
                                                </article>
                                            </div>
                                            <div class="col-12">
                                                <div class="box-sec">
                                                    <article>
                                                        <h4>DESIGN</h4>
                                                        <ul>
                                                            <li>Short</li>
                                                            <li>Long</li>
                                                            <li>Flush</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>MODEL</h4>
                                                        <ul>
                                                            <li>5110</li>
                                                            <li>5111</li>
                                                            <li>5122</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>EXT. STEEL</h4>
                                                        <ul>
                                                            <li>.019” 24 ga</li>
                                                            <li>.019” 24 ga</li>
                                                            <li>.019” 24 ga</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>MAX-WIDTH</h4>
                                                        <ul>
                                                            <li>20’2”</li>
                                                            <li>20’2”</li>
                                                            <li>20’2”</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>WARRANTY</h4>
                                                        <ul>
                                                            <li>Lifetime*</li>
                                                            <li>Lifetime*</li>
                                                            <li>Lifetime*</li>
                                                        </ul>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="model-box-section">
                                        <div class="row">
                                            <div class="col-12">
                                                <article>
                                                    <img src="{{asset('front-assets/images/insulated-garage-panel-1.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                    <h5>INSULATED 2-LAYER</h5>
                                                </article>
                                            </div>
                                            <div class="col-12">
                                                <div class="box-sec">
                                                    <article>
                                                        <h4>DESIGN</h4>
                                                        <ul>
                                                            <li>Short</li>
                                                            <li>Long</li>
                                                            <li>Flush</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>MODEL</h4>
                                                        <ul>
                                                            <li>5210</li>
                                                            <li>5211</li>
                                                            <li>5222</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>EXT. STEEL</h4>
                                                        <ul>
                                                            <li>.019" nom.</li>
                                                            <li>.019" nom.</li>
                                                            <li>.019" nom.</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>MAX-WIDTH</h4>
                                                        <ul>
                                                            <li>20’2”</li>
                                                            <li>20’2”</li>
                                                            <li>20’2”</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>WARRANTY</h4>
                                                        <ul>
                                                            <li>Lifetime*</li>
                                                            <li>Lifetime*</li>
                                                            <li>Lifetime*</li>
                                                        </ul>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="model-box-section">
                                        <div class="row">
                                            <div class="col-12">
                                                <article>
                                                    <img src="{{asset('front-assets/images/insulated-garage-panel-2.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                    <h5>INSULATED 3-LAYER</h5>
                                                </article>
                                            </div>
                                            <div class="col-12">
                                                <div class="box-sec">
                                                    <article>
                                                        <h4>DESIGN</h4>
                                                        <ul>
                                                            <li>Short</li>
                                                            <li>Long</li>
                                                            <li>Flush</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>MODEL</h4>
                                                        <ul>
                                                            <li>6410</li>
                                                            <li>6411</li>
                                                            <li>6422</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>EXT. STEEL</h4>
                                                        <ul>
                                                            <li>.016" 26 ga.</li>
                                                            <li>.016" 26 ga.</li>
                                                            <li>.016" 26 ga.</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>MAX-WIDTH</h4>
                                                        <ul>
                                                            <li>20’2”</li>
                                                            <li>20’2”</li>
                                                            <li>20’2”</li>
                                                        </ul>
                                                    </article>
                                                    <article>
                                                        <h4>WARRANTY</h4>
                                                        <ul>
                                                            <li>Lifetime*</li>
                                                            <li>Lifetime*</li>
                                                            <li>Lifetime*</li>
                                                        </ul>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingThree">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"><span>configuration</span></button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#footerAccordion">
                                <div class="card-body">
                                    <div class="row image-and-title">
                                        <h3>Short Panel</h3>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel-001.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>8'” - 9'11”</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel-002.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>10’0” - 11’11”</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel-003.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>12’0” - 13’11”</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel-004.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>14’0” - 15’11”</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel-005.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>16’0” - 18’11”</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel-006.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>19’0” - 19’11”</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/Short-Panel-007.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>20’0” - 20’2” DES</h5>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingFour">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"><span>color options</span></button>
                            </h3>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#footerAccordion">
                                <div class="card-body">
                                    <div class="row image-and-title">
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-almond.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>almond</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-black.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>black</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-bronze.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>bronze</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-brown.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>brown</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-grey.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>grey</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-sandstone.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>sandstone</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-tan.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>tan</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/garage-door-white.jpg')}}" width="120" height="120" alt="" class="img-fluid"  loading="lazy">
                                                <h5>white</h5>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingFive">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"><span>glass options</span></button>
                            </h3>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                data-bs-parent="#footerAccordion">
                                <div class="card-body">
                                    <div class="row image-and-title">
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/satin-garage-door-glass.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>satin garage door glass</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/clear-garage-door-glass.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>clear garage door glass</h5>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingSix">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false"><span>windows options</span></button>
                            </h3>
                            <div id="collapseSix" class="accordion-collapse collapse"
                                data-bs-parent="#footerAccordion">
                                <div class="card-body">
                                    <div class="row image-and-title">
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/stockbridge-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>stockbridge garage windows</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/stockton-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>stockton garage windows</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/prairie-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>prairie garage windows</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/cascade-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>cascade garage windows</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/waterton-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>waterton garage windows</h5>
                                            </article>
                                        </div>
                                        <div class="col-6">
                                            <article>
                                                <img src="{{asset('front-assets/images/plain-garage-windows.jpg')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy">
                                                <h5>plain garage windows</h5>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingSeven">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false"><span>Literature</span></button>
                            </h3>
                            <div id="collapseSeven" class="accordion-collapse collapse"
                                data-bs-parent="#footerAccordion">
                                <div class="card-body">
                                    <div class="row image-and-title">
                                        <div class="col-6">
                                            <article>
                                                <a href=""><img src="{{asset('front-assets/images/ClassicPremium-May2023.webp')}}" width="auto" height="auto" alt="" class="img-fluid"  loading="lazy"></a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingEight">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false"><span>warranty information</span></button>
                            </h3>
                            <div id="collapseEight" class="accordion-collapse collapse"
                                data-bs-parent="#footerAccordion">
                                <div class="card-body">
                                    <div class="warrantyinformation-sec">
                                        <article>
                                            <div class="warranty-title">
                                                <img src="{{asset('front-assets/images/warranty-title-bg.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                                                <div class="text-sec">
                                                    <h3>Lifetime</h3>
                                                    <h4>Section Warranty</h4>
                                                </div>
                                            </div>
                                            <p style=" letter-spacing: 0.02em; ">All residential doors have a limited lifetime section warranty. Warranting against rust-through for as long as you own your home. See our full warranty for further details</p>
                                            <a href="" class="download-pdf" aria-label="download pdf"><img src="{{asset('front-assets/images/download-pdf.png')}}" class="img-fluid"  loading="lazy" alt="" width="40" height="30"></a>
                                        </article>
                                    </div>
            
                                    <div class="warrantyinformation-sec">
                                        <article>
                                            <div class="warranty-title">
                                                <img src="{{asset('front-assets/images/warranty-title-bg.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                                                <div class="text-sec">
                                                    <h3>3 Years</h3>
                                                    <h4>Window Warranty</h4>
                                                </div>
                                            </div>
                                            <p style=" letter-spacing: -0.02em; ">A limited 3-year window warranty is also included, when applicable. See our full warranty for further details.</p>
                                            <a href="" class="download-pdf" aria-label="download pdf"><img src="{{asset('front-assets/images/download-pdf.png')}}" class="img-fluid"  loading="lazy" alt="" width="40" height="30"></a>
                                        </article>
                                    </div>
            
                                    <div class="warrantyinformation-sec">
                                        <article>
                                            <div class="warranty-title">
                                                <img src="{{asset('front-assets/images/warranty-title-bg.png')}}" class="img-fluid"  loading="lazy" alt="" width="auto" height="auto">
                                                <div class="text-sec">
                                                    <h3>3 Years</h3>
                                                    <h4>Hardware Warranty</h4>
                                                </div>
                                            </div>
                                            <p>Our industry-leading hardware comes with a 3-year  limited warranty. See our warranty for further details.</p>
                                            <a href="" class="download-pdf" aria-label="download pdf"><img src="{{asset('front-assets/images/download-pdf.png')}}" class="img-fluid"  loading="lazy" alt="" width="40" height="30"></a>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
            
            
                    </div>
                </div>
            
            
            
            </div>
        </div>
    </section>


@endsection