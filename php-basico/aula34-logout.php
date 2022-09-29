<?php
// Encerrando a sessão
session_start();
session_unset();
session_destroy();
header('location: aula34-login.php');	