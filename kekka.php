<?php
$field1=$_POST['field1'];
$field2 = $_POST['field2'];
$field3 = $_POST['field3'];
$field4 = $_POST['field4'];
$quiz1 = $_POST['quiz1'];
$quiz2 = $_POST['quiz2'];
$quiz3 = $_POST['quiz3'];

$quizresult=$quiz1+$quiz2+$quiz3;

if($quizresult<4){
    $id="積極型";
}
else{
    $id="保守型";
}
if (file_exists('date/login.csv')) {

// ファイルを開く（読み取り専用）
$file = fopen('date/login.csv', 'r');
// ファイルをロック
flock($file, LOCK_EX);

if ($file) {
    $idarray=[];
    while ($kekka = fgets($file)) {
        $suti = explode(":", "$kekka");
        
        array_push($idarray, $field2);
        if ($suti[1]==$idarray[0]) {
            $serachid=1;
        } else {
              
        }
      
    }
    if($serachid==1){
        print("すでに登録されたメールアドレスです。");
            // ロックを解除する
            flock($file, LOCK_UN);
            // ファイルを閉じる
            fclose($file);
    }
    else{
           print("ユーザー登録完了");
            $write_data = " {$field1}:{$field2}:{$field3}:{$field4}:{$id}\n";

            $file = fopen('date/login.csv', 'a');
            flock($file, LOCK_EX);
            fwrite($file, $write_data);
            flock($file, LOCK_UN);
            fclose($file);
    }

        
    
}



}
else{
    $write_data = " {$field1}:{$field2}:{$field3}:{$field4}:{$id}\n";

    $file = fopen('date/login.csv', 'a');
    flock($file, LOCK_EX);
    fwrite($file, $write_data);
    flock($file, LOCK_UN);
    fclose($file);
    print("ユーザー登録完了");
}



?>