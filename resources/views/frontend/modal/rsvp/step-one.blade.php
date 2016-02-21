@if (Carbon\Carbon::now()->gte(Carbon\Carbon::createFromFormat('Y-m-d', config('wedding.rsvp_close'))))
    <div id="form-messages" class="text-center">
        Sorry, RSVPs are now closed.
    </div>
@else
    <form id="rsvp-form" class="rsvp-form form" method="post" action="/">
        <div id="form-messages" class="text-center"></div>
        <div class="row text-center">
            <div class="name-group col-md-10 col-sm-10 col-sm-offset-1 col-xs-12 form-group">
                <div class="form-group-inner">
                    <label for="cname">Name</label>
                    <input type="text"
                           class="form-control"
                           id="cname"
                           name="name"
                           placeholder="Your full name"
                           minlength="2"
                           aria-required="true"
                           required
                           autocomplete="off">
                    <span class="help-block rsvp-404">
                        Sorry, we couldn't find your name!<br />
                        Email <a href="mailto:rsvp+help@carlyandjordan.co.uk?subject=Rsvp%20Help">rsvp+help@carlyandjordan.co.uk</a>&nbsp;
                        or call <a href="tel:+44{{ config('wedding.contact_number') }}">{{ config('wedding.contact_number') }}</a>
                    </span>
                    <span class="help-block general-error">
                        Oh no, something went wrong!<br/>
                        Email <a href="mailto:rsvp+help@carlyandjordan.co.uk?subject=Rsvp%20Help">rsvp+help@carlyandjordan.co.uk</a>&nbsp;
                        or call <a href="tel:+44{{ config('wedding.contact_number') }}">{{ config('wedding.contact_number') }}</a>, and&nbsp;
                        we'll get this sorted out!
                    </span>
                </div>
            </div>

            @include('frontend.modal.rsvp.footer')

        </div>
    </form><!--//rsvp-form-->
@endif