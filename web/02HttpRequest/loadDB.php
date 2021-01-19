<?php

    header('Content-Type:text/html; charset=utf-8');

    //MySQL DB에 접속
    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021");

    //한글깨짐 방지
    mysqli_query($conn, "set names utf8");

    //board테이블의 데이터들을 읽어오기(SELECT 쿼리문)
    $sql= "SELECT * FROM board"; //모든 레코드(row:한줄) 가져오는 요청문
    $result= mysqli_query($conn, $sql); //검색된 결과표를 리턴해 줌/ 실패하면 false가 리턴됨
    //$result는 검색결과표를 가진 객체 or false;
    if($result){

        //총 레코드(한줄:row) 수
        $rowCnt= mysqli_num_rows($result);

        for($i=0; $i<$rowCnt; $i++){
            $row= mysqli_fetch_array($result, MYSQLI_ASSOC); //한줄을 배열로 내놔. 단, 연관배열[배열 방번호 대신에 칸 이름으로 된 배열]

            echo $row['no'] . "<br>";
            echo $row['title'] . "<br>";
            echo $row['msg'] . "<br>";

            $img= $row['file'];
            if($img!=null) echo "<img src='$img' width='50%'>"."<br>";

            echo $row['date'] . "<br>";    
            echo "==============================<br><br>";
        }

    }else{
        echo "검색 실패";
    }

    //DB연결 종료
    mysqli_close($conn);


?>