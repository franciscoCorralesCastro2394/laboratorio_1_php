<?php
 include('config.php');
class LoginSeguro extends CI_Controller {

public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url','url_helper'));
                $this->load->library('session'); }

 public function index()
        {
                $this->load->view('loginSeguro/index');
        }

public function result()
        {
        
        try {
          $data = $this->Google_GetAccessToken(APP_CLIENT_ID, APP_CLIENT_REDIRECT_URL, APP_CLIENT_SECRET, 
                $_GET['code']);
          $user = $this->Google_GetUserProfileInfo($data['access_token']);

                $dataUserForApp = array(
                                'displayName'   => $user['displayName'],
                                'email'         => $user['emails'][0]['value'],
                                'img'         => $user['image']['url'],
                                'loggedInApp'     => TRUE
                        );
           $this->session->set_userdata($dataUserForApp);
         
        }catch(Exception $ex){
          show_error($ex->getMessage(), 666);
        }

        $this->gotoNews();
         
        }

// Getting access token
 private function Google_GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {     
                $url = 'https://accounts.google.com/o/oauth2/token';                    
                
                $curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
                $ch = curl_init();              
                curl_setopt($ch, CURLOPT_URL, $url);            
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            
                curl_setopt($ch, CURLOPT_POST, 1);              
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);        
                $data = json_decode(curl_exec($ch), true);
                $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);              
                if($http_code != 200) 
                        throw new Exception('Error : Failed to receieve access token');
                        
                return $data;
        }
// Getting user profile information
 private  function Google_GetUserProfileInfo($access_token) {    
                $url = 'https://www.googleapis.com/plus/v1/people/me';                  
                
                $ch = curl_init();              
                curl_setopt($ch, CURLOPT_URL, $url);            
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
                $data = json_decode(curl_exec($ch), true);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);             
                if($http_code != 200) 
                        throw new Exception('Error : Failed to get user information');
                        
                return $data;
        }

public function logingOut() {
                $this->session->sess_destroy();
                redirect('loginSeguro/index');
        }

public function gotoNews(){

                $this->load->view('templates/header');
                redirect('News/index');
                $this->load->view('templates/footer');
}


public function resultFB()
        {
        $code = $this->input->get('code');
        try {
          $data = $this->GetAccessToken_FaceBook('587189128477000','http://localhost:8080/lab1_mvc_oauth/index.php/loginSeguro/resultFB','338d0597398a8c4ac3e7f4afce5d46ed',$code);
          $user = $this->GetUserProfileInfo_FaceBook($data['access_token']);

          echo json_encode($user);

                $dataUserForApp = array(
                                'displayName'   => $user['name'],
                                'email'         => $user['email'],
                                'img'         => $user['piture']['data']['url'],
                                'loggedInApp'     => TRUE
                      );

           $this->session->set_userdata($dataUserForApp);
         
        }catch(Exception $ex){
          show_error($ex->getMessage(), 666);
        }

        $this->gotoNews();
         
        }

        // Getting access token

 private function GetAccessToken_FaceBook($client_id, $redirect_uri, $client_secret, $code) {     
                $url = 'https://graph.facebook.com/v4.0/oauth/access_token';                    
                
                $curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code;
                $ch = curl_init();              
                curl_setopt($ch, CURLOPT_URL, $url);            
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            
                curl_setopt($ch, CURLOPT_POST, 1);              
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);        
                $data = json_decode(curl_exec($ch), true);
                $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);              
                if($http_code != 200) 
                        throw new Exception('Error : Failed to receieve access token');
                        
                return $data;
        }
// Getting user profile information
 private  function GetUserProfileInfo_FaceBook($access_token) {    
                $url = 'https://graph.facebook.com/v4.0/me?fields=id,name,email,picture';                  
                
                $ch = curl_init();              
                curl_setopt($ch, CURLOPT_URL, $url);            
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
                $data = json_decode(curl_exec($ch), true);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);             
                if($http_code != 200) 
                        throw new Exception('Error : Failed to get user information');
                        
                return $data;
        }


}
?>