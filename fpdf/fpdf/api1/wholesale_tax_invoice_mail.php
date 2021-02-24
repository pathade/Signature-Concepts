<?php
// include('../../partials/dbconnection.php');
  extract($_GET);
  $get_email = "SELECT account_mail_id FROM tbl_wholesale_customer wc,wholesale_tax_invoice wti WHERE wti.tax_id_pk='".$_GET['id']."' AND wc.wc_id_pk=wti.cust_id_fk";
  $res_email = mysqli_fetch_row(mysqli_query($db, $get_email));

  function sendEmail( $message, $email)
  {
      $sub = "Wholesale Tax invoice";
      
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

    
    include('../../database/dbconnection.php');
    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM wholesale_tax_invoice WHERE tax_id_pk ='$edit_id' ";
        
    $result_charges = mysqli_query($db, $sql_charges);
    $row=mysqli_fetch_row($result_charges);

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-3, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(133,30,'  ',1,1,'C',0,false);

     
     

     $today = date("Y-m-d");

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-2, $y-38);
     $this->SetFont('Arial','B',11);
     $this->Cell(185,8,'Tax Invoice',0,1,'C',0,false);
     $this->SetXY($x, $y+7);
     $this->Image('../../app-assets/images/pdf/signature_2.jpg',10,19,20);

     //$this->Line(210,10,10,10);

    
    //  $this->SetFont('Arial','B',20);

    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

  

     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y-23);
     $this->SetFont('Arial','B',15);
     $this->Cell(150,-15,'Signature Concepts LLP',0,1,'C',0,false);

     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+24, $y+21);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+24, $y-15);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+24, $y-11);
     $this->SetFont('Arial','',8);
     $this->Cell(200,10,'Phone No : 7757033204',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+24, $y-7);
     $this->SetFont('Arial','',8);
     $this->Cell(200,10,'Email ID : signatureconcepts.pune@gmail.com',0,1,'L',0,false);

     $this->SetXY($x+130, $y-27);
     $this->SetFont('Arial','B',15);
     $this->Cell(58,30,'  ',1,1,'C',0,false);  //

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+130, $y-29);
     $this->SetFont('Arial','B',9);
     $this->Cell(25,8,'  Inv.No.  :',0,1,'L',0,false);

     $this->SetXY($x+150, $y-29);
     $this->SetFont('Arial','B',9);
     $this->Cell(25,8,$row['1'],0,1,'L',0,false);

     $this->SetXY($x+130, $y-22);
     $this->SetFont('Arial','B',9);
     $this->Cell(25,8,'  PO.No.  : ',0,1,'L',0,false);

     
     $this->SetXY($x+150, $y-22);
     $this->SetFont('Arial','B',9);
     $this->Cell(25,8,' ',0,1,'L',0,false);


     $this->SetXY($x+130, $y-15);
     $this->SetFont('Arial','B',9);
     $this->Cell(25,8,'  Dc No.   : ',0,1,'L',0,false);

     $this->SetXY($x+150, $y-14);
     $this->SetFont('Arial','B',9);
     $this->Cell(25,8,$row['6'],0,1,'L',0,false);

     $this->SetXY($x-3, $y);
     $this->SetFont('Arial','B',15);
     $this->Cell(133,34,'  ',1,1,'C',0,false); //

     $sql_charges1 ="SELECT twc.wc_id_pk, twc.cust_name, twc.office_address,
     twc.mob_number,twc.gst_no,wti.tax_id_pk
     FROM wholesale_tax_invoice wti, tbl_wholesale_customer twc
     WHERE wti.tax_id_pk ='$edit_id' and wti.cust_id_fk = twc.wc_id_pk";
        
    $result_charges1 = mysqli_query($db, $sql_charges1);
    $row1 =mysqli_fetch_row($result_charges1);

    if ($row1 != ""){
     $this->SetXY($x-3, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(120,10,'   Name Of Consignee '.$row1['1'],0,1,'L',0,false);

     $this->SetXY($x-3, $y+5);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,'    Address :'.$row1['2'],0,1,'L',0,false);

    //  $this->SetXY($x-3, $y+8.5);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(120,10,'    PUNE - ',0,1,'L',0,false);

     $this->SetXY($x-3, $y+12);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,'    Phno.'.$row1['3'],0,1,'L',0,false);
     
     $this->SetXY($x-3, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(120,10,'    GST No ',0,1,'L',0,false);

    $this->SetXY($x+31, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(30,10,$row1['4'],0,1,'L',0,false);
     
     $this->SetXY($x-3, $y+24);
     $this->SetFont('Arial','B',9);
     $this->Cell(120,10,'    Delivery Site  : ',0,1,'L',0,false);

     $this->SetXY($x+31, $y+24);
     $this->SetFont('Arial','',9);
     $this->Cell(30,10,substr($row1['2'],0,50).'...',0,1,'L',0,false);
    }
else {
    $this->SetXY($x-3, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(120,10,'   Name Of Consignee ',0,1,'L',0,false);

     $this->SetXY($x-3, $y+5);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,'    Address :',0,1,'L',0,false);

     $this->SetXY($x-3, $y+12);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,'    Phno.',0,1,'L',0,false);
     
     $this->SetXY($x-3, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(120,10,'    GST No ',0,1,'L',0,false);

    $this->SetXY($x+31, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(30,10,'',0,1,'L',0,false);
     
     $this->SetXY($x-3, $y+24);
     $this->SetFont('Arial','B',9);
     $this->Cell(120,10,'    Delivery Site  : ',0,1,'L',0,false);

     $this->SetXY($x+31, $y+24);
     $this->SetFont('Arial','',9);
     $this->Cell(30,10,' ',0,1,'L',0,false);
}

     $this->SetXY($x-3, $y);
     $this->SetFont('Arial','B',15);
     $this->Cell(133,34,'  ',1,1,'C',0,false);  //

     
     $this->SetXY($x+130, $y);
     $this->SetFont('Arial','B',15);
     $this->Cell(58,34,'  ',1,1,'C',0,false);   //

     $this->SetXY($x+131, $y+2);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,5,' Inv.Date    : ',0,1,'L',0,false);  

     $this->SetXY($x+152, $y+2);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,5,$row['4'],0,1,'L',0,false);  

     $this->SetXY($x+131, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,5,' DC Date    : ',0,1,'L',0,false);  

     $this->SetXY($x+152, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,5,$row['4'],0,1,'L',0,false);  

     
     $this->SetXY($x+131, $y+14);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,5,' Remark     : ',0,1,'L',0,false);  

     $this->SetXY($x+152, $y+14);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,5,$row['5'],0,1,'L',0,false);  
     $this-> Ln(6);
     $y = $this->GetY();
     $x = $this->GetX();

           $this->SetXY($x-3, $y+9);
                $this->SetFont('Arial','B',9);
                $this->Cell(10,8,'No.',1,1,'C',0,false);
    
                $this->SetXY($x+7, $y+9);
                   $this->SetFont('Arial','B',9);
                   $this->Cell(50,8,'Description Of Goods',1,1,'C',0,false);

    $this->SetXY($x+57, $y+9);
         $this->SetFont('Arial','B',8);
         $this->Cell(17,8,'Remark',1,1,'C',0,false);

     $this->SetXY($x+74, $y+9);
              $this->SetFont('Arial','B',8);
              $this->Cell(20,8,'HSN/SAC',1,1,'C',0,false);

        $this->SetXY($x+94, $y+9);
                   $this->SetFont('Arial','B',9);
                   $this->Cell(18,8,'GST Rate',1,1,'C',0,false);

          $this->SetXY($x+112, $y+9);
                        $this->SetFont('Arial','B',9);
                        $this->Cell(18,8,'Quantity',1,1,'C',0,false);

             $this->SetXY($x+130, $y+9);
                   $this->SetFont('Arial','B',9);
                    $this->Cell(20,8,'Rate',1,1,'C',0,false);                                           
              $this->SetXY($x+150, $y+9);
                        $this->SetFont('Arial','B',9);
                       $this->Cell(18,8,'Disc. %',1,1,'C',0,false);
                                        
                     $this->SetXY($x+168, $y+9);
                            $this->SetFont('Arial','B',9);
                            $this->Cell(20,8,'Amount',1,1,'C',0,false);


    $sql_charges2 ="SELECT wti.*, mi.item_id_pk, mi.final_product_code
    FROM wholesale_tax_invoice_items wti, mstr_item mi 
    WHERE wti.tax_id_fk = '$edit_id' and wti.item_id_fk = mi.item_id_pk ";
    
    $result_charges2 = mysqli_query($db, $sql_charges2);
    while($row2 =mysqli_fetch_row($result_charges2))
    {   

    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-3, $y);
         $this->SetFont('Arial','B',9);
         $this->Cell(10,12,$row2['0'],1,1,'C',0,false);


         $this->SetXY($x+7, $y);
         $this->SetFont('Arial','B',9);
         $this->Cell(50,12,'    ',1,1,'L',0,false);  
           $this->SetXY($x+7, $y+1);
              $this->SetFont('Arial','',8);
              $this->Cell(50,6,$row2['18'],0,1,'L',0,false);
            //   $this->SetXY($x+7, $y+5);
            //   $this->SetFont('Arial','',8);
            //   $this->Cell(50,4,'Suppling load & Size ',0,1,'L',0,false);

              $this->SetXY($x+57, $y);
                   $this->SetFont('Arial','',9);
                   $this->Cell(17,12,$row2['11'],1,1,'L',0,false);   //

                   $this->SetXY($x+74, $y);
                        $this->SetFont('Arial','',8);
                        $this->Cell(20,12,' ',1,1,'C',0,false);

                        $this->SetXY($x+94, $y);
                             $this->SetFont('Arial','',8);
                             $this->Cell(18,12,$row2['12'],1,1,'C',0,false);

                             
              $this->SetXY($x+112, $y);
              $this->SetFont('Arial','',9);
              $this->Cell(18,12,' ',1,1,'L',0,false);   //
                             $this->SetXY($x+114, $y+3);
                                  $this->SetFont('Arial','B',9);
                                  $this->Cell(17,5,'  '.$row2['5'],0,1,'L',0,false);
                                  $this->SetXY($x+114, $y+3);
                                  $this->SetFont('Arial','',8);
                                  $this->Cell(17,5,' PCS ',0,1,'R',0,false);

                     $this->SetXY($x+130, $y);
                            $this->SetFont('Arial','',8);
                            $this->Cell(20,12,$row2['7'],1,1,'R',0,false);

                            $this->SetXY($x+150, $y);
                                 $this->SetFont('Arial','',8);
                                 $this->Cell(18,12,$row2['8'],1,1,'R',0,false);

                                 $this->SetXY($x+168, $y);
                                      $this->SetFont('Arial','',9);
                                      $this->Cell(20,12,$row2['10'],1,1,'R',0,false);

    }
    $this-> Ln(-34);
            $y = $this->GetY();
            $x = $this->GetX(); 
          $this->SetXY($x-3, $y+34);
          $this->SetFont('Arial','B',9);
          $this->Cell(191,8,'  ',1,1,'C',0,false);  //

          $this->SetXY($x+85, $y+34);
          $this->SetFont('Arial','B',9);
          $this->Cell(22,8,'Grand Total',0,1,'L',0,false);  

          $this->SetXY($x+112, $y+34);
          $this->SetFont('Arial','B',9);
          $this->Cell(20,8,'   ',0,1,'L',0,false); 

          $this->SetXY($x+167, $y+34);
          $this->SetFont('Arial','B',9);
          $this->Cell(21,8,$row['11'],1,1,'R',0,false);

          $this->SetXY($x-3, $y+42);
          $this->SetFont('Arial','B',9);
          $this->Cell(191,99,' ',1,1,'L',0,false);  //    //

          $this->SetXY($x-3, $y+42);
          $this->SetFont('Arial','B',9);
          $this->Cell(20,8,' In Words :',0,1,'L',0,false);

          $this->SetXY($x+16, $y+42);
          $this->SetFont('Arial','',9);
          $this->Cell(50,8,' Rs.'.convertNum($row['11']),0,1,'L',0,false);


          $this-> Ln(-19);

          $y = $this->GetY();
          $x = $this->GetX();

          $this->SetXY($x-1, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(143,37,' ',1,1,'R',0,false);  //
     $this->SetXY($x-4, $y+18);
     $this->SetFont('Arial','B',9);
     $this->Cell(50,10,'    GST  Summary :   ',0,1,'L',0,false);
     $this->SetXY($x+3, $y+26);
     $this->SetFont('Arial','B',9);
     $this->Cell(137.5,28,' ',1,1,'R',0,false);  //

     $this->SetXY($x+3, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(137.5,14,'',1,1,'C',0,false);                   //
     $this->SetXY($x+108.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'Interstate Tax',1,1,'C',0,false);

     $this->SetXY($x+108.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'Rate',1,1,'C',0,false);
     $this->SetXY($x+108.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'0%',1,1,'C',0,false);
     $this->SetXY($x+108.5, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,' ',1,1,'C',0,false);

     $this->SetXY($x+122.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'Amount',1,1,'C',0,false);
     $this->SetXY($x+122.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'0 ',1,1,'R',0,false);
     $this->SetXY($x+122.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,7,$row['12'],1,1,'R',0,false);

     $this->SetXY($x+76.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'State Tax',1,1,'C',0,false);

     $this->SetXY($x+76.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'Rate',1,1,'C',0,false);
     $this->SetXY($x+76.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'0%',1,1,'C',0,false);
     $this->SetXY($x+76.5, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,' ',1,1,'C',0,false);

     $this->SetXY($x+90.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'Amount',1,1,'C',0,false);
     $this->SetXY($x+90.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,' 0 ',1,1,'R',0,false);
     $this->SetXY($x+90.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,7,' 0 ',1,1,'R',0,false);


     $this->SetXY($x+44.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'Central Tax',1,1,'C',0,false);

     $this->SetXY($x+44.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'Rate',1,1,'C',0,false);
     $this->SetXY($x+44.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'0%',1,1,'C',0,false);
     $this->SetXY($x+44.5, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,' ',1,1,'C',0,false);   //

     $this->SetXY($x+58.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'Amount',1,1,'C',0,false);
     $this->SetXY($x+58.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'0 ',1,1,'R',0,false);
     $this->SetXY($x+58.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,7,'0 ',1,1,'R',0,false);

     $this->SetXY($x+18.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(26,14,' ',1,1,'C',0,false);   //
     $this->SetXY($x+18.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(26,7,'Taxable Value ',0,1,'C',0,false);

     $this->SetXY($x+18.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(26,7,$row['11'],1,1,'R',0,false);
     $this->SetXY($x+18.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(26,7,$row['11'],1,1,'R',0,false);


    
     $this->SetXY($x+1, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'  HSN/SAC',0,1,'C',0,false);
     $this->SetXY($x+3, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(15.5,7,'0',1,1,'C',0,false);
     $this->SetXY($x+3, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(15.5,7,' ',1,1,'C',0,false);

     $this->SetXY($x+143, $y+11);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,45,' ',1,1,'R',0,false);  //

     $this->SetXY($x+143, $y+11);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,45,' ',1,1,'L',0,false);  //

     $this->SetXY($x+143, $y+10);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Disc 0.00%(-)',0,1,'L',0,false);
     $this->SetXY($x+172, $y+10);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,8,$row['7'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+16);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' load/Unload',0,1,'L',0,false);
     $this->SetXY($x+172, $y+16);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,8,$row['9'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+22);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Transport.',0,1,'L',0,false);
     $this->SetXY($x+172, $y+22);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,8,$row['8'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+28);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Other(+/-)',0,1,'L',0,false);
     $this->SetXY($x+172, $y+28);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,8,$row['10'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+35);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,10,' GST Tax Amt',0,1,'L',0,false);
     $this->SetXY($x+172, $y+35);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,8,$row['12'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+48);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,' ',1,1,'R',0,false);   //

     $this->SetXY($x+143, $y+48);
     $this->SetFont('Arial','B',10);
     $this->Cell(29,8,' Net Amount : ',0,1,'L',0,false);
     $this->SetXY($x+172, $y+47);
     $this->SetFont('Arial','B',10);
     $this->Cell(16,10,$row['13'],0,1,'R',0,false);


     $this->Ln(53);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-70);
     $this->SetFont('Arial','B',9);
     $this->Cell(50,20,' ',0,1,'C',0,false); //
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y-4);
     $this->SetFont('Arial','',9);
     $this->Cell(30,10,'Bank Details  :',0,1,'L',0,false); 

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+24, $y-11);
     $this->SetFont('Arial','B',9);
     $this->Cell(49,30,' ',0,1,'C',0,false);    //

     $this->SetXY($x+24, $y-7);
     $this->SetFont('Arial','',9);
     $this->Cell(49,5,'ICICI BANK',0,1,'L',0,false);

     $this->SetXY($x+24, $y-3);
     $this->SetFont('Arial','',9);
     $this->Cell(49,5,'Add.: VIMANNAGAR, PUNE',0,1,'L',0,false);

     $this->SetXY($x+24, $y+1);
     $this->SetFont('Arial','',9);
     $this->Cell(49,5,'Acct. No.: 091505500492',0,1,'L',0,false);

     $this->SetXY($x+24, $y+5);
     $this->SetFont('Arial','',9);
     $this->Cell(49,5,'IFSC No.: ICIC0000915',0,1,'L',0,false);
     
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+80, $y-20);
     $this->SetFont('Arial','B',9);
     $this->Cell(49,30,' ',0,1,'C',0,false);   //

     $this->SetXY($x+70, $y-17);
     $this->SetFont('Arial','',9);
     $this->Cell(42,5,'KOTAK BANK ',0,1,'L',0,false);

     $this->SetXY($x+70, $y-13);
     $this->SetFont('Arial','',9);
     $this->Cell(42,5,'Add.: BIBWEWADI, PUNE',0,1,'L',0,false);

     $this->SetXY($x+70, $y-9);
     $this->SetFont('Arial','',9);
     $this->Cell(42,5,'Acct. No.: 3912034064',0,1,'L',0,false);

     $this->SetXY($x+70, $y-5);
     $this->SetFont('Arial','',9);
     $this->Cell(42,5,'IFSC No.: KKBK0001770',0,1,'L',0,false);

   
     
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+15);
     $this->SetFont('Arial','',9);
     $this->Cell(127,21,' ',0,1,'C',0,false); //

     $this->SetXY($x, $y+5);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,6,' GST NO. :',0,1,'L',0,false);

     $this->SetXY($x+16, $y+5);
     $this->SetFont('Arial','B',9);
     $this->Cell(35,6,' 27ADHFS0274J1ZU ',0,1,'L',0,false);

     $this->SetXY($x+73, $y+5);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,6,' PAN NO. :',0,1,'L',0,false);

     $this->SetXY($x+90, $y+5);
     $this->SetFont('Arial','B',9);
     $this->Cell(35,6,' ADHFS0274J ',0,1,'L',0,false);


 
     $this->SetXY($x, $y+15);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,' I / We hereby certify that my / our Registration Certificate under GST Act 2017 is in force on the date on',0,1,'L',0,false);

     $this->SetXY($x, $y+18);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'which the sale of goods specified in this tax invoice is made by me/us and that transaction of sale',0,1,'L',0,false);
     $this->SetXY($x, $y+21);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'covered by this tax invoice has been effected by me / us and it shall be accounted for in the turnover of',0,1,'L',0,false);

     $this->SetXY($x, $y+24);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'sales while filling of return and due tax if any payable on the sale has been paid or shall be paid.',0,1,'L',0,false);

     $this->SetXY($x, $y+27);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'Subject to Pune jurisdiction. ',0,1,'L',0,false);


    $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+122, $y-10);
     $this->SetFont('Arial','B',12);
     $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

     $this->SetXY($x+122, $y+4);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'FOR   Signature Concepts LLP.',0,1,'C',0,false);

     $this->SetXY($x+122, $y+14);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

     $this->SetXY($x+2, $y+13);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'  Receiver Sign.',0,1,'L',0,false);

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
  $email_msg = "Hi Sir/Mam,\n\nPlease find attached TAX INVOICE.\n Thanks.\nBest Regards,\nSignature Concepts LLP,\nPune-411037\n7757033204";
  $email_id = $res_email[0];
  sendEmail($email_msg, $email_id);
  // sendEmail($email_msg, 'altafshaikh29111999@gmail.com');
    ?>   