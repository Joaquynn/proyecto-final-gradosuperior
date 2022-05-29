<?php
////////////////////////
// API - Firewall (Nivel usuario)
// ---------------------
// Controla que sólo puedas entrar en esta página
// si eres usuario o administrador, si no lo eres
// te manda al inicio y te salta la ventana de login
// ---------------------
////////////////////////

// Si no tiene rol o es menor que 0
if ( !(isset($_SESSION["role"])) ) {
    // Le manda al login con el mensaje de error 0
    // ( Debes entrar al sistema )
    header("Location: index.php?err=0");
    exit();
} elseif ($_SESSION["role"] < 1) {
    // Y si no es admin, le manda al inicio directamente
    header("Location: index.php?err=2");
    exit();
}