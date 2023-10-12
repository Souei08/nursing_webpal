<div class="mb-2 {{ $formGroupClass ?? '' }}">
  @if(isset($label))<label class="mb-1 {{ $labelStyle ?? '' }}">{{ $label }}</label>@endif
  <input {{ isset($id) ? 'id='.$id.'' : '' }} name="{{ $name }}" type="{{ $type ?? 'text' }}" class="form-control {{ $inputClass ?? '' }}" value="{{ $value }}" placeholder="{{ $label ?? $placeholder ?? '' }}" {{ isset($required) ? 'required' : '' }} autocomplete="off" {{ isset($step) ? 'step='.$step.'' : '' }} {{ isset($disabled) ? 'disabled' : '' }} {{ isset($readonly) ? 'readonly' : '' }}>
</div>