<?php
$upload_dir = 'uploads/';
$test_file = $upload_dir . 'test_' . time() . '.txt';

echo "Testing write to: " . realpath($upload_dir) . "\n\n";

// Check if directory exists
if (!file_exists($upload_dir)) {
    die("Directory does not exist!");
} else {
    echo "✓ Directory exists\n";
}

// Check if it's writable
if (!is_writable($upload_dir)) {
    echo "✗ Directory is NOT writable\n";
    echo "Permissions: " . substr(sprintf('%o', fileperms($upload_dir)), -4) . "\n";
    echo "Owner: " . fileowner($upload_dir) . " (PHP user ID: " . getmyuid() . ")\n";
} else {
    echo "✓ Directory IS writable\n";
}

// Try to write a file
$result = file_put_contents($test_file, "Test write at " . date('Y-m-d H:i:s'));

if ($result === false) {
    $error = error_get_last();
    echo "✗ Failed to write file: " . ($error['message'] ?? 'Unknown error') . "\n";
} else {
    echo "✓ Successfully wrote " . $result . " bytes to: " . $test_file . "\n";
    // Try to read it back
    if (file_exists($test_file)) {
        echo "✓ File exists and can be read\n";
        echo "Content: " . file_get_contents($test_file) . "\n";
    }
}

// Check if there's a disk quota issue
$disk_free = disk_free_space($upload_dir);
if ($disk_free === false) {
    echo "✗ Cannot check disk free space\n";
} else {
    echo "✓ Disk space: " . round($disk_free/1024/1024, 2) . "MB free\n";
    if ($disk_free < 1024*1024) {
        echo "⚠ Low disk space: " . round($disk_free/1024/1024, 2) . "MB free\n";
    }
}

// Check open_basedir
$openbasedir = ini_get('open_basedir');
if ($openbasedir) {
    echo "\nopen_basedir is active, restricting access to:\n";
    echo str_replace(':', "\n", $openbasedir) . "\n";
    
    $upload_path = realpath($upload_dir);
    $in_path = false;
    foreach (explode(':', $openbasedir) as $path) {
        if (strpos($upload_path, rtrim($path, '/')) === 0) {
            $in_path = true;
            break;
        }
    }
    if (!$in_path) {
        echo "✗ Upload path is NOT within open_basedir!\n";
    }
} else {
    echo "\n✓ open_basedir is not active\n";
}
?>
