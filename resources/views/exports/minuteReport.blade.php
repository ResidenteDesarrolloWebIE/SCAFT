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
            bottom: 20px;
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
                Fecha:<span style="display:none;">{{setlocale(LC_TIME, 'spanish')}}</span>
                {{strftime("%d de %B del %Y", strtotime(date("d-m-Y",strtotime($minuta->created_at))))}}</div>
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
        {{--<p>Responsable de llenado de Minuta: Jesús Israel Santiago Gutierrez.</p>--}}
    </main>
    <footer>
        <p style="font-size:14px">INTEGRACION DE ENERGIA S.A DE C.V.</p>
        <p style="font-size:13px">Bosques de Oyamel #99 A, Col. Bosques del Sol. Querétaro, Qro., México C.P.76113</p>
        <em style="font-size:12px">Este documento no tiene ningun valor legal, sólo es de carácter informativo.</em>
    </footer>
</body>

</html>