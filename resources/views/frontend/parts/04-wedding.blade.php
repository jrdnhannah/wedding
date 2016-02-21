<!-- ******Wedding Section****** -->
<section id="wedding" class="wedding-section section">
    <div class="container text-center">
        <h3 class="title script"><span class="title-deco-left hidden-xs"></span><span class="title-text">The Wedding</span><span
                class="title-deco-right hidden-xs"></span></h3>
        <div id="countdown-box" class="countdown-box"></div><!--//countdown-box-->
        <div class="row cols-wrapper">
            <div class="ceremony-col col-xs-12">
                <div class="col-inner">
                    <h4 class="subtitle">Ceremony &amp; Reception</h4>
                    <p class="intro">We are getting married at {{ config('wedding.venue.name') }}. </p>
                    <ul class="meta-list list-unstyled text-left center-block">
                        <li>
                            <span class="visible-lg visible-md"><i class="icon-calendar love-icon"></i>{{ wedding_date('l - F jS, Y') }}</span>
                            <span class="hidden-lg hidden-md"><i class="icon-calendar love-icon"></i>{{ wedding_date('d/m/Y') }}</span>
                        </li>
                        <li><span class="icon-clock love-icon"></span>Ceremony - 1pm</li>
                        <li>
                            <i class="icon-clock love-icon"></i>Reception - 7:30pm<span class="visible-md-inline visible-lg-inline"> - Midnight</span>
                        </li>
                        <li>
                            <span class="icon-map love-icon"></span>
                            {{ config('wedding.venue.name') }}
                            <br/>
                            <span class="direction-info list-link">
                                <a href="#" data-toggle="modal" data-target="#direction-modal">
                                    How to get there
                                </a>
                            </span>
                            <br class="hidden-md hidden-lg" />
                            <span class="facilities-info list-link">
                                <a href="#" data-toggle="modal" data-target="#facilities-modal">
                                    Facilities
                                </a>
                            </span>
                        </li>
                    </ul><!--//meta-list-->
                </div><!--//col-inner-->
            </div><!--//ceremony-col-->
        </div><!--//row-->

        <div class="action-wrapper">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#rsvp-modal">RSVP Now</a>
        </div><!--//action-wrapper-->

    </div><!--//container-->
    <div id="map" class="map-container">
    </div><!--//map-container-->
</section><!--//wedding-section-->


<!-- Direction Modal-->
<div id="direction-modal" class="direction-modal modal" tabindex="-1" role="dialog"
     aria-labelledby="directionModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="directionModalLabel">How to get to the event</h4>
            </div><!--//modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="event-col col-md-10 col-sm-10 col-sm-offset-1 col-xs-12">
                        <h4 class="col-title text-center">Ceremony &amp; Reception</h4>
                        <div class="col-subtitle script text-center">{{ config('wedding.venue.name') }}</div>
                        <h5 class="section-title"><i class="fa fa-car"></i> By Car</h5>
                        <p>{{ config('wedding.venue.name') }} is in Yately, close to the A30 and the M3.<br />
                        Please take a look at the <a href="#map">map</a> for the location.</p>
                    </div><!--//event-col-->
                </div><!--//row-->
            </div><!--//modal-body-->
        </div><!--//modal-content-->
    </div>
</div><!--//modal-->

<!-- Facilities Modal 1-->
<div id="facilities-modal" class="facilities-modal modal" tabindex="-1" role="dialog"
     aria-labelledby="facilitiesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="facilitiesModalLabel">Facilities</h4>
            </div><!--//modal-header-->
            <div class="modal-body">
                <div class="row">
                    <div class="event-col col-md-10 col-sm-10 col-sm-offset-1 col-xs-12">
                        <h4 class="col-title text-center">Ceremony &amp; Reception</h4>
                        <div class="col-subtitle script text-center">{{ config('wedding.venue.name') }}</div>
                        <ul class="list-unstyled facilities-list">
                            <li><i class="fa fa-check"></i> Internet Access / WiFi</li>
                            <li><i class="fa fa-check"></i> Disabled Access</li>
                            <li><i class="fa fa-check"></i> Bathroom and baby changing
                                <br>
                                <span class="details">There is a disabled bathroom with nappy changing facilities.</span>
                            </li>
                            <li><i class="fa fa-check"></i> Car Parking
                                <br>
                                <span class="details">The venue closes at 12:15am. Any cars left overnight must be picked up between 8am and 10am the following day.</span></li>
                            <li><i class="fa fa-check"></i> Bar</li>
                        </ul>
                    </div><!--//event-col-->
                </div><!--//row-->
            </div><!--//modal-body-->
        </div><!--//modal-content-->
    </div>
</div><!--//modal-->

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {
            $('.modal a[href="#map"]').click(function (e) {
                $(this).parents('.modal').modal('hide')
            })
        })
    </script>
@stop