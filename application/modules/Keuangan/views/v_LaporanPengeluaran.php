<?php
    // Cek Hari
    if(date('l')==="Sunday"){
        $hari   = 'Minggu';
    }else if(date('l')==="Monday"){
        $hari   = 'Senin';
    }else if(date('l')==="Tuesday"){
        $hari   = 'Selasa';
    }else if(date('l')==="Wednesday"){
        $hari   = 'Rabu';
    }else if(date('l')==="Thursday"){
        $hari   = 'Kamis';
    }else if(date('l')==="Friday"){
        $hari   = 'Jumat';
    }else{
        $hari   = 'Sabtu';
    }
    
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->SetTitle('ReportGKS - '.tgl_indo1(date('Y-m-d')));
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('GKS Kawungu');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    $pdf->SetTopMargin(5);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');
    
    // Page 1
    $pdf->AddPage();
    $header = '
    <table cellspacing="0" cellpadding="1" border="0">
        <tr>
            <td width="100px;">
                <img src="assets/images/logo.jpeg" style="width:70px;height:70px;">
            </td>
            <td align="center" width="350px;">
                <h1>LAPORAN KEUANGAN</h1>
            </td>
            <td align="rigth" width="100px;">
                <img src="assets/images/gereja.jpg" style="width:70px;height:70px;">
            </td>
        </tr>
    </table>
    <table cellpadding="0" border="0">
        <tr align="center">
            <td>PERIODE</td>
        </tr>
        <tr>
            <td align="center"> Dari '.tgl_indo(date('Y-m-d')).' s/d '.tgl_indo(date('Y-m-d')).'</td>
        </tr>
    </table>';
    $pdf->writeHTML($header, true, false, false, false, '');
    $pdf->writeHTML("</br>", true, false, false, false, '');
    
    // Line
    $style  = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 0, 0));
    $pdf->Line(5, 42, 205, 42, $style);

    $pdf->writeHTML("</br>", true, false, false, false, '');

    $table = '
    <table cellspacing="0" cellpadding="1" border="0">
        <tr>
            
        </tr>
    </table>
    <table cellpadding="0" border="1">
        <tr>
            <td>a</td>
        </tr>
    </table>';
    $pdf->writeHTML($table, true, false, false, false, '');
    // Render Output
    ob_clean();
    $pdf->Output(APPPATH.'..\report\keuangan\LaporanKeuanganGKS-'.tgl_indo1(date('Y-m-d')).'.pdf', 'FI');
?>