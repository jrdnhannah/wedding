<form id="rsvp-form" class="rsvp-form form" method="post">
    <div id="form-messages" class="text-center"></div>
    <div class="row text-left">
        <div class="events-group col-md-6 col-sm-6 col-xs-12 form-group">
            <div class="form-group-inner response-choice">
                <label for="cevents">Are you able to attend?</label>
            </div>
        </div>

        <div class="guests-group col-md-6 col-sm-6 col-xs-12 form-group">
            <div class="form-group-inner"></div>
        </div>

        <div class="menu-group col-md-12 col-sm-12 col-xs-12 form-group">
            <em class="center-block text-center">Please enter your menu choices in the dropdown boxes below.<br />
            Click or tap the guests name to view the menu choices.</em>
            <div class="form-group-inner"></div>
        </div>
        @include('frontend.modal.rsvp.footer')
    </div><!--//row-->
</form><!--//rsvp-form-->