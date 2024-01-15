<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
  <input type="text" name="name" id="input-name" 
  class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('name', $data->name) : '' }}" placeholder="{{ __('Nama Pompa Air') }}">

  @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
  @endif
</div>

<div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-type">{{ __('Type') }}</label>
  <input type="text" name="type" id="input-type" 
  class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('type', $data->type) : '' }}" placeholder="{{ __('Type Pompa Air') }}">

  @if ($errors->has('type'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('type') }}</strong>
      </span>
  @endif
</div>


