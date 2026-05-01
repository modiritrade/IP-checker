<!DOCTYPE html>
<html>
<head>
    <title>Visitor IP History</title>
</head>
<body>
<?php
// Function to read IPs from file and return as array
function readIPsFromFile($page) {
    $file_path = "ips_page_" . $page . ".txt";
    if (file_exists($file_path)) {
        $ips = file($file_path, FILE_IGNORE_NEW_LINES);
        return $ips;
    } else {
        return array();
    }
}

// Function to write IPs to file
function writeIPsToFile($ips, $page) {
    $file_path = "ips_page_" . $page . ".txt";
    $file = fopen($file_path, "w");
    fwrite($file, implode("\n", $ips));
    fclose($file);
}

// Get the visitor's IP address
$visitor_ip = $_SERVER['REMOTE_ADDR'];

// Check if current page is set
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Read IPs from file
$ips = readIPsFromFile($page);

// Add current visitor's IP to the list
$ips[] = $visitor_ip;

// Write IPs back to file
writeIPsToFile($ips, $page);

// Count unique IPs and repeated IPs
$unique_ips = count(array_unique($ips));
$repeated_ips = count($ips) - $unique_ips;

// Calculate maximum repeat for repeated IPs
$max_repeat = 0;
if ($repeated_ips > 0) {
    $ip_counts = array_count_values($ips);
    $max_repeat = max($ip_counts);
}

// Calculate average repetition of IPs
$average_repeat = 0;
if ($repeated_ips > 0) {
    // Calculate the sum of repetitions including new repetitions added
    $sum_repeat = array_sum($ip_counts);
    // Subtract the repetitions of new IPs to avoid double counting
    $sum_repeat -= ($repeated_ips - $unique_ips); 
    $average_repeat = $sum_repeat / $repeated_ips;
}

// Sort IP counts array from the most to least quantity
arsort($ip_counts);

// Display IPs
echo "<h2>Visitor IP History - Page $page</h2>";
echo "<p>Unique IPs: $unique_ips | Repeated IPs: $repeated_ips | Maximum repeated: $max_repeat | Average repeated: $average_repeat</p>";
echo "<table border='1'><tr><th>IP</th><th>No</th></tr>";
foreach ($ip_counts as $ip => $count) {
    echo "<tr><td>$ip</td><td>$count</td></tr>";
}
echo "</table>";

// Display page navigation
$total_pages = ceil(count($ips) / 100000);
echo "<p>";
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        echo "$i ";
    } else {
        echo "<a href='?page=$i'>$i</a> ";
    }
}
echo "</p>";
?>
</body>
</html>
