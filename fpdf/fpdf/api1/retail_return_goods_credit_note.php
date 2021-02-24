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


    $db = mysqli_connect("192.168.0.101","stn","root","nks2");

       // include('../../database/dbconnection.php');

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,28,'  ',1,1,'C',0,false);   //

     $today = date("Y-m-d");

     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x+143, $y-32);
     $this->SetFont('arial','',8);
     $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
     $this->SetXY($x+146, $y-32);
     $this->SetFont('arial','',8);
     $this->Cell(18,3,'Original PDF',0,1,'L',0,false);
     $this->SetXY($x+167, $y-32);
     $this->SetFont('arial','',8);
     $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
     $this->SetXY($x+170, $y-32);
     $this->SetFont('arial','',8);
     $this->Cell(20,3,'Duplicate PDF',0,1,'L',0,false);

     $this->SetXY($x, $y+7);

     $this->Image('C:/Users/admin/Desktop/Work/LOGO-SIGNATURE_3.jpeg',57,17,12);

     // $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',57,17,12);

     //$this->Line(210,10,10,10);

    
    //  $this->SetFont('Arial','B',20);

    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

     

     $y = $this->GetY();
     $x = $this->GetX();

     
    //  $this->Ln(4);
    //   $y = $this->GetY();
    //  $x = $this->GetX();
     $this->SetXY($x-5, $y-34);
      $this->SetFont('Arial','B',12);
      $this->Cell(200,8,'Return Goods [Credit Note]',0,1,'C',0,false);  //
     
     $this->SetXY($x-5, $y-16);
     $this->SetFont('Arial','B',14);
     $this->Cell(200,-15,'Signature Concepts LLP ',0,1,'C',0,false);
    
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+19, $y+20);
     $this->SetFont('Arial','',8);
     $this->Cell(150,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);
     $this->SetXY($x+45, $y+23.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);
     $this->SetXY($x+15, $y+26.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Phone No : 7757033204',0,1,'C',0,false);
     $this->SetXY($x+62, $y+26.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);


     $edit_id = 1;

    $sql_charges = "SELECT * ,m.first_name ,m.last_name
                    FROM retail_return_goods AS rrg, retail_return_goods_items AS rrgi, mstr_customer AS m
                    WHERE rrg.id_pk = rrgi.rrg_id_fk AND rrgi.id_pk = '$edit_id'";

        $result_charges = mysqli_query($db, $sql_charges);
        $row = mysqli_fetch_row($result_charges);


    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-6.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,26,'  ',1,1,'C',0,false);   //

    $this->SetXY($x-5, $y-6.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'  Customer   :',0,1,'L',0,false);  
    $this->SetXY($x+19, $y-6.5);
    $this->SetFont('Arial','',9);
    $this->Cell(40,5,$row['92'].' '.$row['93'],0,1,'L',0,false);  
    
    $this->SetXY($x+125, $y-6.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'C.No.  :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y-6.5);
    $this->SetFont('Arial','',9);
    $this->Cell(15,5,$row['3'],0,1,'L',0,false);                       // credit no - $row['']


    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'  Phone No.  :',0,1,'L',0,false); 
    $this->SetXY($x+19, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(40,5,$row['5'],0,1,'L',0,false); 
    
    $this->SetXY($x+125, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'Date    :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(15,5,$row['10'],0,1,'L',0,false);
    
    
    $this->SetXY($x-5, $y+7);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'  Address     :',0,1,'L',0,false); 
    $this->SetXY($x+19, $y+8);
    $this->SetFont('Arial','',9);
    $this->Cell(40,5,$row['6'],0,1,'L',0,false);
    // $this->SetXY($x+17, $y+10.5);
    // $this->SetFont('Arial','',9);
    // $this->Cell(40,7,'  WANAWADI PUNE',0,1,'L',0,false);

    $this->SetXY($x+125, $y+7);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'PINo.   :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y+7);
    $this->SetFont('Arial','',9);
    $this->Cell(15,5,$row['1'],0,1,'L',0,false);


    $this->Ln(2);
    $y = $this->GetY();
    $x = $this->GetX();
    // $this->SetXY($x-5, $y+5.5);
    // $this->SetFont('Arial','B',15);
    // $this->Cell(200,7,'  ',1,1,'C',0,false);   //

    // $this->SetXY($x-5, $y+12.5);
    // $this->SetFont('Arial','B',15);
    // $this->Cell(200,11,'  ',1,1,'C',0,false);   //

    // $this->SetXY($x-5, $y+23.5);
    // $this->SetFont('Arial','B',15);
    // $this->Cell(200,6,'  ',1,1,'C',0,false);   //

    $this->SetXY($x-5, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(12,7,'Sr.No',1,1,'C',0,false);

    $this->SetXY($x+7, $y+5.5);    
    $this->SetFont('Arial','B',9);
    $this->Cell(57,7,'Particulars',1,1,'C',0,false);

    $this->SetXY($x+64, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(15,7,'',1,1,'L',0,false); //
    $this->SetXY($x+64, $y+4.5);
    $this->SetFont('Arial','B',8);
    $this->Cell(15,6,' No.of ',0,1,'C',0,false);
    $this->SetXY($x+64, $y+7.5);
    $this->SetFont('Arial','B',8);
    $this->Cell(15,6,' Goods ',0,1,'C',0,false);
    
    $this->SetXY($x+79, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(17,7,'',1,1,'L',0,false); //
    $this->SetXY($x+79, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(17,8,'HSN',0,1,'C',0,false);
 
    $this->SetXY($x+96, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(18,7,'GST Rate',1,1,'C',0,false);

    $this->SetXY($x+114, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(12,7,'Qty',1,1,'C',0,false);
   
    $this->SetXY($x+126, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(14,7,'Rate',1,1,'C',0,false);
    
    
    $this->SetXY($x+140, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(13,7,'Total',1,1,'C',0,false);

    $this->SetXY($x+153, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(17,7,'Disc. %',1,1,'C',0,false);
    
    $this->SetXY($x+170, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,7,' Amount  ',1,1,'C',0,false);
    

// -----------------------------

$edit_id = 3;

            $sql_charges2 = " SELECT * 
                                    FROM grn_items AS g, grn AS gn
                                    WHERE grn_id_pk AND id_pk  = '$edit_id'";

            $result_charges2 = mysqli_query($db, $sql_charges2);
            $row2 = mysqli_fetch_row($result_charges2);



    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(12,10,$row2['0'],1,1,'C',0,false);

    $this->SetXY($x+7, $y);    
    $this->SetFont('Arial','',9);
    $this->Cell(57,10,'',1,1,'L',0,false); //
    $this->SetXY($x+7, $y);
    $this->SetFont('Arial','',8);
    $this->Cell(57,5,$row2['3'],0,1,'L',0,false);
    // $this->SetXY($x+7, $y+3.5);
    // $this->SetFont('Arial','',8);
    // $this->Cell(20,5,' ASSY-NA',0,1,'L',0,false);

    $this->SetXY($x+64, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(15,10,'1',1,1,'C',0,false);

    $this->SetXY($x+79, $y);
    $this->SetFont('Arial','',8);
    $this->Cell(17,10,'45',1,1,'C',0,false);

    $this->SetXY($x+96, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(18,10,'0.00 ',1,1,'R',0,false);

    $this->SetXY($x+114, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(12,10,$row2['5'],1,1,'C',0,false);

    $this->SetXY($x+126, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(14,10,$row2['6'],1,1,'R',0,false);

    $this->SetXY($x+140, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(13,10,$row2['7'],1,1,'C',0,false);

    $this->SetXY($x+153, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(17,10,'12 %',1,1,'C',0,false);

    $this->SetXY($x+170, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(25,10,'2530.00 ',1,1,'R',0,false);


   $this->Ln(1.5);
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-1.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,35,'  ',1,1,'C',0,false);   //


    $this->SetXY($x-1, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Remark     : ',0,1,'L',0,false);
    $this->SetXY($x+19, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(25,8,$row2['23'],0,1,'L',0,false);

    $this->SetXY($x-1, $y+8);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,6,'In Words   : ',0,1,'L',0,false);
    $this->SetXY($x+19, $y+8);
    $this->SetFont('Arial','',9);
    $this->Cell(40,6,convertNum($row2['29']).' Only',0,1,'L',0,false);

    // $this->SetXY($x-1, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(20,8,'GST No.  :',0,1,'L',0,false);
    // $this->SetXY($x+27, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(20,8,'27ADHFS0274J1ZU',0,1,'R',0,false);
    // $this->SetXY($x+55, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(20,8,'PAN NO. : ',0,1,'L',0,false);
    // $this->SetXY($x+75, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(20,8,'ADHFS0274J',0,1,'R',0,false);


    
    $this->SetXY($x+141, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Process Amt   ',0,1,'L',0,false);
    $this->SetXY($x+174, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['10'],0,1,'R',0,false);
    $this->SetXY($x+141, $y+5);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Trans Amt     ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+5);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['26'],0,1,'R',0,false);
    $this->SetXY($x+141, $y+10);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Discount    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'962.00',0,1,'R',0,false);
    $this->SetXY($x+141, $y+15);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Tax    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+15);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'282.28',0,1,'R',0,false);
    $this->SetXY($x+141, $y+20);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Other    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+20);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['28'],0,1,'R',0,false);
    $this->SetXY($x+141, $y+25);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Return Amt    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+25);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'0.00',0,1,'R',0,false);

    $this->SetXY($x+141, $y+33);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Total    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+33);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,$row2['10'],0,1,'R',0,false);

    // $this->SetXY($x+133, $y+45);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'FOR  Signature Concepts LLP.',0,1,'C',0,false);

    // $this->SetXY($x+135, $y+54);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

    // $this->SetXY($x-3, $y+54);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'Receiver Sign.',0,1,'L',0,false);

    }

    function Footer()
    {
   
          
    }
   
   }
  
    $pdf= new this();
  //  $pdf = new PDF('L','mm',array(150,174));
    

    $pdf->AliasNbPages();
 
    $pdf->SetAutoPageBreak(true,130);

   
    $pdf->AddPage();
         $pdf->Ln();
   
        $pdf->Output();
   
    ?>   