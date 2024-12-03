<?php 
	// Load the header files first
	header("Expires: 0"); 
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	header("cache-control: no-store, no-cache, must-revalidate"); 
	header("Pragma: no-cache");

	// Load necessary files then...
	require_once('../initialize.php');
	
	$action = $_REQUEST['action'];
	
	switch($action) 
	{
		case "addNewUser":
			$record = new User();

			$record->first_name 	= $_REQUEST['first_name'];
			$record->middle_name	= $_REQUEST['middle_name'];
			$record->last_name		= $_REQUEST['last_name'];				
			$record->email			= $_REQUEST['email'];
			$record->optional_email = $_REQUEST['optional_email'];
			$record->hall_email = $_REQUEST['hall_email'];
			$record->hr_email = $_REQUEST['hr_email'];
			$record->username		= $_REQUEST['username'];
			$record->password		= md5($_REQUEST['password']);
			$record->accesskey		= @randomKeys(25);
			$record->group_id		= $_REQUEST['field_type'];
			$record->status			= $_REQUEST['status'];
			$record->sortorder		= User::find_maximum();
			$record->added_date 	= registered();
			
			$checkDupliUname=User::checkDupliUname($record->username);
			if($checkDupliUname):
				echo json_encode(array("action"=>"warning","message"=>"Username Already Exists."));		
				exit;		
			endif;
			$db->begin();
			if($record->save()): $db->commit();
				$message  = sprintf($GLOBALS['basic']['addedSuccess_'], "User '".$record->first_name." ".$record->middle_name." ".$record->last_name."'");
			    echo json_encode(array("action"=>"success","message"=>$message));
				log_action("User [".$record->first_name." ".$record->middle_name." ".$record->last_name."] login Created ".$GLOBALS['basic']['addedSuccess'],1,3);
			else: $db->rollback(); echo json_encode(array("action"=>"error","message"=>$GLOBALS['basic']['unableToSave']));
			endif;
		break;
		
		case "editNewUser":
			$record = User::find_by_id($_REQUEST['idValue']);
			
			$record->first_name 	= $_REQUEST['first_name'];
			$record->middle_name	= $_REQUEST['middle_name'];
			$record->last_name		= $_REQUEST['last_name'];
			$record->email			= $_REQUEST['email'];
			$record->optional_email = $_REQUEST['optional_email'];
			$record->hall_email = $_REQUEST['hall_email'];
			$record->hr_email = $_REQUEST['hr_email'];
			$record->accesskey		= @randomKeys(25);
			if($record->username!=$_REQUEST['username']){
				$checkDupliUname=User::checkDupliUname($_REQUEST['username']);
				if($checkDupliUname):
					echo json_encode(array("action"=>"warning","message"=>"Username Already Exists."));	
					exit;		
				endif;
			}
			
			$record->username	= $_REQUEST['username'];			
			$record->status		= $_REQUEST['status'];
			$record->group_id	= $_REQUEST['field_type'];
			if(!empty($_REQUEST['password']))
			$record->password	= md5($_REQUEST['password']);
			$db->begin();
			if($record->save()):$db->commit();
			   $message  = sprintf($GLOBALS['basic']['changesSaved_'], "User '".$record->first_name." ".$record->middle_name." ".$record->last_name."'");
			    echo json_encode(array("action"=>"success","message"=>$message));
			   log_action("User [".$record->first_name." ".$record->middle_name." ".$record->last_name."] Edit Successfully",1,4);
			else: $db->rollback(); echo json_encode(array("action"=>"notice","message"=>$GLOBALS['basic']['noChanges']));
			endif;
		break;		

		case "userPermission":
			$record = User::find_by_id($_REQUEST['idValue']);
			
			$module_id = !empty($_REQUEST['module_id'])?$_REQUEST['module_id']:array();
			$record->permission = serialize($module_id);

			$db->begin();
			if($record->save()):$db->commit();
			   $message  = sprintf($GLOBALS['basic']['changesSaved_'], "User '".$record->first_name." ".$record->middle_name." ".$record->last_name."'");
			    echo json_encode(array("action"=>"success","message"=>$message));
			   log_action("User [".$record->first_name." ".$record->middle_name." ".$record->last_name."] Edit Successfully",1,4);
			else: $db->rollback(); echo json_encode(array("action"=>"notice","message"=>$GLOBALS['basic']['noChanges']));
			endif;
		break;
					
		case "delete":			
			$id = $_REQUEST['id'];
			$record = User::find_by_id($id);
			$db->begin();
			$res = $db->query("DELETE FROM tbl_users WHERE id='{$id}'");
			if($res):$db->commit();	else: $db->rollback();endif;
			reOrder("tbl_users", "sortorder");
			
			$message  = sprintf($GLOBALS['basic']['deletedSuccess_'], "User '".$record->first_name." ".$record->middle_name." ".$record->last_name."'");
			echo json_encode(array("action"=>"success","message"=>$message));					
			log_action("Question Category  [".$record->first_name.' '.$record->middle_name.' '.$record->last_name."]".$GLOBALS['basic']['deletedSuccess'],1,6);
		break;
		
		// Module Setting Sections  >> <<
		case "toggleStatus":
			$id = $_REQUEST['id'];
			$record = User::find_by_id($id);
			$record->status = ($record->status == 1) ? 0 : 1 ;
			$db->begin();  	
			$res = $record->save();
			if($res):$db->commit();	else: $db->rollback();endif;
			echo "";
		break;						
		case "sortbyadmin":
			$id 	= $_REQUEST['id']; 	// IS a line containing ids starting with : sortIds
			$order	= ($_REQUEST['toPosition']==1)?0:$_REQUEST['toPosition'];// IS a line containing sortorder
			$db->begin();
			$res = $db->query("UPDATE tbl_users SET sortorder=".$order." WHERE id=".$id." ");
			if($res):$db->commit();	else: $db->rollback();endif;
			reOrder("tbl_users", "sortorder");
			$message  = sprintf($GLOBALS['basic']['sorted_'], "User '".$record->first_name." ".$record->middle_name." ".$record->last_name."'");
			echo json_encode(array("action"=>"success","message"=>$message));	
		break;

		case "checkLogin":
			$session->start();
			$uname    = addslashes($_REQUEST['username']);
			$password = addslashes($_REQUEST['password']) ;

			$found_user = User::authenticateAdmin($uname, md5($password));
			// pr($found_user);
			
			// ** check the number of login attempts
			$_SESSION['countrials'] = (isset($_SESSION['countrials'])) ? $_SESSION['countrials']+1 : 1;
			if($found_user):	
				$session->set('u_group',$found_user->group_id);
				$session->set('u_id',$found_user->id);
				$session->set('acc_ip',$_SERVER['REMOTE_ADDR']);
				$session->set('acc_agent',$_SERVER['HTTP_USER_AGENT']);
				// $session->set('user_type',$found_user->type);
				$session->set('loginUser',$found_user->username);
				$session->set('accesskey',$found_user->accesskey);

				$preId = Config::getconfig_info();
				log_action($GLOBALS['login']['login'].$session->get('loginUser').$GLOBALS['login']['loggedIn'],1,1);
				echo json_encode(array("action"=>"success","pgaction"=>$preId->action));
			else: 
				echo json_encode(array("action"=>"unsuccess","message"=>"Username Or Password Not Match "));     
			endif;
			//  pr($_SESSION);
		break;
		
		case "changepassword":
			$record = User::find_by_id($_REQUEST['idValue']);	
			
			if(!empty($_REQUEST['password']))
			$record->password	= md5($_REQUEST['password']);	
			$db->begin();		
			if($record->save()): $db->commit();
				$message  = sprintf($GLOBALS['basic']['changesSaved_'], "User '".$record->first_name." ".$record->middle_name." ".$record->last_name."'");
			    echo json_encode(array("action"=>"success","message"=>$message));
			else: $db->rollback();echo json_encode(array("action"=>"error","message"=>$GLOBALS['basic']['unableToSave']));
			endif;
		break;
		
		case "forgetuser_password":
			$emailAddress  = addslashes($_REQUEST['mailaddress']);
			$mailcheck     = User::get_validMember_mail($emailAddress);
			
			if($mailcheck):			
				$accessToken = randomKeys(10);			
				$row = User::find_by_mail($emailAddress);
				
				$forgetRec	 = User::find_by_id($row->id);				
				$forgetRec->access_code = $accessToken;
				
				/* Mail Format */
				$siteName   = Config::getField('sitename',true);
				$AdminEmail = User::get_UseremailAddress_byId(1);		
				$UserName	= User::get_user_shotInfo_byId($row->id);
				$fullName	= $UserName->first_name.' '.$UserName->middle_name.' '.$UserName->last_name; 
				
				$msgbody = '<div>
				<h3>Reset password on '.$siteName.'</h3>				
				<div><font face="Trebuchet MS">Dear '.$fullName.' !</font> <br /><br><br>
				Please <a href="'.ADMIN_URL.'resetpassword-'.$accessToken.'">click here to reset your password.</a> <br><br>
				If you didn\'t request your password then delete this email.  <br>
				<br><br>
				<p>Thanks,
				<br> Webmaster<br>
				'.$siteName.'
				</p>
				</div>
				</div>';
				  
				 $mail = new PHPMailer();	
				
				 $mail->SetFrom($AdminEmail,$siteName);				 
				 $mail->AddReplyTo($forgetRec->email,$fullName);
				 $mail->AddAddress($forgetRec->email,$fullName);		  
				 $mail->Subject    = "Forgot password on ".$siteName;	
				 $mail->MsgHTML($msgbody);
				
				if(!$mail->Send()):
					echo json_encode(array('action'=>'unsuccess','message'=>'Not valid User email address'));
				else:
					$forgetRec->save();
					echo json_encode(array('action'=>'success','message'=>'Please check your mail for reset passord'));
				endif;				
			else:
				echo json_encode(array('action'=>'unsuccess','message'=>'Not valid User email address'));
			endif;
			if($mailcheck):			
				$accessToken = randomKeys(10);			
				$row = User::find_by_mail($emailAddress);
				
				$forgetRec	 = User::find_by_id($row->id);				
				$forgetRec->access_code = $accessToken;
				
				/* Mail Format */
				$siteName   = Config::getField('sitename',true);
				$AdminEmail = User::get_UseremailAddress_byId(2);		
				$UserName	= User::get_user_shotInfo_byId($row->id);
				$fullName	= $UserName->first_name.' '.$UserName->middle_name.' '.$UserName->last_name; 
				
				$msgbody = '<div>
				<h3>Reset password on '.$siteName.'</h3>				
				<div><font face="Trebuchet MS">Dear '.$fullName.' !</font> <br /><br><br>
				Please <a href="'.ADMIN_URL.'resetpassword-'.$accessToken.'">click here to reset your password.</a> <br><br>
				If you didn\'t request your password then delete this email.  <br>
				<br><br>
				<p>Thanks,
				<br> Webmaster<br>
				'.$siteName.'
				</p>
				</div>
				</div>';
				  
				 $mail = new PHPMailer();	
				
				 $mail->SetFrom($AdminEmail,$siteName);				 
				 $mail->AddReplyTo($forgetRec->email,$fullName);
				 $mail->AddAddress($forgetRec->email,$fullName);		  
				 $mail->Subject    = "Forgot password on ".$siteName;	
				 $mail->MsgHTML($msgbody);
				
				if(!$mail->Send()):
					echo json_encode(array('action'=>'unsuccess','message'=>'Not valid User email address'));
				else:
					$forgetRec->save();
					echo json_encode(array('action'=>'success','message'=>'Please check your mail for reset passord'));
				endif;				
			else:
				echo json_encode(array('action'=>'unsuccess','message'=>'Not valid User email address'));
			endif;
		break;
		
		case "resetuser_password":
			$id = addslashes($_REQUEST['userId']);
			$record = User::find_by_id($id);
			$record->password = md5($_REQUEST['password']);
			$record->access_code = randomKeys(10);
			if($record->save()):
				echo json_encode(array('action'=>'success','message'=>'Password has been changed, please login!'));
			else:
				echo json_encode(array('action'=>'unsuccess','message'=>'Internal error.'));
			endif;
		break;


			// Front User client
			case "registerNewClient":
				$record = new User();
	
				$record->first_name     = $_REQUEST['first_name'];
				$record->middle_name     = $_REQUEST['middle_name'];
				$record->last_name      = $_REQUEST['last_name'];
				$record->email          = $_REQUEST['email'];
				$record->contact        = $_REQUEST['mobile_no'];
				$record->username   = $_REQUEST['username'];
				$record->password       = md5($_REQUEST['password']);
				$record->accesskey      = @randomKeys(25);
				$record->group_id		= 3;
				$record->status         = 1;
				$record->sortorder      = User::find_maximum();
	
	
				$checkDupliEmail        = User::checkDupliEmail($record->email);
				if ($checkDupliEmail):
					$message = "This email already exists.";
					echo json_encode(array("action" => "warning", "message" => $message));
					exit;
				endif;
				$checkDupliusername        = User::checkDupliEmail($record->username);
				if ($checkDupliusername):
					$message = "This Username already exists.";
					echo json_encode(array("action" => "warning", "message" => $message));
					exit;
				endif;
	
				$db->begin();
				if ($record->save()): $db->commit();

				$client= new client();

				
				$client->first_name     = $_REQUEST['first_name'];
				$client->middle_name     = $_REQUEST['middle_name'];
				$client->last_name      = $_REQUEST['last_name'];
				$client->email          = $_REQUEST['email'];
				$client->mobile_no        = $_REQUEST['mobile_no'];
				$client->username   = $_REQUEST['username'];
				// $client->password       = md5($_REQUEST['password']);
				// $client->accesskey      = @randomKeys(25);
				$client->user_id		= $record->id;
				$client->status         = 1;
				$client->sortorder      = User::find_maximum();
				$db->begin();
				$client->save();
				$db->commit();

					$message = "Your registration is successful, you will be redirected to Login page!";
					echo json_encode(array('action' => 'success', 'message' => $message ));
					log_action("User [" . $record->first_name . " " . $record->last_name . "] login Created " . $GLOBALS['basic']['addedSuccess'], 1, 3);
				else:
					$message = "Internal error!";
					echo json_encode(array('action' => 'unsuccess', 'message' => $message));
				endif;

				
	
	
				// $checkDupliEmail        = User::checkDupliEmail($client->email);
				// if ($checkDupliEmail):
				// 	$message = "This email already exists.";
				// 	echo json_encode(array("action" => "warning", "message" => $message));
				// 	exit;
				// endif;
				// $checkDupliusername        = User::checkDupliEmail($client->username);
				// if ($checkDupliusername):
				// 	$message = "This Username already exists.";
				// 	echo json_encode(array("action" => "warning", "message" => $message));
				// 	exit;
				// endif;
				// $dbclient->begin();
				// if ($client->save()): $dbclient->commit();
				// log_action("User [" . $client->first_name . " " . $client->last_name . "] login Created " . $GLOBALS['basic']['addedSuccess'], 1, 3);
				// else:
				// $message = "Internal error!";
				// endif;
			break;

			// Front User client
			case "registerNewfreelancer":
				$record = new User();
	
				$record->first_name     = $_REQUEST['first_name'];
				$record->middle_name     = $_REQUEST['middle_name'];
				$record->last_name      = $_REQUEST['last_name'];
				$record->email          = $_REQUEST['email'];
				$record->contact        = $_REQUEST['mobile_no'];
				$record->username   = $_REQUEST['username'];
				$record->password       = md5($_REQUEST['password']);
				$record->accesskey      = @randomKeys(25);
				$record->group_id		= 4;
				$record->status         = 1;
				$record->sortorder      = User::find_maximum();
	
	
				$checkDupliEmail        = User::checkDupliEmail($record->email);
				if ($checkDupliEmail):
					$message = "This email already exists.";
					echo json_encode(array("action" => "warning", "message" => $message));
					exit;
				endif;
				$checkDupliusername        = User::checkDupliEmail($record->username);
				if ($checkDupliusername):
					$message = "This Username already exists.";
					echo json_encode(array("action" => "warning", "message" => $message));
					exit;
				endif;
	
				$db->begin();
				if ($record->save()): $db->commit();

				$freelancer= new freelancer();

				
				$freelancer->first_name     = $_REQUEST['first_name'];
				$freelancer->middle_name     = $_REQUEST['middle_name'];
				$freelancer->last_name      = $_REQUEST['last_name'];
				$freelancer->email          = $_REQUEST['email'];
				$freelancer->mobile_no        = $_REQUEST['mobile_no'];
				$freelancer->username   = $_REQUEST['username'];
				// $freelancer->password       = md5($_REQUEST['password']);
				// $freelancer->accesskey      = @randomKeys(25);
				$freelancer->user_id		= $record->id;
				$freelancer->status         = 1;
				$freelancer->sortorder      = User::find_maximum();
				$db->begin();
				$freelancer->save();
				$db->commit();

					$message = "Your registration is successful, you will be redirected to Login page!";
					echo json_encode(array('action' => 'success', 'message' => $message ));
					log_action("User [" . $record->first_name . " " . $record->last_name . "] login Created " . $GLOBALS['basic']['addedSuccess'], 1, 3);
				else:
					$message = "Internal error!";
					echo json_encode(array('action' => 'unsuccess', 'message' => $message));
				endif;
			break;

			case "frontLogin":
				$email      = addslashes($_REQUEST['email']);
				$emailoruser = explode("@",$email);
				// pr($emailoruser);
				// if(!empty($emailoruser[1])){
					// 	$sqluser='email="' . $email . '"';
					// }
					// else{
						// 	$sqluser='username="' . $email . '"';
						
						// }
						$paccess    = addslashes($_REQUEST['password']);
						
						$sql = 'SELECT * FROM tbl_users WHERE ((email="' . $email . '" or username="' . $email . '")';
						// pr($sql);
						$sql .= ' AND password="' . md5($paccess) . '") AND (group_id=3 OR group_id=4) LIMIT 1';
						// $sql .= ' AND password="' . md5($paccess) . '"  LIMIT 1';
						// pr($sql);
				$count = $db->num_rows($db->query($sql));
	
				if ($count > 0) {
					$sqlid = $db->fetch_object($db->query($sql));
					
					$userid = $sqlid->id;
					// $client= client::find_by_email($sqlid->email);
					// $freelancer= freelancer::find_by_email($sqlid->email);
					if($sqlid->group_id==3){
						$usertype='client';
					}
					elseif($sqlid->group_id==4){
						$usertype='freelancer';
					}
					else{
						$usertype='';
					}

					if(!empty($emailoruser[1])){
						$uprec = User::find_by_mail($email);
					}
					else{
						$uprec = User::find_by_username($email);
						
					}
					// pr();

					// $uprec = User::find_by_mail($email);
	
					if ($uprec->status == 0) {
						$message = "Your account has not been approved!";
						echo json_encode(array("action" => "error", "message" => $message));
					} else {
						$session->set('email_logged', $email);
						$session->set('user_id', $userid);
						$session->set('user_type', $usertype);
						$remember = isset($_REQUEST['remember']) ? 1 : 0;
	
						if (!empty($remember)) {
							setcookie("remem_email", $email, time() + (60 * 60), "/", "");
							setcookie("remem_pass", $paccess, time() + (60 * 60), "/", "");
						} else {
							setcookie("remem_email", '', time() - (60 * 60), "/", "");
							setcookie("remem_pass", '', time() - (60 * 60), "/", "");
						}
						$message = "Welcome " . $uprec->first_name . "! You will be redirected to Dashboard shortly!";
						if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'checkout') {
							$message = "Welcome " . $uprec->first_name . "!";
						}
						echo json_encode(array("action" => "success", "message" => $message));
					}
				} else {
					$message = "Email or Password doesn't match !";
					echo json_encode(array("action" => "error", "message" => $message));
				}
				break;

				case "updateProfileFreelancer":
					// $freelancerda= user::find_by_id($_SESSION['user_id']);
					$record = freelancer::find_by_userid($_SESSION['user_id']);
					// pr($record);
					
					// $record->slug 		= create_slug($_REQUEST['title']);							
					// $record->email 		= $_REQUEST['email'];
					$record->first_name 	= $_REQUEST['firstname'];	
					$record->middle_name 	= $_REQUEST['middle_name'];	
					$record->last_name 	= $_REQUEST['last_name'];	
					$record->engineering_license_no 		= $_REQUEST['engineering_license_no'];		
					$record->engineering_field	= $_REQUEST['engineering_field'];
					$record->mobile_no 		= $_REQUEST['mobile_no'];
					// $record->education_lvl 		= $_REQUEST['education_lvl'];
					$record->current_address 		= $_REQUEST['current_address'];
					$record->permanent_address 		= $_REQUEST['permanent_address'];
					$record->pan_no 		= $_REQUEST['pan_no'];
					$record->permanent_address 		= $_REQUEST['permanent_address'];
					$record->upload_certificate       = (!empty($_REQUEST['imageArrayname2'])) ? $_REQUEST['imageArrayname2'] : '';	
					$record->profile_picture       = (!empty($_REQUEST['imageArrayname'])) ? $_REQUEST['imageArrayname'] : '';	
					$record->portfolio_website 	= $_REQUEST['portfolio_website'];			
					$record->facebook_profile		= $_REQUEST['facebook_profile'];
					$record->linkedIn_profile		= $_REQUEST['linkedIn_profile'];
					$record->status	= 1;
		
					$db->begin();
					if($record->save()): 

						$user = User::find_by_id($_SESSION['user_id']);
						if(!empty($user->password))
						$user->password       = (!empty($_REQUEST['password'])) ? $_REQUEST['password'] : $user->password;	
						$user->save();
						
						$db->commit();
					   $message  = sprintf($GLOBALS['basic']['changesSaved_'], "Freelancer '".$record->first_name."'");
					   echo json_encode(array("action"=>"success","message"=>$message));
					   log_action("Freelancer [".$record->first_name."] Edit Successfully",1,4);
					else: $db->rollback(); echo json_encode(array("action"=>"notice","message"=>$GLOBALS['basic']['noChanges']));
					endif;
				break;

				case "updateProfileClient":
					// $freelancerda= user::find_by_id($_SESSION['user_id']);
					$record = freelancer::find_by_userid($_SESSION['user_id']);
					// pr($record);
					
					// $record->slug 		= create_slug($_REQUEST['title']);							
					// $record->email 		= $_REQUEST['email'];
					$record->mobile_no 		= $_REQUEST['mobile_no'];		
					$record->current_address	= $_REQUEST['current_address'];
					$record->permanent_address 		= $_REQUEST['permanent_address'];
					// $record->education_lvl 		= $_REQUEST['education_lvl'];
					$record->pan_no 		= $_REQUEST['pan_no'];
					$record->linkedIn_profile 		= $_REQUEST['linkedIn_profile'];
					$record->facebook_profile 		= $_REQUEST['facebook_profile'];
					$record->pan_no 		= $_REQUEST['pan_no'];
					// $record->upload_certificate       = (!empty($_REQUEST['imageArrayname2'])) ? $_REQUEST['imageArrayname2'] : '';
					$record->status	= 1;
		
					$db->begin();
					if($record->save()): 

						$user = User::find_by_id($_SESSION['user_id']);
						$user->contact 		= $_REQUEST['mobile_no'];	
						$user->password       = (!empty($_REQUEST['password'])) ? md5($_REQUEST['password']) : $user->password;	
						$user->save();
						
						$db->commit();
					   $message  = sprintf($GLOBALS['basic']['changesSaved_'], "Freelancer '".$record->first_name."'");
					   echo json_encode(array("action"=>"success","message"=>$message));
					   log_action("Freelancer [".$record->first_name."] Edit Successfully",1,4);
					else: $db->rollback(); echo json_encode(array("action"=>"notice","message"=>$GLOBALS['basic']['noChanges']));
					endif;
				break;
	}
?>