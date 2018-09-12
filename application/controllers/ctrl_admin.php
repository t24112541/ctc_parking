<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
    	if($this->sql_admin->logged_id()){
    		$tb=" pk_machine,pk_users_std";
    		$data['fnc']="index";
    		$data['label']="ค้นหาทะเบียนรถ";
			if(!empty($this->input->post("txt_search"))){$txt_search=$this->input->post("txt_search");
				$field="pk_machine.us_id=pk_users_std.us_id && pk_machine.mc_code like '%".$txt_search."%'";
			}else{
				$field="pk_machine.us_id=pk_users_std.us_id";	
			}//echo $field;
			$data['row']=$this->sql_admin->join_sh_all($tb,$field);
			$data['num']=$this->sql_admin->join_sh_all_num($tb,$field);

    		$this->load->view('navbar',$data);
			$this->load->view("machine_index",$data);
		}else{
    		$this->load->view("login");
    	}
    	
    }
    public function login(){
    	$config = array(
		               	array(
		                     'field'   => 'username', 
		                     'label'   => 'username', 
		                     'rules'   => 'required'
		                ),
		               	array(
		                     'field'   => 'password', 
		                     'label'   => 'password', 
		                     'rules'   => 'required'
						)
		);
	        $this->form_validation->set_rules($config);
	        $this->form_validation->set_message('required', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ห้ามว่าง</label>');

			if ($this->form_validation->run() == TRUE) {
				$table="pk_admin";
	            $username = $this->input->post("username", TRUE);
	            $password = md5(md5($this->input->post("password", TRUE)));

	            $checking = $this->sql_admin->login_data($table,$username,$password);
	            	            
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {
	                    $session_data = array(
	                        'ad_id'   => $apps['ad_id'],
	                        'ad_name' => $apps['ad_name'],
	                        'ad_lname' => $apps['ad_lname'],
	                        'ad_username' => $apps['ad_username'],
	                        'ad_password' => $apps['ad_password'],
	                        'ad_status' => $apps['ad_status'],
	                    );
	                    $this->session->set_userdata($session_data);
	                    //echo $this->session->userdata('ad_id');
	                    redirect('ctrl_admin/');
	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username และ password ไม่ถูกต้อง!</div></div>';
	            	$this->load->view('login', $data);
	            }
	        }else{
	            $this->load->view('login');
	        }

    }
    public function logout(){
    	$this->session->sess_destroy();
		redirect('ctrl_admin/');
    }
	public function admin()
	{
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$this->load->view('navbar');
			$this->load->view('index_admin');
		}
	}
	public function add_admin(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";}
			else{
				$data['fnc']="pk_machine";
	    		$data['label']="ค้นหาทะเบียนรถ";
				$this->load->view('navbar',$data);
				$this->load->view('add_admin');
			}
		}
	}
	
	public function sh_dep($table,$field,$id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";
			$data['row']=$this->sql_admin->sh_dep($table,$field,$id);
			if($data['row']!=FALSE){
				$file="pk_class_show";
				//$file=$table."_show";
				//echo $file;
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}else{
				echo "No Data!";
			}
		}
	}
	public function sh_admins(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$table="pk_admin";
			$order_by="ad_id";
			$order_type="DESC";
			$data['row']=$this->sql_admin->select_all($table,$order_by,$order_type);
			$data['num']=$this->sql_admin->db_num_rows_all($table);

			$this->load->view('navbar',$data);
			$this->load->view("show_admins",$data);
		}
	}
	public function sh_admin($id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";
			$table="pk_admin";
			$field="ad_id";
			$data['row']=$this->sql_admin->select_where($table,$field,$id);
			$this->load->view('navbar',$data);
			$this->load->view("show_admin",$data);
		}
	}
	public function add_admin_process(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data=array(
						"ad_name"=>$this->input->post("ad_name"),
						"ad_lname"=>$this->input->post("ad_lname"),
						"ad_username"=>$this->input->post("ad_username"),
						"ad_password"=>md5(md5($this->input->post("ad_password"))),
						"ad_status"=>$this->input->post("ad_status"),
								);
			$config = array(
			               	array(
			                     'field'   => 'ad_name', 
			                     'label'   => 'ชื่อ', 
			                     'rules'   => 'required'
			                  ),
			               	array(
			                     'field'   => 'ad_lname', 
			                     'label'   => 'นามสกุล', 
			                     'rules'   => 'required'
			                  ),
			               	array(
			                     'field'   => 'ad_username', 
			                     'label'   => 'username ', 
			                     'rules'   => 'required'
			                  ),   
			               	array(
			                     'field'   => 'ad_password', 
			                     'label'   => 'password', 
			                     'rules'   => 'required'
			                  ),
			                array(
			                     'field'   => 'ad_status', 
			                     'label'   => 'สิทธิการเข้าถึง', 
			                     'rules'   => 'required'
			                  )
			            );
			$this->form_validation->set_rules($config);
			$this->form_validation->set_message('required', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ห้ามว่าง</label>');
			if ($this->form_validation->run() == TRUE) {

				$table="pk_admin";
				$field_chk="ad_username";
				$data_chk=$this->input->post("ad_username");
				$chk=$this->sql_admin->chk_add_process01($table,$field_chk,$data_chk);
				if($chk == FALSE){
					$data=array(
						"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
							<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> มี username ดังกล่าวอยู่ในระบบอยู่แล้ว!</div></div>',
					);
					$this->load->view('navbar');
					$this->load->view('add_admin', $data);
				}else{
					
						$this->sql_admin->add_process01($table,$data);
						redirect("ctrl_admin/sh_admins");
				}
			}
			else{$this->load->view('navbar');$this->load->view('add_admin',$data); }
		}
	}
	public function del_admin($id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')!="mx"){echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";}
			else{
				$table="pk_admin";
				$field="ad_id";
				$this->sql_admin->del($table,$field,$id);
				redirect('ctrl_admin/sh_admins');
			}
		}
	}
	public function edit_admin(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
			}
			else{

				$table="pk_admin";
				$field="ad_id";
				$id=$this->input->post("ad_id");		
					$data=array(
								"ad_name"=>$this->input->post("ad_name"),
								"ad_lname"=>$this->input->post("ad_lname"),
								"ad_username"=>$this->input->post("ad_username"),	
								"ad_status"=>$this->input->post("ad_status"),
					);
					$this->sql_admin->update_admin($table,$field,$id,$data);
					$data['row']=$this->sql_admin->select_where($table,$field,$id);

		            $username = $this->input->post("ad_username");

		            $checking = $this->sql_admin->select_where($table,"ad_username",$username);
		            	            
		            if ($checking != FALSE) {
		                foreach ($checking as $apps) {
		                    $session_data = array(
		                        'ad_id'   => $apps['ad_id'],
		                        'ad_name' => $apps['ad_name'],
		                        'ad_lname' => $apps['ad_lname'],
		                        'ad_username' => $apps['ad_username'],
		                        'ad_password' => $apps['ad_password'],
		                        'ad_status' => $apps['ad_status'],
		                    );
		                    $this->session->set_userdata($session_data);
			            }
			        }

					$data['fnc']="pk_machine";
	    			$data['label']="ค้นหาทะเบียนรถ";
					$this->load->view('navbar',$data);
					$this->load->view("show_admin",$data);
				}	
		}		
	}
	public function edit_dep(){

		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
			}
			else{
				$data['fnc']="pk_machine";
	    		$data['label']="ค้นหาทะเบียนรถ";

				$table="pk_dep";
				$field="d_id";
				$id=$this->input->post("d_id");		
					$data=array(
								"d_code"=>$this->input->post("d_code"),
								"d_name"=>$this->input->post("d_name"),
					);
				$this->sql_admin->update_data($table,$field,$id,$data);
				$data['row']=$this->sql_admin->select_where($table,$field,$id);
				$file=$table."_show";
				$data['fnc']="pk_machine";
	    		$data['label']="ค้นหาทะเบียนรถ";
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);//echo $file;
			}
		}
	}
	public function edit_admin_pass(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
			
				
			}	
			else{
				$data['fnc']="pk_machine";
	    		$data['label']="ค้นหาทะเบียนรถ";

				$table="pk_admin";
				$field="ad_id";
				$id=$this->input->post("ad_id");
				if($this->input->post("ad_password")==$this->input->post("con_password")){
					if($this->input->post("ad_password")==""){
						$data=array(
							"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
								<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> password ไม่ควรว่าง</div></div>',
						);	
					}
					else{
						$data=array(
							'ad_password'=>md5(md5($this->input->post("ad_password"))),
						);
						$this->sql_admin->update_admin($table,$field,$id,$data);
					}
				}
				else{
					$data=array(
							"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
								<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> password ไม่ถูกต้อง</div></div>',
						);	
				}
				$data['row']=$this->sql_admin->select_where($table,$field,$id);
				$data['fnc']="pk_machine";
	    		$data['label']="ค้นหาทะเบียนรถ";
				$this->load->view('navbar',$data);
				$this->load->view("show_admin",$data);
			}
		}
	}


	// ----------------------    New Gen  --------------------------


	/* ----------------------  public function --------------------*/
	public function select_all($table,$order_by){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$order_type="DESC";
			$data['row']=$this->sql_admin->select_all($table,$order_by,$order_type);
			$data['num']=$this->sql_admin->db_num_rows_all($table);
			$file=$table."_shows";
			$this->load->view('navbar',$data);
			$this->load->view($file,$data);
		}
	}
	public function select_where($table,$field,$id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$data['row']=$this->sql_admin->select_where($table,$field,$id);
			$data['num']=$this->sql_admin->db_num_rows_where($table,$field,$id);
			$file=$table."_show";
			//echo $file;
			if($data['row']!=FALSE){
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}else{
				$data['row']="No Data!";
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
				
			}
		}
	}
	public function del_data($table,$field,$id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$this->sql_admin->del($table,$field,$id);
				$file=$table."_shows";
				//echo $file;
				redirect("ctrl_admin/select_all/$table/$field");
			}
		}
	}
	public function open_frm_add($table){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$data['fnc']=$table;
	    		$data['label']="ค้นหา";
				$file=$table."_add";
				$this->load->view('navbar',$data);
				$this->load->view($file);
			}
		}
	}

	/*-----------------------  private function  ----------------*/
	public function pk_users_std_d_id(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$d_id=$this->input->post('d_id');
			if($d_id==""){redirect("ctrl_admin/open_frm_add/pk_users_std_d_id");
			}
			else{
				$data['row']=$this->sql_admin->select_where("pk_class","d_id",$d_id);
				$this->load->view('navbar',$data);
				$this->load->view("pk_users_std_add",$data);
			}
		}
	}
	public function join_sh_all(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$tb_join="pk_users_std,pk_class,pk_dep";
			$f_join="pk_users_std.c_id=pk_class.c_id && pk_class.d_id=pk_dep.d_id";
			$f_join_order="pk_dep.d_id";

			$data['row']=$this->sql_admin->join_sh_all($tb_join,$f_join,$f_join_order);
			$data['num']=$this->sql_admin->join_sh_all_num($tb_join,$f_join);
			$file="pk_users_std_shows";
			if($data['row']!=FALSE){
				$this->load->view('navbar');
				$this->load->view($file,$data);
			}else{
				$this->load->view('navbar');
				$this->load->view($file,$data);
			}
		}
	}
					/*---------- user_std ----------*/
	public function pk_users_std(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_users_std";
    		$data['label']="ค้นหาทะเบียนรถ";
    		$tb_join="pk_users_std,pk_class,pk_dep";
    		if(!empty($this->input->post("txt_search"))){$txt_search=$this->input->post("txt_search");
				$f_join="pk_users_std.c_id=pk_class.c_id && pk_class.d_id=pk_dep.d_id && pk_users_std.us_std_id like '%".$txt_search."%'";
			}else{
				$f_join="pk_users_std.c_id=pk_class.c_id && pk_class.d_id=pk_dep.d_id";
			}

			$f_join_order="pk_dep.d_id";
			$data['row']=$this->sql_admin->join_sh_all($tb_join,$f_join,$f_join_order);
			$data['num']=$this->sql_admin->join_sh_all_num($tb_join,$f_join);
			//echo $num;
			$file="pk_users_std_shows";
			if($data['row']!=FALSE){
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}else{
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}
		}
	}
	public function join_pk_std_class_dep_where($us_id,$d_id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_users_std";
    		$data['label']="ค้นหาทะเบียนรถ";

			$tb_join="pk_users_std,pk_class,pk_dep";
			$f_join="pk_users_std.c_id=pk_class.c_id && pk_class.d_id=pk_dep.d_id && us_id=$us_id";
			$f_join_order="pk_dep.d_id";

			$data['row']=$this->sql_admin->join_sh_all($tb_join,$f_join,$f_join_order);
			$data['dep']=$this->sql_admin->select_where("pk_class","d_id",$d_id);
			$data['num']=$this->sql_admin->join_sh_all_num($tb_join,$f_join);
			//echo $num;
			$file="pk_users_std_show";
			if($data['row']!=FALSE){
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}else{
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}
		}
	}
	public function add_users_std_process(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$data['fnc']="pk_users_std";
	    		$data['label']="ค้นหาทะเบียนรถ";
				$data=array(
							"c_id"=>$this->input->post("c_id"),
							"us_std_id"=>$this->input->post("us_std_id"),
							"us_name"=>$this->input->post("us_name"),
							"us_lname"=>$this->input->post("us_lname"),
							"us_username"=>$this->input->post("us_username"),
							"us_password"=>$this->input->post("us_password"),
				);
				$config = array(
								array(
				                     'field'   => 'c_id', 
				                     'label'   => 'เลือกกลุ่มการเรียน', 
				                     'rules'   => 'required'
				                  ),
				               	array(
				                     'field'   => 'us_std_id', 
				                     'label'   => 'กรอกรหัสประจำตัวนักเรียน / นักศึกษา', 
				                     'rules'   => 'required'
				                  ),
				               	array(
				                     'field'   => 'us_name', 
				                     'label'   => 'กรอกชื่อนักเรียน', 
				                     'rules'   => 'required'
				                  ),
				               	array(
				                     'field'   => 'us_lname', 
				                     'label'   => 'กรอก นามสกุล นักเรียน / นักศึกกษา', 
				                     'rules'   => 'required'
				                  ),
				               	array(
				                     'field'   => 'us_username', 
				                     'label'   => 'สร้าง username', 
				                     'rules'   => 'required'
				                  ),
				               	array(
				                     'field'   => 'us_password', 
				                     'label'   => 'password', 
				                     'rules'   => 'required'
				                  ),
				               	array(
				                     'field'   => 'us_password_conf', 
				                     'label'   => 'confirm password', 
				                     'rules'   => 'trim|required|matches[us_password]'
				                   
				                  ),
				);
				$this->form_validation->set_rules($config);
				$this->form_validation->set_message('required', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ห้ามว่าง</label>');
				$this->form_validation->set_message('matches', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ไม่ถูกต้อง</label>');

				if ($this->form_validation->run() == TRUE) {
					//echo " if 1 ok";
					$table="pk_users_std";
					$field_chk="us_std_id";
					$data_chk=$this->input->post("us_std_id");

					$chk=$this->sql_admin->chk_add_process01($table,$field_chk,$data_chk);
					if($chk == FALSE){
						$data=array(
							"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
								<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> มี รหัสนักเรียน / นักศึกกษา ดังกล่าวอยู่ในระบบอยู่แล้ว!</div></div>',
						);
						//echo " if 2 ok";

						$this->load->view('navbar',$data);
						$this->load->view('pk_users_std_add',$data); 
					}else{
							$this->sql_admin->add_process01($table,$data);
							$this->load->view('navbar',$data);
							redirect("ctrl_admin/pk_users_std");
					}
				}
				else{
					//echo "error if 1";
					$this->load->view('navbar',$data);
					$this->load->view('pk_users_std_add',$data); 
				}
			}
		}
	}
	public function del_std($table,$field,$id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$this->sql_admin->del($table,$field,$id);	
				redirect("ctrl_admin/pk_users_std");
			}
		}
	}
	public function edit_user_std($us_id,$tab,$d_id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$table="pk_users_std";
				$field="us_id";
				$d_id=$d_id;
				$id=$us_id;
				if($tab=="general"){
					$data=array(
								"us_name"=>$this->input->post("us_name"),
								"us_lname"=>$this->input->post("us_lname"),
								"c_id"=>$this->input->post("c_id"),
								"us_std_id"=>$this->input->post("us_std_id"),
					);
				}else if($tab=="security"){
					$data=array(
								"us_username"=>$this->input->post("us_username"),
								"us_password"=>$this->input->post("us_password"),
					);
				}		
				$this->sql_admin->update_data($table,$field,$id,$data);
				$file=$table."_show";
				redirect("ctrl_admin/join_pk_std_class_dep_where/$id/$d_id");
			}
		}
	}
					/*---------- end_user_std ----------*/
	public function add_dep_process(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$data=array(
						"d_code"=>$this->input->post("d_code"),
						"d_name"=>$this->input->post("d_name"),
			);
			$config = array(
			               	array(
			                     'field'   => 'd_code', 
			                     'label'   => 'รหัสแผนก', 
			                     'rules'   => 'required'
			                  ),
			               	array(
			                     'field'   => 'd_name', 
			                     'label'   => 'ชื่อแผนก', 
			                     'rules'   => 'required'
			                  ),
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_message('required', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ห้ามว่าง</label>');
			if ($this->form_validation->run() == TRUE) {

				$table="pk_dep";
				$field_chk="d_code";
				$data_chk=$this->input->post("d_code");
				$chk=$this->sql_admin->chk_add_process01($table,$field_chk,$data_chk);
				if($chk == FALSE){
					$data=array(
						"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
							<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> มี รหัสแผนก ดังกล่าวอยู่ในระบบอยู่แล้ว!</div></div>',
					);
					$this->load->view('navbar',$data_chk);
					$this->load->view('pk_dep_add', $data);
				}else{
						$this->sql_admin->add_process01($table,$data);
						$this->load->view('navbar',$data_chk);
						redirect("ctrl_admin/select_where/$table/$field_chk/$data_chk");
				}
			}
			else{
				$this->load->view('navbar',$data_chk);
				$this->load->view('pk_dep_add',$data); 
			}
		}
	}


	public function edit_class_process(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$table="pk_class";
			$field="c_id";
			$d_id=$this->input->post("call_back_id");
			$id=$this->input->post("c_id");	
			$data=array(
						"c_name"=>$this->input->post("c_name"),
			);

					$this->sql_admin->update_data($table,$field,$id,$data);
					$data['row']=$this->sql_admin->select_where($table,$field,$id);
					$file=$table."_show";
					redirect("ctrl_admin/join_pk_class_pk_dep/$table/d_id/$d_id");
		}
	}
	public function join_pk_class_pk_dep($table,$field,$id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$data['row']=$this->sql_admin->join_pk_class_pk_dep($id);
			$data['num']=$this->sql_admin->db_num_rows_where($table,$field,$id);
			$file="pk_class_show";
			$chk=$this->sql_admin->db_num_rows_where("pk_class","d_id",$id);
			if($chk==0){
				$s_select="*";
				$s_table="pk_dep";
				$s_field="d_id=$id";
			}else{
				$s_select="DISTINCT  pk_dep.d_name";
				$s_table="pk_dep,pk_class";
				$s_field="pk_class.d_id=pk_dep.d_id && pk_dep.d_id=$id";
			}
			$data['head']=$this->sql_admin->select_free($s_select,$s_table,$s_field);

			if($data['row']!=FALSE){
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}else{
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}
		}
	}
	public function join_pk_class_pk_dep_id_cid($table,$field,$id,$call_back_id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$data['call_back_id']=$call_back_id;
			$data['row']=$this->sql_admin->join_pk_class_pk_dep_id_cid($id);
			$data['num']=$this->sql_admin->db_num_rows_where($table,$field,$id);
			if($data['row']!=FALSE){
				$file="pk_class_edit";
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}else{
				$this->load->view('navbar',$data);
				$this->load->view($file,$data);
			}
		}
	}


	public function add_class_process(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";

			$data=array(
						"d_id"=>$this->input->post("d_id"),
						"c_code"=>$this->input->post("c_code"),
						"c_name"=>$this->input->post("c_name"),
			);
			$config = array(
							array(
			                     'field'   => 'd_id', 
			                     'label'   => 'แผนก', 
			                     'rules'   => 'required'
			                  ),
			               	array(
			                     'field'   => 'c_code', 
			                     'label'   => 'รหัสกลุ่มการเรียน', 
			                     'rules'   => 'required'
			                  ),
			               	array(
			                     'field'   => 'c_name', 
			                     'label'   => 'ชื่อกลุ่มการเรียน', 
			                     'rules'   => 'required'
			                  ),
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_message('required', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ห้ามว่าง</label>');
			if ($this->form_validation->run() == TRUE) {

				$table="pk_class";
				$field_chk="c_code";
				$data_chk=$this->input->post("c_code");
				$d_id=$this->input->post("d_id");
				$d_id=$this->input->post("d_id");

				$chk=$this->sql_admin->chk_add_process01($table,$field_chk,$data_chk);
				if($chk == FALSE){
					$data=array(
						"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
							<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> มี รหัสกลุ่มการเรียน ดังกล่าวอยู่ในระบบอยู่แล้ว!</div></div>',
					);
					$this->load->view('navbar',$data);
					$this->load->view('pk_class_add', $data);
				}else{
						$this->sql_admin->add_process01($table,$data);
						$this->load->view('navbar',$data);
						redirect("ctrl_admin/join_pk_class_pk_dep/$table/d_id/$d_id");
				}
			}
			else{
				$this->load->view('navbar');
				$this->load->view('pk_class_add',$data); 
			}
		}
	}

	public function del_class($table,$field,$id,$call_back_id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{

			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$this->sql_admin->del($table,$field,$id);
				$file=$table."_show";
				redirect("ctrl_admin/join_pk_class_pk_dep/$table/d_id/".$call_back_id);
			}
		}
	}

	public function pk_machine(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";
			$tb="pk_machine,pk_users_std";

			if(!empty($this->input->post("txt_search"))){$txt_search=$this->input->post("txt_search");
				$field="pk_machine.us_id=pk_users_std.us_id && pk_machine.mc_code like '%".$txt_search."%' || pk_machine.mc_brand like '%".$txt_search."%' || pk_machine.mc_series like '%".$txt_search."%' || pk_users_std.us_std_id like '%".$txt_search."%' || pk_users_std.us_name like '%".$txt_search."%' || pk_users_std.us_lname like '%".$txt_search."%'";
			}else{
				$field="pk_machine.us_id=pk_users_std.us_id";
				
			}
			$data['row']=$this->sql_admin->join_sh_all($tb,$field);
			$data['num']=$this->sql_admin->join_sh_all_num($tb,$field);
			$this->load->view("navbar",$data);
			$this->load->view("pk_machine_shows",$data);
		}
	}
	public function add_machine(){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{
			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$data['fnc']="pk_machine";
	    		$data['label']="ค้นหาทะเบียนรถ";
				$config = array(
					               	array(
					                     'field'   => 'us_id', 
					                     'label'   => 'รหัสนักเรียน / นักศึกษา', 
					                     'rules'   => 'required'
					                  ),
					               	array(
					                     'field'   => 'mc_code', 
					                     'label'   => 'ทะเบียนรถ ', 
					                     'rules'   => 'required'
					                  ),
					               	array(
					                     'field'   => 'mc_brand', 
					                     'label'   => 'ยี่ห้อรถ ', 
					                     'rules'   => 'required'
					                  ),   
					               	array(
					                     'field'   => 'mc_series', 
					                     'label'   => 'รุ่นรถ', 
					                     'rules'   => 'required'
					                  ),
					            );
					$this->form_validation->set_rules($config);
					$this->form_validation->set_message('required', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ห้ามว่าง</label>');

					if ($this->form_validation->run() == TRUE) {
						$us_id=$this->sql_admin->select_free("us_id","pk_users_std","us_std_id='".$this->input->post("us_id")."'");
						if($us_id==false){
							$data=array(
									"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
										<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> ไม่พบรหัสนักเรียน / นักศึกษา!</div></div>',
								);
								$this->load->view('navbar',$data);
								$this->load->view('pk_machine_add', $data);
						}else{
						$data=array(
									"us_id"=>$us_id[0]->us_id,
									"mc_code"=>$this->input->post("mc_code"),
									"mc_brand"=>$this->input->post("mc_brand"),
									"mc_series"=>$this->input->post("mc_series"),
											);

							$table="pk_machine";
							$field_chk="mc_code";
							$data_chk=$this->input->post("mc_code");
							$chk=$this->sql_admin->chk_add_process01($table,$field_chk,$data_chk);
							if($chk == FALSE){
								$data=array(
									"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
										<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> มี ทะเบียนรถ ดังกล่าวอยู่ในระบบอยู่แล้ว!</div></div>',
								);
								$this->load->view('navbar',$data);
								$this->load->view('pk_machine_add', $data);
							}else{
								
									$this->sql_admin->add_process01($table,$data);
									redirect("ctrl_admin/pk_machine");
							}
						}
						
					}
					else{$this->load->view('navbar',$data);$this->load->view('pk_machine_add',$data); }
				}
		}
	}
	public function sh_edit_machine($mc_id){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
			
		}else{
			$data['fnc']="pk_machine";
    		$data['label']="ค้นหาทะเบียนรถ";
			$data['row']=$this->sql_admin->select_free_array("*","pk_machine,pk_users_std,pk_class,pk_dep","pk_machine.us_id=pk_users_std.us_id && pk_users_std.c_id=pk_class.c_id && pk_class.d_id=pk_dep.d_id && pk_machine.mc_id=$mc_id");
			$this->load->view("navbar",$data);
			$this->load->view("pk_machine_show",$data);
		}
	}
	public function edit_pk_machine($mc_id,$tab){
		if(!$this->sql_admin->logged_id()){
    		$this->load->view('login');
		}else{

			if($this->session->userdata('ad_status')=="mn"){
				echo "<script>alert('ปฏิเสธการเข้าถึง');</script>";
				
			}else{
				$data['fnc']="pk_machine";
	    		$data['label']="ค้นหาทะเบียนรถ";
				if($tab=="general"){
					$data=array(
						"mc_code"=>$this->input->post("mc_code"),
						"mc_brand"=>$this->input->post("mc_brand"),
						"mc_series"=>$this->input->post("mc_series"),

					);
				}else if($tab=="user"){
					$us_id=$this->sql_admin->select_free("us_id","pk_users_std","us_std_id='".$this->input->post("us_std_id")."'");
					if($us_id!=false){
						$data=array(
							"us_id"=>$us_id[0]->us_id,
						);
					}else{echo "<script>alert('ไม่พบข้อมูลนักเรียนนักศึกษา');</script>";redirect("ctrl_admin/sh_edit_machine/$mc_id","refresh");}
				}
				$this->sql_admin->update_data("pk_machine","mc_id",$mc_id,$data);
				redirect("ctrl_admin/sh_edit_machine/$mc_id","refresh");
			}
		}
	}

	

}

