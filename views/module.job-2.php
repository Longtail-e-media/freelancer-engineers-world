<?php
/**
 *      Create Job Page
 */
$createajob = '';
if (!empty($_SESSION)) {
    if (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'client' && defined('CREATE_A_JOB')) {

        $record = client::find_by_userid($_SESSION['user_id']);
        $createajob .= '
        <section class="container mt-4">
            <div class="row job-title-content gx-0 gy-5">
                <div class="col-12 col-lg-7 bg-light p-3 p-md-4 p-lg-5 biddy-sticky">
                    <form class="client-form" id="createjob">
                    <input type="hidden" name="client_id" value="' . $record->id . '">
                        <div class="row gx-0 gy-3 g-md-3">
                            <div class="col-md-7">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 rounded-0 fs-6" id="jobtitle" placeholder="Job Title" 
                                           name="title">
                                    <label for="jobtitle">Job Title <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-start flex-column bg-white">
                                <label for="budgetUnit" class="fs-7">Job category <span class="text-danger">*</span></label>
                                <select class="border-0 rounded-0 fs-7" id="budgetUnit" name="job_type"
                                    style="width: 100%; height: 100%!important;">';

        $jobcategorys = jobtitle::find_all_active();
        foreach ($jobcategorys as $key => $jobcategory) {
            $createajob .= '   <option value="' . $jobcategory->id . '" >' . $jobcategory->title . '</option>';
        }

        // basic policy article
        $basicArticleRec = Article::find_by_id(22);
        if(!empty($basicArticleRec)){
            $basicArticleTxt = $basicArticleRec->content;
        } else {
            $basicArticleTxt = '
                <ol>
                        <li>The client needs to have account in the platform.</li>
                        <li>The client shall not write contact number, email ID or location which may by pass the engineers from the platform. </li>
                        <li>Client may use AI tool like ChatGPT to write good looking post.</li>
                        <li>Client generally needs to specify the range of budget for the work.</li>
                        <li>Client may post without budget range.</li>
                        <li>Client needs to specify the bid end date.</li>
                        <li>In general, the number of words shall be less than 300 for the post.</li>
                        <li>Client can select maximum 5 bidders (freelancers) after the bid is placed.</li>
                        <li>Client who has posted the job will be added to a Viber / WhatsApp Group by the platform representative where client may put the queries regarding the project.</li>
                        <li>Client shall add the freelancer in the Viber / WhatsApp Group who has bid and selected for the work. Or client may inform the platform about the freelancer who is selected so that the freelancer </li>could be added in the group by the platform representative.
                        <li>Once the platform is informed about the selected freelancer, the platform will ask the license from the freelancer. The platform will also ask for academic certificated needed. If any suspicion </li>is found the client will be notified about the issue.
                        <li>The platform may suspend or blacklist the freelancer if the service is not provided in time.</li>
                        <li>Once, the work is started the client needs to deposit 10% of the project cost in the platform account. </li>
                        <li>If the project terminates in the initial phase without starting the work from client or freelancer then the deposit may be returned to the client by deducting the online transfer fee.</li>
                        <li>If the project terminates in between the project, the amount of refund of the deposit will depend upon the amount of work completed.</li>
                        <li>Unless the first deposit is made the client may not get the first step work from the freelancer.</li>
                        <li>The amount transferred to the freelancer will not be returned by the platform.</li>
                        <li>Client may change the freelancer two times, if not satisfied but any payment transferred to the freelancer will not be refunded.</li>
                        <li>By mutual understanding with the freelancer, client needs to agree on steps of work (minimum step 2, maximum step 4). The client will get the service in these steps. </li>
                        <li>Before receiving the first step work, the client needs to deposit 10% of the project amount in the platform account.</li>
                        <li>Before receiving the second step work, the client needs to deposit the first step work in the freelancer account.</li>
                        <li>Similarly, if there are more than two steps the client needs to pay for earlier work to get the work of next step.</li>
                        <li>The client would rank the freelancer once the work is completed.</li>
                        <li>Vacancy could not be posted in the platform.</li>
                    </ol>
            ';
        }


        $createajob .= '     
        <option value="0" >Other</option>
           </select>
                            </div>
                        </div>
    
                        <div class="row g-3 mt-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control border-0 rounded-0 fs-6" id="deadline"
                                           name="deadline_date">
                                    <label for="deadline">Deadline Date <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 rounded-0 fs-6" id="Currency" placeholder="Currency"
                                           name="currency">
                                    <label for="Currency">Currency <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
    
                        <div class="row g-3 mt-3">
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
                            <div class="col-md-8 minbudget" id="budgetRangeFields">
                                <label for="budgetRangeMin" class="form-label fs-6">Budget Range <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-2">
                                <div class="minbudget">
                                    <input type="number" class="form-control border-0 rounded-0 fs-6 py-3" id="budgetRangeMin"
                                           name="budget_range_low" placeholder="Minimum Value">
                                           </div>
                                    <span>to</span>

                                    <div class="minbudget">
                                    <input type="number" class="form-control border-0 rounded-0 fs-6 py-3" id="budgetRangeMax" 
                                           name="budget_range_high" placeholder="Maximum Value">
                                           </div>
                                </div>
                            </div>
    
                            <!-- Exact Budget -->
                            <div class="col-md-5" id="budgetExactField" style="display: none;">
                                <label for="budgetExact" class="form-label fs-6">Exact Budget <span class="text-danger">*</span></label>
                                <input type="number" class="form-control border-0 rounded-0 fs-6 py-3" id="budgetExact" placeholder="Enter Exact Budget"
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
                            <div class="col-md-12">
                                <label for="jobDescription" class="form-label fs-6">Job Description <span class="text-danger">*</span></label>
                                <textarea class="form-control border-0 rounded-0 fs-6" id="jobDescription" rows="6"
                                          placeholder="Provide a detailed job description" name="content"></textarea>
                            </div>
                        </div>
                        <div id="msgProfile"></div>
                        <div class="mt-3">
                            <a href="https://chatgpt.com/" target="_blank" rel="noopener">Link to ChatGPT</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0 mt-5" id="submit">
                                Create a Job
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-5 order-1 order-lg-2">
                    <div class="bg-white p-1 py-md-0 px-md-4 px-lg-5">
                        <h5 class="fw-bold fs-5 mb-4">Basic policy to post job:</h5>
                        <div class="policy-content fs-7 ">
    
                    '.$basicArticleTxt.'
    
                </div>
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
        <section class="container mt-4">
            <div class="row job-title-content gx-0 gy-4">
                <div class="col-md-9 bg-light p-3 p-md-5">
                    <div>
                        <div class="card-title d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="fs-5 fw-bold text-primary">' . $jobdatas->title . '</h3>
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
                                <span class="fs-7 text-success">' . $bids_txt . ' bids</span>
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
                    <form class="bidding-form mt-4 d-flex flex-column" id="place-bid-form-1">
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
           <div class="d-flex align-items-center justify-content-between gap-1 bg-light bid-amt-error">
            <span class="fw-bold ps-3">NRs.</span>
            <input type="number" class="bg-light form-control fw-bold text-dark border-0 rounded-0 fs-6 py-3" id="bid-amount" placeholder="Enter your amount" id="bid-amount"
                   name="bid-amount" min="' . $jobdatas->budget_range_low . '" max="' . $jobdatas->budget_range_high . '">
           </div>
            ';
        }
        if ($jobdatas->budget_type == 1) {
            $jobdetails .= '
                <input type="number" class="bg-light form-control ps-3 fw-bold text-dark" id="bid-amount" placeholder="NRs. 25000" id="bid-amount"
                       name="bid-amount" value="' . $jobdatas->exact_budget . '" readonly>
            ';
        }

        $roundRating = round($clientdatas->rating,0);
        $noRating = 5 - $roundRating;

        $jobdetails .= '
                        </div>
                        <button type="submit" class="btn bg-pink text-white">Bid</button>
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
                                <span class="fs-4 text-warning">' . str_repeat('★', $roundRating) . str_repeat('☆', $noRating) . '</span>
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
                            <h5 class="fs-7 fw-bold text-dark-blue">' . $relatedjob->title . '</h5>
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
            // $average_bids = bids::get_average_bid_by_job_id($jobdatas->id);
            $jobdetails .= '
                <section class="container mt-4 pt-2">
                    <h5 class="fw-bold fs-6 fs-md-5 my-4">' . $total_bids . ' freelancers are bidding</h5>
                    <div class="row job-review-content">
                        <div class="col-md-9">
            ';
            foreach ($bidsRec as $bidsRow) {
                $freelancerRec = freelancer::find_by_id($bidsRow->freelancer_id);
                // $img = 'https://static-00.iconduck.com/assets.00/user-icon-1024x1024-unb6q333.png';
                $img = BASE_URL . 'template/web/assets/images/user-icon.png';
                if (!empty($freelancerRec->profile_picture)) {
                    $file_path = SITE_ROOT . 'images/freelancer/profile/' . $freelancerRec->profile_picture;
                    if (file_exists($file_path)) {
                        $img = IMAGE_PATH . 'freelancer/profile/' . $freelancerRec->profile_picture;
                    }
                }

                $roundRating = round($freelancerRec->rating,0);
                $noRating = 5 - $roundRating;

                $jobdetails .= '
                            <div class="row bg-light p-3 p-md-5 mt-2 gx-0 hover-effect">
                                <div class="col-12 col-md-3 p-0">
                                    <img src="' . $img . '" alt="' . $freelancerRec->username . '" class="user-icon bg-dark-subtle">
                                </div>
                                <div class="col-8 col-md-6 px-0 px-md-5">
                                    <h5 class="fs-6 fw-bold mt-3">@' . $freelancerRec->username . '</h5>
                                    <p class="fs-7 line-clamp-2 mb-0">' . strip_tags($bidsRow->message) . '</p>
                                    <a onclick="viewmore()" class="fs-7">more</a>
                                </div>
                                <div class="col-3 col-md-3 mt-md-0 ms-3 ms-md-0 mt-3">
                                    <h5 class="fs-7"><strong>' . $bidsRow->currency . ' ' . $bidsRow->bid_amount . '</strong> in ' . $bidsRow->delivery . ' days</h5>
                                    <span class="fs-4 text-warning"> ' . str_repeat('★', $roundRating) . str_repeat('☆', $noRating) . '</span>
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
