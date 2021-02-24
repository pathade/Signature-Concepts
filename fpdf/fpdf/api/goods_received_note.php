<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

    require('fpdf182/fpdf.php');
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
            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+54, $y+14);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Goods Received Note',0,1);

             $this->SetXY($x, $y+10);
              $this->Image('C:\Users\admin\Desktop\Work\LOGO-SIGNATURE_3.jpeg',48,18,12);

            $this-> Ln();
        
            $y = $this->GetY();
            $x = $this->GetX();

            
            $this->SetXY($x-4, $y-11);
            $this->SetFont('arial','',8);
            $this->Cell(18,5,'Original PDF',1,1,'L',0,false);
            $this->SetXY($x+15, $y-11);
            $this->SetFont('arial','',8);
            $this->Cell(20,5,'Duplicate PDF',1,1,'L',0,false);

                    $this->SetXY($x+53.5, $y+11);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Signature Concept LLP',0,1);


                     $this->SetXY($x+23, $y+15);
                     $this->SetFont('arial','',8);
                    //  $this->Cell(200,46,'  ',1,1,'C',0,false);
                     $this->Cell(110,5,'S NO-651/ 25/ 1,GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'R',0,false);
            
                      $this->SetXY($x+20, $y+18.5);
                       $this->SetFont('arial','',8);
                       $this->Cell(110,5,'OPP SHREEJI LAWNS, BIBWADI, PUNE - 411037, MAHARASHTRA, INDIA',0,1,'R',0,false);
                       
           
                         $this->SetXY($x+16, $y+21.5);
                          $this->SetFont('arial','',8);
                          $this->Cell(110,5,'Phone No : 7757033204  EmailId : signatureconcepts.pune@gmail.com',0,1,'R',0,false);
                      
            
             $this->Line(8,46.5,166,46.5); //line

          
             $db = mysqli_connect("localhost","root","","nks");  
          // $edit_id = $_GET['id'];
           
                              //    $sql_charges = "SELECT *
                              //    FROM grn, grn_items ,purchase_order, purchase_order_items
                              //  WHERE po_id_fk AND grn_id_fk AND supplier_id_fk= '$edit_id'";

            $edit_id = 1;                              
            $sql_charges = "SELECT *
                          FROM grn, grn_items ,purchase_order AS po, purchase_order_items, mstr_supplier AS ms
                           WHERE po_id_fk AND grn_id_fk AND po.supplier_id_fk = ms.supplier_id_fk = '$edit_id'";

            $result_charges = mysqli_query($db, $sql_charges);
            $row=mysqli_fetch_row($result_charges);

            //   $x = $this->GetX();
            // $y = $this->GetY();
             $this->SetXY($x, $y+28);
             $this->SetFont('arial','B',9);
             $this->Cell(17,5,'Supplier    :',0,1,'L',0,false);

             $this->SetXY($x+20, $y+28);
             $this->SetFont('arial','',9);
             $this->Cell(60,5,$row['69'],0,1,'L',0,false);

             $this->SetXY($x+95, $y+28);
             $this->SetFont('arial','B',9);
             $this->Cell(16,5,'GRN No    :',0,1,'L',0,false);

             $this->SetXY($x+115, $y+28);
             $this->SetFont('arial','',9);
             $this->Cell(35,5,$row['4'],0,1,'L',0,false);

             $this->SetXY($x, $y+33);
             $this->SetFont('arial','B',9);
             $this->Cell(17,5,'Phone No. :',0,1,'L',0,false);

             $this->SetXY($x+20, $y+33);
             $this->SetFont('arial','',9);
             $this->Cell(40,5,$row['7'],0,1,'L',0,false);
             
             $this->SetXY($x+95, $y+33);
             $this->SetFont('arial','B',9);
             $this->Cell(16,5,'Date          :',0,1,'L',0,false);

             $this->SetXY($x+114, $y+33);
             $this->SetFont('arial','',9);
             $this->Cell(16,5,$row['10'],0,1,'L',0,false);

             $this->SetXY($x, $y+41);
             $this->SetFont('arial','B',9);
             $this->Cell(17,5,'Address ',0,1,'L',0,false);

             $this->SetXY($x+20, $y+41);
             $this->SetFont('arial','',9);
             $this->Cell(70,5,$row['2'],0,1,'L',0,false);
         
           //  , NEAR MABA MATA MANDIR, PUNE-37
             $this->SetXY($x+96, $y+41);
             $this->SetFont('arial','B',9);
             $this->Cell(15,5,'Po No      : ',0,1,'L',0,false);

             $this->SetXY($x+114, $y+41);
             $this->SetFont('arial','',9);
             $this->Cell(70,5,$row['34'],0,1,'L',0,false);
             //20-21/1
             $this->Line(8,70,166,70); //line

             $this->SetXY($x-2, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(10,6,'Sr.No',0,1,'L',0,false);
             $this->SetXY($x-1, $y+56);
             $this->SetFont('arial','',9);
             $this->Cell(10,8,'1',0,1,'C',0,false);

             $this->SetXY($x+14, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(35,6,'Discription of Goods',0,1,'L',0,false);
             $this->SetXY($x+14, $y+56);
             $this->SetFont('arial','',9);
             $this->Cell(30,8,$row['57'].'    '.$row['58'],0,1,'L',0,false);

             $this->SetXY($x+77, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(15,6,'Size',0,1,'C',0,false);
             $this->SetXY($x+77, $y+56);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row['59'],0,1,'C',0,false);

             $this->SetXY($x+95, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(15,6,'Qty',0,1,'C',0,false);
             $this->SetXY($x+95, $y+56);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row['15'],0,1,'C',0,false);

             $this->SetXY($x+113, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(15,6,'Rate',0,1,'C',0,false);
             $this->SetXY($x+113, $y+56);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row['28'],0,1,'C',0,false);

             $this->SetXY($x+135, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(15,6,'Amount',0,1,'C',0,false);
             $this->SetXY($x+135, $y+56);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row['29'],0,1,'C',0,false);
            $this->Line(8,76,166,76); //line
        
             $this->Line(8,95,166,95); //line

             $this->SetXY($x+85, $y+75);
             $this->SetFont('arial','B',9);
             $this->Cell(25,8,'Grand Total:',0,1,'C',0,false);

             $this->SetXY($x+114, $y+75);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row['25'],0,1,'C',0,false);

             $this->SetXY($x+135, $y+75);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,$row['26'],0,1,'C',0,false);

             $this->Line(8,102,166,102); //line

            
         $x = $this->GetX();
         $y = $this->GetY();
     $this->SetXY($x+106, $y+5);
     $this->SetFont('Arial','',9);
     $this->Cell(50,5,'FOR Signature Concepts LLP',0,1,'L',0,false);

     $this->SetXY($x+116, $y+12);
     $this->SetFont('Arial','',9);
     $this->Cell(20,15,'Authorised Sign.',0,1,'L',0,false);

             $this->SetXY($x+2, $y+7);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Amt In Words:',0,1);
         //    $this->Line(42,85,163,85); // line
             $this->SetXY($x+30, $y+7);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,convertNum($row['26']).' Only',0,'L',1,false);


            }

        }
    
    
        $pdf = new PDF('L','mm',array(120,175));
        $pdf->AliasNbPages();
    
        // Add new pages
        // Add new pages
        $pdf->SetAutoPageBreak(true,130);
        $pdf->AddPage();
    
          $pdf->Ln();
    
        $pdf->Output();
    
    ?>