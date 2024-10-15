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
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$username || !$password) {
        return $this->showLogin('Complete todos los campos');
    }

    // Verificar credenciales
    $userFromDB = $this->model->getUser($username);
    if (!$userFromDB || !password_verify($password, $userFromDB->password)) {
        return $this->showLogin('Credenciales incorrectas');
    }

    // Iniciar sesión si las credenciales son válidas
    $this->startSession($userFromDB);
    header('Location: ' . BASE_URL . 'home'); // Redirige al usuario a la página principal
}
// Función  para iniciar la sesión y guarda la info del usuario en las variables de sesion
private function startSession($user) {
    session_start();
    $_SESSION['ID'] = $user->id;
    $_SESSION['USER'] = $user->username;
}

    // Manejar el cierre de sesión
    public function logout() {
        session_start();
        session_destroy(); 
        header('Location: ' . BASE_URL);
    }
}
