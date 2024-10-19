<?php
require_once 'app/views/loginView.php';
require_once 'app/models/userModel.php';

class LoginController {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new LoginView();
        $this->model = new UserModel();
    }

    // Mostrar formulario de login
    public function showLogin($error = null) {
        $this->view->showLogin($error);
    }

    // Manejar el proceso de login
    public function login() {
        // Validar campos de entrada
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $this->showLogin('Por favor, complete todos los campos');
            return;
        }

        $username = $this->sanitizeInput($_POST['username']);
        $password = $this->sanitizeInput($_POST['password']);

        // Verificar credenciales
        $userFromDB = $this->model->getUser($username);
        if (!$userFromDB || !password_verify($password, $userFromDB->password)) {
            $this->showLogin('Credenciales incorrectas');
            return; 
        }

        // Iniciar sesión si las credenciales son válidas
        $this->startSession($userFromDB);
        header('Location: ' . BASE_URL . '/listProduct'); // Redirigir después del login
        exit; 
    }

    // Iniciar la sesión y guardar la info del usuario en las variables de sesión
    private function startSession($user) {
        session_start();
        $_SESSION['ID'] = $user->id;
        $_SESSION['USER'] = $user->username;
        $_SESSION['is_admin'] = $user->is_admin;  
    }

    // Manejar el cierre de sesión
    public function logout() {
        session_start();
        session_destroy(); 
        header('Location: ' . BASE_URL);
    }

    // Función para sanitizar la entrada del usuario
    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input));
    }
}
