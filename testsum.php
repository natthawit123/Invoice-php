<?php
include('condb.php');

$projact_invoice1 = $_GET["projact_invoice"];
$query1 = "SELECT * FROM `add1` WHERE `projact_invoice`='$projact_invoice1'";
$qresult1 = mysqli_query($con, $query1);
while ($showmember1 = mysqli_fetch_assoc($qresult1)){
   
    $total += (int)$showmember1['amount_invoice'];
}

echo $total;
$van=($total*7)/100;
echo'</br>';
echo $van;
$sum=($total+$van);
echo'</br>';
echo $sum;



$sql = " INSERT INTO invoice_total (projact_invoice,total_invoice,vat_invoice,net_invoice) VALUES('$projact_invoice1','$total','$van','$sum')";

$result = mysqli_query($con,$sql) or die("Error in sql : $sql". mysqli_error($con));

if ( $result){
    echo "<script type='text/javascript'>";
        echo "window.location='Invoice-list.php?'";
    echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
            echo "alert('Error');";
        echo "</script>";
        }



?>