<?php

    header('Content-Type:application/json; charset=utf-8');

    $name= $_GET['name'];
    $message= $_GET['msg'];

    //받은 데이터를 확인해주기 위해 echo하고자 함.
    // 단, Retrofit이 결과를 json문자열로 달라고 하므로.....
    //$name, $message변수의 값을 json문자열로 변경하기 위해..
    //연관배열로
    $arr= array(); //빈 배열
    $arr['name']= $name;  //배열의 'name'칸에 $name변수의 값 저장
    $arr['msg']= $message;//배열의 'msg'칸에 $message변수의 값 저장

    //연관배열 --> json문자열  변환
    echo json_encode($arr); //  "{'name':'홍길동', 'msg':'안녕하세요'}"
?>