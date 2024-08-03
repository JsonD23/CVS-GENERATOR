<!-- resources/views/nuevoview.blade.php -->

{{ view('layouts.header') }}

<div class="content-wrapper mt-4">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="m-0">Datos de Nueva Creación</h1>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('index') }}" class="add-btn">
                        <i class="fa fa-home"></i>
                        <br> Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Datos</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid wrapper">
                            <div class="row">
                                <div class="col-12">
                                    @if($nuevaCreacionData->isEmpty())
                                        <p>No hay datos de nueva creación disponibles.</p>
                                    @else
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Email</th>
                                                    <th>Teléfono</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($nuevaCreacionData as $data)
                                                    <tr>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->first_name }}</td>
                                                        <td>{{ $data->last_name }}</td>
                                                        <td>{{ $data->email }}</td>
                                                        <td>{{ $data->phone_number }}</td>
                                                        <td>
                                                            <a href="{{ route('user.profile.view', $data->id) }}" class="btn btn-info">Ver</a>
                                                            <a href="{{ route('edit', $data->id) }}" class="btn btn-warning">Editar</a>
                                                            <form action="{{ route('destroy', $data->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

{{ view('layouts.footer') }}
