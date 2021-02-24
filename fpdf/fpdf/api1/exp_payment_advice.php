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
     $vendor_id = $_GET['id'];
     $pa_no=$_GET['paymentno'];

        $sql = "SELECT  epa.padv_no, epa.pay_date , mv.vendor_id_pk , mv.saturation, mv.first_name, mv.last_name,
         mv.bill_address_line1, mv.bill_address_line2, mv.bill_address_line3
        FROM exp_pay_advice epa, mstr_vendor mv
        WHERE mv.vendor_id_pk = '$vendor_id'and epa.pa_id_pk = '$pa_no' ";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
  
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,28,'  ',1,1,'C',0,false);  // CELL 1

     $today = date("Y-m-d");

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-7, $y-27);
     $this->SetFont('Arial','B',10);
     $this->Cell(200,8,'PAYMENT ADVICE',0,1,'C',0,false);
    //  $this->SetXY($x, $y+10);
    //  $this->Image('C:\Users\admin\Desktop\Work\signature_2.jpg',65,16,15);
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-10, $y+10);
     $this->SetFont('Arial','B',13);
     $this->Cell(210,-15,'Signature Concepts LLP',0,1,'C',0,false);
  
     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

    
     $this->SetXY($x-5, $y+4);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

     $this->SetXY($x+72, $y+14);
     $this->SetFont('Arial','',8);
     $this->Cell(40,7,'Phone No : 7757033204',0,1,'C',0,false);

     $this->SetXY($x-5, $y+19);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,18,'  ',1,1,'C',0,false);  // CELL 2

     $this->SetXY($x-5, $y+19);
     $this->SetFont('Arial','B',15);
     $this->Cell(100,22,'  ',0,1,'C',0,false);  // CELL 3

     $this->SetXY($x+20, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(15,8,' No ',0,1,'L',0,false); 
     $this->SetXY($x+30, $y+19);
     $this->SetFont('Arial','',9);
     $this->Cell(15,8, $row['0'],0,1,'L',0,false); 

     $this->SetXY($x+20, $y+24);
     $this->SetFont('Arial','B',9);
     $this->Cell(15,8,' Date ',0,1,'L',0,false); 
     $this->SetXY($x+30, $y+24);
     $this->SetFont('Arial','',9);
     $this->Cell(15,8,$row['1'],0,1,'L',0,false); 

     $this->SetXY($x+100, $y+19);
     $this->SetFont('Arial','B',15);
     $this->Cell(95,22,'  ',0,1,'C',0,false);  // CELL 4
  

     $this->SetXY($x+96, $y+20);
     $this->SetFont('Arial','B',8);
     $this->Cell(95,5,$row['3'].$row['4'].$row['5'],0,1,'L',0,false);

     $this->SetXY($x+99, $y+24);
     $this->SetFont('Arial','',8);
     $this->Cell(95,5,$row['6'].',',0,1,'L',0,false);

     $this->SetXY($x+99, $y+28);
     $this->SetFont('Arial','',8);
     $this->Cell(95,5,$row['7'].',',0,1,'L',0,false);
     $this->SetXY($x+99, $y+32);
     $this->SetFont('Arial','',8);
     $this->Cell(95,5,$row['8'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+37);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,22,'  ',1,1,'C',0,false);  // CELL 5

     $this->SetXY($x+3, $y+37);
     $this->SetFont('Arial','',9);
     $this->Cell(15,8,' Dear Sir,  ',0,1,'L',0,false); 

     $this->SetXY($x+14, $y+42);
     $this->SetFont('Arial','',9);
     $this->Cell(15,8,'Enclosed here with please find our cheque/D.D.No  ',0,1,'L',0,false);

     $this->SetXY($x+14, $y+46);
     $this->SetFont('Arial','',9);
     $this->Cell(15,8,'For Rs. ',0,1,'L',0,false);

     $this->SetXY($x+4, $y+52);
     $this->SetFont('Arial','',9);
     $this->Cell(15,8,'Bank on ',0,1,'L',0,false);

     $this->SetXY($x+65, $y+52);
     $this->SetFont('Arial','',9);
     $this->Cell(35,8,'in Full settlement of your Bills as detailed below. ',0,1,'L',0,false);

  $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(200,15,' ',1,1,'L',0,false); // CELL 6

    //  $this->SetXY($x-5, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(15,20,' ',1,1,'L',0,false); // CELL 6
     $this->SetXY($x-5, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(15,5,'Bill No.',0,1,'C',0,false); 


     $this->SetXY($x+10, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(19,15,' ',1,1,'L',0,false); // CELL 6
     $this->SetXY($x+10, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(19,5,'Bill Date',0,1,'C',0,false); 

     $this->SetXY($x+29, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(20,15,' ',1,1,'L',0,false); // CELL 6
     $this->SetXY($x+29, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(20,5,'Bill',0,1,'C',0,false);
     $this->SetXY($x+29, $y+3);
     $this->SetFont('Arial','',9);
     $this->Cell(20,5,'Amount',0,1,'C',0,false);
     
    //  $this->SetXY($x+49, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(20,15,' ',1,1,'L',0,false); // CELL 6
    //  $this->SetXY($x+49, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(20,5,'Previous',0,1,'C',0,false); 
    //  $this->SetXY($x+49, $y+3);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(20,5,'Paid',0,1,'C',0,false); 
 
    //  $this->SetXY($x+69, $y-1);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(30,5,'DEDUCTIONS',1,1,'C',0,false); // CELL 7

    //  $this->SetXY($x+69, $y+4);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(30,5,'Goods Return Memo',1,1,'C',0,false); // CELL 8

    //  $this->SetXY($x+69, $y+9);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(30,5,' ',1,1,'L',0,false);  // CELL 9
    //  $this->SetXY($x+69, $y+9);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(15,5,'No',0,1,'C',0,false);  
    //  $this->SetXY($x+69, $y+9);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(15,5,'',1,1,'C',0,false);  
 
    //  $this->SetXY($x+69, $y+9);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(15,13,' ',1,1,'L',0,false);  // CELL 9

    //  $this->SetXY($x+84, $y+9);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(15,5,'Amount',0,1,'C',0,false);

    //  $this->SetXY($x+54, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(22,15,' ',1,1,'L',0,false); // CELL 10
     $this->SetXY($x+54, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(19,5,'Addition',0,1,'C',0,false); 
    //  $this->SetXY($x+54, $y+3);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(19,5,'Dr.Note',0,1,'C',0,false); 

     $this->SetXY($x+75, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(25,15,' ',1,1,'L',0,false); // CELL 11
     $this->SetXY($x+77, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(24,5,'Deduction',0,1,'C',0,false); 
    //  $this->SetXY($x+77, $y+3);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(24,5,'Note',0,1,'C',0,false); 
  
     $this->SetXY($x+100, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(40,15,' ',1,0,'L',0,false); // CELL 12
     $this->SetXY($x+105, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(20,5,'Final Payment',0,1,'C',0,false);

    //  $this->SetXY($x+153, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(20,15,' ',1,1,'L',0,false); // CELL 11
    //  $this->SetXY($x+155, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(20,5,'Discount',0,1,'C',0,false); 
    //  $this->SetXY($x+153, $y+3);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(20,5,'Other Add.',0,1,'C',0,false); 
    //  $this->SetXY($x+153, $y+7);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(20,5,'Ded.',0,1,'C',0,false);
   
    //  $this->SetXY($x+173, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(22,15,' ',1,1,'L',0,false); // CELL 12
     $this->SetXY($x+145, $y-1);
     $this->SetFont('Arial','',9);
     $this->Cell(30,5,'Net Amount To Pay',0,1,'C',0,false); 
     $this->SetXY($x+140, $y+3);
     $this->SetFont('Arial','',9);
     $this->Cell(40,5,'',0,1,'C',0,false); 
     $this->SetXY($x+135, $y+7);
     $this->SetFont('Arial','',9);
     $this->Cell(40,5,'',0,1,'C',0,false); 
 
     $sql_charges2 ="SELECT *
     FROM exp_payadvice_bill_detail_table
     WHERE pay_advice_id_fk = '$pa_no' ";
     
     $result_charges2 = mysqli_query($db, $sql_charges2);
     $count = mysqli_num_rows($result_charges2);
     while($row2 =mysqli_fetch_row($result_charges2))
     {  
         
        $this-> Ln(0);
     $y = $this->GetY();
     $x = $this->GetX();

          $this->SetXY($x-5, $y+2);
     $this->SetFont('Arial','',8);
     $this->Cell(15,10,$row2[3],1,1,'C',0,false);
    //  $this->SetXY($x-5, $y+8);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(15,4,'121',0,1,'C',0,false); 
     $this->SetXY($x+10, $y+2);
     $this->SetFont('Arial','',8);
     $this->Cell(19,10,$row2[4],1,1,'C',0,false);

     $this->SetXY($x+29, $y+2);
     $this->SetFont('Arial','',8);
     $this->Cell(20,10,$row2[5],1,1,'C',0,false);

    //  $this->SetXY($x+49, $y+2);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(20,10,'',1,1,'R',0,false); 

    //  $this->SetXY($x+69, $y+2);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(15,10,'',1,1,'C',0,false);  

    //  $this->SetXY($x+84, $y+2);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(15,10,'',1,1,'C',0,false);  

     $this->SetXY($x+49, $y+2);
     $this->SetFont('Arial','',8);
     $this->Cell(26,10,$row2[6],1,1,'C',0,false); 

    $this->SetXY($x+75, $y+2);
     $this->SetFont('Arial','',8);
     $this->Cell(25,10,$row2[7],1,1,'C',0,false);

     $this->SetXY($x+100, $y+2);
     $this->SetFont('Arial','',8);
     $this->Cell(40,10,$row2[8],1,1,'C',0,false);

     $this->SetXY($x+140, $y+2);
     $this->SetFont('Arial','',8);
     $this->Cell(55,10,$row2[9],1,1,'C',0,false);

     $this->SetXY($x+218, $y+0);
     $this->SetFont('Arial','',8);
     $this->Cell(11,10,'',1,1,'R',0,false);  

    }
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x+126, $y+3);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'FOR   Signature Concepts LLP.',0,1,'C',0,false);

     $this->SetXY($x+126, $y+12);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'Accounts Manager',0,1,'C',0,false);

     $this->SetXY($x-5, $y+3);
     $this->SetFont('Arial','B',8);
     $this->Cell(15,5,'  N. B. :',0,1,'L',0,false);

     $this->SetXY($x+6, $y+3);
     $this->SetFont('Arial','',8);
     $this->Cell(75,5,'Kindly credit the same to our A/C under advice to us',0,1,'L',0,false);
   

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

    