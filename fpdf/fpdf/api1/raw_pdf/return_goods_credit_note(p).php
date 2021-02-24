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
    $today = date("Y-m-d");
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

  $this->SetXY($x+140, $y);
     $this->SetFont('arial','',8);
     $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
     $this->SetXY($x+144, $y-1);
     $this->SetFont('arial','',8);
     $this->Cell(18,5,'Original PDF',0,1,'L',0,false);
     $this->SetXY($x+166, $y);
     $this->SetFont('arial','',8);
     $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
     $this->SetXY($x+170, $y-1);
     $this->SetFont('arial','',8);
     $this->Cell(20,5,'Duplicate PDF',0,1,'L',0,false);



     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,28,'  ',1,1,'C',0,false);   //

     $today = date("Y-m-d");

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x, $y+7);
     $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',58,16,11);
      //  $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',57,17,13);

     //$this->Line(210,10,10,10);
    //  $this->SetFont('Arial','B',20);
    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

     

     $y = $this->GetY();
     $x = $this->GetX();

      $this->SetXY($x-7, $y-34);
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



//      SELECT rg. * 
// FROM retail_return_goods AS rg, retail_return_goods_items AS ri, retail_proforma_items AS rp
// WHERE  rg.rp_id_fk  = ri.rrg_id_fk And rp.item_id_fk

include('../../database/dbconnection.php');
//$db = mysqli_connect("localhost","root","","nks");  
$edit_id = 1;

$cust_name = 0;
$c_no  = 0;
$ph_no = 0;
$da_te = 0;
$add = 0;
$pi_no = 0;
// $sql_charges = "SELECT * 
//                 FROM  retail_proforma AS rp, retail_return_goods AS rg, mstr_item AS mi, 
//                 retail_return_goods_items AS rgi, mstr_supplier AS ms, tbl_wholesale_customer AS w
//                 WHERE  rgi.rrg_id_fk AND rg.id_pk AND rp.id_pk AND rg.rp_id_fk AND rp.id_pk AND mi.item_id_pk ='$edit_id'";

$sql_charges = "SELECT *
                FROM  tbl_wholesale_customer AS w,retail_proforma AS rp, wholesale_return_good AS rg,wholesale_return_good_items AS wgi,
                mstr_item AS mi, mstr_supplier AS ms
                WHERE wc_id_pk='$edit_id'";

            $result_charges = mysqli_query($db, $sql_charges);
            $row=mysqli_fetch_row($result_charges);

            {
                $cust_name = $row['1'];
                      $c_no = $row['27'];
                     $ph_no = $row['4'];
                    $da_te = $row['33'];
                      $add = $row['29'];
                     $pi_no = $row['59'].' /'.$row['65'];
            }


     $y = $this->GetY();
     $x = $this->GetX();

    $this->SetXY($x-5, $y-6.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,26,'  ',1,1,'C',0,false);   //

    $this->SetXY($x-5, $y-6.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'  Customer   :',0,1,'L',0,false);  
    $this->SetXY($x+19, $y-6.5);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7, $cust_name,0,1,'L',0,false);  
    
    $this->SetXY($x+125, $y-6.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'C.No.  :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y-6.5);
    $this->SetFont('Arial','',9);
    $this->Cell(15,7,$c_no,0,1,'L',0,false);


    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'  Phone No.  :',0,1,'L',0,false); 
    $this->SetXY($x+19, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7,$ph_no,0,1,'L',0,false); 
    
    $this->SetXY($x+125, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'Date    :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(15,7,$da_te ,0,1,'L',0,false);
    
    
    $this->SetXY($x-5, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'  Address     :',0,1,'L',0,false); 

    $this->SetXY($x+19, $y+5.5);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7,$add,0,1,'L',0,false);
    $this->SetXY($x+17, $y+10.5);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7,' ',0,1,'L',0,false);

    $this->SetXY($x+125, $y+6);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'PINo.   :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y+6);
    $this->SetFont('Arial','',9);
    $this->Cell(15,7,'PI/ '.$pi_no,0,1,'L',0,false);

    $this->SetXY($x-4, $y+13);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,' GST :',0,1,'L',0,false); 

   
    $this->Ln(-6);
    $y = $this->GetY();
    $x = $this->GetX();

               $this->SetXY($x-5, $y+5.5);
               $this->SetFont('Arial','B',9);
               $this->Cell(12,7,'Sr.No',1,1,'C',0,false);

                $this->SetXY($x+7, $y+5.5);    
                $this->SetFont('Arial','B',9);
                $this->Cell(57,7,'Discription Of Goods',1,1,'L',0,false);

                $this->SetXY($x+64, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(14,7,'',1,1,'L',0,false); //
                // $this->SetXY($x+64, $y+4.5);
                // $this->SetFont('Arial','B',8);
                // $this->Cell(14,6,' No.of ',0,1,'L',0,false);
                // $this->SetXY($x+64, $y+7.5);
                // $this->SetFont('Arial','B',8);
                // $this->Cell(14,6,' Goods ',0,1,'L',0,false);

                $this->SetXY($x+64, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(14,7,'HSN',1,1,'C',0,false);

                $this->SetXY($x+78, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(17,7,'GST Rate',1,1,'C',0,false);

                $this->SetXY($x+95, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(11,7,'Qty',1,1,'C',0,false);

                $this->SetXY($x+106, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(15,7,'Size',1,1,'C',0,false);

                $this->SetXY($x+121, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(22,7,'Rate',1,1,'C',0,false);

                $this->SetXY($x+143, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(22,7,'Disc. %',1,1,'C',0,false);
   
                $this->SetXY($x+165, $y+5.5);
                $this->SetFont('Arial','B',9);
                $this->Cell(30,7,' Amount  ',1,1,'R',0,false);
 
                // $sql_charges1 = " SELECT *
                //       FROM retail_return_goods_items AS rrgi, retail_return_goods AS rrg, retail_proforma_items AS rpi
                //       WHERE rrg.rp_id_fk AND rpi.id_pk AND rpi.rpi_id_fk AND rpi.item_id_fk ='$edit_id'";
            
                //       $result_charges1 = mysqli_query($db, $sql_charges1);
                //         $row=mysqli_fetch_row($result_charges1);


                      //  $db = mysqli_connect("localhost","root","","nks");  
                        $edit_id = 1;

                        $sql_charges1 = " SELECT *
		                FROM retail_return_goods_items AS ri, retail_proforma_items AS rpi, mstr_item AS mi
                        WHERE rrg_id_fk AND rpi_id_fk='$edit_id'";


              $result_charges1 = mysqli_query($db, $sql_charges1);
              $row=mysqli_fetch_row($result_charges1);
      {
            $y = $this->GetY();
            $x = $this->GetX();   
            $this->SetXY($x-5, $y);
            $this->SetFont('Arial','',9);
            $this->Cell(12,9,$row['1'],1,1,'C',0,false);   //

            $this->SetXY($x+7, $y);    
            $this->SetFont('Arial','B',9);
            $this->Cell(57,9,' ',1,1,'L',0,false);  //
            $this->SetXY($x+7, $y-0.5);
                $this->SetFont('Arial','',8);
                $this->Cell(57,8,$row['37']. ' + '.$row['39'],0,1,'L',0,false);  //  ' 4542IN-CP-GEOMETRIC SHOWERHEAD'
                $this->SetXY($x+7, $y+4.5);
                $this->SetFont('Arial','',8);
                $this->Cell(20,5,$row['38'],0,1,'L',0,false);       //  ASSY-NA


                $this->SetXY($x+64, $y);
                $this->SetFont('Arial','',9);
                $this->Cell(14,9,$row['36'],1,1,'C',0,false); //

                    $this->SetXY($x+78, $y);
                    $this->SetFont('Arial','',9);
                    $this->Cell(17,9,$row['13'],1,1,'C',0,false); //

                $this->SetXY($x+95, $y);
                $this->SetFont('Arial','',9);
                $this->Cell(11,9,$row['5'],1,1,'C',0,false);  //


                $this->SetXY($x+106, $y);
                $this->SetFont('Arial','',9);
                $this->Cell(15,9,$row['4'],1,1,'C',0,false);    //
                 
                $this->SetXY($x+121, $y);
                $this->SetFont('Arial','',9);
                $this->Cell(22,9,$row['8'],1,1,'C',0,false); //

                    $this->SetXY($x+143, $y);
                $this->SetFont('Arial','',9);
                $this->Cell(22,9,$row['9'],1,1,'C',0,false); //

                $this->SetXY($x+165, $y);
                $this->SetFont('Arial','',9);
                $this->Cell(30,9,$row['11'],1,1,'R',0,false); //

      }

     
   $this->Ln(1.5);
  $y = $this->GetY();
  $x = $this->GetX();

    $this->SetXY($x-5, $y-1.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(148,65,' ',1,1,'R',0,false);//
    $this->SetXY($x-4, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(50,10,' GST  Summary :   ',0,1,'L',0,false);
    // $this->SetXY($x-3, $y+10);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(143.5,28,' ',1,1,'R',0,false);  //

    $this->SetXY($x+18.5, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(26,12,' ',1,1,'C',0,false);   //

    $this->SetXY($x-3, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(143.5,12,'',1,1,'C',0,false);  //

    $this->SetXY($x-3, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(21.5,6,'HSN/SAC',0,1,'C',0,false);
  
    $this->SetXY($x+18.5, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(26,6,'Taxable Value ',0,1,'C',0,false);

    $this->SetXY($x+44.5, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(32,6,'Central Tax',1,1,'C',0,false);
    $this->SetXY($x+44.5, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(14,6,'Rate',1,1,'C',0,false);
    $this->SetXY($x+58.5, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(18,6,'Amount',1,1,'C',0,false);

    $this->SetXY($x+76.5, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(32,6,'State Tax',1,1,'C',0,false);
    $this->SetXY($x+76.5, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(14,6,'Rate',1,1,'C',0,false);
    $this->SetXY($x+90.5, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(18,6,' Amount ',1,1,'R',0,false);
   
    $this->SetXY($x+108.5, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(32,6,'Interstate Tax',1,1,'C',0,false);
    $this->SetXY($x+108.5, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(14,6,'Rate',1,1,'C',0,false);
    $this->SetXY($x+122.5, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(18,6,'Amount',1,1,'C',0,false);

//     $db = mysqli_connect("localhost","root","","nks");  
//     $edit_id = 1;

    $sql_charges2 = "SELECT * 
    FROM supplier_return_good AS sg, supplier_return_good_items AS si
    WHERE si.srg_id_fk AND sg.id_pk='$edit_id'";

                    $result_charges2 = mysqli_query($db, $sql_charges2);
                    $row1=mysqli_fetch_row($result_charges2);
            {
                
    $this->Ln(3);
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-3, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(21.5,7,$row1['36'],1,1,'C',0,false);    //  '6907'

   $this->SetXY($x-3, $y+4);
    $this->SetFont('Arial','',9);
    $this->Cell(21.5,7,' ',1,1,'C',0,false);   ///

    $this->SetXY($x+18.5, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(26,7,' ',1,1,'C',0,false);
    $this->SetXY($x+18.5, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(26,7,' ',1,1,'R',0,false);
      
    $this->SetXY($x+44.5, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(14,7,$row1['29'],1,1,'C',0,false);
    $this->SetXY($x+44.5, $y+4);
    $this->SetFont('Arial','',9);
    $this->Cell(14,7,' ',1,1,'C',0,false);   

    $this->SetXY($x+58.5, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(18,7,$row1['30'].' ',1,1,'R',0,false);
    $this->SetXY($x+58.5, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(18,7,$row1['30'].' ',1,1,'R',0,false);

    $this->SetXY($x+76.5, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(14,7,$row1['32'],1,1,'C',0,false);
    $this->SetXY($x+76.5, $y+4);
    $this->SetFont('Arial','',9);
    $this->Cell(14,7,'',1,1,'C',0,false); 

    $this->SetXY($x+90.5, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(18,7,$row1['33'].' ',1,1,'R',0,false);
    $this->SetXY($x+90.5, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(18,7,$row1['33'].' ',1,1,'R',0,false);

    $this->SetXY($x+108.5, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(14,7,'18.00%',1,1,'C',0,false);
    $this->SetXY($x+108.5, $y+4);
    $this->SetFont('Arial','',9);
    $this->Cell(14,7,' ',1,1,'C',0,false);

    $this->SetXY($x+122.5, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(18,7,'0.00 ',1,1,'R',0,false);
    $this->SetXY($x+122.5, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(18,7,'0.00 ',1,1,'R',0,false);
}
    // $db = mysqli_connect("localhost","root","","nks");  
    //   $edit_id = 1;

    //       $sql_charges3 = " SELECT *
    //         FROM retail_return_goods_items AS ri, retail_proforma_items AS rpi, mstr_item AS mi,retail_return_goods_items AS r
    //          WHERE ri.rrg_id_fk = r.id_pk AND r.rpi_id_fk= '$edit_id'";

    //              $result_charges3 = mysqli_query($db, $sql_charges3);
    //             while($row2=mysqli_fetch_row($result_charges3))

    //     {
     $this->Ln(3);

    // $db = mysqli_connect("localhost","root","","nks");  
     $edit_id = 1;

     $sql_charges3 = "SELECT * 
                      FROM retail_return_goods AS rg, retail_return_goods_items AS ri, retail_proforma AS rp, retail_proforma_items AS rpi, mstr_supplier AS ms
                      WHERE rg.rp_id_fk AND rp.id_pk AND ms.supplier_id_fk ='$edit_id'";

            $result_charges3 = mysqli_query($db, $sql_charges3);
            $row2=mysqli_fetch_row($result_charges3);

                      {
$this->Ln(2);
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+143, $y-42.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(52,65,'  ',1,1,'C',0,false);   //
    
    $this->SetXY($x+144, $y-40);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,'Process Amt   ',0,1,'L',0,false);
    $this->SetXY($x+174, $y-40);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['71'],0,1,'R',0,false);
    $this->SetXY($x+144, $y-34);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,'Trans Amt     ',0,1,'L',0,false);
    $this->SetXY($x+174, $y-34);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['15'],0,1,'R',0,false);
    $this->SetXY($x+144, $y-28);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,'Discount    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y-28);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['69'],0,1,'R',0,false);
    $this->SetXY($x+144, $y-21);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,'Tax    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y-21);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['27'],0,1,'R',0,false);
    $this->SetXY($x+144, $y-15);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,'Other    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y-15);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['70'],0,1,'R',0,false);
    $this->SetXY($x+144, $y-10);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,8,'Return Amt    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y-10);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,$row2['48'],0,1,'R',0,false);

    $this->SetXY($x+143, $y+13);
    $this->SetFont('Arial','B',9);
    $this->Cell(52,9.5,'  ',1,1,'L',0,false);       //  sd
    $this->SetXY($x+144, $y+14);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,'Total    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+14);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,$row2['67'],0,1,'R',0,false);
   
    // -------------------------------

    $this->SetXY($x-1, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,5,'Remark     : ',0,1,'L',0,false);
    $this->SetXY($x+20, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(35,5,$row2['54'],0,1,'L',0,false);     // $row2['16']


  //  $this->Cell(30,*,$row['60'],0,1,1'L',),false);

    $this->SetXY($x-1, $y+5);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'In Words   : ',0,1,'L',0,false);
    $this->SetXY($x+19, $y+5);
    $this->SetFont('Arial','',9);
    $this->Cell(40,8,convertNum($row2['67']).' only',0,1,'L',0,false);        // convertNum($row2['12']).

    // $this->SetXY($x-1, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(20,8,'GST No. :',0,1,'L',0,false);
    // $this->SetXY($x+17, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(25,8,$row2['107'],0,1,'L',0,false);                  //  $row2['6']
    // $this->SetXY($x+55, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(20,8,'PAN NO. : ',0,1,'L',0,false);
    // $this->SetXY($x+70, $y+14);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(20,8,$row2['106'],0,1,'R',0,false);     //  $row['108']
}
    // $this->SetXY($x+133, $y+45);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'FOR  Signature Concepts LLP.',0,1,'C',0,false);

    // $this->SetXY($x+135, $y+54);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

    // $this->SetXY($x-3, $y+54);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'Receiver Sign.',0,1,'L',0,false);
        //  }
    // }
 }
    function Footer()
    {
   
          
    }
   
   }

   
   $pdf=new this();                    //this();

  
    $pdf->AliasNbPages();

    //  $pdf = new PDF('','mm',array(200,250));
   // // Add new pages
   // // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();
   //      $pdf->Ln();
   
        $pdf->Output();
   
    ?>   