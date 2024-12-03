<?php

$faq_details = '';

if (defined('FAQ_PAGE')) {

    $faqs = Faq::find_all();

    if (!empty($faqs)) {
        foreach ($faqs as $i => $faq) {
            $collapsed = ($i == 0) ? '' : 'collapsed';
            $show = ($i == 0) ? 'show' : '';
            $count = $i + 1;
            $faq_details .= '
                <div class="accordion-item bg-light">
                    <h2 class="accordion-header">
                        <button class="accordion-button fs-6 fw-medium py-4 ' . $collapsed . '" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq-' . $faq->id . '" aria-expanded="false" aria-controls="faq-' . $faq->id . '">
                            ' . $count . '. ' . $faq->title . '
                        </button>
                    </h2>
                    <div id="faq-' . $faq->id . '" class="accordion-collapse collapse ' . $show . '" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        ' . $faq->content . '
                        </div>
                    </div>
                </div>
            ';
        }
    } else {
        $faq_details .= '<h3 class="text-center p-4">No FAQ Found</h3>';
    }
}

$jVars['module:faq:details'] = $faq_details;


$faq_details = '';

if (defined('HOME_PAGE')) {

    $faqs = Faq::find_few(3);

    if (!empty($faqs)) {
        foreach ($faqs as $i => $faq) {
            $collapsed = ($i == 0) ? 'mad-panels-active' : '';
            $show = ($i == 0) ? 'show' : '';
            $faq_details .= '
                <dt class="mad-panels-title ' . $collapsed . '">
                    <button id="' . $faq->id . '-button" type="button" aria-expanded="false" aria-controls="' . $faq->id . '" aria-disabled="false">
                    ' . $faq->title . '
                    </button>
                </dt>
                <dd id="' . $faq->id . '" class="mad-panels-definition">
                    <p> ' . $faq->content . '</p>
                </dd>
            ';
        }
    } else {
        $faq_details .= '<h3 class="text-center p-4">No FAQ Found</h3>';
    }
}

$jVars['module:faq:details-homepage'] = $faq_details;
$jVars['module:faqlink'] = BASE_URL . 'faq';