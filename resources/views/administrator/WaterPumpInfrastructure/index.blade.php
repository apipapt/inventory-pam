@extends('layouts.app', ['class' => 'bg-secondary'])

@section('content')
  @include('users.partials.header', [
    'title' => __('Daftar Insfrastruktur Pompa Air'),
    'description' => __('berdasarkan data yang ada di lapangan'),
    'class' => 'col-lg-10'
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

            @if (($errors->any()))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{!! implode('', $errors->all('<div>:message</div>')) !!}</strong>
                    <i type="button" class="pointer mr-3" data-toggle="modal" data-target="#editModal{{old('id')}}">Lihat error</i>
                    <button type="button" class="close" id="myWish" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-6">
                            <h3 class="mb-0">Data Infrastruktur Pompa Air</h3>
                        </div>
                        <div class="col-md-6 col-6 text-right">
                          <a href="{{ route('administrator.waterpumpInfra.create')}}" class="btn btn-sm btn-primary">
                              <i class="fas fa-user-plus"></i>
                              {{ __('Tambah Infrastruktur Pompa Air') }}
                          </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#No Id</th>
                                <th scope="col">Nama Popa Air</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">SWL / DWL</th>
                                <th scope="col">Meter</th>
                                <th scope="col">KW</th>
                                <th scope="col">Overhead</th>
                                <th scope="col">LT</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="col">{{$data->id}}</th>
                                <th scope="col">{{$data->name}}</th>
                                <th scope="col">{{$data->waterPump->name}}</th>
                                <th scope="col">{{$data->location}}</th>
                                <th scope="col">{{$data->type}}</th>
                                <th scope="col">{{$data->type}}</th>
                                <th scope="col">{{$data->type}}</th>
                                <th scope="col">{{$data->type}}</th>
                                <th scope="col">{{$data->type}}</th>
                                <th scope="col">{{$data->type}}</th>
                                <th scope="col">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{$data->id}}">
                                        edit
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$data->id}}">
                                      Delete
                                    </button>

                                    <!-- Modal Edit  -->
                                    <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-secondary py-0">
                                                <form action="{{route('administrator.waterpumpInfra.update', ['id' => $data->id])}}" method="post">
                                                    @csrf
                                                    @method("PATCH")
                                                    @include('administrator.waterPumpInfrastructure.partials.form')
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
                                    <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Yakin akan menghapus data </strong> "{{$data->name}}"
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                                                <form action="{{route('administrator.waterpump.delete',  ['id' => $data->id])}}" method="post">
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
                                <td colspan="12">
                                  <nav aria-label="Page navigation example">
                                      <ul class="pagination justify-content-center mb-0">
                                          {{$datas->onEachSide(1)->links()}}
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
