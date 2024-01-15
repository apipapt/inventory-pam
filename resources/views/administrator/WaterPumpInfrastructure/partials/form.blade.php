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
