<?php
    header('Content-Type:application/json; charset=utf-8');

    // HTTP METHOD : GET, POST, PUT, DELETE
    // 이 중에 GET, POST 는 $_GET, $_POST라는 슈퍼전역변수가 값을 받음
    // 하지만 PUT, DELETE는 'php://input'이라는 파일에 잠시 보관됨
    // 이값을 읽어서 코딩해야 함.

    // 그리고 @Body로 보낸 MarketItem item객체도 역시 json문자열로 변환되어
    // 이 서버로 전송되어 왔기에 이를 해독(decode)해야 함.
    $data= file_get_contents('php://input');
    $put= json_decode($data, true);//json -> 연관배열

    // //DB의 저장된 레코드(row) 중 하나를 선택하여 업데이트 하기 위해
    $no= $put['no'];       //변경할 대상의 번호 
    $favor= $put['favor']; //변경할 값

    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021");
    mysqli_query($conn, "set names utf8");

    if($favor) $sql="UPDATE market SET favor=1 WHERE no=$no";
    else $sql="UPDATE market SET favor=0 WHERE no=$no";

    $result= mysqli_query($conn, $sql);        
    echo $data;

    mysqli_close($conn);
?>