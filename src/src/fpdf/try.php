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
function convertTri($num, $tri) {
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


// $id = $_GET['pdf_id'];
    //$i=$_GET['id'];

     $code="";
    class PDF extends FPDF
    {

   

    }


    $pdf = new PDF();
    $pdf->AliasNbPages();

    // Add new pages
    // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();





//  $view_sql1="SELECT si.id,cgst_amount,sgst_amount,igst_amount,total_tax,total_other_charges_amt,total_other_charges_amt1,total_amount,mpt.name as payment_term,transport
//   from sales_invoice si,mstr_payment_term mpt WHERE sales_invoice_no='$id' and si.payment_term_fk= mpt.id";
// $show_result1=mysqli_query($db,$view_sql1) or die(mysqli_error($db));
// //$view_row = mysqli_fetch_assoc($show_result);
// $id1="";
// $cgst_amount="";
// $sgst_amount="";
// $igst_amount="";
// $total_tax="";
// $other_charges_amt="";
// $other_charges_amt1="";
// $other_charges_total="";
// $total_amount="";
// $payment_term="";
// $transport="";
// while ($view_row = mysqli_fetch_array($show_result1))
// {
//   $id1=$view_row['id'];
//   $cgst_amount=$view_row['cgst_amount'];
//   $sgst_amount=$view_row['sgst_amount'];
//   $igst_amount=$view_row['igst_amount'];
//   $total_tax=$view_row['total_tax'];
//   $other_charges_amt=$view_row['total_other_charges_amt'];
//   $other_charges_amt1=$view_row['total_other_charges_amt1'];
//   $other_charges_total=$other_charges_amt +$other_charges_amt1;
//   $total_amount=$view_row['total_amount'];
//   $payment_term=$view_row['payment_term'];
//   $transport=$view_row['transport'];


// }

// $view_sql2="SELECT soi.id,so.sales_order_no,soi.po_line_no,mi.code,sii.invoice_quantity,mi.description,mi.drawing_no,
// mi.revision_no,mi.hsn,mi.sac,soi.quantity,soi.unit,soi.rate,soi.total,input_type,discount_percent,discount_rs,
// cgst,sgst,igst from sales_invoice si, sales_invoice_items sii, sales_order so
// ,sales_order_item soi,mstr_item mi, mstr_tax mt 
// WHERE si.sales_invoice_no='$id' and si.id=sii.sales_invoice_fk and sii.sales_order_fk=so.id and 
// sii.sales_order_items_fk =soi.id and so.id=soi.sales_order_id_fk and soi.item_id_fk=mi.id and 
// mi.tax_id_fk=mt.id";
// $show_result2=mysqli_query($db,$view_sql2) or die(mysqli_error($db));
// //$view_row = mysqli_fetch_assoc($show_result);
// $total1=0;
// $discount_rs1=0;
// $i = 1;
//   $row1 = mysqli_num_rows($show_result2);

// while ($view_row = mysqli_fetch_array($show_result2))
// {


//   $count=$i++;
//   $sales_order_no=$view_row['sales_order_no'];
//   $po_line_no=$view_row['po_line_no'];
//   $item_code=$view_row['code'];
//   $description=$view_row['description'];
//   $drawing_no=$view_row['drawing_no'];
//   $h_no="HeatNo";
//   $hsn_code=$view_row['hsn'];
//   $order_quantity=$view_row['invoice_quantity'];
//   $rate=$view_row['rate'];
//   $discount_percent=$view_row['discount_percent'];
//   $discount_percent=number_format($discount_percent,0);
//   $discount_rs=$view_row['discount_rs'];
//   $total=$order_quantity * $rate;
//   $totalamount=($order_quantity * $rate)-$discount_rs;
//   $pdf->SetFont('Arial','',8);

//   $pdf->Cell(11,8,$count,1,'L',1);

//   // $pdf->Cell(28,6,'Purchase Order No',1,'L',1);
//   $pdf->MultiCell(24,8,$sales_order_no,1,1);
//   $y = $pdf->GetY();
//   $x = $pdf->GetX();
//   $pdf->SetXY($x + 35, $y - 8);
//   $pdf->MultiCell(13,8,$po_line_no,1,1);
//   $pdf->SetXY($x + 48, $y - 8);
//   $pdf->MultiCell(30,8,$item_code,1,1);
//   $pdf->SetXY($x + 78, $y - 8);
//   $pdf->MultiCell(28,4,$description." ".$drawing_no,1,1);
//   $pdf->SetXY($x + 106, $y - 8);
//   $pdf->MultiCell(15,8,$h_no,1,1);
//   $pdf->SetXY($x + 121, $y - 8);
//   $pdf->MultiCell(20,8,$hsn_code,1,'C',false);
//   $pdf->SetXY($x + 141, $y - 8);
//   $pdf->MultiCell(11,8,$order_quantity,1,'C',false);
//   $pdf->SetXY($x + 152, $y - 8);
//   $pdf->Cell(13,8,$rate,1,0,'R');
//   $pdf->MultiCell(11,8, $discount_percent."%",1,'R',false);
//   $pdf->SetXY($x + 176, $y - 8);
//   $pdf->SetFont('Arial','',10);
//   $totalamount1= number_format((float)$totalamount, 2, '.', '');
//   $pdf->Cell(19,8,$totalamount1,1,0,'R');
//   //
//   // $total1=$total1+$total;
//   // $discount_rs1=$discount_rs1+$discount_rs;


//   $pdf->Ln();

// }

// $row1 = mysqli_num_rows($show_result2);
// if($row1==10 || $row1==20  || $row1==30 || $row1==40 || $row1==50 || $row1==60 || $row1==70 || $row1==80 || $row1==90 || $row1==100)
// {

//   $pdf->Ln(-1);
// }
// if($row1==9 || $row1==19 || $row1==29 || $row1==39 || $row1==49 || $row1==59 || $row1==69 || $row1==79 || $row1==89 || $row1==99)
// {
//   $pdf->Ln(7);
// }
// if($row1==8 || $row1==18 || $row1==28 || $row1==38 || $row1==48 || $row1==58 || $row1==68 || $row1==78 || $row1==88 || $row1==98)
// {
//   $pdf->Ln(15);
// }
// if($row1==7 || $row1==17 || $row1==27 || $row1==37 || $row1==47 || $row1==57  || $row1==67 || $row1==77 ||  $row1==87 ||$row1==97)
// {
//   $pdf->Ln(23);
// }
// if($row1==6 || $row1==16 || $row1==26 || $row1==36 || $row1==46 || $row1==56  || $row1==66 || $row1==76 ||  $row1==86 ||$row1==96)
// {
//   $pdf->Ln(31);
// }
// if($row1==5 || $row1==15 || $row1==25 || $row1==35 || $row1==45 || $row1==55  || $row1==65 || $row1==75 ||  $row1==85 ||$row1==95)
// {
//   $pdf->Ln(39);
// }
// if($row1==4 || $row1==14 || $row1==24 || $row1==34 || $row1==44 || $row1==54  || $row1==64 || $row1==74 ||  $row1==84 ||$row1==94)
// {
//   $pdf->Ln(47);
// }
// if($row1==3 || $row1==13 || $row1==23 || $row1==33 || $row1==43 || $row1==53  || $row1==63 || $row1==73 ||  $row1==83 ||$row1==93)
// {
//   $pdf->Ln(55);
// }
// if($row1==2 || $row1==12 || $row1==22 || $row1==32 || $row1==42 || $row1==52  || $row1==62 || $row1==72 ||  $row1==82 ||$row1==92)
// {
//   $pdf->Ln(63);
// }
// if($row1==11 || $row1==1 || $row1==21 || $row1==31 || $row1==41 || $row1==51  || $row1==61 || $row1==71 ||  $row1==81 ||$row1==97)
// {
//   $pdf->Ln(71);
// }

// else{
//       //
//       // $pdf->Ln(13);
// }



    
      $pdf->Ln();

    $pdf->Output();

?>
