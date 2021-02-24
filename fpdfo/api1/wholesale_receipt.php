<?php
// include('../../partials/dbconnection.php');
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


    $code="";
    class PDF extends FPDF
    {

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
                 $this->SetLineWidth(0.1);
                 $this->SetFillColor(255,255,255);
                  $this->SetFont('Arial','',30);
            
                  $this->RoundedRect(8, 18, 158,130, 5.5, 'DF');
        
            $y = $this->GetY();
            $x = $this->GetX();

            $this->SetXY($x+2, $y+2);
            $this->SetFont('arial','',8);
            $this->Cell(18,5,'Original PDF',1,1,'L',true);
            $this->SetXY($x+21, $y+2);
            $this->SetFont('arial','',8);
            $this->Cell(20,5,'Duplicate PDF',1,1,'L',true);
                    $this->SetXY($x+2, $y+12);
                    $this->SetFont('arial','B',11);
                    $this->Cell(148,5,'Wholesale Receipt',0,1,'C',true);

             $this->SetXY($x, $y+10);
              $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',46,20,11);

            $this-> Ln();
        
            $y = $this->GetY();
            $x = $this->GetX();

                    $this->SetXY($x-2, $y+4);
                    $this->SetFont('arial','B',12);
                    $this->Cell(158,5,'Signature Concept LLP',0,1,'C',0,false);


                     $this->SetXY($x+20, $y+13);
                     $this->SetFont('arial','',7);
                     $this->Cell(10,0,'Address : S NO-651/ 25/ 1,GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1);
            
                      $this->SetXY($x+12, $y+14);
                       $this->SetFont('arial','',7);
                       $this->Cell(150,4,'OPP SHREEJI LAWNS, BIBWADI, PUNE - 411037, MAHARASHTRA, INDIA Email_Id signatureconcepts.pune@gmail.com',0,1,'L',0,false);
           
                         $this->SetXY($x+60, $y+19);
                          $this->SetFont('arial','',7);
                          $this->Cell(10,0,'Ph.No.7757033204',0,1);
            
             $this->Line(8,46,166,46); //line
    

             include('../../database/dbconnection.php');
        $edit_id = $_GET['id'];

             $sql_charges = "SELECT wr.*, wr.payment_type,wr.receipt_date, wr.remark, m.cust_display_name,wri.amount
             FROM wholesale_receipt AS wr,mstr_customer AS m, wholesale_receipt_items wri
                 WHERE wr.cust_id_fk = m.cust_id_pk AND  wri.receipt_id_fk ='$edit_id'";


    //          SELECT wr.*, wr.payment_type,wr.receipt_date, wr.remark, m.cust_display_name,wri.amount
		// FROM wholesale_receipt AS wr,mstr_customer AS m, wholesale_receipt_items wri
    //     WHERE wr.cust_id_fk = m.cust_id_pk AND  wri.receipt_id_fk

              $result_charges = mysqli_query($db, $sql_charges);
              $row=mysqli_fetch_row($result_charges);



             $this-> Ln(0);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+20, $y+6);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,' Receipt No.:',0,1);
             $this->Line(53,53,95,53);  // line

             $this->SetXY($x+45, $y+6);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['0'],0,'L',1,false);

             $this->SetXY($x+90, $y+6);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'             Date ',0,1);

             $this->SetXY($x+113, $y+6);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['12'],0,'L',1,false);
             $this->Line(124,53,160,53); // line


             $this->SetXY($x+11, $y+13);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'Received from M/s.',0,1);
             $this->Line(53,60,160,60);   // line

             $this->SetXY($x+45, $y+13);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,$row['18'],0,'L',1,false);

             $this->SetXY($x+87, $y+13);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'       Add. ',0,1);

             $this->SetXY($x+100, $y+13);
             $this->SetFont('arial','',8);
             $this->Cell(15,0,'MUDRA SOCEITY, SATARA ROAD, F',0,'L',1,false);


             $this->SetXY($x+18, $y+20);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'Against Po No',0,1);
             $this->SetXY($x+43, $y+17);
             $this->SetFont('arial','',8);
             $this->Cell(55,5,'           ',0,1,'L',1,false);
             $this->Line(53,67,160,67); // line

        
             $this->SetXY($x+2, $y+25);
             $this->SetFont('arial','B',8);
             $this->Cell(40,5,'The Sum of Rs.(in words)',0,1,'C',0,false);

             $this->SetXY($x+43, $y+25);
             $this->SetFont('arial','',8);
             
             $this->Cell(55,5,convertNum($row['19']).' Only',0,1,'L',1,false);
            $this->Line(53,74,160,74); // line             
             
             $this->SetXY($x+19, $y+35);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,' By Cash (Rs).',0,1);

             $this->SetXY($x+45, $y+35);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['7'],0,'L',1,false);
             $this->Line(53,82,160,82); // line

             $this->SetXY($x+11, $y+43);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,' By Credit Card (Rs).',0,1);

             $this->SetXY($x+45, $y+43);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['8'],0,'L',1,false);
          $this->Line(53,90,90,90); // line

             
             $this->SetXY($x+90, $y+43);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,' Credit Card No.',0,1);

             $this->SetXY($x+115, $y+43);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['9'],0,'L',1,false);
             $this->Line(124,90,160,90); // line

             $this->SetXY($x+15, $y+51);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'  By Cheque (Rs).',0,1);
             
             $this->SetXY($x+44, $y+51);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['10'],0,'L',1,false);
             $this->Line(53,98,90,98); // line

             $this->SetXY($x+90, $y+51);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'        Cheque No.',0,1);
             $this->SetXY($x+115, $y+51);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['11'],0,'L',1,false);
             $this->Line(124,98,160,98); // line
            

             $this->SetXY($x+15, $y+59);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'      Advance (Rs).',0,1);
             
             $this->SetXY($x+44, $y+58);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,'  ',0,'L',1,false);
             $this->Line(53,105,90,105); // line

             $this->SetXY($x+86, $y+59);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'Manual Debit Note.',0,1);
             $this->SetXY($x+115, $y+58);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,' 0.00 ',0,'L',1,false);
             $this->Line(124,105,160,105); // line
             
             $this->SetXY($x+11, $y+66);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,' Manual Credit Note.',0,1);
             
             $this->SetXY($x+44, $y+66);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,' 0.00 ',0,'L',1,false);
             $this->Line(53,113,90,113); // line

             $this->SetXY($x+90, $y+66);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'Return Goods',0,1);
             $this->SetXY($x+115, $y+66);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,' 0.00 ',0,'L',1,false);
             $this->Line(124,113,160,113); // line


             $this->SetXY($x+11, $y+74);
             $this->SetFont('arial','B',8);
             $this->Cell(10,0,'                 Narration:',0,1);
             
             $this->SetXY($x+42, $y+74);
             $this->SetFont('arial','',8);
             $this->Cell(10,0,$row['5'],0,'L',1,false);


            
             $this->SetXY($x+15, $y+90);
             $this->SetFont('arial','B',8);

             $this->MultiCell(35,10,'  Rs.: ',1,1,true);

             $this->SetXY($x+29, $y+93);
             $this->SetFont('arial','B',8);
             $this->MultiCell(19,5,$row['19'],0,1,'R',0,false);


             $this->SetXY($x+58, $y+95);
             $this->SetFont('arial','B',8);
             $this->MultiCell(30,5,'Created By.',0,1,'L',0,false);
             $this->SetXY($x+76, $y+95);
             $this->SetFont('arial','',8);
             $this->MultiCell(20,5,'ADMIN',0,1,'L',0,false);

             $this->SetXY($x+95, $y+85);
             $this->SetFont('arial','B',8);
             $this->MultiCell(30,5,'    For.',0,1,'L',0,false);
             $this->SetXY($x+108, $y+85);
             $this->SetFont('arial','',8);
             $this->MultiCell(40,5,'Signature Concepts LLP',0,1,'L',0,false);
             $this->SetXY($x+111, $y+95);
             $this->SetFont('arial','',8);
             $this->MultiCell(30,5,'Authorised Sign.',0,1,'L',0,false);



          

            //  $this->SetXY($x+109, $y+50);
            //  $this->SetFont('arial','B',9);
            //  $this->MultiCell(38,10,'',1,'C',1,true);

            //  $this->SetXY($x+110, $y+55);
            //  $this->SetFont('arial','B',9);
            //  $this->MultiCell(35,4,"   Reciever's Sign.",0,'C',1,true);
             
             
            
        // $width=$this -> w; // Width of Current Page
        // $height=$this -> h; // Height of Current Page
        // $edge=2;
        // $edge1=2;// Gap between line and border , change this value
        // $this->Line($edge, $edge1,$width-$edge,$edge1); // Horizontal line at top
        // $this->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
        // $this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left
        // $this->Line($width-$edge, $edge1,$width-$edge,$height-$edge); // Vetical line at Right
        
        // /////border end////

        }

    }


    $pdf = new PDF('L','mm',array(175,155));
    $pdf->AliasNbPages();

    // Add new pages
    // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();

      $pdf->Ln();

    $pdf->Output();

?>
