<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Creación</title>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-right mb-3">
                <a href="{{ route('index') }}" class="btn btn-primary">
                    <i class="fa fa-home"></i> Home
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Nueva Creación SHEET 2</h2>
                <form action="{{ route('store.nueva.creacion') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Número de Teléfono</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_title">Título del Perfil</label>
                        <input type="text" class="form-control" id="profile_title" name="profile_title">
                    </div>
                    <div class="form-group">
                        <label for="about_me">Sobre Mí</label>
                        <textarea class="form-control" id="about_me" name="about_me"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_path">Imagen de Perfil</label>
                        <input type="file" class="form-control" id="image_path" name="image_path" onchange="display_image(this)">
                        <img class="box-image-preview mt-2" style="max-width: 200px; max-height: 200px;">
                    </div>
                    <div class="form-group">
                        <label for="website">Sitio Web</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <div class="form-group">
                        <label for="linkedin_link">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin_link" name="linkedin_link">
                    </div>
                    <div class="form-group">
                        <label for="github_link">GitHub</label>
                        <input type="text" class="form-control" id="github_link" name="github_link">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitbtn">Guardar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('assets/js/userprofile.js') }}"></script>
    @php
        $message = '';
        $icon = '';

        if (!empty($errors->all())) {
            $icon = 'error';
            $message = $errors->first();
        } elseif (session()->has('success')) {
            $icon = 'success';
            $message = session()->get('success');
        } elseif (session()->has('error')) {
            $icon = 'error';
            $message = session()->get('error');
        } elseif (!empty($success)) {
            $icon = 'success';
            $message = $success;
        }
    @endphp

    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
        });
        var message = '{{ $message }}';
        var icon = '{{ $icon }}';
        if (message.length > 0) {
            Toast.fire({
                icon: icon,
                title: message
            });
        }

        function display_image(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).closest('div').find('.box-image-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
