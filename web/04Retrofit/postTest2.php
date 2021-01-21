<?php

    header('Content-Type:application/json; charset=utf-8');

    //@Field로 보낸것을 $_POST로 받을 수 있음.
    $name= $_POST['name'];
    $message= $_POST['msg'];

    //데이터들이 올바로 왔는지 확인시키기 위해 echo 
    //단, json문자열로 
    $arr= array();
    $arr['name']= $name;
    $arr['msg']= $message;

    echo json_encode($arr); //연관배열 -->> json문자열

?>