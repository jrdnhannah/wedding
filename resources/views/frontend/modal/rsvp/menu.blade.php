@if (isset($ceremonyGuest))
    @foreach (['starter', 'main', 'dessert'] as $course)
        <div class="message-group col-md-12 col-sm-12 col-xs-12 form-group">
            <div class="form-group-inner">
                <label for="{{ $prefix }}[menu][{{$course}}]">{{ucfirst($course)}}</label>
                <select id="{{ $prefix }}[menu][{{$course}}]" class="form-control" name="{{ $prefix }}[menu][{{$course}}]{{$suffix ?? ''}}">
                    <option value="" selected></option>
                    <option value="N/A">No, thank you</option>
                    <optgroup label="Adults">
                        @foreach (config('wedding.menu.adult')[$course] as $key => $item)
                            <option value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Childrens Menu">
                        @foreach (config('wedding.menu.childrens')[$course] as $key => $item)
                            <option value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
    @endforeach
@endif
<div class="message-group col-md-12 col-sm-12 col-xs-12 form-group">
    <div class="form-group-inner">
        <label for="{{ $prefix }}[dietry]">Dietry Requirements / Notes</label>
        <textarea id="{{ $prefix }}[dietry]"
                  class="form-control"
                  name="{{ $prefix }}[dietry]{{$suffix ?? ''}}"
                  placeholder="Please let us know of any extra dietry requirements, i.e. nut allergy"></textarea>
    </div>
</div>