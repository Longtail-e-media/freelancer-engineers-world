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
            <section class="py-3 py-md-5 py-xl-8">
                <div class="container">
                    <div class="row gy-4 gy-md-5 gy-lg-0 align-items-md-center">
                        <div class="col-12 col-lg-6">
                            <div class="border overflow-hidden">

                                <form id="contact_frm">
                                    <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                        <div class="col-12">
                                            <label for="fullname" class="form-label">Full Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="fullname" name="fullname">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="email" class="form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                    </svg>
                                                </span>
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                </span>
                                                <input type="tel" class="form-control" id="phone" name="phone" value="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="subject" class="form-label">Subject <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="subject" name="subject" value=""
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="message" class="form-label">Message <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="message" name="message" rows="3"
                                                required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-secondary bg-dark-blue btn-lg" type="submit" id="submit">Send
                                                    Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row justify-content-xl-center mb-4">
                                <div class="col-12 col-xl-11">
                                    <div class="mb-4 mb-md-5">
                                        <div>
                                            <h4 class="mb-2 fs-5">
                                                <i class="fa-solid fa-location-dot text-dark me-2"></i> Office
                                            </h4>
                                            <!-- <p class="mb-2">Please visit us to have a discussion.</p> -->
                                            <hr class="w-50 mb-3 border-dark-subtle">
                                            <address class="m-0 text-secondary">
                                                ' . $siteRegulars->fiscal_address . '
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row mb-sm-4 mb-md-5">
                                        <div class="col-12 col-sm-6">
                                            <div class="mb-4 mb-sm-0">
                                                <div>
                                                    <h4 class="mb-2 fs-5">
                                                        <i class="fa-solid fa-phone text-dark me-2"></i> Phone
                                                    </h4>
                                                    <!-- <p class="mb-2">Please speak with us directly.</p> -->
                                                    <hr class="w-75 mb-3 border-dark-subtle">
                                                    <p class="mb-0">
                                                    ' . $tellinked . '
                                                       </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="mb-4 mb-sm-0">
                                                <div>
                                                    <h4 class="mb-2 fs-5">
                                                        <i class="fa-solid fa-envelope text-dark me-2"></i> Office
                                                    </h4>
                                                    <!-- <p class="mb-2">Please write to us directly.</p> -->
                                                    <hr class="w-75 mb-3 border-dark-subtle">
                                                    <p class="mb-0">
                                                        <a class="link-secondary text-decoration-none"
                                                            href="mailto:' . $siteRegulars->email_address . '">' . $siteRegulars->email_address . '</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <iframe
                                src="' . $siteRegulars->location_map . '"
                                class="w-100" height="300" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    ';
}

$jVars['module:contact-us'] = $rescont;
