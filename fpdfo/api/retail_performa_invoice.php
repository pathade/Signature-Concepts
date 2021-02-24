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
        $edit_id = $_GET['id'];


      $sql_charges = "SELECT rp.*, mrc.retail_cust_idpk, mrc.retail_cust_name

        FROM retail_proforma rp, mstr_retail_customer mrc
       
        WHERE id_pk ='$edit_id' and rp.customer = mrc.retail_cust_idpk";
        
        
        $result_charges = mysqli_query($db, $sql_charges);
        $row = mysqli_fetch_row($result_charges);

     $y = $this->GetY();
     $x = $this->GetX();

                          $this->SetXY($x+147, $y);
                      $this->SetFont('arial','',8);
                      $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
                      $this->SetXY($x+150, $y);
                      $this->SetFont('arial','',8);
                      $this->Cell(18,3,'Original PDF',0,1,'L',0,false);
                      $this->SetXY($x+170, $y);
                      $this->SetFont('arial','',8);
                      $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
                      $this->SetXY($x+173, $y);
                      $this->SetFont('arial','',8);
                      $this->Cell(20,3,'Duplicate PDF',0,1,'L',0,false);

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,28,'  ',1,1,'C',0,false);

     $today = date("Y-m-d");

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x, $y+7);
     $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',33,18,18);

     //$this->Line(210,10,10,10);

    
    //  $this->SetFont('Arial','B',20);

    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

     

    //  $y = $this->GetY();
    //  $x = $this->GetX();

     
    //  $this->Ln(4);
    //   $y = $this->GetY();
    //  $x = $this->GetX();
    
// $y = $this->GetY();
// $x = $this->GetX();

// $this->SetXY($x-5, $y+10);
// $this->SetFont('Arial','B',15);
// $this->Cell(200,28,'  ',1,1,'C',0,false); 

$today = date("Y-m-d");

$this->Ln(19);
$y = $this->GetY();
$x = $this->GetX();

$this->SetXY($x-2, $y-54);
$this->SetFont('Arial','B',11);
$this->Cell(185,8,'Proforma Invoice',0,1,'C',0,false);
// $this->SetXY($x, $y+7);
// $this->Image('C:\Users\admin\Desktop\Work\signature_2.jpg',40,22,20);

//$this->Line(210,10,10,10);

$this->SetXY($x+18, $y-35.5);
$this->SetFont('Arial','B',15);
$this->Cell(150,-15,'Signature Concepts LLP',0,1,'C',0,false);

$this->SetXY($x+48, $y-45);
$this->SetFont('Arial','',8);
$this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'L',0,false);

$this->SetXY($x+48, $y-42);
$this->SetFont('Arial','',8);
$this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'L',0,false);

$this->SetXY($x+53, $y-34);
$this->SetFont('Arial','',8);
$this->Cell(200,10,'Phone No : 7757033204',0,1,'L',0,false);

$this->SetXY($x+87, $y-34);
$this->SetFont('Arial','',8);
$this->Cell(200,10,'Email ID : signatureconcepts.pune@gmail.com',0,1,'L',0,false);


// $this->Ln(10);
$y = $this->GetY();
$x = $this->GetX();
     $this->SetXY($x-5, $y-2);
     $this->SetFont('Arial','B',15);
     $this->Cell(140,30,'  ',1,1,'C',0,false);

     $this->SetXY($x-5, $y+1);
     $this->SetFont('Arial','B',8);
     $this->Cell(18,5,' Customer :       '.$row['35'],0,1,'L',0,false);

     $this->SetXY($x+13, $y+1);
     $this->SetFont('Arial','B',8);
     $this->Cell(90,5,'   '.$row['27'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+6);
     $this->SetFont('Arial','B',8);
     $this->Cell(18,5,' Address    :',0,1,'L',0,false);

     $this->SetXY($x+16, $y+6);
     $this->SetFont('Arial','',8);
     $this->Cell(120,5,$row['5'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+15);
     $this->SetFont('Arial','B',8);
     $this->Cell(20,5,' Mobile no  :',0,1,'L',0,false);

     $this->SetXY($x+16, $y+15);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5, $row['4'] ,0,1,'L',0,false);

     $this->SetXY($x-5, $y+20);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,7,' GST NO.   : ',0,1,'L',0,false);

     $this->SetXY($x+16, $y+20);
     $this->SetFont('Arial','',8);
     $this->Cell(120,7,$row['6'],0,1,'L',0,false);


     $this->SetXY($x+135, $y-2);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,30,' ',1,1,'L',0,false);

     $this->SetXY($x+135, $y+1);
     $this->SetFont('Arial','B',8);
     $this->Cell(18,5,'   No.           : ',0,1,'L',0,false);

     $this->SetXY($x+153, $y+1);
     $this->SetFont('Arial','',9);
     $this->Cell(40,5,$row['0'],0,1,'L',0,false);
     
     $this->SetXY($x+135, $y+6);
     $this->SetFont('Arial','B',8);
     $this->Cell(18,5,'  RPO Date : ',0,1,'L',0,false);

     $this->SetXY($x+153, $y+6);
     $this->SetFont('Arial','',9);
     $this->Cell(60,5,$row['9'],0,1,'L',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y+9);
    //  $this->SetFont('Arial','B',15);
    //  $this->Cell(200,65,'  ',1,1,'C',0,false);

    $this->Ln(8);
    $y = $this->GetY();
    $x = $this->GetX();
    // $this->SetXY($x-5, $y+9);
    // $this->SetFont('Arial','B',15);
    // $this->Cell(200,20,'  ',1,1,'C',0,false);   // 

    // $this->SetXY($x-5, $y+9);
    //       $this->SetFont('Arial','B',9); 
    //       $this->Cell(200,8,'  ',1,1,'C',0,false);   //

          $this->SetXY($x-5, $y+9);
               $this->SetFont('Arial','B',9);
               $this->Cell(10,6,'No.',1,1,'C',0,false);
   
               $this->SetXY($x+5, $y+9);
                  $this->SetFont('Arial','B',9);
                  $this->Cell(56,6,'Description Of Goods',1,1,'C',0,false);

   

    $this->SetXY($x+61, $y+9);
             $this->SetFont('Arial','B',8);
             $this->Cell(21,6,'HSN/SAC',1,1,'C',0,false);

       $this->SetXY($x+82, $y+9);
                  $this->SetFont('Arial','B',9);
                  $this->Cell(17,6,'GST Rate',1,1,'C',0,false);

         $this->SetXY($x+99, $y+9);
                       $this->SetFont('Arial','B',9);
                       $this->Cell(17,6,'Quantity',1,1,'C',0,false);

            $this->SetXY($x+116, $y+9);
                  $this->SetFont('Arial','B',9);
                   $this->Cell(19,6,'Rate',1,1,'C',0,false);                                           
             $this->SetXY($x+135, $y+9);
                       $this->SetFont('Arial','B',9);
                      $this->Cell(30,6,'Disc. %',1,1,'C',0,false);
                                       
                    $this->SetXY($x+165, $y+9);
                           $this->SetFont('Arial','B',9);
                           $this->Cell(30,6,'Amount',1,1,'C',0,false);


    $sql_charges1 ="SELECT rp.*, mi.item_id_pk, mi.nks_code,mi.design_code, mi.size 
    FROM retail_proforma_items rp, mstr_item mi
    WHERE rp.rpi_id_fk = '$edit_id' and rp.item_id_fk = mi.item_id_pk ";
    $grand_t = 0;
    $sr_no1 = 1;
    
    $result_charges1 = mysqli_query($db, $sql_charges1);
    while($row1 =mysqli_fetch_row($result_charges1))
    {
        $grand_t = $grand_t + $row1['3'];
        $item_id_fk123 = $row1['2'];
        
        $d123 = "SELECT * FROM mstr_item WHERE item_id_pk='$item_id_fk123'";
        $result_charges123 = mysqli_query($db, $d123);
        while($r123 = mysqli_fetch_array($result_charges123))
        {
            $uom123 = $r123['uom'];
            $gst_group123 = $r123['gst_group'];
            $hsn123 = $r123['hsn'];
            
        }
       $y = $this->GetY();
       $x = $this->GetX();
   
       $this->SetXY($x+5, $y);
       $this->SetFont('Arial','',8);
       $this->Cell(56,6,'',1,1,'L',0,false);    ///
   
       $this->SetXY($x+99, $y);
       $this->SetFont('Arial','B',9);
       $this->Cell(17,6,'    ',1,1,'L',0,false);    ///
   
   
       $this->SetXY($x-5, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(10,6,$sr_no1++,1,1,'C',0,false);
   
              $this->SetXY($x+5, $y+1);
                 $this->SetFont('Arial','',8);
                 $this->Cell(56,6,$row1['17']."-".$row1['18']."-".$row1['19'],0,1,'L',0,false);
                //  $this->SetXY($x+5, $y+5);
                //  $this->SetFont('Arial','',8);
                //  $this->Cell(56,4,'Suppling load & Size ',0,1,'L',0,false);
   
               //   $this->SetXY($x+55, $y);
               //        $this->SetFont('Arial','',9);
               //        $this->Cell(17,12,' ',1,1,'L',0,false);
   
                      $this->SetXY($x+61, $y);
                           $this->SetFont('Arial','',8);
                           $this->Cell(21,6,$hsn123,1,1,'C',0,false);
   
                           $this->SetXY($x+82, $y);
                                $this->SetFont('Arial','',8);
                                $this->Cell(17,6,$gst_group123,1,1,'C',0,false);
   
                                $this->SetXY($x+97, $y+3);
                                     $this->SetFont('Arial','B',9);
                                     $this->Cell(17,2,'    '.$row1['3'] ,0,1,'L',0,false);
                                     $this->SetXY($x+100, $y+3);
                                     $this->SetFont('Arial','',8);
                                     $this->Cell(17,2,$uom123,0,1,'R',0,false);
   
                        $this->SetXY($x+116, $y);
                               $this->SetFont('Arial','',8);
                               $this->Cell(19,6,$row1['6'],1,1,'R',0,false);
   
                               $this->SetXY($x+135, $y);
                                    $this->SetFont('Arial','',8);
                                    $this->Cell(30,6, $row1['7'],1,1,'R',0,false);
   
                                    $this->SetXY($x+165, $y);
                                         $this->SetFont('Arial','',9);
                                         $this->Cell(30,6,$row1['9'],1,1,'R',0,false);

    }
    $this->Ln(5);
      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x-5, $y-5);
      $this->SetFont('Arial','B',9);
      $this->Cell(177,7,'',1,1,'R',0,false);

      $this->SetXY($x+75, $y-4);
      $this->SetFont('Arial','B',9);
      $this->Cell(20,5,'Grand Total',0,1,'R',0,false);

      $this->SetXY($x+95, $y-4);
      $this->SetFont('Arial','B',9);
      $this->Cell(20,5,$grand_t,0,1,'C',0,false);

     $this->SetXY($x+172, $y-5);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,7,$row['13'],1,1,'R',0,false);


     $this->SetXY($x-5, $y+2);
     $this->SetFont('Arial','B',9);
     $this->Cell(148,53,' ',1,1,'R',0,false); //

     $this->SetXY($x-5, $y+1);
     $this->SetFont('Arial','B',9);
     $this->Cell(148,10,'In Words :   ',0,1,'L',0,false);
     $this->SetXY($x+16, $y+1);
     $this->SetFont('Arial','',9);
     $this->Cell(122,10,'Rs.' .convertNum($row['13']),0,1,'L',0,false);
     

     $this->SetXY($x-4, $y+12);
     $this->SetFont('Arial','B',9);
     $this->Cell(146,37,' ',1,1,'R',0,false);//
     $this->SetXY($x-4, $y+12);
     $this->SetFont('Arial','B',9);
     $this->Cell(50,10,' GST  Summary :   ',0,1,'L',0,false);
    //  $this->SetXY($x-3, $y+26);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(143.5,28,' ',1,1,'R',0,false);  //

     $this->SetXY($x-3, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(143.5,13,'',1,1,'C',0,false);  //

     $this->SetXY($x+108.5, $y+21);                        //
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'Interstate Tax',1,1,'C',0,false);

     $this->SetXY($x+108.5, $y+28);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,'Rate',1,1,'C',0,false);
     $this->SetXY($x+108.5, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,'0%',1,1,'C',0,false);
     $this->SetXY($x+108.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,' ',1,1,'C',0,false);

     $this->SetXY($x+122.5, $y+28);
     $this->SetFont('Arial','',9);
     $this->Cell(18,6,'Amount',1,1,'C',0,false);
     $this->SetXY($x+122.5, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(18,6,'0.00 ',1,1,'R',0,false);
     $this->SetXY($x+122.5, $y+40);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,6,$row['17'] ,1,1,'R',0,false);

     $this->SetXY($x+76.5, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'State Tax',1,1,'C',0,false);                //
     $this->SetXY($x+76.5, $y+28);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,'Rate',1,1,'C',0,false);
     $this->SetXY($x+76.5, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,'0%',1,1,'C',0,false);
     $this->SetXY($x+76.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,' ',1,1,'C',0,false);

     $this->SetXY($x+90.5, $y+28);
     $this->SetFont('Arial','',9);
     $this->Cell(18,6,'Amount',1,1,'C',0,false);
     $this->SetXY($x+90.5, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(18,6,' 0 ',1,1,'R',0,false);
     $this->SetXY($x+90.5, $y+40);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,6,'  0 ',1,1,'R',0,false);

     $this->SetXY($x+44.5, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(32,7,'Central Tax',1,1,'C',0,false);                  //
     $this->SetXY($x+44.5, $y+28);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,'Rate',1,1,'C',0,false);
     $this->SetXY($x+44.5, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,'0%',1,1,'C',0,false);
     $this->SetXY($x+44.5, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(14,6,' ',1,1,'C',0,false);

     $this->SetXY($x+58.5, $y+28);
     $this->SetFont('Arial','',9);
     $this->Cell(18,6,'Amount',1,1,'C',0,false);
     $this->SetXY($x+58.5, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(18,6,'0 ',1,1,'R',0,false);
     $this->SetXY($x+58.5, $y+40);
     $this->SetFont('Arial','B',9);
     $this->Cell(18,6,' 0 ',1,1,'R',0,false);

     $this->SetXY($x+18.5, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(26,13,' ',1,1,'C',0,false);   //
     $this->SetXY($x+18.5, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(26,7,'Taxable Value ',0,1,'C',0,false);
     $this->SetXY($x+18.5, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(26,6,$row['13'],1,1,'R',0,false);
     $this->SetXY($x+18.5, $y+40);
     $this->SetFont('Arial','B',9);
     $this->Cell(26,6,$row['13'],1,1,'R',0,false);

    $this->SetXY($x-3, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(21.5,13,' ',1,1,'C',0,false);   //
     $this->SetXY($x-3, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(21.5,7,'HSN/SAC',0,1,'C',0,false);
     $this->SetXY($x-3, $y+34);
     $this->SetFont('Arial','',9);
     $this->Cell(21.5,6,'6907',1,1,'C',0,false);
     $this->SetXY($x-3, $y+40);
     $this->SetFont('Arial','',9);
     $this->Cell(21.5,6,'7',1,1,'C',0,false);

                         //                  ------------------------

    //  $this->SetXY($x-3, $y+40);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(21.5,6,' ',1,1,'C',0,false);  //

     $this->SetXY($x+143, $y+2);
     $this->SetFont('Arial','B',9);
     $this->Cell(52,53,' ',1,1,'R',0,false);  //

     $this->SetXY($x+143, $y+2);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,53,' ',1,1,'L',0,false);  //

     $this->SetXY($x+143, $y+4);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Transport',0,1,'L',0,false);
     $this->SetXY($x+172, $y+4);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,' 0.00 ',0,1,'R',0,false);

     $this->SetXY($x+143, $y+12);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Other(+/-)',0,1,'L',0,false);
     $this->SetXY($x+172, $y+12);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,$row['16'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Disc.Amt.',0,1,'L',0,false);
     $this->SetXY($x+172, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,$row['15'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+25);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,10,' Tax Amt',0,1,'L',0,false);
     $this->SetXY($x+172, $y+25);
     $this->SetFont('Arial','B',9);
     $this->Cell(23,8,$row['17'],0,1,'R',0,false);

     $this->SetXY($x+143, $y+48);
     $this->SetFont('Arial','B',9);
     $this->Cell(52,7,' ',1,1,'R',0,false);   //

     $this->SetXY($x+143, $y+47);
     $this->SetFont('Arial','B',10);
     $this->Cell(29,10,' Net Amount ',0,1,'L',0,false);
     $this->SetXY($x+172, $y+47);
     $this->SetFont('Arial','B',10);
     $this->Cell(23,10,$row['18'],0,1,'R',0,false);

     $this->Ln(-9);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(200,70,'  ',1,1,'C',0,false);   //  //
   
     $this->Ln(-5);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-70);
     $this->SetFont('Arial','B',9);
     $this->Cell(50,20,' ',0,1,'C',0,false); //

      

     $this->Ln(4);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+20, $y-17);
     $this->SetFont('Arial','B',9);
     $this->Cell(49,20,' ',0,1,'L',0,false);    //box2

     $this->SetXY($x-5, $y-17);
     $this->SetFont('Arial','',9);
     $this->Cell(30,5,'Bank Details',0,1,'L',0,false); 

    $this->SetXY($x+20, $y-17);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'KOTAK MAHINDRA BANK',0,1,'L',0,false);
    
    $this->SetXY($x+20, $y-13);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);
    
    $this->SetXY($x+20, $y-9);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'A/C NO: 3912034064',0,1,'L',0,false);

    $this->SetXY($x+20, $y-5);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'BRANCH: BIBWEWADI, PUNE',0,1,'L',0,false);

    $this->SetXY($x+20, $y-1);
    $this->SetFont('Arial','',8);
    $this->Cell(49,5,'IFSC: KKBK0001770',0,1,'L',0,false);

    $this->SetXY($x+50, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(49,20,' ',0,1,'L',0,false);    //box1

     $this->SetXY($x+80, $y-17);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'HDFC BANK',0,1,'L',0,false);             ///

     $this->SetXY($x+80, $y-13);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

     $this->SetXY($x+80, $y-9);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'A/C NO: 50200052017929',0,1,'L',0,false);

     $this->SetXY($x+80, $y-5);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'BRANCH: , PUNE',0,1,'L',0,false);
     
     $this->SetXY($x+80, $y-1);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'IFSC: HDFC0005718',0,1,'L',0,false);

 
  
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+12);
     $this->SetFont('Arial','',9);
     $this->Cell(127,21,' ',0,1,'C',0,false); //

    //  $this->SetXY($x-5, $y+2);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(20,6,' GST NO. :',0,1,'L',0,false);

    //  $this->SetXY($x+16, $y+2);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(35,6,' 27ADHFS0274J1ZU ',0,1,'L',0,false);

     $this->SetXY($x+71, $y+2);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,6,' PAN NO. :',0,1,'L',0,false);

     $this->SetXY($x+89, $y+2);
     $this->SetFont('Arial','B',9);
     $this->Cell(35,6,' ADHFS0274J ',0,1,'L',0,false);



     $this->Ln(-20);
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+24);
     $this->SetFont('Arial','B',9);
     $this->Cell(122,5,'TERM & CONDITIONS',0,1,'L',0,false);   //
 
     $this->SetXY($x-5, $y+28);
     $this->SetFont('Arial','',8);
     $this->Cell(122,5,'# GOODS ONCE SOLD WILL NOT BE TAKEN BACK',0,1,'L',0,false); 
     $this->SetXY($x-5, $y+31);
     $this->SetFont('Arial','',8);
     $this->Cell(122,5,'# QUOTATION PRICE VALID FOR 15 DAYS',0,1,'L',0,false); 
 
     $this->SetXY($x-5, $y+34);
     $this->SetFont('Arial','',8);
     $this->Cell(122,5,'# NO COMPLAINT WILL BE ENTERTAINED IF TILES NOT LAIDAS PER STANDARED INSTRUCTION',0,1,'L',0,false); 
 
     $this->SetXY($x-5, $y+37);
     $this->SetFont('Arial','',8);
     $this->Cell(122,5,'# UPTO 3% BREAKAGE CAN BE POSSIBLE DUE TO NATURE OF MATERIAL',0,1,'L',0,false); 
 
     $this->SetXY($x-5, $y+40);
     $this->SetFont('Arial','',8);
     $this->Cell(122,5,'# 100% ADVANCE PAYMENT AGAINST DELIVERY',0,1,'L',0,false); 
 
     $this->SetXY($x-5, $y+43);
     $this->SetFont('Arial','',8);
     $this->Cell(122,5,'# UNLOADING WILL BE CUSTOMER END',0,1,'L',0,false); 
 
    //  $this->SetXY($x+10, $y+47);
    //  $this->SetFont('Arial','B',8);
    //  $this->Cell(165,5,'NO EXCHANGE & NO RETURN',1,1,'C',0,false);
$this->Ln(7);
    $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+122, $y-11);
     $this->SetFont('Arial','B',13);
     $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

     $this->SetXY($x+122, $y+5);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'FOR   Signature Concepts LLP.',0,1,'C',0,false);

     $this->SetXY($x+122, $y+14);
     $this->SetFont('Arial','',9);
     $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

     $this->SetXY($x-3, $y+14);
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