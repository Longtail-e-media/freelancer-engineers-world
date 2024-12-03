<?php

/**
 *      User dashboard + profile page
 */
$profile = '';
if (!empty($_SESSION)) {
    if (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'client') {

        $clientdata = client::find_by_userid($_SESSION['user_id']);
        $clientuser= user::find_by_id($_SESSION['user_id']);
        $profile .= '
            <main class="">
                <div class="bg-dark-blue">
                    <div class="container">
                        <h1 class="text-light py-5 fw-light fs-1">
                            Update your profile
                        </h1>
                    </div>
                </div>
                <section class="container form-container">
                    <div class="card p-5 bg-light border-0 rounded-0 shadow-sm">
                        <h2 class="fs-5 fw-bold mb-4">Client (Seller) Signup</h2>
                        <form id="clientfrm" class="client-form">
                            <!-- Username and Email -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="username" name="username"
                                            placeholder="Username" value="' . $clientdata->username . '">
                                        <label for="username">Username <span class="text-danger">*</span></label>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control border-0 rounded-0 fs-5" id="mobile" name="mobile_no" value="' . $clientdata->mobile_no . '"
                                            placeholder="Mobile">
                                        <label for="mobile">Mobile Number</label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Mobile Number and Location -->
                            <div class="row g-3 mt-0 mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 rounded-0 fs-5" id="email" name="email"
                                            placeholder="Email" value="' . $clientdata->email . '" disabled>
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control border-0 rounded-0 fs-5" id="password" name="password"
                                            placeholder="Password">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Current and Permanent Address -->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control border-0 rounded-0 fs-5" id="currentAddress" name="current_address"
                                            placeholder="Current Address" value="' . $clientdata->current_address . '" />
                                        <label for="currentAddress">Current Address <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control border-0 rounded-0 fs-5" id="permanentAddress" name="permanent_address"
                                            placeholder="Permanent Address" value="' . $clientdata->permanent_address . '"/>
                                        <label for="permanentAddress">Permanent Address <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control rounded-0 border-0 id="panNumber" name="pan_no" 
                                            placeholder="PAN Number" value="' . $clientdata->pan_no . '">
                                        <label for="panNumber">PAN Number</label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- PAN Number and LinkedIn Profile -->
                            <div class="row g-3 my-1">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="url" class="form-control rounded-0 border-0" id="linkedin" name="linkedIn_profile"
                                            placeholder="LinkedIn Profile" value="' . $clientdata->linkdin_profile . '">
                                        <label for="linkedin">LinkedIn Profile</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="url" class="form-control rounded-0 border-0" id="socialMedia" name="facebook_profile"
                                            placeholder="Social Media Profile" value="' . $clientdata->facebook_profile . '">
                                        <label for="socialMedia">Social Media Profile (Facebook)</label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="profile-picture-upload my-4 bg-light">
                                        <label for="profilePicture" class="form-label fw-bold">Upload Profile Picture</label>
                                        <input type="file" class="form-control border-0 rounded-0 fs-5" id="profilePicture"
                                            accept="image/*" onchange="previewImage(event)">
        
                                    </div>
        
                                    <div class="mb-4">
                                        <a href="https://chat.openai.com/" target="_blank" class="fst-italic text-dark">Use
                                            ChatGPT to Create Project Details</a>
                                    </div>
        
                                    <div>
                                        <button type="submit"
                                            class="btn btn-dark bg-dark-blue text-light px-5 py-2 fs-5 rounded-0 border-0 mt-4" id="submitClient">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <div class="profile-picture-preview mt-3" id="profilePicturePreview">
                                        <img src="" alt="Profile Preview" name="img">
                                    </div>
                                </div>
                                <div id="preview_Image"></div>
                                ';
                                if (!empty($user->image)) {
                                    $profile .= '
                                        <div class="" id="removeSavedimg1">
                                            <div class="infobox info-bg">
                                                <div class="button-group" data-toggle="buttons">
                                                    <a class="btn small float-right" href="javascript:void(0);" onclick="deleteSavedimage(1);">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                                <img src="' . IMAGE_PATH . 'freelancer/profile/thumbnails/' . $user->image . '" style="width:100%"/>
                                                <input type="hidden" name="imageArrayname" value="' . $user->image . '" class=""/>
                                            </div>
                                        </div>
                                
                                    ';
                                }
                              $profile .= '  <div class="col-md-3"></div>
                            </div>
        
                        </form>
                    </div>
                </section>
            </main>
        ';
    }
    if (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'freelancer') {

        $freelancerdata = freelancer::find_by_userid($_SESSION['user_id']);

        $profile = '
            <main class="">
                <div class="bg-dark-blue">
                    <div class="container">
                        <h1 class="text-light py-5 fw-light fs-1">
                            Update your Freelancer profile
                        </h1>
                    </div>
                </div>
                <section class="container form-container">
                    <div class="card p-5 bg-light border-0 rounded-0 shadow-sm">
                        <h2 class="fs-5 fw-bold mb-4">Freelancer (Engineer) Signup</h2>
                        <form class="freelancer-form" id="freelancerfrm">
                            <!-- Basic Information -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 rounded-0 fs-5" id="email" name="email"
                                            placeholder="Email" value="' . $freelancerdata->email . '" disabled>
                                        <label for="email">Email Address <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control border-0 rounded-0 fs-5" id="password" name="password"
                                            placeholder="Password" >
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Personal Information -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="firstName" name="firstname"
                                            placeholder="First Name" value="' . $freelancerdata->first_name . '">
                                        <label for="firstName">First Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="middleName" name="middle_name"
                                            placeholder="Middle Name" value="' . $freelancerdata->middle_name . '">
                                        <label for="middleName">Middle Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="lastName" name="last_name"
                                            placeholder="Last Name" value="' . $freelancerdata->last_name . '">
                                        <label for="lastName">Last Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Engineering Information -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="licenseNumber" name="engineering_license_no"
                                            placeholder="Engineering License Number" value="' . $freelancerdata->engineering_license_no . '">
                                        <label for="licenseNumber">Engineering License Number <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="fieldOfEngineering" name="engineering_field"
                                            placeholder="Field of Engineering Studies" value="' . $freelancerdata->engineering_field . '">
                                        <label for="fieldOfEngineering">Field of Engineering Studies <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Contact Information -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="mobileNumber" name="mobile_no"
                                            placeholder="Mobile Number" value="' . $freelancerdata->mobile_no . '">
                                        <label for="mobileNumber">Mobile Number <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="phoneNumber" name="phone_no"
                                            placeholder="Phone Number" value="' . $freelancerdata->mobile_no . '">
                                        <label for="phoneNumber">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 rounded-0 fs-5" id="education" value="' . $freelancerdata->education_lvl . '" name="education_lvl">
                                            <option value="" disabled selected>Select</option>
                                            <option value="Bachelor">Bachelor</option>
                                            <option value="Masters">Masters</option>
                                            <option value="PhD">PhD</option>
                                            <option value="PostDoc">PostDoc</option>
                                        </select>
                                        <label for="education">Highest Level of Education <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Address -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="currentAddress" name="current_address"
                                            placeholder="Current Address" value="' . $freelancerdata->current_address . '">
                                        <label for="currentAddress">Current Address <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="permanentAddress" name="permanent_address"
                                            placeholder="Permanent Address" value="' . $freelancerdata->permanent_address . '">
                                        <label for="permanentAddress">Permanent Address <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="panNumber" name="pan_no"
                                            placeholder="PAN Number" value="' . $freelancerdata->pan_no . '">
                                        <label for="panNumber">PAN Number <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- File Uploads -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <label class="form-label">Upload Nepal Engineering Certificate</label>
                                    <input type="file" class="form-control border-0 rounded-0 fs-5" id="eng_certify" name="eng_certify" 
                                        accept=".pdf,.doc,.docx" required>
                                </div>
                                    <div id="preview_Image"></div>
                                ';
                                if (!empty($freelancerdata->upload_certificate)) {
                                    $profile .= '
                                        <div class="" id="removeSavedimg2">
                                            <div class="infobox info-bg">
                                                <div class="button-group" data-toggle="buttons">
                                                    <a class="btn small float-right" href="javascript:void(0);" onclick="deleteSavedimage(2);">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                                <img src="' . IMAGE_PATH . 'freelancer/engineeringCertificate/thumbnails/' . $freelancerdata->upload_certificate . '" style="width:100%"/>
                                                <input type="hidden" name="imageArrayname2" value="' . $freelancerdata->upload_certificate . '" class=""/>
                                            </div>
                                        </div>
                                
                                    ';
                                }
                               $profile .= ' <div class="col-md-6">
                                    <label class="form-label">Upload CV</label>
                                    <input type="file" class="form-control border-0 rounded-0 fs-5" id="cv"
                                        accept=".pdf,.doc,.docx" required>
                                </div>
                            </div>
        
                            <!-- Social Links -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="otherWebsite" name="portfolio_website"
                                            placeholder="Other Website (Optional)" value="' . $freelancerdata->portfolio_website . '">
                                        <label for="otherWebsite">Portfolio Website</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="otherWebsite" name="facebook_profile"
                                            placeholder="Other Website (Optional)" value="' . $freelancerdata->facebook_profile . '">
                                        <label for="otherWebsite">Github Profile</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="linkedin" name="linkedIn_profile"
                                            placeholder="LinkedIn Profile" value="' . $freelancerdata->linkedIn_profile . '">
                                        <label for="linkedin">LinkedIn Profile</label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Profile Picture -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <label class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control border-0 rounded-0 fs-5" name="img" id="img"
                                        accept="image/*" >
                                </div>
                                  <div id="preview_Image"></div>
                                ';
                                if (!empty($freelancerdata->profile_picture)) {
                                    $profile .= '
                                        <div class="" id="removeSavedimg1">
                                            <div class="infobox info-bg">
                                                <div class="button-group" data-toggle="buttons">
                                                    <a class="btn small float-right" href="javascript:void(0);" onclick="deleteSavedimage(1);">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                                <img src="' . IMAGE_PATH . 'freelancer/profile/thumbnails/' . $freelancerdata->profile_picture . '" style="width:100%"/>
                                                <input type="hidden" name="imageArrayname" value="' . $freelancerdata->profile_picture . '" class=""/>
                                            </div>
                                        </div>
                                
                                    ';
                                }
                              $profile .= ' 
                                <div class="col-md-1"></div>
                                <div class="col-md-4 profile-picture-preview" id="profilePicturePreview">
                                    <img src="" alt="Profile Preview" id="profilePreviewImg">
                                </div>
                                <div class="col-md-3"></div>
        
                            </div>
        
                            <div class="mt-5">
                                <button type="submit" id="submitProfile"
                                    class="btn btn-dark bg-dark-blue text-light px-5 py-2 fs-5 rounded-0 border-0 mt-4">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </main>
        ';
    }
} else {
    $profile = 'please login to view profile';
}

$jVars['module:dashboard-profile'] = $profile;