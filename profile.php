<?php
session_start();

if (!isset($_SESSION['uzivatel'])) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . $_SESSION['uzivatel'] . "! This is your profile.";
?>
