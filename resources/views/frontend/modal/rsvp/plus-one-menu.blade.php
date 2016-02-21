<div class="row text-center">
    <div class="name-group col-md-10 col-sm-10 col-sm-offset-1 col-xs-12 form-group">
        <div class="form-group-inner">
            <label for="inpt-{{ $id = uniqid() }}">Name</label>
            <input type="text" class="form-control plus-one" name="plus_one[_ID_][name]"
                   placeholder="Name" minlength="2" id="inpt-{{ $id }}">
        </div>
    </div>
    @include('frontend.modal.rsvp.menu', ['prefix' => 'plus_one[_ID_]', 'ceremonyGuest' => true])
</div>