<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <script src="js/jquery3.3.1.js"></script>
    <script src="js/jstree.js"></script>
    <script src="js/scripts.js"></script>
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div id="menu">
    <div id="container"></div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-3"><a href="graph.php" class="btn btn-primary">Графики</a></div>
</div>
<p></p>
<div id="content">
    <table class="table1">
        <tbody>
        <tr>
            <td class="td1">
                <label for="garnum">
                    Гаражный номер объекта
                </label>
            </td>
            <td class="td1">
                <div id="garnum"></div>
            </td>
            <td class="td1">
                <label for="gosnum">
                    Гос. номер объекта
                </label>
            </td>
            <td class="td1">
                <div id="gosnum"></div>
            </td>
            <td class="td1">
                <label for="vin">
                    VIN (Идентификационный номер транспортного средства)
                </label>
            </td>
            <td class="td1">
                <div id="vin"></div>
            </td>
        </tr>
        </tbody>
    </table>
    <table>
        <tr>
            <td>
                Контроллер
            </td>
        </tr>
    </table>
    <tablec0></tablec0>
    <table>
        <tr>
            <td   >
                Датчики
            </td>
        </tr>
    </table>
    <tables0></tables0>
    <br>
    <table>
        <tr>
            <td>
                Контроллер
            </td>
        </tr>
    </table>
    <tablec1></tablec1>
    <table>
        <tr>
            <td>
                Датчики
            </td>
        </tr>
    </table>
    <tables1></tables1>
    <h4>
        <div id="rezult"></div>
    </h4>
</div>
<div id="speed"></div>

<div id="map"></div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkAmxa_5WTQAvy62MCkTOvA-FAJOZBFiI&callback=initMap">
</script>
</body>
</html>