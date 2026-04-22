<section class="get-in-touch-section common-prodoor-padding common-prodoor ">
   <div class="container-md">
      <div class="row align-items-center">
         <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-12 col-xs-12 left-side">
              @if(isset($form->form_title) && !empty($form->form_title))
                                        <h2>{{ strip_tags(html_entity_decode($form->form_title)) }}</h2>
                                    @endif
            <!-- <h2>{{ isset($form->form_title) ? $form->form_title : '' }}</h2> -->

            <h2 style=" color: var(--blue-color); ">{{ isset($form->form_sub_title) ? $form->form_sub_title : '' }}</h2>
            <p>{{ isset($form->form_short_desc) ? $form->form_short_desc : '' }}</p>
            <form action="{{ route('get-in-touch.store') }}" method="POST" data-parsley-validate="" id="contactForm">
               @csrf
               <div class="row">
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                     <label for="" class="form-label">Name*</label>
                     <input type="text" name="name" id="name" class="form-control" required data-parsley-required-message="Please Enter Name" data-parsley-pattern="^[a-zA-Z\s]+$" data-parsley-pattern-message="Only characters are allowed">
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                     <label for="" class="form-label">Phone*</label>
                     <input type="text" name="phone" id="phone" class="form-control" data-parsley-required-message="Please Enter Phone"  data-parsley-pattern="^\d+$" 
                       data-parsley-pattern-message="Phone Number must be numeric"  data-parsley-minlength="10" data-parsley-minlength-message="Phone Number must be at least 10 digits" class="form-control bg-gray"required>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                     <label for="" class="form-label">Company*</label>
                     <input type="text" name="company" id="company" class="form-control" required data-parsley-required-message="Please Enter Company">
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                     <label for="" class="form-label">City*</label>
                     <input type="text" name="city" id="city" class="form-control" required data-parsley-required-message="Please Enter City"> 
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                     <label for="" class="form-label">Email*</label>
                     <input type="email" name="email" id="email" class="form-control" required data-parsley-required-message="Please Enter Email">
                  </div>
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                     <label for="" class="form-label">Message</label>
                     <textarea name="message" id="message" class="form-control"></textarea>
                  </div>
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <button class="blue-common-btn g-recaptcha"
                       data-sitekey="{{ config('services.recaptcha.site_key') }}"
                       data-callback='onSubmit'
                       data-action='submit' style="display: none;"
                       >Send Message</button>
                     <button type="submit" class="blue-common-btn" value="Send">Send</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>