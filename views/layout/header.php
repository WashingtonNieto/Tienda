<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tienda de Camisetas</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
    </head>
    <body>
        <div id="container">
            <!-- CABECERA -->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" />
                    <a href="index.php">
                        <h1>Tienda de Camisetas</h1>
                    </a>
                </div>

            </header>

            <!-- MENU -->
            <?php $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <?php while ($cat = $categorias-> fetch_object()): ?>
                    <!-- 
                    fetch_object  Recorreme y sacame los objetos de todas 
                    las categorias de todo el resourcet que ha devuelto la bd
                    -->
                    <li>
                        <a href="#"><?= $cat?->nombre?></a>
                    </li>
                    <?php endwhile; ?>
    
                </ul>
            </nav>

            <div id="content">