<?php
/**
 *      Create Job Page
 */
$createajob = '';
if (!empty($_SESSION)) {
    if (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'client' && defined('CREATE_A_JOB')) {

        $record = client::find_by_userid($_SESSION['user_id']);
        $createajob .= '
        <section class="container">
            <div class="row job-title-content gx-0">
                <div class="col-md-7 bg-light p-5" style="position: sticky; top: 5rem; max-height: max-content;">
                    <form class="client-form" id="createjob">
                    <input type="hidden" name="client_id" value="' . $record->id . '">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 rounded-0 fs-6" id="jobtitle" placeholder="Job Title" 
                                           name="title">
                                    <label for="jobtitle">Job Title <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
    
                        <div class="row g-3 mt-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="date" class="form-control border-0 rounded-0 fs-6" id="deadline"
                                           name="deadline_date">
                                    <label for="deadline">Deadline Date <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
    
                        <div class="row g-3 mt-3">
                            <div class="col-md-2">
                                <label for="Currency" class="form-label fs-6">Currency<span class="text-danger">*</span></label>
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 rounded-0 fs-6" id="Currency"
                                           name="currency">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="budgetType" class="form-label fs-6">Budget Type <span class="text-danger">*</span></label>
                                <div class="d-flex gap-5 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="budgetRangeOption" value="0" checked 
                                               name="budget_type">
                                        <label class="form-check-label" for="budgetRangeOption">Range</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="budgetExactOption" value="1"
                                               name="budget_type">
                                        <label class="form-check-label" for="budgetExactOption">Exact</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Budget Range -->
                            <div class="col-md-6" id="budgetRangeFields">
                                <label for="budgetRangeMin" class="form-label fs-6">Budget Range <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="number" class="form-control border-0 rounded-0 fs-6" id="budgetRangeMin"
                                           name="budget_range_low">
                                    <span>to</span>
                                    <input type="number" class="form-control border-0 rounded-0 fs-6" id="budgetRangeMax" 
                                           name="budget_range_high">
                                </div>
                            </div>
    
                            <!-- Exact Budget -->
                            <div class="col-md-5" id="budgetExactField" style="display: none;">
                                <label for="budgetExact" class="form-label fs-6">Exact Budget <span class="text-danger">*</span></label>
                                <input type="number" class="form-control border-0 rounded-0 fs-6" id="budgetExact" placeholder="Enter Exact Budget"
                                       name="exact_budget">
                            </div>
    
                            <!-- Budget Unit -->
                          <!-- <div class="col-md-3 d-flex align-items-start flex-column">
                                <label for="budgetUnit">Budget Unit <span class="text-danger">*</span></label>
                                <select class="border-0 rounded-0 fs-7 pt-0 mt-2 px-2" id="budgetUnit" name="currency"
                                    style="width: 100%; height: 100%!important;">
                                    <option value="USD" selected>USD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                    <option value="NPR">NPR</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="row g-3 mt-3">
                            <div class="col-md-3 d-flex align-items-start flex-column">
                                <label for="budgetUnit">Budget Unit <span class="text-danger">*</span></label>
                                <select class="border-0 rounded-0 fs-7 pt-2 mt-4 px-4" id="budgetUnit" name="job_type"
                                    style="width: 100%; height: 100%!important;">';

        $jobcategorys = jobtitle::find_all_active();
        foreach ($jobcategorys as $key => $jobcategory) {
            $createajob .= '   <option value="' . $jobcategory->id . '" >' . $jobcategory->title . '</option>';
        }

        $createajob .= '        </select>
                            </div>
                        </div>
 
                        <div class="row g-3 mt-3">
                            <div class="col-md-12">
                                <label for="jobDescription" class="form-label fs-6">Job Description</label>
                                <textarea class="form-control border-0 rounded-0 fs-6" id="jobDescription" rows="6"
                                          placeholder="Provide a detailed job description" name="content"></textarea>
                            </div>
                        </div>
                        <div id="msgProfile"></div>
                        <div>
                            <button type="submit" class="btn btn-dark bg-dark-blue text-light px-5 py-2 fs-6 rounded-0 border-0 mt-5" id="submit">
                                Create a Job
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 bg-white ps-5">
                    <h5 class="fw-bold fs-5 mb-4">
                        Basic policy to post job:
                    </h5>
    
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer risus erat, commodo nec arcu
                        non, condimentum sodales odio. Integer euismod tempor arcu eget blandit. Curabitur volutpat urna
                        non accumsan tempus. Donec viverra semper nunc, vitae maximus elit vestibulum quis. Pellentesque
                        eget imperdiet nisl. Vestibulum quis bibendum velit, sed laoreet urna. Nulla consectetur
                        faucibus risus suscipit eleifend. Nulla efficitur tincidunt nibh, at molestie mi dictum a. Etiam
                        non pulvinar erat. Aenean nec feugiat arcu, sed pulvinar purus. Maecenas interdum varius mollis.
                        Nullam erat lectus, accumsan nec fermentum consectetur, viverra sit amet lacus.
                    </p>
    
                    <p>
                        Nam non nisl tempor metus molestie pellentesque. Maecenas mauris justo, luctus id neque vel,
                        tempus porta erat. Mauris ut magna vitae neque sagittis iaculis in eu ligula. Sed pretium lorem
                        sapien, in pellentesque mi sagittis id. Nunc faucibus, lacus non fringilla bibendum, metus nisl
                        commodo velit, a ultrices erat velit nec tellus. Phasellus leo nunc, pharetra quis vulputate
                        sed, condimentum auctor lorem. Curabitur eget odio lacus. Nullam pulvinar libero eu feugiat
                        volutpat. Nam ligula nulla, finibus in suscipit ut, efficitur et orci. Suspendisse blandit ex ac
                        nisl bibendum hendrerit. Fusce vehicula elit nisl, quis tincidunt lectus viverra ac.
                    </p>
    
                    <p>
                        Pellentesque at ornare ante, nec varius nibh. Donec massa massa, tempor a ultrices luctus,
                        pharetra quis sem. Aliquam dolor lectus, blandit sit amet posuere in, rhoncus efficitur mi.
                        Etiam sit amet placerat leo. Proin a quam justo. Sed feugiat justo nec tellus semper tincidunt.
                        Proin ut sagittis risus. Nulla et pharetra est, at pulvinar turpis. Etiam vitae turpis sed magna
                        dapibus vulputate.
                    </p>
    
                </div>
            </div>
        </section>
        ';

    }
}
$jVars['module:job-creation'] = $createajob;


/**
 *      Job Detail Page
 */
$jobdetails = '';
if (defined('JOB_DETAIL_PAGE') and isset($_REQUEST['slug'])) {

    $slug       = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
    $jobdatas   = jobs::find_by_slug($slug);

    if (!empty($jobdatas)) {
        $clientdatas = client::find_by_id($jobdatas->client_id);
        $jobdetails .= '
        <div class="bg-dark-blue">
            <div class="container">
                <h1 class="text-light py-5 fw-light fs-1">
                    Job Detail
                </h1>
            </div>
        </div>
        <section class="container pb-0">
            <div class="row job-title-content gx-0">
                <div class="col-md-9 bg-light p-3 p-md-5">
                    <div>
                        <div class="card-title d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="fs-5 fw-bold">' . $jobdatas->title . '</h3>
                                <span class="fs-7">End Date: ' . date("M d Y", strtotime($jobdatas->deadline_date)) . '</span>
                            </div>
                            <div>
        ';

        if ($jobdatas->budget_type == 1) {
            $budget = ' <h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->exact_budget . '</h4>';
        } else {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->budget_range_low . ' - ' . $jobdatas->budget_range_high . '</h4>';
        }

        $bids_txt = Bids::find_total_bids($jobdatas->id);
        $jobdetails .= $budget . ' 
                                <span class="fs-7">' . $bids_txt . ' bids</span>
                            </div>
                        </div>
                        <div class="card-body mt-5 pt-5">
                           ' . $jobdatas->content . '
                        </div>
                    </div>
                </div>
                <div class="biddy-sticky col-md-3 bg-white pt-5 pt-md-0 ps-md-5 sticky-top">
                    <h3 class="fs-5 fw-bold">
                        Place your Bid
                    </h3>
                    <form class="bidding-form mt-4 d-flex align-items-center" id="place-bid-form-1">
                        <div class="bidding">
                            <!-- <label for="bid-amount" class="form-label fw-bold">NRs. 2500</label> -->
        ';
        // hidden user id
        $userId = (!empty($_SESSION['user_id'])) ? $_SESSION['user_id'] : 0;
        $jobdetails .= '
            <input type="hidden" name="userId" value="' . $userId . '">
            <input type="hidden" name="jobId" value="' . $jobdatas->id . '">
        ';

        // updating bid input type according to budget type
        if ($jobdatas->budget_type == 0) {
            $jobdetails .= '
                <input type="number" class="bg-light form-control ps-3 fw-bold text-dark" id="bid-amount" placeholder="NRs. 25000" id="bid-amount"
                       name="bid-amount" min="' . $jobdatas->budget_range_low . '" max="' . $jobdatas->budget_range_high . '">
            ';
        }
        if ($jobdatas->budget_type == 1) {
            $jobdetails .= '
                <input type="number" class="bg-light form-control ps-3 fw-bold text-dark" id="bid-amount" placeholder="NRs. 25000" id="bid-amount"
                       name="bid-amount" value="' . $jobdatas->exact_budget . '" readonly>
            ';
        }
        $jobdetails .= '
                        </div>
                        <button type="submit" class="btn btn-dark bg-dark-blue text-white">Bid</button>
                    </form>
    
                    <hr class="my-5">
    
                    <h3 class="fs-5 fw-bold">
                        About Client
                    </h3>
                    <div class="client-info mt-4">
                        <ul class="d-flex gap-1 flex-column list-unstyled">
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-location-dot"></i>
                                ' . $clientdatas->permanent_address . '
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-user"></i>
                                <span class="fs-4">' . str_repeat('★', $clientdatas->rating) . ' ' . str_repeat('☆', (5 - $clientdatas->rating)) . '</span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-clock"></i>
                                Member since ' . date("M d, Y", strtotime($clientdatas->added_date)) . '
                            </li>
                        </ul>
                    </div>
        ';
        $related = '';
        $relatedjobs = jobs::get_relatedsub_by($jobdatas->client_id, $jobdatas->id, 4);
        foreach ($relatedjobs as $relatedjob) {
            $related .= '
                    <div class="card-body">
                        <a href="' . BASE_URL . 'job/' . $relatedjob->slug . '" class="text-decoration-none text-dark">
                            <h5 class="fs-7 fw-bold">' . $relatedjob->title . '</h5>
                        </a>
            ';
            if ($relatedjob->budget_type == 1) {
                $relbudget = '<p class="fs-7">' . $relatedjob->currency . ' ' . $relatedjob->exact_budget . '</p>';
            } else {
                $relbudget = '<p class="fs-7">' . $relatedjob->currency . ' ' . $relatedjob->budget_range_low . '  - ' . $relatedjob->budget_range_high . '</p>';
            }
            $related .= $relbudget . '
                    </div>
            ';
        }
        $jobdetails .= '
                    <hr class="my-5">
                    
                    <h3 class="fs-5 fw-bold">
                        Similar Jobs
                    </h3>
    
                    <div class="similar-jobs mt-4">  
                    ' . $related . '
                    </div>
                </div>
            </div>
        </section>
        ';

        // getting total bids data
        $bidsRec = bids::find_by_jobid($jobdatas->id);
        if (!empty($bidsRec)) {
            $total_bids = sizeof($bidsRec);
            $average_bids = bids::get_average_bid_by_job_id($jobdatas->id);
            $jobdetails .= '
                <section class="container mt-4 pt-2">
                    <h5 class="fw-bold fs-6 fs-md-5 my-4">' . $total_bids . ' freelancers are bidding on average ' . $jobdatas->currency . ' ' . $average_bids . ' </h5>
                    <div class="row job-review-content">
                        <div class="col-md-9">
            ';
            foreach ($bidsRec as $bidsRow) {
                $freelancerRec = freelancer::find_by_id($bidsRow->freelancer_id);
                $img = 'https://static-00.iconduck.com/assets.00/user-icon-1024x1024-unb6q333.png';
                if (!empty($freelancerRec->profile_picture)) {
                    $file_path = SITE_ROOT . 'images/freelancer/profile/' . $freelancerRec->profile_picture;
                    if (file_exists($file_path)) {
                        $img = IMAGE_PATH . 'freelancer/profile/' . $freelancerRec->profile_picture;
                    }
                }

                $jobdetails .= '
                            <div class="row bg-light p-3 p-md-5 mt-2 gx-0">
                                <div class="col-12 col-md-3 p-0">
                                    <img src="' . $img . '" alt="' . $freelancerRec->username . '" class="user-icon bg-dark-subtle">
                                </div>
                                <div class="col-8 col-md-6 px-0 px-md-5">
                                    <h5 class="fs-6 fw-bold mt-3">@' . $freelancerRec->username . '</h5>
                                    <p class="fs-7 line-clamp-2 mb-0">' . strip_tags($bidsRow->message) . '</p>
                                    <!--<a href="#" class="fs-7">more</a>-->
                                </div>
                                <div class="col-3 col-md-3 mt-md-0 ms-3 ms-md-0 mt-3">
                                    <h5 class="fs-7"><strong>' . $bidsRow->currency . ' ' . $bidsRow->bid_amount . '</strong> in ' . $bidsRow->delivery . ' days</h5>
                                    <span class="fs-4"> ' . str_repeat('★', $freelancerRec->rating) . ' ' . str_repeat('☆', (5 - $freelancerRec->rating)) . '</span>
                                </div>
                            </div>
                ';
            }
            $jobdetails .= '
                        </div>
                        <div class="biddy-sticky col-md-3 bg-white ps-3 mt-2 sticky-top d-none">
                            <div class="card p-5 border-0 rounded-0 bg-dark-subtle">
                                <img src="" alt="Advertisement" class="advertisement">
                            </div>
                        </div>
                    </div>
                </section>
            ';
        }

        $jobdetails .= '    
        <!-- Modal -->
        <div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bidModalLabel">Place Your Bid</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
                        <form id="bidForm">
                            <div class="mb-3">
                                <label for="bid_amount" class="form-label fw-semibold">Bid Amount (' . $jobdatas->currency . ')<span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-white" id="bid_amount" name="bid_amount"
                                       value="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="deliveryTime" class="form-label fw-semibold">Delivery Time (in days) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="delivery" name="delivery"
                                       placeholder="Number of days to complete the project">
                            </div>
                            <div class="mb-3">
                                <label for="bidMessage" class="form-label font-semibold">Message<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="4"
                                          placeholder="Add a message for the client..."></textarea>
                            </div>
                            <div class="alert alert-primary">
                                <strong>Note:</strong> You will get the bid amount after deducting the service charge.
                            </div>
                            <div id="bidMsg" class="alert alert-success" style="display: none;"></div>
        ';
        // hidden user id
        $userId = (!empty($_SESSION['user_id'])) ? $_SESSION['user_id'] : 0;
        $jobdetails .= '
            <input type="hidden" name="userId" value="' . $userId . '">
            <input type="hidden" name="jobId" value="' . $jobdatas->id . '">
        ';
        $jobdetails .= '
                            <button type="submit" id="submitBid" class="btn btn-dark bg-dark-blue text-white px-4 py-2 rounded-0 fs-6">
                                Submit Bid
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ';

    }

}

$jVars['module:job-details'] = $jobdetails;