<?php
    $text = file_get_contents('text-file.txt');
    $aChars = str_split($text);
    rsort($aChars);
    $aCharsSortedRev = array_reverse($aChars);

    $aTeller = array();

	foreach($aCharsSortedRev as $value)
	{
		if ( isset ( $aTeller[ $value ] ) )
		{
			++$aTeller[ $value ];
		}
		else
		{
			$aTeller[ $value ] = 1;
		}
		
	}
    $aTellerUniek = array_unique($aTeller);
    $aTellerUniekLen = count($aTellerUniek);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht foreach</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht foreach: deel 1</h1>
            <p>Er zijn: <?php echo $aTellerUniekLen ?> unieke karakters.</p>
            <p>Aantal keer het karakter is gebruikt:</p>
            <pre><?php print_r ($aTeller) ?></pre>

        </section>
      

    </body>
</html>
