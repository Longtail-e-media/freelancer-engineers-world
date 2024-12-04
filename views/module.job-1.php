<?php

/**
 *      Homepage job list (show the newest first)
 */
$home_job = '';

if (defined('HOME_PAGE')) {
    $jobs = jobs::get_homepage_jobs('4');

    if (!empty($jobs)) {
        foreach ($jobs as $job) {
            $budget_text = ($job->budget_type == 0) ? $job->currency . ' ' . $job->exact_budget : $job->currency . ' ' . $job->budget_range_low . ' - ' . $job->budget_range_high;
            $bids_txt = Bids::find_total_bids($job->id);
            $home_job .= '
                <div class="bg-body-secondary p-5 mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="fs-6 fw-bold">' . $job->job_title . '</h5>
                            <p class="fs-6">Bid End Date: ' . date('M d, Y', strtotime($job->deadline_date)) . '</p>
                        </div>
                        <div>
                            <h5 class="fs-6 fw-bold">' . $budget_text . '</h5>
                            <p class="fs-6">' . $bids_txt . ' bids</p>
                        </div>
                    </div>
                    <div class="py-4">' . $job->content . '</div>
                </div>
            ';
        }
    }
    else {
        $home_job .= '
            <h3>No Jobs Available</h3>
        ';
    }

}

$jVars['module:jobs:home-list'] = $home_job;


/**
 *      Jobs list page
 */
$list_body = '';

if(defined('JOB_LIST_PAGE')){
    $jobs = jobs::get_homepage_jobs('');

    // TO-DO
}

$jVars['module:jobs:job-list'] = $list_body;