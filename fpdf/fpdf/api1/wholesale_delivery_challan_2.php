
<?php
 //include('C:\xampp\htdocs\NKS\database\dbconnection.php');
//  include('../../database/dbconnection.php');

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

    $x = $this->GetX();
    $y = $this->GetY();

                
    $this->SetXY($x+145, $y+1);
    $this->SetFont('arial','',8);
    $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
    $this->SetXY($x+148, $y);
    $this->SetFont('arial','',8);
    $this->Cell(18,5,'Original PDF',0,1,'L',0,false);
    $this->SetXY($x+170, $y+1);
    $this->SetFont('arial','',8);
    $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
    $this->SetXY($x+173, $y);
    $this->SetFont('arial','',8);
    $this->Cell(20,5,'Duplicate PDF',0,1,'L',0,false);
    
    $this->SetXY($x-5, $y+5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,30,'  ',1,1,'C',0,false);  // CELL 1
    $today = date("Y-m-d");

    $y = $this->GetY();
    $x = $this->GetX();

    
    // $this->SetXY($x-4, $y-36);
    // $this->SetFont('arial','',8);
    // $this->Cell(18,5,'Original PDF',1,1,'L',0,false);
    // $this->SetXY($x+15, $y-36);
    // $this->SetFont('arial','',8);
    // $this->Cell(20,5,'Duplicate PDF',1,1,'L',0,false);

    $this->SetXY($x-5, $y-29);
    $this->SetFont('Arial','B',11);
    $this->Cell(200,8,'DELIVERY CHALLAN',0,1,'C',0,false);
    $this->SetXY($x, $y+10);
    $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',65,17,12);
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-20);
    $this->SetFont('Arial','B',13);
    $this->Cell(200,-15,'  Signature Concepts LLP',0,1,'C',0,false);
    $this->Ln();
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y+20);
    $this->SetFont('Arial','',8);
    $this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y-15);
    $this->SetFont('Arial','',8);
    $this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+44, $y-9.5);
    $this->SetFont('Arial','',8);
    $this->Cell(40,7,'Phone No : 7757033204',0,1,'C',0,false);

 
    $this->SetXY($x+92, $y-9.5);
    $this->SetFont('Arial','',8);
    $this->Cell(40,7,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);

    // $db = mysqli_connect("localhost","root","","nks");  
    // $edit_id = 1; 

 
    
    // $sql_charges = "SELECT *, twc.cust_name
    // FROM  tbl_wholesale_customer AS twc, wholesale_delivery_challan AS wdc
    // WHERE twc.wc_id_pk = '$edit_id'";

//     $sql_charges = " SELECT * ,td.site_address,wdc.net_amt
//      FROM  tbl_wholesale_customer AS twc, wholesale_delivery_challan AS wdc, wholsale_delivery_challan_items AS wci, tbl_wholesale_customer_site_details AS td, mstr_transporter_vehicle AS mv
//       WHERE wd_ch_id_pk AND dci_id_pk AND  wci.dci_id_pk = wci.cust_id_fk ='$edit_id'";  


//    $result_charges = mysqli_query($db, $sql_charges) or die (mysqli_error($db));
//    $row=mysqli_fetch_array($result_charges);




// $sql_charges = "SELECT *
//                      FROM  tbl_wholesale_customer AS twc, wholesale_delivery_challan AS wdc
//                      WHERE wd_ch_id_pk AND dci_id_pk ='$edit_id'"; 

// $sql_charges = "SELECT twc.*
// FROM  tbl_wholesale_customer AS twc,wholesale_delivery_challan AS wdc, wholsale_delivery_challan_items AS wci, tbl_wholesale_customer_site_details AS td
// WHERE dci_id_pk AND  wci.dci_id_pk = wci.cust_id_fk  AND wd_ch_id_pk  ='$edit_id'"; 

// echo $sql_charges = "SELECT twc.*
// FROM  tbl_wholesale_customer AS twc,
// 		wholesale_delivery_challan AS wdc, 
//         wholsale_delivery_challan_items AS wci, 
//         tbl_wholesale_customer_site_details AS td
// WHERE   wdc.cust_id_fk = twc.wc_id_pk  AND wdc.wd_ch_id_pk  ='$edit_id'";


    
include('../../database/dbconnection.php');


$edit_id = 1;        //$_GET['id']; 

        // $sql_charges = "SELECT distinct twc.*, td.site_name, td.site_address
        //                 FROM tbl_wholesale_customer AS twc, wholesale_delivery_challan AS wdc, wholsale_delivery_challan_items AS wci, tbl_wholesale_customer_site_details AS td
        //                 WHERE wdc.cust_id_fk = twc.wc_id_pk AND wdc.wd_ch_id_pk ='$edit_id'";

        $sql_charges = "SELECT distinct twc.*, td.site_name, td.site_address
				FROM tbl_wholesale_customer AS twc, wholesale_delivery_challan AS wdc, wholsale_delivery_challan_items AS wci, 
                tbl_wholesale_customer_site_details AS td 				
                WHERE td.site_id_pk AND wdc.cust_id_fk = twc.wc_id_pk AND wdc.wd_ch_id_pk = '$edit_id'";

    $result_charges = mysqli_query($db, $sql_charges) or die (mysqli_error($db));
    $row=mysqli_fetch_array($result_charges);
 {           
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-0.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,31,'  ',1,1,'C',0,false);   // CELL 2

    $this->SetXY($x, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,5,'Customer   :',0,1,'L',0,false);
    $this->SetXY($x+21, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(60,5,$row['1'],0,1,'L',0,false);           //$row['1'] 

    $this->SetXY($x+125, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'     SO NO.    :',0,1,'L',0,false);
    $this->SetXY($x+147, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(40,5,$row['0'],0,1,'L',0,false);

    $this->SetXY($x, $y+5);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,5,'          Site   :',0,1,'L',0,false);
    $this->SetXY($x+21, $y+5);
    $this->SetFont('Arial','',9);
    $this->Cell(60,5,$row['24'],0,1,'L',0,false);

    $this->SetXY($x+125, $y+5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'      DC NO.   :',0,1,'L',0,false);
    $this->SetXY($x+147, $y+5);
    $this->SetFont('Arial','',9);
  //  $this->Cell(50,5,$row['24'],0,1,'L',0,false);
      /// $this->Cell(45,8,$row['72'],0,1,'L',0,false);

    $this->SetXY($x, $y+10);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,5,' Site Add.   :',0,1,'L',0,false);
    $this->SetXY($x+21, $y+10);
    $this->SetFont('Arial','',9);
  //  $this->Cell(105,5,$row['77'],0,1,'L',0,false);   

    $this->SetXY($x+125, $y+10);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,5,'    DC Date    :',0,1,'L',0,false);
    $this->SetXY($x+147, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(50,5,$row['16'],0,1,'L',0,false);

     $this->SetXY($x+21, $y+15);
     $this->SetFont('Arial','',9);
     $this->Cell(10,5,'Ph.No.',0,1,'L',0,false);
     $this->SetXY($x+32, $y+15);
     $this->SetFont('Arial','',9);
     $this->Cell(20,5,$row['4'],0,1,'L',0,false);

     $this->SetXY($x, $y+24);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,5,'  GST NO.   :',0,1,'L',0,false);   //   mstr_supplier
     $this->SetXY($x+21, $y+24);
     $this->SetFont('Arial','',9);
     $this->Cell(45,5,$row['15'],0,1,'L',0,false);

     $this->SetXY($x+125, $y+19);
     $this->SetFont('Arial','B',9);
     $this->Cell(22,5,'       PO No    :',0,1,'L',0,false);
     $this->SetXY($x+147, $y+19);
     $this->SetFont('Arial','',9);
   $this->Cell(40,5,'OK',0,1,'L',0,false);       //   $row['30']

   $this->SetXY($x+125, $y+24);
   $this->SetFont('Arial','B',9);
   $this->Cell(22,5,'Vehical No.   :',0,1,'L',0,false);
   $this->SetXY($x+147, $y+24);
   $this->SetFont('Arial','',9);
  // $this->Cell(40,5,$row['72'],0,1,'L',0,false);

 }
 $this->Ln(-1);
 // $this->Ln(10);
 $y = $this->GetY();
 $x = $this->GetX();
 $this->SetXY($x-5, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,7,'  ',1,1,'C',0,false); // CELL 5

     $this->SetXY($x-5, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,8,' No. ',0,1,'C',0,false); //Head

     $this->SetXY($x+5, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(65,7,'  ',1,1,'C',0,false); // CELL 6
 
      $this->SetXY($x+5, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(65,8,' Product Name ',0,1,'C',0,false); //Head

      
      $this->SetXY($x+70, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(30,7,'  ',1,1,'C',0,false); // CELL 7
 
      $this->SetXY($x+70, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(30,7,' Remark ',0,1,'C',0,false); //Head
 
      $this->SetXY($x+100, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(40,7,'  ',1,1,'C',0,false); // CELL 8
 
      $this->SetXY($x+100, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(40,7,' Size ',0,1,'C',0,false); // Head
 
      $this->SetXY($x+140, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(55,7,'  ',1,1,'C',0,false); // CELL 9
 
      $this->SetXY($x+140, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(55,7,' QTY ',0,1,'C',0,false); // Head

    
// $this->ln(10);
//     $y = $this->GetY();
//     $x = $this->GetX();

//     $this->SetXY($x-5, $y);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(10,18,'  ',1,1,'C',0,false); //Head

    // $this->SetXY($x+5, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(65,24,'  ',1,1,'C',0,false); //Head

    // $this->SetXY($x+70, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(30,24,'  ',1,1,'C',0,false); //Head

    // $this->SetXY($x+100, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(40,24,'  ',1,1,'C',0,false); // Head

    // $this->SetXY($x+140, $y);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(55,24,' ',1,1,'C',0,false); // Head

    // $this->Ln(3);

    $db = mysqli_connect("localhost","root","","nks");  
    $edit_id = 1;

    $sql_charges2 = "SELECT *
    FROM wholsale_delivery_challan_items AS w, mstr_item AS m
    WHERE  w.item_id_fk = M.item_id_pk ='$edit_id'";
    
    $result_charges2 = mysqli_query($db, $sql_charges2) or die (mysqli_error($db));
    while($row1=mysqli_fetch_row($result_charges2))
   {
       
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(10,8,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(65,8,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+70, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,8,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+100, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(40,8,'  ',1,1,'C',0,false); // Head

    $this->SetXY($x+140, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(55,8,' ',1,1,'C',0,false); // Head

   //  -------------------------------------
    
     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(10,6,$row1['2'],0,1,'C',0,false);

     $this->SetXY($x+5, $y);
      $this->SetFont('Arial','',9);
      $this->Cell(65,6,$row1['21']. '-'.$row1['22'],0,1,'L',0,false);   

     $this->SetXY($x+70, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(30,6,$row1['10'],0,1,'C',0,false);

     $this->SetXY($x+100, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(40,6,$row1['24'],0,1,'C',0,false);

    $this->SetXY($x+140, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(55,6,$row1['4'],0,1,'C',0,false);

     $this->SetXY($x+145, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(40,6,$row1['26'],0,1,'R',0,false);
 
     $this->Ln(1.7);
    }

   // $db = mysqli_connect("localhost","root","","nks");  
    $edit_id = 1;

    $sql_charges5 = "SELECT * 
    FROM tbl_wholesale_customer AS tc
    WHERE tc.wc_id_pk ='$edit_id'";
    
    $result_charges5 = mysqli_query($db, $sql_charges5) or die (mysqli_error($db));
    while($row5=mysqli_fetch_row($result_charges5))
   {
       
    $this->Ln(-15);
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y+15.5);
    $this->SetFont('Arial','',15);
    $this->Cell(200,25,'  ',1,1,'C',0,false);  // CELL 3

    $this->SetXY($x+2, $y+24);
    $this->SetFont('Arial','',9);
    $this->Cell(20,5,'  GST No.   : ',0,1,'L',0,false);
    $this->SetXY($x+23, $y+24);
    $this->SetFont('Arial','',9);
   $this->Cell(32,5,$row5['15'],0,1,'L',0,false);

    //   -----------

    $this->SetXY($x+57, $y+24);
    $this->SetFont('Arial','',9);
    $this->Cell(18,5,' PAN No. : ',0,1,'L',0,false);
    $this->SetXY($x+75, $y+24);
    $this->SetFont('Arial','',9);
    $this->Cell(32,5,$row5['9'],0,1,'L',0,false);    /// $row['9']  
    
    $this->SetXY($x+105, $y+18);
    $this->SetFont('Arial','B',10);
    $this->Cell(40,5,' Grand Total',0,1,'C',0,false);

    $this->SetXY($x+159, $y+18);
    $this->SetFont('Arial','B',10);
    $this->Cell(20,5,$row5['6'],0,1,'C',0,false);

//     $this->SetXY($x+140, $y+18);
//     $this->SetFont('Arial','B',9);
//    $this->Cell(55,5,$row['80'],0,1,'C',0,false);   // $row['31']
  
   }
   $this->Ln(4);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+120, $y+3);
    $this->SetFont('Arial','B',13);
    $this->Cell(68,15,'NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

    $this->Ln(14);
    $this->SetXY($x+6, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(20,15,'Receivers Sign.',0,1,'L',0,false);

    
    $this->SetXY($x+140, $y+16);
    $this->SetFont('Arial','',9);
    $this->Cell(50,5,'FOR Signature Concepts LLP',0,1,'L',0,false);

    $this->SetXY($x+146, $y+21);
    $this->SetFont('Arial','',9);
    $this->Cell(20,15,'Authorised Sign.',0,1,'L',0,false);



}

function Footer()
{
     
}

}

//   Fpdf::SetAutoPageBreak(TRUE, 0);

$pdf= new this();

// $pdf = new PDF('L','mm',array(173,120));
$pdf->AliasNbPages();

// $barWidth = ( 1 / $xScale );
$pdf->AliasNbPages();
// $pdf->SetAutoPageBreak(false);
// $pdf->AddPage(M);

// $y_axis_initial = 40;

// //initialize counter
// $i = 0;

// //Set maximum rows per page
// $max = 25;
// $y_axis = 40;

// //Set Row Height
// $row_height = 6;

// $y_axis = $y_axis + $row_height;

// // Add new pages

// $pdf->SetAutoPageBreak(true,130);
// $pdf->AddPage();

//      $pdf->Ln();

    $pdf->Output();

?>   