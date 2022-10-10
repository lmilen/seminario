<?php
    require("fpdf182/fpdf.php");
    require("conectar.php");
    
    class PDF extends FPDF{
        function Header(){
            $this->SetFont("Arial", "", 24);
            $this->Image("somelogo.png", 1, 1);
            $this->Cell(9);
            $this->Cell(10, 2, utf8_decode("Reporte Notas"), 1, 1, 'C');
        }
        function Body(){
            $my = conectObj();
            $sql = "SELECT nombredoc, asunto, calificacion, solicitante from solicitudes order by nombredoc";
            $stm = $my->prepare($sql);
            $stm->execute();
            $stm->bind_result($nombredoc, $asunto, $nota, $solicitante);
            $stm->store_result();
            $hay = $stm->num_rows;
            if($hay==0){
                $this->Cell(10, 3, "No hay registros que mostrar", 1, 1, 'C');
            }else{
                $this->SetFont("Arial", 'B', 12);
                $this->Ln();
                $this->SetTextColor(62, 72, 104);
                $this->Cell(11,1,"Nombre Proyecto", 1, 0, 'C');
                $this->Cell(4,1,"Asunto", 1, 0, 'C');
                $this->Cell(3,1,"Calificacion", 1, 0, 'C');
                $this->Cell(1,1,"Est", 1, 1, 'C');
                $this->SetFont("Arial", '', 10);
                $this->SetTextColor(0, 0, 0);
                while($stm->fetch()){
                    $nombre = utf8_decode($nombredoc);
                    $this->Cell(11,1,$nombredoc, 1, 0, 'C');
                    $this->Cell(4,1,$asunto, 1, 0, 'C');
                    $this->Cell(3,1,$nota, 1, 0, 'C');
                    $this->Cell(1,1,$solicitante, 1, 1, 'C');
                }
            }
            $stm->close();
        }
        function Footer(){
            $this->SetY(-2);
            $this->SetFont("Arial", 'I', 10);
            $this->Cell(0, 1, "Reporte Pdf", 0, 0, 'C');
        }
    }
    $pdf = new PDF('P', 'cm','letter');
    $pdf->SetAuthor("CableNaranja", true);
    $pdf->SetTitle("Reporte De Notas", true);
    $pdf->AddPage();
    $pdf->Body();
    // Encabezado del documento
    $pdf->Output();
    $pdf->Output("Reporte Final.pdf", 'F');
?>