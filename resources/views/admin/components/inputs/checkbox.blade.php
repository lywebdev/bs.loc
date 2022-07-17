<input class="form-check-input"
       type="checkbox"
       id="{{ $name ?? '' }}"
       name="{{ $name ?? '' }}"
       checked="checked">
@if (isset($label))
    <label class="form-check-label" for="{{ $name ?? '' }}">{{ $label }}</label>
@endif
