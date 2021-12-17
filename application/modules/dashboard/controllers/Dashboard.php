<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Dashboard_model','Dashboard',TRUE);

        set_zone();
        if ($this->session->userdata('role_id')!=1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap login untuk melanjutkan</div>');
            redirect('login');
        }
    }
    
    public function index()
    {
        $data	= [
            'titles'	        => "Dashboard User",
            'dashboard'	        => true,
            'breadcumb'	        => "Dashboard",
            'subbreadcumb'	    => "",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'totalPendeta'      => $this->Dashboard->viewAll('*','tbl_pendeta')->num_rows(),
            'totalUmat'         => $this->Dashboard->viewAll('*','tbl_jemaat')->num_rows(),
            'totalKK'           => $this->Dashboard->viewAll('*','tbl_keluarga')->num_rows(),
            'view'		        => "v_dashboard"
        ];
        $this->load->view("index", $data);
    }

    // Persembahan Start //
    
    // View Persembahan
    public function Persembahan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Dashboard View Persembahan",
            'dashboard'	        => true,
            'breadcumb'	        => "Dashboard",
            'subbreadcumb'	    => "View Persembahan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_ViewPersembahan"
        ];
        $this->load->view("index", $data);
    }

    // View Datatable Json Persembahan
    public function jsonPersembahan()
    {
        header('Content-Type: application/json');
        $join   = array(
            ['tbl_jenis_persembahan','tbl_persembahan.id_jenis_persembahan=tbl_jenis_persembahan.id_jenis_persembahan','LEFT'],
        );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_persembahan.*,
                tbl_jenis_persembahan.nama_jenis_persembahan AS nama_jenis_persembahan
            ',
            'tbl_persembahan',
            $join
        );
    }

    // View Add Persembahan
    public function addPersembahan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Dashboard View Add Persembahan",
            'jemaat'            => $this->Dashboard->viewAll('*','tbl_jemaat')->result_array(),
            'jenisPersembahan'  => $this->Dashboard->viewAll('*','tbl_jenis_persembahan')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Dashboard",
            'subbreadcumb'	    => "View Add Persembahan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_AddPersembahan"
        ];
        $this->load->view("index", $data);
    }

    // Action View Add Persembahan
    public function actionAddPersembahan()
    {
        $data   = [
            'tgl'                       => now(),
            'nama_jemaat'               => htmlentities($this->input->post('nama')),
            'id_jenis_persembahan'      => htmlentities($this->input->post('jenis_persembahan'))
        ];

        if ($this->Dashboard->insert('tbl_persembahan',$data)) {
            redirect('dashboard/Persembahan','refresh');
        }
    }
    
    // View Edit Persembahan
    public function editPersembahan($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Dashboard View Edit Persembahan",
                'persembahan'       => $this->Dashboard->viewWhere('tbl_persembahan','id_persembahan',$id)->result_array(),
                'jenisPersembahan'  => $this->Dashboard->viewAll('*','tbl_jenis_persembahan')->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Dashboard",
                'subbreadcumb'	    => "View Edit Persembahan",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'view'		        => "v_EditPersembahan"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action View Edit Persembahan
    public function actionEditPersembahan($id=0)
    {
        if($id!=0){
            $update = [
                'nama_jemaat'               => htmlentities($this->input->post('nama')),
                'id_jenis_persembahan'      => htmlentities($this->input->post('jenis_persembahan'))
            ];
            if ($this->Dashboard->update('tbl_persembahan','id_persembahan',$id,$update)) {
                redirect('dashboard/Persembahan','refresh');
            }
        }
    }

    // Persembahan End   //
}