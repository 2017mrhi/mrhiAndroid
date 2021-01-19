<?php

    //한글깨짐 방지
    header('Content-Type:text/html; charset=utf-8');


    //php에서는 $가 변수를 지칭하는 문자
    //사용자가 GET방식으로 보낸 값들을 $_GET[] 이라는 슈퍼전역변수에 저장됨.
    $name= $_GET['name'];
    $message= $_GET['msg'];

    //받은 결과를 출력(응답)
    echo "name : $name <br>";  //""안에서 $를 표기하면 변수명을 인식함
    echo "message : $message";


?>