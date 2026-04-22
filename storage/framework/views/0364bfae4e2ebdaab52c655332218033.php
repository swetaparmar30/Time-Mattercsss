<form id="ContactusForm" action="<?php echo e(route('contact.store')); ?>" method="POST" data-parsley-validate>
    <?php echo csrf_field(); ?>
    <!-- Honeypot Fields -->
    <div style="display:none !important;">
        <label for="hname">Leave this field empty if you're human: </label>
        <input type="text" name="hname" id="hname" tabindex="-1" autocomplete="off" />
        <label for="hemail">Leave this field empty if you're human: </label>
        <input type="email" name="hemail" id="hemail" tabindex="-1" autocomplete="off" />
    </div>
    
    <div class="form-row">
        <input type="text" name="name" placeholder="Name" required data-parsley-required="true" data-parsley-required-message="Please enter your Name" />
        <input type="text" name="company" placeholder="Company" />
    </div>
    <div class="form-row">
        <input type="tel" name="phone" placeholder="Phone" required data-parsley-required="true" data-parsley-required-message="Please enter your Phone number" data-parsley-pattern="^[0-9\-\+\s\(\)]+$" data-parsley-pattern-message="Please enter a valid phone number" />
        <input type="email" name="email" placeholder="Email" required data-parsley-required="true" data-parsley-required-message="Please enter your Email" data-parsley-type="email" data-parsley-type-message="Please enter a valid email address" />
    </div>
    <textarea name="message" id="message" placeholder="Message" rows="5" required data-parsley-required="true" data-parsley-required-message="Please enter your Message"></textarea>
    <button type="submit">Send</button>
</form><?php /**PATH C:\wamp64\www\Time\9-april\resources\views/frontend/includes/contact-form.blade.php ENDPATH**/ ?>