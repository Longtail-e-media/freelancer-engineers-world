<?php
if (!empty($_SESSION)) {
    $createajob='';
// pr($_SESSION);
    if (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'client' && defined('CREATE_A_JOB')) {

        $record = client::find_by_userid($_SESSION['user_id']);
        $createajob='
        <section class="container">
            <div class="row job-title-content gx-0">
                <div class="col-md-7 bg-light p-5" style="position: sticky; top: 5rem; max-height: max-content;">
                    <form class="client-form" id="createjob">
                    <input type="hidden" name="client_id" value="'.$record->id.'">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 rounded-0 fs-6" id="jobtitle"
                                           placeholder="Job Title" name="job_title">
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
                            <div class="col-md-4">
                                <label for="budgetType" class="form-label fs-6">Budget Type <span
                                        class="text-danger">*</span></label>
                                <div class="d-flex gap-5 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="budget_type"
                                               id="budgetRangeOption" value="range" checked>
                                        <label class="form-check-label" for="budgetRangeOption">Range</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="budget_type"
                                               id="budgetExactOption" value="exact">
                                        <label class="form-check-label" for="budgetExactOption">Exact</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Budget Range -->
                            <div class="col-md-8" id="budgetRangeFields">
                                <label for="budgetRangeMin" class="form-label fs-6">Budget Range <span
                                        class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="number" class="form-control border-0 rounded-0 fs-6" name="budget_range_low"
                                           id="budgetRangeMin"
                                           value="10000">
                                    <span>to</span>
                                    <input type="number" class="form-control border-0 rounded-0 fs-6" name="budget_range_high"
                                           id="budgetRangeMax"
                                           value="50000">
                                </div>
                            </div>
    
                            <!-- Exact Budget -->
                            <div class="col-md-5" id="budgetExactField" style="display: none;">
                                <label for="budgetExact" class="form-label fs-6">Exact Budget <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control border-0 rounded-0 fs-6" id="budgetExact" name="exact_budget"
                                       placeholder="Enter Exact Budget" min="100" max="10000">
                            </div>
    
                            <!-- Budget Unit -->
                           <div class="col-md-3 d-flex align-items-start flex-column">
                                <label for="budgetUnit">Budget Unit <span class="text-danger">*</span></label>
                                <select class="border-0 rounded-0 fs-7 pt-0 mt-2 px-2" id="budgetUnit" name="currency"
                                    style="width: 100%; height: 100%!important;">
                                    <option value="USD" selected>USD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                    <option value="NPR">NPR</option>
                                </select>
                            </div> 
                        </div>
    
    
                        <div class="row g-3 mt-3">
                            <div class="col-md-12">
                                <label for="jobDescription" class="form-label fs-6">Job Description</label>
                                <textarea class="form-control border-0 rounded-0 fs-6" id="jobDescription" rows="6"
                                          placeholder="Provide a detailed job description" name="content"></textarea>
                            </div>
                        </div>
    
                        <div>
                            <button type="submit"
                                    class="btn btn-dark bg-dark-blue text-light px-5 py-2 fs-6 rounded-0 border-0 mt-5" id="submit">
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
        </section>';

    }

    $jVars['module:job-creation'] = $createajob;
}