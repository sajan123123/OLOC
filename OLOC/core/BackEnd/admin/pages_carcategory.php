<?php
include('inc/pdoconfig.php');
if(!empty($_POST["instrument_type"]))
{	
    //get room type
    $id=$_POST['instrument_type'];
    $stmt = $DB_con->prepare("SELECT * FROM instrument_categories WHERE instrument_cat_name = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['instrument_cat_id']); ?>
<?php
}
}

?>


