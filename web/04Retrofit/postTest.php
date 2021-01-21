<?php

    header('Content-Type:application/json; charset=utf-8');

    //@Body로 보낸 json문자열은 $_POST라는 배열에 자동 저장되지 않음.
    // $name= $_POST['name'];

    //json으로 넘어온 데이터는 별도의 임시공간[php://input]에 파일로 보관되어 있음. 그 파일을 읽어서
    //$_POST라는 배열변수에 대입하기
    $data= file_get_contents('php://input');
    $_POST= json_decode($data, true); //$data라는 json문자열 -->> 연관배열로 변환 [두번째 파라미터 true : 연관배열로 할지 여부]

    $name= $_POST['name'];
    $message= $_POST['msg'];

    //데이터들이 올바로 왔는지 확인시키기 위해 echo 
    //단, json문자열로 
    $arr= array();
    $arr['name']= $name;
    $arr['msg']= $message;

    echo json_encode($arr); //연관배열 -->> json문자열

?>