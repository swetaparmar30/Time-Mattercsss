   <section class="common-prodoor-padding common-prodoor product-details-section residential-product-details-section ">
        <div class="container-md">
            <div class="row desktop-product-details-sec">
                <div class="col-12 text-center">
                    <h2>Door Selections</h2>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 left-side">
                    <ul class="nav nav-tabs">
                    @foreach($doorSelection as $key => $door)
                        <li class="nav-item" data-bs-active="#door-{{ $door->id }}">
                            <a class="{{ $key === 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#door-{{ $door->id }}">
                                {{ isset($door->door_title) ? $door->door_title : '' }}
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>

                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 right-side">
                    <div class="tab-content">
                      @foreach($doorSelection as $key => $door)
                            <div id="door-{{ $door->id }}" class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}">
                                <div class="row image-and-title">
                                    {!! html_entity_decode($door->door_description) !!}
                                </div>
                            </div>
                      @endforeach
                    </div>
                </div>
            </div>

            <div class="row mobile-product-details-sec">
                <h2>Door Selections</h2>
            
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
                    <div class="accordion" id="footerAccordion">

                       @foreach($doorSelection as $key => $door)
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="heading{{ $key }}">
                                <button type="button"class="accordion-button {{ $key === 0 ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"><span>{{ isset($door->door_title) ? $door->door_title : '' }}</span></button>
                            </h3>
                            <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                                data-bs-parent="#footerAccordion" style="">
                                <div class="card-body">
                                    <div class="row image-and-title">
                                    {!! html_entity_decode($door->door_description) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            
            
            
            </div>
        </div>
    </section>