<?php
include('condb.php');
$id = $_GET[ 'id' ];
$projact_invoice = $_GET[ 'projact_invoice' ];

foreach($_POST['item_invoice']  as $item=>$value){
    $sql = "UPDATE add1 SET `item_invoice`='$value' WHERE id=$item";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
    //แสดงผลลัพธ์การอัพเดท
    echo $sql;
    echo '<hr>';
    }
foreach($_POST['desciption_invoice']  as $item=>$value){
        $sql = "UPDATE add1 SET `desciption_invoice`='$value' WHERE id=$item";
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
        //แสดงผลลัพธ์การอัพเดท
        echo $sql;
        echo '<hr>';
        }
foreach($_POST['quantity_invoice']  as $item=>$value){
            $sql = "UPDATE add1 SET `quantity_invoice`='$value' WHERE id=$item";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
            //แสดงผลลัพธ์การอัพเดท
            echo $sql;
            echo '<hr>';
            }
foreach($_POST['price_invoice']  as $item=>$value){
                $sql = "UPDATE add1 SET `price_invoice`='$value' WHERE id=$item";
                $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
                //แสดงผลลัพธ์การอัพเดท
                echo $sql;
                echo '<hr>';
                }
foreach($_POST['amount_invoice']  as $item=>$value){
                    $sql = "UPDATE add1 SET `amount_invoice`='$value' WHERE id=$item";
                    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
                    //แสดงผลลัพธ์การอัพเดท
                    echo $sql;
                    echo '<hr>';
                    }
        
    

$result = mysqli_query($con,$sql) or die("Error in sql : $sql". mysqli_error($con));

if ( $result){
    echo "<script type='text/javascript'>";
        echo "window.location='updatekuntest.php?projact_invoice=$projact_invoice'";
    echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
            echo "alert('Error');";
        echo "</script>";
        }


?>