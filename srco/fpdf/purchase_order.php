<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

    require('fpdf182/fpdf.php');
    // include '../../partials/dbconnection.php';



// returns the number as an anglicized string



// $id = $_GET['pdf_id'];
    //$i=$_GET['id'];

    $code="";
    class PDF extends FPDF
    {

        function Header()
        {

        // $today = date("Y-m-d");
        // $this->Ln(1);
        // $this->Image('uploads/nks_aromas.jpg',15,17,41);


        $this->SetFont('Arial','B',10);
        $this->Cell(2,0,'',0,0);
        $this->Cell(0,25,'Soft The Next',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+1, $y+1);
        $this->Ln(2);


        $this->SetFont('Arial','',8);
        $this->Cell(2,0,'',0,0);
        $this->Cell(89,30,'Maharashtra',0,0);
        $this->SetFont('Arial','',12);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-2);
        $this->Ln(2);

        $this->SetFont('Arial','',8);
        $this->Cell(2,0,'',0,0);
        $this->Cell(89,38,'India',0,0);
        $this->SetFont('Arial','',12);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-6);
        $this->Ln(6);



        $this->SetLineWidth(0.1);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+50, $y-4);
        $this->SetFillColor(255,255,255);
        $this->SetFont('Arial','',28);
        $this->Cell(108,40,'PURCHASE ORDER',0,1,'C');
        

        $this->SetLineWidth(0.1);
        $this->SetFillColor(255,255,255);
        $this->SetFont('Arial','B',10);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+50, $y-12);
        $this->Cell(182,1,'#PO-00005',0,1,'C');
        // // horizontal line
        // $this->Line(10,37,200,37);

        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-13);
        $this->SetFont('Arial','B',10);
        $this->Cell(10,60,'Vendor Address',0,0);
        $this->Ln(15); 

        
        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-13);
        $this->SetFont('Arial','B',9);
        $this->SetTextColor(6, 69, 173);
        $this->Cell(2,66 ,'Anvi Perfumes','','','',false, "www.softthenext.com"); 

        $this->Ln(15); 


        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y+25);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(100,1,'Deliver To',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(29,1,'Date :',0,0);
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date =date('Y-m-d H:i:s');
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"12/11/2020",0,'L',1);        
        // $this->Cell(20,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(19); 
        

        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-12);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(86,1,'hr.softthenext',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(43,1,'Delivery Date :',0,0);
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date =date('Y-m-d H:i:s');
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"12/11/2020",0,'L',1);        
        // $this->Cell(20,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(1); 
        
        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y+1);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(86,5,'Maharashtra',0,0);
        
        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-88, $y+1);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(2,10,'India',0,0);


        $this->Cell(98,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y+4);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(36,1,'Ref# :',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"xyzasd",0,'L',1);        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(1);








        // $this->Cell(40,5,' ','LTR',0,'L',0);   // empty cell with left,top, and right borders
        $this->Cell(10,5,'#',1,0,'L',0);
        $this->Cell(40,5,'Item & Description	',1,0,'L',0);
        $this->Cell(30,5,'Qty',1,0,'L',0);
        $this->Cell(30,5,'444 Here',1,0,'L',0);
        $this->Cell(30,5,'555 Here',1,0,'L',0);


        $this->Ln();

        // $this->Cell(40,5,'Solid Here','LR',0,'C',0);  // cell with left and right borders
        $this->Cell(50,5,'[ o ] che1','LR',0,'L',0);
        $this->Cell(50,5,'[ x ] che2','LR',0,'L',0);
        $this->Cell(50,5,'[ x ] che2','LR',0,'L',0);


        $this->Ln();

        // $this->Cell(40,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
        $this->Cell(50,5,'[ x ] def3','LRB',0,'L',0);
        $this->Cell(50,5,'[ o ] def4','LRB',0,'L',0);

        $this->Ln();
        $this->Ln();
        $this->Ln();
        // $this->Cell(30,6,'1.1', 1,0, 'C');
        // $this->Cell(30,6,'1.2', 1,0, 'C');
        // $x = $this->GetX();
        // $y = $this->GetY();
        // $this->Cell(30,6,'1.3', 1,0);
        // $this->Cell(30,6,'1.4', 1,0);
        // $this->Cell(30,6,'1.5', 1,0);

        // // $this->Cell(40,6,'Words Here', 1,2);
        // // $this->SetX($x-80);
        // $this->Cell(40,6,'2.1', 1,0);
        // $this->Cell(40,6,'2.2', 1,1);
        // $this->SetX($y+50);
        // $this->Cell(40,6,'2.3', 1,1);
        // $this->Cell(40,6,'2.4', 1,1);
        // $this->SetX($x);
        // $this->Cell(40,6,'3.1', 1,0);
        // $this->Cell(40,6,'3.2', 1,1);
        // $this->SetX($x);
        // $this->Cell(40,6,'3.3', 1,0);
        // $this->Cell(40,6,'3.4', 1,1);


        // $this->SetFont('Arial','',10);
        // $this->Cell(10,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x, $y-15);
        // $this->SetTextColor(0, 0, 0);
        // $this->Cell(10,85,'Deliver To',0,0);
        
        // $this->SetFont('Arial','',10);
        // $this->Cell(110,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x, $y+1);
        // $this->Cell(30,0,'Date :',0,0);
        // date_default_timezone_set("Asia/Calcutta");
        // $date =date('Y-m-d H:i:s');
        // $this->Cell(0,1,"12/11/2020",0,'L',1);
        // $this->SetFont('Arial','B');
        // $this->Ln(20); 

        // $this->SetFont('Arial','',10);
        // $this->Cell(10,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x, $y+10);
        // $this->SetTextColor(0, 0, 0);
        // $this->Cell(10,85,'hr.softthenext',0,0);
        // $this->SetFont('Arial','',10);
        // $this->Cell(110,0,' ',0,0);
        // $this->Cell(30,0,'Delivery Date :',0,0);
        // date_default_timezone_set("Asia/Calcutta");
        // $date =date('Y-m-d H:i:s');
        // $this->Cell(0,1,"12/11/2020",0,'L',1);
        // $this->SetFont('Arial','B');
        // $this->Ln(20);
        // $this->SetFont('Arial','B',10);
        // $this->Cell(3,10,':',0,'L',0);
        // $this->SetFont('Arial','B',10);
        // date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        // $date =date('Y-m-d H:i:s');
        // $this->Cell(0,10,"12/11/2020",0,'L',1);
        // $this->Cell(87,0,'',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->Ln(15);


        

        
        // $this->SetFont('Arial','',10);
        // $this->Cell(1,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x, $y-15);
        // $this->Cell(51,1,'Due Date',0,0);
        
        // $this->SetFont('Arial','B',10);
        // $this->Cell(3,1,':',0,'L',0);
        // $this->SetFont('Arial','B',10);
        // date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        // $date =date('Y-m-d H:i:s');
        // $this->Cell(0,1,"12/11/2020",0,'L',1);
        // $this->Cell(87,0,'',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->Ln(20);

        // // vertical line
        // $this->Line(105,37,105,80);
        // // horizontal line
        // $this->Line(10,58,200,58);
        
        // //1.1 second column
        
        

        // // 1.2 first column
        // $this->SetFillColor(242,243,244);
        // $this->SetFont('Arial','B',10);
        // $this->Cell(-0.1,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetFillColor(242,243,244);
        // $this->SetFont('Arial','B',9);
        // $this->Cell(95,6,'Bill To',1,'L',1,TRUE);
      
        

        // // 1.2 second column
        
      
        // $this->Ln(20);
        // $this->SetFillColor(242,243,244);
        // $this->SetFont('Arial','B',10);
        // $this->Cell(95,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x, $y-20);
        // $this->SetFillColor(242,243,244);
        // $this->SetFont('Arial','B',9);
        // $this->Cell(95,6,'Ship To',1,'R',1,TRUE);
        

        // // 1.3 first column 
        // $this->SetFont('Arial','B',10);
        // $this->Cell(1,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x-190, $y-1);
        // $this->Cell(1,22,'HAFIZ MUSA TALATI',0,0);
        // $this->Ln(50);

        // $this->SetFont('Arial','',10);
        // $this->Cell(2,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x-1, $y-35);
        // $this->Cell(1,1,'BHARUCH',0,0);
        // $this->Ln(5);

        // $this->SetFont('Arial','',10);
        // $this->Cell(2,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x-1, $y-1);
        // $this->Cell(1,1,'8347748493',0,0);
        // $this->Ln(5);
        
        // $this->SetFont('Arial','',10);
        // $this->Cell(2,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x-1, $y-1);
        // $this->Cell(1,1,'BHARUCH',0,0);
        // $this->Ln(5);

        // // 1.3 second column 
        // $this->SetFont('Arial','',10);
        // $this->Cell(1,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x+94, $y-18);
        // $this->Cell(120,1,'BHARUCH',0,0);
        // $this->Ln(50);
        
        // $this->SetFont('Arial','',10);
        // $this->Cell(1,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x+94, $y-45.5);
        // $this->Cell(120,1,'8347748493',0,0);
        // $this->Ln(30);

        // $this->SetFont('Arial','',10);
        // $this->Cell(1,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x+94, $y-25.5);
        // $this->Cell(120,1,'BHARUCH',0,0);
        // $this->Ln(50);

        // $this->SetFont('Arial','',10);
        // $this->Cell(1,0,' ',0,0);
        // $y = $this->GetY();
        // $x = $this->GetX();
        // $this->SetXY($x+94, $y-46);
        // $this->Cell(120,1,'392230 Gujarat',0,0);
        // $this->Ln(50);


        ////border////
            
        // $width=$this -> w; // Width of Current Page
        // $height=$this -> h; // Height of Current Page
        // $edge=10;
        // $edge1=10;// Gap between line and border , change this value
        // $this->Line($edge, $edge1,$width-$edge,$edge1); // Horizontal line at top
        // $this->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
        // $this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left
        // $this->Line($width-$edge, $edge1,$width-$edge,$height-$edge); // Vetical line at Right
        
        /////border end////

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
