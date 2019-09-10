<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Html
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
                    <script rel="preload" src="' . $baseurl . 'js/tableExport/tableExport.js"></script>
                    <script rel="preload" src="' . $baseurl . 'js/tableExport/jquery.base64.js"></script>

                </head>
                <body>';
        echo $top;
    }
    
   
    public function menuDashboard()
    {
        $baseurl = strtolower(base_url());
        $menu = '<div class="ui fixed inverted menu">
                    <div class="ui container">
                        <a href="' . $baseurl . 'dashboard" class="header item">
                            <img class="logo" src="' . $baseurl . 'assets/images/cropped-IMG-20181016-WA0435-2.jpg">
                            <span>&nbsp; Administrador Procefibras App</span>
                        </a>
                        <div class="ui simple dropdown item">
                            Opciones <i class="dropdown icon"></i>
                            <div class="menu">
                                 <div class="item">
                                    <b>Compras</b>
                                    <div class="menu">
                                        <a class="item" href="' . $baseurl . 'dashboard/reportecompras">Compras Realizadas</a>
                                        <a class="item" href="' . $baseurl . 'dashboard/reportecomprasporproductos">Compras por productos</a>
                                    </div>
                                </div>
                                <div class="item">
                                    <b>Ventas</b>
                                    <div class="menu">
                                        <a class="item" href="' . $baseurl . 'dashboard/reporteventas">Ventas Realizadas</a>
                                        <a class="item" href="' . $baseurl . 'dashboard/reporteventasporproductos">Ventas por producto</a>
                                    </div>
                                </div>
                                <a class="item" href="' . $baseurl . 'dashboard/reporteodt">Ordernes de Producción</a>
                                <a class="item" href="' . $baseurl . 'dashboard/reportelotes">Bodega pendiente de procesar</a>
                            </div>
                        </div>
                        <a href="' . $baseurl . '/dashboard/closesession" class="right item">Salir &nbsp; <i class="long arrow alternate right icon"></i></a>
                    </div>
                </div>';
        echo $menu;
    }

    
    public function footer()
    {
        $foo = '</body>
        
        <script>

        function validaFechas() 
          {
            const dateControl1 = document.getElementById("fdesde").value;
            const dateControl2 = document.getElementById("fhasta").value;

            if (dateControl1.length > 0 && dateControl1.length > 0) {

                var dateControl1_s = dateControl1.split("-");
                var dateControl2_s = dateControl2.split("-");

                var date1 = new Date(parseInt(dateControl1_s[0]), parseInt(dateControl1_s[1]) - 1, parseInt(dateControl1_s[2]));
                var date2 = new Date(parseInt(dateControl2_s[0]), parseInt(dateControl2_s[1]) - 1, parseInt(dateControl2_s[2]));

                if (date2 < date1)
                    alert("rango de fechas invalido");
            }
        }

        </script>
        
        
        </html>';
        echo $foo;
    }
}