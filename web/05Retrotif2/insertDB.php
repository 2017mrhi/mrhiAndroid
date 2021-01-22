<?php

    header('Content-Type:text/plain; charset=utf-8');

    //@PartMap으로 전달된 POST방식의 데이터들
    $name= $_POST['name'];
    $title= $_POST['title'];
    $msg=$_POST['msg'];
    $price= $_POST['price'];

    //@Part로 전달된 이미지파일
    $file= $_FILES['img'];
    $srcName= $file['name'];
    $tmpName= $file['tmp_name'];
    $size= $file['size'];

    // echo "$name \n";
    // echo "$title \n";
    // echo "$msg \n";
    // echo "$price \n";
    // echo "$srcName \n";
    // echo "$tmpName \n";
    // echo "$size \n";

    //이미지파일을 영구적으로 저장하기 위해 임시저장소에서 이동
    $dstName= "./uploads/IMG_" . date('YmdHis') . $srcName;
    move_uploaded_file($tmpName, $dstName);

    //메세지중에 특수문자 사용가능성 있음. 특수문자는 잘못 동작될 수있기에
    //앞에 슬래시를 추가해줌
    $msg= addslashes($msg);
    $title= addslashes($title);

    //데이터가 저장되는 시간
    $now= date('Y-m-d H:i:s');

    //MySQL DB에 데이터 저장 [테이블명 : market]
    $conn= mysqli_connect("localhost","mrhi2021","a1s2d3f4!","mrhi2021");
    mysqli_query($conn, "set names utf8");//한글깨짐 방지
       

    //데이터들($name, $title, $msg, $price, $dstName, favor값, $now)
    $sql= "INSERT INTO market(name, title, msg, price, file, favor, date) VALUES('$name','$title','$msg','$price','$dstName',0,'$now')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "게시글이 업로드 되었습니다.";
    else echo "게시글 업로드에 실패했습니다. 다시 시도해 주세요";

    mysqli_close($conn);

?>