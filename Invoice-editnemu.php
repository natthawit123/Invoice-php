<?php
include('condb.php');
$projact_invoice = $_GET["projact_invoice"];



// $result = mysqli_query($con,$sql) or die("Error in sql : $sql". mysqli_error($con));
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header"></header>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Document</h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-11">
            <!-- general form elements -->
            <div class="box box-primary collapse1" id="show_addmember">
              <div class="box-header with-border">
                <h3 class="box-title"><b>รายการ</b> </h3>
                <a href="Invoice-list.php" type="submit" class="btn pull-right btn-show"><i class="ion ion-clipboard"></i>&nbsp;&nbsp;กลับไปหน้ารายการ</a>
              </div>
              <form action="Invoice-updatenemu.php?projact_invoice=<?php echo $projact_invoice ?>" method="post">
            <!-- general form elements -->
                  <div class="box-body">
                <table class="table no-bordered">
                  <tbody>
                    <tr class="bg-gray">
                      <td class="col-md-1">ลำดับ</td>
                      <td class="col-md-4">รายการ</td>
                      <td class="col-md-2">จำนวน</td>
                      <td class="col-md-2">ราคา/หน่วย</td>
                      <td class="col-md-2">จำนวนเงิน(บาท)</td>
                      <td class="col-md-2"> <a href="Invoice-editaddnemu.php?projact_invoice=<?php echo $projact_invoice ?>" type="button" name="add"  class="btn pull-right btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;เพิ่มรายการหลัก</a></td>
                    </tr>
                   <?php

                    $query = "SELECT * FROM `add1` WHERE `projact_invoice`= '$projact_invoice' ";
                    $result = mysqli_query($con, $query)  or die("Error:" . mysqli_error($query)); 
                    foreach($result as $row){


            
                    echo"
                    <tr id='row'>
                    <td class='col-md-1'><input class='form-control'  name='item_invoice[$row[id]]' value='$row[item_invoice]' ></td> 
                    <td class='col-md-4'><input class='form-control'  name='desciption_invoice[$row[id]]' value='$row[desciption_invoice]' ></td> 
                    <td class='col-md-2'><input class='form-control'  name='quantity_invoice[$row[id]]' value='$row[quantity_invoice]' ></td> 
                    <td class='col-md-2'><input class='form-control'  name='price_invoice[$row[id]]' value='$row[price_invoice]' ></td> 
                    <td class='col-md-2'><input class='form-control'  name='amount_invoice[$row[id]]' value='$row[amount_invoice]' ></td> 
                    <td class='col-md-3'><a class='btn btn-danger pull-right btn-remove' href='delete_nemu.php?id=$row[id]&projact_invoice=$projact_invoice'  type='button' ><i class='fa fa-close'></i>&nbsp;&nbsp;ลบ</a></td>
                   
                    </tr>";
                 
                    }
                    ?>
                  </tbody>
                </table>


                
                <table class="table table-bordered" id="tb">
                  <tbody>
                    <tr></tr>
                  </tbody>
                  <div class="box-body">
                <table class="table no-bordered">
                  <tbody>
                    <tr class="bg-primary">
                   </table><br>
                  
              </div>
              <!-- end เพิ่มรายการ -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary margin pull-right">บันทึกรายการ</button>
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <font color="#777777">
  <footer class="main-footer">
    <div class="pull-right hidden-xs"> <b>Version</b> 2.4.18 </div>
    <strong>Copyright © 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights reserved. </footer>
  <div class="control-sidebar-bg"></div>
  </font> </div>
<script src="bower_components/jquery/dist/jquery.min.js" style=""></script> 
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js" style=""></script> 
<script src="bower_components/fastclick/lib/fastclick.js"></script> 
<script src="dist/js/adminlte.min.js"></script> 
<script src="dist/js/demo.js" style=""></script> 
<script style="">
    $(document).ready(function() {
      let i = 0;
      $('#btn-add').click(function() {
        i++;
        $('#tb').append('<tr id="row' + i + '"><td class="col-md-1"><input class="form-control"  value="'+i+'" name="item_invoice[]"></td><td class="col-md-3"><input class="form-control" value="" name="desciption_invoice[]"></td><td class="col-md-2"><input class="form-control" value="" name="quantity_invoice[]"></td><td class="col-md-2"><input class="form-control" value="" name="price_invoice[]"></td><td class="col-md-2"><input class="form-control" value="" name="amount_invoice[]"></td><td class="col-md-3"><button class="btn btn-danger pull-right btn-remove" name="remove" id="' + i + '" type="button"><i class="fa fa-close"></i>&nbsp;&nbsp;ลบ</button></td></tr>')
      })
      $(document).on('click', '.btn-remove', function() {
		  i--;
        let button_id = $(this).attr('id');
        $('#row' + button_id + '').remove();
      })
    })
  </script>

                
  <font color="#777777"><b><b>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="bower_components/jquery/dist/jquery.min.js" style=""></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
      </b></b> </font>
  
</body>

</html>