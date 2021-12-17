<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('dashboard/Dashboard_model','Dashboard',TRUE);

        set_zone();
        if ($this->session->userdata('role_id')!=1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap login untuk melanjutkan</div>');
            redirect('login');
        }
    }
    
    // Data Kegiatan Start  //

    // Data Kegiatan Lingkungan
    public function index()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Kegiatan Lingkungan",
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "Kegiatan Lingkungan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_kegiatanLingkungan"
        ];
        $this->load->view("index", $data);
    }

    // Data Kegiatan End   //

    // Data Jadwal Ibadah
    public function misa()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Jadwal Ibadah",
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "Jadwal Ibadah",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_jadwalMisa"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data User
    public function jsonTglMisa()
    {
        header('Content-Type: application/json');
        $join   = array(
            ['tbl_pendeta','tbl_jadwal.id_pendeta=tbl_pendeta.id_pendeta','LEFT'],
        );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_jadwal.*,
                tbl_pendeta.nama_pendeta AS nama_pendeta
            ',
            'tbl_jadwal',
            $join
        );
    }

    // Action Add Tanggal Misa
    public function addTglMisa()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Tanggal Ibadah",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'pendeta'           => $this->Dashboard->viewAll('*','tbl_pendeta')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "Add Tanggal Ibadah",
            'view'		        => "v_AddTanggalMisa"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Tanggal Ibadah
    public function actionAddTanggalMisa()
    {
        // Rubah Format Tanggal Misa Ke Dalam Format Mysql
        $pisah      = explode(" ", $this->input->post('tgl_misa'));
        $tgl_misa   = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0].' '.$this->input->post('jam').':'.$this->input->post('jam1');

        $data   = [
            'tgl_misa'          => $tgl_misa,
            'id_pendeta'        => htmlentities($this->input->post('pendeta')),
            'pembuka'           => htmlentities($this->input->post('pembuka')),
            'nats'              => htmlentities($this->input->post('nats')),
            'pujian'            => htmlentities($this->input->post('pujian')),
            'pengakuan'         => htmlentities($this->input->post('pengakuan')),
            'berita'            => htmlentities($this->input->post('berita')),
            'pujian1'           => htmlentities($this->input->post('pujian1')),
            'petunjuk'          => htmlentities($this->input->post('petunjuk')),
            'pujian2'           => htmlentities($this->input->post('pujian2')),
            'renungan'          => htmlentities($this->input->post('renungan')),
            'persembahan'       => htmlentities($this->input->post('persembahan')),
            'pujian3'           => htmlentities($this->input->post('pujian3')),
            'penutup'           => htmlentities($this->input->post('penutup')),
        ];

        // Insert Data Ke Dalam Database
        if ($this->Dashboard->insert('tbl_jadwal',$data)) {
            redirect('Kegiatan/misa', 'refresh');
        }
    }

    // View Edit Tanggal Ibadah
    public function editTanggalMisa($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit Tanggal Ibadah",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'pendeta'           => $this->Dashboard->viewAll('*','tbl_pendeta')->result_array(),
                'TglMisa'           => $this->Dashboard->viewWhere('tbl_jadwal','id_jadwal',$id)->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Beranda",
                'subbreadcumb'	    => "Edit Tanggal Ibadah",
                'view'		        => "v_EditTanggalMisa"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Tanggal Ibadah
    public function actionEditTanggalMisa($id=0)
    {
        // Rubah Format Tanggal Misa Ke Dalam Format Mysql
        $pisah      = explode(" ", $this->input->post('tgl_misa'));
        $tgl_misa   = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0].' '.$this->input->post('jam').':'.$this->input->post('jam1');

        $updateTglMisa  = [
            'tgl_misa'          => $tgl_misa,
            'id_pendeta'        => htmlentities($this->input->post('pendeta')),
            'pembuka'           => htmlentities($this->input->post('pembuka')),
            'nats'              => htmlentities($this->input->post('nats')),
            'pujian'            => htmlentities($this->input->post('pujian')),
            'pengakuan'         => htmlentities($this->input->post('pengakuan')),
            'berita'            => htmlentities($this->input->post('berita')),
            'pujian1'           => htmlentities($this->input->post('pujian1')),
            'petunjuk'          => htmlentities($this->input->post('petunjuk')),
            'pujian2'           => htmlentities($this->input->post('pujian2')),
            'renungan'          => htmlentities($this->input->post('renungan')),
            'persembahan'       => htmlentities($this->input->post('persembahan')),
            'pujian3'           => htmlentities($this->input->post('pujian3')),
            'penutup'           => htmlentities($this->input->post('penutup')),
        ];
        
        // Update Data Ke Dalam Database
        if ($this->Dashboard->update('tbl_jadwal','id_jadwal',$id,$updateTglMisa)) {
            redirect('Kegiatan/misa', 'refresh');
        }
    }

    // Action Delete Tanggal Misa
    public function deleteTanggalMisa($id=0)
    {
        if($id!=0){
            if($this->Dashboard->delete('id_jadwal','tbl_jadwal',$id)){
                redirect('Kegiatan/misa', 'refresh');
            }
        }
    }

    // Detail Acara Misa
    public function detailMisa($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Detail Kegiatan Ibadah",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'detMisa'           => $this->Dashboard->viewWhere('tbl_jadwal','id_jadwal',$id)->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Beranda",
                'subbreadcumb'	    => "Detail Kegiatan Ibadah",
                'view'		        => "v_DetailKegiatanMisa"
            ];
            $this->load->view("index", $data);
        }
    }

    // View Edit Detail Jadwal Ibadah
    public function editDetailJadwal($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || View Edit Detail Kegiatan Ibadah",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'detMisa'           => $this->Dashboard->viewWhere('tbl_jadwal','id_jadwal',$id)->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Beranda",
                'subbreadcumb'	    => "View Edit Detail Kegiatan Ibadah",
                'view'		        => "v_ViewEditDetailKegiatanMisa"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Detail Jadwal Ibadah
    public function actioneditDetailJadwal($id=0)
    {
        if($id!=0){
            $updateTglMisa  = [
                'pembuka'           => htmlentities($this->input->post('pembuka')),
                'nats'              => htmlentities($this->input->post('nats')),
                'pujian'            => htmlentities($this->input->post('pujian')),
                'pengakuan'         => htmlentities($this->input->post('pengakuan')),
                'berita'            => htmlentities($this->input->post('berita')),
                'pujian1'           => htmlentities($this->input->post('pujian1')),
                'petunjuk'          => htmlentities($this->input->post('petunjuk')),
                'pujian2'           => htmlentities($this->input->post('pujian2')),
                'renungan'          => htmlentities($this->input->post('renungan')),
                'persembahan'       => htmlentities($this->input->post('persembahan')),
                'pujian3'           => htmlentities($this->input->post('pujian3')),
                'penutup'           => htmlentities($this->input->post('penutup')),
            ];
            
            // Update Data Ke Dalam Database
            if ($this->Dashboard->update('tbl_jadwal','id_jadwal',$id,$updateTglMisa)) {
                redirect('Kegiatan/misa', 'refresh');
            }
        }
    }

    // Data Jadwal Ibadah End   //

    // Data Kegiatan Lingkungan Start   //
    public function lingkungan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Edit Detail Kegiatan Misa",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Kegiatan Lingkungan",
            'view'		        => "v_jadwalLingkungan"
        ];
        $this->load->view("index", $data);
    }

    // View Add Kegiatan Lingkungan
    public function addKegiatanLingkungan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Kegiatan Lingkungan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
            'jemaat'            => $this->Dashboard->viewAll('*','tbl_jemaat')->result_array(),
            'wilayah'           => $this->Dashboard->viewAll('*','tbl_wilayah')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "Add Kegiatan Lingkungan",
            'view'		        => "v_AddKegiatanLingkungan"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Kegiatan Lingkungan
    public function jsonKegiatanLingkungan()
    {
        header('Content-Type: application/json');
        $join   = array(
            ['tbl_lingkungan','tbl_kegiatan_lingkungan.id_lingkungan=tbl_lingkungan.id_lingkungan','LEFT'],
            ['tbl_jemaat r','tbl_kegiatan_lingkungan.tempat=r.id_jemaat','LEFT'],
            ['tbl_jemaat b','tbl_kegiatan_lingkungan.penanggungjawab=b.id_jemaat','LEFT'],
            ['tbl_wilayah','tbl_kegiatan_lingkungan.wilayah=tbl_wilayah.id_wilayah','LEFT'],
        );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_kegiatan_lingkungan.*,
                tbl_lingkungan.nama_lingkungan AS nama_lingkungan,
                r.nama_jemaat AS nama_jemaat,
                b.nama_jemaat AS nama,
                tbl_wilayah.nama_wilayah AS nama_wilayah
            ',
            'tbl_kegiatan_lingkungan',
            $join
        );
    }

    // Action Add Kegiatan Lingkungan
    public function actionAddKegiatanLingkungan()
    {
        // Rubah Format Tanggal Kegiatan Lingkungan Ke Dalam Format Mysql
        $pisah          = explode(" ", $this->input->post('tgl_kegiatan'));
        $tgl_kegiatan   = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];

        $data   = [
            'tgl_kegiatan'      => $tgl_kegiatan,
            'id_lingkungan'     => htmlentities($this->input->post('lingkungan')),
            'tempat'            => htmlentities($this->input->post('tempat')),
            'penanggungjawab'   => htmlentities($this->input->post('penanggungJawab')),
            'wilayah'           => htmlentities($this->input->post('wilayah'))
        ];
        
        // Insert Data Ke Dalam Database
        if ($this->Dashboard->insert('tbl_kegiatan_lingkungan',$data)) {
            redirect('Kegiatan/lingkungan', 'refresh');
        }
    }

    // Action Edit Kegiatan Lingkungan
    public function editKegiatanLingkungan($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit Kegiatan Lingkungan",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'kegiatanLingk'     => $this->Dashboard->viewWhere('tbl_kegiatan_lingkungan','id_kegiatan_lingkungan',$id)->result_array(),
                'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
                'jemaat'            => $this->Dashboard->viewAll('*','tbl_jemaat')->result_array(),
                'wilayah'           => $this->Dashboard->viewAll('*','tbl_wilayah')->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Beranda",
                'subbreadcumb'	    => "Action Edit Kegiatan Lingkungan",
                'view'		        => "v_EditKegiatanLingkungan"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Kegiatan Lingkungan
    public function actionEditKegiatanLingkungan($id=0)
    {
        // Rubah Format Tanggal Kegiatan Lingkungan Ke Dalam Format Mysql
        $pisah          = explode(" ", $this->input->post('tgl_kegiatan'));
        $tgl_kegiatan   = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];

        $update = [
            'tgl_kegiatan'      => $tgl_kegiatan,
            'id_lingkungan'     => htmlentities($this->input->post('lingkungan')),
            'tempat'            => htmlentities($this->input->post('tempat')),
            'penanggungjawab'   => htmlentities($this->input->post('penanggungJawab')),
            'wilayah'           => htmlentities($this->input->post('wilayah'))
        ];
        
        // Update Data Ke Dalam Database
        if ($this->Dashboard->update('tbl_kegiatan_lingkungan','id_kegiatan_lingkungan',$id,$update)) {
            redirect('Kegiatan/lingkungan', 'refresh');
        }
    }
    
    // Action Delete Kegiatan Lingkungan
    public function deleteKegiatanLingkungan($id=0)
    {
        if($id!=0){
            if($this->Dashboard->delete('id_kegiatan_lingkungan','tbl_kegiatan_lingkungan',$id)){
                redirect('Kegiatan/lingkungan', 'refresh');
            }
        }
    }
    
    // Data Kegiatan Lingkungan End    //
}