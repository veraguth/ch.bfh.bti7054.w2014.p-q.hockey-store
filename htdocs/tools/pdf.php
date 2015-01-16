<?php
require('fpdf.php');

class PDF extends FPDF
{
//Kopfzeile
function Header()
{
    
	//Address Line
	$this->SetFont('Arial','B',10);
	$this->Cell(55,0,'Bier Shop AG GmbH usw');
	$this->Cell(55,0,'Wankdorffeldstrasse 102');
	$this->Cell(30,0,'3000 Bern');
	$this->Cell(30,0,'033 555 222 111');
	//Line Feed
	$this->Ln(1);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
	//Line Feed
	$this->Ln(10);
    //Titel
	$this->SetX(60);
    $this->Cell(65,20,'Bier-Shop Bestellung',1,0,'C');
	//Logo 2
    $this->Image('../image/logo.jpg',150,15,33);
    //Line Feed
    $this->Ln(40);
}

//Fusszeile
function Footer()
{
    //Position 2 cm von unten
    $this->SetY(-20);
    //Arial kursiv 8
    $this->SetFont('Arial','',8);
    //Seitenzahl
    $this->Cell(0,10,'Seite '.$this->PageNo().'/{nb}',0,0,'C');
}

function Address()
{
	$this->SetY(75);
	$this->SetFont('Arial','',12);
	$this->Cell(80,6,'Name, Vorname','');
	$this->Ln();
	$this->Cell(80,6,'Strasse und Hausnummer','');
	$this->Ln();
	$this->Cell(80,6,'PLZ / ORT','');
	$this->Ln();
}

//Load data
function LoadData($file)
{
    //Read file lines
    $lines=file($file);
    $data=array();
    foreach($lines as $line)
        $data[]=explode(';',chop($line));
    return $data;
}

//Calculate Total price
function Sum($data)
{
	$sum=0.00;
	foreach($data as $row)
	{
		$sum = $sum + $row[2];
	}
	$sum=number_format((float)$sum, 2, '.', "'");
	return $sum;
}


//Create Table
function Table($header, $data, $sum)
{
	//Set Starting Position Y
	$this->SetY(120);
    // Column widths
    $w = array(120, 35, 15);
    // Header
	$this->SetFont('Arial','B',15);
    for($i=0;$i<count($header);$i++)
	{
		$this->Cell($w[$i],7,$header[$i],0,0,'');
	}
    $this->Ln(10);
    // Data
	
    foreach($data as $row)
    {
		//Insert Table Header as soon as a new Page is created
		if(round($this->GetY()) >= 270)
		{
			$this->SetFont('Arial','B',15);
			for($i=0;$i<count($header);$i++)
			{
				$this->Cell($w[$i],7,$header[$i],0,0,'');
			}
			$this->Ln(10);
		}
		
		//Insert Table and Data on Page
		$this->SetFont('Arial','',12);
		
        $this->Cell($w[0],6,$row[0]);
        $this->Cell($w[1],6,$row[1]);
        $this->Cell($w[2],6,number_format((float)$row[2], 2, '.', "'"),'','','R');
        $this->Ln();
		
    }
    // Closing line: 1 Cell as Wide as the First three of the Table and one Cell as Wide as the last Cell.
	$this->Ln(12);
	$this->SetFont('Arial','B',15);
    $this->Cell((array_sum($w)-$w[2]),0,'Total','');
	$this->Cell($w[2],0,$sum,'','','R');
}

}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();

$pdf->Address();

$header=array('Produkt','Anzahl','Preis');
$data=$pdf->LoadData('temp.txt');
$sum=$pdf->Sum($data);
$pdf->Table($header, $data, $sum);

$pdf->Output('Bestellung.pdf', 'I');

?>