<?php

    $file= $_FILES['img'];

    $name= $file['name'];
    $size= $file['size'];
    $tmp= $file['tmp_name'];

    echo "$name \n";
    echo "$size \n";
    echo "$tmp \n";

?>