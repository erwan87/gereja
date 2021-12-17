<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH. 'libraries\tcpdf\tcpdf.php';

class Warta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('tcpdf');
        $this->load->model('dashboard/Dashboard_model','Dashboard',TRUE);

        set_zone();
        if ($this->session->userdata('role_id')!=1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap login untuk melanjutkan</div>');
            redirect('login');
        }
    }
    
    // Data Warta Start  //

    // Data Warta
    public function index()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Warta Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Warta Gereja",
            'view'		        => "v_wartaGereja"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Warta
    public function jsonWarta()
    {
        header('Content-Type: application/json');
        echo $this->Dashboard->json(
            '*
            ',
            'tbl_warta'
        );
    }

    // View Add Warta Gereja
    public function addWarta()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Add Warta Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Add Warta Gereja",
            'view'		        => "v_addWartaGereja"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Warta Gereja
    public function actionAddWarta()
    {
        // Rubah Format Warta Gereja Ke Dalam Format Mysql
        $pisah          = explode(" ", $this->input->post('tgl_warta'));
        $tgl_warta      = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
        
        $allowed_html="<strong><p><li><a><ul><div><ol><br><span><style><b><u><i>";

        $data   = [
            'tgl_warta'         => $tgl_warta,
            'dukungan'          => strip_tags($this->input->post('dukungan'), $allowed_html),
            'thanks'            => strip_tags($this->input->post('thanks'), $allowed_html)
        ];

        // Insert Data Ke Dalam Database
        if ($this->Dashboard->insert('tbl_warta',$data)) {
            redirect('Warta', 'refresh');
        }
    }

    // View Edit Warta Gereja
    public function editWarta($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit Warta Gereja",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'Warta'             => $this->Dashboard->viewWhere('tbl_warta','id_warta',$id)->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Beranda",
                'subbreadcumb'	    => "Edit Warta Gereja",
                'view'		        => "v_EditWartaGereja"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Warta Gereja
    public function actionEditWarta($id=0)
    {
        // Rubah Format Warta Gereja Ke Dalam Format Mysql
        $pisah          = explode(" ", $this->input->post('tgl_warta'));
        $tgl_warta      = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
        
        $allowed_html="<strong><p><li><a><ul><div><ol><br><span><style><b><u><i>";

        $updateWarta   = [
            'tgl_warta'         => $tgl_warta,
            'dukungan'          => strip_tags($this->input->post('dukungan'), $allowed_html),
            'thanks'            => strip_tags($this->input->post('thanks'), $allowed_html)
        ];

        // Update Data Ke Dalam Database
        if ($this->Dashboard->update('tbl_warta','id_warta',$id,$updateWarta)) {
            redirect('Warta', 'refresh');
        }
    }

    // Action Delete Warta Gereja
    public function deleteWarta($id=0)
    {
        if($id!=0){
            if($this->Dashboard->delete('id_warta','tbl_warta',$id)){
                redirect('Warta', 'refresh');
            }
        }
    }

    // Data Majalah
    public function Majalah()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Majalah Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Majalah Gereja",
            'view'		        => "v_majalahGereja"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Warta
    public function jsonMajalah()
    {
        header('Content-Type: application/json');
        echo $this->Dashboard->json(
            '*
            ',
            'tbl_warta_majalah'
        );
    }

    // View PDF Majalah
    public function viewMajalah($id=0)
    {
        if($id!=0){
            // Check Warta Majalah
            $checkMajalah       = $this->Dashboard->viewWhere('tbl_warta_majalah','id_warta_majalah',$id)->result_array();

            // Path File
            $path           = base_url('majalah/').$checkMajalah[0]['nama_file'];
            echo '<iframe src="../../majalah/'.$checkMajalah[0]['nama_file'].'" width="100%" style="height:100%;"></iframe>';
        }
    }

    // Make PDF Warta
    public function makePDFWarta()
    {
        $namaFile   = 'WartaGKS-'.tgl_indo1(date('Y-m-d')).'.pdf';

        // Check Apakah Di Database Ada Nama File Tersebut
        $checkFile  = $this->Dashboard->viewWhere('tbl_warta_majalah','nama_file',$namaFile)->num_rows();
        if($checkFile>0){
            redirect('Warta/Majalah','refresh');
        }else{
            $join       =  array(
                ['tbl_pendeta','tbl_jadwal.id_pendeta=tbl_pendeta.id_pendeta','LEFT']
                );
            $tglSkg     = date('Y-m-d H:i:s');
            $tgl2       = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($tglSkg)));
            $data       = [
                'warta'     => $this->Dashboard->viewWhereAssosiative('*','tbl_warta',['DATE(tgl_warta) >'    => $tglSkg, 'DATE(tgl_warta) <='  => $tgl2])->result_array(),
                'jadwal'    => $this->Dashboard->viewGlobalJoinWhereLimitOrder(
                    '
                        tbl_jadwal.id_jadwal AS id_jadwal,
                        tbl_jadwal.tgl_misa AS tgl_misa,
                        tbl_pendeta.nama_pendeta AS nama_pendeta
                    ',
                    'tbl_jadwal',
                    ['tbl_jadwal.tgl_misa >' => $tglSkg, 'tbl_jadwal.tgl_misa <=' => $tgl2],
                    $join,
                    4,
                    'tbl_jadwal.tgl_misa'
                    )->result_array(),
                'settings'  => $this->Dashboard->viewAll('*','tbl_settings')->result_array()
            ];

            // Insert Database
            $insert = [
                'nama_file'         => $namaFile,
                'tgl_terbit'        => date('Y-m-d')
            ];

            $this->load->view('contoh',$data);
            if($this->Dashboard->insert('tbl_warta_majalah',$insert)){
                redirect('Warta/Majalah','refresh');
            }
        }
    }

    // Delete Majalah
    public function deleteMajalah($id=0)
    {
        if($id!=0){
            // Check Nama File
            $checkFile      = $this->Dashboard->viewWhere('tbl_warta_majalah','id_warta_majalah',$id)->result_array();
            if(unlink(APPPATH.'../majalah/'.$checkFile[0]['nama_file'])){
                if($this->Dashboard->delete('id_warta_majalah','tbl_warta_majalah',$id)){
                    redirect('Warta/Majalah','refresh');
                }
            }else{
                redirect('Warta/Majalah','refresh');
            }
        }
    }

    // Warta Gereja End  //
}