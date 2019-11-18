<?php
require('fpdf.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id=$_GET['id'];
    include '../modelos/Venta.php';
    $ob_venta=Venta::soloId($id);

    $venta=($ob_venta->selectVentaId())->fetch_assoc();

    $detalle=$ob_venta->detallesVenta();

    //var_dump($venta);
    $num_rows=mysqli_num_rows($detalle);

    
}else{
    die("ERROR");
    
}



class PDF extends FPDF
{
    public $id;
    public $fecha;
// Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('logo.jpg',18,8,70);
        // Arial bold 15
        $this->SetFont('Arial','B',11);
        // Movernos a la derecha
        $this->Cell(120);
        $this->Cell(60,10,'NIT: 13056825530',1,1,'C');
        $this->Cell(120);
        $this->Cell(60,10,'FACTURA',1,1,'C');
        $this->SetFont('Arial','B',15);
        $this->Cell(120);
        $this->Cell(60,10,'Nro '.$this->id,1,1,'C');

        $this->SetFont('Arial','B',15);
        $this->Cell(1);
        $this->Cell(60,10,'FECHA: '.$this->fecha,0,0,'C');
        
        
        $this->SetFont('Arial','B',7);
        $this->Cell(59);
        $this->Cell(60,10,'Autorizacion Nro  26256956002654 ',1,1,'C');
        // Salto de línea
        $this->SetFont('Arial','B',20);
        $this->Cell(50);
        $this->Cell(60,10,'FACTURA',0,1,'C');

        $this->Ln(1);
    }

    public function ID( $id)
    {
        $num=6;
        $factura='';
        $num=$num-strlen($id);
        for ($i=0; $i < $num; $i++) { 
            $factura.='0';
        }
        $factura.=$id;
        $this->id=$factura;
        $this->fecha=date('d-m-Y');
    }
    // Pie de página

    function Footer()
    {
    // Posición: a 1,5 cm del final
    $this->SetY(-25);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(40,10,utf8_decode('ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS.EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY '),0,1);
    $this->Cell(30,10,utf8_decode('Ley N° 453: "Los servicios deben suministrarse en condiciones de inocuoidad, calidad y seguridad"'),0,1,'L');

}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->ID($id);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(100,10,utf8_decode('Señor(a): '.$venta['nombre_cliente']." ".$venta['apellido_cliente']),0,0);
$pdf->Cell(50,10,utf8_decode('NIT/C.I. : '.$venta['nit']),0,1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(120,10,'CONCEPTO ',1,0,'C');
$pdf->Cell(30,10,'Cantidad ',1,0,'C');
$pdf->Cell(30,10,'SUB TOTAL ',1,1,'C');

$pdf->SetFont('Times','',12);
while ($row=$detalle->fetch_assoc()) {
    $pdf->Cell(120,10,utf8_decode($row['producto']),1,0);
    $pdf->Cell(30,10,utf8_decode($row['cantidad_pro']),1,0,'C');
    $pdf->Cell(30,10,utf8_decode($row['cantidad_pro']*$row['precio']),1,1,'C');

    

}
if ($num_rows<5) {
    for ($i=0; $i <6 ; $i++) { 
        $pdf->Cell(120,10,utf8_decode(''),1,0);
        $pdf->Cell(30,10,utf8_decode('-'),1,0,'C');
        $pdf->Cell(30,10,utf8_decode('-'),1,1,'C');
        }
}
$pdf->SetFont('Arial','B',13);
$pdf->Cell(120,10,'',0,0,'C');
$pdf->Cell(30,10,'TOTAL Bs.',1,0,'C');
$pdf->Cell(30,10,$venta['total_pago'],1,0,'C');







$pdf->Output();
?>