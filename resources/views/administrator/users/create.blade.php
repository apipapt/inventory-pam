@extends('layouts.app', ['title' => __('User Profile')])
@section('content')
  @include('users.partials.header', [
      'title' => __('Create Student')
      // 'class' => 'col-lg-7'
  ])
  <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create Student</h3>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <a href="" class="btn btn-sm btn-primary">Add user</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body bg-secondary">
                    <form action="{{ route('administrator.user.store') }}" method="POST">
                        @csrf
                        @include('administrator.users.partials.form')
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-outline-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
  </div>
@endsection
