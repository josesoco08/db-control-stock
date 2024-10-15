<?php
function authMiddleware($res) {
    session_start();
    //verifixa ssi el usuario etsa autenticado
    if (isset($_SESSION['USER'])) {
        $res->user = new stdClass();
        $res->user->id = $_SESSION['USER'];
    } else {
        //si no lo esta redirige al form login
        header('Location: ' . BASE_URL . 'showLogin');
    }
}
