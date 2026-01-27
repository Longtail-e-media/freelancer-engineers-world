<?php
require_once('../includes/initialize.php');

// Query to fetch freelancer names and emails
$records = $db->query("SELECT * FROM tbl_users WHERE group_id=4 AND id<>2 ORDER BY sortorder DESC");
// Adjust table name and conditions based on your actual database structure

$num = $db->num_rows($records);

// Set filename
$file = "freelancers_emails_" . date('Y_m_d_H_i_s') . ".csv";

// Set headers for CSV download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment;filename="' . $file . '"');
header('Cache-Control: max-age=0');

// Create file pointer connected to output stream
$output = fopen('php://output', 'w');

// Add UTF-8 BOM for Excel compatibility
fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

// Add CSV column headers
fputcsv($output, array('S.N.', 'Full Name', 'Email Address'));

// Add data rows
$sn = 1;
if ($num > 0) {
    while ($row = $db->fetch_object($records)) {
        fputcsv($output, array(
            $sn++,
            $row->first_name . ' ' . $row->last_name,
            $row->email
        ));
    }
}

// Close file pointer
fclose($output);

exit;