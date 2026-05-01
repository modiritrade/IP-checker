<!DOCTYPE html>
<html>
<head>
    <title>Visitor IP Statistics</title>
</head>
<body>
<?php
// Function to read IPs from file and return as array
function readAllIPs() {
    $all_ips = [];
    // Assuming you have stored IPs in separate files for different pages
    // Here, we iterate through all possible page numbers
    for ($page = 1; $page <= 100; $page++) {
        $file_path = "ips_page_" . $page . ".txt";
        if (file_exists($file_path)) {
            $ips = file($file_path, FILE_IGNORE_NEW_LINES);
            $all_ips = array_merge($all_ips, $ips);
        }
    }
    return $all_ips;
}

// Read all IPs
$all_ips = readAllIPs();

// Count unique IPs and repeated IPs
$unique_ips = count(array_unique($all_ips));
$repeated_ips = count($all_ips) - $unique_ips;

// Calculate maximum repeat for repeated IPs
$max_repeat = 0;
if ($repeated_ips > 0) {
    $ip_counts = array_count_values($all_ips);
    $max_repeat = max($ip_counts);
}

// Calculate average repetition of IPs
$average_repeat = 0;
if ($repeated_ips > 0) {
    $sum_repeat = array_sum($ip_counts);
    $average_repeat = $sum_repeat / $repeated_ips;
}

// Display IP statistics
echo "<h2>Visitor IP Statistics</h2>";
echo "<p>Unique IPs: $unique_ips | Repeated IPs: $repeated_ips | Maximum repeated: $max_repeat | Average repeated: $average_repeat</p>";
?>
</body>
</html>
