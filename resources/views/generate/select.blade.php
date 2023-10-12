<div class="mb-2 {{ $formGroupClass ?? '' }}">
  @if(isset($label))<label class="mb-1">{{ $label }}</label>@endif
  <select data-value="{{ $dataValue ?? '' }}" {{ isset($id) ? 'id='.$id.'' : '' }} name="{{ $name }}" class="form-control {{ $inputClass ?? '' }}" {{ isset($required) ? 'required' : '' }} autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
    <option value="">{{ $placeholder ?? 'Select...' }}</option>
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}" {{ isset($value) ? ($value == $option['value'] ? 'selected' : '') : '' }}>{{ $option['name'] }}</option>
    @endforeach
  </select>
</div>