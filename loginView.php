<?php
class LoginView {
    // Mostrar formulario de login
    public function showLogin($error = null) {
        echo "<div class='login-container'>";
        if ($error) {
            $this->renderError($error);
        }
        $this->renderLoginForm();
        echo "</div>";
    }

    // Mostrar mensaje de error
    private function renderError($error) {
        echo "<div class='alert alert-danger' role='alert'>$error</div>";
    }

    // Renderizar el formulario de login
    private function renderLoginForm() {
        echo "
            <form method='post' action='Login'>
                <div class='form-group'>
                    <label for='username'>Usuario</label>
                    <input type='text' class='form-control' id='username' name='username' required>
                </div>
                <div class='form-group'>
                    <label for='password'>Contraseña</label>
                    <input type='password' class='form-control' id='password' name='password' required>
                </div>
                <button type='submit' class='btn btn-primary'>Iniciar sesión</button>
            </form>
        ";
    }
}
