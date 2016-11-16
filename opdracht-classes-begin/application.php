<?php
    function __autoload($className) { # "__autoload()" loads classes and interfaces // better is: "spl_autoload_register()" because more flexible
        include_once "Classes/" . $className . ".php";
    }
    $perc = new Percent(150, 100);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht classes: begin</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Opdracht classes: begin</h1>     
            <div class="facade-minimal table-result" data-url="http://www.app.local/application.php">
                <style>
                    .table-result table
                    {
                        border:1px solid lightgrey;
                        border-collapse:collapse;
                        max-width:350px;
                    }

                    .table-result td
                    {
                        border:1px solid lightgrey;
                        padding:12px;
                    }
                </style>
                <table>
                    <caption>Hoeveel procent is 150 van 100?</caption>
                    <thead></thead>
                    <tfoot></tfoot>
                    <tbody>
                        <tr>
                            <td>Absoluut</td>
                            <td><?= $perc->absolute ?></td>
                        </tr>
                        <tr>
                            <td>Relatief</td>
                            <td><?= $perc->relative ?></td>
                        </tr>
                        <tr>
                            <td>Geheel getal</td>
                            <td><?= $perc->hundred ?>%</td>
                        </tr>
                        <tr>
                            <td>Nominaal</td>
                            <td><?= $perc->nominal ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </section>
        
        
    </body>
</html>
