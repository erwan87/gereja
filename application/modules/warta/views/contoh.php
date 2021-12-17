<?php
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->SetTitle('Warta GKS - '.tgl_indo(date('Y-m-d')));
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
    <table cellspacing="0" cellpadding="2" border="0">
        <tr>
            <td>
                <img src="assets/images/logo.jpeg" style="width:70px;height:70px;">
            </td>
            <td align="center">
                <img src="assets/images/warta.png" style="width:300px;height:120px;">
            </td>
            <td align="rigth">
                <img src="assets/images/gereja.jpg" style="width:70px;height:70px;">
            </td>
        </tr>
    </table>
    <table cellpadding="0" border="0">
        <tr>
            <td align="center"><b><font size="20">'.$settings[0]['nama_aplikasi'].'</font></b></td>
        </tr>
        <tr>
            <td align="center"><small>Minggu, 21 Februari 2020</small></td>
        </tr>
    </table>
    ';
    // <img src="assets/images/alamat.png" style="width:300px;height:80px;">
    $pdf->writeHTML($header, true, false, false, false, '');
    // Line
    $style  = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 0, 0));
    $pdf->Line(5, 42, 205, 42, $style);
    $cover  = '<img src="assets/images/gereja.jpg" style="width:550px;height:500px;">';
    $pdf->writeHTML($cover, true, false, false, false, '');
    $alamat = '<img src="assets/images/alamat.png" style="width:550px;height:70px;">';
    $pdf->writeHTML($alamat, true, false, false, false, '');
    
    // Page 2
    $pdf->AddPage();
    $pdf->writeHTML('<b>Jadwal Ibadah Tanggal : </b><b>'.tgl_indo($jadwal[0]['tgl_misa']).'</b>', true, false, false, false, '');
    $pdf->writeHTML('</br>', true, false, false, false, '');
    $tabelJadwal     = '
                        <table cellspacing="0" cellpadding="1" border="1">
                            <tr>
                                <td align="center">Tanggal</td>
                                <td align="center">Jam</td>
                                <td align="center">Pendeta</td>
                            </tr>';
                            foreach ($jadwal as $data) {
                            $tabelJadwal .='<tr>
                                <td align="center">'.tgl_indo($data['tgl_misa']).'</td>
                                <td align="center">'.date('H:i', strtotime($data['tgl_misa'])).' '.getWaktu(date('H:i', strtotime($data['tgl_misa']))).'</td>
                                <td align="left">'.$data['nama_pendeta'].'</td>
                            </tr>';}
                            $tabelJadwal .= '</table>';
$pdf->writeHTML($tabelJadwal, true, false, false, false, '');
$pdf->writeHTML('</br>', true, false, false, false, '');

// Line
$style  = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 0, 0));

// Get Count Data Array
$total  = count($jadwal);
$tambah = 0;
for ($i=0; $i < $total ; $i++) { 
    $tambah = ($total-1) * 7;
    if($i === $total-1){
        $pdf->Line(5, 35+$tambah, 205, 35+$tambah, $style);
    }
}

// Page 3
// Check if Data Not Null Show Page
$checkWarta = count($warta);
if($checkWarta !== 0){
    $pdf->AddPage();
    $tablejudul = '<table cellspacing="0" cellpadding="1" border="0">
    <tr>
        <td align="center1"><h2>Warta Gereja</h2></td>
    </tr>
    </table>';
    $pdf->writeHTML($tablejudul, true, false, false, false, '');
    $pdf->writeHTML($warta[0]['dukungan'], true, false, false, false, '');
    $pdf->writeHTML('</br>', true, false, false, false, '');
    $pdf->writeHTML($warta[0]['thanks'], true, false, false, false, '');
}

// Render Output
ob_clean();
$pdf->Output(APPPATH.'..\majalah\WartaGKS-'.tgl_indo1(date('Y-m-d')).'.pdf', 'FI');
?>