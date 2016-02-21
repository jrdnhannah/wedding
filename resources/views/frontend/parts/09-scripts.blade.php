<!-- Main Javascript -->
<script type="text/javascript" src="/assets/js/plugins/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/jquery.scroll-to.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/typeahead.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/js/plugins/jquery.placeholder.js"></script>
<script type="text/javascript" src="/assets/js/plugins/jquery.inview.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/packery.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/instafeed.min.js"></script>
{{--<!--//form related JS -->--}}
<script type="text/javascript" src="/assets/js/plugins/jquery.validate.min.js"></script>
{{--<!--//Google map related JS -->--}}
<script type="text/javascript" src="//maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="/assets/js/plugins/gmaps.js"></script>
{{--<!--//Image Gallery related JS -->--}}
{{--<script type="text/javascript" src="assets/plugins/Gallery/js/jquery.blueimp-gallery.min.js"></script>--}}
{{--<script type="text/javascript" src="assets/plugins/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>--}}
{{--<!-- Form iOS fix -->--}}
<script type="text/javascript" src="/assets/js/plugins/isMobile.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/form-mobile-fix.js"></script>
{{--<!--Ajax Form -->--}}
{{--<script type="text/javascript" src="assets/js/ajax-form.js"></script>--}}

<script src="/assets/js/vendor.js"></script>
<script src="/assets/js/rsvp.js"></script>
<script src="/assets/js/bootstrap-modal-fix-ios.js"></script>

@if (config('wedding.ga_key'))
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src   = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '{{ config('wedding.ga_key') }}', 'auto');
    ga('send', 'pageview');

</script>
@endif

@yield('scripts')