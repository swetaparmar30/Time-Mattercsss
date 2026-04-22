<section class="diffrent-brand-sec newHome-common-padding sandk-newHome four-locations">
    <div class="container-md">
        <div class="row align-items-center location-line">

            <h2>Location</h2>
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 border-right">
                <h4>Newport, Delaware</h4>
                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            @if (isset($setting->location) && $setting->location != '')
                                <li class="lc_m">{!! html_entity_decode($setting->location) !!}</li>
                            @endif
                            @if (isset($setting->contact_no) && $setting->contact_no != '')
                                <li class="lc_c"><a
                                        href="tel:+1 {{ isset($setting->contact_no) ? $setting->contact_no : '' }}"
                                        class="custom_fonts_amiko">{{ isset($setting->contact_no) ? $setting->contact_no : '' }}</a>
                                </li>
                            @endif
                            @if (isset($setting->email) && $setting->email != '')
                                <li class="lc_e"><a href="mailto:{!! strip_tags(html_entity_decode($setting->email)) !!}">{!! html_entity_decode($setting->email) !!}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 border-right">
                <h4>Salisbury, Maryland</h4>

                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            @if (isset($setting->location2) && $setting->location2 != '')
                                <li class="lc_m">{!! html_entity_decode($setting->location2) !!}</li>
                            @endif
                            @if (isset($setting->contact_no2) && $setting->contact_no2 != '')
                                <li class="lc_c"><a
                                        href="tel:+1 {{ isset($setting->contact_no2) ? $setting->contact_no2 : '' }}"
                                        class="custom_fonts_amiko">{{ isset($setting->contact_no2) ? $setting->contact_no2 : '' }}</a>
                                </li>
                            @endif
                            @if (isset($setting->email2) && $setting->email2 != '')
                                <li class="lc_e"><a href="mailto:{!! strip_tags(html_entity_decode($setting->email2)) !!}">{!! html_entity_decode($setting->email2) !!}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 border-right">
                <h4>Dover, Delaware </h4>
                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            @if (isset($setting->location3) && $setting->location3 != '')
                                <li class="lc_m">{!! html_entity_decode($setting->location3) !!}</li>
                            @endif
                            @if (isset($setting->contact_no3) && $setting->contact_no3 != '')
                                <li class="lc_c"><a
                                        href="tel:+1 {{ isset($setting->contact_no3) ? $setting->contact_no3 : '' }}"
                                        class="custom_fonts_amiko">{{ isset($setting->contact_no3) ? $setting->contact_no3 : '' }}</a>
                                </li>
                            @endif
                            @if (isset($setting->email3) && $setting->email3 != '')
                                <li class="lc_e"><a href="mailto:{!! strip_tags(html_entity_decode($setting->email3)) !!}">{!! html_entity_decode($setting->email3) !!}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <h4>Georgetown, Delaware </h4>
                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            @if (isset($setting->location4) && $setting->location4 != '')
                                <li class="lc_m">{!! html_entity_decode($setting->location4) !!}</li>
                            @endif
                            @if (isset($setting->contact_no4) && $setting->contact_no4 != '')
                                <li class="lc_c"><a
                                        href="tel:+1 {{ isset($setting->contact_no4) ? $setting->contact_no4 : '' }}"
                                        class="custom_fonts_amiko">{{ isset($setting->contact_no4) ? $setting->contact_no4 : '' }}</a>
                                </li>
                            @endif
                            @if (isset($setting->email4) && $setting->email4 != '')
                                <li class="lc_e"><a
                                        href="mailto:{!! strip_tags(html_entity_decode($setting->email4)) !!}">{!! html_entity_decode($setting->email4) !!}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
