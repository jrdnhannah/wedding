<!-- ******Menu Section****** -->
<section id="menu" class="gift-section section">
    <div class="container text-center">
        <h3 class="title script"><span class="title-deco-left hidden-xs"></span><span class="title-text">Menu</span><span
                    class="title-deco-right hidden-xs"></span></h3>
        <div class="row cols-wrapper">
            <div class="ceremony-col col-xs-12">
                <div class="col-inner">
                    <p class="intro">We have both adult and child menus, and a range of vegetarian options.<br />
                        If you have specific dietary requirements, please get in touch and email <a href="mailto:wedding@carlyandjordan.co.uk?subject=RSVP">wedding@carlyandjordan.co.uk</a><br />
                        Or if you would prefer, call us on <a href="tel:+44{{ config('wedding.contact_number') }}">{{ config('wedding.contact_number') }}</a></p>
                    <div class="row">
                        <div class="col-lg-4 starters">
                            <ul class="meta-list list-unstyled text-left center-block list-group">
                                <li class="list-group-item disabled">Adult</li>
                                @foreach (config('wedding.menu.adult.starter') as $starter)
                                    <li class="list-group-item">{{ $starter }}</li>
                                @endforeach
                                <li class="list-group-item disabled">Childrens</li>
                                @foreach (config('wedding.menu.childrens.starter') as $starter)
                                    <li class="list-group-item">{{ $starter }}</li>
                                @endforeach
                            </ul><!--//meta-list-->
                        </div>
                        <div class="col-lg-4 main">
                            <ul class="meta-list list-unstyled text-left center-block list-group">
                                <li class="list-group-item disabled">Adult</li>
                                @foreach (config('wedding.menu.adult.main') as $starter)
                                    <li class="list-group-item">{{ $starter }}</li>
                                @endforeach
                                <li class="list-group-item disabled">Childrens</li>
                                @foreach (config('wedding.menu.childrens.main') as $starter)
                                    <li class="list-group-item">{{ $starter }}</li>
                                @endforeach
                            </ul><!--//meta-list-->
                        </div>
                        <div class="col-lg-4 dessert">
                            <ul class="meta-list list-unstyled text-left center-block list-group">
                                <li class="list-group-item disabled">Adult</li>
                                @foreach (config('wedding.menu.adult.dessert') as $starter)
                                    <li class="list-group-item">{{ $starter }}</li>
                                @endforeach
                                <li class="list-group-item disabled">Childrens</li>
                                @foreach (config('wedding.menu.childrens.dessert') as $starter)
                                    <li class="list-group-item">{{ $starter }}</li>
                                @endforeach
                            </ul><!--//meta-list-->
                        </div>
                    </div>
                </div><!--//col-inner-->
            </div><!--//ceremony-col-->
        </div><!--//row-->

        <div class="action-wrapper">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#rsvp-modal">RSVP Now</a>
        </div><!--//action-wrapper-->
    </div>
</section><!--//menu-section-->