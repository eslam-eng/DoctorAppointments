<div>
    <select class="reasons form-select form-select-sm" name="{{$fieldName}}" >
        <option value="">@lang('pages.choose_reason')</option>
        @foreach($reasons as $key=>$name)
            <option value="{{$key}}" @if($selected==$key) selected @endif>{{$name}}</option>
        @endforeach
    </select>
</div>
