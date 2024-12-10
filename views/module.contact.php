<?php
/*
* Contact form
*/
$rescont = $innerbred = '';
$img = '';
if (defined('CONTACT_PAGE')) {

    $tellinked = '';
    $telno = explode(",", $siteRegulars->contact_info);
    $lastElement = array_shift($telno);
    $tellinked .= '<a href="tel:' . $lastElement . '" class="link-secondary text-decoration-none" target="_blank">' . $lastElement . '</a>';
    foreach ($telno as $tel) {
        $tellinked .= '<br/><a href="tel:' . $tel . '" class="link-secondary text-decoration-none" target="_blank">' . $tel . '</a>';
        if (end($telno) != $tel) {
            $tellinked .= '/';
        }
    }

    $emailinked = '';
    $emailno = explode(",", $siteRegulars->email_address);
    $lastElement = array_shift($emailno);
    $emailinked .= '<a href="mailto:' . $lastElement . '" target="_blank">' . $lastElement . '</a>';
    foreach ($emailno as $email) {
        $emailinked .= '<br/><a href="mailto:' . $email . '" target="_blank">' . $email . '</a>';
        if (end($emailno) != $email) {
            $emailinked .= '/';
        }
    }

    $imglink = $siteRegulars->contact_upload;
    if (!empty($imglink)) {
        $img = IMAGE_PATH . 'preference/contact/' . $siteRegulars->contact_upload;
    } else {
        $img = '';
    }

    $rescont .= '

      <section class="bg-light py-3 py-md-5">
            <div class="container">
                <div class="row gy-4 gy-md-5 gy-lg-0 align-items-md-center">
                    <!-- Contact Form Column -->
                    <div class="col-12 col-lg-6">
                        <div class="border overflow-hidden bg-white">
                             <form id="contact_frm">
                                <div class="row gy-3 gy-md-4 p-3 p-md-4 p-lg-5">
                                    <!-- Full Name -->
                                    <div class="col-12">
                                        <label for="fullname" class="form-label">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-0" id="fullname" name="fullname">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12 col-md-6">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group d-flex flex-column">
                                            <!-- <span class="input-group-text rounded-0">
                                                <i class="fa-solid fa-envelope text-dark me-2"></i> 
                                            </span> -->
                                            <input type="email" class="form-control rounded-0 w-100" id="email" name="email">
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-12 col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <div class="input-group">
                                            <!-- <span class="input-group-text rounded-0">
                                                <i class="fa-solid fa-phone text-dark me-2"></i>
                                            </span> -->
                                            <input type="tel" class="form-control rounded-0" id="phone" name="phone">
                                        </div>
                                    </div>

                                    <!-- Subject -->
                                    <div class="col-12">
                                        <label for="subject" class="form-label">Subject <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-0" id="subject" name="subject">
                                    </div>

                                    <!-- Message -->
                                    <div class="col-12">
                                        <label for="message" class="form-label">Message <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control rounded-0" id="message" rows="4"
                                            name="message"></textarea>
                                    </div>
                                    <div id="msg"></div>
                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button class="btn btn-secondary bg-dark-blue w-100 py-3 rounded-0"
                                            type="submit" id="submit">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Info Column -->
                    <div class="col-12 col-lg-6">
                        <div class="row justify-content-xl-center p-3 p-md-0">
                            <div class="col-12 col-xl-11">
                                <!-- Office Address -->
                                <div class="mb-4 mb-md-5">
                                    <h4 class="mb-2 fs-5">
                                        <i class="fa-solid fa-location-dot text-dark me-2"></i> Office
                                    </h4>
                                    <hr class="w-50 mb-3 border-dark-subtle">
                                    <address class="m-0 text-secondary">
                                        ' . $siteRegulars->fiscal_address . '
                                    </address>
                                </div>

                                <!-- Contact Details -->
                                <div class="row mb-4 mb-md-5">
                                    <!-- Phone -->
                                    <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                                        <h4 class="mb-2 fs-5">
                                            <i class="fa-solid fa-phone text-dark me-2"></i> Phone
                                        </h4>
                                        <hr class="w-75 mb-3 border-dark-subtle">
                                        <p class="mb-0">
                                           ' . $tellinked . '
                                        </p>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12 col-sm-6">
                                        <h4 class="mb-2 fs-5">
                                            <i class="fa-solid fa-envelope text-dark me-2"></i> Email
                                        </h4>
                                        <hr class="w-75 mb-3 border-dark-subtle">
                                        <p class="mb-0">
                                            <a class="link-secondary text-decoration-none"
                                                            href="mailto:' . $siteRegulars->email_address . '">' . $siteRegulars->email_address . '</a>
                                        </p>
                                    </div>
                                </div>

                                <!-- Map -->
                                <div class="map-container w-100 mt-4">
                                  <iframe
                                src="' . $siteRegulars->location_map . '"
                                class="w-100" height="300" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




       
    ';
}

$jVars['module:contact-us'] = $rescont;
