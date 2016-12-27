<?php
    session_start();
    if (isset($_POST['submit'])) {
            $picture = $_FILES['picture'];
            $pictureName = $picture['name'];
            $fileParts = pathinfo($pictureName);
            //$fileName = $fileParts['filename'];
            $ext = strtolower($fileParts['extension']);
            if ((($picture["type"] == "image/gif")
            || ($picture["type"] == "image/jpeg")
            || ($picture["type"] == "image/png"))
            && ($picture["size"] < 2000000)) {

                $fileName = generateUniqueName($pictureName);

                define('ROOT', dirname(__FILE__));
                $destination = ROOT . "/uploads/img/";
                while (file_exists($destination.$fileName)) { 
                     $fileName = generateUniqueName($pictureName);
                }
                $pictureFile = $destination.$fileName.'.'.$ext;
                move_uploaded_file($picture["tmp_name"], $pictureFile); 

                createThumb($pictureFile, $fileName, $ext);
                 $_SESSION['messages'] = "uploaden afbeelding en thumbmail is gelukt";
                
                


            } else {
                $_SESSION['messages'] = "bestand ongeldig!";
                header( 'location: photo-upload-form.php' );
            }
    } 
    function generateUniqueName ($pictureName) {
        return md5(time().$pictureName);
    }

    function createThumb ($picture, $fileName, $ext) {
        switch ($ext)
        {
            case ('jpg'):
            case ('jpeg'):
                $source = imagecreatefromjpeg($picture);
                break;
            case ('png'):
                $source = imagecreatefrompng($picture);
                break;
            case ('gif'):
                $source = imagecreatefromgif($picture);
                break;
        }

        $thumbnailW = 50;
        $thumbnailH = 50;
        $thumb = imagecreatetruecolor($thumbnailW, $thumbnailH);
        list($width, $height) = getimagesize($picture);
        // echo ' w '.$width; echo ' h '.$height;
        $squareLength = ($width<$height ? $width : $height);
        imagecopyresized($thumb, $source, 0,0,0,0, $thumbnailW, $thumbnailH, $squareLength, $squareLength);
        imagejpeg($thumb, ('uploads/img/thumbs/'.$fileName.'_thumbs.'.$ext), 100);
    }
	

?>