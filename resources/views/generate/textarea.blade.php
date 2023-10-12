<div class="mb-2 {{ $formGroupClass ?? '' }}">
  @if(isset($label))<label class="mb-1">{{ $label }}</label>@endif
  <textarea {{ isset($id) ? 'id='.$id.'' : '' }} name="{{ $name }}" class="form-control {{ $inputClass ?? '' }}"  placeholder="{{ $label ?? $placeholder ?? '' }}" {{ isset($required) ? 'required' : '' }} autocomplete="off" rows="{{ $rows ?? 3 }}" {{ isset($readonly) ? 'readonly' : '' }}>{{ $value }}</textarea>
</div>