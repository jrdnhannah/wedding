$(document).ready(function () {

    /* ======= Scrollspy ======= */
    $('body').scrollspy({target: '#header', offset: 100});

    /* ======= ScrollTo ======= */
    $('a.scrollto').on('click', function (e) {

        //store hash
        var target = this.hash;

        e.preventDefault();

        $('body').scrollTo(target, 800, {offset: -55, 'axis': 'y'});
        //Collapse mobile menu after clicking
        if ($('.navbar-collapse').hasClass('in')) {
            $('.navbar-collapse').removeClass('in').addClass('collapse');
        }

    });

    /* ======= jQuery Placeholder ======= */
    /* Ref: https://github.com/mathiasbynens/jquery-placeholder */

    $('input, textarea').placeholder();

    /* ======= Countdown ========= */
    // set the date we're counting down to
    var target_date = new Date("October 25, 2016").getTime()

    // variables for time units
    var days, hours, minutes, seconds

    // get tag element
    $('#countdown-box').append(
        $('<span />', {'class': 'days'}),
        $('<span />', {'class': 'hours'}),
        $('<span />', {'class': 'minutes'}),
        $('<span />', {'class': 'secs'})
    )

    // update the tag with id "countdown" every 1 second
    setInterval(function () {

        // find the amount of "seconds" between now and target
        var current_date = new Date().getTime()
        var seconds_left = (target_date - current_date) / 1000

        // do some time calculations
        days         = parseInt(seconds_left / 86400)
        seconds_left = seconds_left % 86400

        hours        = parseInt(seconds_left / 3600)
        seconds_left = seconds_left % 3600

        minutes = parseInt(seconds_left / 60)
        seconds = parseInt(seconds_left % 60)

        // format countdown string + set tag value.
        $('span.days').html([$('<span />', {'class': 'number', text: days}), $('<span />', {
            'class': 'unit script',
            'text':  'Days'
        })])
        $('span.hours').html([$('<span />', {'class': 'number', text: hours}), $('<span />', {
            'class': 'unit script',
            'text':  'Hours'
        })])
        $('span.minutes').html([$('<span />', {'class': 'number', text: minutes}), $('<span />', {
            'class': 'unit script',
            'text':  'Minutes'
        })])
        $('span.secs').html([$('<span />', {'class': 'number', text: seconds}), $('<span />', {
            'class': 'unit script',
            'text':  'Seconds'
        })])

    }, 1000)


    /* ======= Google Map ======= */
    map = new GMaps({
        div:         '#map',
        lat:         51.350426,
        lng:         -0.825824,
        scrollwheel: false,
        zoom:        14,
    })

    map.addMarker({
        lat:           51.350426,
        lng:           -0.825824,
        verticalAlign: 'top',
        title:         'Ceremony &amp; Reception Location',
        infoWindow:    {
            content: '<div class="note">Ceremony &amp; Reception</div>' +
                     '<h4 class="map-title script">Rivervale Barn</h4>' +
                     '<div class="address">' +
                     '<span class="region">Mill Farm</span><br>' +
                     '<span class="postal-code">GU46 7SS</span><br>' +
                     '<span class="city-name">Yateley</span>' +
                     '</div>'
        }
    })

    

    /*display marker 1 address on load */
    google.maps.event.trigger(map.markers[0], 'click');

    /* ======= Instagram ======= *
    //Instafeed.js - add Instagram photos to your website
    //Ref: http://instafeedjs.com/

    var loadButton = document.getElementById('load-more');
    var feed       = new Instafeed({
        limit:      28,
        get:        'tagged',
        tagName:    'filmweddingphotographer', /* Remember to use a unique hastag for the wedding * /
        clientId:   "467ede5a6b9b48ae8e03f4e2582aeeb3", /* IMPORTANT: REPLACE THE DEMO CLIENTID WITH YOUR CLIENTID! Find out your clientID: http://darkwhispering.com/how-to/get-a-instagram-client_id-key * /
        resolution: 'thumbnail',
        template:   '<a class="instagram-item item" href="{{link}}" target="_bl#k"><img class="img-responsive" src="{{image}}" /></a>',
        sortBy:     'most-liked',
        // every time we load more, run this function
        after:      function () {
            // disable button if no more results to load
            if (!this.hasNext()) {
                loadButton.setAttribute('disabled', 'disabled');
            }
        },
    });

    // bind the load more button
    loadButton.addEventListener('click', function () {
        feed.next();
    });

    // run our feed!
    feed.run();*/


    /* ===== Packery ===== */
    //Ref: http://packery.metafizzy.co/
    //Ref: http://imagesloaded.desandro.com/

    var $container = $('#photos-wrapper');

    // init
    $container.imagesLoaded(function () {
        $container.packery({
            itemSelector:    '.item',
            percentPosition: true
        });
    });
});