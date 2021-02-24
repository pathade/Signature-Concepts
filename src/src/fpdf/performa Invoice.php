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

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,35,'  ',1,1,'C',0,false);

     $today = date("Y-m-d");

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x, $y+7);
     $this->Image('C:\Users\admin\Desktop\Work\signature_2.jpg',26,21,21);

     //$this->Line(210,10,10,10);

    
    //  $this->SetFont('Arial','B',20);

    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

     

     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x, $y-28);
     $this->SetFont('Arial','B',15);
     $this->Cell(185,-15,' Signature Concepts LLP ',0,1,'C',0,false);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+43, $y+21);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+43, $y-15);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+43, $y-14.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Phone No : 7757033204',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+43, $y-14.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Email ID : signatureconcepts.pune@gmail.com',0,1,'L',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x+40, $y);
    //  $this->SetFont('Arial','B',11);
    //  $this->Cell(102,15,'Tax Invoice',0,1,'C',0,false);


     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-2);
     $this->SetFont('Arial','B',15);
     $this->Cell(140,30,'  ',1,1,'C',0,false);

     $this->SetXY($x-5, $y+1);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Customer :     PRATIK RATHI',0,1,'L',0,false);

     $this->SetXY($x-5, $y+8);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Address    :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+8);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,' 4704, MAJESTIC NAVKAR, PUNE ',0,1,'L',0,false);

     $this->SetXY($x-5, $y+16);
     $this->SetFont('Arial','B',8);
     $this->Cell(20,5,' Mobile no  :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+16);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,' 7722055533 ',0,1,'L',0,false);

     $this->SetXY($x-5, $y+22);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,7,' GST NO.   : ',0,1,'L',0,false);

     $this->SetXY($x+135, $y-2);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,30,' ',1,1,'L',0,false);

     $this->SetXY($x+135, $y+2);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'  RPO No.  : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+2);
     $this->SetFont('Arial','',9);
     $this->Cell(40,9,'242',0,1,'L',0,false);
     
     $this->SetXY($x+135, $y+10);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'  RPO Date : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+10);
     $this->SetFont('Arial','',9);
     $this->Cell(40,9,'30-Dec-2020',0,1,'L',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y+9);
    //  $this->SetFont('Arial','B',15);
    //  $this->Cell(200,65,'  ',1,1,'C',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+9);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,26,'  ',1,1,'C',0,false);   //

     $this->SetXY($x-5, $y+9);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,8,'No.',1,1,'C',0,false);

     $this->SetXY($x-5, $y+17);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,10,'1',0,1,'C',0,false);

     
     $this->SetXY($x-5, $y+17);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,10,'1',0,1,'C',0,false);

     $this->SetXY($x+5, $y+9);
     $this->SetFont('Arial','B',9);
     $this->Cell(61,26,'  ',1,1,'C',0,false); //

     $this->SetXY($x+5, $y+9);
     $this->SetFont('Arial','B',9);
     $this->Cell(61,8,'Description Of Goods',1,1,'C',0,false);
     $this->SetXY($x+5, $y+19);
     $this->SetFont('Arial','',8);
     $this->Cell(61,6,'1460, Connector with ',0,1,'L',0,false);
     $this->SetXY($x+5, $y+24);
     $this->SetFont('Arial','',8);
     $this->Cell(61,4,'Washer-1460, Connector with ',0,1,'L',0,false);

     $this->SetXY($x+5, $y+27);
     $this->SetFont('Arial','',8);
     $this->Cell(61,4,'Washer--',0,1,'L',0,false);

      

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+66, $y-22);
     $this->SetFont('Arial','B',9);
     $this->Cell(21,26,'  ',1,1,'C',0,false);  //

     $this->SetXY($x+66, $y-22);
     $this->SetFont('Arial','B',8);
     $this->Cell(21,8,'HSN/SAC',1,1,'C',0,false);
     $this->SetXY($x+66, $y-9);
     $this->SetFont('Arial','',9);
     $this->Cell(21,8,'39222900',0,1,'C',0,false);
     
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+87, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(17,26,'  ',1,1,'C',0,false);  //

     $this->SetXY($x+87, $y-21);
     $this->SetFont('Arial','B',8);
     $this->Cell(17,8,'GST Rate',1,1,'C',0,false);
     $this->SetXY($x+87, $y-9);
     $this->SetFont('Arial','',8);
     $this->Cell(17,10,'18.00% ',0,1,'C',0,false);

     $this->SetXY($x+104, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(17,26,'  ',1,1,'C',0,false);   //
     $this->SetXY($x+104, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(17,8,'Remark',1,1,'C',0,false);
     $this->SetXY($x+104, $y-9);
     $this->SetFont('Arial','',9);
     $this->Cell(17,10,'OK',0,1,'C',0,false);

     $this->SetXY($x+121, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(17,26,'  ',1,1,'C',0,false);        //
     $this->SetXY($x+121, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(17,8,'Quantity',1,1,'C',0,false);
     $this->SetXY($x+121, $y-9);
     $this->SetFont('Arial','B',9);
     $this->Cell(17,10,'   3 ',0,1,'L',0,false);
     $this->SetXY($x+121, $y-6.5);
     $this->SetFont('Arial','',8);
     $this->Cell(17,5,'   PCS',0,1,'C',0,false);

     $this->SetXY($x+138, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,26,'  ',1,1,'C',0,false);       //
     $this->SetXY($x+138, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,8,'Rate',1,1,'C',0,false);
     $this->SetXY($x+138, $y-9);
     $this->SetFont('Arial','',8);
     $this->Cell(18,10,'450.00',0,1,'C',0,false);

     $this->SetXY($x+156, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,26,'  ',1,1,'C',0,false);   //
     $this->SetXY($x+156, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(16,8,'Disc. %',1,1,'C',0,false);
     $this->SetXY($x+156, $y-9);
     $this->SetFont('Arial','',8);
     $this->Cell(16,10,'23.73',0,1,'C',0,false);

     $this->SetXY($x+172, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,26,'  ',1,1,'C',0,false);  //
     $this->SetXY($x+172, $y-21);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,'Amount',1,1,'C',0,false);
     $this->SetXY($x+172, $y-9);
     $this->SetFont('Arial','',9);
     $this->Cell(23,10,'1030.00 ',0,1,'R',0,false);

     $this->Ln(4);
      $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-8.5, $y-99);
     $this->SetFont('Arial','B',11);
     $this->Cell(200,8,'Performa Invoice  ',0,1,'C',0,false);  //

     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(177,8,'Grand Total                      3                                                 ',1,1,'R',0,false);

    //  $this->SetXY($x-5, $y);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(130,8,'        ',1,1,'R',0,false);

     $this->SetXY($x+172, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,'1030.00',1,1,'R',0,false);

     $this->SetXY($x-5, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(148,55,' ',1,1,'R',0,false); //

     $this->SetXY($x-5, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(148,10,'In Words :   ',0,1,'L',0,false);
     $this->SetXY($x+16, $y+8);
     $this->SetFont('Arial','',9);
     $this->Cell(122,10,'Rs.One Thousand Two Hundred Only ',0,1,'L',0,false);

     $this->SetXY($x-4, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(146,41,' ',1,1,'R',0,false);//
     $this->SetXY($x-4, $y+18);
     $this->SetFont('Arial','B',9);
     $this->Cell(50,10,' GST  Summary :   ',0,1,'L',0,false);
     $this->SetXY($x-3, $y+26);
     $this->SetFont('Arial','B',9);
     $this->Cell(143.5,28,' ',1,1,'R',0,false);  //

     $this->SetXY($x-3, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(143.5,14,'',1,1,'C',0,false);  //
     $this->SetXY($x+108.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'Interstate Tax',1,1,'C',0,false);

     $this->SetXY($x+108.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'Rate',1,1,'C',0,false);
     $this->SetXY($x+108.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'18.00%',1,1,'C',0,false);
     $this->SetXY($x+108.5, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,' ',1,1,'C',0,false);

     $this->SetXY($x+122.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'Amount',1,1,'C',0,false);
     $this->SetXY($x+122.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'0.00 ',1,1,'R',0,false);
     $this->SetXY($x+122.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,7,'0.00 ',1,1,'R',0,false);

     $this->SetXY($x+76.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'State Tax',1,1,'C',0,false);

     $this->SetXY($x+76.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'Rate',1,1,'C',0,false);
     $this->SetXY($x+76.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'9.00%',1,1,'C',0,false);
     $this->SetXY($x+76.5, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,' ',1,1,'C',0,false);

     $this->SetXY($x+90.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'Amount',1,1,'C',0,false);
     $this->SetXY($x+90.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,' 91.53 ',1,1,'R',0,false);
     $this->SetXY($x+90.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,7,' 91.53 ',1,1,'R',0,false);


     $this->SetXY($x+44.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'Central Tax',1,1,'C',0,false);

     $this->SetXY($x+44.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'Rate',1,1,'C',0,false);
     $this->SetXY($x+44.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,'9.00%',1,1,'C',0,false);
     $this->SetXY($x+44.5, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(14,7,' ',1,1,'C',0,false);

     $this->SetXY($x+58.5, $y+33);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'Amount',1,1,'C',0,false);
     $this->SetXY($x+58.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(18,7,'91.53 ',1,1,'R',0,false);
     $this->SetXY($x+58.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,7,'91.53 ',1,1,'R',0,false);

     $this->SetXY($x+18.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(26,14,' ',1,1,'C',0,false);   //
     $this->SetXY($x+18.5, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(26,7,'Taxable Value ',0,1,'C',0,false);

     $this->SetXY($x+18.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(26,7,'1030.00 ',1,1,'R',0,false);
     $this->SetXY($x+18.5, $y+47);
     $this->SetFont('Arial','B',9);
     $this->Cell(26,7,'1030.00 ',1,1,'R',0,false);


    
     $this->SetXY($x-3, $y+26);
     $this->SetFont('Arial','',9);
     $this->Cell(21.5,7,'HSN/SAC',0,1,'C',0,false);
     $this->SetXY($x-3, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(21.5,7,'39229000',1,1,'C',0,false);
     $this->SetXY($x-3, $y+47);
     $this->SetFont('Arial','',9);
     $this->Cell(21.5,7,' ',1,1,'C',0,false);

     $this->SetXY($x+143, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(52,55,' ',1,1,'R',0,false);  //

     $this->SetXY($x+143, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,55,' ',1,1,'L',0,false);  //

     $this->SetXY($x+143, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Transport',0,1,'L',0,false);
     $this->SetXY($x+172, $y+8);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,' 0.00 ',0,1,'R',0,false);

     $this->SetXY($x+143, $y+14);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Other',0,1,'L',0,false);
     $this->SetXY($x+172, $y+14);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,' 0 ',0,1,'R',0,false);

     $this->SetXY($x+143, $y+21);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Disc.Amt.',0,1,'L',0,false);
     $this->SetXY($x+172, $y+21);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,' 0.00 ',0,1,'R',0,false);

     $this->SetXY($x+143, $y+27);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Tax Amt',0,1,'L',0,false);
     $this->SetXY($x+172, $y+27);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,' 183.06 ',0,1,'R',0,false);

     $this->SetXY($x+143, $y+50);
     $this->SetFont('Arial','B',9);
     $this->Cell(52,13,' ',1,1,'R',0,false);   //

     $this->SetXY($x+143, $y+52);
     $this->SetFont('Arial','B',10);
     $this->Cell(29,10,' Net Amount ',0,1,'L',0,false);
     $this->SetXY($x+172, $y+52);
     $this->SetFont('Arial','B',10);
     $this->Cell(23,10,' 1200 ',0,1,'R',0,false);

     $this->Ln(-6);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(200,65,'  ',1,1,'C',0,false);   //  //
     

     $this->Ln(-9);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-70);
     $this->SetFont('Arial','B',9);
     $this->Cell(50,20,' ',0,1,'C',0,false); //
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-5);
     $this->SetFont('Arial','',9);
     $this->Cell(30,10,'Bank Details',0,1,'L',0,false); 

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+45, $y-10);
     $this->SetFont('Arial','B',9);
     $this->Cell(49,30,' ',0,1,'C',0,false);    //

     $this->SetXY($x+45, $y-7);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'ICICI BANK',0,1,'L',0,false);

     $this->SetXY($x+45, $y-3);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'Add.: VIMANNAGAR, PUNE',0,1,'L',0,false);

     $this->SetXY($x+45, $y+1);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'Acct. No.: 091505500492',0,1,'L',0,false);

     $this->SetXY($x+45, $y+5);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'IFSC No.: ICIC0000915',0,1,'L',0,false);
     
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+94, $y-20);
     $this->SetFont('Arial','B',9);
     $this->Cell(49,30,' ',0,1,'C',0,false);   //

     $this->SetXY($x+94, $y-17);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'KOTAK BANK ',0,1,'L',0,false);

     $this->SetXY($x+94, $y-13);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'Add.: BIBWEWADI, PUNE',0,1,'L',0,false);

     $this->SetXY($x+94, $y-9);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'Acct. No.: 3912034064',0,1,'L',0,false);

     $this->SetXY($x+94, $y-5);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'IFSC No.: KKBK0001770',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+143, $y-25);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,30,' ',0,1,'L',0,false);  //
     $this->SetXY($x+143, $y-22);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,15,'Adv. Received  ',0,1,'L',0,false); 

     $this->SetXY($x+143, $y-11);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,9,'Balance Amt.  ',0,1,'L',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+172, $y-19);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,25,' ',0,1,'L',0,false);
     $this->SetXY($x+172, $y-16);
     $this->SetFont('Arial','',9);
     $this->Cell(23,5,'1200.00 ',0,1,'R',0,false); 

     $this->SetXY($x+172, $y-8);
     $this->SetFont('Arial','',9);
     $this->Cell(23,5,'0.00 ',0,1,'R',0,false);
     
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+15);
     $this->SetFont('Arial','',9);
     $this->Cell(127,21,' ',0,1,'C',0,false); //

     $this->SetXY($x-5, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,6,' GST NO. :',0,1,'L',0,false);

     $this->SetXY($x+16, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(35,6,' 27ADHFS0274J1ZU ',0,1,'L',0,false);

     $this->SetXY($x+77, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,6,' PAN NO. :',0,1,'L',0,false);

     $this->SetXY($x+98, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(35,6,' ADHFS0274J ',0,1,'L',0,false);


     $this->SetXY($x-5, $y+15);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'INTEREST @18 % WILL BE CHARGED IF NOT PAID WITHIN 7 DAYS',0,1,'L',0,false);

     
     $this->SetXY($x-5, $y+18);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,"Shortage,Breakage,Damage etc. During Transit At Buyer's Risk.",0,1,'L',0,false);


     $this->SetXY($x-5, $y+26);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,' I / We hereby certify that my / our Registration Certificate under GST Act 2017 is in force on the date on',0,1,'L',0,false);

     $this->SetXY($x-5, $y+30);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'which the sale of goods specified in this tax invoice is made by me/us and that transaction of sale',0,1,'L',0,false);
     $this->SetXY($x-5, $y+34);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'covered by this tax invoice has been effected by me / us and it shall be accounted for in the turnover of',0,1,'L',0,false);

     $this->SetXY($x-5, $y+38);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'sales while filling of return and due tax if any payable on the sale has been paid or shall be paid.',0,1,'L',0,false);

     $this->SetXY($x-5, $y+42);
     $this->SetFont('Arial','',7.6);
     $this->Cell(127,4,'Subject to Pune jurisdiction. ',0,1,'L',0,false);



    
    // 
    //  



    $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+122, $y-15);
     $this->SetFont('Arial','B',13);
     $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

     $this->SetXY($x+122, $y+4);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'FOR   Signature Concepts LLP.',0,1,'C',0,false);

     $this->SetXY($x+122, $y+18);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

     $this->SetXY($x-4, $y+20);
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
   
        $pdf->Output();
   
    ?>   