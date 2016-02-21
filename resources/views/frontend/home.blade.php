@include('frontend.parts.01-head')

<body data-spy="scroll">
<div id="fb-root"></div>
@include('frontend.parts.02-header')

@include('frontend.parts.03-hero')

@include('frontend.parts.04-wedding')

@include('frontend.parts.04a-menu')

@include('frontend.parts.05-story')

@include('frontend.parts.06-gifts')

{{--@include('frontend.parts.07-gallery')--}}

@include('frontend.parts.08-footer')

<!-- RSVP Modal -->
<div id="rsvp-modal" class="modal modal-rsvp" tabindex="-1" role="dialog" aria-labelledby="rsvpModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 id="rsvpModalLabel" class="modal-title text-center">
                    <span class="title script display-block"><span class="title-deco-left"></span><span
                                class="title-text">RSVP</span><span class="title-deco-right"></span></span>
                    <span class="subtitle display-block">Come and celebrate with us! <br /> Please RSVP by the 1st of August, 2016</span>
                </h2>

            </div><!--//modal-header-->
            <div class="modal-body">

            </div><!--//modal-body-->
        </div><!--//modal-content-->
    </div><!--//modal-dialog-->
</div><!--//modal-->

@section('scripts')
    <script type="text/javascript">
        var rsvp = new Rsvp({
            form: {
                stepOne: '{!! eview('frontend.modal.rsvp.step-one') !!}',
                stepTwo: '{!! eview('frontend.modal.rsvp.step-two') !!}'
            },
            menu: {
                standard: '{!! eview('frontend.modal.rsvp.menu', ['prefix' => 'invitee[_ID_]', 'ceremonyGuest' => true]) !!}',
                plusOne: '{!! eview('frontend.modal.rsvp.plus-one-menu') !!}',
                reception: '{!! eview('frontend.modal.rsvp.menu', ['prefix' => 'reception[_ID_]']) !!}'
            },
            modal: '#rsvp-modal'
        })

        $(function () {
            $('#rsvp-modal').on('show.bs.modal', function (e) {
                rsvp.showStepOneForm()
            })
        })
    </script>
@stop
@include('frontend.parts.09-scripts')

</body>

</html>