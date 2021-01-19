<?php

    header('Content-Type:text/html; charset=utf-8');

    //사용자가 File을 보내면 실제 파일데이터들을 임시저장소(tmp)에 임시로 저장되며
    //이 php문서에는 File 의 정보만 전달됨. 그 정보를 $_FILES[]라는 배열에 저장함
    $file= $_FILES['img'];

    //$file을 배열임. 즉 $file 배열변수안에 전송된 파일에 대한 여러정보가 있음
    $srcName= $file['name']; //원본파일명
    $size= $file['size'];    //파일사이즈
    $type= $file['type'];    //파일타입
    $error= $file['error'];  //에러정보
    $tmpName= $file['tmp_name']; //파일데이터가 저장된 임시저장소의 파일주소(위치) 

    //제대로 왔는지 확인하기 위해 정보들을 출력(응답)
    echo "$srcName <br>";
    echo "$size <br>";
    echo "$type <br>";
    echo "$error <br>";
    echo "$tmpName <br>";

    //정보가 잘 확인되었다면 분명 이 서버에 이미지파일이 전송되어 온 것임.
    //하지만 이 파일데이터는 임시저장소에 저장되어 있어서 이 프로그램이 종료되면 삭제됨
    //온전히 업로드 되도록 하려면 임시저장소에 있는 파일[$tmpName]을
    //영구히 사라지지 않는 본인 폴더[서버에서 할당된 html폴더 안]쪽으로 이동해야 함.
    // 이 .php문서가 있는 곳에 uploads라는 폴더를 새로 만들어 놓고 그 안에 파일을 이동시키기
    $dstName= "./uploaded/" . date('Ymdhis') . $srcName; //date() : 현재시간을 문자열로 주는 함수 - Ymdhis //20210119133324
    echo "$dstName <br>";

    //임시저장소($tmpName)에 있는 파일을 원하는 위치($dstName)로 이동
    $result= move_uploaded_file($tmpName, $dstName); //이동 성공여부(true/false)를 리턴해줌
    if($result){
        echo "success upload";
    }else{
        echo "fail upload";
    }




?>