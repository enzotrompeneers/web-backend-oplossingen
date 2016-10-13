<?php
    $md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
    $arg1 = "2";
    $arg2 = "8";
    $arg3 = "a";
    
    function Functie1 ($hashKey, $arg) {
		$hashKeyLen =  strlen($hashKey);
		$argsAantal = substr_count ($hashKey, $arg);
		$argProcent = ($argsAantal / $hashKeyLen) * 100;
		return $argProcent;
	}
	function Functie2($arg) {
		global $md5HashKey;
		$hashKey = $md5HashKey;
		$hashKeyLen = strlen( $hashKey );
		$argsAantal = substr_count($hashKey, $arg);
		$argProcent = ($argsAantal / $hashKeyLen) * 100;
		return $argProcent;
	}

	function Functie3($arg) {
		$hashKey = $GLOBALS["md5HashKey"];
		$argsKeyLen = strlen($hashKey);
		$argsAantal = substr_count ($hashKey, $arg);
		$argProcent = ($argsAantal / $argsKeyLen) * 100;
		return $argProcent;
	}

    $eersteMethode 	=	Functie1($md5HashKey, $arg1);
	$tweedeMethode 	=	Functie2($arg2);
	$derdeMethode 	=	Functie3($arg3);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies gevorderd</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
          <h1>Opdracht functies gevorderd: deel 1</h1>
          <p>Het karakter "<?php echo $arg1?>" komt <?php echo $eersteMethode ?>% voor in de string "<?php echo $md5HashKey ?>"</p>
          <p>Het karakter "<?php echo $arg2?>" komt <?php echo $tweedeMethode ?>% voor in de string "<?php echo $md5HashKey ?>"</p>
          <p>Het karakter "<?php echo $arg3?>" komt <?php echo $derdeMethode ?>% voor in de string "<?php echo $md5HashKey ?>"</p>
            
        </section>

    </body>
</html>
