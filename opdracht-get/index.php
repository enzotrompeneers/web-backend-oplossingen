<?php
    $aArtikels = array( 
    array ("titel" => "Winnaar EuroMillions bekend: lot gekocht in Schaarbeek",
           "datum"=> "13/10/2016",
           "inhoud" => "De Belg die deze week de EuroMillions-superpot van 168.085.323 euro won, heeft zich vandaag - twee dagen na de trekking - gemeld. Dat bericht de Nationale Loterij. Het winnende biljet werd binnengebracht in de 'Librairie de l'Europe', een krantenwinkel in Schaarbeek.",
           "afbeelding" => "img/winnaar.png",
           "afbeeldingBeschrijving" => "winaar krijgt cheque overhandigd"
          ),
    array ("titel" => "Waarom Bob Dylan de Nobelprijs verdient",
           "datum"=> "13/10/2016",
           "inhoud" => "Een kleine verrassing vanmiddag, toen bekend werd dat singer-songwriter Bob Dylan de Nobelprijs voor literatuur had weggekaapt. Menig liefhebber der letteren zal ongetwijfeld de wenkbrauwen gefronst hebben, maar verdient Bob Dylan de prijs misschien toch, een beetje? Als dichter niet, als liedjesschrijver wél, stelde Geoffrey Himes van Paste Magazine eind vorige maand als voorbeschouwing. ",
           "afbeelding" => "img/bobDylan.jpg",
           "afbeeldingBeschrijving" => "Bob Dylan aan het zingen"
           ),
    array ("titel" => "1.200 euro kwijt en maar 39 euro als compensatie",
           "datum"=> "13/10/2016",
           "inhoud" => "Fietsenmaker Bruno Bertels en zijn echtgenote Ines Covemaecker uit Oostvleteren verstuurden een aangetekende postverzending met ecocheques uit hun bedrijf ter waarde van 1.200 euro. Maar die kwam nooit aan in Brussel. Onze compensatie van Bpost? 39 euro!, klinkt het vol ongeloof bij de ondernemers.",
           "afbeelding" => "img/fiets.jpeg",
           "afbeeldingBeschrijving" => "uitbater met winkel op de achtergrond"
           )
        );

    $individueelArtikel = false;
    
	if (isset( $_GET['id'])) { // uitvoeren als de get variabele ID geset is
		$settedID = $_GET['id']; // id is geset
        $individueelArtikel = true;
	}

    
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?php ($settedID == true ? echo Artikel $aArtikels[$settedID]["titel"] : echo Overzicht krant) ?>
        </title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <style>
            div {
                width: 300px;
                height: 450px;
                padding: 10px;
                border: 5px solid gray;
                margin: 0;
                float:left;
                background-color: darkgrey;
            }
            .artikel {
                text-align:center;
                width: 900px;
                height: 700px;
                padding: 10px;
                border: 5px solid gray;
                margin: 0;
                background-color: darkgrey;
            }
            .artikel img {
                width:600px;
                height:400px;
            }
            h2 {
                font-size: 1.3em;
                color:black;
                
            }
            a {
                float:left;
                margin-top:-20px;
                margin-left:200px;
            }
            img {
                width:300px;
                height:200px;
            }
            .goBack {
                float:right;
            }
        </style>
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            <h1>Opdracht get: deel 1</h1>
            <?php if ( !$individueelArtikel ):?>
                    <?php foreach ($aArtikels as $id => $artikel): ?>
                        <div>
                        <h2><?= $artikel["titel"] ?></h2>
                        <p><?= $artikel["datum"] ?></p>
                        <img src="<?= $artikel["afbeelding"] ?>" alt="<?= $artikel["afbeeldingBeschrijving"] ?>">
                        <p><?= substr( $artikel["inhoud"], 0, 50) ?> ...</p>
                        <a href="index.php?id=<?= $id ?>">Lees meer >></a>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
            
                        <div class="artikel">
                            <h2><?= $aArtikels[$settedID]["titel"] ?></h2>
                            <p><?= $aArtikels[$settedID]["datum"] ?></p>
                            <img src="<?= $aArtikels[$settedID]["afbeelding"] ?>" alt="<?= $aArtikels[$settedID]["afbeeldingBeschrijving"] ?>">
                            <p><?= $aArtikels[$settedID]["inhoud"] ?></p>
                            <a class="goBack" href="index.php?individueelArtikel=false">GO BACK</a>
                        </div>
                
            <?php endif ?>
            
       
           

        </section>

    </body>
</html>
