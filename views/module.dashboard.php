<?php

/**
 *      User dashboard + profile page
 */
$profile = "";
if (!empty($_SESSION)) {
    if (!empty($_SESSION["user_type"]) && ($_SESSION["user_type"] == "client") && defined('PROFILE_PAGE') ) {
        // pr($_SESSION["user_id"]);
        $clientdata = client::find_by_userid($_SESSION["user_id"]);
        $clientuser = user::find_by_id($_SESSION["user_id"]);

        $profile .=
            '
            <main class="">
                <div class="bg-dark-blue">
                     <div class="container py-5 d-flex align-items-center justify-content-between">
                        <h1 class="text-light fw-light fs-3">
                            Update your profile
                        </h1>
                         <a href="' .
            BASE_URL .
            'create-job" class="btn btn-dark bg-light text-dark px-4 py-2 fs-6 rounded-0">
                Create Job
                        </a>
                    </div>
                </div>
                <section class="container form-container">
                     <div class="card p-3 p-md-5 bg-light border-0 rounded-0 shadow-sm">
                <h2 class="fs-5 fw-bold mb-4">Client profile</h2>
                        <form id="clientfrm" class="client-form">
                            <!-- Username and Email -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="username" name="username"
                                            placeholder="Username" value="' .$clientdata->username .'">
                                        <label for="username">Username <span class="text-danger">*</span></label>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control border-0 rounded-0 fs-5" id="mobile" name="mobile_no" value="' .
            $clientdata->mobile_no .
            '"
                                            placeholder="Mobile">
                                        <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Mobile Number and Location -->
                            <div class="row g-3 mt-0 mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 rounded-0 fs-5" id="email" name="email"
                                            placeholder="Email" value="' .
            $clientdata->email .
            '" disabled>
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control border-0 rounded-0 fs-5" id="password" name="password"
                                            placeholder="Password">
                                        <label for="password">Password </label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Current and Permanent Address -->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control border-0 rounded-0 fs-5" id="currentAddress" name="current_address"
                                            placeholder="Current Address" value="' .
            $clientdata->current_address .
            '" />
                                        <label for="currentAddress">Current Address <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control border-0 rounded-0 fs-5" id="permanentAddress" name="permanent_address"
                                            placeholder="Permanent Address" value="' .
            $clientdata->permanent_address .
            '"/>
                                        <label for="permanentAddress">Permanent Address <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control rounded-0 border-0 id="panNumber" name="pan_no" 
                                            placeholder="PAN Number" value="' .
            $clientdata->pan_no .
            '">
                                        <label for="panNumber">PAN Number</label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- PAN Number and LinkedIn Profile -->
                            <div class="row g-3 my-1">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="url" class="form-control rounded-0 border-0" id="linkedin" name="linkedIn_profile"
                                            placeholder="LinkedIn Link" value="' .
            $clientdata->linkdin_profile .
            '">
                                        <label for="linkedin">LinkedIn Link</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="url" class="form-control rounded-0 border-0" id="socialMedia" name="facebook_profile"
                                            placeholder="Social Media Profile" value="' .
            $clientdata->facebook_profile .
            '">
                                        <label for="socialMedia">Social Media Profile (Facebook)</label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="profile-picture-upload my-4 bg-light">
                                        <label for="profilePicture" class="form-label fw-bold">Upload Profile Picture</label>
                                        <input type="file" class="form-control border-0 rounded-0 fs-5" id="clientprofile" name="clientprofile"
                                            accept="image/*" onchange="previewImage(event)">
                                        <small>(Only jpg, jpeg, png, webp, svg)</small>
                                    </div>
                                     <div id="preview_Image4"></div>';
        if (!empty($clientdata->profile_pictiure)) {
            $profile .=
                '
                                <div class="" id="removeSavedimg4">
                                    <div class="infobox info-bg">
                                        <div class="button-group" data-toggle="buttons">
                                            <a class="btn small float-right" href="javascript:void(0);" onclick="deleteSavedimage(4);">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </div>
                                        <img src="' .
                IMAGE_PATH .
                "client/profile/thumbnails/" .
                $clientdata->profile_pictiure .
                '" style="width:100%"/>
                                        <input type="hidden" name="imageArrayname" value="' .
                $clientdata->profile_pictiure .
                '" class=""/>
                                    </div>
                                </div>
            ';
        }

        $profile .= '        
       <!--  <div class="mb-4">
                                        <a href="https://chat.openai.com/" target="_blank" class="fst-italic text-dark">Use
                                            ChatGPT to Create Project Details</a>
                                    </div>-->
                                    <div id="msgProfile"></div>            
                                                                
                                    <div>
                                        <button type="submit"
                                    class="btn btn-dark bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0 mt-4"
                                        id="submitClient">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                                ';

        $profile .= '  
                                <div class="col-md-3"></div>
                            </div>
        
                        </form>
                    </div>
                </section>
            </main>
        ';
    }

    if (
        !empty($_SESSION["user_type"]) &&
        ($_SESSION["user_type"] == "freelancer") && defined('PROFILE_PAGE')
    ) {
        $freelancerdata = freelancer::find_by_userid($_SESSION["user_id"]);

        $profile =
            '
              <main class="">
                <div class="bg-dark-blue">
                    <div class="container">
                        <h1 class="text-light py-5 fw-light fs-1 text-center text-md-start">
                            Update your profile
                        </h1>
                    </div>
                </div>
                 <section class="container form-container my-0 my-md-5">
            <div class="card p-2 p-md-5 bg-light border-0 rounded-0 shadow-sm">
                <h2 class="fs-5 fw-bold mb-4">Freelancer profile</h2>
                        <form class="freelancer-form" id="freelancerfrm">
                        
                            <!-- Personal Information -->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="firstName" name="firstname"
                                            placeholder="First Name" value="' .
            $freelancerdata->first_name .
            '">
                                        <label for="firstName">First Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="middleName" name="middle_name"
                                            placeholder="Middle Name" value="' .
            $freelancerdata->middle_name .
            '">
                                        <label for="middleName">Middle Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="lastName" name="last_name"
                                            placeholder="Last Name" value="' .
            $freelancerdata->last_name .
            '">
                                        <label for="lastName">Last Name <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Contact Information -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="mobileNumber" name="mobile_no"
                                            placeholder="Mobile Number" value="' .
            $freelancerdata->mobile_no .
            '">
                                        <label for="mobileNumber">Mobile Number <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="phoneNumber" name="phone_no"
                                            placeholder="Phone Number" value="' .
            $freelancerdata->phone_no .
            '">
                                        <label for="phoneNumber">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 rounded-0 fs-5" id="education" name="education_lvl" value="' .
            $freelancerdata->education_lvl .
            '" name="education_lvl">';
        $edus = array('Bachelor', 'Masters', 'PhD', 'PostDoc');
        $option = '<option value="" disabled selected>Select</option>';
        foreach ($edus as $edu) {
            $sel = (!empty($freelancerdata->education_lvl) and $edu == $freelancerdata->education_lvl) ? 'selected' : '';
            $option .= '<option value="' . $edu . '" ' . $sel . '>' . $edu . '</option>';
        }
        $profile .=
            '             ;'.$option.'
                                        </select>
                                        <label for="education">Highest Level of Education <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 rounded-0 fs-5" id="email" name="email"
                                            placeholder="Email" value="' .
            $freelancerdata->email .
            '" disabled>
                                        <label for="email">Email Address <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control border-0 rounded-0 fs-5" id="password" name="password"
                                            placeholder="Password" >
                                        <label for="password">Password </label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Engineering Information -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="licenseNumber" name="engineering_license_no"
                                            placeholder="Engineering License Number" value="' .
            $freelancerdata->engineering_license_no .
            '">
                                        <label for="licenseNumber">Engineering License Number <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="fieldOfEngineering" name="engineering_field"
                                            placeholder="Field of Engineering Studies" value="' .
            $freelancerdata->engineering_field .
            '">
                                        <label for="fieldOfEngineering">Field of Engineering Studies <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Address -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="currentAddress" name="current_address"
                                            placeholder="Current Address" value="' .
            $freelancerdata->current_address .
            '">
                                        <label for="currentAddress">Current Address <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="permanentAddress" name="permanent_address"
                                            placeholder="Permanent Address" value="' .
            $freelancerdata->permanent_address .
            '">
                                        <label for="permanentAddress">Permanent Address <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="panNumber" name="pan_no"
                                            placeholder="PAN Number" value="' .
            $freelancerdata->pan_no .
            '">
                                        <label for="panNumber">PAN Number <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- File Uploads -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <label class="form-label">Upload Nepal Engineering Certificate <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control border-0 rounded-0 fs-5" id="eng_certify" name="eng_certify" 
                                        accept=".pdf,.doc,.docx" required> 
                                    <small>(Only pdf, jpg, jpeg, png, webp, svg)</small>
                                    <div id="preview_Image2"></div>';
        if (!empty($freelancerdata->upload_certificate)) {
            $profile .=
                '
                                    <div class="" id="removeSavedimg2">
                                        <div class="infobox info-bg">
                                            <div class="button-group" data-toggle="buttons">
                                                <a class="btn small float-right" href="javascript:void(0);" onclick="deleteSavedimage(2);">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                            <span><a href="' .
                IMAGE_PATH .
                "freelancer/engineeringCertificate/" .
                $freelancerdata->upload_certificate .
                '" target="_blank">' .
                $freelancerdata->upload_certificate .
                '</a> </span>
                                            <input type="hidden" name="imageArrayname2" value="' .
                $freelancerdata->upload_certificate .
                '" class=""/>
                                        </div>
                                    </div>
            ';
        }
        $profile .= '</div>
                                 
       
                                <div class="col-md-6">
                                    <label class="form-label">Upload CV <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control border-0 rounded-0 fs-5" id="eng_cv"
                                        accept=".pdf,.doc,.docx" required>
                                    <small>(Only pdf, jpg, jpeg, png, webp, svg)</small>
                                        <div id="preview_Image3"></div>';
        if (!empty($freelancerdata->upload_cv)) {
            $profile .=
                '
                                    <div class="" id="removeSavedimg3">
                                        <div class="infobox info-bg">
                                            <div class="button-group" data-toggle="buttons">
                                                <a class="btn small float-right" href="javascript:void(0);" onclick="deleteSavedimage(3);">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                            <span><a href="' .
                IMAGE_PATH .
                "freelancer/cv/" .
                $freelancerdata->upload_cv .
                '" target="_blank">' .
                $freelancerdata->upload_cv .
                '</a> </span>
                                            <input type="hidden" name="imageArrayname3" value="' .
                $freelancerdata->upload_cv .
                '" class=""/>
                                        </div>
                                    </div>
            ';
        }
        $profile .=
            '
                                </div>
                            </div>
        
                            <!-- Social Links -->
                            <div class="row g-3 mt-3">
                                <!--<div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="otherWebsite" name="portfolio_website"
                                            placeholder="Other Website (Optional)" value="' .
            $freelancerdata->portfolio_website .
            '">
                                        <label for="otherWebsite">Portfolio Website</label>
                                    </div>
                                </div>-->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="facebook_profile" name="facebook_profile"
                                            placeholder="Facebook Link" value="' .
            $freelancerdata->facebook_profile .
            '">
                                        <label for="otherWebsite">Facebook Link</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 rounded-0 fs-5" id="linkedin" name="linkedIn_profile"
                                            placeholder="LinkedIn Link" value="' .
            $freelancerdata->linkedIn_profile .
            '">
                                        <label for="linkedin">LinkedIn Link</label>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Profile Picture -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <label class="form-label">Profile Picture <span class="text-danger">*</span> </label>
                                    <input type="file" class="form-control border-0 rounded-0 fs-5" name="img" id="img"
                                        accept="image/*" >
                                    <small>(Only jpg, jpeg, png, webp, svg)</small>';
        if (!empty($freelancerdata->profile_picture)) {
            $profile .=
                '
                                <div class="" id="removeSavedimg1">
                                    <div class="infobox info-bg">
                                        <div class="button-group" data-toggle="buttons">
                                            <a class="btn small float-right" href="javascript:void(0);" onclick="deleteSavedimage(1);">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </div>
                                        <img src="' .
                IMAGE_PATH .
                "freelancer/profile/thumbnails/" .
                $freelancerdata->profile_picture .
                '" style="width:100%"/>
                                        <input type="hidden" name="imageArrayname" value="' .
                $freelancerdata->profile_picture .
                '" class=""/>
                                    </div>
                                </div>
            ';
        }
        $profile .= '              </div>
                                <div id="preview_Image"></div>
                                ';

        $profile .= ' 
                                <div class="col-md-1"></div>
                                <div class="col-md-4 profile-picture-preview" id="profilePicturePreview">
                                    <img src="" alt="Profile Preview" id="profilePreviewImg">
                                </div>
                                <div class="col-md-3"></div>
        
                            </div>
                            <div id="msgProfile"></div>
                            <div class="mt-5">
                                <button type="submit" id="submitProfile"
                                   class="btn btn-dark bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0 mt-4">
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
    $profile = '
        <div class="error_404_page position-relative">
            <div class="background">
                <div class="ground"></div>
            </div>
            <div class="container">
                <div class="left-section">
                    <div class="inner-content">
                        <!--<h1 class="heading">404</h1>-->
                        <p class="subheading" style="text-align:left; line-height:1.5;">Please login to view this page.</p>
                    </div>
                </div>
                <div class="right-section">
                    <svg class="svgimg" xmlns="http://www.w3.org/2000/svg" viewBox="51.5 -15.288 385 505.565">
                        <g class="bench-legs">
                            <path d="M202.778,391.666h11.111v98.611h-11.111V391.666z M370.833,390.277h11.111v100h-11.111V390.277z M183.333,456.944h11.111
                  v33.333h-11.111V456.944z M393.056,456.944h11.111v33.333h-11.111V456.944z" />
                        </g>
                        <g class="top-bench">
                            <path d="M396.527,397.917c0,1.534-1.243,2.777-2.777,2.777H190.972c-1.534,0-2.778-1.243-2.778-2.777v-8.333
                  c0-1.535,1.244-2.778,2.778-2.778H393.75c1.534,0,2.777,1.243,2.777,2.778V397.917z M400.694,414.583
                  c0,1.534-1.243,2.778-2.777,2.778H188.194c-1.534,0-2.778-1.244-2.778-2.778v-8.333c0-1.534,1.244-2.777,2.778-2.777h209.723
                  c1.534,0,2.777,1.243,2.777,2.777V414.583z M403.473,431.25c0,1.534-1.244,2.777-2.778,2.777H184.028
                  c-1.534,0-2.778-1.243-2.778-2.777v-8.333c0-1.534,1.244-2.778,2.778-2.778h216.667c1.534,0,2.778,1.244,2.778,2.778V431.25z"
                            />
                        </g>
                        <g class="bottom-bench">
                            <path d="M417.361,459.027c0,0.769-1.244,1.39-2.778,1.39H170.139c-1.533,0-2.777-0.621-2.777-1.39v-4.86
                  c0-0.769,1.244-0.694,2.777-0.694h244.444c1.534,0,2.778-0.074,2.778,0.694V459.027z" />
                            <path d="M185.417,443.75H400c0,0,18.143,9.721,17.361,10.417l-250-0.696C167.303,451.65,185.417,443.75,185.417,443.75z" />
                        </g>
                        <g id="lamp">
                            <path class="lamp-details" d="M125.694,421.997c0,1.257-0.73,3.697-1.633,3.697H113.44c-0.903,0-1.633-2.44-1.633-3.697V84.917
                  c0-1.257,0.73-2.278,1.633-2.278h10.621c0.903,0,1.633,1.02,1.633,2.278V421.997z"
                            />
                            <path class="lamp-accent" d="M128.472,93.75c0,1.534-1.244,2.778-2.778,2.778h-13.889c-1.534,0-2.778-1.244-2.778-2.778V79.861
                  c0-1.534,1.244-2.778,2.778-2.778h13.889c1.534,0,2.778,1.244,2.778,2.778V93.75z" />
    
                            <circle class="lamp-light" cx="119.676" cy="44.22" r="40.51" />
                            <path class="lamp-details" d="M149.306,71.528c0,3.242-13.37,13.889-29.861,13.889S89.583,75.232,89.583,71.528c0-4.166,13.369-13.889,29.861-13.889
                  S149.306,67.362,149.306,71.528z"/>
                            <radialGradient class="light-gradient" id="SVGID_1_" cx="119.676" cy="44.22" r="65" gradientUnits="userSpaceOnUse">
                                <stop  offset="0%" style="stop-color:#FFFFFF; stop-opacity: 1"/>
                                <stop  offset="50%" style="stop-color:#EDEDED; stop-opacity: 0.5">
                                    <animate attributeName="stop-opacity" values="0.0; 0.5; 0.0" dur="5000ms" repeatCount="indefinite"></animate>
                                </stop>
                                <stop  offset="100%" style="stop-color:#EDEDED; stop-opacity: 0"/>
                            </radialGradient>
                            <circle class="lamp-light__glow" fill="url(#SVGID_1_)" cx="119.676" cy="44.22" r="65"/>
                            <path class="lamp-bottom" d="M135.417,487.781c0,1.378-1.244,2.496-2.778,2.496H106.25c-1.534,0-2.778-1.118-2.778-2.496v-74.869
                  c0-1.378,1.244-2.495,2.778-2.495h26.389c1.534,0,2.778,1.117,2.778,2.495V487.781z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    ';
}

$jVars["module:dashboard-profile"] = $profile;

//client dashboard
$clientdashboard = "";
if (!empty($_SESSION)) {
    if (!empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "client" AND defined('DASHBOARD') ) {
        $clientdata = client::find_by_userid($_SESSION["user_id"]);
        $page =
            (isset($_REQUEST["pageno"]) and !empty($_REQUEST["pageno"]))
                ? $_REQUEST["pageno"]
                : 1;
        $sql =
            "SELECT * FROM tbl_jobs WHERE status='1' AND client_id= '" .
            $clientdata->id .
            "' ORDER BY sortorder DESC";
        $limit = 8;
        $total = $db->num_rows($db->query($sql));
        $startpoint = $page * $limit - $limit;
        $sql .= " LIMIT " . $startpoint . "," . $limit;
        $query = $db->query($sql);
        $Records = jobs::find_by_sql($sql);
        $jobdetail = "";
        if (!empty($Records)) {
            // pr($Records);
            foreach ($Records as $record) {
                $biddata= bids::find_by_job_single($record->id);
                if ($record->budget_type == 1) {
                    $budget =
                        ' <h5 class="fs-6 fw-bold">' .
                        $record->currency .
                        " " .
                        $record->exact_budget .
                        "</h5>";
                } else {
                    $budget =
                        '<h5 class="fs-6 fw-bold">' .
                        $record->currency .
                        " " .
                        $record->budget_range_low .
                        " - " .
                        $record->budget_range_high .
                        "</h5>";
                }
                $jobstatus = "";
                $bidstatus='';
                $totalbids = bids::find_total_bids($record->id);
                $bidstatus = '<p class="fs-7 m-0 d-inline-block">No. of Bids: <span>' .
                    $totalbids .'</span></p>';
                switch ($record->project_status) {
                    case 1:
                        $bidstatus = '<p class="fs-7 m-0 d-inline-block">No. of Bids: <span>' .
                            $totalbids .'</span></p>';
                        $jobstatus .= '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                            <p class="text-dark-blue fs-6 fw-bold">
                                Bid On Progress
                            </p>';
                        if ($totalbids > 0) {
                            $jobstatus .= '<div class="d-inline-block bg-dark-subtle px-3 view-select">
                                <a href="'.BASE_URL.'freelancer-select/'.$record->slug.'" class="text-decoration-none text-dark">View</a>
                                <span>/</span>
                                <a href="'.BASE_URL.'freelancer-select/'.$record->slug.'" class="text-decoration-none text-dark">Select</a>
                            </div>';
                        }
                        $jobstatus .= "</div>";
                        break;
                    case 2:
                        $totalshortlisted = bids::find_total_shortlisted($record->id);
                        $bidstatus = '<p class="fs-7 m-0 d-inline-block">Shortlisted Freelancers: <span>' .
                            $totalshortlisted .'</span></p>';
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                            <p class="text-info fs-6 fw-bold">
                                Short Listed
                            </p>
                            <div class="d-inline-block bg-dark-subtle px-3 view-select">
                                <a href="'.BASE_URL.'freelancer-shortlist/'.$record->slug.'" class="text-decoration-none text-dark">View</a>
                                <span>/</span>
                                <a href="'.BASE_URL.'freelancer-shortlist/'.$record->slug.'" class="text-decoration-none text-dark">Select</a>
                            </div>
                        </div>';
                        break;

                    case 3:
                        $totalawarded = bids::find_total_awarded($record->id);
                        $bidstatus = '<p class="fs-7 m-0 d-inline-block">Awarded Freelancers: <span>' .
                            $totalawarded .'</span></p>';
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-center">
                            <a class="nav-link text-success fs-6 fw-bold dropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Awarded <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-dark-blue-emphasis fs-6" id="wop" onclick="changetowop('.$record->id.')">Work on
                                        progress</a></li>
                            </ul>
                        </div>';
                        break;
                    case 4:
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                            <p class="text-danger fs-6 fw-bold">
                                Timeout
                            </p>
                        ';
                        if ($totalbids > 0) {
                            $jobstatus .= '<div class="d-inline-block bg-dark-subtle px-3 view-select">
                                <a href="'.BASE_URL.'freelancer-select/'.$record->slug.'" class="text-decoration-none text-dark">View</a>
                                <span>/</span>
                                <a href="'.BASE_URL.'freelancer-select/'.$record->slug.'" class="text-decoration-none text-dark">Select</a>
                            </div>';
                        }
                        $jobstatus .= '
                            </div>';
                        break;
                    case 5:
                        $totalwop = bids::find_total_wop($record->id);
                        $bidstatus = '<p class="fs-6 m-0 d-inline-block">Awarded Freelancers: <span>' .
                            $totalwop .'</span></p>';
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-center">
                            <a class="nav-link text-dark-blue-emphasis fs-6 fw-bold dropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Work On Progress <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-dark fs-6" id="complete" onclick="changetoawarded('.$record->id.')">Completed</a>
                                </li>
                            </ul>
                            </div>
                        ';
                        break;
                    case 6:
                        $totalcomp = bids::find_total_comp($record->id);
                        $bidstatus = '<p class="fs-6 m-0 d-inline-block">Awarder Freelancers: <span>' .
                            $totalcomp .'</span></p>';
                        $jobstatus .= '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                            <p class="text-dark fs-6 fw-bold">
                               Completed
                            </p>';
                        if(!empty($biddata)){
                            if($biddata->reviewed_freelancer==0){
                                $jobstatus .= ' <a href="'.BASE_URL.'review/'.$record->slug.'" class="btn btn-outline-success bg-success-subtle text-success fs-7 rounded-0 px-3 py-1">
                                Review
                            </a>';
                            }
                        }
                        $jobstatus .= '  </div>';
                        break;
                    case 7:
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                                    <p class="text-secondary fs-6 fw-bold">
                                        Declined
                                    </p>
                                    </div>';
                        break;
                }
                // pr($jobstatus);

                // pr($totalbids);
                $jobdetail .=
                    ' <div class="bg-body-secondary p-3 p-md-5 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <h5 class="fs-6 fw-bold text-dark-blue">' .
                    $record->title .
                    '</h5>
                            <p class="fs-7 m-0">Bid End Date: ' .
                    date("M d, Y", strtotime($record->deadline_date)) .
                    '</p>
                        </div>
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            ' .
                    $budget .
                    '
                           ' .
                    $bidstatus .
                    '
                            
                        </div>
                        ' .
                    $jobstatus .
                    '
                    </div>
                </div>';
            }
        }
        // pr($Records);

        $clientdashboard .=
            '
            
             <div class="divMessageBox" style="display:none;"></div>      
        <div class="MessageBoxContainer" style="display:none;">
            <div class="MessageBoxMiddle">
            <span class="MsgTitle"></span>
            <p class="pText"></p>
                <div class="MessageBoxButtonSection">
                <button id="no" class="botTempo"> No</button>
                <button id="yes" class="botTempo"> Yes</button>
                </div>
            </div>
        </div>
        <div class="bg-dark-blue">
            <div class="container py-5 d-flex align-items-center justify-content-between">
                <h1 class="text-light fw-light fs-1">
                    Dashboard
                </h1>
                <a href="' .
            BASE_URL .
            'create-job" class="btn btn-dark bg-light text-dark px-4 py-2 fs-6 rounded-0">
                Create Job
                        </a>
            </div>
        </div>
        <section>
            <div class="container">
             
                <div class="input-group input-group-md bg-body-secondary p-2 mb-4 justify-content-between flex-wrap">
                <!--   <div class="dropdown col-12 col-md-3 d-flex align-items-center mb-2 mb-md-0">
                        <a class="bg-dark-subtle text-decoration-none text-dark py-2 px-4 d-inline-block w-100 fw-bold"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="w-100 me-4">Filter by Status</span> &nbsp; <i class="fas fa-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>-->
                    <nav aria-label="Page navigation" class="col-12 col-md-auto">
                       ' .
            get_front_pagination_new(
                $total,
                $limit,
                $page,
                BASE_URL . "dashboard"
            ) .
            '
                    </nav>
                </div>
                ' .
            $jobdetail .
            '
                <!-- Repeat the same structure for other job cards -->
              
                <div class="bg-body-secondary p-3 p-md-5 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-dark-blue fs-6 fw-bold">
                                Bid On Progress
                            </h5>
                            <p class="fs-7">
                                Freelancers can apply for created jobs.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-info fs-6 fw-bold">
                                Short Listed
                            </h5>
                            <p class="fs-7">
                                Eligible freelancers are chosen. Max 5 freelancers.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-success fs-6 fw-bold">
                                Awarded
                            </h5>
                            <p class="fs-7">
                                Sortlisted Freelancers are selected for the job.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-danger fs-6 fw-bold">
                                Timeout
                            </h5>
                            <p class="fs-7">
                                The bid deadline is crossed.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-info-emphasis fs-6 fw-bold">
                                Work On Progress
                            </h5>
                            <p class="fs-7">
                                Freelancers are working on the job.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2">
                            <h5 class="text-success-emphasis fs-6 fw-bold">
                                Completed
                            </h5>
                            <p class="fs-7">
                                The client is happy with the freelancer\'s work.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mt-3">
                            <h5 class="text-secondary fs-6 fw-bold">
                                Declined
                            </h5>
                            <p class="fs-7">
                                The freelancer is not selected.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="input-group input-group-md bg-body-secondary p-2 mb-4 justify-content-end">
                    <nav aria-label="Page navigation">
                       ' .
            get_front_pagination_new(
                $total,
                $limit,
                $page,
                BASE_URL . "dashboard"
            ) .
            '
                    </nav>
                </div>
            </div>
        </section>';
    }
    elseif(!empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "freelancer" && defined('DASHBOARD')){
        $freelancerdata = freelancer::find_by_userid($_SESSION["user_id"]);
        // $biddata= bids::find_by_freelancerid($freelancerdata->id);

        // pr($clientdata);
        $page =
            (isset($_REQUEST["pageno"]) and !empty($_REQUEST["pageno"]))
                ? $_REQUEST["pageno"]
                : 1;
        $sql =
            "SELECT b.* FROM tbl_bids as b INNER JOIN tbl_jobs as j ON b.job_id = j.id
                WHERE j.status='1' AND b.freelancer_id= '" .
            $freelancerdata->id.
            "' ORDER BY b.sortorder DESC";
        $limit = 8;
        $total = $db->num_rows($db->query($sql));
        $startpoint = $page * $limit - $limit;
        $sql .= " LIMIT " . $startpoint . "," . $limit;
        $query = $db->query($sql);
        $Records = bids::find_by_sql($sql);
        $jobdetail = "";

        if (!empty($Records)) {
            // pr($Records);
            foreach ($Records as $record) {
                $jobdatas = jobs::find_by_id($record->job_id);

                $totalbids = bids::find_total_bids($record->job_id);
                $jobstatus = "";
                switch ($record->project_status) {
                    case 1:
                        $edit_bid_txt = '';
                        $encode_id = base64_encode($record->id);
                        // do not show bid edit button if job is timeout
                        if($jobdatas->project_status != 4) {
                            $edit_bid_txt .= '
                                <a href="' . BASE_URL . 'edit-bid/' . $encode_id . '" class="btn btn-outline-success bg-success-subtle text-success fs-7 rounded-0 px-3 py-1">
                                    Edit Bid
                                </a>
                            ';
                        }
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                            <p class="text-dark-blue fs-6 fw-bold">
                                Bid On Progress
                            </p>
                            ' . $edit_bid_txt . '
                            </div>';
                        // if ($totalbids > 0) {
                        //     $jobstatus .= '<div class="d-inline-block bg-dark-subtle px-3 view-select">
                        //         <a href="" class="text-decoration-none text-dark">View</a>
                        //         <span>/</span>
                        //         <a href="'.BASE_URL.'freelancer-select/'.$record->slug.'" class="text-decoration-none text-dark">Select</a>
                        //     </div>';
                        // }
                        break;
                    case 2:
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                            <p class="text-info fs-6 fw-bold">
                                Short Listed
                            </p>
                            <!--<div class="d-inline-block bg-dark-subtle px-3 view-select">
                                <a href="" class="text-decoration-none text-dark">View</a>
                                <span>/</span>
                                <a href="'.BASE_URL.'freelancer-shortlist/'.$jobdatas->slug.'" class="text-decoration-none text-dark">Select</a>
                            </div>-->
                        </div>';
                        break;

                    case 3:
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                            <p class="text-success fs-6 fw-bold">
                                 Awarded
                            </p>
                            <!--<div class="d-inline-block bg-dark-subtle px-3 view-select">
                                <a href="" class="text-decoration-none text-dark">View</a>
                                <span>/</span>
                                <a href="'.BASE_URL.'awarded/'.$jobdatas->slug.'" class="text-decoration-none text-dark">Select</a>
                            </div>-->
                        </div>';
                        break;
                    case 4:
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                                    <p class="text-secondary fs-6 fw-bold">
                                        Declined
                                    </p>
                                    </div>';
                        break;
                    case 5:
                        $jobstatus .= '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                                <p class="text-dark fs-6 fw-bold">
                                   Completed
                                </p>';

                        if($record->reviewed_client==0){
                            $jobstatus .= '  <a href="'.BASE_URL.'review/'.$jobdatas->slug.'" class="btn btn-outline-success bg-success-subtle text-success fs-7 rounded-0 px-3 py-1">
                                    Review
                                </a>';
                        }
                        $jobstatus .= '  </div>';
                        break;
                    case 6:
                        $jobstatus = '<div class="col-12 col-md-2 d-flex align-items-start flex-column">
                                    <p class="text-info-emphasis fs-6 fw-bold">
                                       Work On Progress
                                    </p>';

                        $jobstatus .= '  </div>';
                        break;

                }
                // pr($jobstatus);

                // pr($totalbids);

                // pr($jobdatas);
                //  if ($jobdatas->budget_type == 1) {
                $budget =
                    ' <h5 class="fs-6 fw-bold">' .
                    $jobdatas->currency .
                    " " .
                    $record->bid_amount .
                    "</h5>";
                // }
                // else {
                //     $budget =
                //         '<h5 class="fs-6 fw-bold">' .
                //         $jobdatas->currency .
                //         " " .
                //         $jobdatas->budget_range_low .
                //         " - " .
                //         $jobdatas->budget_range_high .
                //         "</h5>";
                // }
                $jobdetail .=
                    ' <div class="bg-body-secondary p-3 p-md-5 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <h5 class="fs-6 fw-bold text-dark-blue">' .
                    $jobdatas->title .
                    '</h5>
                            <p class="fs-7 m-0">Bid End Date: ' .
                    date("M d, Y", strtotime($jobdatas->deadline_date)) .
                    '</p>
                        </div>
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            ' .
                    $budget .
                    '
                            <!--<p class="fs-7 m-0 d-inline-block">No. of Bids: <span>' .
                    $totalbids .
                    '</span></p>-->
                            
                        </div>
                        ' .
                    $jobstatus .
                    '
                    </div>
                </div>';
            }
        }
        // pr($jobdatass);

        $clientdashboard .=
            '<div class="bg-dark-blue">
            <div class="container">
                <h1 class="text-light py-5 fw-light fs-1">
                    Dashboard
                </h1>
            </div>
        </div>
        <section class="dashboard-container">
            <div class="container">
             
                <div class="input-group input-group-md bg-body-secondary p-2 mb-4 justify-content-between flex-wrap">
                <!--   <div class="dropdown col-12 col-md-3 d-flex align-items-center mb-2 mb-md-0">
                        <a class="bg-dark-subtle text-decoration-none text-dark py-2 px-4 d-inline-block w-100 fw-bold"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="w-100 me-4">Filter by Status</span> &nbsp; <i class="fas fa-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>-->
                    <nav aria-label="Page navigation" class="col-12 col-md-auto">
                       ' .
            get_front_pagination_new(
                $total,
                $limit,
                $page,
                BASE_URL . "dashboard"
            ) .
            '
                    </nav>
                </div>
                ' .
            $jobdetail .
            '
                <!-- Repeat the same structure for other job cards -->
              
                <div class="bg-body-secondary p-3 p-md-5 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-dark-blue fs-6 fw-bold">
                                Bid On Progress
                            </h5>
                            <p class="fs-7">
                                Freelancers can apply for created jobs.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-info fs-6 fw-bold">
                                Short Listed
                            </h5>
                            <p class="fs-7">
                                Eligible freelancers are chosen. Max 5 freelancer.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-success fs-6 fw-bold">
                                Awarded
                            </h5>
                            <p class="fs-7">
                                Sortlisted Freelancers are selected for the job.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-danger fs-6 fw-bold">
                                Timeout
                            </h5>
                            <p class="fs-7">
                                The bid deadline is crossed.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3 mb-md-0">
                            <h5 class="text-info-emphasis fs-6 fw-bold">
                                Work On Progress
                            </h5>
                            <p class="fs-7">
                                Freelancers are working on the job.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2">
                            <h5 class="text-success-emphasis fs-6 fw-bold">
                                Completed
                            </h5>
                            <p class="fs-7">
                                The client is happy with the freelancer\'s work.
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mt-3">
                            <h5 class="text-secondary fs-6 fw-bold">
                                Declined
                            </h5>
                            <p class="fs-7">
                                The freelancer is not selected.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="input-group input-group-md bg-body-secondary p-2 mb-4 justify-content-end">
                    <nav aria-label="Page navigation">
                       ' .
            get_front_pagination_new(
                $total,
                $limit,
                $page,
                BASE_URL . "dashboard"
            ) .
            '
                    </nav>
                </div>
            </div>
        </section>';
    }
} else {
    $clientdashboard = '
        <div class="error_404_page position-relative">
            <div class="background">
                <div class="ground"></div>
            </div>
            <div class="container">
                <div class="left-section">
                    <div class="inner-content">
                        <!--<h1 class="heading">404</h1>-->
                        <p class="subheading" style="text-align:left; line-height:1.5;">Please login to view this page.</p>
                    </div>
                </div>
                <div class="right-section">
                    <svg class="svgimg" xmlns="http://www.w3.org/2000/svg" viewBox="51.5 -15.288 385 505.565">
                        <g class="bench-legs">
                            <path d="M202.778,391.666h11.111v98.611h-11.111V391.666z M370.833,390.277h11.111v100h-11.111V390.277z M183.333,456.944h11.111
                  v33.333h-11.111V456.944z M393.056,456.944h11.111v33.333h-11.111V456.944z" />
                        </g>
                        <g class="top-bench">
                            <path d="M396.527,397.917c0,1.534-1.243,2.777-2.777,2.777H190.972c-1.534,0-2.778-1.243-2.778-2.777v-8.333
                  c0-1.535,1.244-2.778,2.778-2.778H393.75c1.534,0,2.777,1.243,2.777,2.778V397.917z M400.694,414.583
                  c0,1.534-1.243,2.778-2.777,2.778H188.194c-1.534,0-2.778-1.244-2.778-2.778v-8.333c0-1.534,1.244-2.777,2.778-2.777h209.723
                  c1.534,0,2.777,1.243,2.777,2.777V414.583z M403.473,431.25c0,1.534-1.244,2.777-2.778,2.777H184.028
                  c-1.534,0-2.778-1.243-2.778-2.777v-8.333c0-1.534,1.244-2.778,2.778-2.778h216.667c1.534,0,2.778,1.244,2.778,2.778V431.25z"
                            />
                        </g>
                        <g class="bottom-bench">
                            <path d="M417.361,459.027c0,0.769-1.244,1.39-2.778,1.39H170.139c-1.533,0-2.777-0.621-2.777-1.39v-4.86
                  c0-0.769,1.244-0.694,2.777-0.694h244.444c1.534,0,2.778-0.074,2.778,0.694V459.027z" />
                            <path d="M185.417,443.75H400c0,0,18.143,9.721,17.361,10.417l-250-0.696C167.303,451.65,185.417,443.75,185.417,443.75z" />
                        </g>
                        <g id="lamp">
                            <path class="lamp-details" d="M125.694,421.997c0,1.257-0.73,3.697-1.633,3.697H113.44c-0.903,0-1.633-2.44-1.633-3.697V84.917
                  c0-1.257,0.73-2.278,1.633-2.278h10.621c0.903,0,1.633,1.02,1.633,2.278V421.997z"
                            />
                            <path class="lamp-accent" d="M128.472,93.75c0,1.534-1.244,2.778-2.778,2.778h-13.889c-1.534,0-2.778-1.244-2.778-2.778V79.861
                  c0-1.534,1.244-2.778,2.778-2.778h13.889c1.534,0,2.778,1.244,2.778,2.778V93.75z" />
    
                            <circle class="lamp-light" cx="119.676" cy="44.22" r="40.51" />
                            <path class="lamp-details" d="M149.306,71.528c0,3.242-13.37,13.889-29.861,13.889S89.583,75.232,89.583,71.528c0-4.166,13.369-13.889,29.861-13.889
                  S149.306,67.362,149.306,71.528z"/>
                            <radialGradient class="light-gradient" id="SVGID_1_" cx="119.676" cy="44.22" r="65" gradientUnits="userSpaceOnUse">
                                <stop  offset="0%" style="stop-color:#FFFFFF; stop-opacity: 1"/>
                                <stop  offset="50%" style="stop-color:#EDEDED; stop-opacity: 0.5">
                                    <animate attributeName="stop-opacity" values="0.0; 0.5; 0.0" dur="5000ms" repeatCount="indefinite"></animate>
                                </stop>
                                <stop  offset="100%" style="stop-color:#EDEDED; stop-opacity: 0"/>
                            </radialGradient>
                            <circle class="lamp-light__glow" fill="url(#SVGID_1_)" cx="119.676" cy="44.22" r="65"/>
                            <path class="lamp-bottom" d="M135.417,487.781c0,1.378-1.244,2.496-2.778,2.496H106.25c-1.534,0-2.778-1.118-2.778-2.496v-74.869
                  c0-1.378,1.244-2.495,2.778-2.495h26.389c1.534,0,2.778,1.117,2.778,2.495V487.781z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    ';
}

$jVars["module:dashboard-job-status"] = $clientdashboard;



//select freelancer dashboard
$selectbider = "";
if (!empty($_SESSION)) {
    if (!empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "client" && isset($_REQUEST['slug']) AND defined('FREELANCER_SELECT')) {

        $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
        $jobdatas= jobs::find_by_slug($slug);
        $totalbids = bids::find_total_bids($jobdatas->id);
        if ($jobdatas->budget_type == 1) {
            $budget = ' <h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->exact_budget . '</h4>';
        } else {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->budget_range_low . ' - ' . $jobdatas->budget_range_high . '</h4>';
        }
        $selectbider .= '<div class="bg-dark-blue">
        <div class="container py-5 d-flex align-items-center justify-content-between">
            <h1 class="text-light fw-light fs-1">
                Jobs
            </h1>
            <!--<button class="btn btn-primary bg-light text-dark px-4 py-2 fs-6 rounded-0 border-0">
                Create Job
            </button>-->
        </div>
    </div>
    <section class="container">
     <a href="'.BASE_URL.'dashboard" class="text-dark fs-7 d-block mb-3 mb-lg-5">
                <i class="fa-solid fa-arrow-left"></i>
                Back to list page
            </a>
        <div class="row job-title-content gx-0">
            <div class="col-12 col-md-6 bg-light p-3 p-md-5 sticky-lg-top"
                style="top: 5rem; max-height: max-content; z-index: 10;">
                <div>
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="fs-5 fw-bold">'.$jobdatas->title.'</h3>
                            <span class="fs-7">End Date: ' . date("M d Y", strtotime($jobdatas->deadline_date)) . '</span>
                        </div>
                        <div>
                           '.$budget.'
                            <span class="fs-7">'.$totalbids.' bids</span>
                        </div>
                    </div>

                    <div class="card-body mt-4 mt-md-5">
                       '.$jobdatas->content.'
                    </div>
                </div>
            </div>';

        $bidderdetail='';
        $biddermodal='';
        $biddatas= bids::find_by_jobid_bop($jobdatas->id);
        // pr($biddata);
        if(!empty($biddatas)){
            $bidderdetail = '';
            foreach($biddatas as $biddata){

                //freelancer data through
                $freelandata= freelancer::find_by_id($biddata->freelancer_id);
                // pr($freelandata);

                // $profilepic = 'https://static-00.iconduck.com/assets.00/user-icon-1024x1024-unb6q333.png';
                $profilepic = BASE_URL . 'template/web/assets/images/user-icon.png';
                if (!empty($freelandata->profile_picture)) {
                    $file_path = SITE_ROOT . 'images/freelancer/profile/' . $freelandata->profile_picture;
                    if (file_exists($file_path)) {
                        $profilepic = IMAGE_PATH . 'freelancer/profile/' . $freelandata->profile_picture;
                    }
                }

                $roundRating = round($freelandata->rating,0);
                $noRating = 5 - $roundRating;

                $bidderdetail .='<div class="row bg-light p-3 mt-2 gx-0">
                    <div class="col-2 col-md-2 p-0">
                        <img src="'.$profilepic.'"
                            alt="User" class="user-icon w-100 bg-dark-subtle p-3">
                    </div>
                    <div class="col-10 col-md-6 px-3">
                        <h5 class="fs-6 fw-bold">'.$freelandata->username.'</h5>
                        <p class="fs-7 line-clamp-2 mb-0">
                        '.strip_tags($biddata->message).'
                        </p>
                        <a href="#" class="fs-7" data-bs-toggle="modal"
                                    data-bs-target="#modal-'.$biddata->id.'">more</a>
                    </div>
                    <div class="col-6 col-md-3 mt-3 mt-md-0">
                        <h5 class="fs-7"><strong>'.$biddata->currency.' '.$biddata->bid_amount.'</strong> in '.$biddata->delivery.' days</h5>
                        <span class="fs-5 text-warning"> ' . str_repeat('★', $roundRating) . str_repeat('☆', $noRating) . '
                        </span>
                    </div>
                    <div class="col-2 col-md-1 d-flex align-items-center mt-3 mt-md-0 bidderHere">
                        <input type="checkbox" name="bidder[]" value="'.$biddata->freelancer_id.'"
                            class="form-check-input bg-dark-subtle rounded-0 text-dark w-75 py-3 border-dark" />
                    </div>
                </div>';
                $biddermodal .=' 
                <div class="modal fade" id="modal-'.$biddata->id.'" tabindex="-1" aria-labelledby="freelancerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="freelancerModalLabel">Freelancer Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!--<div class="col-4">
                            <img src="'.$profilepic.'"
                                alt="User" class="img-fluid">
                        </div>
                        <div class="col-8" style="place-content: center;">
                            <h5 class="fs-6 fw-bold">@'.$freelandata->username.'</h5>
                            <p class="fs-7 p-0 m-0">'.$biddata->currency.' '.$biddata->bid_amount.' in '.$biddata->delivery.' days</p>
                            <span class="fs-4 text-warning">  ' . str_repeat('★', $biddata->freelancer_rating) . ' ' . str_repeat('☆', (5 - $biddata->freelancer_rating)) . '
                            </span>
                        </div>-->
                        <p class="mt-3">'.strip_tags($biddata->message).'</p>
                    </div>
                </div>
            </div>
        </div>
    </div>';

            }
        }
        $selectbider .= '
            <div class="col-12 col-md-6 bg-white ps-0 ps-md-5">
            
            <form id="selectfreelancer">
            <input type="hidden" name="jobid" value="'.$jobdatas->id.'">
                '.$bidderdetail.'
                <div id="result_msg"></div>
                <button id="submit" class="mt-3 btn btn-primary bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0">
                    Shortlist Freelancer
                </button>


                
            </form>
            </div>
        </div>
    </section>
    '.$biddermodal.'';
    }

} else {
    $selectbider = '
        <div class="error_404_page position-relative">
            <div class="background">
                <div class="ground"></div>
            </div>
            <div class="container">
                <div class="left-section">
                    <div class="inner-content">
                        <!--<h1 class="heading">404</h1>-->
                        <p class="subheading" style="text-align:left; line-height:1.5;">Please login to view this page.</p>
                    </div>
                </div>
                <div class="right-section">
                    <svg class="svgimg" xmlns="http://www.w3.org/2000/svg" viewBox="51.5 -15.288 385 505.565">
                        <g class="bench-legs">
                            <path d="M202.778,391.666h11.111v98.611h-11.111V391.666z M370.833,390.277h11.111v100h-11.111V390.277z M183.333,456.944h11.111
                  v33.333h-11.111V456.944z M393.056,456.944h11.111v33.333h-11.111V456.944z" />
                        </g>
                        <g class="top-bench">
                            <path d="M396.527,397.917c0,1.534-1.243,2.777-2.777,2.777H190.972c-1.534,0-2.778-1.243-2.778-2.777v-8.333
                  c0-1.535,1.244-2.778,2.778-2.778H393.75c1.534,0,2.777,1.243,2.777,2.778V397.917z M400.694,414.583
                  c0,1.534-1.243,2.778-2.777,2.778H188.194c-1.534,0-2.778-1.244-2.778-2.778v-8.333c0-1.534,1.244-2.777,2.778-2.777h209.723
                  c1.534,0,2.777,1.243,2.777,2.777V414.583z M403.473,431.25c0,1.534-1.244,2.777-2.778,2.777H184.028
                  c-1.534,0-2.778-1.243-2.778-2.777v-8.333c0-1.534,1.244-2.778,2.778-2.778h216.667c1.534,0,2.778,1.244,2.778,2.778V431.25z"
                            />
                        </g>
                        <g class="bottom-bench">
                            <path d="M417.361,459.027c0,0.769-1.244,1.39-2.778,1.39H170.139c-1.533,0-2.777-0.621-2.777-1.39v-4.86
                  c0-0.769,1.244-0.694,2.777-0.694h244.444c1.534,0,2.778-0.074,2.778,0.694V459.027z" />
                            <path d="M185.417,443.75H400c0,0,18.143,9.721,17.361,10.417l-250-0.696C167.303,451.65,185.417,443.75,185.417,443.75z" />
                        </g>
                        <g id="lamp">
                            <path class="lamp-details" d="M125.694,421.997c0,1.257-0.73,3.697-1.633,3.697H113.44c-0.903,0-1.633-2.44-1.633-3.697V84.917
                  c0-1.257,0.73-2.278,1.633-2.278h10.621c0.903,0,1.633,1.02,1.633,2.278V421.997z"
                            />
                            <path class="lamp-accent" d="M128.472,93.75c0,1.534-1.244,2.778-2.778,2.778h-13.889c-1.534,0-2.778-1.244-2.778-2.778V79.861
                  c0-1.534,1.244-2.778,2.778-2.778h13.889c1.534,0,2.778,1.244,2.778,2.778V93.75z" />
    
                            <circle class="lamp-light" cx="119.676" cy="44.22" r="40.51" />
                            <path class="lamp-details" d="M149.306,71.528c0,3.242-13.37,13.889-29.861,13.889S89.583,75.232,89.583,71.528c0-4.166,13.369-13.889,29.861-13.889
                  S149.306,67.362,149.306,71.528z"/>
                            <radialGradient class="light-gradient" id="SVGID_1_" cx="119.676" cy="44.22" r="65" gradientUnits="userSpaceOnUse">
                                <stop  offset="0%" style="stop-color:#FFFFFF; stop-opacity: 1"/>
                                <stop  offset="50%" style="stop-color:#EDEDED; stop-opacity: 0.5">
                                    <animate attributeName="stop-opacity" values="0.0; 0.5; 0.0" dur="5000ms" repeatCount="indefinite"></animate>
                                </stop>
                                <stop  offset="100%" style="stop-color:#EDEDED; stop-opacity: 0"/>
                            </radialGradient>
                            <circle class="lamp-light__glow" fill="url(#SVGID_1_)" cx="119.676" cy="44.22" r="65"/>
                            <path class="lamp-bottom" d="M135.417,487.781c0,1.378-1.244,2.496-2.778,2.496H106.25c-1.534,0-2.778-1.118-2.778-2.496v-74.869
                  c0-1.378,1.244-2.495,2.778-2.495h26.389c1.534,0,2.778,1.117,2.778,2.495V487.781z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    ';
}

$jVars["module:dashboard-selectfreelancer"] = $selectbider;


//select Shortlisted dashboard
$selectshortlisted = "";
if (!empty($_SESSION)) {
    if (!empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "client" && isset($_REQUEST['slug']) AND defined('FREELANCER_SHORTLIST')) {

        $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
        $jobdatas= jobs::find_by_slug($slug);
        $totalbids = bids::find_total_bids($jobdatas->id);
        if ($jobdatas->budget_type == 1) {
            $budget = ' <h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->exact_budget . '</h4>';
        } else {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->budget_range_low . ' - ' . $jobdatas->budget_range_high . '</h4>';
        }
        $selectshortlisted .= '
        <div class="bg-dark-blue">
        <div class="container py-5 d-flex align-items-center justify-content-between">
            <h1 class="text-light fw-light fs-3 fs-md-1">
                Shortlisted Freelancer
            </h1>
           <!-- <button class="btn btn-dark bg-light text-dark px-4 py-2 fs-6 rounded-0">
                Create Job
            </button>-->
        </div>
    </div>
    <section class="container">
     <a href="'.BASE_URL.'dashboard" class="text-dark fs-7 d-block mb-3 mb-lg-5">
                <i class="fa-solid fa-arrow-left"></i>
                Back to list page
            </a>
        <div class="row job-title-content gx-0">
            <div class="col-12 col-md-6 bg-light p-3 p-md-5 sticky-lg-top"
                style="top: 5rem; max-height: max-content; z-index: 10;">
                <div>
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="fs-5 fw-bold">'.$jobdatas->title.'</h3>
                            <span class="fs-7">End Date: ' . date("M d Y", strtotime($jobdatas->deadline_date)) . '</span>
                        </div>
                        <div>
                           '.$budget.'
                            <span class="fs-7">'.$totalbids.' bids</span>
                        </div>
                    </div>

                    <div class="card-body mt-4 mt-md-5">
                       '.$jobdatas->content.'
                    </div>
                </div>
            </div>';

        $bidderdetail='';
        $biddermodal='';
        $biddatas= bids::find_by_jobid_short($jobdatas->id);
        // pr($biddata);
        $profilepic='';
        if(!empty($biddatas)){
            foreach($biddatas as $biddata){

                //freelancer data through
                $freelandata= freelancer::find_by_id($biddata->freelancer_id);

                // $profilepic = 'https://static-00.iconduck.com/assets.00/user-icon-1024x1024-unb6q333.png';
                $profilepic = BASE_URL . 'template/web/assets/images/user-icon.png';
                if (!empty($freelandata->profile_picture)) {
                    $file_path = SITE_ROOT . 'images/freelancer/profile/' . $freelandata->profile_picture;
                    if (file_exists($file_path)) {
                        $profilepic = IMAGE_PATH . 'freelancer/profile/' . $freelandata->profile_picture;
                    }
                }

                $roundRating = round($freelandata->rating,0);
                $noRating = 5 - $roundRating;
                $bidderdetail .='<div class="row bg-light p-3 mt-2 gx-0">
            <div class="col-2 col-md-2 p-0">
            <img src="'.$profilepic.'"
                            alt="User" class="user-icon w-100 bg-dark-subtle p-3">
                    </div>
                    <div class="col-10 col-md-6 px-3">
                        <h5 class="fs-6 fw-bold">'.$freelandata->username.'</h5>
                        <p class="fs-7 line-clamp-2 mb-0">
                        '.strip_tags($biddata->message).'
                        </p>
                        <a href="#" class="fs-7" data-bs-toggle="modal"
                                    data-bs-target="#modal-'.$biddata->id.'">more</a>
                    </div>
                    <div class="col-6 col-md-3 mt-3 mt-md-0">
                        <h5 class="fs-7"><strong>'.$biddata->currency.' '.$biddata->bid_amount.'</strong> in '.$biddata->delivery.' days</h5>
                        <span class="fs-5 text-warning"> ' . str_repeat('★', $roundRating) . str_repeat('☆', $noRating) . '
                        </span>
                    </div>
                    <div class="col-2 col-md-1 d-flex align-items-center mt-3 mt-md-0 bidderHere">
                        <input type="checkbox" name="bidder[]" value="'.$biddata->freelancer_id.'"
                            class="form-check-input bg-dark-subtle rounded-0 text-dark w-75 py-3 border-dark" />
                    </div>
                </div>';
                $biddermodal .=' 
                <div class="modal fade" id="modal-'.$biddata->id.'" tabindex="-1" aria-labelledby="freelancerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="freelancerModalLabel">Freelancer Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!--<div class="col-4">
                            <img src="'.$profilepic.'"
                                alt="User" class="img-fluid">
                        </div>
                        <div class="col-8" style="place-content: center;">
                            <h5 class="fs-6 fw-bold">@'.$freelandata->username.'</h5>
                            <p class="fs-7 p-0 m-0">'.$biddata->currency.' '.$biddata->bid_amount.' in '.$biddata->delivery.' days</p>
                            <span class="fs-4 text-warning">  ' . str_repeat('★', $biddata->freelancer_rating) . ' ' . str_repeat('☆', (5 - $biddata->freelancer_rating)) . '
                            </span>
                        </div>-->
                        <p class="mt-3">'.strip_tags($biddata->message).'</p>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }
        }
        $selectshortlisted .= '
            <div class="col-12 col-md-6 bg-white ps-0 ps-md-5">
            <h5 class="fs-5 fw-bold mb-3">Shortlisted Freelancer</h5>
            <form id="selectfreelancer">
            <input type="hidden" name="jobid" value="'.$jobdatas->id.'">
                '.$bidderdetail.'
                <div id="result_msg"></div>
                <button id="submit" class="mt-3 btn btn-primary bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0">
                    Award Freelancer
                </button>


                
            </form>
            </div>
        </div>
    </section>
    '.$biddermodal.'';
    }
} else {
    $selectshortlisted = '
        <div class="error_404_page position-relative">
            <div class="background">
                <div class="ground"></div>
            </div>
            <div class="container">
                <div class="left-section">
                    <div class="inner-content">
                        <!--<h1 class="heading">404</h1>-->
                        <p class="subheading" style="text-align:left; line-height:1.5;">Please login to view this page.</p>
                    </div>
                </div>
                <div class="right-section">
                    <svg class="svgimg" xmlns="http://www.w3.org/2000/svg" viewBox="51.5 -15.288 385 505.565">
                        <g class="bench-legs">
                            <path d="M202.778,391.666h11.111v98.611h-11.111V391.666z M370.833,390.277h11.111v100h-11.111V390.277z M183.333,456.944h11.111
                  v33.333h-11.111V456.944z M393.056,456.944h11.111v33.333h-11.111V456.944z" />
                        </g>
                        <g class="top-bench">
                            <path d="M396.527,397.917c0,1.534-1.243,2.777-2.777,2.777H190.972c-1.534,0-2.778-1.243-2.778-2.777v-8.333
                  c0-1.535,1.244-2.778,2.778-2.778H393.75c1.534,0,2.777,1.243,2.777,2.778V397.917z M400.694,414.583
                  c0,1.534-1.243,2.778-2.777,2.778H188.194c-1.534,0-2.778-1.244-2.778-2.778v-8.333c0-1.534,1.244-2.777,2.778-2.777h209.723
                  c1.534,0,2.777,1.243,2.777,2.777V414.583z M403.473,431.25c0,1.534-1.244,2.777-2.778,2.777H184.028
                  c-1.534,0-2.778-1.243-2.778-2.777v-8.333c0-1.534,1.244-2.778,2.778-2.778h216.667c1.534,0,2.778,1.244,2.778,2.778V431.25z"
                            />
                        </g>
                        <g class="bottom-bench">
                            <path d="M417.361,459.027c0,0.769-1.244,1.39-2.778,1.39H170.139c-1.533,0-2.777-0.621-2.777-1.39v-4.86
                  c0-0.769,1.244-0.694,2.777-0.694h244.444c1.534,0,2.778-0.074,2.778,0.694V459.027z" />
                            <path d="M185.417,443.75H400c0,0,18.143,9.721,17.361,10.417l-250-0.696C167.303,451.65,185.417,443.75,185.417,443.75z" />
                        </g>
                        <g id="lamp">
                            <path class="lamp-details" d="M125.694,421.997c0,1.257-0.73,3.697-1.633,3.697H113.44c-0.903,0-1.633-2.44-1.633-3.697V84.917
                  c0-1.257,0.73-2.278,1.633-2.278h10.621c0.903,0,1.633,1.02,1.633,2.278V421.997z"
                            />
                            <path class="lamp-accent" d="M128.472,93.75c0,1.534-1.244,2.778-2.778,2.778h-13.889c-1.534,0-2.778-1.244-2.778-2.778V79.861
                  c0-1.534,1.244-2.778,2.778-2.778h13.889c1.534,0,2.778,1.244,2.778,2.778V93.75z" />
    
                            <circle class="lamp-light" cx="119.676" cy="44.22" r="40.51" />
                            <path class="lamp-details" d="M149.306,71.528c0,3.242-13.37,13.889-29.861,13.889S89.583,75.232,89.583,71.528c0-4.166,13.369-13.889,29.861-13.889
                  S149.306,67.362,149.306,71.528z"/>
                            <radialGradient class="light-gradient" id="SVGID_1_" cx="119.676" cy="44.22" r="65" gradientUnits="userSpaceOnUse">
                                <stop  offset="0%" style="stop-color:#FFFFFF; stop-opacity: 1"/>
                                <stop  offset="50%" style="stop-color:#EDEDED; stop-opacity: 0.5">
                                    <animate attributeName="stop-opacity" values="0.0; 0.5; 0.0" dur="5000ms" repeatCount="indefinite"></animate>
                                </stop>
                                <stop  offset="100%" style="stop-color:#EDEDED; stop-opacity: 0"/>
                            </radialGradient>
                            <circle class="lamp-light__glow" fill="url(#SVGID_1_)" cx="119.676" cy="44.22" r="65"/>
                            <path class="lamp-bottom" d="M135.417,487.781c0,1.378-1.244,2.496-2.778,2.496H106.25c-1.534,0-2.778-1.118-2.778-2.496v-74.869
                  c0-1.378,1.244-2.495,2.778-2.495h26.389c1.534,0,2.778,1.117,2.778,2.495V487.781z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    ';
}

$jVars["module:dashboard-selectshortlist"] = $selectshortlisted;




//freelancer view awarded job details dashboard
$awarddetail = "";
if (!empty($_SESSION)) {
    if (!empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "freelancer" && isset($_REQUEST['slug']) && defined('REVIEWWWWW')) {

        $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
        $jobdatas= jobs::find_by_slug($slug);
        // $totalbids = bids::find_total_bids($jobdatas->id);   
        if ($jobdatas->budget_type == 1) {
            $budget = ' <h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->exact_budget . '</h4>';
        } else {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->budget_range_low . ' - ' . $jobdatas->budget_range_high . '</h4>';
        }
        $awarddetail .= '<div class="bg-dark-blue">
        <div class="container py-5 d-flex align-items-center justify-content-between">
            <h1 class="text-light fw-light fs-1">
                Jobs
            </h1>
            <button class="btn btn-primary bg-light text-dark px-4 py-2 fs-6 rounded-0 border-0">
                Create Job
            </button>
        </div>
    </div>
    <section class="container">
    <a href="'.BASE_URL.'dashboard" class="text-dark fs-7 d-block mb-3 mb-lg-5">
                <i class="fa-solid fa-arrow-left"></i>
                Back to list page
            </a>
        <div class="row job-title-content gx-0">
            <div class="col-12 col-md-6 bg-light p-3 p-md-5 sticky-lg-top"
                style="top: 5rem; max-height: max-content; z-index: 10;">
                <div>
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="fs-5 fw-bold">'.$jobdatas->title.'</h3>
                            <span class="fs-7">End Date: ' . date("M d Y", strtotime($jobdatas->deadline_date)) . '</span>
                        </div>
                        <div>
                           '.$budget.'
                        </div>
                    </div>

                    <div class="card-body mt-4 mt-md-5">
                       '.$jobdatas->content.'
                    </div>
                </div>
            </div>';

        $bidderdetail='';
        $biddata= bids::find_by_jobid_single_award($jobdatas->id);
        // pr($biddata);
        if(!empty($biddata)){
            $bidderdetail = '';
            // foreach($biddatas as $biddata){

            //freelancer data through
            $freelandata= freelancer::find_by_id($biddata->freelancer_id);
            // pr($freelandata);
            if(!empty($freelandata->profile_picture)){
                $profilepic ='';
            }

            $roundRating = round($freelandata->rating,0);
            $noRating = 5 - $roundRating;

            $profilepic = BASE_URL . 'template/web/assets/images/user-icon.png';
            if (!empty($freelandata->profile_picture)) {
                $file_path = SITE_ROOT . 'images/freelancer/profile/' . $freelandata->profile_picture;
                if (file_exists($file_path)) {
                    $profilepic = IMAGE_PATH . 'freelancer/profile/' . $freelandata->profile_picture;
                }
            }

            $bidderdetail .='<div class="row bg-light p-3 mt-2 gx-0">
                    <div class="col-2 col-md-2 p-0">
                        <img src="'.$profilepic.'"
                            alt="User" class="user-icon w-100 bg-dark-subtle p-3">
                    </div>
                    <div class="col-10 col-md-6 px-3">
                        <h5 class="fs-6 fw-bold">'.$freelandata->username.'</h5>
                        <p class="fs-7 line-clamp-2 mb-0">
                        '.strip_tags($biddata->message).'
                        </p>
                        <a href="#" class="fs-7">more</a>
                    </div>
                    <div class="col-6 col-md-3 mt-3 mt-md-0">
                        <h5 class="fs-7"><strong>'.$biddata->currency.' '.$biddata->bid_amount.'</strong> in '.$biddata->delivery.' days</h5>
                        <span class="fs-5 text-warning"> ' . str_repeat('★', $roundRating) . str_repeat('☆', $noRating) . '
                        </span>
                    </div>
                    <!--<div class="col-2 col-md-1 d-flex align-items-center mt-3 mt-md-0">
                        <input type="checkbox" name="bidder[]" value="'.$biddata->freelancer_id.'"
                            class="form-check-input bg-dark-subtle rounded-0 text-dark w-75 py-3 border-dark" />
                    </div>-->
                </div>';

            // }
        }
        $awarddetail .= '
            <div class="col-12 col-md-6 bg-white ps-0 ps-md-5">
            <h5 class="fs-5 fw-bold mb-3">Awarded Freelancer</h5>
            <form id="selectfreelancer">
            <input type="hidden" name="jobid" value="'.$jobdatas->id.'">
                '.$bidderdetail.'


                
            </form>
            </div>
        </div>
    </section>';
    }

} else {
    $awarddetail = '
        <div class="error_404_page position-relative">
            <div class="background">
                <div class="ground"></div>
            </div>
            <div class="container">
                <div class="left-section">
                    <div class="inner-content">
                        <!--<h1 class="heading">404</h1>-->
                        <p class="subheading" style="text-align:left; line-height:1.5;">Please login to view this page.</p>
                    </div>
                </div>
                <div class="right-section">
                    <svg class="svgimg" xmlns="http://www.w3.org/2000/svg" viewBox="51.5 -15.288 385 505.565">
                        <g class="bench-legs">
                            <path d="M202.778,391.666h11.111v98.611h-11.111V391.666z M370.833,390.277h11.111v100h-11.111V390.277z M183.333,456.944h11.111
                  v33.333h-11.111V456.944z M393.056,456.944h11.111v33.333h-11.111V456.944z" />
                        </g>
                        <g class="top-bench">
                            <path d="M396.527,397.917c0,1.534-1.243,2.777-2.777,2.777H190.972c-1.534,0-2.778-1.243-2.778-2.777v-8.333
                  c0-1.535,1.244-2.778,2.778-2.778H393.75c1.534,0,2.777,1.243,2.777,2.778V397.917z M400.694,414.583
                  c0,1.534-1.243,2.778-2.777,2.778H188.194c-1.534,0-2.778-1.244-2.778-2.778v-8.333c0-1.534,1.244-2.777,2.778-2.777h209.723
                  c1.534,0,2.777,1.243,2.777,2.777V414.583z M403.473,431.25c0,1.534-1.244,2.777-2.778,2.777H184.028
                  c-1.534,0-2.778-1.243-2.778-2.777v-8.333c0-1.534,1.244-2.778,2.778-2.778h216.667c1.534,0,2.778,1.244,2.778,2.778V431.25z"
                            />
                        </g>
                        <g class="bottom-bench">
                            <path d="M417.361,459.027c0,0.769-1.244,1.39-2.778,1.39H170.139c-1.533,0-2.777-0.621-2.777-1.39v-4.86
                  c0-0.769,1.244-0.694,2.777-0.694h244.444c1.534,0,2.778-0.074,2.778,0.694V459.027z" />
                            <path d="M185.417,443.75H400c0,0,18.143,9.721,17.361,10.417l-250-0.696C167.303,451.65,185.417,443.75,185.417,443.75z" />
                        </g>
                        <g id="lamp">
                            <path class="lamp-details" d="M125.694,421.997c0,1.257-0.73,3.697-1.633,3.697H113.44c-0.903,0-1.633-2.44-1.633-3.697V84.917
                  c0-1.257,0.73-2.278,1.633-2.278h10.621c0.903,0,1.633,1.02,1.633,2.278V421.997z"
                            />
                            <path class="lamp-accent" d="M128.472,93.75c0,1.534-1.244,2.778-2.778,2.778h-13.889c-1.534,0-2.778-1.244-2.778-2.778V79.861
                  c0-1.534,1.244-2.778,2.778-2.778h13.889c1.534,0,2.778,1.244,2.778,2.778V93.75z" />
    
                            <circle class="lamp-light" cx="119.676" cy="44.22" r="40.51" />
                            <path class="lamp-details" d="M149.306,71.528c0,3.242-13.37,13.889-29.861,13.889S89.583,75.232,89.583,71.528c0-4.166,13.369-13.889,29.861-13.889
                  S149.306,67.362,149.306,71.528z"/>
                            <radialGradient class="light-gradient" id="SVGID_1_" cx="119.676" cy="44.22" r="65" gradientUnits="userSpaceOnUse">
                                <stop  offset="0%" style="stop-color:#FFFFFF; stop-opacity: 1"/>
                                <stop  offset="50%" style="stop-color:#EDEDED; stop-opacity: 0.5">
                                    <animate attributeName="stop-opacity" values="0.0; 0.5; 0.0" dur="5000ms" repeatCount="indefinite"></animate>
                                </stop>
                                <stop  offset="100%" style="stop-color:#EDEDED; stop-opacity: 0"/>
                            </radialGradient>
                            <circle class="lamp-light__glow" fill="url(#SVGID_1_)" cx="119.676" cy="44.22" r="65"/>
                            <path class="lamp-bottom" d="M135.417,487.781c0,1.378-1.244,2.496-2.778,2.496H106.25c-1.534,0-2.778-1.118-2.778-2.496v-74.869
                  c0-1.378,1.244-2.495,2.778-2.495h26.389c1.534,0,2.778,1.117,2.778,2.495V487.781z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    ';
}

$jVars["module:dashboard-rewardfreelancer"] = $awarddetail;



$reviewdetail = "";
$reviewdetailjs = "";
if (!empty($_SESSION)) {
    if (!empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "freelancer" && defined('REVIEW') && isset($_REQUEST['slug'])) {

        $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
        $freelancerdata= freelancer::find_by_userid($_SESSION["user_id"]);
        // pr($freelancerdata);
        $jobdatas= jobs::find_by_slug($slug);
        $clientdatas = client::find_by_id($jobdatas->client_id);
        $totalbids = bids::find_total_bids($jobdatas->id);
        if ($jobdatas->budget_type == 1) {
            $budget = ' <h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->exact_budget . '</h4>';
        } else {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->budget_range_low . ' - ' . $jobdatas->budget_range_high . '</h4>';
        }

        $roundRating = round($clientdatas->rating,0);
        $noRating = 5 - $roundRating;

        $reviewdetail .= ' <main class="">
        <!-- Header -->
        <div class="bg-dark-blue">
            <div class="container">
                <h1 class="text-light py-4 py-lg-5 fw-light fs-2 fs-lg-1">
                    '.$jobdatas->title.'
                </h1>
            </div>
        </div>
        
        <div class="divMessageBox" style="display:none;"></div>      
        <div class="MessageBoxContainer" style="display:none;">
            <div class="MessageBoxMiddle">
            <span class="MsgTitle"></span>
            <p class="pText"></p>
                <div class="MessageBoxButtonSection">
                <button id="no" class="botTempo"> No</button>
                <button id="yes" class="botTempo"> Yes</button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="container">
            <a href="'.BASE_URL.'dashboard" class="text-dark fs-7 d-block mb-3 mb-lg-5">
                <i class="fa-solid fa-arrow-left"></i>
                Back to list page
            </a>

            <div class="row job-title-content gx-0">
                <!-- Left Content -->
                <div class="col-12 col-lg-9">
                    <div>
                        <!-- Job Title Card -->
                        <div class="bg-light card-title p-3 p-lg-5">
                            <div>
                                <div
                                    class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3">
                                    <div>
                                        <h3 class="fs-5 fw-bold mb-2 mb-sm-0">'.$jobdatas->title.'
                                            <span class="fs-7 text-success">(Completed)</span>
                                        </h3>
                                        <span class="fs-7">End Date: ' . date("M d Y", strtotime($jobdatas->deadline_date)) . '</span>
                                    </div>
                                    <div class="text-start text-sm-end">
                                        '.$budget.'
                                        <span class="fs-7">'.$totalbids.' bids</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review Section -->
                        <div class="card-body mt-4 mt-lg-5">
                        <form id="reviewset">
                            <h5 class="fw-bold fs-6 my-3 my-lg-4">Rate Client on project complete</h5>
                            <div class="my-3 my-lg-4">
                                <div id="rating-container" class="ratings d-flex gap-1">
                            <input type="hidden" id="rating" name="rating" value="0">
                            <input type="hidden" name="freelancerid" value="'.$freelancerdata->id.'">
                            <input type="hidden" name="clientid" value="'.$clientdatas->id.'">
                            <input type="hidden" name="jobid" value="'.$jobdatas->id.'">
                                    <span class="star fs-4 text-muted" data-value="1">☆</span>
                                    <span class="star fs-4 text-muted" data-value="2">☆</span>
                                    <!--<span class="star fs-4 text-muted" data-value="3">☆</span>
                                    <span class="star fs-4 text-muted" data-value="4">☆</span>
                                    <span class="star fs-4 text-muted" data-value="5">☆</span>-->
                                </div>
                            </div>
                           <div id="result_msg"></div>
                            <a onclick="showConfirm()"
                                class="btn btn-dark bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0 w-auto" id="submit">
                                Submit Review
                            </a>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="biddy-sticky col-12 col-lg-3 bg-white p-3 ps-lg-5 mt-4 mt-lg-0">
                    <h3 class="fs-5 fw-bold">
                        About Client
                    </h3>
                    <div class="client-info mt-3 mt-lg-4">
                        <ul class="d-flex gap-1 flex-column list-unstyled mb-0">
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-location-dot"></i>
                                '. $clientdatas->current_address.'
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-user"></i>
                                <span class="fs-4 text-warning"> ' . str_repeat('★', $roundRating) . str_repeat('☆', $noRating) . '</span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-clock"></i>
                                Member since ' . date("M d, Y", strtotime($clientdatas->added_date)) . '
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>';
        $reviewdetailjs = '<script src="'.BASE_URL.'template/web/assets/js/ratingsingle.js"></script>';
    }
    elseif (!empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "client" && defined('REVIEW') && isset($_REQUEST['slug'])) {

        $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
        $jobdatas= jobs::find_by_slug($slug);
        $clientdatas = client::find_by_id($jobdatas->client_id);
        $totalbids = bids::find_total_bids($jobdatas->id);
        if ($jobdatas->budget_type == 1) {
            $budget = ' <h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->exact_budget . '</h4>';
        } else {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->budget_range_low . ' - ' . $jobdatas->budget_range_high . '</h4>';
        }

        $roundRating = round($clientdatas->rating,0);
        $noRating = 5 - $roundRating;
        $reviewdetail .= ' <main class="">
        <!-- Header -->
        <div class="bg-dark-blue">
            <div class="container">
                <h1 class="text-light py-4 py-lg-5 fw-light fs-2 fs-lg-1">
                    '.$jobdatas->title.'
                </h1>
            </div>
        </div>
        
        <div class="divMessageBox" style="display:none;"></div>      
        <div class="MessageBoxContainer" style="display:none;">
            <div class="MessageBoxMiddle">
            <span class="MsgTitle"></span>
            <p class="pText"></p>
                <div class="MessageBoxButtonSection">
                <button id="no" class="botTempo"> No</button>
                <button id="yes" class="botTempo"> Yes</button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="container">
            <a href="'.BASE_URL.'dashboard" class="text-dark fs-7 d-block mb-3 mb-lg-5">
                <i class="fa-solid fa-arrow-left"></i>
                Back to list page
            </a>

            <div class="row job-title-content gx-0">
                <!-- Left Content -->
                <div class="col-12 col-lg-9">
                    <div>
                        <!-- Job Title Card -->
                        <div class="bg-light card-title p-3 p-lg-5">
                            <div>
                               <div
                                    class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3">
                                      <div>
                                        <h3 class="fs-5 fw-bold mb-2 mb-sm-0">'.$jobdatas->title.'
                                            <span class="fs-7 text-success">(Completed)</span>
                                        </h3>
                                        <span class="fs-7">End Date: ' . date("M d Y", strtotime($jobdatas->deadline_date)) . '</span>
                                    </div>
                                    <div class="text-start text-sm-end">
                                        '.$budget.'
                                        <span class="fs-7">'.$totalbids.' bids</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review Section -->
                        <div class="card-body mt-4 mt-lg-5">
                            <h5 class="fw-bold fs-6 my-3 my-lg-4">Rate Freelancers on project complete</h5>
                            <form id="reviewsetmulti">
        ';

        $about_freelancers = '';
        $biddatas = bids::find_by_jobid_review($jobdatas->id, $jobdatas->client_id);
        foreach ($biddatas as $biddata) {
            $freelancerdata = freelancer::find_by_id($biddata->freelancer_id);

            $profilepic = BASE_URL . 'template/web/assets/images/user-icon.png';
            if (!empty($freelancerdata->profile_picture)) {
                $file_path = SITE_ROOT . 'images/freelancer/profile/' . $freelancerdata->profile_picture;
                if (file_exists($file_path)) {
                    $profilepic = IMAGE_PATH . 'freelancer/profile/' . $freelancerdata->profile_picture;
                }
            }

            $profilepic = '<div class="col-2 col-md-2 p-0">
                        <img src="' . $profilepic . '"
                            alt="User" class="user-icon w-100 bg-dark-subtle p-3">
                    </div>';

            $reviewdetail .= ' 
                <input type="hidden" name="jobid" value="' . $jobdatas->id . '">
                <input type="hidden" name="clientid" value="' . $clientdatas->id . '">
                <div class="row bg-light p-3 mt-2 gx-0 hover-effect">
                    ' . $profilepic . '
                    <input type="hidden" class="rating" name="rating[' . $freelancerdata->id . ']" value="0">
                    <div class="col-9 col-md-6 px-3 d-flex justify-content-center flex-column">
                        <h5 class="fs-6 fw-bold">' . $freelancerdata->username . '</h5>
                    </div>
                    <div class="col-12 col-md-3 d-flex justify-content-center flex-column">
                        <h5 class="fs-7">Rate the Freelancer</h5>
                        <div id="rating-container" class="ratings d-flex gap-1">
                            <span class="star fs-4 text-muted" data-value="1">☆</span>
                            <span class="star fs-4 text-muted" data-value="2">☆</span>
                            <!--<span class="star fs-4 text-muted" data-value="3">☆</span>
                            <span class="star fs-4 text-muted" data-value="4">☆</span>
                            <span class="star fs-4 text-muted" data-value="5">☆</span>-->
                        </div>
                    </div>
                </div>
            ';

            $roundRatingF = round($freelancerdata->rating,0);
            $noRatingF = 5 - $roundRatingF;
            $about_freelancers .= '
                <div class="mb-3">
                    <h3 class="fs-5 fw-bold">
                        About ' . $freelancerdata->first_name . ' ' . $freelancerdata->last_name . ' (' . $freelancerdata->username . ')
                    </h3>
                    <div class="client-info mt-3 mt-lg-4">
                        <ul class="d-flex gap-1 flex-column list-unstyled mb-0">
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-location-dot"></i>
                                '. $freelancerdata->current_address.'
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-user"></i>
                                <span class="fs-4 text-warning"> ' . str_repeat('★', $roundRatingF) . str_repeat('☆', $noRatingF) . '</span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-clock"></i>
                                Member since ' . date("M d, Y", strtotime($freelancerdata->added_date)) . '
                            </li>
                        </ul>
                    </div>
                </div>
            ';
        }

        $reviewdetail .=' 

                            <div id="result_msg"></div>
                            <a onclick="showConfirmFree()"
                                class="btn btn-dark bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0 w-auto mt-4" id="submitmulti">
                                Submit Review
                            </a>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="biddy-sticky col-12 col-lg-3 bg-white p-3 ps-lg-5 mt-4 mt-lg-0">
                    ' . $about_freelancers . '
                </div>
            </div>
        </section>
    </main>';
        $reviewdetailjs = '<script src="'.BASE_URL.'template/web/assets/js/rating.js"></script>';
    }

} else {
    $reviewdetail = '
        <div class="error_404_page position-relative">
            <div class="background">
                <div class="ground"></div>
            </div>
            <div class="container">
                <div class="left-section">
                    <div class="inner-content">
                        <!--<h1 class="heading">404</h1>-->
                        <p class="subheading" style="text-align:left; line-height:1.5;">Please login to view this page.</p>
                    </div>
                </div>
                <div class="right-section">
                    <svg class="svgimg" xmlns="http://www.w3.org/2000/svg" viewBox="51.5 -15.288 385 505.565">
                        <g class="bench-legs">
                            <path d="M202.778,391.666h11.111v98.611h-11.111V391.666z M370.833,390.277h11.111v100h-11.111V390.277z M183.333,456.944h11.111
                  v33.333h-11.111V456.944z M393.056,456.944h11.111v33.333h-11.111V456.944z" />
                        </g>
                        <g class="top-bench">
                            <path d="M396.527,397.917c0,1.534-1.243,2.777-2.777,2.777H190.972c-1.534,0-2.778-1.243-2.778-2.777v-8.333
                  c0-1.535,1.244-2.778,2.778-2.778H393.75c1.534,0,2.777,1.243,2.777,2.778V397.917z M400.694,414.583
                  c0,1.534-1.243,2.778-2.777,2.778H188.194c-1.534,0-2.778-1.244-2.778-2.778v-8.333c0-1.534,1.244-2.777,2.778-2.777h209.723
                  c1.534,0,2.777,1.243,2.777,2.777V414.583z M403.473,431.25c0,1.534-1.244,2.777-2.778,2.777H184.028
                  c-1.534,0-2.778-1.243-2.778-2.777v-8.333c0-1.534,1.244-2.778,2.778-2.778h216.667c1.534,0,2.778,1.244,2.778,2.778V431.25z"
                            />
                        </g>
                        <g class="bottom-bench">
                            <path d="M417.361,459.027c0,0.769-1.244,1.39-2.778,1.39H170.139c-1.533,0-2.777-0.621-2.777-1.39v-4.86
                  c0-0.769,1.244-0.694,2.777-0.694h244.444c1.534,0,2.778-0.074,2.778,0.694V459.027z" />
                            <path d="M185.417,443.75H400c0,0,18.143,9.721,17.361,10.417l-250-0.696C167.303,451.65,185.417,443.75,185.417,443.75z" />
                        </g>
                        <g id="lamp">
                            <path class="lamp-details" d="M125.694,421.997c0,1.257-0.73,3.697-1.633,3.697H113.44c-0.903,0-1.633-2.44-1.633-3.697V84.917
                  c0-1.257,0.73-2.278,1.633-2.278h10.621c0.903,0,1.633,1.02,1.633,2.278V421.997z"
                            />
                            <path class="lamp-accent" d="M128.472,93.75c0,1.534-1.244,2.778-2.778,2.778h-13.889c-1.534,0-2.778-1.244-2.778-2.778V79.861
                  c0-1.534,1.244-2.778,2.778-2.778h13.889c1.534,0,2.778,1.244,2.778,2.778V93.75z" />
    
                            <circle class="lamp-light" cx="119.676" cy="44.22" r="40.51" />
                            <path class="lamp-details" d="M149.306,71.528c0,3.242-13.37,13.889-29.861,13.889S89.583,75.232,89.583,71.528c0-4.166,13.369-13.889,29.861-13.889
                  S149.306,67.362,149.306,71.528z"/>
                            <radialGradient class="light-gradient" id="SVGID_1_" cx="119.676" cy="44.22" r="65" gradientUnits="userSpaceOnUse">
                                <stop  offset="0%" style="stop-color:#FFFFFF; stop-opacity: 1"/>
                                <stop  offset="50%" style="stop-color:#EDEDED; stop-opacity: 0.5">
                                    <animate attributeName="stop-opacity" values="0.0; 0.5; 0.0" dur="5000ms" repeatCount="indefinite"></animate>
                                </stop>
                                <stop  offset="100%" style="stop-color:#EDEDED; stop-opacity: 0"/>
                            </radialGradient>
                            <circle class="lamp-light__glow" fill="url(#SVGID_1_)" cx="119.676" cy="44.22" r="65"/>
                            <path class="lamp-bottom" d="M135.417,487.781c0,1.378-1.244,2.496-2.778,2.496H106.25c-1.534,0-2.778-1.118-2.778-2.496v-74.869
                  c0-1.378,1.244-2.495,2.778-2.495h26.389c1.534,0,2.778,1.117,2.778,2.495V487.781z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    ';
}

$jVars["module:dashboard-review"] = $reviewdetail;
$jVars["module:dashboard-review-js"] = $reviewdetailjs;


$rest_password_form = '';
if (defined('RESET_PASSWORD_PAGE')) {
    $token = $_REQUEST['access_code'];
    $user = User::get_uid_by_accessToken($token);

    $rest_password_form .= '
     <form id="resetPasswordForm" class="row g-4">
      <input type="hidden" name="id" value="' . $user->id . '">
            <input type="hidden" name="token" value="' . $token . '">
                    <div class="col-12 position-relative">
                        <input type="password" placeholder="Password"
                               class="form-control fs-6 py-3 px-3 border border-dark-subtle rounded-0" id="password"
                               name="password">
                        <img src="'.BASE_URL.'template/web/assets/images/icons/view.png" alt="view and hide" id="showhide">
                    </div>
                    <div class="col-12 position-relative">
                        <input type="password" placeholder="Confirm Password"
                               class="form-control fs-6 py-3 px-3 border border-dark-subtle rounded-0" id="passwordF"
                               name="confirm_password">
                        <img src="'.BASE_URL.'template/web/assets/images/icons/view.png" alt="view and hide" id="showhideF">
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <label for="agreement" class="fs-6">
                        </label>
                        <a href="login" class="fs-6 text-dark-blue text-decoration-none">login?</a>
                    </div>
                    <div id="resetMsg"></div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary bg-dark-blue text-white form-control fs-6 py-3 px-3 rounded-0 fw-bold"
                                id="submitReset">
                            submit
                        </button>
                    </div>
                </form>
    ';
}

$jVars['module:user:reset-password-form'] = $rest_password_form;


