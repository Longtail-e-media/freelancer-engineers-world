<?php

/**
 *      Homepage job list (show the newest first)
 */
$home_job = '';

if (defined('HOME_PAGE')) {
    $jobs = jobs::get_homepage_jobs('4');

    if (!empty($jobs)) {
        foreach ($jobs as $job) {
            $budget_text = ($job->budget_type == 1) ? $job->currency . ' ' . $job->exact_budget : $job->currency . ' ' . $job->budget_range_low . ' - ' . $job->budget_range_high;
            $bids_txt = Bids::find_total_bids($job->id);
            $home_job .= '
                <div class="bg-body-secondary p-4 p-md-5 mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="' . BASE_URL . 'job/' . $job->slug . '" class="text-decoration-none text-primary">
                                <h5 class="fs-6 fw-bold">' . $job->title . '</h5>
                            </a>
                            <p class="fs-7">Bid End Date: ' . date('M d, Y', strtotime($job->deadline_date)) . '</p>
                        </div>
                        <div>
                            <h5 class="fs-6 fw-bold">' . $budget_text . '</h5>
                            <p class="fs-6 text-success">' . $bids_txt . ' bids</p>
                        </div>
                    </div>
                    <div class="py-4">' . $job->content . '</div>
                </div>
            ';
        }
    } else {
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

if (defined('JOB_LIST_PAGE')) {
    $page = (isset($_REQUEST["pageno"]) and !empty($_REQUEST["pageno"])) ? $_REQUEST["pageno"] : 1;

    $sql    = "SELECT * FROM tbl_jobs WHERE status='1' ORDER BY sortorder DESC";
    $limit  = 8;
    $total  = $db->num_rows($db->query($sql));
    $startpoint = ($page * $limit) - $limit;
    $sql    .= " LIMIT " . $startpoint . "," . $limit;
    $query  = $db->query($sql);
    $Records = jobs::find_by_sql($sql);

    if (!empty($Records)) {
        $list_body .= '
            <form action="search" method="post" id="searchForm" class="input-group input-group-md bg-body-secondary p-2 mb-4 flex-wrap align-items-center flex-lg-nowrap gap-2">
                <input type="text" class="form-control rounded-0 py-3" name="searchkey" placeholder="Search by Keyword">
                <button type="submit" class="bg-danger-subtle text-dark text-decoration-none py-3 px-3 px-lg-5 border-0 outline-0">Search</button>
                <nav aria-label="Page navigation" class="">
                    ' . get_front_pagination_new($total, $limit, $page, BASE_URL . 'jobs') . '
                </nav>
            </form>
            <div class="jobs-container">
        ';

        foreach ($Records as $key => $RecRow) {
            $budget_text = ($RecRow->budget_type == 1) ? $RecRow->currency . ' ' . $RecRow->exact_budget : $RecRow->currency . ' ' . $RecRow->budget_range_low . ' - ' . $RecRow->budget_range_high;
            $bids_txt = Bids::find_total_bids($RecRow->id);
            $list_body .= '
                <div class="bg-body-secondary p-3 p-sm-4 p-lg-4 mb-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-between gap-3 gap-sm-0">
                        <div class="mb-2 mb-sm-0">
                            <a href="' . BASE_URL . 'job/' . $RecRow->slug . '" class="text-decoration-none text-dark">
                                <h5 class="fs-5 fw-bold mb-1 text-primary">' . $RecRow->title . '</h5>
                            </a>
                            <p class="fs-7 mb-0">Bid End Date: ' . date('M d, Y', strtotime($RecRow->deadline_date)) . '</p>
                        </div>
                        <div>
                            <h5 class="fs-6 fw-bold mb-1">' . $budget_text . '</h5>
                            <p class="fs-6 mb-0 text-success">' . $bids_txt . ' bids</p>
                        </div>
                    </div>
                    <div class="py-3 py-lg-4">
                        <p class="fs-7 mb-0">' . $RecRow->content . '</p>
                    </div>
                </div>
            ';
        }

        $list_body .='
            </div>
            <div class="input-group input-group-md">
                <nav aria-label="Page navigation" class="">
                    ' . get_front_pagination_new($total, $limit, $page, BASE_URL . 'jobs') . '
                </nav>
            </div>
        ';
    } else {
        $list_body .= '
            <h3>No Jobs Available</h3>
        ';
    }

}

$jVars['module:jobs:job-list'] = $list_body;


/**
 *      Job Search Page
 */
$search_body = '';

if (defined('JOB_SEARCH_PAGE')) {
    if (isset($_REQUEST)) {
        foreach ($_REQUEST as $key => $val) {
            $$key = $val;
        }
    }

    if (!empty($searchkey)) {
        $sql = "SELECT j.*
            FROM tbl_jobs as j
            INNER JOIN tbl_jobtitle as jt ON j.job_type = jt.id
            WHERE j.status=1 AND
            ( j.title LIKE '%" . $searchkey . "%' OR
              jt.title LIKE '%" . $searchkey . "%' ) ";
    } else {
        $sql = "SELECT * FROM tbl_jobs WHERE status=1 ORDER BY sortorder DESC";
    }

    $res = $db->query($sql);
    $total = $db->num_rows($res);

    if ($total > 0) {
        $search_body .= '
            <div class="input-group input-group-md bg-body-secondary mb-4">
                <p class="p-4 pb-2">
                    <em>Search results for "<span>' . (!empty($searchkey) ? $searchkey : '') . '</span>"</em>
                </p>
            </div>
            <div class="jobs-container">
        ';
        while ($rows = $db->fetch_object($res)) {
            $budget_text = ($rows->budget_type == 1) ? $rows->currency . ' ' . $rows->exact_budget : $rows->currency . ' ' . $rows->budget_range_low . ' - ' . $rows->budget_range_high;
            $bids_txt = Bids::find_total_bids($rows->id);
            $search_body .= '
                <div class="lazy"><!--
                    <div class="bg-body-secondary p-3 p-sm-4 p-lg-4 mb-3">
                        <div class="d-flex flex-column flex-sm-row justify-content-between gap-3 gap-sm-0">
                            <div class="mb-2 mb-sm-0">
                                <a href="' . BASE_URL . 'job/' . $rows->slug . '" class="text-decoration-none text-dark">
                                    <h5 class="fs-5 fw-bold mb-1">' . $rows->title . '</h5>
                                </a>
                                <p class="fs-6 mb-0">Bid End Date: ' . date('M d, Y', strtotime($rows->deadline_date)) . '</p>
                            </div>
                            <div>
                                <h5 class="fs-6 fw-bold mb-1">' . $budget_text . '</h5>
                                <p class="fs-6 mb-0">' . $bids_txt . ' bids</p>
                            </div>
                        </div>
                        <div class="py-3 py-lg-4">
                            <p class="fs-7 mb-0">
                                ' . $rows->content . '
                            </p>
                        </div>
                    </div>
                --></div>
            ';
        }
        $search_body .= '
            </div>
        ';
    } else {
        $search_body .= '
            <div class="input-group input-group-md bg-body-secondary mb-4">
                <p class="p-4 pb-2">
                    <em>Search results for "<span>' . (!empty($searchkey) ? $searchkey : '') . '</span>"</em>
                </p>
            </div>
            <div class="jobs-container">
                <h3>No Jobs Found</h3>
            </div>
        ';
    }

}

$jVars['module:jobs:search-list'] = $search_body;



/**
 *      Edit Bid Page
 */
$edit_bid = '';

if(defined('EDIT_BID')) {
    $encoded_id = !empty($_REQUEST['code']) ? $_REQUEST['code'] : '';
    $decoded_id = base64_decode($encoded_id);

    if (!empty($decoded_id) and is_numeric($decoded_id)) {
        $bidRec     = bids::find_by_id($decoded_id);
        $jobdatas   = jobs::find_by_id($bidRec->job_id);
        $clientdatas = client::find_by_id($jobdatas->client_id);

        $totalbids = bids::find_total_bids($jobdatas->id);

        if ($jobdatas->budget_type == 1) {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->exact_budget . '</h4>';
        } else {
            $budget = '<h4 class="fs-6 fw-bold">' . $jobdatas->currency . ' ' . $jobdatas->budget_range_low . ' - ' . $jobdatas->budget_range_high . '</h4>';
        }

        $roundRating = round($clientdatas->rating,0);
        $noRating = 5 - $roundRating;

        if (!empty($bidRec)) {
            $edit_bid = '
                <main class="">
                    <!-- Header -->
                    <div class="bg-dark-blue">
                        <div class="container">
                            <h1 class="text-light py-4 py-lg-5 fw-light fs-2 fs-lg-1">
                                Edit Bid
                            </h1>
                        </div>
                    </div>
            
                    <!-- Main Content -->
                    <section class="container">
                        <a href="' . BASE_URL . 'dashboard" class="text-dark fs-7 d-block mb-3 mb-lg-5">
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
                                                    <h3 class="fs-5 fw-bold mb-2 mb-sm-0">' . $jobdatas->title . '</h3>
                                                    <span class="fs-7">End Date: ' . date("M d Y", strtotime($jobdatas->deadline_date)) . '</span>
                                                </div>
                                                <div class="text-start text-sm-end">
                                                        ' . $budget . '
                                                    <span class="fs-7">'.$totalbids.' bids</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <!-- Review Section -->
                                    <div class="card-body mt-4 mt-lg-5">
                                    <form id="bidForm">
                                        <input type="hidden" name="job_id" value="' . $bidRec->id . '">
                                        <div class="mb-3">
                                            <label for="bid_amount" class="form-label fw-semibold">Bid Amount (' . $jobdatas->currency . ') <span class="text-danger">*</span></label>
            ';

            if ($jobdatas->budget_type == 0) {
                $edit_bid .= '
                    <input type="number" class="form-control bg-white" id="bid-amount" placeholder="Enter your amount" id="bid_amount"
                           name="bid_amount" min="' . $jobdatas->budget_range_low . '" max="' . $jobdatas->budget_range_high . '" value="' . $bidRec->bid_amount . '">
                ';
            }
            if ($jobdatas->budget_type == 1) {
                $edit_bid .= '
                    <input type="number" class="form-control bg-white" id="bid_amount" placeholder="' . $jobdatas->exact_budget . '" name="bid_amount" value="' . $bidRec->bid_amount . '" readonly>
                ';
            }

            $edit_bid .= '
                                        </div>
                                        <div class="mb-3">
                                            <label for="deliveryTime" class="form-label fw-semibold">Delivery Time (in days) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="delivery" name="delivery"
                                                   placeholder="Number of days to complete the project"
                                                   value="' . $bidRec->delivery . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bidMessage" class="form-label font-semibold">Message <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="message" name="message" rows="4"
                                                      placeholder="Add a message for the client...">' . $bidRec->message . '</textarea>
                                        </div>
                                        <div class="alert alert-primary">
                                            <strong>Note:</strong> You will get the bid amount after deducting the service charge.
                                        </div>
                                        <div id="bidMsg" class="alert alert-success" style="display: none;"></div>
                                        <button class="btn btn-dark bg-dark-blue text-light px-4 py-2 fs-6 rounded-0 border-0 w-auto" 
                                            type="submit" id="submit">
                                            Submit Bid
                                        </button>
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
                                            ' . $clientdatas->current_address . '
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
                </main>
            ';
        } else {
            $edit_bid = 'Job bid not found !';
        }
    } else {
        $edit_bid = 'Job bid not found !';
    }

}

$jVars['module:jobs:edit-bid'] = $edit_bid;