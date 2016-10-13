<?php
    $rijen = 10;
    $kolommen = 10;
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht for</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

        <style>
            .oneven
            {
                background-color    :   lightgreen;
            }
        </style>

            <h1>Opdracht for: deel 1</h1>
            <table>
                <?php for( $r = 0; $r < $rijen; ++$r ):  ?>
				
				<tr>	
					<?php for( $k = 1; $k <= $kolommen; ++$k ):  ?>
						<td class="<?= ( ( $r * $k ) % 2 > 0 ) ? 'oneven' : '' ?>"><?= $r * $k ?></td>
					<?php endfor ?>
				</tr>
			<?php endfor ?>
            </table>

        </section>

    </body>
</html>
