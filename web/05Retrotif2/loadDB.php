<?php

    header('Content-Type:application/json; charset=utf-8');

    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021");
    mysqli_query($conn, "set names utf8");

    $sql="SELECT * FROM market";
    $result= mysqli_query($conn, $sql);

    //결과표로 부터 총 레코드(row) 수
    $row_num= mysqli_num_rows($result);

    //여러줄을 읽어야 하므로 각 줄($row 배열)을 요소로 가질 빈 인덱스 배열 준비
    $rows= array();
    for($i=0; $i<$row_num; $i++){
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);//한줄을 연관배열로
        $rows[$i]= $row;
    }

    //2차원 배열 --> json array 문자열로 변환
    echo json_encode($rows);

    mysqli_close($conn);
?>