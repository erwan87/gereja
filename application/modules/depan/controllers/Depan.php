<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Depan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Depan_model','Depan',TRUE);
        $this->load->helper('download');

        set_zone();
    }

    public function index()
    {
        $join   =  array(
                    ['tbl_pendeta','tbl_jadwal.id_pendeta=tbl_pendeta.id_pendeta','LEFT']
                    );
        $join1   =  array(
            ['tbl_lingkungan','tbl_kegiatan_lingkungan.id_lingkungan=tbl_lingkungan.id_lingkungan','LEFT'],
            ['tbl_jemaat r','tbl_kegiatan_lingkungan.tempat=r.id_jemaat','LEFT'],
            ['tbl_jemaat b','tbl_kegiatan_lingkungan.penanggungjawab=b.id_jemaat','LEFT'],
            );
        
        $tglSkg = date('Y-m-d H:i:s');
        $data   = [
            'titles'    => "Halaman Depan || Gereja Jemaat Kawungu",
            'Jadwal'    => $this->Depan->viewGlobalJoinWhereLimit(
                '
                    tbl_jadwal.id_jadwal AS id_jadwal,
                    tbl_jadwal.tgl_misa AS tgl_misa,
                    tbl_pendeta.nama_pendeta AS nama_pendeta
                ',
                'tbl_jadwal',
                ['tbl_jadwal.tgl_misa >' => $tglSkg],
                $join,
                4
                )->result_array(),
            'Lingkungan'    => $this->Depan->viewGlobalJoinWhereLimit(
                '
                    tbl_kegiatan_lingkungan.*,
                    tbl_lingkungan.nama_lingkungan AS nama_lingkungan,
                    r.nama_jemaat AS nama_jemaat,
                    b.nama_jemaat AS nama,
                ',
            'tbl_kegiatan_lingkungan',
            ['tbl_kegiatan_lingkungan.tgl_kegiatan >' => $tglSkg],
            $join1,4)->result_array(),
            'Depan'     => true,
            'settings'  => $this->Depan->viewAll('*','tbl_settings')->result_array(),
            'view'      => "v_Depan"
        ];
        $this->load->view("index", $data);
    }

    // View Pendeta List
    public function pendeta()
    {
        $data   = [
            'titles'    => "Halaman Depan || List Pendeta",
            'Depan'     => true,
            'settings'  => $this->Depan->viewAll('*','tbl_settings')->result_array(),
            'pendeta'   => $this->Depan->viewAll('*','tbl_pendeta')->result_array(),
            'view'      => "v_Pendeta"
        ];
        $this->load->view("index", $data);
    }

    // List All Jadwal Ibadah
    public function JadwalMisa()
    {
        $tglSkg = date('Y-m-d H:i:s');
        $join   =  array(
            ['tbl_pendeta','tbl_jadwal.id_pendeta=tbl_pendeta.id_pendeta','LEFT']
            );
        $data   = [
            'titles'    => "Halaman Depan || List Jadwal Ibadah",
            'settings'  => $this->Depan->viewAll('*','tbl_settings')->result_array(),
            'Jadwal'    => $this->Depan->viewGlobalJoinWhere(
                '
                    tbl_jadwal.id_jadwal AS id_jadwal,
                    tbl_jadwal.tgl_misa AS tgl_misa,
                    tbl_pendeta.nama_pendeta AS nama_pendeta
                ',
                'tbl_jadwal',
                ['tbl_jadwal.tgl_misa >' => $tglSkg],
                $join
                )->result_array(),
            'Depan'     => true,
            'pendeta'   => $this->Depan->viewAll('*','tbl_pendeta')->result_array(),
            'view'      => "v_Jadwal"
        ];
        $this->load->view("index", $data);
    }
    
    // Detail Jadwal Ibadah
    public function detailJadwal($id=0)
    {
        if($id!=0){
            $join   =  array(
                ['tbl_pendeta','tbl_jadwal.id_pendeta=tbl_pendeta.id_pendeta','LEFT']
                );
            $data   = [
                'titles'    => "Halaman Depan || Detail Misa",
                'Depan'     => true,
                'settings'  => $this->Depan->viewAll('*','tbl_settings')->result_array(),
                'Jadwal'    => $this->Depan->viewGlobalJoinWhere('*','tbl_jadwal',['id_jadwal'  => $id],$join)->result_array(),
                'view'      => "v_DetailJadwal"
            ];
            $this->load->view("index", $data);
        }
    }

    // List All Jadwal Kegiatan Lingkungan
    public function JadwalLingkungan()
    {
        $tglSkg = date('Y-m-d H:i:s');
        $join   =  array(
            ['tbl_lingkungan','tbl_kegiatan_lingkungan.id_lingkungan=tbl_lingkungan.id_lingkungan','LEFT'],
            ['tbl_jemaat r','tbl_kegiatan_lingkungan.tempat=r.id_jemaat','LEFT'],
            ['tbl_jemaat b','tbl_kegiatan_lingkungan.penanggungjawab=b.id_jemaat','LEFT'],
            );
        $data   = [
            'titles'    => "Halaman Depan || List Jadwal Ibadah",
            'settings'  => $this->Depan->viewAll('*','tbl_settings')->result_array(),
            'Jadwal'    => $this->Depan->viewGlobalJoinWhereLimit(
                '
                    tbl_kegiatan_lingkungan.*,
                    tbl_lingkungan.nama_lingkungan AS nama_lingkungan,
                    r.nama_jemaat AS nama_jemaat,
                    b.nama_jemaat AS nama,
                ',
                'tbl_kegiatan_lingkungan',
                ['tbl_kegiatan_lingkungan.tgl_kegiatan >' => $tglSkg],
                $join,4)->result_array(),
            'Depan'     => true,
            'view'      => "v_JadwalLingkungan"
        ];
        $this->load->view("index", $data);
    }

    // View Warta Gereja
    public function WartaGereja()
    {
        $data   = [
            'titles'    => "Halaman Depan || Warta Gereja",
            'Depan'     => true,
            'settings'  => $this->Depan->viewAll('*','tbl_settings')->result_array(),
            'warta'     => $this->Depan->viewAllLimit('*','tbl_warta_majalah','id_warta_majalah','DESC', 5)->result_array(),
            'view'      => "v_ViewWarta"
        ];
        $this->load->view("index", $data);
    }

    // Download PDF
    public function DownloadPDf($id=0)
    {
        if($id!=0){
            // Check table_warta_gereja
            $checkWarta     = $this->Depan->viewWhere('tbl_warta_majalah','id_warta_majalah',$id)->result_array();

            // Path File
            $path           = base_url('majalah/').$checkWarta[0]['nama_file'];
            
            // Check File Exist in Folder Majalah
            if (fopen($path, 'r')){
                $data = file_get_contents($path); // Read the file's contents
                force_download($checkWarta[0]['nama_file'], $data); 
            }else{
                redirect('Depan','refresh');
            }
        }
    }

    // View Contact Page
    public function Contact()
    {
        $data   = [
            'titles'    => "Halaman Depan || Contact",
            'Depan'     => true,
            'settings'  => $this->Depan->viewAll('*','tbl_settings')->result_array(),
            'view'      => "v_Contact"
        ];
        $this->load->view("index", $data);
    }
}