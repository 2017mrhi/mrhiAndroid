<?php

    header('Content-Type:text/plain; charset=utf-8');

    //DB 읽어오기
    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021");
    mysqli_query($conn, "set names utf8");

    $sql="SELECT * FROM board2";
    $result= mysqli_query($conn, $sql);

    //총 레코드(row) 수
    $row_num= mysqli_num_rows($result);

    //그 row개수만큼 한줄씩 데이터를 배열로 읽어와서 echo
    for($i=0; $i<$row_num; $i++){
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);//연관배열로 한줄 읽어오기

        echo $row['no'] . "&" . $row['name'] . "&" . $row['msg'] . "&" . $row['date'] . "@";
    }

    mysqli_close($conn);

?>