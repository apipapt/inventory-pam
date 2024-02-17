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

<div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
  <label for="exampleFormControlSelect1">{{ __('Status Pompa Air') }}</label>
  <select class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}" id="exampleFormControlSelect1" name="status">

    @if ($data->status)
      <option class="active" value="{{ $data->status }}">{{ $data->status }}</option>
    @else
      <option class="active">Select One Status</option>
    @endif

    <option value="Terpasang">Terpasang</option>
    <option value="Belum Terpasang">Belum Terpasang</option>
    <option value="Perbaikan">Perbaikan</option>
  </select>
  
  @if ($errors->has('status'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('status') }}</strong>
      </span>
  @endif
</div>


