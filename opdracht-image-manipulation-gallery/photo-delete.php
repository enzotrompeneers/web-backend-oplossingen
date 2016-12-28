<?php
    session_start();
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $file_name = $_POST['file_name'];

        define("IMGFOLDER", "uploads/img/");
        define("THUMBFOLDER", "uploads/img/thumbs/");
        define("BINFOLDER", "uploads/bin/");

        $IMGPicture = IMGFOLDER.$file_name;
        $BINPicture = BINFOLDER.$file_name;

        $THUMBThumbPicture = THUMBFOLDER.getThumbnailPicture($file_name);
        $BINThumbPicture = BINFOLDER.getThumbnailPicture($file_name);

        if (file_exists($IMGPicture)) {
            //rename ($IMGPicture, $BINPicture);
        } else {
            $_SESSION['messages'] = "image in img folder niet gevonden";
            header("Location: gallery.php");
        }
        if (file_exists($THUMBThumbPicture)) {
            //rename ($THUMBThumbPicture, $BINThumbPicture);
        } else {
            $_SESSION['messages'] = "image in thumb folder niet gevonden";
            header("Location: gallery.php");
        }


        try {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "opdracht-gallery";
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            echo $id;

            $updateQry = 'UPDATE gallery 
                          SET is_archived = "0"
                        WHERE id = :id ';
            $statement = $db->prepare($updateQry);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $_SESSION['notification']['message'] = "Succesvol naar de bin map";
            header("Location: gallery.php");
           
        } catch (PDOException $e) {
            echo "Foutboodschap: " . $e->getMessage();
            echo "error1";
            //header("Location: gallery.php");
        }


    } 

    function getThumbnailPicture($picture) {
        $pieces = explode(".", $picture);
        return $pieces[0].'_thumbs.'.$pieces[1];
    }
	

?>