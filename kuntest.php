<?php

include('condb.php');
$projact_invoice = $_GET["projact_invoice"];
                   $query1 = "SELECT * FROM `add1` WHERE projact_invoice = '$projact_invoice' ";
                   $qresult1 = mysqli_query($con, $query1);
                   while ($showmember1 = mysqli_fetch_assoc($qresult1)) {
                    $amount_invoice1 = ($showmember1['amount_invoice']);
                    $amount_invoice = $showmember1['quantity_invoice']*$showmember1['price_invoice'];
                   
                    echo" 
                    <tr id='row'>
                    <td class='col-md-2'>$showmember1[id]</td> 
                    <td class='col-md-2'>$showmember1[item_invoice]</td> 
                    <td class='col-md-2'>$showmember1[desciption_invoice]</td> 
                    <td class='col-md-2'>$showmember1[quantity_invoice]</td> 
                    <td class='col-md-2'>$showmember1[price_invoice]</td> 
                    <td class='col-md-2'><input class='form-control' name='amount_invoice[$showmember1[id]]' value='$amount_invoice' ></td>    
                    </tr>
                    <br/>";
                        $sql = "UPDATE add1 SET `amount_invoice`='$amount_invoice' WHERE id=$showmember1[id]";
                        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
                        }
                        if ($result){
                            echo "<script type='text/javascript'>";
                                echo "window.location='testsum.php?projact_invoice=$projact_invoice'";
                            echo "</script>";
                            }else{
                                echo "<script type='text/javascript'>";
                                    echo "alert('Error');";
                                echo "</script>";
                                }

                    ?>

