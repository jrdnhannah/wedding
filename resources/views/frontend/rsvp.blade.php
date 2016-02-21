@extends('frontend.home')

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
            $('#rsvp-modal').off('show.bs.modal').on('show.bs.modal', function () {
                rsvp.showStepTwoForm({!! $rsvp !!})
            }).modal('show')
        })
    </script>
@stop