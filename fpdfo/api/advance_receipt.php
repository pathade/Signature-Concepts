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


          include('../../database/dbconnection.php');
          $edit_id = $_GET['id'];
      
        $sql_charges="SELECT ca.*, wc.wc_id_pk, wc.cust_name
          FROM wholesale_customer_advance ca, tbl_wholesale_customer wc
          WHERE ca.adv_id_pk ='$edit_id' and ca.cust_id_fk = wc.wc_id_pk";
      
          $result_charges = mysqli_query($db, $sql_charges);
          $row=mysqli_fetch_row($result_charges);

                 $this->SetLineWidth(0.1);
                 $this->SetFillColor(255,255,255);
                  $this->SetFont('Arial','',30);
            
                  $this->RoundedRect(8, 18, 158,90, 5.5, 'DF');
        
            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+49, $y+14);
                    $this->SetFont('arial','B',11);
                    $this->Cell(10,0,'Sales Order Advance Receipt',0,1);

             $this->SetXY($x, $y+10);
              $this->Image('../../app-assets/images/pdf/signature_2.jpg',45,22,13);

            $this-> Ln();
        
            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+53.5, $y+11);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Signature Concept LLP',0,1);


                     $this->SetXY($x+20, $y+18);
                     $this->SetFont('arial','',8);
                     $this->Cell(10,0,'Address : S NO-651/ 25/ 1,GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1);
            
                      $this->SetXY($x+25, $y+21);
                       $this->SetFont('arial','',8);
                       $this->Cell(10,0,'OPP SHREEJI LAWNS, BIBWADI, PUNE - 411037, MAHARASHTRA, INDIA',0,1);
           
                         $this->SetXY($x+60, $y+24);
                          $this->SetFont('arial','',8);
                          $this->Cell(10,0,'Ph.No.7757033204',0,1);
            
             $this->Line(8,46,166,46); //line
    
             $this-> Ln(0);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+10, $y+6);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,' Receipt No.:',0,1);
             $this->Line(42,53,95,53);  // line

             $this->SetXY($x+32, $y+6);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,$row['1'],0,'L',1,false);

             $this->SetXY($x+90, $y+6);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Receipt Date:',0,1);

             $this->SetXY($x+113, $y+6);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,$row['5'],0,'L',1,false);
             $this->Line(124,53,160,53); // line


             $this->SetXY($x+12, $y+13);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,' Customer:',0,1);
             $this->Line(42,60,160,60);   // line

             $this->SetXY($x+32, $y+13);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,$row['18'],0,'L',1,false);


             $this->SetXY($x+12, $y+21);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'  PayMode:',0,1);
             $this->Line(42,68,160,68); // line

             $this->SetXY($x+32, $y+21);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,$row['4'],0,'L',1,false);

             $this->SetXY($x+68, $y+21);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Cheq.No.:',0,'L',1,false);

             $this->SetXY($x+86, $y+21);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,$row['12'],0,'L',1,false);

             
             $this->SetXY($x+109, $y+21);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'chq.Date:',0,'L',1,false);

             $this->SetXY($x+125, $y+21);
             $this->SetFont('arial','',9);
             $this->Cell(30,0,$row['13'],0,'L',1,false);

        
             $this->SetXY($x+13, $y+29);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,' Narration:',0,1);

             $this->SetXY($x+32, $y+29);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,$row['9'],0,'L',1,false);
            $this->Line(42,76,160,76); // line             
             
             $this->SetXY($x+7, $y+38);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,' Amt In Words:',0,1);
             $this->Line(42,85,163,85); // line

             $this->SetXY($x+32, $y+38);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,'Rs.'.convertNum($row['8']),0,'L',1,false);

             $this->SetXY($x+10, $y+50);
             $this->SetFont('arial','B',9);

             $this->MultiCell(35,10,'  Rs.: ',1,1,true);

             $this->SetXY($x+28, $y+52);
             $this->SetFont('arial','',9);
             $this->MultiCell(15,2,'          '.$row['8'],0,'R',1,true);

      
             $this->SetXY($x+55, $y+50);
             $this->SetFont('arial','B',9);
             $this->MultiCell(45,10,' ',1,1,true);

             $this->SetXY($x+63, $y+51);
             $this->SetFont('arial','B',9);
             $this->MultiCell(33,5,'   Authorised By',0,'L',1,true);

             $this->SetXY($x+63, $y+56);
             $this->SetFont('arial','',9);
             $this->MultiCell(33,3,'       ADMIN',0,'L',1,true);
          

             $this->SetXY($x+109, $y+50);
             $this->SetFont('arial','B',9);
             $this->MultiCell(38,10,'',1,'C',1,true);

             $this->SetXY($x+110, $y+55);
             $this->SetFont('arial','B',9);
             $this->MultiCell(35,4,"   Reciever's Sign.",0,'C',1,true);
             
             
            
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


    $pdf = new PDF('P','mm',array(206,174));
    $pdf->AliasNbPages();

    // Add new pages
    // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();

      $pdf->Ln();

    $pdf->Output();

?>
