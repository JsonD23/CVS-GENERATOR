<form action="{{ route('store.nueva.creacion') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Campos del formulario -->
    <div>
        <label for="first_name">Nombre:</label>
        <input type="text" id="first_name" name="first_name" required>
    </div>
    <div>
        <label for="last_name">Apellido:</label>
        <input type="text" id="last_name" name="last_name" required>
    </div>
    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="phone_number">Número de teléfono:</label>
        <input type="text" id="phone_number" name="phone_number" required>
    </div>
    <div>
        <label for="profile_title">Título del perfil:</label>
        <input type="text" id="profile_title" name="profile_title">
    </div>
    <div>
        <label for="about_me">Acerca de mí:</label>
        <textarea id="about_me" name="about_me"></textarea>
    </div>
    <div>
        <label for="image_path">Foto de perfil:</label>
        <input type="file" id="image_path" name="image_path">
    </div>
    <!-- Otros campos necesarios -->
    <button type="submit">Crear perfil</button>
</form>
