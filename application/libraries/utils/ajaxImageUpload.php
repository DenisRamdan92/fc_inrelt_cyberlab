<?php
error_reporting(0);
define("MAX_SIZE", "8000");

function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

$valid_formats = array("jpg","jpeg","tif","gif","png","JPG","JPEG","TIF","GIF","PNG","pdf","zip","rar","doc","docx","mp3","MP3","xls","xlsx","3gp","3GP","mov","ppt","pptx","MP4","mp4");
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

    $uploaddir = "../downloads/"; //a directory inside
    foreach ($_FILES['photos']['name'] as $name => $value) {

        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size = filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if (in_array($ext, $valid_formats)) {
            if ($size < (MAX_SIZE * 1024)) {
                $image_name = time() . $filename;
                echo "<img hidden src='" . $uploaddir . $image_name . "' class='imgList'>";
                echo "<script>
                    no ++;
                    $('#preview').append(\"<span class='fa fa-upload'></span> <input  class ='cek' type='text' size= '30' style='border:none;' readonly id='lampiran\"+no+\"' name='lampiran[\"+no+\"]' value='".$image_name."'><span style='color: #14b4fc;' id='cek'>Berhasil dilampirkan</span><p>\");
                     </script>";
                $newname = $uploaddir . $image_name;
                if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) {
                    $time = time();
                } else {
                    echo '<span class="imgList">Ukuran file terlalu besar! file tidak bisa dilampirkan! </span>';
                }
            } else {
                echo '<span class="imgList">Periksa nama / ukuran dilarang mengandung simbol!</span>';
            }
        } else {
            echo '<span class="imgList">Jenis file tidak diketahui!</span>';
        }
    }
}
?>