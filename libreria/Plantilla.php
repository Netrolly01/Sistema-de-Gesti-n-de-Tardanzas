<?php

class Plantilla
{

    static $instance = null;

    public static function aplicar()
    {
        if (self::$instance == null) {
            self::$instance = new Plantilla();
        }
    }

    public function __construct()
    {
        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sistema de Gestión Educativa</title>

            <style>
            /* General body styles */
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f5f5f5;
                background-size: cover;
                background-position: center;
                margin: 0;
                padding: 0;
                color: #333;
            }

            /* Container to center the content */
            .container {
                width: 90%;
                max-width: 1000px;
                margin: 30px auto;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                min-height: 800px;
            }

            /* Header styles */
            h1 {
                font-size: 2.8em;
                color: #2c3e50;
                margin-bottom: 20px;
                text-align: center;
            }

            /* Paragraph styles */
            p {
                font-size: 1.2em;
                color: #34495e;
                line-height: 1.6;
                text-align: center;
            }

            /* Label and input styles */
            label, input {
                font-size: 1.2em;
                color: #34495e;
            }

            input {
                padding: 10px;
                margin-top: 5px;
                width: 100%;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #ecf0f1;
            }

            /* Table styles */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 30px;
            }

            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #bdc3c7;
                font-size: 1.1em;
            }

            th {
                background-color: #2980b9;
                color: white;
            }

            td {
                background-color: #ecf0f1;
            }

            /* Navigation bar styles */
            .navbar {
                overflow: hidden;
                background-color: #2c3e50;
                padding: 10px 0;
            }

            .navbar a {
                float: left;
                display: block;
                color: white;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
                font-size: 1.2em;
            }

            .navbar a:hover {
                background-color: #34495e;
            }

            /* Sidebar styles */
            .sidebar {
                height: 100%;
                width: 250px;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #2c3e50;
                padding-top: 20px;
            }

            .sidebar a {
                padding: 10px 15px;
                text-decoration: none;
                font-size: 1.2em;
                color: white;
                display: block;
            }

            .sidebar a:hover {
                background-color: #34495e;
            }

            .main-content {
                margin-left: 260px;
                padding: 20px;
            }
            }

            .d-derecha {
                text-align: right;
            }

            /* Button styles */
            .boton {
                background-color: #27ae60;
                color: white;
                padding: 15px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 1.2em;
                margin-top: 20px;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .boton:hover {
                background-color: #2ecc71;
            }

            .footer {
                margin-top: 40px;
                text-align: center;
                color: #7f8c8d;
                font-size: 1em;
                border-top: 1px solid #ccc;
                padding: 10px;
            }

            </style>

        </head>

        <body>
            <div class="container">

                <?php
    }

    public function __destruct()
    {
        ?>

                

        <?php
    }

}
?>