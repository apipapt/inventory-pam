<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="form-control-label" for="input-email">{{ __('Nama') }}</label>
    <input type="text" name="name" id="input-email" 
    class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
    value="{{ ($users) ? old('name', $user->name) : '' }}" placeholder="{{ __('Nama User') }}">

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
    <input type="email" name="email" id="input-email" 
    class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
    value="{{ ($users) ? old('email', $user->email) : '' }}" placeholder="{{ __('Users Email') }}">

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>


<div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
    <label for="exampleFormControlSelect1">{{ __('Homeroom Teachers Name') }}</label>
    <select class="form-control form-control-alternative{{ $errors->has('role_id') ? ' is-invalid' : '' }}" id="exampleFormControlSelect1" name="role_id">
        @php
            $roles = App\Models\Role::get();
        @endphp   

        @if ($users)
            @foreach ($user->roles as $role)
                <option class="active" value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        @else
            <option class="active">Select One Teacher</option>
        @endif

        

      @foreach ($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
      @endforeach
    </select>
    
    @if ($errors->has('role_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('role_id') }}</strong>
        </span>
    @endif
</div>
