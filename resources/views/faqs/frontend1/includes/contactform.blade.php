<div class="inner-sec">
    <!-- <h2>Need a New Garage Door or Service?</h2> -->
    <h2>Need Assistance?</h2>
    <form action="{{route('get-in-touch.store')}}" method="POST" id="ContactForm" data-parsley-validate>
	@csrf
        <div class="form-group">
            <input type="text" required data-parsley-required-message="Please Enter Name" class="contact_input" id="name" name="name" placeholder="Name*" data-parsley-errors-container="#errorName" data-parsley-pattern="/^([a-zA-Z]+\s)*[a-zA-Z]+$/" data-parsley-pattern-message="Please Enter Valid Name">
            <small id="errorName"></small>
        </div>
        <!-- H o n e y p o t -->
        <label class="ohnohoney" for="hname"></label>
        <input class="ohnohoney" autocomplete="newnm" type="text" id="hname" name="hname" placeholder="NAmes">
        <label class="ohnohoney" for="hemail"></label>
        <input class="ohnohoney" autocomplete="newnm" type="email" id="hemail" name="hemail" placeholder="Emails">
        <!-- /H o n e y p o t -->
        <div class="form-group">
            <input type="email" class="contact_input" id="email" name="email" placeholder="Email*" required data-parsley-required-message="Please Enter Email" data-parsley-type-message="Please Enter Valid Email" data-parsley-errors-container="#errorEmail">
            <small id="errorEmail"></small>
        </div>
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <input type="text" class="contact_input" id="phone" name="phone" placeholder="Phone*" required data-parsley-required-message="Please Enter Phone" data-parsley-errors-container="#errorPhone">
                <small id="errorPhone"></small>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                <input type="text" class="zipcode" id="" name="zipcode" placeholder="Zipcode*" required data-parsley-required-message="Please Enter Zipcode" data-parsley-errors-container="#errorZipcode">
                <small id="errorZipcode"></small>
            </div>
        </div>
        
        <div class="form-group">
            <textarea class="contact_input_textarea" name="message" placeholder="How can we help?" id="message"></textarea>
        </div>
		<input type="hidden" name="url" value="{{url()->current()}}">
        <div class="form-btn">
            <button class="blue-common-btn g-recaptcha"
                       data-sitekey="{{ config('services.recaptcha.site_key') }}"
                       data-callback='onSubmit'
                       data-action='submit' style="display: none;"
                       >Send Message</button>
            <button type="submit">Get A Free Quote</button>
        </div>
    </form>
</div>