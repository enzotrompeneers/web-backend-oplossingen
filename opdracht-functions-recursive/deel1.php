<?php
    $bedrag = 100000;
	$rente = 8;
	$aantalJaar = 10;
    function BerekenKapitaal($kapitaal, $renteProcent, $aantalJaar)
	{
		static $teller = 1;
		static $historiek =	array();
		if ($teller <= $aantalJaar) {
			$renteBedrag = floor($kapitaal * ($renteProcent / 100));
			$nieuwKapitaal = $kapitaal + $renteBedrag;
			$historiek[$teller] = 'Nieuw bedrag na '.$teller.' jaar is ' . $nieuwKapitaal . '. De rente is '. $renteBedrag;
			++$teller;
			return berekenKapitaal($nieuwKapitaal, $renteProcent, $aantalJaar);
		}
		else {
			return $historiek;
		}
	}
	$nieuwKapitaal = berekenKapitaal($bedrag, $rente, $aantalJaar);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht recursive</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <style>
                img
                {
                    display:block;
                    padding:6px;
                    margin:24px auto;
                }
            </style>
        
            <h1>Opdracht recursive: deel 1</h1>
                <?php foreach($nieuwKapitaal as $value): ?>
				<p><?php echo $value ?></p>
			<?php endforeach ?>

        </section>

    </body>
</html>
