<?php

$instrument_cat_id = $_POST['instrument_cat_id'];
$instrument_regno = $_POST['instrument_regno'];
$instrument_name = $_POST['instrument_name'];
$instrument_type = $_POST['instrument_type'];
$instrument_price = $_POST['instrument_price'];
$instrument_features = $_POST['instrument_features'];

//save car images
$exterior_img  = $_FILES["exterior_img"]["name"];
move_uploaded_file($_FILES["exterior_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["exterior_img"]["name"]);//move uploaded image

$interior_img  = $_FILES["interior_img"]["name"];
move_uploaded_file($_FILES["interior_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["interior_img"]["name"]);//move uploaded image

$front_img  = $_FILES["front_img"]["name"];
move_uploaded_file($_FILES["front_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["front_img"]["name"]);//move uploaded image

$rear_img=$_FILES["rear_img"]["name"];
move_uploaded_file($_FILES["rear_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["rear_img"]["name"]);

//sql to insert captured values
$query="INSERT INTO instruments (instrument_cat_id, instrument_regno, instrument_name, instrument_price, instrument_type, instrument_features, exterior_img, rear_img, interior_img, front_img) VALUES (?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssssssss', $instrument_cat_id, $instrument_regno, $instrument_name, $instrument_price, $instrument_type, $instrument_features, $exterior_img, $rear_img, $interior_img, $front_img);
$stmt->execute();

if($stmt)
{
$success = "instrument added";

//echo "<script>toastr.success('Have Fun')</script>";
}
else {
$err = "Please Try Again Or Try Later";
}

?>