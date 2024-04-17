<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Kode lainnya untuk koneksi database

$koneksi = mysqli_connect('localhost','root','','ukk_perpus');