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

     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,28,'  ',1,1,'C',0,false);

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
     $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',57,16,10);
      // $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',57,17,12);
 
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y-42);
      $this->SetFont('Arial','B',14);
      $this->Cell(200,8,'Tax Invoice',0,1,'C',0,false);  //
     
     $this->SetXY($x-5, $y-20);
     $this->SetFont('Arial','B',14);
     $this->Cell(200,-15,'Signature Concepts LLP ',0,1,'C',0,false);
    
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+19, $y+23);
     $this->SetFont('Arial','',8);
     $this->Cell(150,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

     $this->SetXY($x+45, $y+27);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

     $this->SetXY($x+15, $y+31);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Phone No : 7757033204',0,1,'C',0,false);

     $this->SetXY($x+62, $y+31);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);



     //$db = mysqli_connect("192.168.0.101","stn","root","nks2");

      include('../../database/dbconnection.php');
    
     
      $edit_id =1;       // $_GET['id'];
   
     $sql_charges = "SELECT rti.*, mrc.retail_cust_idpk, mrc.retail_cust_name
                    FROM retail_tax_invoice rti, mstr_retail_customer mrc
                    WHERE rti.customer = mrc.retail_cust_idpk AND id_pk ='$edit_id'";
                    
       $result_charges = mysqli_query($db, $sql_charges);
       $row=mysqli_fetch_row($result_charges);
    

$this->Ln(-5);
$y = $this->GetY();
$x = $this->GetX();
     $this->SetXY($x-5, $y-2);
     $this->SetFont('Arial','B',15);
     $this->Cell(140,25,'  ',1,1,'C',0,false);                   //

     $this->SetXY($x-5, $y-2);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Customer :       '.$row['32'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Address    :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+5);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,$row['5'],0,1,'L',0,false);


     $this->SetXY($x+15, $y+11);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,' Ph.No.'.$row['4'],0,1,'L',0,false);

    //  $this->SetXY($x-5, $y+20);
    //  $this->SetFont('Arial','B',8);
    //  $this->Cell(120,7,' GST NO.   : ',0,1,'L',0,false);


     $this->SetXY($x+135, $y-2);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,25,' ',1,1,'L',0,false);             //

     $this->SetXY($x+135, $y+2);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'   No.           : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+2);
     $this->SetFont('Arial','',9);
     $this->Cell(40,9,$row['1'],0,1,'L',0,false);
     
     $this->SetXY($x+135, $y+10);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'   Date         : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+10);
     $this->SetFont('Arial','',9);
     $this->Cell(40,9,$row['10'],0,1,'L',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y+9);
    //  $this->SetFont('Arial','B',15);
    //  $this->Cell(200,65,'  ',1,1,'C',0,false);

    $this->Ln(-5);
    
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
               $this->Cell(10,8,'No.',1,1,'C',0,false);
   
                  $this->SetXY($x+5, $y+9);
                  $this->SetFont('Arial','B',9);
                  $this->Cell(50,8,'Description Of Goods',1,1,'C',0,false);

                            $this->SetXY($x+55, $y+9);
                            $this->SetFont('Arial','B',8);
                            $this->Cell(17,8,'Remark',1,1,'C',0,false);

                                    $this->SetXY($x+72, $y+9);
                                     $this->SetFont('Arial','B',8);
                                     $this->Cell(20,8,'HSN/SAC',1,1,'C',0,false);

                                         $this->SetXY($x+92, $y+9);
                                          $this->SetFont('Arial','B',9);
                                          $this->Cell(22,8,'GST Rate',1,1,'C',0,false);

                                               $this->SetXY($x+114, $y+9);
                                               $this->SetFont('Arial','B',9);
                                               $this->Cell(21,8,'Quantity',1,1,'C',0,false);

                                                    $this->SetXY($x+135, $y+9);
                                                    $this->SetFont('Arial','B',9);
                                                    $this->Cell(19,8,'Rate',1,1,'C',0,false);  

                                                      $this->SetXY($x+154, $y+9);
                                                      $this->SetFont('Arial','B',9);
                                                      $this->Cell(19,8,'Disc. %',1,1,'C',0,false);
                                                                    
                                                           $this->SetXY($x+173, $y+9);
                                                           $this->SetFont('Arial','B',9);
                                                           $this->Cell(22,8,'Amount',1,1,'C',0,false);


    // $sql_charges1 = "SELECT rti.*, mi.item_id_pk, mi.nks_code,mi.design_code, mi.size 
    //                     FROM retail_tax_invoice_items rti, mstr_item mi 
    //                     WHERE  rti.product_design = mi.item_id_pk AND rti.rti_id_fk = '$edit_id'";

    $edit_id = 1; // $_GET['id'];

            // $sql_charges1 = "SELECT * 
            //                    FROM mstr_item AS mi
            //                    WHERE mi.item_id_pk ='$edit_id'";

             $sql_charges1 = "SELECT rti.*, mi.item_id_pk, mi.final_product_code, mi.size, mi.hsn, rti.gst_per, mi.uom
                                FROM retail_tax_invoice_items AS rti, mstr_item AS mi 
                                WHERE  rti.product_design = mi.item_id_pk AND rti.rti_id_fk ='$edit_id'";

    
    $result_charges1 = mysqli_query($db, $sql_charges1);
    $count = mysqli_num_rows($result_charges1);
    while($row1 =mysqli_fetch_row($result_charges1))
    {
       $y = $this->GetY();
       $x = $this->GetX();
  
    //    $this->SetXY($x+5, $y);
    //    $this->SetFont('Arial','',8);
    //    $this->Cell(50,12,'',1,1,'L',0,false);    ///
  
    //    $this->SetXY($x+114, $y);
    //    $this->SetFont('Arial','B',9);
    //    $this->Cell(21,12,'    ',1,1,'L',0,false);    ///
  
  
            $this->SetXY($x-5, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(10,12,$row1['0'],1,1,'C',0,false);            //1

            $this->SetXY($x+5, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(50,12,'',1,1,'C',0,false);           //

                 $this->SetXY($x+5, $y+1);
                 $this->SetFont('Arial','',8); 
                 $this->Cell(50,6,$row1['18'],0,1,'L',0,false);                                           //2
   
                 //              $this->Cell(50,6,$row1['17']."-".$row1['18']."-".$row1['19'],0,1,'L',0,false);

    // //-------------------
                //  $this->SetXY($x+5, $y+5);
                //  $this->SetFont('Arial','',8);
                //  $this->Cell(50,4,'Suppling load & Size ',0,1,'L',0,false);
  
                      $this->SetXY($x+55, $y);
                      $this->SetFont('Arial','',9);
                      $this->Cell(17,12,$row1['16'],1,1,'C',0,false);            // $row1['15']                //3
  
                           $this->SetXY($x+72, $y);
                           $this->SetFont('Arial','',8);
                           $this->Cell(20,12,$row1['20'],1,1,'C',0,false);                      //4
  
                                $this->SetXY($x+92, $y);
                                $this->SetFont('Arial','',8);
                                $this->Cell(22,12,$row1['21'],1,1,'C',0,false);                //5
  
                                    $this->SetXY($x+114, $y);
                                    $this->SetFont('Arial','B',9);
                                    $this->Cell(21,12,' ',1,1,'C',0,false);              /// 6
                                        $this->SetXY($x+114, $y+3);
                                        $this->SetFont('Arial','B',9);
                                        $this->Cell(12,5,'  '.$row1['6'] ,0,1,'L',0,false);        
                                            $this->SetXY($x+116, $y+3);
                                            $this->SetFont('Arial','',8);
                                            $this->Cell(17,5,$row1['22'],0,1,'R',0,false);
        
                                                $this->SetXY($x+135, $y);
                                                $this->SetFont('Arial','',8);
                                                $this->Cell(19,12,$row1['8'].'   ',1,1,'R',0,false);          //7
                    
                                                    $this->SetXY($x+154, $y);
                                                    $this->SetFont('Arial','',8);
                                                    $this->Cell(19,12,$row1['9'].' %',1,1,'C',0,false);                 //8
                
                                                            $this->SetXY($x+173, $y);
                                                            $this->SetFont('Arial','',9);
                                                            $this->Cell(22,12,$row1['11'].'  ',1,1,'R',0,false);            //9
      

   
   // $this->Ln(4);
   $this->Ln(4);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-4);
      $this->SetFont('Arial','B',9);
      $this->Cell(178,8,'',1,1,'R',0,false);

      $this->SetXY($x+90, $y-4);
      $this->SetFont('Arial','B',9);
      $this->Cell(20,8,'Grand Total',0,1,'R',0,false);

      $this->SetXY($x+110, $y-4);
      $this->SetFont('Arial','B',9);
      $this->Cell(20,8,$row['13'],0,1,'C',0,false);

     $this->SetXY($x+173, $y-4);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,8,$row1['11'].' ',1,1,'R',0,false);


     $this->SetXY($x-5, $y+4);
     $this->SetFont('Arial','B',9);
     $this->Cell(148,59,' ',1,1,'R',0,false); //

     $this->SetXY($x-5, $y+4);
     $this->SetFont('Arial','B',9);
     $this->Cell(148,10,'In Words :   ',0,1,'L',0,false);
     $this->SetXY($x+16, $y+4);
     $this->SetFont('Arial','',9);
     $this->Cell(122,10,'Rs.' .convertNum($row['22']),0,1,'L',0,false);                 //15

    }

$this->Ln(-20);
    $y = $this->GetY();
    $x = $this->GetX();
// $this->SetXY($x-1, $y+19);
// $this->SetFont('Arial','B',9);
// $this->Cell(143,37,' ',1,1,'R',0,false);  //
    $this->SetXY($x-4, $y+18);
    $this->SetFont('Arial','B',9);
    $this->Cell(50,10,'    GST  Summary :   ',0,1,'L',0,false);

        $this->SetXY($x+1, $y+26);
        $this->SetFont('Arial','',9);
        $this->Cell(18,14,'  ',1,1,'C',0,false);     //             

            $this->SetXY($x+1, $y+26);
            $this->SetFont('Arial','',9);
            $this->Cell(18,6,'HSN/SAC',0,1,'C',0,false);                  //1

                $this->SetXY($x+19, $y+26);
                $this->SetFont('Arial','',9);
                $this->Cell(26,14,' ',1,1,'C',0,false);   //
                $this->SetXY($x+18.5, $y+26);
                $this->SetFont('Arial','',9);
                $this->Cell(26,7,'Taxable Value ',0,1,'C',0,false);             //2

                    $this->SetXY($x+45, $y+26);
                    $this->SetFont('Arial','',9);
                    $this->Cell(32,7,'Central Tax',1,1,'C',0,false);              //3

                    $this->SetXY($x+45, $y+33);
                    $this->SetFont('Arial','',9);
                    $this->Cell(14,7,'Rate',1,1,'C',0,false);
                    $this->SetXY($x+59, $y+33);
                    $this->SetFont('Arial','',9);
                    $this->Cell(18,7,'Amount',1,1,'C',0,false);

                       $this->SetXY($x+77, $y+26);
                       $this->SetFont('Arial','',9);
                       $this->Cell(32,7,'State Tax',1,1,'C',0,false);             //4

                        $this->SetXY($x+77, $y+33);
                        $this->SetFont('Arial','',9);
                        $this->Cell(14,7,'Rate',1,1,'C',0,false);
                        $this->SetXY($x+91, $y+33);
                        $this->SetFont('Arial','',9);
                        $this->Cell(18,7,'Amount',1,1,'C',0,false);

                            $this->SetXY($x+109, $y+26);
                            $this->SetFont('Arial','',9);
                            $this->Cell(32,7,'Interstate Tax',1,1,'C',0,false);         //5

                            $this->SetXY($x+109, $y+33);
                            $this->SetFont('Arial','',9);
                            $this->Cell(14,7,'Rate',1,1,'C',0,false);
                            $this->SetXY($x+123, $y+33);
                            $this->SetFont('Arial','',9);
                            $this->Cell(18,7,'Amount',1,1,'C',0,false);

// $edit_id = 2;                //  $_GET['id'];

$sql_charges5 = "SELECT *
                   FROM  mstr_item AS mi
                   WHERE mi.item_id_pk = '$edit_id'";

$result_charges5 = mysqli_query($db, $sql_charges5);
//  $cn=0;
while($row5 =mysqli_fetch_row($result_charges5))
{
//   $cn++;
$y = $this->GetY();
$x = $this->GetX();

$this->SetXY($x+1, $y);
$this->SetFont('Arial','',9);
$this->Cell(18,7,$row5['2'],1,1,'C',0,false);            //1

    $this->SetXY($x+19, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(26,7,$row5['9'],1,1,'C',0,false);            //2

        $this->SetXY($x+45, $y);
        $this->SetFont('Arial','',9);
        $this->Cell(14,7,' ',1,1,'C',0,false);       //3-1
        $this->SetXY($x+59, $y);
        $this->SetFont('Arial','',9);
        $this->Cell(18,7,$row5['10'].' ',1,1,'R',0,false);        //3-2

            $this->SetXY($x+77, $y);
            $this->SetFont('Arial','',9);
            $this->Cell(14,7,'',1,1,'C',0,false);       //4-1
            $this->SetXY($x+91, $y);
            $this->SetFont('Arial','',9);
            $this->Cell(18,7,$row5['11'].' ',1,1,'R',0,false);        //4-2

                    $this->SetXY($x+109, $y);
                    $this->SetFont('Arial','',9);
                    $this->Cell(14,7,'',1,1,'C',0,false);       //5-1
                    $this->SetXY($x+123, $y);
                    $this->SetFont('Arial','',9);
                    $this->Cell(18,7,'',1,1,'C',0,false);         //5-2
        

        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+1, $y);
        $this->SetFont('Arial','',9);
        $this->Cell(18,7,'',1,1,'C',0,false);            //1
   
        $this->SetXY($x+19, $y);
        $this->SetFont('Arial','B',9);
        $this->Cell(26,7,' ',1,1,'R',0,false);            //2
   
        $this->SetXY($x+45, $y);
        $this->SetFont('Arial','',9);
        $this->Cell(14,7,'',1,1,'C',0,false);       //3-1
        $this->SetXY($x+59, $y);
        $this->SetFont('Arial','B',9);
        $this->Cell(18,7,$row5['10'].' ',1,1,'R',0,false);        //3-2
   
        $this->SetXY($x+77, $y);
        $this->SetFont('Arial','',9);
        $this->Cell(14,7,' ',1,1,'C',0,false);       //4-1
        $this->SetXY($x+91, $y);
        $this->SetFont('Arial','B',9);
        $this->Cell(18,7,$row5['11'].' ',1,1,'R',0,false);        //4-2
   
        $this->SetXY($x+109, $y);
        $this->SetFont('Arial','',9);
        $this->Cell(14,7,'',1,1,'C',0,false);       //5-1
        $this->SetXY($x+123, $y);
        $this->SetFont('Arial','',9);
        $this->Cell(18,7,'',1,1,'C',0,false);         //5-2
   }

   $sql_charges6 = "SELECT * 
                        FROM retail_tax_invoice
                         WHERE id_pk = '$edit_id'";

        $result_charges6 = mysqli_query($db, $sql_charges6);

        $row6 = mysqli_fetch_row($result_charges6);

 
                $this->Ln(-48);
                $y = $this->GetY();
                $x = $this->GetX();

                    $this->SetXY($x+143, $y+4);
                    $this->SetFont('Arial','B',9);
                    $this->Cell(52,59,' ',1,1,'R',0,false);  //

                    $this->SetXY($x+143, $y+4);
                    $this->SetFont('Arial','B',9);
                    $this->Cell(30,59,' ',1,1,'L',0,false);  //

                        $this->SetXY($x+143, $y+4);
                        $this->SetFont('Arial','B',9);
                        $this->Cell(29,10,' Discount',0,1,'L',0,false);
                        $this->SetXY($x+172, $y+4);
                        $this->SetFont('Arial','B',9);
                        $this->Cell(23,8,$row6['18'],0,1,'R',0,false);

                            $this->SetXY($x+143, $y+12);
                            $this->SetFont('Arial','B',9);
                            $this->Cell(29,10,' Load/Unload',0,1,'L',0,false);
                            $this->SetXY($x+172, $y+12);
                            $this->SetFont('Arial','B',9);
                            $this->Cell(23,8,' 0 ',0,1,'R',0,false);

                                $this->SetXY($x+143, $y+19);
                                $this->SetFont('Arial','B',9);
                                $this->Cell(29,10,' Other(+/-)',0,1,'L',0,false);
                                $this->SetXY($x+172, $y+19);
                                $this->SetFont('Arial','B',9);
                                $this->Cell(23,8,$row6['19'].' ',0,1,'R',0,false);

                                    $this->SetXY($x+143, $y+25);
                                    $this->SetFont('Arial','B',9);
                                    $this->Cell(29,10,' Transport',0,1,'L',0,false);
                                    $this->SetXY($x+172, $y+25);
                                    $this->SetFont('Arial','B',9);
                                    $this->Cell(23,8,$row6['7'],0,1,'R',0,false);

                                        $this->SetXY($x+143, $y+32);
                                        $this->SetFont('Arial','B',9);
                                        $this->Cell(29,10,' GST Tax Amt',0,1,'L',0,false);
                                        $this->SetXY($x+172, $y+32);
                                        $this->SetFont('Arial','B',9);
                                        $this->Cell(23,8,$row6['21'],0,1,'R',0,false);

                                            $this->SetXY($x+143, $y+53);
                                            $this->SetFont('Arial','B',9);
                                            $this->Cell(52,10,' ',1,1,'R',0,false);   //

                                                $this->SetXY($x+143, $y+53);
                                                $this->SetFont('Arial','B',10);
                                                $this->Cell(29,10,' Net Amount ',0,1,'L',0,false);
                                                $this->SetXY($x+172, $y+52);
                                                $this->SetFont('Arial','B',10);
                                                $this->Cell(23,10,$row6['22'],0,1,'R',0,false);

     $this->Ln(-6);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(200,70,'  ',1,1,'C',0,false);   //  //
    
    // $this->Ln(-9);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-70);
     $this->SetFont('Arial','B',9);
     $this->Cell(50,20,' ',0,1,'C',0,false); //

     $this->Ln(-14);
    // $this->Ln(12);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-5);
     $this->SetFont('Arial','',9);
     $this->Cell(30,10,'Bank Details',0,1,'L',0,false); 

     $y = $this->GetY();
     $x = $this->GetX();
    //  $this->SetXY($x+24, $y-11);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(49,30,' ',0,1,'C',0,false);    //

     $this->SetXY($x+24, $y-7);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'KOTAK MAHINDRA BANK',0,1,'L',0,false);

     $this->SetXY($x+24, $y-3);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

     $this->SetXY($x+24, $y+1);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'A/C NO: 3912034064',0,1,'L',0,false);

     $this->SetXY($x+24, $y+5);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'BRANCH: BIBWEWADI, PUNE',0,1,'L',0,false);

     $this->SetXY($x+24, $y+9);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'IFSC: KKBK0001770',0,1,'L',0,false);

     //----------------------------------

     $this->Ln(-4);
     $y = $this->GetY();
     $x = $this->GetX();
    //  $this->SetXY($x+80, $y-20);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(49,30,' ',1,1,'C',0,false);   //

     $this->SetXY($x+75, $y-17);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'HDFC BANK ',0,1,'L',0,false);

     $this->SetXY($x+75, $y-13);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

     $this->SetXY($x+75, $y-9);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'A/C NO: 50200052017929',0,1,'L',0,false);

     $this->SetXY($x+75, $y-5);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'BRANCH: PUNE',0,1,'L',0,false);

     $this->SetXY($x+75, $y-1);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'IFSC: HDFC0005718',0,1,'L',0,false);
    
  
     $net_amt = 0;
     $amt_rec = 0;
     $balance = 0;
    $sql_charges7 = "SELECT rti.*, mrc.retail_cust_idpk, mrc.retail_cust_name
                   FROM retail_tax_invoice rti, mstr_retail_customer mrc
                   WHERE rti.customer = mrc.retail_cust_idpk AND id_pk ='$edit_id'";
                   
      $result_charges7 = mysqli_query($db, $sql_charges7);
      $row7=mysqli_fetch_row($result_charges7);
           {
               $net_amt = $row7['22'];
               $amt_rec = $row7['22'];
               $amt_rec = $net_amt;
               $balance = $net_amt - $amt_rec;
           }
    //  $this->Ln(-4);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+143, $y-25);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,30,' ',0,1,'L',0,false);  //
     $this->SetXY($x+143, $y-20);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,5,'Amount Received  ',0,1,'L',0,false); 

     $this->SetXY($x+166, $y-20);
     $this->SetFont('Arial','',9);
     $this->Cell(29,5,$amt_rec,0,1,'R',0,false); 

     $this->SetXY($x+144, $y-12);
     $this->SetFont('Arial','B',9);
     $this->Cell(29,5,'Balance Amt.  ',0,1,'L',0,false);

     $this->SetXY($x+166, $y-12);
     $this->SetFont('Arial','',9);
     $this->Cell(29,5,$balance,0,1,'R',0,false); 

    
    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y+12);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(127,21,' ',0,1,'C',0,false); //

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


 $this->Ln(-9);
 $y = $this->GetY();
$x = $this->GetX();

$this->SetXY($x-3, $y+10);
$this->SetFont('Arial','B',9);
$this->Cell(40,8,'TERM & CONDITIONS-',0,1,'L',0,false);

$this->SetXY($x, $y+16);
$this->SetFont('Arial','',8);
$this->Cell(60,7,'# GOODS ONCE SOLD WILL NOT BE TAKEN BACK',0,1,'L',0,false);
$this->SetXY($x, $y+19);
$this->SetFont('Arial','',8);
$this->Cell(40,8,'# CHECK MATERIAL BEFORE TEMPO LEAVE SITE, LATER NO    COMPLAINT WILL BE ENTERTAINED',0,1,'L',0,false);

$this->SetXY($x, $y+23);
$this->SetFont('Arial','',8);
$this->Cell(40,8,'# NO COMPLAINT WILL BE ENTERTAINED IF TILES NOT LAID  AS PER STANDARED INSTRUCTION',0,1,'L',0,false);


$this->SetXY($x, $y+27);
$this->SetFont('Arial','',8);
$this->Cell(40,8,'# UPTO 3% BREAKAGE CAN BE POSSIBLE DUE TO NATURE OF MATERIAL',0,1,'L',0,false);


$this->SetXY($x, $y+30);
$this->SetFont('Arial','',8);
$this->Cell(40,8,'# 100% ADVANCE PAYMENT AGAINST DELIVERY',0,1,'L',0,false);

$this->SetXY($x, $y+33);
$this->SetFont('Arial','',8);
$this->Cell(40,8,'# UNLOADING WILL BE CUSTOMER END',0,1,'L',0,false);

$this->Ln(3);
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
   



// // include('../../partials/dbconnection.php');
//   extract($_GET);

 
//   require('fpdf182/fpdf.php');
//     // include '../../partials/dbconnection.php';
//     $ones = array(
//  "",
//  " One",
//  " Two",
//  " Three",
//  " Four",
//  " Five",
//  " Six",
//  " Seven",
//  " Eight",
//  " Nine",
//  " Ten",
//  " Eleven",
//  " Twelve",
//  " Thirteen",
//  " Fourteen",
//  " Fifteen",
//  " Sixteen",
//  " Seventeen",
//  " Eighteen",
//  " Nineteen"
// );

// $tens = array(
//  "",
//  "",
//  " Twenty",
//  " Thirty",
//  " Forty",
//  " Fifty",
//  " Sixty",
//  " Seventy",
//  " Eighty",
//  " Ninety"
// );

// $triplets = array(
//  "",
//  " Thousand",
//  " Million",
//  " Billion",
//  " Trillion",
//  " Quadrillion",
//  " Quintillion",
//  " Sextillion",
//  " Septillion",
//  " Octillion",
//  " Nonillion"
// );
// function convertTri($num, $tri) 
// {
//         global $ones, $tens, $triplets;

// // chunk the number, ...rxyy
// $r = (int) ($num / 1000);
// $x = ($num / 100) % 10;
// $y = $num % 100;

// // init the output string
// $str = "";

// // do hundreds
// if ($x > 0)
// $str = $ones[$x] . " hundred";

// // do ones and tens
// if ($y < 20)
// $str .= $ones[$y];
// else
// $str .= $tens[(int) ($y / 10)] . $ones[$y % 10];

// // add triplet modifier only if there
// // is some output to be modified...
// if ($str != "")
// $str .= $triplets[$tri];

// // continue recursing?
// if ($r > 0)
// return convertTri($r, $tri+1).$str;
// else
// return $str;
// }


// // returns the number as an anglicized string
// function convertNum($num) {
// $num = (int) $num;    // make sure it's an integer

// if ($num < 0)
// return "negative".convertTri(-$num, 0);

// if ($num == 0)
// return "zero";

// return convertTri($num, 0);
// }


// // $id = $_GET['this_id'];
//     //$i=$_GET['id'];

//      $code="";
//      class this extends FPDF
//      {
 
//      // Page header
//      function RoundedRect($x, $y, $w, $h, $r, $style = '')
//          {
//              $k = $this->k;
//              $hp = $this->h;
          
//              if($style=='F')
//                 $op='f';
//             elseif($style=='FD' || $style=='DF')
//                 $op='B';
//           else
//               $op='S';
//  $MyArc = 4/3 * (sqrt(2) - 1);
//  $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
//  $xc = $x+$w-$r ;
//  $yc = $y+$r;
//  $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
 
//  $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
//  $xc = $x+$w-$r ;
//  $yc = $y+$h-$r;
//  $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
//  $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
//  $xc = $x+$r ;
//  $yc = $y+$h-$r;
//  $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
//  $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
//  $xc = $x+$r ;
//  $yc = $y+$r;
//  $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
//  $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
//  $this->_out($op);
//     }

//     function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
//   {
//       $h = $this->h;
//       $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
//           $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
//   }

//   function Header()
//  {

//      $y = $this->GetY();
//      $x = $this->GetX();

//      $this->SetXY($x-5, $y+5);
//      $this->SetFont('Arial','B',15);
//      $this->Cell(200,28,'  ',1,1,'C',0,false);

//      $today = date("Y-m-d");

//      $y = $this->GetY();
//      $x = $this->GetX();

//      $this->SetXY($x+143, $y-32);
//      $this->SetFont('arial','',8);
//      $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
//      $this->SetXY($x+146, $y-32);
//      $this->SetFont('arial','',8);
//      $this->Cell(18,3,'Original PDF',0,1,'L',0,false);
//      $this->SetXY($x+167, $y-32);
//      $this->SetFont('arial','',8);
//      $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
//      $this->SetXY($x+170, $y-32);
//      $this->SetFont('arial','',8);
//      $this->Cell(20,3,'Duplicate PDF',0,1,'L',0,false);

//      $this->SetXY($x, $y+7);
//      $this->Image('C:/Users/admin/Desktop/Work/LOGO-SIGNATURE_3.jpeg',57,16,10);
//       // $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',57,17,12);
 
//      $y = $this->GetY();
//      $x = $this->GetX();

//      $this->SetXY($x-5, $y-42);
//       $this->SetFont('Arial','B',14);
//       $this->Cell(200,8,'Tax Invoice',0,1,'C',0,false);  //
     
//      $this->SetXY($x-5, $y-20);
//      $this->SetFont('Arial','B',14);
//      $this->Cell(200,-15,'Signature Concepts LLP ',0,1,'C',0,false);
    
//      $this->Ln();

//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x+19, $y+23);
//      $this->SetFont('Arial','',8);
//      $this->Cell(150,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

//      $this->SetXY($x+45, $y+27);
//      $this->SetFont('Arial','',8);
//      $this->Cell(100,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

//      $this->SetXY($x+15, $y+31);
//      $this->SetFont('Arial','',8);
//      $this->Cell(100,19,'Phone No : 7757033204',0,1,'C',0,false);

//      $this->SetXY($x+62, $y+31);
//      $this->SetFont('Arial','',8);
//      $this->Cell(100,19,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);



//      $db = mysqli_connect("192.168.0.101","stn","root","nks2");

//      // include('../../database/dbconnection.php');
    
     
//       $edit_id = 1; // $_GET['id'];


//      $sql_charges = "SELECT rti.*, mrc.retail_cust_idpk, mrc.retail_cust_name
//                     FROM retail_tax_invoice rti, mstr_retail_customer mrc
//                     WHERE rti.customer = mrc.retail_cust_idpk AND id_pk ='$edit_id'";
                    
//       $result_charges = mysqli_query($db, $sql_charges);
//       $row=mysqli_fetch_row($result_charges);


// $this->Ln(-5);
// $y = $this->GetY();
// $x = $this->GetX();
//      $this->SetXY($x-5, $y-2);
//      $this->SetFont('Arial','B',15);
//      $this->Cell(140,25,'  ',1,1,'C',0,false);                   //

//      $this->SetXY($x-5, $y-2);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(120,10,' Customer :       '.$row['32'],0,1,'L',0,false);

//      $this->SetXY($x-5, $y+5);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(120,10,' Address    :',0,1,'L',0,false);

//      $this->SetXY($x+15, $y+5);
//      $this->SetFont('Arial','',8);
//      $this->Cell(120,10,$row['5'],0,1,'L',0,false);


//      $this->SetXY($x+15, $y+11);
//      $this->SetFont('Arial','',8);
//      $this->Cell(35,5,' Ph.No.'.$row['4'],0,1,'L',0,false);

//     //  $this->SetXY($x-5, $y+20);
//     //  $this->SetFont('Arial','B',8);
//     //  $this->Cell(120,7,' GST NO.   : ',0,1,'L',0,false);


//      $this->SetXY($x+135, $y-2);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(60,25,' ',1,1,'L',0,false);             //

//      $this->SetXY($x+135, $y+2);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(60,9,'   No.           : ',0,1,'L',0,false);

//      $this->SetXY($x+155, $y+2);
//      $this->SetFont('Arial','',9);
//      $this->Cell(40,9,$row['1'],0,1,'L',0,false);
     
//      $this->SetXY($x+135, $y+10);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(60,9,'   Date         : ',0,1,'L',0,false);

//      $this->SetXY($x+155, $y+10);
//      $this->SetFont('Arial','',9);
//      $this->Cell(40,9,$row['10'],0,1,'L',0,false);

//     //  $y = $this->GetY();
//     //  $x = $this->GetX();
//     //  $this->SetXY($x-5, $y+9);
//     //  $this->SetFont('Arial','B',15);
//     //  $this->Cell(200,65,'  ',1,1,'C',0,false);

//     $this->Ln(-5);
    
//     $y = $this->GetY();
//     $x = $this->GetX();
//     // $this->SetXY($x-5, $y+9);
//     // $this->SetFont('Arial','B',15);
//     // $this->Cell(200,20,'  ',1,1,'C',0,false);   // 

//     // $this->SetXY($x-5, $y+9);
//     //       $this->SetFont('Arial','B',9); 
//     //       $this->Cell(200,8,'  ',1,1,'C',0,false);   //

//               $this->SetXY($x-5, $y+9);
//               $this->SetFont('Arial','B',9);
//               $this->Cell(10,8,'No.',1,1,'C',0,false);
   
//                   $this->SetXY($x+5, $y+9);
//                   $this->SetFont('Arial','B',9);
//                   $this->Cell(50,8,'Description Of Goods',1,1,'C',0,false);

//                             $this->SetXY($x+55, $y+9);
//                             $this->SetFont('Arial','B',8);
//                             $this->Cell(17,8,'Remark',1,1,'C',0,false);

//                                     $this->SetXY($x+72, $y+9);
//                                      $this->SetFont('Arial','B',8);
//                                      $this->Cell(20,8,'HSN/SAC',1,1,'C',0,false);

//                                          $this->SetXY($x+92, $y+9);
//                                           $this->SetFont('Arial','B',9);
//                                           $this->Cell(22,8,'GST Rate',1,1,'C',0,false);

//                                               $this->SetXY($x+114, $y+9);
//                                               $this->SetFont('Arial','B',9);
//                                               $this->Cell(21,8,'Quantity',1,1,'C',0,false);

//                                                     $this->SetXY($x+135, $y+9);
//                                                     $this->SetFont('Arial','B',9);
//                                                     $this->Cell(19,8,'Rate',1,1,'C',0,false);  

//                                                       $this->SetXY($x+154, $y+9);
//                                                       $this->SetFont('Arial','B',9);
//                                                       $this->Cell(19,8,'Disc. %',1,1,'C',0,false);
                                                                    
//                                                           $this->SetXY($x+173, $y+9);
//                                                           $this->SetFont('Arial','B',9);
//                                                           $this->Cell(22,8,'Amount',1,1,'C',0,false);


//     // $sql_charges1 = "SELECT rti.*, mi.item_id_pk, mi.nks_code,mi.design_code, mi.size 
//     //                     FROM retail_tax_invoice_items rti, mstr_item mi 
//     //                     WHERE  rti.product_design = mi.item_id_pk AND rti.rti_id_fk = '$edit_id'";

//     $edit_id = 1; // $_GET['id'];

//             // $sql_charges1 = "SELECT * 
//             //                    FROM mstr_item AS mi
//             //                    WHERE mi.item_id_pk ='$edit_id'";

//              $sql_charges1 = "SELECT rti.*, mi.item_id_pk, mi.final_product_code, mi.size, mi.hsn, rti.gst_per, mi.uom
//                                 FROM retail_tax_invoice_items AS rti, mstr_item AS mi 
//                                 WHERE  rti.product_design = mi.item_id_pk AND rti.rti_id_fk ='$edit_id'";

    
//     $result_charges1 = mysqli_query($db, $sql_charges1);
//     $count = mysqli_num_rows($result_charges1);
//     while($row1 =mysqli_fetch_row($result_charges1))
//     {
//       $y = $this->GetY();
//       $x = $this->GetX();
  
//     //    $this->SetXY($x+5, $y);
//     //    $this->SetFont('Arial','',8);
//     //    $this->Cell(50,12,'',1,1,'L',0,false);    ///
  
//     //    $this->SetXY($x+114, $y);
//     //    $this->SetFont('Arial','B',9);
//     //    $this->Cell(21,12,'    ',1,1,'L',0,false);    ///
  
  
//             $this->SetXY($x-5, $y);
//             $this->SetFont('Arial','B',9);
//             $this->Cell(10,12,$row1['0'],1,1,'C',0,false);            //1

//             $this->SetXY($x+5, $y);
//             $this->SetFont('Arial','B',9);
//             $this->Cell(50,12,'',1,1,'C',0,false);           //

//                  $this->SetXY($x+5, $y+1);
//                  $this->SetFont('Arial','',8); 
//                  $this->Cell(50,6,$row1['18'],0,1,'L',0,false);                                           //2
   
//                  //              $this->Cell(50,6,$row1['17']."-".$row1['18']."-".$row1['19'],0,1,'L',0,false);

//     // //-------------------
//                 //  $this->SetXY($x+5, $y+5);
//                 //  $this->SetFont('Arial','',8);
//                 //  $this->Cell(50,4,'Suppling load & Size ',0,1,'L',0,false);
  
//                       $this->SetXY($x+55, $y);
//                       $this->SetFont('Arial','',9);
//                       $this->Cell(17,12,$row1['16'],1,1,'C',0,false);            // $row1['15']                //3
  
//                           $this->SetXY($x+72, $y);
//                           $this->SetFont('Arial','',8);
//                           $this->Cell(20,12,$row1['20'],1,1,'C',0,false);                      //4
  
//                                 $this->SetXY($x+92, $y);
//                                 $this->SetFont('Arial','',8);
//                                 $this->Cell(22,12,$row1['21'],1,1,'C',0,false);                //5
  
//                                     $this->SetXY($x+114, $y);
//                                     $this->SetFont('Arial','B',9);
//                                     $this->Cell(21,12,' ',1,1,'C',0,false);              /// 6
//                                         $this->SetXY($x+114, $y+3);
//                                         $this->SetFont('Arial','B',9);
//                                         $this->Cell(12,5,'  '.$row1['6'] ,0,1,'L',0,false);        
//                                             $this->SetXY($x+116, $y+3);
//                                             $this->SetFont('Arial','',8);
//                                             $this->Cell(17,5,$row1['22'],0,1,'R',0,false);
        
//                                                 $this->SetXY($x+135, $y);
//                                                 $this->SetFont('Arial','',8);
//                                                 $this->Cell(19,12,$row1['8'].'   ',1,1,'R',0,false);          //7
                    
//                                                     $this->SetXY($x+154, $y);
//                                                     $this->SetFont('Arial','',8);
//                                                     $this->Cell(19,12,$row1['9'],1,1,'C',0,false);                 //8
                
//                                                             $this->SetXY($x+173, $y);
//                                                             $this->SetFont('Arial','',9);
//                                                             $this->Cell(22,12,$row1['11'].'  ',1,1,'R',0,false);            //9
      

   
//   // $this->Ln(4);
//   $this->Ln(4);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x-5, $y-4);
//       $this->SetFont('Arial','B',9);
//       $this->Cell(178,8,'',1,1,'R',0,false);

//       $this->SetXY($x+90, $y-4);
//       $this->SetFont('Arial','B',9);
//       $this->Cell(20,8,'Grand Total',0,1,'R',0,false);

//       $this->SetXY($x+110, $y-4);
//       $this->SetFont('Arial','B',9);
//       $this->Cell(20,8,$row['13'],0,1,'C',0,false);

//      $this->SetXY($x+173, $y-4);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(22,8,$row1['11'].' ',1,1,'R',0,false);


//      $this->SetXY($x-5, $y+4);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(148,59,' ',1,1,'R',0,false); //

//      $this->SetXY($x-5, $y+4);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(148,10,'In Words :   ',0,1,'L',0,false);
//      $this->SetXY($x+16, $y+4);
//      $this->SetFont('Arial','',9);
//      $this->Cell(122,10,'Rs.' .convertNum($row['22']),0,1,'L',0,false);                 //15

//     }

//     //   $edit_id = 2;         //$_GET['id'];

//     // $sql_charges2 = "SELECT * 
//     //                     FROM `retail_tax_invoice_items`

//     //                      WHERE id_pk = '$edit_id'"; 


//     //     $result_charges2 = mysqli_query($db, $sql_charges2);
//     //   //  $count = mysqli_num_rows($result_charges1);
//     //     while($row2 =mysqli_fetch_row($result_charges2))

//      $this->SetXY($x-4, $y+15);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(146,44,' ',1,1,'R',0,false);//
//      $this->SetXY($x-4, $y+15);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(50,10,' GST  Summary :   ',0,1,'L',0,false);
//      $this->SetXY($x-3, $y+26);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(143.5,28,' ',1,1,'R',0,false);  //




//      $this->SetXY($x-3, $y+26);
//      $this->SetFont('Arial','',9);
//      $this->Cell(143.5,14,'',1,1,'C',0,false);  //
//      $this->SetXY($x+108.5, $y+26);
//      $this->SetFont('Arial','',9);
//      $this->Cell(32,7,'Interstate Tax',1,1,'C',0,false);

//      $this->SetXY($x+108.5, $y+33);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,'Rate',1,1,'C',0,false);
//      $this->SetXY($x+108.5, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,'0%',1,1,'C',0,false);
//      $this->SetXY($x+108.5, $y+47);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,' ',1,1,'C',0,false);

//      $this->SetXY($x+122.5, $y+33);
//      $this->SetFont('Arial','',9);
//      $this->Cell(18,7,'Amount',1,1,'C',0,false);
//      $this->SetXY($x+122.5, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(18,7,'0.00 ',1,1,'R',0,false);
//      $this->SetXY($x+122.5, $y+47);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(18,7,$row['21'] ,1,1,'R',0,false);

//      $this->SetXY($x+76.5, $y+26);
//      $this->SetFont('Arial','',9);
//      $this->Cell(32,7,'State Tax',1,1,'C',0,false);

//      $this->SetXY($x+76.5, $y+33);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,'Rate',1,1,'C',0,false);
//      $this->SetXY($x+76.5, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,'0%',1,1,'C',0,false);
//      $this->SetXY($x+76.5, $y+47);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,' ',1,1,'C',0,false);

//      $this->SetXY($x+90.5, $y+33);
//      $this->SetFont('Arial','',9);
//      $this->Cell(18,7,'Amount',1,1,'C',0,false);
//      $this->SetXY($x+90.5, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(18,7,' 0 ',1,1,'R',0,false);
//      $this->SetXY($x+90.5, $y+47);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(18,7,'  0 ',1,1,'R',0,false);


//      $this->SetXY($x+44.5, $y+26);
//      $this->SetFont('Arial','',9);
//      $this->Cell(32,7,'Central Tax',1,1,'C',0,false);

//      $this->SetXY($x+44.5, $y+33);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,'Rate',1,1,'C',0,false);
//      $this->SetXY($x+44.5, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,'0%',1,1,'C',0,false);
//      $this->SetXY($x+44.5, $y+47);
//      $this->SetFont('Arial','',9);
//      $this->Cell(14,7,' ',1,1,'C',0,false);

//      $this->SetXY($x+58.5, $y+33);
//      $this->SetFont('Arial','',9);
//      $this->Cell(18,7,'Amount',1,1,'C',0,false);
//      $this->SetXY($x+58.5, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(18,7,'0 ',1,1,'R',0,false);
//      $this->SetXY($x+58.5, $y+47);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(18,7,' 0 ',1,1,'R',0,false);

//      $this->SetXY($x+18.5, $y+26);
//      $this->SetFont('Arial','',9);
//      $this->Cell(26,14,' ',1,1,'C',0,false);   //
//      $this->SetXY($x+18.5, $y+26);
//      $this->SetFont('Arial','',9);
//      $this->Cell(26,7,'Taxable Value ',0,1,'C',0,false);

//      $this->SetXY($x+18.5, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(26,7,$row['15'],1,1,'R',0,false);
//      $this->SetXY($x+18.5, $y+47);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(26,7,$row['15'],1,1,'R',0,false);


    
//      $this->SetXY($x-3, $y+26);
//      $this->SetFont('Arial','',9);
//      $this->Cell(21.5,7,'HSN/SAC',0,1,'C',0,false);
//      $this->SetXY($x-3, $y+40);
//      $this->SetFont('Arial','',9);
//      $this->Cell(21.5,7,'0',1,1,'C',0,false);
//      $this->SetXY($x-3, $y+47);
//      $this->SetFont('Arial','',9);
//      $this->Cell(21.5,7,' ',1,1,'C',0,false);  //


//      $this->SetXY($x+143, $y+4);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(52,59,' ',1,1,'R',0,false);  //

//      $this->SetXY($x+143, $y+4);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(30,59,' ',1,1,'L',0,false);  //

//      $this->SetXY($x+143, $y+4);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,10,' Discount',0,1,'L',0,false);
//      $this->SetXY($x+172, $y+4);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(23,8,$row['18'],0,1,'R',0,false);

//      $this->SetXY($x+143, $y+12);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,10,' Load/Unload',0,1,'L',0,false);
//      $this->SetXY($x+172, $y+12);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(23,8,' 0 ',0,1,'R',0,false);

//      $this->SetXY($x+143, $y+19);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,10,' Other(+/-)',0,1,'L',0,false);
//      $this->SetXY($x+172, $y+19);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(23,8,$row['19'],0,1,'R',0,false);

//      $this->SetXY($x+143, $y+25);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,10,' Transport',0,1,'L',0,false);
//      $this->SetXY($x+172, $y+25);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(23,8,' 0.00 ',0,1,'R',0,false);

//      $this->SetXY($x+143, $y+32);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,10,' GST Tax Amt',0,1,'L',0,false);
//      $this->SetXY($x+172, $y+32);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(23,8,$row['21'],0,1,'R',0,false);

//      $this->SetXY($x+143, $y+53);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(52,10,' ',1,1,'R',0,false);   //

//      $this->SetXY($x+143, $y+53);
//      $this->SetFont('Arial','B',10);
//      $this->Cell(29,10,' Net Amount ',0,1,'L',0,false);
//      $this->SetXY($x+172, $y+52);
//      $this->SetFont('Arial','B',10);
//      $this->Cell(23,10,$row['22'],0,1,'R',0,false);

//      $this->Ln(-6);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x-5, $y+7);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(200,50,'  ',1,1,'C',0,false);   //  //
     

//      $this->Ln(-9);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x-5, $y-70);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(50,20,' ',0,1,'C',0,false); //

//      $this->Ln(12);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x-5, $y-5);
//      $this->SetFont('Arial','',9);
//      $this->Cell(30,10,'Bank Details',0,1,'L',0,false); 

//      $y = $this->GetY();
//      $x = $this->GetX();
//     //  $this->SetXY($x+24, $y-11);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(49,30,' ',0,1,'C',0,false);    //

//      $this->SetXY($x+24, $y-7);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'KOTAK MAHINDRA BANK',0,1,'L',0,false);

//      $this->SetXY($x+24, $y-3);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

//      $this->SetXY($x+24, $y+1);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'A/C NO: 3912034064',0,1,'L',0,false);

//      $this->SetXY($x+24, $y+5);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'BRANCH: BIBWEWADI, PUNE',0,1,'L',0,false);

//      $this->SetXY($x+24, $y+9);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'IFSC: KKBK0001770',0,1,'L',0,false);

//      //----------------------------------

//      $this->Ln(-4);
//      $y = $this->GetY();
//      $x = $this->GetX();
//     //  $this->SetXY($x+80, $y-20);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(49,30,' ',1,1,'C',0,false);   //

//      $this->SetXY($x+75, $y-17);
//      $this->SetFont('Arial','',8);
//      $this->Cell(42,5,'HDFC BANK ',0,1,'L',0,false);

//      $this->SetXY($x+75, $y-13);
//      $this->SetFont('Arial','',8);
//      $this->Cell(42,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

//      $this->SetXY($x+75, $y-9);
//      $this->SetFont('Arial','',8);
//      $this->Cell(42,5,'A/C NO: 50200052017929',0,1,'L',0,false);

//      $this->SetXY($x+75, $y-5);
//      $this->SetFont('Arial','',8);
//      $this->Cell(42,5,'BRANCH: PUNE',0,1,'L',0,false);

//      $this->SetXY($x+75, $y-1);
//      $this->SetFont('Arial','',8);
//      $this->Cell(42,5,'IFSC: HDFC0005718',0,1,'L',0,false);
//      // $y = $this->GetY();

//     //  $y = $this->GetY();
//     //  $x = $this->GetX();
//     //  $this->SetXY($x+28, $y-10);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(49,30,' ',0,1,'C',0,false);    //

//     //  $this->SetXY($x+28, $y-7);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(49,5,'ICICI BANK',0,1,'L',0,false);

//     //  $this->SetXY($x+28, $y-3);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(49,5,'Add.: VIMANNAGAR, PUNE',0,1,'L',0,false);

//     //  $this->SetXY($x+28, $y+1);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(49,5,'Acct. No.: 091505500492',0,1,'L',0,false);

//     //  $this->SetXY($x+28, $y+5);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(49,5,'IFSC No.: ICIC0000915',0,1,'L',0,false);
     
//     //  $y = $this->GetY();
//     //  $x = $this->GetX();
//     //  $this->SetXY($x+73, $y-20);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(49,30,' ',0,1,'C',0,false);   //

//     //  $this->SetXY($x+73, $y-17);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(42,5,'KOTAK BANK ',0,1,'L',0,false);

//     //  $this->SetXY($x+73, $y-13);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(42,5,'Add.: BIBWEWADI, PUNE',0,1,'L',0,false);

//     //  $this->SetXY($x+73, $y-9);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(42,5,'Acct. No.: 3912034064',0,1,'L',0,false);

//     //  $this->SetXY($x+73, $y-5);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(42,5,'IFSC No.: KKBK0001770',0,1,'L',0,false);

//      $this->Ln(-4);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x+143, $y-25);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,30,' ',0,1,'L',0,false);  //
//      $this->SetXY($x+143, $y-23);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,15,'Amount Received  ',0,1,'L',0,false); 

//      $this->SetXY($x+143, $y-12);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(29,9,'Balance Amt.  ',0,1,'L',0,false);


//      $this->Ln(-5);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x+172, $y-21);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(23,25,' ',0,1,'L',0,false);
//      $this->SetXY($x+171, $y-15);
//      $this->SetFont('Arial','',9);
//      $this->Cell(23,5,$row['22'],0,1,'R',0,false); 

//      $this->SetXY($x+171, $y-7);
//      $this->SetFont('Arial','',9);
//      $this->Cell(23,5,'0.00 ',0,1,'R',0,false);
     
//     //  $y = $this->GetY();
//     //  $x = $this->GetX();
//     //  $this->SetXY($x-5, $y+12);
//     //  $this->SetFont('Arial','',9);
//     //  $this->Cell(127,21,' ',0,1,'C',0,false); //

//     //  $this->SetXY($x-5, $y+2);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(20,6,' GST NO. :',0,1,'L',0,false);

//     //  $this->SetXY($x+16, $y+2);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(35,6,' 27ADHFS0274J1ZU ',0,1,'L',0,false);

//     //  $this->SetXY($x+71, $y+2);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(20,6,' PAN NO. :',0,1,'L',0,false);

//     //  $this->SetXY($x+89, $y+2);
//     //  $this->SetFont('Arial','B',9);
//     //  $this->Cell(35,6,' ADHFS0274J ',0,1,'L',0,false);


//  $this->Ln(1);
//  $y = $this->GetY();
// $x = $this->GetX();

// $this->SetXY($x-3, $y+10);
// $this->SetFont('Arial','B',9);
// $this->Cell(40,8,'TERM & CONDITIONS-',0,1,'L',0,false);

// $this->SetXY($x, $y+16);
// $this->SetFont('Arial','',8);
// $this->Cell(60,7,'# GOODS ONCE SOLD WILL NOT BE TAKEN BACK',0,1,'L',0,false);
// $this->SetXY($x, $y+19);
// $this->SetFont('Arial','',8);
// $this->Cell(40,8,'# CHECK MATERIAL BEFORE TEMPO LEAVE SITE, LATER NO    COMPLAINT WILL BE ENTERTAINED',0,1,'L',0,false);
// // $this->SetXY($x, $y+22);
// // $this->SetFont('Arial','',8);
// // $this->Cell(40,8,'  ',0,1,'L',0,false);

// $this->SetXY($x, $y+23);
// $this->SetFont('Arial','',8);
// $this->Cell(40,8,'# NO COMPLAINT WILL BE ENTERTAINED IF TILES NOT LAID  AS PER STANDARED INSTRUCTION',0,1,'L',0,false);

// // $this->SetXY($x, $y+28);
// // $this->SetFont('Arial','',8);
// // $this->Cell(40,8,'   ',0,1,'L',0,false);

// $this->SetXY($x, $y+27);
// $this->SetFont('Arial','',8);
// $this->Cell(40,8,'# UPTO 3% BREAKAGE CAN BE POSSIBLE DUE TO NATURE OF MATERIAL',0,1,'L',0,false);

// // $this->SetXY($x, $y+34);
// // $this->SetFont('Arial','',8);
// // $this->Cell(40,8,'  ',0,1,'L',0,false);

// $this->SetXY($x, $y+30);
// $this->SetFont('Arial','',8);
// $this->Cell(40,8,'# 100% ADVANCE PAYMENT AGAINST DELIVERY',0,1,'L',0,false);

// $this->SetXY($x, $y+33);
// $this->SetFont('Arial','',8);
// $this->Cell(40,8,'# UNLOADING WILL BE CUSTOMER END',0,1,'L',0,false);

// $this->Ln(-3);
//     $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x+122, $y-11);
//      $this->SetFont('Arial','B',13);
//      $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

//      $this->SetXY($x+122, $y+5);
//      $this->SetFont('Arial','',9);
//      $this->Cell(68,5,'FOR   Signature Concepts LLP.',0,1,'C',0,false);

//      $this->SetXY($x+122, $y+14);
//      $this->SetFont('Arial','',9);
//      $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

//      $this->SetXY($x-3, $y+14);
//      $this->SetFont('Arial','',9);
//      $this->Cell(68,5,'  Receiver Sign.',0,1,'L',0,false);


//     }

//     function Footer()
//     {
   
          
//     }
   
//   }
//   $pdf= new this();
//     $pdf->AliasNbPages();
   
//   // // Add new pages
//   // // Add new pages
//     $pdf->SetAutoPageBreak(true,130);
//     $pdf->AddPage();
//   //      $pdf->Ln();
   
//         $pdf->Output();
   
    ?>   