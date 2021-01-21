<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $message= $_POST['msg'];
    $now= date('Y-m-d H:i:s'); //"2021-01-20 11:15:23"

    //MySQL DB의 board2 테이블에 저장
    //1. DB서버에 접속
    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021");//DB서버주소, DB접속 아이디, DB접속 비번, DB명

    //2. 한글깨짐 방지
    mysqli_query($conn, "set names utf8");

    //3. 원하는 쿼리문 작성
    $query= "INSERT INTO board2(name, msg, date) VALUES('$name','$message','$now')";

    //4. 쿼리문 실행
    $result= mysqli_query($conn, $query);

    if($result) echo "insert success : $name";
    else echo "insert fail : $name";

    //5. DB연결 닫기
    mysqli_close($conn);


?>