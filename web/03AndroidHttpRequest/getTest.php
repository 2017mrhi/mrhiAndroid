<?php

    header('Content-Type:text/plain; charset=utf-8');

    //Android로 부터 GET방식을 보내 온 데이터 받기
    $title= $_GET['title'];
    $message= $_GET['msg'];

    //잘 받았는지 Android로 다시 echo해주기
    echo "title : $title \n";
    echo "message : $message";

?>