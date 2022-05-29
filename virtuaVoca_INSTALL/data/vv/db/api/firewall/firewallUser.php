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
if ( !(isset($_SESSION["role"])) || ($_SESSION["role"] < 0) ) {
    header("Location: index.php?err=1");
    exit();
}