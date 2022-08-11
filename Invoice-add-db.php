<?php
include('condb.php');

$projact_invoice=$_POST["projact_invoice"];
$no_invoice=$_POST["no_invoice"];
$date_invoice=$_POST["date_invoice"];
$namecus_invoice=$_POST["namecus_invoice"];
$address_invoice=$_POST["address_invoice"];
$idtax_invoice=$_POST["idtax_invoice"];

$sql = " INSERT INTO invoice (projact_invoice,no_invoice,date_invoice,namecus_invoice,address_invoice,
    idtax_invoice) 
    VALUES('$projact_invoice','$no_invoice','$date_invoice','$namecus_invoice','$address_invoice',
    '$idtax_invoice')";

$result = mysqli_query($con,$sql) or die("Error in sql : $sql". mysqli_error($con));

if ( $result){
    echo "<script type='text/javascript'>";
        echo "window.location='Invoice-addnemu.php?projact_invoice=$projact_invoice'";
    echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
            echo "alert('Error');";
        echo "</script>";
        }


?>