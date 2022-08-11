<?php
 include('condb.php');
 include('tes.php');
 $id = $_GET["id"];
?>
<?php

require_once __DIR__ . '/vendor/autoload.php';

//custom font
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew Italic.ttf',
                'B' =>  'THSarabunNew Bold.ttf',
            ]
        ],
        'default_font' => 'sarabun'
]);
$id = $_GET["id"];
$query = "SELECT * FROM invoice WHERE `projact_invoice`='$id' ORDER BY id asc  " or die("Error:" . mysqli_error($query)); 
$result = mysqli_query($con, $query); 
while($showmember = mysqli_fetch_array($result)) { 
$head = '
<DD><img src="Logo/Logoaddpay.png" alt="Flowers in Chania" width="100" height="50" align="Left"></DD>
<b>บริษัท แอดเพย์ เซอร์วิสพอยท์ จำกัด (สำนักงานใหญ่)</b><br>
<b> หมู่ 18 ตำบลขามใหญ่ อำเภอเมือง จังหวัดอุบลราชธานี</b><br>
<b> โทร 045-317123 Fax. 045-317678</b><br>
<table align = "right" style="width: 35%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
    <tr style="border-bottom: 1px solid;">
        <th style="border-left: 1px solid; width: 35%; height: 50px;">ใบเสร็จรับเงิน/ใบกำกับภาษี</th>
    </tr>
    
    
</table>
<br>
<table style="width: 100%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
    <tr style="border-bottom: 1px solid;">
        <th align = "left"  style="border-left: 1px solid; width: 65%;">
            <label>ชื่อลูกค้า / Customers :</label> &nbsp;&nbsp;'.$showmember['namecus_invoice'].'<br>
            <label>ที่อยู่ / Address :</label> &nbsp;&nbsp;'.$showmember['address_invoice'].'<br><br>
            <label>เลขประจำตัวผู้เสียภาษี :</label> &nbsp;&nbsp;'.$showmember['idtax_invoice'].'
        <th VALIGN = "TOP" align = "left" style="border-left: 1px solid; width: 35%;">
            <label>เลขที่ / No.</label> &nbsp;&nbsp;'.$showmember['no_invoice'].'<br>
            <label>วันที่ / Date.</label> &nbsp;&nbsp;'.$showmember['date_invoice'].'</th>
    </tr>
    
    
</table>


<br>
<table style="width: 100%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
    <tr style="border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
        <th style="border-left: 1px solid; width: 10%;">ลำดับที่<br>Item</th>
        <th style="border-left: 1px solid; width: 40%;">รายการ<br>Description</th>
        <th style="border-left: 1px solid; width: 15%;">จำนวน<br>Quantit Price</th>
        <th style="border-left: 1px solid; width: 15%;">ราคา/หน่วย<br>Unit Price</th>
        <th style="border-left: 1px solid; width: 20%;">จำนวนเงิน<br>Amount</th>
    </tr>   
    ';
}

$sql = "SELECT * FROM `add1` WHERE `projact_invoice`='$id'";
$result = mysqli_query($con, $sql);
$content = "";
if (mysqli_num_rows($result) > 0) {
    
    while($showmember1 = mysqli_fetch_assoc($result)) {
        $content .= ' <tr>
        <td VALIGN = "TOP" style="border-left: 1px solid;" align = "center">'.$showmember1['item_invoice'].'</td>
        <td VALIGN = "TOP" style="border-left: 1px solid;">&nbsp;&nbsp;'.$showmember1['desciption_invoice'].'</td>
        <td VALIGN = "TOP" style="border-left: 1px solid;" align = "center">'.$showmember1['quantity_invoice'].'</td>
        <td VALIGN = "TOP" style="border-left: 1px solid;" align = "center">'.$showmember1['price_invoice'].'</td>
        <td VALIGN = "TOP" style="border-left: 1px solid;" align = "center">'.$showmember1['amount_invoice'].'</td>
        
  </tr>';
      
    }
}

$head1 = ' ';
$sql = "SELECT * FROM `invoice_total` WHERE `projact_invoice`='$id'";
$result = mysqli_query($con, $sql);
$content1 = "";
if (mysqli_num_rows($result) > 0) {
    
    while($showmember2 = mysqli_fetch_assoc($result)) {
        $content1 .= ' 
        <tr>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td> 
        </tr>
        <tr>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        <td VALIGN = "TOP" style="border-left: 1px solid; height: 50px;" align = "center"></td>
        </tr>
        <tr style="border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
        <td style="width: 100%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;" VALIGN = "TOP" ROWSPAN = "3" colspan = "2"><label>รายการรับชำระเงิน</label> &nbsp;&nbsp;
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
        <label class="form-check-label" for="inlineCheckbox1">เงินสด</label>
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
        <label class="form-check-label" for="inlineCheckbox1">เงินโอน</label>
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
        <label class="form-check-label" for="inlineCheckbox1">เช็ค</label>
        <br>
        <label>ธนาคาร/Bank</label>&nbsp;&nbsp;................&nbsp;<label>เลขที่/Chq</label>&nbsp;&nbsp;.................&nbsp;<br><br><br>
        <label>สาขา/Branch</label>&nbsp;&nbsp;................&nbsp;<label>ลว./date</label>&nbsp;&nbsp;....................&nbsp;<br><br>
        <label>จำนวนเงิน/Amount</label>&nbsp;&nbsp;('. Convert($showmember2['net_invoice']).' )&nbsp;</td> 
        <td style="border-left: 0px solid;" align = "center" colspan = "2">รวมเงิน<br>TOTAL</td>
        <td style="border-left: 1px solid;" align = "center">'.$showmember2['total_invoice'].'</td>

    </tr>
    <tr style="width: 100%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
        <td style="border-left: 0px solid;" align = "center" colspan = "2">ภาษีมูลค่าเพิ่ม<br>( VAT 7% )</td>
        <td style="border-left: 1px solid;" align = "center">'.$showmember2['vat_invoice'].'</td>
    </tr>
    <tr style="width: 100%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
        <td style="border-left: px solid;" align = "center" colspan = "2">ยอดเงินสุทธิ์<br>NET AMOUNT</td>
        <td style="border-left: 1px solid;" align = "center">'.$showmember2['net_invoice'].'</td>
    </tr>

    </table><br>  
    
';
      
    }
}





$head2 = ' ';
$sql = "SELECT * FROM `invoice_total` WHERE `projact_invoice`='$id'";
$result = mysqli_query($con, $sql);
$content2 = "";
if (mysqli_num_rows($result) > 0) {
    
    while($showmember2 = mysqli_fetch_assoc($result)) {
        $content2 .= '
        <table align = "center" style="width: 50%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">
    <tr style="border-bottom: 1px solid;">
        <th style="border-left: 1px solid; width: 50%; height: 30px;">('. Convert($showmember2['net_invoice']).' )</th>
    </tr>
</table><br>
<table style="width: 100%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0; ">
  <tr>
    <th style=" width: 35%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">Firstname</th>
    <th style=" width: 30%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">Lastname</th>
    <th style=" width: 45%; border:1px solid; border-collapse: collapse; padding: 0; margin: 0;">Firstname</th>
  </tr>
  <tr>
    <td style="border-left: 1px solid;">Peter</td>
    <td style="border-left: 1px solid;">Griffin</td>
    <td style="border-left: 1px solid;">Peter</td>
  </tr>
  <tr>
    <td style="border-left: 1px solid;">Lois</td>
    <td style="border-left: 1px solid;">Griffin</td>
    <td style="border-left: 1px solid;">Peter</td>
  </tr>
  
</table>

        ';
    }
}
$mpdf->WriteHTML($head);
$mpdf->WriteHTML($content);
$mpdf->WriteHTML($content1);
$mpdf->WriteHTML($content2);
$mpdf->WriteHTML($head1);
$mpdf->WriteHTML($head2);

mysqli_close($con);
$mpdf->Output();
?>