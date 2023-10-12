<div class="mb-2 {{ $formGroupClass ?? '' }}">
  <div class="form-check">
    <input type="checkbox" {{ isset($id) ? 'id='.$id.'' : '' }} name="{{ $name }}" class="form-check-input {{ $inputClass ?? '' }}" value="{{ $value }}" {{ isset($required) ? 'required' : '' }} autocomplete="off"  {{ isset($disabled) ? 'disabled' : '' }} {{ isset($readonly) ? 'readonly' : '' }} {{ ! empty($isChecked) ? 'checked' : '' }}>
    @if(isset($label))
    <label class="form-check-label" for="{{ $name }}">
      {{ $label }}
    </label>
    @endif
  </div>
</div>