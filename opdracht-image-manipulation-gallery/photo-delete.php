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

        echo $THUMBThumbPicture;

        if (file_exists($IMGPicture)) {
            rename ($IMGPicture, $BINPicture);
        } else {
            echo "111111111111111111111111";
        }
        if (file_exists($THUMBThumbPicture)) {
            rename ($THUMBThumbPicture, $BINThumbPicture);
        } else {
            echo "!!!!!!!!!!!!!!!!!!!!!!!!!";
        }
    } 

    function getThumbnailPicture($picture) {
        $pieces = explode(".", $picture);
        return $pieces[0].'_thumbs.'.$pieces[1];
    }
	

?>