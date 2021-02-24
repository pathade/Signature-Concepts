
<?php
    
    include('../../database/dbconnection.php');
	if(!$db)
	{
	?>
		<script language="javascript">
		alert("Error: Unable to Connect Database");
		</script>
	<?php 	
	}
?>
<?php
 //include('C:\xampp\htdocs\NKS\database\dbconnection.php');
 // include('../../database/dbconnection.php');
 $get_email = "SELECT account_mail_id FROM tbl_wholesale_customer wc,wholesale_work_order so,wholesale_delivery_challan dc WHERE dc.wd_ch_id_pk='".$_GET['id']."' AND wc.wc_id_pk=so.cust_id_fk";
 $res_email = mysqli_fetch_row(mysqli_query($db, $get_email));


 function sendEmail( $message, $email)
{
   $sub = "Delivery challan";
   
   $file = "invoice.pdf";
   $boundary = md5("softthenext");
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "From:signatureconcepts.pune@gmail.com\r\n";
   $headers .= "Reply-To:signatureconcepts.pune@gmail.com\r\n";
   $headers .= "Content-Type: multipart/mixed; boundary =". $boundary."\r\n";
   $content = file_get_contents($file);
   $content = chunk_split(base64_encode($content));


   $body = "--$boundary\r\n"; 
   $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n"; 
   $body .= "Content-Transfer-Encoding: base64\r\n\r\n";  
   $body .= chunk_split(base64_encode($message)); 
   $body .= "--$boundary\r\n"; 
   $body .="Content-Type: $type; name=".$file."\r\n"; 
   $body .="Content-Disposition: attachment; filename=invoice.pdf\r\n"; 
   $body .="Content-Transfer-Encoding: base64\r\n"; 
   $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";  
   $body .= $content;

   $sentMailResult = mail($email, $sub, $body, $headers,$file); 

}

  extract($_GET);

 
  require('../../fpdf182/fpdf.php');
    // include '../../partials/dbconnection.php';
    $ones = array(
 "",
 " One",
 " Two",
 " Three",
 " Four",
 " Five",
 " Six",
 " Seven",
 " Eight",
 " Nine",
 " Ten",
 " Eleven",
 " Twelve",
 " Thirteen",
 " Fourteen",
 " Fifteen",
 " Sixteen",
 " Seventeen",
 " Eighteen",
 " Nineteen"
);

$tens = array(
 "",
 "",
 " Twenty",
 " Thirty",
 " Forty",
 " Fifty",
 " Sixty",
 " Seventy",
 " Eighty",
 " Ninety"
);

$triplets = array(
 "",
 " Thousand",
 " Million",
 " Billion",
 " Trillion",
 " Quadrillion",
 " Quintillion",
 " Sextillion",
 " Septillion",
 " Octillion",
 " Nonillion"
);
function convertTri($num, $tri) 
{
        global $ones, $tens, $triplets;

// chunk the number, ...rxyy
$r = (int) ($num / 1000);
$x = ($num / 100) % 10;
$y = $num % 100;

// init the output string
$str = "";

// do hundreds
if ($x > 0)
$str = $ones[$x] . " hundred";

// do ones and tens
if ($y < 20)
$str .= $ones[$y];
else
$str .= $tens[(int) ($y / 10)] . $ones[$y % 10];

// add triplet modifier only if there
// is some output to be modified...
if ($str != "")
$str .= $triplets[$tri];

// continue recursing?
if ($r > 0)
return convertTri($r, $tri+1).$str;
else
return $str;
}


// returns the number as an anglicized string
function convertNum($num) {
$num = (int) $num;    // make sure it's an integer

if ($num < 0)
return "negative".convertTri(-$num, 0);

if ($num == 0)
return "zero";

return convertTri($num, 0);
}


// $id = $_GET['this_id'];
    //$i=$_GET['id'];

     $code="";
     class this extends FPDF
     {
 
     // Page header
     function RoundedRect($x, $y, $w, $h, $r, $style = '')
         {
             $k = $this->k;
             $hp = $this->h;
          
             if($style=='F')
                $op='f';
            elseif($style=='FD' || $style=='DF')
                $op='B';
           else
               $op='S';
 $MyArc = 4/3 * (sqrt(2) - 1);
 $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
 $xc = $x+$w-$r ;
 $yc = $y+$r;
 $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
 
 $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
 $xc = $x+$w-$r ;
 $yc = $y+$h-$r;
 $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
 $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
 $xc = $x+$r ;
 $yc = $y+$h-$r;
 $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
 $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
 $xc = $x+$r ;
 $yc = $y+$r;
 $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
 $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
 $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
  {
      $h = $this->h;
      $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
          $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
  }

  function Header()
 {

    $x = $this->GetX();
    $y = $this->GetY();
    $this->SetXY($x-5, $y+5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,30,'  ',1,1,'C',0,false);  // CELL 1
    $today = date("Y-m-d");

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y-29);
    $this->SetFont('Arial','B',12);
    $this->Cell(200,8,'DELIVERY CHALLAN',0,1,'C',0,false);
    $this->SetXY($x, $y+10);
    $this->Image('../../app-assets/images/pdf/signature_2.jpg',65,16,15);
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-20);
    $this->SetFont('Arial','',13);
    $this->Cell(200,-15,'  Signature Concepts LLP',0,1,'C',0,false);
    $this->Ln();
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y+20);
    $this->SetFont('Arial','',8);
    $this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y-15);
    $this->SetFont('Arial','',8);
    $this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+44, $y-9.5);
    $this->SetFont('Arial','',8);
    $this->Cell(40,7,'Phone No : 7757033204',0,1,'C',0,false);

 
    $this->SetXY($x+92, $y-9.5);
    $this->SetFont('Arial','',8);
    $this->Cell(40,7,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);

    include('../../database/dbconnection.php');
    $edit_id = $_GET['id'];    
    
    $sql_charges = "SELECT * ,td.site_address,wdc.net_amt
    FROM  tbl_wholesale_customer AS twc, wholesale_delivery_challan AS wdc, wholsale_delivery_challan_items AS wci, tbl_wholesale_customer_site_details AS td, mstr_transporter_vehicle AS mv
    WHERE wd_ch_id_pk AND dci_id_pk AND  wci.dci_id_pk = wci.cust_id_fk ='$edit_id'";  



$result_charges = mysqli_query($db, $sql_charges) or die (mysqli_error($db));
   $row=mysqli_fetch_array($result_charges);


{           
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-0.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,42,'  ',1,1,'C',0,false);   // CELL 2

    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(90,8,'     Customer  :',0,1,'L',0,false);
    $this->SetXY($x+19, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(45,8,$row['1'],0,1,'L',0,false);

    $this->SetXY($x+130, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(45,8,'SO NO.       :',0,1,'L',0,false);
    $this->SetXY($x+150, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(45,8,$row['0'],0,1,'L',0,false);

    $this->SetXY($x-5, $y+7);
    $this->SetFont('Arial','B',9);
    $this->Cell(90,8,'      Site :',0,1,'L',0,false);
    $this->SetXY($x+19, $y+7);
    $this->SetFont('Arial','',9);
    $this->Cell(45,8,$row['3'],0,1,'L',0,false);

    $this->SetXY($x+130, $y+7);
    $this->SetFont('Arial','B',9);
    $this->Cell(45,8,'DC NO.       :',0,1,'L',0,false);
    $this->SetXY($x+150, $y+7);
    $this->SetFont('Arial','',9);
    $this->Cell(45,8,$row['24'],0,1,'L',0,false);
      /// $this->Cell(45,8,$row['72'],0,1,'L',0,false);

    $this->SetXY($x-5, $y+13);
    $this->SetFont('Arial','B',9);
    $this->Cell(90,8,'      Site Add.  :',0,1,'L',0,false);
    $this->SetXY($x+19, $y+13);
    $this->SetFont('Arial','',9);
    $this->Cell(45,8,$row['77'],0,1,'L',0,false);   

    $this->SetXY($x+130, $y+13);
    $this->SetFont('Arial','B',9);
    $this->Cell(45,8,'DC Date     :',0,1,'L',0,false);
    $this->SetXY($x+150, $y+13);
    $this->SetFont('Arial','',9);
    $this->Cell(45,8,$row['16'],0,1,'L',0,false);

     $this->SetXY($x+18, $y+18);
     $this->SetFont('Arial','',8);
     $this->Cell(45,8,' Ph.No.',0,1,'L',0,false);
     $this->SetXY($x+29, $y+18);
     $this->SetFont('Arial','',8);
     $this->Cell(45,8,$row['4'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+30);
     $this->SetFont('Arial','B',9);
     $this->Cell(90,8,'      GST NO.   :',0,1,'L',0,false);   //   mstr_supplier
     $this->SetXY($x+19, $y+30);
     $this->SetFont('Arial','',9);
     $this->Cell(45,8,$row['15'],0,1,'L',0,false);

     $this->SetXY($x+130, $y+22);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,'PO No.       :',0,1,'L',0,false);
     $this->SetXY($x+150, $y+22);
     $this->SetFont('Arial','',9);
   //  $this->Cell(45,8,$row['30'],0,1,'L',0,false);

   $this->SetXY($x+130, $y+30);
   $this->SetFont('Arial','B',9);
   $this->Cell(45,8,'Vehical No.:',0,1,'L',0,false);
   $this->SetXY($x+150, $y+30);
   $this->SetFont('Arial','',9);
   $this->Cell(45,8,$row['72'],0,1,'L',0,false);

   $this->ln(-4);

 
$y = $this->GetY();
 $x = $this->GetX();

 $this->SetXY($x-5, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,10,'  ',1,1,'C',0,false); // CELL 5

     $this->SetXY($x-5, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,10,' No. ',0,1,'C',0,false); //Head

     $this->SetXY($x+5, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(65,10,'  ',1,1,'C',0,false); // CELL 6
 
      $this->SetXY($x+5, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(65,10,' Product Name ',0,1,'C',0,false); //Head

      
      $this->SetXY($x+70, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(30,10,'  ',1,1,'C',0,false); // CELL 7
 
      $this->SetXY($x+70, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(30,10,' Remark ',0,1,'C',0,false); //Head
 
      $this->SetXY($x+100, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(40,10,'  ',1,1,'C',0,false); // CELL 8
 
      $this->SetXY($x+100, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(40,10,' Size ',0,1,'C',0,false); // Head
 
           $this->SetXY($x+140, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(55,10,'  ',1,1,'C',0,false); // CELL 9
 
      $this->SetXY($x+140, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(55,10,' QTY ',0,1,'C',0,false); // Head

    
// $this->ln(10);
//     $y = $this->GetY();
//     $x = $this->GetX();

//     $this->SetXY($x-5, $y);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(10,18,'  ',1,1,'C',0,false); //Head

    // $this->SetXY($x+5, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(65,24,'  ',1,1,'C',0,false); //Head

    // $this->SetXY($x+70, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(30,24,'  ',1,1,'C',0,false); //Head

    // $this->SetXY($x+100, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(40,24,'  ',1,1,'C',0,false); // Head

    // $this->SetXY($x+140, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(55,24,' ',1,1,'C',0,false); // Head

    // $this->Ln(3);

     include('../../database/dbconnection.php');  
    $edit_id = $_GET['id'];

    $sql_charges2 = "SELECT *
    FROM wholsale_delivery_challan_items AS w, mstr_item AS m
    WHERE dc_id_fk='$edit_id' AND w.item_id_fk = m.item_id_pk ='$edit_id'";
    
    $result_charges2 = mysqli_query($db, $sql_charges2) or die (mysqli_error($db));
    while($row1=mysqli_fetch_row($result_charges2))
   {
       
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(10,10,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(65,10,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+70, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+100, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(40,10,'  ',1,1,'C',0,false); // Head

    $this->SetXY($x+140, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(55,10,' ',1,1,'C',0,false); // Head

   //  -------------------------------------
    
     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(10,10,$row1['2'],0,1,'C',0,false);

     $this->SetXY($x+5, $y);
      $this->SetFont('Arial','',9);
      $this->Cell(65,10,$row1['21']. '-'.$row1['22'],0,1,'L',0,false);   

    $this->SetXY($x+70, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(30,10,$row1['10'],0,1,'C',0,false);

     $this->SetXY($x+100, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(40,10,$row1['24'],0,1,'C',0,false);

         $this->SetXY($x+140, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(55,10,$row1['4'],0,1,'C',0,false);

          $this->SetXY($x+145, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(40,10,$row1['26'],0,1,'R',0,false);

    }
    
    $this->Ln(-15.5);
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y+15.5);
    $this->SetFont('Arial','',15);
    $this->Cell(200,25,'  ',1,1,'C',0,false);  // CELL 3

    $this->SetXY($x, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(21,5,' GST No.  : ',0,1,'L',0,false);
    $this->SetXY($x+18, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(32,5,$row['15'],0,1,'L',0,false);   //$row['15']

    $this->SetXY($x+59, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(18,5,' PAN No. : ',0,1,'L',0,false);
    $this->SetXY($x+75, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(32,5,$row['9'],0,1,'L',0,false);    /// $row['9']  
    
    $this->SetXY($x+105, $y+18);
    $this->SetFont('Arial','B',10);
    $this->Cell(40,5,' Grand Total',0,1,'C',0,false);

    $this->SetXY($x+159, $y+18);
    $this->SetFont('Arial','B',10);
    $this->Cell(20,5,$row['78'],0,1,'C',0,false);

//     $this->SetXY($x+140, $y+18);
//     $this->SetFont('Arial','B',9);
//    $this->Cell(55,5,$row['80'],0,1,'C',0,false);   // $row['31']
  
   $this->Ln(2);
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+2, $y);
    $this->SetFont('Arial','B',13);
    $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

    $this->Ln(14);
    $this->SetXY($x+6, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(20,15,'Receivers Sign.',0,1,'L',0,false);

    
    $this->SetXY($x+140, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(50,5,'FOR Signature Concepts LLP',0,1,'L',0,false);

    $this->SetXY($x+146, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(20,15,'Authorised Sign.',0,1,'L',0,false);
        



   


 
      



                    


    


}





}

function Footer()
{

      
}

}
$pdf= new this();
$pdf->AliasNbPages();

// // Add new pages
// // Add new pages
$pdf->SetAutoPageBreak(true,130);
$pdf->AddPage();
//      $pdf->Ln();

   
  $pdf->Output("invoice.pdf","F");

  $pdf->Output();
  $email_msg = "Hi Sir/Mam,\n\nPlease find attached DELIVERY CHALLAN.\n Thanks.\nBest Regards,\nSignature Concepts LLP,\nPune-411037\n7757033204";
  $email_id = $res_email[0];
  sendEmail($email_msg, $email_id);
  // sendEmail($email_msg, 'altafshaikh29111999@gmail.com');



?>   