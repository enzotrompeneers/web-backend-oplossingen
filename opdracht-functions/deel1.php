<?php
    function BerekenSom($getal1, $getal2) {
        return $getal1 + $getal2;
    }
    function Vermenigvuldig($getal1, $getal2) {
        return $getal1 * $getal2;
    }
    function IsEven($getal) {
        if ($getal %2 > 0) {return false;}
        else {return true;}
    }
    $pariteitsGetal = 4;
    $pariteit = IsEven($pariteitsGetal);
    if ($pariteit) {
        $tekst = "even";
    } else {
        $tekst = "oneven";
    }
    $string = "het is mooi weer";
    $strRes = strLenUpper( $string );
    function StrLenUpper($string) 
	{
		$aResult['uppercase'] = strtoupper($string);
		$aResult['length'] = strlen($string);

		return $aResult;
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht functies: deel 1</h1>
            <p>De som van 3 + 5 is <?php echo BerekenSom(3, 5) ?></p>
            <p>Het product van 3 * 5 is <?php echo Vermenigvuldig(3, 5) ?></p>
            <p>Het getal <?php echo $pariteitsGetal ?> is <?php echo $tekst ?></p>
            <p>De string "<?php echo $string ?>" in hoofdletters <?php echo $strRes['uppercase'] ?></p>
            <p>De string is <?php echo $strRes['length'] ?> karakters lang.</p>
        </section>
    </body>
</html>
