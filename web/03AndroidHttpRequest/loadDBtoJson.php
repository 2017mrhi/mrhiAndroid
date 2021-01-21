<?php

    header('Content-Type:text/plain; charset=utf-8');

    //DB 읽어오기
    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021");
    mysqli_query($conn, "set names utf8");

    $sql="SELECT * FROM board2";
    $result= mysqli_query($conn, $sql);

    //총 레코드(row) 수
    $row_num= mysqli_num_rows($result);    

    $rows= array(); //빈 배열만들기
    for($i=0; $i<$row_num; $i++){
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);//연관배열로 한줄 읽어오기
        //$row배열을 $rows배열에 추가하기
        $rows[$i]= $row;
    }

    //$rows배열을 json문자열로 변환하여 echo
    echo json_encode($rows);


    mysqli_close($conn);

?>