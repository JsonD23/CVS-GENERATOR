{{ view('layouts.header') }}

<div class="content-wrapper mt-4">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="m-0" style="color: #1B6DA9;">Manejo de Cv´s</h1>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('user.profile.create') }}" class="add-btn">
                        <i class="fa fa-user-plus"></i>
                        <br> Agregar nuevo 
                    </a>
                
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ul class="page-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item">Home</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: #1B6DA9;" >Perfiles de Usuario </h3>
                    </div>
                    <div class="card-body">
                        <table id="user_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto de perfil</th>
                                    <th>Título</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos </th>
                                    <th>Email</th>
                                    <th>Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($users_data as $user)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>
                                            <img class="profile box-image-preview img-fluid img-circle elevation-2" src="{{ isset($user['personal_info']['image_path']) && !empty($user['personal_info']['image_path']) ? asset('assets/images/'. $user['personal_info']['image_path'])  : asset('assets/images/user-thumb.jpg') }}"
                                            alt="" style="height:40px; width:40px;" />
                                        </td>
                                        <td>{{ $user['personal_info']['profile_title'] }}</td>
                                        <td>{{ $user['personal_info']['first_name'] }}</td>
                                        <td>{{ $user['personal_info']['last_name'] }}</td>
                                        <td>{{ $user['contact_info']['email'] }}</td>
                                        <td align="center">
                                            <div class="d-flex flex-row justify-content-around">
                                                <a class="view_btn"
                                                    href="{{ route('user.profile.view', $user['personal_info']['id']) }}"
                                                    title="Plantilla 1 ">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                
                                                  <!-- Segundo ícono de vista -->
                                                <a class="view_btn"
                                            href="{{ route('user.profile.viewdos', $user['personal_info']['id']) }}"
                                             title="Plantilla 2">
                                            <i class="fas fa-eye"></i>
                                            </a>
                                               <!-- Tercero  -->
                                               <a class="view_btn"
                                            href="{{ route('user.profile.viewset', $user['personal_info']['id']) }}"
                                             title="Plantilla 3">
                                            <i class="fas fa-eye"></i>
                                            </a>

                                                <a class="edit_btn"
                                                    href="{{ route('edit', $user['personal_info']['id']) }}"
                                                    title="Edit Profile">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('destroy', $user['personal_info']['id']) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    <a href="javascript::void(0)" onclick="confirm_form_delete(this)"
                                                        class="del_btn" title="Delete Profile">
                                                        <i class="fas fa-user-minus text-danger"></i>
                                                    </a>
                                                     <!-- Segundo ícono de vista -->
    
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

<div class="container mt-4 text-center">
    <a href="http://127.0.0.1:8000/" class="btn btn-primary">
        Ir a la página principal
    </a>
</div>

{{ view('layouts.footer') }}
