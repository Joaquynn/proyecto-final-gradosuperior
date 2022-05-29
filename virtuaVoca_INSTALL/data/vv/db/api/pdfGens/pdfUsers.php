<?php
require('fpdf/fpdf.php');
session_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);

$pdf->Cell(0,10,'Informe de usuarios de VirtuaVoca', 0, 0, "C");
$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(95,10,'Creado por:', 0, 0, "C");
$pdf->Cell(95,10,'Fecha:', 0, 0, "C");
$pdf->Ln(5);
$pdf->Cell(95,10, $_SESSION["user"], 0, 0, "C");
$pdf->Cell(95,10, date('Y-m-d'), 0, 0, "C");
$pdf->Ln(20);



$pdf->Cell(70,10,'Usuario', 0, 0, "C");
$pdf->Cell(50,10,'Fecha de alta', 0, 0, "C");
$pdf->Cell(30,10,'Estado', 0, 0, "C");
$pdf->Cell(40,10,'Rol', 0, 0, "C");
$pdf->Ln(10);

include('../../db_connection.php');
$sql = "SELECT username, creationDate, status, role FROM users";
$res = $cx->query( $sql );
foreach ($res as $row) {
    foreach ($row as $col => $val) {
        if (is_numeric($col)) {
            if ($col == 2) {
                switch ($val) {
                    case '0':
                        $pdf->Cell(30,10,"No activado",1);
                        break;
                    case '1':
                        $pdf->Cell(30,10,"Funcional",1);
                        break;
                    case '2':
                        $pdf->Cell(30,10,"Baneado",1);
                        break;
                    default:
                        # code...
                        break;
                }
            } elseif ($col == 3) {
                switch ($val) {
                    case '0':
                        $pdf->Cell(40,10,"Usuario",1);
                        break;
                    case '1':
                        $pdf->Cell(40,10,"Administrador",1);
                        break;
                    default:
                        # code...
                        break;
                }
            } elseif ($col == 1) {
                $pdf->Cell(50,10,$val,1);
            } elseif ($col == 0) {
                $pdf->Cell(70,10,$val,1);
            }
        }
    }
    $pdf->Ln(10);
}

if ($_SESSION["role"] == 1) {
    $pdf->Output("D", "VirtuaVoca_Usuarios_".$_SESSION["user"]."_".date('Y-m-d').".pdf");
} else {
    header("Location: ../../../index.php?err=2");
}