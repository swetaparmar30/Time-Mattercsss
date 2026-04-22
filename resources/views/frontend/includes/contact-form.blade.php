<form id="ContactusForm" action="/contact-us-store/" method="POST" data-parsley-validate>

    @csrf

    <!-- Honeypot Fields -->
    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
    <input type="hidden" name="url" value="{{url()->current()}}">
    <div style="display:none !important;">

        <label for="hname">Leave this field empty if you're human: </label>

        <input type="text" name="hname" id="hname" tabindex="-1" autocomplete="off" />

        <label for="hemail">Leave this field empty if you're human: </label>

        <input type="email" name="hemail" id="hemail" tabindex="-1" autocomplete="off" />

    </div>

    

    <div class="form-row">
        <div class="contact-us-form first-block">
            <input type="text" name="name" placeholder="Name" required data-parsley-required="true" data-parsley-required-message="Please Enter Your Name"
            data-parsley-errors-container="#errorName"
            data-parsley-pattern="/^([a-zA-Z]+\s)*[a-zA-Z]+$/" data-parsley-pattern-message="Please Enter Valid Name" />
            <small id="errorName"></small>
        </div>

        <div class="contact-us-form second-block">
            <input type="text" name="company" placeholder="Company" required data-parsley-required="true" data-parsley-required-message="Please Enter Your Company" 
            data-parsley-errors-container="#errorCompany"/>
            <small id="errorCompany"></small>
        </div>
    </div>

    <div class="form-row">
        <div class="contact-us-form third-block">
            <input type="tel" name="phone" placeholder="Phone" required data-parsley-required="true" data-parsley-required-message="Please enter your Phone number" data-parsley-pattern="^[0-9\-\+\s\(\)]+$" data-parsley-pattern-message="Please enter a valid phone number" data-parsley-errors-container="#errorPhone"/>
            <small id="errorPhone"></small>
        </div>
        <div class="contact-us-form fourth-block">
            <input type="email" name="email" placeholder="Email" required data-parsley-required="true" data-parsley-required-message="Please enter your Email" data-parsley-type="email" data-parsley-type-message="Please enter a valid email address" data-parsley-errors-container="#errorEmail"/>
            <small id="errorEmail"></small>
        </div>

    </div>

    <textarea name="message" id="message" placeholder="Message" rows="3"></textarea>

    <button type="submit">Send</button>

</form>

