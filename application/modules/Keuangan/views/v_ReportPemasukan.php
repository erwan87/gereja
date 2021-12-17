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
                <h1>LAPORAN PEMASUKAN</h1>
            </td>
            <td align="rigth" width="100px;">
                <img src="assets/images/gereja.jpg" style="width:70px;height:70px;">
            </td>
        </tr>
    </table>
    <table cellpadding="0" border="0">
        <tr>
            <td align="center">'.$hari.', '.tgl_indo(date('Y-m-d')).'</td>
        </tr>
    </table>
    ';
    $pdf->writeHTML($header, true, false, false, false, '');
    $pdf->writeHTML("</br>", true, false, false, false, '');
    // Line
    $style  = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 0, 0));
    $pdf->Line(5, 42, 205, 42, $style);

    $laporan = '
    <table cellspacing="0" cellpadding="2" border="1">
        ';
        foreach ($catMenu as $menu) {
            $laporan .='
            <tr>
                <td colspan="2" style="background-color:gray;">
                    '.$menu['nama_akun'].'
                </td>
            </tr>';
            $total = 0;
            foreach ($pemasukan as $data) {
                $total += $data['totnom'];
                if($data['id_akun']===$menu['id_akun']){
                    $laporan .='
                    <tr style="margin-left:150px;">
                        <td>
                        '.$data['nama_sub_akun'].'
                        </td>
                        <td>
                        Rp. '.number_format($data['totnom'],0,',','.').'
                        </td>
                    </tr>';
                }
            }
        }
    $laporan .='</table>';

    $laporan .='
    <table cellspacing="0" cellpadding="2" border="1">
    <tr style="background-color:green">
        <td>  Total</td>
        <td>  Rp. '.number_format($total,0,',','.').'</td>
    </tr>
    </table>';
    $pdf->writeHTML($laporan, true, false, false, false, '');

    // Render Output
    ob_clean();
    $pdf->Output(APPPATH.'..\report\ReportGKS-'.tgl_indo1(date('Y-m-d')).'.pdf', 'FI');
?>