<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH. 'libraries\tcpdf\tcpdf.php';

class Keuangan extends CI_Controller
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
    
    // Data Keuangan Start  //

    // Data Keuangan
    public function index()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Keuangan Pemasukan Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Keuangan Pemasukan",
            'view'		        => "v_Keuangan"
        ];
        $this->load->view("index", $data);
    }

    // Get Akun
    public function getAkun()
    {
        // $mainAkun       = $this->input->post('mainAkun');
        $mainAkun       = $this->input->post('mainAkun');
        $checkMainAkun  = $this->Dashboard->viewWhere('tbl_akun','id_main_akun',$mainAkun)->result_array();
        echo '<option value=""> -- Silahkan Pilih --</option>';
        foreach ($checkMainAkun as $data) {
            echo '<option value="'.$data['id_akun'].'">'.$data['nama_akun'].'</option>';
        }
    }

    // Get Akun
    public function getAkun1()
    {
        // $mainAkun       = $this->input->post('mainAkun');
        $mainAkun       = $this->input->post('mainAkun');
        $checkMainAkun  = $this->Dashboard->viewWhere('tbl_akun','id_main_akun',1)->result_array();
        foreach ($checkMainAkun as $data) {
            echo '<option value="'.$data['id_akun'].'">'.$data['nama_akun'].'</option>';
        }
    }

    // Get Sub Akun
    public function getSubAkun()
    {
        $checksubakun  = $this->Dashboard->viewWhere('tbl_sub_akun','id_akun',1)->result_array();
        echo '<option value=""> -- Silahkan Pilih --</option>';
        foreach ($checksubakun as $data) {
            echo '<option value="'.$data['id_sub_akun'].'">'.$data['nama_sub_akun'].'</option>';
        }
    }

    // Get Sub Akun 3
    public function getSubAkun3()
    {
        $checksubakun  = $this->Dashboard->viewWhere('tbl_sub_akun','id_akun',3)->result_array();
        echo '<option value=""> -- Silahkan Pilih --</option>';
        foreach ($checksubakun as $data) {
            echo '<option value="'.$data['id_sub_akun'].'">'.$data['nama_sub_akun'].'</option>';
        }
    }

    // Get Sub Akun
    public function getSubAkunLing()
    {
        $checksubakun  = $this->Dashboard->viewWhere('tbl_sub_akun','id_akun',2)->result_array();
        echo '<option value=""> -- Silahkan Pilih --</option>';
        foreach ($checksubakun as $data) {
            echo '<option value="'.$data['id_sub_akun'].'">'.$data['nama_sub_akun'].'</option>';
        }
    }

    // Get Sub Akun Pengeluaran
    public function getSubAkunPengeluaran()
    {
        $akun           = $this->input->post('Akun');
        echo $akun;
        $checksubakun   = $this->Dashboard->viewWhere('tbl_sub_akun','id_akun',$akun)->result_array();
        echo '<option value=""> -- Silahkan Pilih --</option>';
        foreach ($checksubakun as $data) {
            echo '<option value="'.$data['id_sub_akun'].'">'.$data['nama_sub_akun'].'</option>';
        }
    }

    // View Pemasukan
    public function Pemasukan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Keuangan Pemasukan Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Keuangan Pemasukan",
            'view'		        => "v_Pemasukan"
        ];
        $this->load->view("index", $data);
    }

    // View Datatable Json Pemasukan
    public function jsonPemasukan()
    {
        header('Content-Type: application/json');
        $join   = array(
            ['tbl_main_akun','tbl_pemasukan.id_main_akun=tbl_main_akun.id_main_akun','LEFT'],
            ['tbl_akun','tbl_pemasukan.id_akun=tbl_akun.id_akun','LEFT'],
            ['tbl_sub_akun','tbl_pemasukan.id_sub_akun=tbl_sub_akun.id_sub_akun','LEFT']
        );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_pemasukan.*,
                tbl_main_akun.nama_main_akun AS nama_main_akun,
                tbl_akun.nama_akun AS nama_akun,
                tbl_sub_akun.nama_sub_akun AS nama_sub_akun
            ',
            'tbl_pemasukan',
            $join
        );
    }

    // View Add Pemasukan
    public function addPemasukan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Pemasukan Keuangan Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'mainAkun'          => $this->Dashboard->viewAll('*','tbl_main_akun')->result_array(),
            // 'Akun'              => $this->Dashboard->viewAll('*','tbl_akun')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "Add Pemasukan Keuangan",
            'view'		        => "v_AddPemasukan"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Pemasukan
    public function actionAddPemasukan()
    {
        $pisah          = explode(" ", $this->input->post('tgl_pemasukan'));
        $tgl_pemasukan  = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
        $data   = [
            'id_main_akun'      => 1,
            'id_akun'           => htmlentities($this->input->post('Akun')),
            'id_sub_akun'       => htmlentities($this->input->post('subAkun')),
            'tanggal'           => $tgl_pemasukan,
            'nominal'           => htmlentities($this->input->post('nominal'))
        ];

        // Insert Data to Database
        if($this->Dashboard->insert('tbl_pemasukan',$data)){
            redirect('Keuangan/Pemasukan');
        }
    }

    // View Edit Pemasukan
    public function editPemasukan($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Dashboard View Edit Pemasukan",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'pemasukan'         => $this->Dashboard->viewWhere('tbl_pemasukan','id_pemasukan',$id)->result_array(),
                'akun'              => $this->Dashboard->viewAll('*','tbl_akun')->result_array(),
                'subakun'           => $this->Dashboard->viewAll('*','tbl_sub_akun')->result_array(),
                // 'akun'              => $this->Dashboard->viewAll('*','tbl_akun')->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Dashboard",
                'subbreadcumb'	    => "View Edit Pemasukan",
                'view'		        => "v_EditPemasukan"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Pemasukan
    public function actionEditPemasukan($id=0)
    {
        if($id!=0){
            $pisah          = explode(" ", $this->input->post('tgl_pemasukan'));
            $tgl_pemasukan  = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
            $update = [
                'id_main_akun'      => 1,
                'id_akun'           => htmlentities($this->input->post('Akun')),
                'id_sub_akun'       => htmlentities($this->input->post('subAkun')),
                'tanggal'           => $tgl_pemasukan,
                'nominal'           => htmlentities($this->input->post('nominal'))
            ];

            // Update into Database
            if($this->Dashboard->update('tbl_pemasukan', 'id_pemasukan', $id, $update)){
                redirect('Keuangan/Pemasukan');
            }
        }
    }

    // Action Delete Pemasukan
    public function deletePemasukan($id=0)
    {
        if($id!=0){
            if($this->Dashboard->delete('id_pemasukan','tbl_pemasukan',$id)){
                redirect('Keuangan/Pemasukan');
            }
        }
    }

    // View Report Pemasukan
    public function ReportPemasukan()
    {
        $join   = array(
                            ['tbl_sub_akun','tbl_pemasukan.id_sub_akun=tbl_sub_akun.id_sub_akun','LEFT'],
                            ['tbl_akun','tbl_pemasukan.id_akun=tbl_akun.id_akun','LEFT'],
                        );
        $data	= [
            'titles'	        => "Dashboard Administrator || View Report Pemasukan Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'catMenu'           => $this->Dashboard->viewGlobalJoinGroupOrder('tbl_pemasukan.*,tbl_akun.nama_akun AS nama_akun','tbl_pemasukan', $join, array('tbl_akun.nama_akun'),
            'tbl_akun.nama_akun')->result_array(),
            'pemasukan'         => $this->Dashboard->viewGlobalJoinGroupOrder(
                                '
                                tbl_pemasukan.id_pemasukan AS id_pemasukan,
                                tbl_pemasukan.id_main_akun AS id_main_akun,
                                sum(tbl_pemasukan.nominal) AS totnom,
                                tbl_pemasukan.id_akun AS id_akuna,
                                tbl_pemasukan.id_sub_akun AS id_sub_akuna,
                                tbl_pemasukan.tanggal AS tanggala,
                                tbl_pemasukan.nominal AS nominal,
                                sum(tbl_pemasukan.nominal) AS totnominal,
                                tbl_akun.id_akun AS id_akun,
                                tbl_akun.nama_akun AS nama_akun,
                                tbl_sub_akun.nama_sub_akun AS nama_sub_akun
                                ',
                                'tbl_pemasukan',
                                $join,
                                array('tbl_sub_akun.nama_sub_akun'),
                                'tbl_pemasukan.id_pemasukan'
                                )->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Report Pemasukan"
            // 'view'		        => "v_ReportPemasukan1"
        ];
        
        $this->load->view("v_ReportPemasukan.php", $data);
        // $this->load->view("index", $data);
    }

    // View Pengeluaran
    public function Pengeluaran()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Keuangan Pengeluaran Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Keuangan Pengeluaran",
            'view'		        => "v_Pengeluaran"
        ];
        $this->load->view("index", $data);
    }

    // View Datatable Json Pengeluaran
    public function jsonPengeluaran()
    {
        header('Content-Type: application/json');
        $join   = array(
            ['tbl_main_akun','tbl_pengeluaran.id_main_akun=tbl_main_akun.id_main_akun','LEFT'],
            ['tbl_akun','tbl_pengeluaran.id_akun=tbl_akun.id_akun','LEFT'],
            ['tbl_sub_akun','tbl_pengeluaran.id_sub_akun=tbl_sub_akun.id_sub_akun','LEFT']
        );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_pengeluaran.*,
                tbl_main_akun.nama_main_akun AS nama_main_akun,
                tbl_akun.nama_akun AS nama_akun,
                tbl_sub_akun.nama_sub_akun AS nama_sub_akun
            ',
            'tbl_pengeluaran',
            $join
        );
    }

    // View Add Pengeluaran
    public function addPengeluaran()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Pengeluaran Keuangan Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'mainAkun'          => $this->Dashboard->viewAll('*','tbl_main_akun')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "Add Pengeluaran Keuangan",
            'view'		        => "v_AddPengeluaran"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Pengeluaran
    public function actionAddPengeluaran()
    {
        $pisah              = explode(" ", $this->input->post('tgl_pengeluaran'));
        $tgl_pengeluaran    = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
        $data   = [
            'id_main_akun'      => 2,
            'id_akun'           => htmlentities($this->input->post('Akun')),
            'id_sub_akun'       => htmlentities($this->input->post('subAkun')),
            'tanggal'           => $tgl_pengeluaran,
            'nominal'           => htmlentities($this->input->post('nominal'))
        ];

        // Insert Data to Database
        if($this->Dashboard->insert('tbl_pengeluaran',$data)){
            redirect('Keuangan/Pengeluaran');
        }
    }

    // View Edit Pengeluaran
    public function editPengeluaran($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Dashboard View Edit Pengeluaran",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'pengeluaran'       => $this->Dashboard->viewWhere('tbl_pengeluaran','id_pengeluaran',$id)->result_array(),
                'akun'              => $this->Dashboard->viewAll('*','tbl_akun')->result_array(),
                'subakun'           => $this->Dashboard->viewAll('*','tbl_sub_akun')->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Dashboard",
                'subbreadcumb'	    => "View Edit Pengeluaran",
                'view'		        => "v_EditPengeluaran"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Pengeluaran
    public function actionEditPengeluaran($id=0)
    {
        if($id!=0){
            $pisah              = explode(" ", $this->input->post('tgl_pengeluaran'));
            $tgl_pengeluaran    = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
            $update = [
                'id_main_akun'      => 1,
                'id_akun'           => htmlentities($this->input->post('Akun')),
                'id_sub_akun'       => htmlentities($this->input->post('subAkun')),
                'tanggal'           => $tgl_pengeluaran,
                'nominal'           => htmlentities($this->input->post('nominal'))
            ];

            // Update into Database
            if($this->Dashboard->update('tbl_pengeluaran', 'id_pengeluaran', $id, $update)){
                redirect('Keuangan/Pengeluaran');
            }
        }
    }

    // Action Delete Pengeluaran
    public function deletePengeluaran($id=0)
    {
        if($id!=0){
            if($this->Dashboard->delete('id_pengeluaran','tbl_pengeluaran',$id)){
                redirect('Keuangan/Pengeluaran');
            }
        }
    }

    // View Report Pengeluaran
    public function ReportPengeluaran()
    {
        $join   = array(
                            ['tbl_sub_akun','tbl_pengeluaran.id_sub_akun=tbl_sub_akun.id_sub_akun','LEFT'],
                            ['tbl_akun','tbl_pengeluaran.id_akun=tbl_akun.id_akun','LEFT'],
                        );
        $data	= [
            'titles'	        => "Dashboard Administrator || View Report Pengeluaran Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'catMenu'           => $this->Dashboard->viewGlobalJoinGroupOrder('tbl_pengeluaran.*,tbl_akun.nama_akun AS nama_akun','tbl_pengeluaran', $join, array('tbl_akun.nama_akun'),
            'tbl_akun.nama_akun')->result_array(),
            'pengeluaran'       => $this->Dashboard->viewGlobalJoinGroupOrder(
                                '
                                tbl_pengeluaran.id_pengeluaran AS id_pengeluaran,
                                tbl_pengeluaran.id_main_akun AS id_main_akun,
                                sum(tbl_pengeluaran.nominal) AS totnom,
                                tbl_pengeluaran.id_akun AS id_akuna,
                                tbl_pengeluaran.id_sub_akun AS id_sub_akuna,
                                tbl_pengeluaran.tanggal AS tanggala,
                                tbl_pengeluaran.nominal AS nominal,
                                sum(tbl_pengeluaran.nominal) AS totnominal,
                                tbl_akun.id_akun AS id_akun,
                                tbl_akun.nama_akun AS nama_akun,
                                tbl_sub_akun.nama_sub_akun AS nama_sub_akun
                                ',
                                'tbl_pengeluaran',
                                $join,
                                array('tbl_sub_akun.nama_sub_akun'),
                                'tbl_pengeluaran.id_pengeluaran'
                                )->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Report Pengeluaran"
        ];
        
        $this->load->view("v_ReportPengeluaran.php", $data);
    }

    // View Laporan Pengeluaran
    public function LaporanKeuangan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Laporan Keuangan Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Laporan Keuangan",
            'view'		        => "v_LaporanKeuangan"
        ];
        $this->load->view("index", $data);
    }

    // Action Cari Laporan
    public function CariLaporan()
    {
        $bulan      = htmlentities($this->input->post('bulan'));
        $tahun      = htmlentities($this->input->post('tahun'));

        $joinMasuk  = array(
            ['tbl_sub_akun','tbl_pemasukan.id_sub_akun=tbl_sub_akun.id_sub_akun','LEFT'],
            ['tbl_akun','tbl_pemasukan.id_akun=tbl_akun.id_akun','LEFT'],
        );

        $joinKeluar = array(
            ['tbl_sub_akun','tbl_pengeluaran.id_sub_akun=tbl_sub_akun.id_sub_akun','LEFT'],
            ['tbl_akun','tbl_pengeluaran.id_akun=tbl_akun.id_akun','LEFT'],
        );
        
        $data	= [
            'titles'	        => "Dashboard Administrator || View Report Pemasukan Gereja",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'catMenuMasuk'      => $this->Dashboard->viewGlobalJoinGroupOrder('tbl_pemasukan.*,tbl_akun.nama_akun AS nama_akun','tbl_pemasukan', $joinMasuk, array('tbl_akun.nama_akun'),
            'tbl_akun.nama_akun')->result_array(),
            'bulan'             => $bulan,
            'tahun'             => $tahun,
            'catMenuKeluar'     => $this->Dashboard->viewGlobalJoinGroupOrder('tbl_pengeluaran.*,tbl_akun.nama_akun AS nama_akun','tbl_pengeluaran', $joinKeluar, array('tbl_akun.nama_akun'),
            'tbl_akun.nama_akun')->result_array(),
            'Pemasukan'         => $this->Dashboard->viewGlobalJoinGroupOrderWhere(
                            '
                            tbl_pemasukan.id_pemasukan AS id_pemasukan,
                            tbl_pemasukan.id_main_akun AS id_main_akun,
                            sum(tbl_pemasukan.nominal) AS totnom,
                            tbl_pemasukan.id_akun AS id_akuna,
                            tbl_pemasukan.id_sub_akun AS id_sub_akuna,
                            tbl_pemasukan.tanggal AS tanggala,
                            tbl_pemasukan.nominal AS nominal,
                            sum(tbl_pemasukan.nominal) AS totnominal,
                            tbl_akun.id_akun AS id_akun,
                            tbl_akun.nama_akun AS nama_akun,
                            tbl_sub_akun.nama_sub_akun AS nama_sub_akun
                            ',
                            'tbl_pemasukan',
                            ['MONTH(tbl_pemasukan.tanggal)' => $bulan, 'YEAR(tbl_pemasukan.tanggal)'    => $tahun],
                            $joinMasuk,
                            array('tbl_sub_akun.nama_sub_akun'),
                            'tbl_pemasukan.id_pemasukan'
                            )->result_array(),
            'Pengeluaran'       => $this->Dashboard->viewGlobalJoinGroupOrderWhere(
                            '
                            tbl_pengeluaran.id_pengeluaran AS id_pengeluaran,
                            tbl_pengeluaran.id_main_akun AS id_main_akun,
                            sum(tbl_pengeluaran.nominal) AS totnom,
                            tbl_pengeluaran.id_akun AS id_akuna,
                            tbl_pengeluaran.id_sub_akun AS id_sub_akuna,
                            tbl_pengeluaran.tanggal AS tanggala,
                            tbl_pengeluaran.nominal AS nominal,
                            sum(tbl_pengeluaran.nominal) AS totnominal,
                            tbl_akun.id_akun AS id_akun,
                            tbl_akun.nama_akun AS nama_akun,
                            tbl_sub_akun.nama_sub_akun AS nama_sub_akun
                            ',
                            'tbl_pengeluaran',
                            ['MONTH(tbl_pengeluaran.tanggal)' => $bulan, 'YEAR(tbl_pengeluaran.tanggal)'    => $tahun],
                            $joinKeluar,
                            array('tbl_sub_akun.nama_sub_akun'),
                            'tbl_pengeluaran.id_pengeluaran'
                            )->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Report Pemasukan"
            // 'view'		        => "v_ReportPemasukan1"
            ];
            $this->load->view("v_ReportPemasukan1.php", $data);
    }

    // Data Pengeluaran Keuangan End  //
}