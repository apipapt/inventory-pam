@extends('layouts.app', ['class' => 'bg-secondary'])

@section('content')
  @include('users.partials.header', [
    'title' => __('Daftar Anggota'),
    'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
    'class' => 'col-lg-8'
  ])   

  <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                  <strong>{{ session('status') }}</strong> Anggota
                  <button type="button" class="close" id="myWish" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif

            @if (session('update'))
              <div class="alert alert-primary alert-dismissible fade show" id="alert-success" role="alert">
                  <strong>{{ session('update') }}</strong> Anggota
                  <button type="button" class="close" id="myWish" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif

            @if (session('delete'))
              <div class="alert alert-danger alert-dismissible fade show" id="alert-success" role="alert">
                  <strong>{{ session('delete') }}</strong> Anggota
                  <button type="button" class="close" id="myWish" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif

            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-6">
                            <h3 class="mb-0">Anggota</h3>
                        </div>
                        <div class="col-md-6 col-6 text-right">
                          <a href="{{ route('administrator.user.create')}}" class="btn btn-sm btn-primary">
                              <i class="fas fa-user-plus"></i>
                              {{ __('Tambah Anggota') }}
                          </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#No Id</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="col">{{$user->id}}</th>
                                <th scope="col">{{$user->name}}</th>
                                <th scope="col">{{$user->email}}</th>
                                <th scope="col">
                                    <span class="badge badge-dot mr-4">
                                      <i class="bg-success"></i>
                                      <span class="status">
                                          @foreach ($user->roles as $role)
                                              {{ $role->name }}
                                          @endforeach
                                      </span>
                                    </span>
                                </th>
                                <th scope="col">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{$user->id}}">
                                        edit
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                                      Delete
                                    </button>

                                    <!-- Modal Edit  -->
                                    <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Anggota</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-secondary py-0">
                                                <form action="{{route('administrator.user.update', ['id' => $user->id])}}" method="post">
                                                    @csrf
                                                    @method("PATCH")
                                                    @include('administrator.users.partials.form')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- End Modal edit -->

                                    <!-- Modal Delete  -->
                                    <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Yakin akan menghapus anggota</strong> "{{$user->name}}"
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                                                <form action="{{route('administrator.user.delete',  ['id' => $user->id])}}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Delete -->

                                </th>
                            </tr>  
                            @endforeach

                            <tr>
                                <td colspan="5">
                                  <nav aria-label="Page navigation example">
                                      <ul class="pagination justify-content-center mb-0">
                                          {{$users->onEachSide(1)->links()}}
                                      </ul>
                                  </nav>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-footer py-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mb-0">
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
  </div>


  <script>
    window.setTimeout(function() {
      $("#alert-success").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 2000);
  </script>
      
@endsection
