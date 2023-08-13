<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/26/18 1:43 PM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On ISP File @ System.php
 */

class System {

    public $error=[];
    /**
     * Set your company name
     * default ISP management
     * @var string
     */
    public $sysName = "CyberspaceBD";
    /**
     * Assign the CodeIgniter super-object
     * @var CI_Controller
     */
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
    }

    /**
     * @param $path
     * @param int $permission
     * @param bool $recursive
     * @return bool
     */

    public function mkdir($path,$permission=0777,$recursive=true){
        if (!empty($path)){

            if (!file_exists($path)){
                if (mkdir($path,$permission,$recursive)){
                    return true;
                }
            }
        }else{
            $this->error[] = "Please set directory path";
            return false;
        }

    }

    /**
     * @param $dir
     * @return bool
     */
    public function rmdir($dir){
        if (is_dir($dir)){
            if (@rmdir($dir)){
                return true;
            }else{
                $this->error[] = "Error Deleting [$dir] Directory";
                return false;
            }
        }else{
            $this->error[] = "Error empty Directory";
            return false;
        }
    }

    public function upload($path=""){
        unset($this->error);
        $config['upload_path']          = empty($path)?"./resource/":"./resource/{$path}";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;
        $dir = $config['upload_path'];

        $this->load->library('upload', $config);

        if(!is_dir($dir)){
            $this->mkdir($path);
        }
        if ( ! $this->upload->do_upload('userfile')) {
            $this->error[] = $this->upload->display_errors();
        }

        if (empty($this->error)){
            return $this->upload->data();
        }else{
            return ["error"=> true,"message"=>$this->error];
        }
    }

    public function findError(array $error){
        if (key_exists($error,"error")){
            return true;
        }else{
            return false;
        }
    }

    public function sendMail($to,$from,$subject,$body){
        $this->CI->load->library('email');

        $this->CI->email->from($from, $this->sysName);
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($body);

        if ($this->CI->email->send()){
            return true;
        }else{
            return false;
        }
    }
}