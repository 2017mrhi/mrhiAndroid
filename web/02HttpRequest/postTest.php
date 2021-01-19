<?php

    header('Content-Type:text/html; charset=utf-8');//한글 깨짐 방지

    //사용자가 POST방법으로 보낸 데이터들은 $_POST[]이라는 배열에 저장되어 있음.
    $title= $_POST['title'];
    $message= $_POST['msg'];

    //사용자[web brower]에게 출력(응답:Response)
    echo "제목 : $title <br>";
    echo "메세지 : " . $message;   // php에서는 . 이 문자열 결합연산자

?>