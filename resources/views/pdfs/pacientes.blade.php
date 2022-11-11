<?php

use Illuminate\Support\Facades\DB;

$datos = DB::select('select id, nombres, apellidos, telefono, created_at from pacientes');
$npacientes = DB::select('select count(*) as total from pacientes');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte general de pacientes</title>


        <style type="text/css">
            .clearfix:after {
            content: "";
            display: table;
            clear: both;
            }

            a {
            color: #5D6975;
            text-decoration: underline;
            }

            body {
            position: relative;
            margin: 0 auto; 
            color: #001028;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 12px; 
            font-family: Arial;
            }

            header {
            padding: 10px 0;
            margin-bottom: 30px;
            }

            #logo {
            text-align: center;
            margin-bottom: 10px;
            }

            #logo img {
            width: 90px;
            }

            h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
            }

            #project {
            float: left;
            }

            #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
            }

            #company {
            float: right;
            text-align: right;
            }

            #project div,
            #company div {
            white-space: nowrap;        
            }

            table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
            }

            table tr:nth-child(2n-1) td {
            background: #F5F5F5;
            }

            table th,
            table td {
            text-align: left;
            }

            table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal;
            }

            table .service,
            table .desc {
            text-align: left;
            }

            table td {
            padding: 20px;
            text-align: left;
            }

            table td.service,
            table td.desc {
            vertical-align: top;
            }

            table td.unit,
            table td.qty,
            table td.total {
            font-size: 1.2em;
            }

            table td.grand {
            border-top: 1px solid #5D6975;;
            }

            #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
            }

            footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
            }

            .col-6 {
            flex: 0 0 auto;
            width: 50%;
            }

            .col-md-12 {
                flex: 0 0 auto;
                width: 100%;
            }

            .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
            }

            .row > * {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
            }

            .col {
            flex: 1 0 0%;
            }

            .row-cols-auto > * {
            flex: 0 0 auto;
            width: auto;
            }

            .row-cols-1 > * {
            flex: 0 0 auto;
            width: 100%;
            }

            .row-cols-2 > * {
            flex: 0 0 auto;
            width: 50%;
            }

            .row-cols-3 > * {
            flex: 0 0 auto;
            width: 33.3333333333%;
            }

            .row-cols-4 > * {
            flex: 0 0 auto;
            width: 25%;
            }

            .row-cols-5 > * {
            flex: 0 0 auto;
            width: 20%;
            }

            .row-cols-6 > * {
            flex: 0 0 auto;
            width: 16.6666666667%;
            }

        </style>

  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="https://i.ibb.co/68LMMpt/png-clipart-sigmund-freud-leben-und-sterben-civilization-and-its-discontents-psychoanalysis-freud-s.png" alt="png-clipart-sigmund-freud-leben-und-sterben-civilization-and-its-discontents-psychoanalysis-freud-s-">

      </div>
      <h1>Clinica Psicologica Dia</h1>
      
      <div id="project">
        <div><span>TIPO</span>Reporte general de pacientes</div>
        <div><span>NOMBRE</span>Ingrid Cardona</div>
        <div><span>DIRECCIÓN</span>3.ra calle A 6-50 zona 1, Esquipulas ,Chiquimula, Guatemala</div>
        <div><span>EMAIL</span> <a href="mailto:ingriddia@gmail.com">ingriddia@gmail.com</a></div>
        <div><span>FECHA</span>
            <?php  
                echo " " . date("d") . "/" . date("m") . "/" . date("Y");
            ?>
        </div>
      </div>
    </header>
    <main>
    <h1>Reporte general de pacientes</h1>
        <div>
        <table class="table">
                        <thead>
                            <tr>                     
                                
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Fecha y hora</th>
                    
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datos as $Lista)
                            <tr>
                                
                                <td>{{$Lista->nombres}}</td>
                                <td>{{$Lista->apellidos}}</td>
                                <td>{{$Lista->telefono}}</td>
                                <td>{{$Lista->created_at}}</td>
                                
                            </tr>
                            @endforeach
                            <tr class='noSearch hide'>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>

                    </table>
                    <br>
                    <div>Numero total de pacientes registrados 
                        @foreach($npacientes as $Lista)
                            {{$Lista->total}}
                        @endforeach
                    </div>       
        </div>
        <br>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">EL SIGUIENTE REPORTE SOLO ES PARA USO INFORMATIVO.</div>
      </div>
    </main>
    <footer>
        Proyecto de Graduacion 2022
    </footer>
  </body>
</html>