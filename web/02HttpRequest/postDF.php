<?php

    header('Content-Type:text/html; charset=utf-8');

    //사용자로 부터 전달된 데이터와 파일정보 받기
    $title= $_POST['title'];
    $message= $_POST['msg'];
    
    $file= $_FILES['img'];
    //파일의 세부정보 중 사용할 것들
    $srcName= $file['name'];         //원본파일명
    $tmpName= $file['tmp_name'];     //임시저장된 파일명

    //영구히 저장될 파일의 위치와 파일명[중복된 값이 없도록 date()함수 이용]
    $dstName= "./uploaded/" . date('YmdHis') . $srcName;

    //임시저장소 파일($tmpName)을 원하는 위치($dstName)로 이동
    $moveResult= move_uploaded_file($tmpName, $dstName);
    if($moveResult) echo "upload success";
    else echo "uplad fail";

    echo "<br>";

    //저장되는 날짜
    $now= date("Y-m-d H:i:s");

    //전송된 데이터들($title, $message, $dstName)을 Database에 저장
    //dothome서버에는 이미 APM이 모두 설치된 상태

    //MySQL이라는 DBMS를 이용하여 데이터들 저장하기
    //MySQL DB에 접속하기...
    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021"); //DB서버주소, DB접속아이디, DB접속비번, DB명
    //$conn : 연결된 DB을 제어하는 객체

    //DB안에 한글데이터 깨지지 않도록
    mysqli_query($conn, "set names utf8");

    //전송된 데이터들($title, $message, $dstName)을 'board'라는 테이블(표)에 삽입(insert)하는 명령어[SQL]
    $sql= "INSERT INTO board(title, msg, file, date) VALUES('$title','$message','$dstName','$now')";
    $result= mysqli_query($conn, $sql); //요청 결과를 리턴해줌
    if($result){
        echo "insert success";
    }else{
        echo "insert fail";
    }

    //DB와의 연결 종료
    mysqli_close($conn);

?>