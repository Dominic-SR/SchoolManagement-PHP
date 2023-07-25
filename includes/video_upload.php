<?php
include("db_con.php");

$target="../assets/documents/";
$video=$_FILES["video"]["name"];
$lcoation=$target.$video;

move_uploaded_file($_FILES['video']['tmp_name'],$lcoation);
$sql = "insert into question_document (document) values ('$video')";

if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    header('Location: ../index.php?video_id='.$last_id.'');
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    exit();
  }

?>

<script>window.location.href="../index.php";</script>