<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
<title>Minuta {{$minuta->folio}}</title>
    <style>
        h2 {
            text-align: center;
            text-transform: uppercase;
            color: #000;
        }
        .contenido {
            font-size: 14px;
        }

        .folio {
            display: inline-block;
            font-size: 18px;
        }

        .date {
            display: inline-block;
            font-size: 18px;
            text-align: right;
            width: 70%;
        }

        .head {
            width: 100%;
            color: #000;
        }

        td,th {
            text-align: left;
            padding: 0.3em;
            border: 1px solid #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #00456B;
            color: white;
        }

        table {
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .td-center,
        .th-center {
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        p {
            font-size: 16px;
        }
        header {
            position: fixed;
            width: 100%;
            height: 40px;
            margin-bottom: 200px;
            color:#000;
            line-height: 10px;
        }
 
        footer {
            margin-top: 20px;
            width: 100%;
            height: 40px;
            text-align: center;
            position: fixed;
            color:#000;
            line-height: 10px;
            bottom: 10px;
        }
        .information{
            font-size: 17px;
            margin-top: 15px;
            border: #C6CFCD 3px solid;
            padding: 3px;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .assistants{
            font-size: 19px;
            color: #0D769A;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
    </header>
    <main>
        <?php
            $path = public_path('\ie_logo.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="{{$base64}}" width="200px" />
        <div class="head">
            <h2>Reporte de Minuta</h2>
            <div class="folio">Folio de Minuta: {{$minuta->folio}}</div>
            <div class="date">
                Fecha:<span style="display:none;">{{setlocale(LC_TIME, 'spanish')}}. </span>
                {{strftime("%d de %B del %Y", strtotime(date("d-m-Y",strtotime($minuta->created_at))))}}
                 Hora: {{date("h:i:s A",strtotime($minuta->created_at))}}
            </div>
        </div>
        <div class="information">
            Creada por: {{$user->name}}
        </div>
        <div class="information">Asunto a tratar: {{$minuta->issue}}</div>
        <div class="information">Lugar de reunión: {{$minuta->meeting_place}}</div>
        <div class="information">Objetivo: {{$minuta->objective}}</div>

        <div class="assistants">
            <h3>Asistentes</h3>
        </div>
        <table>
            <tr style="font-size:15px;">
                <th class="th-center" style="width:30px;">N°</th>
                <th class="th-center" style="width:300px;">Nombre</th>
                <th class="th-center" style="width:80px;">Dependencia</th>
                <th class="th-center" style="width:200px;">Firma</th>
            </tr>

            @for ($i = 0; $i < count($assistants->nombres); $i++)
            <tr style="font-size:14px;">
                <td class="td-center">{{$i+1 }}</td>
                <td>{{$assistants->nombres[$i]}}</td>
                <td class="td-center">{{$assistants->dependencias[$i]}}</td>
                <td class="td-center"></td>  
            </tr>
            @endfor
        </table>
        <div class="assistants">
            <h3>Acuerdos</h3>
        </div>
        <table>
            <tr style="font-size:15px;">
                <th class="th-center" style="width:30px;">N°</th>
                <th class="th-center" style="width:300px;">Acuerdo</th>
                <th class="th-center" style="width:80px;">Responsable</th>
                <th class="th-center" style="width:80px;">Estatus</th>
                <th class="th-center" style="width:80px;">Fecha Inicio</th>
                <th class="th-center" style="width:80px;">Fecha Final</th>
            </tr>
            @foreach($minuta->agreements as $agreement)
                <tr style="font-size:14px;">
                    <td class="td-center">{{$loop->iteration }}</td>
                    <td>{{$agreement->agreement}}</td>
                    <td>{{$agreement->responsable}}</td>
                    <td class="td-center">{{$agreement->status}}</td>
                    <td class="td-center">{{$agreement->start_date}}</td>
                    <td class="td-center">{{$agreement->end_date}}</td>
                </tr>
            @endforeach
        </table>
    </main>
    <footer>
        <p style="font-size:14px">INTEGRACION DE ENERGIA S.A DE C.V.</p>
        <p style="font-size:13px">Bosques de Oyamel #99 A, Col. Bosques del Sol. Querétaro, Qro., México C.P.76113</p>
    </footer>
</body>

</html>