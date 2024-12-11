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
            $record->middle_name    = $_REQUEST['middle_name'];
            $record->last_name      = $_REQUEST['last_name'];
            $record->email          = $_REQUEST['email'];
            $record->contact        = $_REQUEST['mobile_no'];
            $record->username       = $_REQUEST['username'];
            $record->password       = md5($_REQUEST['password']);
            $record->accesskey      = @randomKeys(25);
            $record->group_id       = 3;
            $record->status         = 1;
            $record->sortorder      = User::find_maximum();
            $record->added_date     = registered();

            $checkDupliEmail    = User::checkDupliEmail($record->email);
            if ($checkDupliEmail):
                $message        = "This email already exists.";
                echo json_encode(array("action" => "warning", "message" => $message));
                exit;
            endif;
            $checkDupliusername = User::checkDupliEmail($record->username);
            if ($checkDupliusername):
                $message        = "This Username already exists.";
                echo json_encode(array("action" => "warning", "message" => $message));
                exit;
            endif;

            $db->begin();
            if ($record->save()): $db->commit();

                $client = new client();

                $client->first_name     = $_REQUEST['first_name'];
                $client->middle_name    = $_REQUEST['middle_name'];
                $client->last_name      = $_REQUEST['last_name'];
                $client->email          = $_REQUEST['email'];
                $client->mobile_no      = $_REQUEST['mobile_no'];
                $client->username       = $_REQUEST['username'];
                $client->user_id        = $record->id;
                $client->status         = 1;
                $client->sortorder      = User::find_maximum();
                $client->added_date     = registered();

                $db->begin();
                $client->save();
                $db->commit();

                $message    = "Your registration is successful, you will be redirected to Login page!";
                echo json_encode(array('action' => 'success', 'message' => $message));
                log_action("User [" . $record->first_name . " " . $record->last_name . "] login Created " . $GLOBALS['basic']['addedSuccess'], 1, 3);
            else:
                $message    = "Internal error!";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;

            $mailcheck = addslashes($_REQUEST['email']);
            if ($mailcheck):

                $row    = User::find_by_mail($mailcheck);

                $siteName   = Config::getField('sitename', true);
                $AdminEmail = User::get_UseremailAddress_byId(1);
                $fullName   = $_REQUEST['username'];

                $msgbody    = '<div>
					<h3>you have been registered as Client for ' . $siteName . '</h3>                
					<div>
					    <font face="Trebuchet MS">Dear ' . $fullName . ' !</font> <br /><br><br>
					    Please <a href="' . BASE_URL . 'login">click here to login.</a> <br><br>
					    <br><br>
					    <p>Thanks,<br>
					        ' . $siteName . '
					    </p>
					</div>
                </div>';

                $mail = new PHPMailer();

                $mail->SetFrom($AdminEmail, $siteName, 0);
                $mail->AddReplyTo($mailcheck, $fullName);
                $mail->AddAddress($mailcheck, $fullName);
                $mail->Subject = "Client Registration on " . $siteName;
                $mail->MsgHTML($msgbody);

                if (!$mail->Send()):
                    $message = "Not valid User email address";
                    echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                endif;
            else:
                $message = "Not valid User email address";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;
        break;

        // Front User client
        case "registerNewfreelancer":
            $record                 = new User();

            $record->first_name     = $_REQUEST['first_name'];
            $record->middle_name    = $_REQUEST['middle_name'];
            $record->last_name      = $_REQUEST['last_name'];
            $record->email          = $_REQUEST['email'];
            $record->contact        = $_REQUEST['mobile_no'];
            $record->username       = $_REQUEST['username'];
            $record->password       = md5($_REQUEST['password']);
            $record->accesskey      = @randomKeys(25);
            $record->group_id       = 4;
            $record->status         = 1;
            $record->sortorder      = User::find_maximum();
            $record->added_date     = registered();

            $checkDupliEmail    = User::checkDupliEmail($record->email);
            if ($checkDupliEmail):
                $message        = "This email already exists.";
                echo json_encode(array("action" => "warning", "message" => $message));
                exit;
            endif;
            $checkDupliusername = User::checkDupliEmail($record->username);
            if ($checkDupliusername):
                $message        = "This Username already exists.";
                echo json_encode(array("action" => "warning", "message" => $message));
                exit;
            endif;

            $db->begin();
            if ($record->save()): $db->commit();

                $freelancer = new freelancer();

                $freelancer->first_name     = $_REQUEST['first_name'];
                $freelancer->middle_name    = $_REQUEST['middle_name'];
                $freelancer->last_name      = $_REQUEST['last_name'];
                $freelancer->email          = $_REQUEST['email'];
                $freelancer->mobile_no      = $_REQUEST['mobile_no'];
                $freelancer->username       = $_REQUEST['username'];
                $freelancer->user_id        = $record->id;
                $freelancer->status         = 1;
                $freelancer->sortorder      = User::find_maximum();
                $freelancer->added_date     = registered();
                $db->begin();
                $freelancer->save();
                $db->commit();

                $message    = "Your registration is successful, you will be redirected to Login page!";
                echo json_encode(array('action' => 'success', 'message' => $message));
                log_action("User [" . $record->first_name . " " . $record->last_name . "] login Created " . $GLOBALS['basic']['addedSuccess'], 1, 3);
            else:
                $message    = "Internal error!";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;
            $mailcheck = addslashes($_REQUEST['email']);
            if ($mailcheck):

                $row    = User::find_by_mail($mailcheck);

                $siteName   = Config::getField('sitename', true);
                $AdminEmail = User::get_UseremailAddress_byId(1);
                $fullName   = $_REQUEST['username'];

                $msgbody    = '<div>
                    <h3>you have been registered as Freelancer for ' . $siteName . '</h3>                
                    <div>
                        <font face="Trebuchet MS">Dear ' . $fullName . ' !</font> <br /><br><br>
                        Please <a href="' . BASE_URL . 'login">click here to login.</a> <br><br>
                        <br><br>
                        <p>Thanks,<br>
                            ' . $siteName . '
                        </p>
                    </div>
                </div>';

                $mail = new PHPMailer();

                $mail->SetFrom($AdminEmail, $siteName, 0);
                $mail->AddReplyTo($mailcheck, $fullName);
                $mail->AddAddress($mailcheck, $fullName);
                $mail->Subject = "Freelancer Registration on " . $siteName;
                $mail->MsgHTML($msgbody);

                if (!$mail->Send()):
                    $message = "Not valid User email address";
                    echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                endif;
            else:
                $message = "Not valid User email address";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;
        break;

        case "forgotUserPassword":
            $emailAddress = addslashes($_REQUEST['email']);
            $mailcheck  = User::get_validMember_mail($emailAddress);

            if ($mailcheck):

                $row = User::find_by_mail($emailAddress);
                $forgetRec = User::find_by_id($row->id);
                $accessToken = @randomKeys(10);
                $forgetRec->access_code = $accessToken;

                /* Mail Format */
                $siteName       = Config::getField('sitename', true);
                $AdminEmail     = User::get_UseremailAddress_byId(1);
                $fullName       = $forgetRec->first_name." ".$forgetRec->last_name;

                $msgbody = '<div>
                <h3>Reset password on ' . $siteName . '</h3>                
                <div><font face="Trebuchet MS">Dear ' . $fullName . ' !</font> <br /><br><br>
                Please <a href="' . BASE_URL . 'reset-password/' . $accessToken . '">click here to reset your password.</a> <br><br>
                If you didn\'t request your password then delete this email.  <br>
                <br><br>
                <p>Thanks,
                <br> Webmaster<br>
                ' . $siteName . '
                </p>
                </div>
                </div>';

                $mail = new PHPMailer();

                $mail->SetFrom($AdminEmail, $siteName, 0);
                
    
                $mail->AddReplyTo($forgetRec->email, $fullName);
                $mail->AddAddress($forgetRec->email, $fullName);
                $mail->Subject = "Forgot password on " . $siteName;
                $mail->MsgHTML($msgbody);

                if (!$mail->Send()):
                    $message = "Not valid User email address";
                    echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                else:
                    $forgetRec->save();
                    $message = "Please check your mail for reset password";
                    echo json_encode(array('action' => 'success', 'message' => $message));
                endif;
            else:
                $message = "Not valid User email address";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;
        break;

        case "frontLogin":
            $email          = addslashes($_REQUEST['email']);
            $emailoruser    = explode("@", $email);
            $paccess        = addslashes($_REQUEST['password']);

            $sql    = 'SELECT * FROM tbl_users WHERE ((email="' . $email . '" or username="' . $email . '")';
            $sql    .= ' AND password="' . md5($paccess) . '") AND (group_id=3 OR group_id=4) LIMIT 1';
            $count  = $db->num_rows($db->query($sql));

            if ($count > 0) {
                $sqlid  = $db->fetch_object($db->query($sql));

                $userid = $sqlid->id;
                $usertype = '';
                if ($sqlid->group_id == 3) {
                    $usertype = 'client';
                } elseif ($sqlid->group_id == 4) {
                    $usertype = 'freelancer';
                }

                if ($sqlid->status == 0) {
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

                    $url = BASE_URL . 'dashboard';
                    $message = "Welcome " . $sqlid->first_name . "! You will be redirected to Dashboard shortly!";

                    // check required fields for Client and Freelancer
                    if ($sqlid->group_id == 3) {
                        // checking for Client
                        $clientRec = client::find_by_userid($sqlid->id);
                        if (
                            !isset($clientRec->email) || trim($clientRec->email) === '' ||
                            !isset($clientRec->username) || trim($clientRec->username) === '' ||
                            !isset($clientRec->mobile_no) || trim($clientRec->mobile_no) === '' ||
                            !isset($clientRec->current_address) || trim($clientRec->current_address) === '' ||
                            !isset($clientRec->permanent_address) || trim($clientRec->permanent_address) === ''
                        ) {
                            $url = BASE_URL . 'profile';
                            $message = "Welcome " . $sqlid->first_name . "! You will be redirected to Profile shortly! Please fill out your Profile!";
                        }
                    } elseif ($sqlid->group_id == 4) {
                        // checking for Freelancer
                        $freelancerRec = freelancer::find_by_userid($sqlid->id);
                        if (
                            !isset($freelancerRec->email) || trim($freelancerRec->email) === '' ||
                            !isset($freelancerRec->username) || trim($freelancerRec->username) === '' ||
                            !isset($freelancerRec->mobile_no) || trim($freelancerRec->mobile_no) === '' ||
                            !isset($freelancerRec->current_address) || trim($freelancerRec->current_address) === '' ||
                            !isset($freelancerRec->first_name) || trim($freelancerRec->first_name) === '' ||
                            !isset($freelancerRec->last_name) || trim($freelancerRec->last_name) === '' ||
                            !isset($freelancerRec->profile_picture) || trim($freelancerRec->profile_picture) === '' ||
                            !isset($freelancerRec->engineering_license_no) || trim($freelancerRec->engineering_license_no) === '' ||
                            !isset($freelancerRec->engineering_field) || trim($freelancerRec->engineering_field) === '' ||
                            !isset($freelancerRec->education_lvl) || trim($freelancerRec->education_lvl) === '' ||
                            !isset($freelancerRec->pan_no) || trim($freelancerRec->pan_no) === '' ||
                            !isset($freelancerRec->upload_certificate) || trim($freelancerRec->upload_certificate) === '' ||
                            !isset($freelancerRec->upload_cv) || trim($freelancerRec->upload_cv) === '' ||
                            !isset($freelancerRec->permanent_address) || trim($freelancerRec->permanent_address) === ''
                        ) {
                            $url = BASE_URL . 'profile';
                            $message = "Welcome " . $sqlid->first_name . "! You will be redirected to Profile shortly! Please fill out your Profile!";
                        }
                    }

                    echo json_encode(array("action" => "success", "message" => $message, "url" => $url));
                }
            } else {
                $message = "Email or Password doesn't match !";
                echo json_encode(array("action" => "error", "message" => $message));
            }
        break;

        case "updateProfileFreelancer":
            $record     = freelancer::find_by_userid($_SESSION['user_id']);
         
            if(empty($_REQUEST['imageArrayname'])):				
				echo json_encode(array("action"=>"warning","message"=>"Please Upload your Profile picture !"));
				exit;
            endif;
                if(empty($_REQUEST['imageArrayname2'])):				
                    echo json_encode(array("action"=>"warning","message"=>"Please Upload your Nepal Engineering Certificate !"));
                    exit;
                endif;
                    if(empty($_REQUEST['imageArrayname3'])):				
                        echo json_encode(array("action"=>"warning","message"=>"Please Upload your CV !"));
                        exit;
                    endif;
            // $record->slug 		= create_slug($_REQUEST['title']);
            // $record->email 		= $_REQUEST['email'];
            $record->first_name         = $_REQUEST['firstname'];
            $record->middle_name        = $_REQUEST['middle_name'];
            $record->last_name          = $_REQUEST['last_name'];
            $record->engineering_license_no = $_REQUEST['engineering_license_no'];
            $record->engineering_field  = $_REQUEST['engineering_field'];
            $record->mobile_no          = $_REQUEST['mobile_no'];
            $record->education_lvl 		= $_REQUEST['education_lvl'];
            $record->current_address    = $_REQUEST['current_address'];
            $record->permanent_address  = $_REQUEST['permanent_address'];
            $record->pan_no             = $_REQUEST['pan_no'];
            $record->permanent_address  = $_REQUEST['permanent_address'];
            $record->upload_cv          = (!empty($_REQUEST['imageArrayname3'])) ? $_REQUEST['imageArrayname3'] : '';
            $record->upload_certificate = (!empty($_REQUEST['imageArrayname2'])) ? $_REQUEST['imageArrayname2'] : '';
            $record->profile_picture    = (!empty($_REQUEST['imageArrayname'])) ? $_REQUEST['imageArrayname'] : '';
            $record->portfolio_website  = $_REQUEST['portfolio_website'];
            $record->facebook_profile   = $_REQUEST['facebook_profile'];
            $record->linkedIn_profile   = $_REQUEST['linkedIn_profile'];
            $record->status             = 1;

           	

            // giving online verification rating if all fields are present
            if(
                !empty($record->first_name) and
                !empty($record->last_name) and
                !empty($record->profile_picture) and
                !empty($record->engineering_license_no) and
                !empty($record->engineering_field) and
                !empty($record->mobile_no) and
                !empty($record->education_lvl) and
                !empty($record->current_address) and
                !empty($record->permanent_address) and
                !empty($record->pan_no) and
                !empty($record->upload_certificate) and
                !empty($record->upload_cv)
            ){
                $record->online_verification_rating = 1;
            }

            $db->begin();
            if ($record->save()):

                $user           = User::find_by_id($_SESSION['user_id']);
                $user->password = (!empty($_REQUEST['password'])) ? md5($_REQUEST['password']) : $user->password;
                $user->save();

                $db->commit();
                $message    = sprintf($GLOBALS['basic']['changesSaved_'], "Freelancer '" . $record->first_name . "'");
                echo json_encode(array("action" => "success", "message" => $message));
                log_action("Freelancer [" . $record->first_name . "] Edit Successfully", 1, 4);
            else: $db->rollback();
                echo json_encode(array("action" => "notice", "message" => $GLOBALS['basic']['noChanges']));
            endif;
        break;

        case "updateProfileClient":
            // pr($_FILES);
            // $freelancerda= user::find_by_id($_SESSION['user_id']);
            $record     = client::find_by_userid($_SESSION['user_id']);
            // pr($record);

            // $record->slug 		= create_slug($_REQUEST['title']);
            // $record->email 		= $_REQUEST['email'];
            $record->mobile_no          = $_REQUEST['mobile_no'];
            $record->current_address    = $_REQUEST['current_address'];
            $record->permanent_address  = $_REQUEST['permanent_address'];
            // $record->education_lvl 		= $_REQUEST['education_lvl'];
            $record->pan_no             = $_REQUEST['pan_no'];
            $record->linkdin_profile    = $_REQUEST['linkedIn_profile'];
            $record->facebook_profile   = $_REQUEST['facebook_profile'];
            $record->pan_no             = $_REQUEST['pan_no'];
            $record->profile_pictiure   = (!empty($_REQUEST['imageArrayname4'])) ? $_REQUEST['imageArrayname4'] : '';
            $record->status             = 1;

            $db->begin();
            if ($record->save()):

                $user           = User::find_by_id($_SESSION['user_id']);
                $user->contact  = $_REQUEST['mobile_no'];
                $user->password = (!empty($_REQUEST['password'])) ? md5($_REQUEST['password']) : $user->password;
                $user->save();

                $db->commit();
                $message        = sprintf($GLOBALS['basic']['changesSaved_'], "Freelancer '" . $record->first_name . "'");
                echo json_encode(array("action" => "success", "message" => $message));
                log_action("Freelancer [" . $record->first_name . "] Edit Successfully", 1, 4);
            else: $db->rollback();
                echo json_encode(array("action" => "notice", "message" => $GLOBALS['basic']['noChanges']));
            endif;
        break;

        case "checkFreelancerLoginForBid":
            $userId     = addslashes($_REQUEST['userId']);
            $jobId      = addslashes($_REQUEST['jobId']);

            $jobRec     = jobs::find_by_id($jobId);
            if ($jobRec->project_status != 1) {
                $message = "Bidding Closed !";
                echo json_encode(array("action" => "biddingClosed", "message" => $message));
                exit();
            }

            $sql    = 'SELECT * FROM tbl_users WHERE id="' . $userId . '" LIMIT 1';
            $count  = $db->num_rows($db->query($sql));

            if ($count > 0) {
                $uprec          = $db->fetch_object($db->query($sql));
                if ($uprec->status == 0) {
                    $message    = "Your account has been disabled !";
                    echo json_encode(array("action" => "disabled", "message" => $message));
                } elseif ($uprec->group_id != 4) {
                    $message    = "Only Freelancers can bid !";
                    echo json_encode(array("action" => "onlyFreelancer", "message" => $message));
                } else {
                    $message    = "Success";
                    echo json_encode(array("action" => "success", "message" => $message));
                }
            } else {
                $message    = "Please Login !";
                echo json_encode(array("action" => "noLogin", "message" => $message));
            }
        break;

        case "resetUserPassword":
            $id                 = addslashes($_REQUEST['id']);
            $record             = User::find_by_id($id);
            $record->password   = md5($_REQUEST['password']);
            $record->access_code = @randomKeys(10);
            if ($record->save()):
                $message = "Password has been changed, please login!";
                echo json_encode(array('action' => 'success', 'message' => $message));
            else:
                $message = "Internal error!";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;
        break;
	}
?>