<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../include/db.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connection/connection.php');
    exit;
    
}
$console = 'truc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full7</title>
</head>
<body class="page">

    <?php include '../include/header.php'; ?>
    <h1 class="page-title">
        <?php echo $console ?>
    </h1>
    





