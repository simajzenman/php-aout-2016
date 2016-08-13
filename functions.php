<?php
	function assain($input){
		$input = trim(strip_tags($input));
		return $input;
	}
	
	function message_erreur($erreurs, $input){
     if(count($_POST)>0 && $erreurs[$input] != ''){
       echo '<p class="error">'.$erreurs[$input].'</p>';
     }
	}

	function is_valid_email($email) {
    	return filter_var($email, FILTER_VALIDATE_EMAIL);
   	}

   	function add_error($var,&$array,$string,$message){
   		if ($var == '' ) {
   			$array[$string] = $message;
   		}
   	}

    function get_query($files){
      return include($files);
    }

    function desabler(){
      if ($_SESSION['logged_admin'] != 'ok') {
        echo 'disabled';
      }
    }

?>