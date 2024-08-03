<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller {
    
    public function create() {
        return view('auth.login');
    }

    public function store() {
        // Intentar autenticar al usuario con las credenciales proporcionadas
        if (auth()->attempt(request(['email', 'password']))) {
            // Autenticación exitosa, redirigir a la página de inicio
            return redirect()->route('index'); // Cambia 'index' por el nombre de la ruta de la página de inicio si es diferente
        } else {
            // Autenticación fallida, volver a mostrar el formulario con un mensaje de error
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]);
        }
    }
    
    public function destroy() {
        // Cerrar sesión del usuario
        auth()->logout();

        // Redirigir a la página de inicio
        return redirect()->to('/');
    }
}
