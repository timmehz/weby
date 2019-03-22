<?php
		/****Error Reporting Start****/
		ini_set('display_errors',1); 
		error_reporting(E_ALL);
		/****Error Reporting End****/
?>

<?php

		function is_required($value){
		return isset($value) && $value !== ""; 
		}
		
		//max length
		function has_max_length($value, $max){
			return strlen($value) <= $max;
		}

//*format
		$email = "nobody@nowhere.com";
		// preg_match is most flexible
		if (!preg_match("/@/", $email)) {
			$errors['email'] = "Email is not configured properly, @ sign is missing.";
		}
		function validate_max_lengths($fields_with_max_lengths) {
			global $errors;
			//expect an associative array
			foreach($fields_with_max_lengths as $field => $max){
				$value = trim($_POST[$field]);
				if(!has_max_length($value, $max)){
					$errors[$field] = ucfirst($field) . " is too long.";
				}
			}
		}
		
		
			
			function form_errors($errors=array()) {
				$output = "";
				if (!empty($errors)){
				  $output .= "<div class=\"error\">";
				  $output .= "Please fix the following errors:";
				  $output .= "<ul>";
				  foreach ($errors as $key => $error) {
				    $output .= "<li>{$error}</li>";
				  }
				  $output .= "</ul>";
				  $output .= "</div>";
				}
				return $output;
			}
			?>