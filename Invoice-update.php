<?php
include('condb.php');
$id = $_GET[ 'id' ];
$projact_invoice22 = $_GET[ 'projact_invoice' ];

$projact_invoice=$_POST["projact_invoice"];
$no_invoice=$_POST["no_invoice"];
$date_invoice=$_POST["date_invoice"];
$namecus_invoice=$_POST["namecus_invoice"];
$address_invoice=$_POST["address_invoice"];
$idtax_invoice=$_POST["idtax_invoice"];

$sql = "UPDATE  invoice SET 
        projact_invoice='$projact_invoice',
        no_invoice='$no_invoice',
        date_invoice='$date_invoice',
        namecus_invoice='$namecus_invoice',
        address_invoice='$address_invoice',
        idtax_invoice='$idtax_invoice'
        WHERE id=$id";
$result = mysqli_query($con,$sql) or die("Error in sql : $sql". mysqli_error($con));

$sql1 = "UPDATE  add1 SET 
projact_invoice='$projact_invoice'
WHERE projact_invoice='$projact_invoice22'";

$result1 = mysqli_query($con,$sql1) or die("Error in sql : $sql1". mysqli_error($con));

$sql2 = "UPDATE  invoice_total SET 
projact_invoice='$projact_invoice'
WHERE projact_invoice='$projact_invoice22'";

$result1 = mysqli_query($con,$sql2) or die("Error in sql : $sql2". mysqli_error($con));

if ( $result1){
    echo "<script type='text/javascript'>";
        echo "window.location='Invoice-editnemu.php?projact_invoice=$projact_invoice'";
    echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
            echo "alert('Error');";
        echo "</script>";
        }


?>