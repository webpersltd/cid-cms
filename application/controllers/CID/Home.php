<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {    
		
	public function __construct()
    {
		parent::__construct();

		$this->load->helper('CID/nav');
		$this->load->model('Home_model');

		if (!$this->ion_auth->logged_in()){
		    $this->session->set_flashdata('message', "Please login first!!");
		    redirect('login', 'refresh');
		}

		if(isset($_SESSION['record_id'])){
			unset($_SESSION['record_id']);
		}		
	}

	public function index()
    {
    	$user                                 = $this->ion_auth->user()->row();
    	$data['top_navigation']               = 0;
    	$data['my_records']                   = $this->Home_model->get_my_records(0);
    	$data['for_approval']                 = $this->Home_model->get_records_for_approval(0);
    	$data['approved']                     = $this->Home_model->get_approved_records(0);
    	$data['paginationConfigForMyRecords'] = $this->pagination_configuration(count($this->Home_model->get_my_records()), 'myRecord');
    	$data['paginationConfigForApproval']  = $this->pagination_configuration(count($this->Home_model->get_records_for_approval()), 'approval');
    	$data['paginationConfigForApproved']  = $this->pagination_configuration(count($this->Home_model->get_approved_records()), 'approved');

    	$this->Home_model->release_record_which_is_holded_by_me($user->id);

	   	$this->output->set_output_data("user", $user);
	   	$this->output->set_template('default');
	   	$this->load->js('js/home.js');
	   	$this->load->view('dashboard/home', $data);
	}

	public function view_record($urn = NULL){
		$user                   = $this->ion_auth->user()->row();
    	$data['top_navigation'] = 0;

    	$data['info'] = $this->Home_model->view_the_record($urn);

    	if($data['info'] == NULL){
    		$this->session->set_flashdata('warning', "No data found.");
    		redirect('dashboard', 'refresh');
    	}else{
    		foreach ($data['info'] as $value) {
    			$record_id = $value->rid;
    			$user_id   = $value->user_id;
    			break;
    		}

    		$record_hold['record_id']  = $record_id;
    		$record_hold['user_id']    = $user->id;
    		$record_hold['created_at'] = date("Y-m-d H:i:s");

    		if( $this->Home_model->record_on_hold($record_id, $record_hold) 
    			&& $user_id != $this->ion_auth->user()->row()->id 
    			&& $this->user_management->has_review_permission($record_id) ){

    			$this->session->set_flashdata('warning', "The record has been holded by another user.");
    			redirect('dashboard','refresh');
    		}

    		$record_accessible = false;

    		if($user_id == $this->ion_auth->user()->row()->id){
    			$record_accessible = true;
    		}else if( $this->user_management->has_review_permission($record_id) 
    					&& ( $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == $this->ion_auth->user()->row()->id 
    						|| $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == NULL ) ){

    			$record_accessible = true;

    		}

    		if(!$record_accessible){
    			$this->session->set_flashdata('warning', "Access Denied!!");
    			redirect('dashboard','refresh');
    		}
    	}

	   	$this->output->set_output_data("user", $user);
	   	$this->output->set_template('default');
	   	$this->load->view('dashboard/view_record', $data);
	}

	/*The record will get the continue opprotunity if and only if the record is inputted by me. This function will work for only my records inputted. The "has_review_permission" function will return 'Continue' when the record will not have protective marking selected.*/
	public function continue($urn = NULL){
		$record_info = $this->Home_model->get_a_record_initial_info($urn);

		if(!is_null($record_info)){
			$record_id         = $record_info->id;
			$user_id           = $record_info->user_id;
			
			$record_accessible = false;

			if($user_id == $this->ion_auth->user()->row()->id && $this->user_management->has_review_permission($record_id, "check_continue") === "continue"){
				$record_accessible = true;
			}

			if(!$record_accessible){
				$this->session->set_flashdata('warning', "Access Denied!!");
				redirect('dashboard','refresh');
			}

			$_SESSION['record_id'] = $record_id;
			redirect('protectivemark/','refresh');
		}else{
			$this->session->set_flashdata('warning', "No Record Found.");
    		redirect('dashboard', 'refresh');
		}

	}

	public function review_approve($urn = NULL){

		$record_info = $this->Home_model->get_a_record_initial_info($urn);

		if(!is_null($record_info)){

			$record_id = $record_info->id;

			$record_hold['record_id']  = $record_id;
    		$record_hold['user_id']    = $this->ion_auth->user()->row()->id;
    		$record_hold['created_at'] = date("Y-m-d H:i:s");

			if( $this->user_management->has_review_permission($record_id)
				&& $this->Home_model->record_on_hold($record_id, $record_hold) ){

				$this->session->set_flashdata('warning', "It's a long time the record has been holding by you. So, the record has been holded by another user now.");
				redirect( 'dashboard', 'refresh' );
			}

			$record_accessible = false;

			if( $this->user_management->has_review_permission($record_id) 
				&& ( $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == $this->ion_auth->user()->row()->id || $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == NULL ) ){

				$record_accessible = true;
			}

			if(!$record_accessible){
				$this->session->set_flashdata('warning', "The Record has been started reviewing by another authorized user.");
				redirect('dashboard','refresh');
			}

			$_SESSION['record_id'] = $record_id;
			redirect('review/','refresh');
			
		}else{
			$this->session->set_flashdata('warning', "No Record Found.");
    		redirect('dashboard', 'refresh');
		}

	}

	public function pagination_configuration($total_rows, $pagination_for){

    	$config                     = array();
		$config["base_url"]         = "#_".$pagination_for;
		$config["total_rows"]       = $total_rows;
		$config["per_page"]         = 5;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"]    = '<ul class="pagination">';
		$config["full_tag_close"]   = '</ul>';
		$config["first_tag_open"]   = '<li>';
		$config["first_tag_close"]  = '</li>';
		$config["last_tag_open"]    = '<li>';
		$config["last_tag_close"]   = '</li>';
		$config["next_link"]        = '&gt;';
		$config["next_tag_open"]    = '<li>';
		$config["next_tag_close"]   = '</li>';
		$config["prev_link"]        = '&lt;';
		$config["prev_tag_open"]    = '<li>';
		$config["prev_tag_close"]   = '</li>';
		$config["cur_tag_open"]     = '<li class="active"><a href="#">';
		$config["cur_tag_close"]    = '</a></li>';
		$config["num_tag_open"]     = '<li>';
		$config["num_tag_close"]    = '</li>';
		$config["num_links"]        = 1;

    	return $config;
	}

	public function get_info_by_pagination(){

		$page     = $this->input->post('start');
		$info_for = $this->input->post('info_for');		
		$start    = ($page-1) * 5;

		if (!$this->input->is_ajax_request()){
		   show_404();
		}else if($info_for == 'myRecord'){

			$data = $this->Home_model->get_my_records($start);

			if(!is_null($data)){
				$output = '<table class="table table-bordered">';
				$output .= "<tr>
				                <th>NO</th>
				                <th>URN</th>
				                <th>Department</th>
				                <th>Officer</th>
				                <th>Action</th>
				                <th>Approved</th>
				            </tr>";

				$counter = $start + 1;

				foreach ($data as $value) {
					
					if($counter%2 == 0){
						$output .= '<tr class="danger">';
					}else{
						$output .= '<tr class="success">';
					}

					$output .= "<td>".$counter."</td>";
					$output .= "<td>".$value->urn."</td>";
					$output .= "<td>".$value->name."</td>";
					$output .= "<td>".$value->first_name." ".$value->last_name."</td>";

					//5th column start
					$output .= "<td>";
					
					if(is_null($value->protective_id)){
						$output .= '<a href="'.base_url()."viewRecord/".$value->urn.'">
                        				<span class="glyphicon  glyphicon-forward" aria-hidden="true" style="color: red">&nbsp</span>
                    				</a>';
					}else{
						$output .= '<a href="'.base_url()."viewRecord/".$value->urn.'">';
						
						if( $this->user_management->this_record_is_already_started_reviewing_by_this_user($value->rid) != $this->ion_auth->user()->row()->id 
                            && $this->user_management->has_review_permission($value->rid) 
                            && !is_null($this->user_management->this_record_is_already_started_reviewing_by_this_user($value->rid)) ){

							$output .= '<span class="glyphicon  glyphicon-eye-open" style="color: red" aria-hidden="true">&nbsp</span>';

						}else{
							$output .= '<span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span>';	
						}

						$output .= '</a>';
					}

					$output .= "</td>";
					//5th column end

					if( $value->fully_submitted == 0 ){
						$output .= "<td>N</td>";
					}else{
						$output .= "<td>Y</td>";
					}

					$output .= "</tr>";

					$counter++;
				}
				$output .= "</table>";
			}

			$config = $this->pagination_configuration(count($this->Home_model->get_my_records()), 'myRecord');
			$this->pagination->initialize($config);		

			$finalOutput = array(
				'pagination_link'   => $this->pagination->create_links(),
				'information_table' => $output
			);

			echo json_encode($finalOutput);

		}else if($info_for == 'approval'){

			$data = $this->Home_model->get_records_for_approval($start);

			if(!is_null($data)){
				$output = '<table class="table table-bordered">';
				$output .= "<tr>
				                <th>NO</th>
				                <th>URN</th>
				                <th>Department</th>
				                <th>Officer</th>
				                <th>Action</th>
				                <th>Approved</th>
				            </tr>";

				$counter = $start + 1;

				foreach ($data as $value) {
					
					$output .= '<tr class="danger">';
					$output .= "<td>".$counter."</td>";
					$output .= "<td>".$value->urn."</td>";
					$output .= "<td>".$value->name."</td>";
					$output .= "<td>".$value->first_name." ".$value->last_name."</td>";

					//5th column start
					$output .= "<td>";
					
					if( $this->user_management->check_final_review_exist($value->rid) ){
						$output .= '<a href="'.base_url().'viewRecord/'.$value->urn.'"><span class="glyphicon  glyphicon-forward" aria-hidden="true" style="color: red">&nbsp</span></a>';
					}else{

						if( $this->user_management->record_on_hold($value->rid) ){
							$output .= '<a href="'.base_url().'viewRecord/'.$value->urn.'"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true" style="color: orange">&nbsp</span></a>';
						}else{
							$output .= '<a href="'.base_url().'viewRecord/'.$value->urn.'"><span class="glyphicon  glyphicon-eye-open" aria-hidden="true">&nbsp</span></a>';
						}

					}

					$output .= "</td>";
					//5th column end

					if( $value->fully_submitted == 0 ){
						$output .= "<td>N</td>";
					}else{
						$output .= "<td>Y</td>";
					}

					$output .= "</tr>";

					$counter++;
				}
				$output .= "</table>";
			}

			$config = $this->pagination_configuration(count($this->Home_model->get_records_for_approval()), 'approval');
			$this->pagination->initialize($config);		

			$finalOutput = array(
				'pagination_link'   => $this->pagination->create_links(),
				'information_table' => $output
			);

			echo json_encode($finalOutput);

		}else if($info_for == 'approved'){

			$data = $this->Home_model->get_approved_records($start);

			if(!is_null($data)){
				$output = '<table class="table table-bordered">';
				$output .= "<tr>
				                <th>NO</th>
				                <th>URN</th>
				                <th>Department</th>
				                <th>Officer</th>
				                <th>Action</th>
				                <th>Approved</th>
				            </tr>";

				$counter = $start + 1;

				foreach ($data as $value) {
					
					$output .= '<tr class="danger">';
					$output .= "<td>".$counter."</td>";
					$output .= "<td>".$value->urn."</td>";
					$output .= "<td>".$value->name."</td>";
					$output .= "<td>".$value->first_name." ".$value->last_name."</td>";

					//5th column start
					$output .= '<td><a href="'.base_url().'viewRecord/'.$value->urn.'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp</span></a></td>';
					//5th column end

					if( $value->fully_submitted == 0 ){
						$output .= "<td>N</td>";
					}else{
						$output .= "<td>Y</td>";
					}

					$output .= "</tr>";

					$counter++;
				}
				$output .= "</table>";
			}

			$config = $this->pagination_configuration(count($this->Home_model->get_approved_records()), 'approved');
			$this->pagination->initialize($config);		

			$finalOutput = array(
				'pagination_link'   => $this->pagination->create_links(),
				'information_table' => $output
			);

			echo json_encode($finalOutput);
		}else{
			show_404();
		}
	}
}