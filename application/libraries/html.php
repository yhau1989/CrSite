<?php
defined('BASEPATH') or exit('No direct script access allowed');
class html
{
    public function head()
    {
        $baseurl = strtolower(base_url());
        $top = '<html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title></title>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" type="text/css" media="screen" href="'.$baseurl.'css/semantic.min.css">
                    <link rel="stylesheet" type="text/css" media="screen" href="'.$baseurl. 'css/site.css">
                    <script rel="preload" src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
                    <script rel="preload" src="' . $baseurl . 'js/semantic.min.js"></script>
                    <script rel="preload" src="' . $baseurl . 'js/site.js"></script>
                </head>
                <body>';
        echo $top;
    }
    
    /*public function headForms($scripts)
    {
        $addScripts = '';
        if(isset($scripts) && count($scripts) > 0)
        {
            foreach ($scripts as $value) {
                $addScripts = $addScripts .' '. $value;
            }
        }
        else
        {
            $addScripts = 'else';
        }
        $baseurl = strtolower(base_url());
        $top = '<html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title></title>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" type="text/css" media="screen" href="'.$baseurl .'css/semantic.min.css">
                    <link rel="stylesheet" type="text/css" media="screen" href="'.$baseurl . 'css/site.css">
                    '. $addScripts.'
                    <script rel="preload" src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
                    <script rel="preload" src="' . $baseurl . 'js/semantic.min.js"></script>
                    <script rel="preload" src="' . $baseurl . 'js/site.js"></script>
                    <style>
                        body {
                            background: #f3f3f2 !important;
                        }
                    </style>
                </head>
                <body>';
        echo $top;
    }*/


    public function menuDashboard()
    {
        $baseurl = strtolower(base_url());
        $menu = '<div class="ui fixed inverted menu">
                    <div class="ui container">
                        <a href="' . $baseurl . 'dashboard" class="header item">
                            <img class="logo" src="' . $baseurl . '/assets/images/cropped-IMG-20181016-WA0435-2.jpg">
                            <span>&nbsp; Administrador Procefibras App</span>
                        </a>
                        <a href="' . $baseurl . '/dashboard/closesession" class="item">Salir</a>
                        <div class="ui simple dropdown item">
                            Opciones <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item" href="#">Tipo de materiales</a>
                                <a class="item" href="#">Stocks</a>
                                <a class="item" href="#">Usuarios</a>
                            </div>
                        </div>
                    </div>
                </div>';
        echo $menu;
    }

    /*public function menuSuperior($name_user = null, $user_guid = null)
    {
        $user = (isset($name_user)) ? $name_user : '';
        $guid = (isset($user_guid)) ? $user_guid : '';
        $baseurl = strtolower(base_url());
        $menu = ' <div class="ui container">
        <div class="ui fixed menu mymenu">
            <div class="ui container">
                <div class="ui fluid secondary menu">
                    <a class="browse item">
                        <h3 id="popupMenu" class="yellow">
                            <i class="ui bars icon"></i>
                        </h3>
                    </a>
                    <div class="ui popup bottom left transition hidden">
                        <div class="ui vertical secondary menu menudesplegable">
                            <div class="item">
                                <div class="header">AUTOS</div>
                                <div class="menu">
                                    <a href="'.$baseurl.'autos" class="item">NUEVO AUTO</a>
                                    <a class="item">Consumer</a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="header">ORDENES DE TRABAJO</div>
                                <div class="menu">
                                    <a class="item">Rails</a>
                                    <a class="item">Python</a>
                                    <a class="item">PHP</a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="header">CLIENTES</div>
                                <div class="menu">
                                    <a class="item">Shared</a>
                                    <a class="item">Dedicated</a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="header">Support</div>
                                <div class="menu">
                                    <a class="item">E-mail Support</a>
                                    <a class="item">FAQs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right menu">
                        <div class="item">
                            <div class="ui action left icon input">
                                <i class="search icon"></i>
                                <input type="text" placeholder="Buscar">
                                <button class="ui primary button">Buscar placa</button>
                            </div>
                        </div>
                        <div class="item">
                            <button class="ui secondary button">Nuava Orden</button>
                        </div>
                        <div class="ui dropdown item" tabindex="0">
                            <img src="'.  $baseurl. 'assets/images/avatar/tom.jpg" class="ui avatar image"> '. $user. '
                            <div class="menu" tabindex="-1">
                                <a class="item" href="'.$guid.'">Perfil</a>
                                <a class="item">Opciones</a>
                                <div class="divider"></div>
                                <!-- <div class="header">Orden de Trabajo #</div> -->
                                <!-- <div class="item">
                                    <i class="dropdown icon"></i> Sub Menu
                                    <div class="menu">
                                        <a class="item">Link</a>
                                        <div class="item">
                                            <i class="dropdown icon"></i> Sub Sub Menu
                                            <div class="menu">
                                                <a class="item">Link</a>
                                                <a class="item">Link</a>
                                            </div>
                                        </div>
                                        <a class="item">Link</a>
                                    </div>
                                </div> -->
                                <a href="'. $baseurl. 'dashboard/closesession" class="item">Cerrar sesión <i class="ui sign-in icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    echo $menu;
    }
    */

    
    public function footer()
    {
        $foo = '</body></html>';
        echo $foo;
    }
}