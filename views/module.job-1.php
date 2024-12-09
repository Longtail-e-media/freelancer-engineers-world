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
                <div class="bg-body-secondary p-5 mb-3">
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
    $limit  = 1;
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