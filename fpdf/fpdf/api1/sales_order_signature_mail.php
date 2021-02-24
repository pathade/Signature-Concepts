<?php
include('../../database/dbconnection.php');

  extract($_GET);
  $get_email = "SELECT account_mail_id FROM tbl_wholesale_customer wc,wholesale_work_order so WHERE so.work_order_id='".$_GET['id']."' AND wc.wc_id_pk=so.cust_id_fk";
  $res_email = mysqli_fetch_row(mysqli_query($db, $get_email));


  function sendEmail( $message, $email)
{
    $sub = "Sales order";
    
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
     $sql_charges="SELECT * FROM wholesale_work_order WHERE work_order_id ='$edit_id' ";
         
     $result_charges = mysqli_query($db, $sql_charges);
     $row=mysqli_fetch_row($result_charges);

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,30,'  ',1,1,'C',0,false);

     $today = date("Y-m-d");

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-2, $y-38);
     $this->SetFont('Arial','B',11);
     $this->Cell(185,8,'Sales Order',0,1,'C',0,false);
     $this->SetXY($x, $y+7);
     $this->Image('../../app-assets/images/pdf/signature_2.jpg',22,18,25);

     //$this->Line(210,10,10,10);

    
    //  $this->SetFont('Arial','B',20);

    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

  

     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y-23);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,-15,'Signature Concepts LLP',0,1,'C',0,false);

     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+21);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-15);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-11);
     $this->SetFont('Arial','',8);
     $this->Cell(200,10,'Phone No : 7757033204',0,1,'C',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-7);
     $this->SetFont('Arial','',8);
     $this->Cell(200,10,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x+40, $y);
    //  $this->SetFont('Arial','B',11);
    //  $this->Cell(102,15,'Tax Invoice',0,1,'C',0,false);


    $this->Ln(3);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-3);
     $this->SetFont('Arial','B',15);
     $this->Cell(140,30,'  ',1,1,'C',0,false);

     $sql_charges1 ="SELECT twc.wc_id_pk, twc.cust_name, twc.office_address,
     twc.mob_number,twc.gst_no,wo.work_order_id, wo.cust_id_fk
     FROM wholesale_work_order wo, tbl_wholesale_customer twc
     WHERE wo.work_order_id ='$edit_id' and wo.cust_id_fk = twc.wc_id_pk";
        
    $result_charges1 = mysqli_query($db, $sql_charges1);
    $row1 =mysqli_fetch_row($result_charges1);

    if ($row1 != ""){

     $this->SetXY($x-5, $y-2);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Customer :     '.$row1['1'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+3);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Site           :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+3);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,' ',0,1,'L',0,false);

     $this->SetXY($x-5, $y+10);
     $this->SetFont('Arial','B',8);
     $this->Cell(20,5,' Site Add.  :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+10);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,$row1['2'],0,1,'L',0,false);

     // $this->SetXY($x+15, $y+14);
     // $this->SetFont('Arial','',8);
     // $this->Cell(35,5,'PUNE-411011 ',0,1,'L',0,false);

     $this->SetXY($x+15, $y+18);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,'Ph.No. '.$row1['3'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+21);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,7,' GST No.   :      '.$row1['4'],0,1,'L',0,false);
    }
else {
     
     $this->SetXY($x-5, $y-2);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Customer :     ',0,1,'L',0,false);

     $this->SetXY($x-5, $y+3);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Site           :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+3);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,' ',0,1,'L',0,false);

     $this->SetXY($x-5, $y+10);
     $this->SetFont('Arial','B',8);
     $this->Cell(20,5,' Site Add.  :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+10);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,' ',0,1,'L',0,false);

     // $this->SetXY($x+15, $y+14);
     // $this->SetFont('Arial','',8);
     // $this->Cell(35,5,'PUNE-411011 ',0,1,'L',0,false);

     $this->SetXY($x+15, $y+18);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,'Ph.No. ',0,1,'L',0,false);

     $this->SetXY($x-5, $y+21);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,7,' GST No.   : ',0,1,'L',0,false);
}

     $this->Ln(10);
     $this->SetXY($x+135, $y-3);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,30,'',1,1,'L',0,false);

     $this->SetXY($x+135, $y+2);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'  SO No.  : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+2);
     $this->SetFont('Arial','',9);
     $this->Cell(40,9,$row['1'],0,1,'L',0,false);
     
     $this->SetXY($x+135, $y+10);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'  Date      : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+10);
     $this->SetFont('Arial','',9);
     $this->Cell(40,9,$row['20'],0,1,'L',0,false);

     $this->Ln(-1);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+9);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,20,'',1,1,'C',0,false);   // 

     $this->SetXY($x-5, $y+9);
           $this->SetFont('Arial','B',9); 
           $this->Cell(200,8,'  ',1,1,'C',0,false);   //

           $this->SetXY($x-5, $y+9);
                $this->SetFont('Arial','B',9);
                $this->Cell(10,8,'No.',1,1,'C',0,false);
    
                $this->SetXY($x+5, $y+9);
                   $this->SetFont('Arial','B',9);
                   $this->Cell(56,8,'Description Of Goods',1,1,'C',0,false);

    

     $this->SetXY($x+61, $y+9);
              $this->SetFont('Arial','B',8);
              $this->Cell(21,8,'Remark',1,1,'C',0,false);

        $this->SetXY($x+82, $y+9);
                   $this->SetFont('Arial','B',9);
                   $this->Cell(17,8,'Size',1,1,'C',0,false);

          $this->SetXY($x+99, $y+9);
                        $this->SetFont('Arial','B',9);
                        $this->Cell(17,8,'Quantity',1,1,'C',0,false);

             $this->SetXY($x+116, $y+9);
                   $this->SetFont('Arial','B',9);
                    $this->Cell(19,8,'Sq.Ft.',1,1,'C',0,false);                                           
              $this->SetXY($x+135, $y+9);
                        $this->SetFont('Arial','B',9);
                       $this->Cell(30,8,'Rate',1,1,'C',0,false);
                                        
                     $this->SetXY($x+165, $y+9);
                            $this->SetFont('Arial','B',9);
                            $this->Cell(30,8,'Amount',1,1,'C',0,false);

     $sql_charges2 ="SELECT woi.*, mi.item_id_pk, mi.final_product_code
     FROM wholesale_work_order_items woi, mstr_item mi 
     WHERE woi.work_order_no_id_fk = '$edit_id' and woi.item_id_fk = mi.item_id_pk ";
     
     $result_charges2 = mysqli_query($db, $sql_charges2);
     while($row2 =mysqli_fetch_row($result_charges2))
     {                        

    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x+5, $y);
    $this->SetFont('Arial','',8);
    $this->Cell(56,12,'',1,1,'L',0,false);    ///

    $this->SetXY($x+99, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(17,12,'    ',1,1,'L',0,false);    ///


    $this->SetXY($x-5, $y);
         $this->SetFont('Arial','B',9);
         $this->Cell(10,12,$row2['0'],1,1,'C',0,false);

           $this->SetXY($x+7, $y+1);
              $this->SetFont('Arial','',9);
              $this->Cell(56,6,$row2['20'],0,1,'L',0,false);
          //     $this->SetXY($x+7, $y+6);
          //     $this->SetFont('Arial','',9);
          //     $this->Cell(56,4,'Matt-S1-1A420 ',0,1,'L',0,false);

                   $this->SetXY($x+61, $y);
                        $this->SetFont('Arial','',8);
                        $this->Cell(21,12,$row2['12'],1,1,'C',0,false);

                        $this->SetXY($x+82, $y);
                             $this->SetFont('Arial','',8);
                             $this->Cell(17,12,$row2['4'],1,1,'C',0,false);

                             $this->SetXY($x+99, $y);
                                  $this->SetFont('Arial','',9);
                                  $this->Cell(17,12,$row2['3'],1,1,'C',0,false);

                     $this->SetXY($x+116, $y);
                            $this->SetFont('Arial','',8);
                            $this->Cell(19,12,$row2['5'],1,1,'C',0,false);

                            $this->SetXY($x+135, $y);
                                 $this->SetFont('Arial','',8);
                                 $this->Cell(30,12,$row2['6'],1,1,'C',0,false);

                                 $this->SetXY($x+165, $y);
                                      $this->SetFont('Arial','',9);
                                      $this->Cell(30,12,$row2['9'],1,1,'R',0,false);
                            }
    $this->SetXY($x+5, $y);
    $this->SetFont('Arial','',8);
    $this->Cell(56,12,'',1,1,'L',0,false);    ///

    $this->SetXY($x+99, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(17,12,'    ',1,1,'L',0,false);    ///

    

       $this->Ln(-37);
    $y = $this->GetY();
    $x = $this->GetX();
      $this->SetXY($x-5, $y+37);
      $this->SetFont('Arial','B',9);
      $this->Cell(170,8,'Grand Total',1,1,'C',0,false);
      $this->SetXY($x+95, $y+37);
      $this->SetFont('Arial','B',9);
      $this->Cell(20,8,$row['11'],0,1,'C',0,false);

      $this->SetXY($x+115, $y+37);
      $this->SetFont('Arial','B',9);
      $this->Cell(20,8,$row['12'],0,1,'C',0,false);

      $this->SetXY($x+165, $y+37);
      $this->SetFont('Arial','B',9);
      $this->Cell(30,8,$row['13'],1,1,'R',0,false);
 

//   $this->Ln(5);
    $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(200,85,'  ',1,1,'C',0,false);   //  //
     
     $this-> Ln(-20);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-65);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,8,'In Words -',0,1,'C',0,false); //

     $this->SetXY($x+17, $y-65);
     $this->SetFont('Arial','',9);
     $this->Cell(80,8,'Rs.'.convertNum($row['13']),0,1,'C',0,false);
     

      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x-3, $y+4);
      $this->SetFont('Arial','B',9);
      $this->Cell(49,20,' ',0,1,'L',0,false);    //box1

     $this->SetXY($x-3, $y+4);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'ICICI BANK',0,1,'L',0,false);

     $this->SetXY($x-3, $y+8);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'Add.: VIMANNAGAR, PUNE',0,1,'L',0,false);

     $this->SetXY($x-3, $y+12);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'Acct. No.: 091505500492',0,1,'L',0,false);

     $this->SetXY($x-3, $y+16);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'IFSC No.: ICIC0000915',0,1,'L',0,false);
     

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+50, $y-17);
     $this->SetFont('Arial','B',9);
     $this->Cell(49,20,' ',0,1,'L',0,false);    //box2

    $this->SetXY($x+50, $y-17);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'KOTAK BANK',0,1,'L',0,false);
    
    $this->SetXY($x+50, $y-13);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'Add.: BIBWEWADI, PUNE',0,1,'L',0,false);
    
    $this->SetXY($x+50, $y-9);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'Acct. No.: 3912034064',0,1,'L',0,false);

    $this->SetXY($x+50, $y-5);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'IFSC No.: KKBK0001770',0,1,'L',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y-29);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,49,'',1,1,'L',0,false);    // box3

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y-49);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Discount',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,$row['16'],0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Load / Unload',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'0',0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Others(+/-)',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,$row['17'],0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Transport',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'0',0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'GST',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'0',0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y+4);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,10,' ',1,1,'C',0,false); // vertical box

    $this->SetXY($x+2, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(15,10,'GST No.',0,1,'C',0,false);
    $this->SetXY($x+18, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'27ADHFS0274J1ZU',0,1,'C',0,false);

    $this->SetXY($x+65, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'PAN NO.',0,1,'C',0,false);
    $this->SetXY($x+85, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'ADHFS0274J',0,1,'C',0,false);
  

    $this->SetXY($x+135, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'Net Amount.',0,1,'C',0,false);
    $this->SetXY($x+165, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,$row['19'],0,1,'R',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-1, $y+2);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'INTEREST @18 % WILL BE CHARGED IF NOT PAID WITHIN 7 DAYS',0,1,'L',0,false);

     $this->SetXY($x-1, $y+5);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,"Shortage,Breakage,Damage etc. During Transit At Buyer's Risk.",0,1,'L',0,false);


    // $this->SetXY($x-5, $y+16);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(50,20,'',1,1,'L',0,false);

    $this->SetXY($x-3, $y+11);
    $this->SetFont('Arial','B',9);
    $this->Cell(40,8,'Terms & Conditions -',0,1,'L',0,false);

    $this->SetXY($x, $y+16);
    $this->SetFont('Arial','',8);
    $this->Cell(60,7,'I / We hereby certify that my / our Registration Certificate under GST Act 2017 is in force on the date on',0,1,'L',0,false);
    $this->SetXY($x, $y+19);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'which the sale of goods specified in this tax invoice is made by me/us and that transaction of sale',0,1,'L',0,false);
    $this->SetXY($x, $y+22);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'covered by this tax invoice has been effected by me / us and it shall be accounted for in the turnover of',0,1,'L',0,false);

    $this->SetXY($x, $y+25);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'sales while filling of return and due tax if any payable on the sale has been paid or shall be paid',0,1,'L',0,false);

    $this->SetXY($x, $y+28);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'Subject to Pune jurisdiction. ',0,1,'L',0,false);



    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+124, $y-13);
    $this->SetFont('Arial','B',13);
    $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

    $this->SetXY($x+118, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(68,15,' FOR Signature Concept LLP',0,1,'C',0,false);

    $this->SetXY($x+118, $y+9);
    $this->SetFont('Arial','',9);
    $this->Cell(68,15,'Authorised Sign.',0,1,'C',0,false);

    $this->SetXY($x-5, $y+9);
    $this->SetFont('Arial','',9);
    $this->Cell(50,15,"Receiver's Sign.",0,1,'C',0,false);
    

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
  $email_msg = "Hi Sir/Mam,\n\nPlease find attached SALES ORDER.\n Thanks.\nBest Regards,\nSignature Concepts LLP,\nPune-411037\n7757033204";
  $email_id = $res_email[0];
  sendEmail($email_msg, $email_id);
  // sendEmail($email_msg, 'altafshaikh29111999@gmail.com');
   
    ?>   