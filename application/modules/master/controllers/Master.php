<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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
    
    public function index()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Beranda",
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_user"
        ];
        $this->load->view("index", $data);
    }

    public function pendetaa()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master Pendeta",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Pendeta",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_Pendeta"
        ];
        $this->load->view("index", $data);
    }

    // Data Pendeta Start //
    public function pendeta()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master Pendeta",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Pendeta",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_Pendeta"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Pendeta
    public function jsonPendeta()
    {
        header('Content-Type: application/json');
        echo $this->Dashboard->json(
            '
                tbl_pendeta.id_pendeta AS id_pendeta,
                tbl_pendeta.nama_pendeta AS nama_pendeta,
                tbl_pendeta.alamat AS alamat,
                tbl_pendeta.no_telp AS no_telp,
                tbl_pendeta.email AS email
            ',
            'tbl_pendeta'
        );
    }

    public function addPendeta()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Data Pendeta",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Add Pendeta",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_AddPendeta"
        ];
        $this->load->view("index", $data);
    }

    public function actionAddPendeta()
    {
        $inputPendeta  = [
            'nama_pendeta'          => htmlentities($this->input->post('nama_pendeta')),
            'alamat'                => htmlentities($this->input->post('alamat')),
            'no_telp'               => htmlentities($this->input->post('no_telp')),
            'email'                 => htmlentities($this->input->post('email')),
        ];
        
        if ($this->Dashboard->insert('tbl_pendeta',$inputPendeta)) {
            redirect('master/pendeta', 'refresh');
        }
    }

    // Edit Pendeta Data
    public function editPendeta($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit Pendeta",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Edit Pendeta",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'editPendeta'       => $this->Dashboard->viewWhere('tbl_pendeta','id_pendeta',$id)->result_array(),
                'view'		        => "v_EditPendeta"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Pendeta
    public function actionEditPendeta($id=0)
    {
        $updatePendeta  = [
            'nama_pendeta'          => htmlentities($this->input->post('nama_pendetaEdit')),
            'alamat'                => htmlentities($this->input->post('alamatEdit')),
            'no_telp'               => htmlentities($this->input->post('no_telpEdit')),
            'email'                 => htmlentities($this->input->post('emailEdit')),
        ];
        // Action Update To Database
        if ($this->Dashboard->update('tbl_pendeta', 'id_pendeta', $id, $updatePendeta)) {
            // Jika Sukses Insert
            // $this->toastr->success('Sukses Mengubah Data Lingkungan !!!');

            redirect('master/pendeta', 'refresh');
        } else {
            // Jika Gagal Insert
            // $this->toastr->error('Ada Data Yang Belum Lengkap !!!');

            redirect('master/addPendeta/'.$id, 'refresh');
        }
    }

    // Hapus Data Pendeta
    public function deletePendeta($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_pendeta', 'tbl_pendeta', $id)) {
                // $this->toastr->success('Sukses Menghapus Detail Data Kelas !!!');

                redirect('master/pendeta', 'refresh');
            }
        }
    }

    // Data Pendeta End //

    // Data Jemaat Start //
    public function jemaat()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master Jemaat",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Jemaat",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
            'view'		        => "v_Jemaat"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Jemaat
    public function jsonJemaat()
    {
        header('Content-Type: application/json');
        $join       = array(
                        ['tbl_lingkungan','tbl_jemaat.id_lingkungan=tbl_lingkungan.id_lingkungan','LEFT']
                    );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_jemaat.id_jemaat AS id_jemaat,
                tbl_jemaat.nama_jemaat AS nama_jemaat,
                tbl_jemaat.alamat AS alamat,
                tbl_jemaat.tempat_lahir AS tempat_lahir,
                tbl_jemaat.tgl_lahir AS tgl_lahir,
                tbl_jemaat.no_telp AS no_telp,
                tbl_jemaat.jenis_kelamin AS jenis_kelamin,
                tbl_jemaat.email AS email,
                tbl_lingkungan.nama_lingkungan AS nama_lingkungan
            ',
            'tbl_jemaat',
            $join
        );
    }

    public function addJemaat()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Data Jemaat",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Add Jemaat",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
            'view'		        => "v_AddJemaat"
        ];
        $this->load->view("index", $data);
    }

    public function actionAddJemaat()
    {
        // Rubah Format Tgl Lahir Ke Dalam Format Mysql
        $pisah      = explode(" ", $this->input->post('tgl_lahir'));
        $tgl_lahir  = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];

        $inputJemaat  = [
            'nama_jemaat'           => htmlentities($this->input->post('nama_jemaat')),
            'alamat'                => htmlentities($this->input->post('alamat')),
            'tempat_lahir'          => htmlentities($this->input->post('tempat_lahir')),
            'tgl_lahir'             => $tgl_lahir,
            'no_telp'               => htmlentities($this->input->post('no_telp')),
            'jenis_kelamin'         => htmlentities($this->input->post('jenkel')),
            'email'                 => htmlentities($this->input->post('email')),
            'id_lingkungan'         => htmlentities($this->input->post('lingkungan'))
        ];

        if ($this->Dashboard->insert('tbl_jemaat',$inputJemaat)) {
            redirect('master/jemaat', 'refresh');
        }
    }

    // Edit Jemaat Data
    public function editJemaat($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit Jemaat",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Edit Jemaat",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'editJemaat'        => $this->Dashboard->viewWhere('tbl_jemaat','id_jemaat',$id)->result_array(),
                'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
                'view'		        => "v_EditJemaat"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Jemaat
    public function actionEditJemaat($id=0)
    {
        if($id!=0){
            // Rubah Format Tgl Lahir Ke Dalam Format Mysql
        $pisah      = explode(" ", $this->input->post('tgl_lahir'));
        $tgl_lahir  = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];

            $updateJemaat  = [
                'nama_jemaat'           => htmlentities($this->input->post('nama_jemaat')),
                'alamat'                => htmlentities($this->input->post('alamat')),
                'tempat_lahir'          => htmlentities($this->input->post('tempat_lahir')),
                'tgl_lahir'             => $tgl_lahir,
                'no_telp'               => htmlentities($this->input->post('no_telp')),
                'jenis_kelamin'         => htmlentities($this->input->post('jenkel')),
                'email'                 => htmlentities($this->input->post('email')),
                'id_lingkungan'         => htmlentities($this->input->post('lingkungan'))
            ];

            // Action Update To Database
            if ($this->Dashboard->update('tbl_jemaat', 'id_jemaat', $id, $updateJemaat)) {
                redirect('master/jemaat', 'refresh');
            } else {
                redirect('master/addJemaat/'.$id, 'refresh');
            }
        }
    }

    // Hapus Data Jemaat
    public function deleteJemaat($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_jemaat', 'tbl_jemaat', $id)) {
                // $this->toastr->success('Sukses Menghapus Detail Data Kelas !!!');

                redirect('master/jemaat', 'refresh');
            }
        }
    }
    // Data Jemaat End //

    // Data Keluarga Start //

    // View Data Keluarga
    public function keluarga()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master Keluarga",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Keluarga",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_Keluarga"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Keluarga
    public function jsonKeluarga()
    {
        header('Content-Type: application/json');
        $join   = array(
            ['tbl_lingkungan','tbl_keluarga.id_lingkungan=tbl_lingkungan.id_lingkungan','LEFT'],
            ['tbl_wilayah','tbl_keluarga.id_wilayah=tbl_wilayah.id_wilayah','LEFT'],
        );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_keluarga.id_keluarga AS id_keluarga,
                tbl_keluarga.nama AS nama,
                tbl_keluarga.no_kk AS no_kk,
                tbl_keluarga.alamat AS alamat,
                tbl_keluarga.no_telp AS no_telp,
                tbl_lingkungan.nama_lingkungan AS nama_lingkungan,
                tbl_wilayah.nama_wilayah AS nama_wilayah,
            ',
            'tbl_keluarga',
            $join
        );
    }

    // View Add Keluarga
    public function addKeluarga()
    {
        // Cek Nomor Invoice Di Database
        $cek = $this->Dashboard->viewWhere('tbl_keluarga', 'no_kk', 'GKS-00000001')->num_rows();
        
        if($cek==0){
            $kode = 'GKS-00000001';
        }else{
            // Ambil Data Terakhir Nomor KK dari Tabel tbl_keluarga
            $ambil      = $this->Dashboard->lastData('no_kk', 'tbl_keluarga', 'no_kk')->result_array();
            
            // Hilangkan Kata INV dan 0 agar bisa di ambil no urut GKS-00001
            $cekmaks        = ltrim(str_replace(['GKS','-'], '', $ambil[0]['no_kk']), '0')+1;
    
            // $cekmaks        = 999999999 + 1;
            if ($cekmaks>=0 && $cekmaks<10) {
                $kode       = 'GKS-0000000'.($cekmaks);
            } elseif ($cekmaks>=10 && $cekmaks<100) {
                $kode       = 'GKS-000000'.($cekmaks);
            } elseif ($cekmaks>=100 && $cekmaks<1000) {
                $kode       = 'GKS-00000'.($cekmaks);
            } elseif ($cekmaks>=1000 && $cekmaks<10000) {
                $kode       = 'GKS-0000'.($cekmaks);
            } elseif ($cekmaks>=10000 && $cekmaks<100000) {
                $kode       = 'GKS-000'.($cekmaks);
            } elseif ($cekmaks>=100000 && $cekmaks<1000000) {
                $kode       = 'GKS-00'.($cekmaks);
            } elseif ($cekmaks>=1000000 && $cekmaks<10000000) {
                $kode       = 'GKS-0'.($cekmaks);
            } elseif ($cekmaks>=10000000 && $cekmaks<100000000) {
                $kode       = 'GKS-'.($cekmaks);
            } else {
                $kode       = $cekmaks + 1;
            }
        }

        $data	= [
            'titles'	        => "Dashboard Administrator || Master Keluarga",
            'dashboard'	        => true,
            'no_kk'             => $kode,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Add Keluarga",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
            'wilayah'           => $this->Dashboard->viewAll('*','tbl_wilayah')->result_array(),
            'view'		        => "v_AddKeluarga"
        ];
        
        $this->load->view("index", $data);
    }

    // Action Add Keluarga
    public function actionAddKeluarga()
    {
        $data   = [
            'nama'              => htmlentities($this->input->post('nama_keluarga')),
            'alamat'            => htmlentities($this->input->post('alamat')),
            'no_telp'           => htmlentities($this->input->post('no_telp')),
            'id_lingkungan'     => htmlentities($this->input->post('lingkungan')),
            'id_wilayah'        => htmlentities($this->input->post('wilayah')),
        ];

        if ($this->Dashboard->insert('tbl_keluarga',$data)) {
            redirect('Master/keluarga','refresh');
        }
    }

    // View Edit Keluarga
    public function editKeluarga($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Master Keluarga",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Edit Keluarga",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'keluarga'          => $this->Dashboard->viewWhere('tbl_keluarga','id_keluarga',$id)->result_array(),
                'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
                'wilayah'           => $this->Dashboard->viewAll('*','tbl_wilayah')->result_array(),
                'view'		        => "v_EditKeluarga"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Keluarga
    public function actionEditKeluarga($id=0)
    {
        if($id!=0){
            $update = [
                'nama'              => htmlentities($this->input->post('nama_keluarga')),
                'alamat'            => htmlentities($this->input->post('alamat')),
                'no_telp'           => htmlentities($this->input->post('no_telp')),
                'id_lingkungan'     => htmlentities($this->input->post('lingkungan')),
                'id_wilayah'        => htmlentities($this->input->post('wilayah')),
            ];
            
            if ($this->Dashboard->update('tbl_keluarga','id_keluarga',$id,$update)) {
                redirect('master/keluarga','refresh');
            }
        }
    }

    // Action Delete Data Keluarga
    public function deleteKeluarga($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_keluarga', 'tbl_keluarga', $id)) {
                // $this->toastr->success('Sukses Menghapus Detail Data Kelas !!!');

                redirect('master/keluarga', 'refresh');
            }
        }
    }
    
    // View Detail Keluarga
    public function detKeluarga($id=0)
    {
        if($id!=0){
            // Check $id keluarga
            $datKeluarga = $this->Dashboard->viewWhere('tbl_keluarga','id_keluarga', $id)->result_array();
            $data	= [
                'titles'	        => "Dashboard Administrator || Master Keluarga",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Detail Keluarga",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'keluarga'          => $this->Dashboard->viewWhere('tbl_keluarga','id_keluarga',$id)->result_array(),
                'totalKeluarga'     => $this->Dashboard->viewWhere('tbl_keluarga_detail','no_kk', $datKeluarga[0]['no_kk'])->num_rows(),
                'view'		        => "v_DetailKeluarga"
            ];
            $this->load->view("index", $data);
        }
    }

    // Json View Datatable Data Detail Keluarga
    public function jsonDetKeluarga($id)
    {
        if($id!=0){
            $datKeluarga = $this->Dashboard->viewWhere('tbl_keluarga','id_keluarga', $id)->result_array();
            header('Content-Type: application/json');
            $join   = array(
                ['tbl_role','tbl_users.role_id=tbl_role.id','LEFT'],
            );
            echo $this->Dashboard->jsonWhere(
                '
                    tbl_keluarga_detail.*
                ',
                'tbl_keluarga_detail',
                'tbl_keluarga_detail.no_kk',
                $datKeluarga[0]['no_kk']
            );
        }
    }

    // Add Detail Keluarga
    public function addKeluargaKK()
    {
        $id     = $this->uri->segment('3');
        if($id!=0 || $id!=null){
            $data	= [
                'titles'	        => "Dashboard Administrator || Master Keluarga",
                'dashboard'	        => true,
                'kodeKK'            => $id,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Add Detail Keluarga",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'view'		        => "v_AddDetKeluarga"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Add Detail Keluarga
    public function actionAddDetKeluarga()
    {
        $id     = $this->input->post('no_kk');

        // Check tbl_keluarga Berdasar no_ll
        $idKeluarga = $this->Dashboard->viewWhere('tbl_keluarga','no_kk',$id)->result_array();

        // Rubah Format Tgl Lahir Ke Dalam Format Mysql
        $pisah      = explode(" ", $this->input->post('tgl_lahir'));
        $tgl_lahir  = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
        
        $data   = [
            'no_kk'         => $id,
            'nama'          => htmlentities($this->input->post('nama_jemaat')),
            'jk'            => htmlentities($this->input->post('jk')),
            'tgl_lahir'     => $tgl_lahir,
            'no_telp'       => htmlentities($this->input->post('no_telp')),
            'pendidikan'    => htmlentities($this->input->post('pendidikan')),
            'status'        => htmlentities($this->input->post('status'))
        ];
        
        // Insert to Database
        if($this->Dashboard->insert('tbl_keluarga_detail',$data)){
            redirect('master/detKeluarga/'.$idKeluarga[0]['id_keluarga'],'refresh');
        }
    }

    // View Detail Keluarga
    public function editDetKeluarga($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Master Keluarga",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "View Edit Detail Keluarga",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'keluarga'          => $this->Dashboard->viewWhere('tbl_keluarga_detail','id_keluarga_detail',$id)->result_array(),
                'view'		        => "v_EditDetailKeluarga"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Detail Keluarga
    public function actionEditDetKeluarga($id=0)
    {
        if($id!=0){
            $no_kk     = $this->input->post('no_kk');
            
            // Check tbl_keluarga Berdasar no_ll
            $idKeluarga = $this->Dashboard->viewWhere('tbl_keluarga','no_kk',$no_kk)->result_array();
    
            // Rubah Format Tgl Lahir Ke Dalam Format Mysql
            $pisah      = explode(" ", $this->input->post('tgl_lahir'));
            $tgl_lahir  = $pisah[2].'-'.getConvertBulan($pisah[1]).'-'.$pisah[0];
            
            $update = [
                'nama'          => htmlentities($this->input->post('nama_jemaat')),
                'jk'            => htmlentities($this->input->post('jk')),
                'tgl_lahir'     => $tgl_lahir,
                'no_telp'       => htmlentities($this->input->post('no_telp')),
                'pendidikan'    => htmlentities($this->input->post('pendidikan')),
                'status'        => htmlentities($this->input->post('status'))
            ];
    
            // Insert to Database
            if($this->Dashboard->update('tbl_keluarga_detail','id_keluarga_detail',$id,$update)){
                redirect('master/keluarga','refresh');
            }
        }
    }

    // Action Delete Data Keluarga
    public function deleteDetKeluarga($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_keluarga_detail', 'tbl_keluarga_detail', $id)) {
                redirect('master/keluarga', 'refresh');
            }
        }
    }
    
    // Data Keluarga End  //

    // Data Users Start //
    public function user()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master User",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "User",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_User"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data User
    public function jsonUser()
    {
        header('Content-Type: application/json');
        $join   = array(
            ['tbl_role','tbl_users.role_id=tbl_role.id','LEFT'],
        );
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_users.id AS id,
                tbl_users.nama AS nama,
                tbl_users.username AS username,
                tbl_users.password AS password,
                tbl_role.name AS name
            ',
            'tbl_users',
            $join
        );
    }

    // View Add User
    public function addUser()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master User",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Add User",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_AddUser"
        ];
        $this->load->view("index", $data);
    }

    // Action View Add User
    public function actionAddUser()
    {
        $input  = [
            'nama'          => htmlentities($this->input->post('nama')),
            'username'      => htmlentities($this->input->post('username')),
            'password'      => htmlentities($this->input->post('password')),
            'role_id'       => 1
        ];
        
        if ($this->Dashboard->insert('tbl_users',$input)) {
            redirect('master/user', 'refresh');
        }
    }

    // Edit User Data
    public function editUser($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit User",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Edit User",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'editUser'          => $this->Dashboard->viewWhere('tbl_users','id',$id)->result_array(),
                'view'		        => "v_EditUser"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit User
    public function actioneditUser($id=0)
    {
        // Cek Password
        $cekPassword    = htmlentities($this->input->post('password'));
        if($cekPassword==''){
            $updateUsers = [
                'nama'              => htmlentities($this->input->post('nama')),
                'username'          => htmlentities($this->input->post('username'))
            ];
        }else{
            $updateUsers = [
                'nama'              => htmlentities($this->input->post('nama')),
                'username'          => htmlentities($this->input->post('username')),
                'password'          => md5(htmlentities($this->input->post('password')))
            ];
        }
        // Action Update To Database
        if ($this->Dashboard->update('tbl_users', 'id', $id, $updateUsers)) {
            redirect('master/user', 'refresh');
        } else {
            redirect('master/addUser/'.$id, 'refresh');
        }
    }

    // Hapus Data User
    public function deleteUser($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id', 'tbl_users', $id)) {
                // $this->toastr->success('Sukses Menghapus Detail Data Kelas !!!');
                redirect('master/user', 'refresh');
            }
        }
    }

    // Data User End   //

    // View Menu Majelis
    public function Majelis()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Majelis",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Majelis",
            'view'		        => "v_Majelis"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Majelis
    public function jsonMajelis()
    {
        $join   = array(
            ['tbl_lingkungan','tbl_majelis.id_lingkungan=tbl_lingkungan.id_lingkungan','LEFT']
        );

        header('Content-Type: application/json');

        echo $this->Dashboard->jsonGlobalJoin(
        '
            tbl_majelis.*,
            tbl_lingkungan.nama_lingkungan AS nama_lingkungan,
        ',
        'tbl_majelis',
        $join
        );
    }

    // View Menu Add Majelis
    public function addMajelis()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Add Majelis",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Add Majelis",
            'view'		        => "v_addMajelis"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Majelis
    public function actionAddMajelis()
    {
        $inputMajelis  = [
            'id_lingkungan'         => htmlentities($this->input->post('lingkungan')),
            'nama_majelis'          => htmlentities($this->input->post('nama_majelis')),
            'alamat'                => htmlentities($this->input->post('alamat')),
            'no_telp'               => htmlentities($this->input->post('no_telp'))
        ];
        
        if ($this->Dashboard->insert('tbl_majelis',$inputMajelis)) {
            redirect('master/Majelis', 'refresh');
        }
    }

    // Get Majelis From Lingkungan
    public function getMajelis()
    {
        $id_lingkungan = $this->input->post('id_lingkungan');

        // Get Data
        $majelis    = $this->Dashboard->viewWhere('tbl_majelis','id_lingkungan',$id_lingkungan)->result_array();

        // Get Data Umat
        $umat       = $this->Dashboard->viewWhere('tbl_jemaat','id_lingkungan',$id_lingkungan)->result_array();

        $lists = "<option value=''>Silahkan Pilih</option>";
    
        foreach($majelis as $data){
            $lists .= "<option value='".$data['id_majelis']."'>".$data['nama_majelis']."</option>"; // Tambahkan tag option ke variabel $lists
        }
        
        $listsumat = "";
        foreach ($umat as $row) {
            $listsumat .=$row['nama_jemaat']. ', ';
        }
        
        $callback = array('list_pks'=> $lists,'list_penanggungjawab'    => $lists,'list_umat'   => $listsumat); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    // View Menu Edit Majelis
    public function editMajelis($id=0)
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Add Majelis",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'lingkungan'        => $this->Dashboard->viewAll('*','tbl_lingkungan')->result_array(),
            'majelis'           => $this->Dashboard->viewWhere('tbl_majelis','id_majelis',$id)->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Edit Majelis",
            'view'		        => "v_editMajelis"
        ];
        
        $this->load->view("index", $data);
    }

    // Action Edit Majelis
    public function actionEditMajelis($id=0)
    {
        if($id!=0){
            $updateMajelis  = [
                'id_lingkungan'         => htmlentities($this->input->post('lingkungan')),
                'nama_majelis'          => htmlentities($this->input->post('nama_majelis')),
                'alamat'                => htmlentities($this->input->post('alamat')),
                'no_telp'               => htmlentities($this->input->post('no_telp'))
            ];
            
            if ($this->Dashboard->update('tbl_majelis', 'id_majelis', $id, $updateMajelis)) {
                redirect('master/Majelis', 'refresh');
            }
        }
    }

    // Data Jenis Persembahan Start //
    public function jenisPersembahan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master Jenis Persembahan",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Jenis Persembahan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_JenisPersembahan"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Jenis Persembahan
    public function jsonJenisPersembahan()
    {
        header('Content-Type: application/json');
        echo $this->Dashboard->json(
            '
                tbl_jenis_persembahan.*
            ',
            'tbl_jenis_persembahan'
        );
    }

    // View Add Jenis Persembahan
    public function addjenisPersembahan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Add Jenis Persembahan",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "View Add Jenis Persembahan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_AddJenisPersembahan"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Jenis Persembahan
    public function actionAddJenisPersembahan()
    {
        $data   = [
            'nama_jenis_persembahan'        => htmlentities($this->input->post('nama'))
        ];
        
        if ($this->Dashboard->insert('tbl_jenis_persembahan',$data)) {
            redirect('master/JenisPersembahan','refresh');
        }
    }

    // View Edit Jenis Persembahan
    public function editJenisPersembahan($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || View Edit Jenis Persembahan",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Edit Jenis Persembahan",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'editJenis'         => $this->Dashboard->viewWhere('tbl_jenis_persembahan','id_jenis_persembahan',$id)->result_array(),
                'view'		        => "v_EditJenisPersembahan"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Jenis Persembahan
    public function actioneditJenisPersembahan($id=0)
    {
        if($id!=0){
            $update     = [
                'nama_jenis_persembahan'        => htmlentities($this->input->post('nama'))
            ];
    
            if($this->Dashboard->update('tbl_jenis_persembahan','id_jenis_persembahan',$id,$update)){
                redirect('master/JenisPersembahan','refresh');
            }
        }
    }

    // Action Delete Jenis Persembahan


    // Data Jenis Persembahan End   //
    public function deleteJenisPersembahan($id=0)
    {
        if($id!=0){
            if ($this->Dashboard->delete('id_jenis_persembahan', 'tbl_jenis_persembahan', $id)) {
                redirect('master/JenisPersembahan', 'refresh');
            }
        }
    }

    // Data Wilayah Start //
    public function wilayah()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master Wilayah",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Wilayah",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_Wilayah"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Wilayah
    public function jsonWilayah()
    {
        header('Content-Type: application/json');
        echo $this->Dashboard->json(
            '
                tbl_wilayah.id_wilayah AS id_wilayah,
                tbl_wilayah.nama_wilayah AS nama_wilayah
            ',
            'tbl_wilayah'
        );
    }

    public function addWilayah()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Data Wilayah",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Add Wilayah",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_AddWilayah"
        ];
        $this->load->view("index", $data);
    }

    public function actionAddWilayah()
    {
        $input  = [
            'nama_wilayah'          => htmlentities($this->input->post('nama_wilayah')),
        ];
        
        if ($this->Dashboard->insert('tbl_wilayah',$input)) {
            redirect('master/wilayah', 'refresh');
        }
    }

    // Edit Wilayah Data
    public function editWilayah($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit Wilayah",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Edit Wilayah",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'editWilayah'       => $this->Dashboard->viewWhere('tbl_wilayah','id_wilayah',$id)->result_array(),
                'view'		        => "v_EditWilayah"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Wilayah
    public function actionEditWilayah($id=0)
    {
        $updateUsers = [
            'nama_wilayah'              => htmlentities($this->input->post('nama_wilayahEdit'))
        ];
        
        // Action Update To Database
        if ($this->Dashboard->update('tbl_wilayah', 'id_wilayah', $id, $updateUsers)) {
            redirect('master/wilayah', 'refresh');
        } else {
            redirect('master/addWilayah/'.$id, 'refresh');
        }
    }

    // Hapus Data Wilayah
    public function deleteWilayah($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_wilayah', 'tbl_wilayah', $id)) {
                // $this->toastr->success('Sukses Menghapus Detail Data Kelas !!!');

                redirect('master/wilayah', 'refresh');
            }
        }
    }

    // Data Wilayah End   //

    // Data Lingungan Start //
    public function lingkungan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Master Lingkungan",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Lingkungan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_Lingkungan"
        ];
        $this->load->view("index", $data);
    }

    // Json View Datatable Data Lingkungan
    public function jsonLingkungan()
    {
        header('Content-Type: application/json');
        echo $this->Dashboard->json(
            '
            tbl_lingkungan.id_lingkungan AS id_lingkungan,
            tbl_lingkungan.nama_lingkungan AS nama_lingkungan
            ',
            'tbl_lingkungan'
        );
    }

    public function addLingkungan()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Add Data Lingkungan",
            'dashboard'	        => true,
            'breadcumb'	        => "Master",
            'subbreadcumb'	    => "Add Lingkungan",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'view'		        => "v_AddLingkungan"
        ];
        $this->load->view("index", $data);
    }

    public function actionAddLingkungan()
    {
        $input  = [
            'nama_lingkungan'          => htmlentities($this->input->post('nama_lingkungan')),
        ];
        
        if ($this->Dashboard->insert('tbl_lingkungan',$input)) {
            redirect('master/lingkungan', 'refresh');
        }
    }

    // Edit Lingkungan Data
    public function editLingkungan($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Edit Lingkungan",
                'dashboard'	        => true,
                'breadcumb'	        => "Master",
                'subbreadcumb'	    => "Edit Lingkungan",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'editLingkungan'    => $this->Dashboard->viewWhere('tbl_lingkungan','id_lingkungan',$id)->result_array(),
                'view'		        => "v_EditLingkungan"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Lingkungan
    public function actionEditLingkungan($id=0)
    {
        $updateUsers = [
            'nama_lingkungan'              => htmlentities($this->input->post('nama_lingkunganEdit'))
        ];
        // Action Update To Database
        if ($this->Dashboard->update('tbl_lingkungan', 'id_lingkungan', $id, $updateUsers)) {
            redirect('master/lingkungan', 'refresh');
        } else {
            redirect('master/addLingkungan/'.$id, 'refresh');
        }
    }

    // Hapus Data Lingkungan
    public function deleteLingkungan($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_lingkungan', 'tbl_lingkungan', $id)) {
                // $this->toastr->success('Sukses Menghapus Detail Data Kelas !!!');

                redirect('master/lingkungan', 'refresh');
            }
        }
    }

    // Data Lingkungan End   //

    // Menu Akun

    // View Menu Main Akun
    public function MainAkun()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Main Akun",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Main Akun",
            'view'		        => "v_Mainakun"
        ];
        $this->load->view("index", $data);
    }

    // View Datatable Json Main Akun
    public function jsonMainAkun()
    {
        header('Content-Type: application/json');
        echo $this->Dashboard->json(
            '*',
            'tbl_main_akun'
        );
    }

    // View Add Main Akun
    public function addMainAkun()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Dashboard View Add Main Akun",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Dashboard",
            'subbreadcumb'	    => "View Add Main Akun",
            'view'		        => "v_AddMainAkun"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Main Akun
    public function actionAddMainAkun()
    {
        $data   = [
            'nama_main_akun'      => htmlentities($this->input->post('mainAkun'))
        ];

        if ($this->Dashboard->insert('tbl_main_akun',$data)) {
            redirect('master/MainAkun','refresh');
        }
    }

    // View Edit Main Akun
    public function editMainAkun($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Dashboard View Edit Main Akun",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'MainAkun'          => $this->Dashboard->viewWhere('tbl_main_akun','id_main_akun',$id)->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Dashboard",
                'subbreadcumb'	    => "View Edit Main Akun",
                'view'		        => "v_EditMainAkun"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Main Akun
    public function actionEditMainAkun($id=0)
    {
        if($id!=0){
            $update   = [
                'nama_main_akun'      => htmlentities($this->input->post('mainAkun'))
            ];
    
            if ($this->Dashboard->update('tbl_main_akun','id_main_akun', $id, $update)) {
                redirect('master/MainAkun','refresh');
            }
        }
    }

    // Hapus Data Main Akun
    public function deleteMainAkun($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_main_akun', 'tbl_main_akun', $id)) {
                redirect('master/MainAkun','refresh');
            }
        }
    }

    // View Menu Akun
    public function Akun()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Akun",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Akun",
            'view'		        => "v_Akun"
        ];
        $this->load->view("index", $data);
    }

    // View Datatable Json Akun
    public function jsonAkun()
    {
        $join   = array(
                        ['tbl_main_akun','tbl_akun.id_main_akun=tbl_main_akun.id_main_akun','LEFT']
                    );
        header('Content-Type: application/json');
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_akun.*,
                tbl_main_akun.nama_main_akun AS nama_main_akun,
            ',
            'tbl_akun',
            $join
        );
    }

    // View Add Akun
    public function addAkun()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Dashboard View Add Akun",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'MainAkun'          => $this->Dashboard->viewAll('*','tbl_main_akun')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Dashboard",
            'subbreadcumb'	    => "View Add Akun",
            'view'		        => "v_AddAkun"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Akun
    public function actionAddAkun()
    {
        $data   = [
            'id_main_akun'      => htmlentities($this->input->post('MainAkun')),
            'nama_akun'         => htmlentities($this->input->post('Akun'))
        ];

        if ($this->Dashboard->insert('tbl_akun',$data)) {
            redirect('master/Akun','refresh');
        }
    }

    // View Edit Akun
    public function editAkun($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Dashboard View Edit Akun",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'Akun'              => $this->Dashboard->viewWhere('tbl_akun','id_akun',$id)->result_array(),
                'MainAkun'          => $this->Dashboard->viewAll('*','tbl_main_akun')->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Dashboard",
                'subbreadcumb'	    => "View Edit Akun",
                'view'		        => "v_EditAkun"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Akun
    public function actionEditAkun($id=0)
    {
        if($id!=0){
            $update   = [
                'id_main_akun'      => htmlentities($this->input->post('MainAkun')),
                'nama_akun'         => htmlentities($this->input->post('Akun'))
            ];
    
            if ($this->Dashboard->update('tbl_akun','id_akun', $id, $update)) {
                redirect('master/Akun','refresh');
            }
        }
    }

    // Hapus Data Akun
    public function deleteAkun($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_akun', 'tbl_akun', $id)) {
                redirect('master/Akun','refresh');
            }
        }
    }

    // View Menu Sub Akun
    public function SubAkun()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || View Sub Akun",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Beranda",
            'subbreadcumb'	    => "View Sub Akun",
            'view'		        => "v_SubAkun"
        ];
        $this->load->view("index", $data);
    }

    // View Datatable Json Sub Akun
    public function jsonSubAkun()
    {
        $join   = array(
                        ['tbl_main_akun','tbl_sub_akun.id_main_akun=tbl_main_akun.id_main_akun','LEFT'],
                        ['tbl_akun','tbl_sub_akun.id_akun=tbl_akun.id_akun','LEFT']
                    );
        header('Content-Type: application/json');
        echo $this->Dashboard->jsonGlobalJoin(
            '
                tbl_sub_akun.*,
                tbl_akun.nama_akun AS nama_akun,
                tbl_main_akun.nama_main_akun AS nama_main_akun
            ',
            'tbl_sub_akun',
            $join
        );
    }

    // View Add Sub Akun
    public function addSubAkun()
    {
        $data	= [
            'titles'	        => "Dashboard Administrator || Dashboard View Add Sub Akun",
            'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
            'MainAkun'          => $this->Dashboard->viewAll('*','tbl_main_akun')->result_array(),
            'Akun'              => $this->Dashboard->viewAll('*','tbl_akun')->result_array(),
            'dashboard'	        => true,
            'breadcumb'	        => "Dashboard",
            'subbreadcumb'	    => "View Add Sub Akun",
            'view'		        => "v_AddSubAkun"
        ];
        $this->load->view("index", $data);
    }

    // Action Add Sub Akun
    public function actionAddSubAkun()
    {
        $data   = [
            'id_main_akun'          => htmlentities($this->input->post('MainAkun')),
            'id_akun'               => htmlentities($this->input->post('Akun')),
            'nama_sub_akun'         => htmlentities($this->input->post('SubAkun'))
        ];

        if ($this->Dashboard->insert('tbl_sub_akun',$data)) {
            redirect('master/SubAkun','refresh');
        }
    }

    // View Edit Sub Akun
    public function editSubAkun($id=0)
    {
        if($id!=0){
            $data	= [
                'titles'	        => "Dashboard Administrator || Dashboard View Edit Sub Akun",
                'settings'          => $this->Dashboard->viewAll('*','tbl_settings')->result_array(),
                'SubAkun'           => $this->Dashboard->viewWhere('tbl_sub_akun','id_sub_akun',$id)->result_array(),
                'MainAkun'          => $this->Dashboard->viewAll('*','tbl_main_akun')->result_array(),
                'Akun'              => $this->Dashboard->viewAll('*','tbl_akun')->result_array(),
                'dashboard'	        => true,
                'breadcumb'	        => "Dashboard",
                'subbreadcumb'	    => "View Edit Sub Akun",
                'view'		        => "v_EditSubAkun"
            ];
            $this->load->view("index", $data);
        }
    }

    // Action Edit Sub Akun
    public function actionEditSubAkun($id=0)
    {
        if($id!=0){
            $update   = [
                'id_main_akun'          => htmlentities($this->input->post('MainAkun')),
                'id_akun'               => htmlentities($this->input->post('Akun')),
                'nama_sub_akun'         => htmlentities($this->input->post('SubAkun'))
            ];
    
            if ($this->Dashboard->update('tbl_sub_akun','id_sub_akun', $id, $update)) {
                redirect('master/SubAkun','refresh');
            }
        }
    }

    // Hapus Data Sub Akun
    public function deleteSubAkun($id=0)
    {
        if ($id!=0) {
            if ($this->Dashboard->delete('id_sub_akun', 'tbl_sub_akun', $id)) {
                redirect('master/SubAkun','refresh');
            }
        }
    }
}