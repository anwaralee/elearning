<?php class Enroll extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user')){
            redirect('login');
        }else{
            $this->load->model('paypal_model');
        }
        
     }
     
  
    
    function payFee(){
        $this->load->library( 'Paypal' );
        $this->paypal->initialize();
 
        $this->paypal->add_field( 'return', site_url( 'enroll/success' ) );
        $this->paypal->add_field( 'cancel_return', site_url( 'enroll/cancel' ) );
        $this->paypal->add_field( 'notify_url', site_url( 'enroll/ipn' ) );
 
        $training_id = $this->uri->segment('3');
        
        $result = $this->db->get_where('tbl_training',array('training_id'=>$training_id))->row();
        
        $courseName = $this->db->get_where('tbl_course',array('course_id'=>$result->course_id))->row()->course_name;
        $courseAmount = $this->db->get_where('tbl_course_fees',array('course_id'=>$result->course_id))->row()->course_fee;
        $this->paypal->add_field( 'item_name', $courseName);
        $this->paypal->add_field( 'amount', $courseAmount);
       
 
        $this->paypal->paypal_auto_form();
    }
    
    function ipn() {
        $this->load->library( 'Paypal' );
        if ( $this->paypal->validate_ipn() ) {
            $pdata = $this->paypal->ipn_data;
            if ($pdata['txn_type'] == "web_accept") {
                if($pdata['payment_status'] == "Completed"){
                    if($pdata['business'] == $this->config->item( 'paypal_email' )) {
                      $this->paypal_model->insertPayment($pdata);
                    }
                }
            }
        }
    }
 
    function success() {
        echo "success";
    }
 
    function cancel() {
        echo "canceled / failed";
    }
}