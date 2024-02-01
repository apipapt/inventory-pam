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

<input type="hidden" name="id" value="{{ ($datas) ? old('id', $data->id) : '' }}">

<div class="form-group{{ $errors->has('water_pump_id') ? ' has-danger' : '' }}">
  <label for="input-waterPumpId">{{ __('Pompa Air yang digunakan') }}</label>
  <select class="form-control form-control-alternative{{ $errors->has('water_pump_id') ? ' is-invalid' : '' }}" id="input-waterPumpId" name="water_pump_id">
      @php
          $waterPumps = App\WaterPump::get();
      @endphp   

      @if($datas)
        <option class="active" value="{{ $data->waterPump->id }}">{{ $data->waterPump->name }}</option>
      @else
        <option class="active">Select One Pompa Air</option>
      @endif

      

    @foreach ($waterPumps as $waterPump)
      <option value="{{$waterPump->id}}">{{$waterPump->name}}</option>
    @endforeach
  </select>
  
  @if ($errors->has('water_pump_id'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('water_pump_id') }}</strong>
      </span>
  @endif
</div>


<div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-location">{{ __('Lokasi') }}</label>
  <input type="text" name="location" id="input-location" 
  class="form-control form-control-alternative{{ $errors->has('location') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('location', $data->location) : '' }}" placeholder="{{ __('Lokasi Berada') }}">

  @if ($errors->has('location'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('location') }}</strong>
      </span>
  @endif
</div>

<div class="form-group{{ $errors->has('capacity') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-capacity">{{ __('Kapasitas') }}</label>
  <input type="text" name="capacity" id="input-capacity" 
  class="form-control form-control-alternative{{ $errors->has('capacity') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('capacity', $data->capacity) : '' }}" placeholder="{{ __('Kapasitas') }}">

  @if ($errors->has('capacity'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('capacity') }}</strong>
      </span>
  @endif
</div>

<div class="form-group{{ $errors->has('swl_dwl') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-swl_dwl">{{ __('SWL  / DWL') }}</label>
  <input type="text" name="swl_dwl" id="input-location" 
  class="form-control form-control-alternative{{ $errors->has('swl_dwl') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('swl_dwl', $data->location) : '' }}" placeholder="{{ __('SWL / DWL') }}">

  @if ($errors->has('swl_dwl'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('swl_dwl') }}</strong>
      </span>
  @endif
</div>

<div class="form-group{{ $errors->has('mt') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-mt">{{ __('Meter') }}</label>
  <input type="text" name="mt" id="input-location" 
  class="form-control form-control-alternative{{ $errors->has('mt') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('mt', $data->location) : '' }}" placeholder="{{ __('Meter') }}">

  @if ($errors->has('mt'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('mt') }}</strong>
      </span>
  @endif
</div>

<div class="form-group{{ $errors->has('kw') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-kw">{{ __('KW') }}</label>
  <input type="text" name="kw" id="input-kw" 
  class="form-control form-control-alternative{{ $errors->has('kw') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('kw', $data->kw) : '' }}" placeholder="{{ __('KW') }}">

  @if ($errors->has('kw'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('kw') }}</strong>
      </span>
  @endif
</div>

<div class="form-group{{ $errors->has('overhead') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-overhead">{{ __('overhead') }}</label>
  <input type="text" name="overhead" id="input-overhead" 
  class="form-control form-control-alternative{{ $errors->has('overhead') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('overhead', $data->overhead) : '' }}" placeholder="{{ __('overhead') }}">

  @if ($errors->has('overhead'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('overhead') }}</strong>
      </span>
  @endif
</div>

<div class="form-group{{ $errors->has('lt') ? ' has-danger' : '' }}">
  <label class="form-control-label" for="input-lt">{{ __('lt') }}</label>
  <input type="text" name="lt" id="input-lt" 
  class="form-control form-control-alternative{{ $errors->has('lt') ? ' is-invalid' : '' }}"
  value="{{ ($datas) ? old('lt', $data->lt) : '' }}" placeholder="{{ __('lt') }}">

  @if ($errors->has('lt'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('lt') }}</strong>
      </span>
  @endif
</div>
