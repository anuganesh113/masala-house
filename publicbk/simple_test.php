<?php
$upload_dir = 'uploads/';
$test_file = $upload_dir . 'test_' . time() . '.txt';

echo "Current directory: " . __DIR__ . "\n";
echo "Full upload path: " . realpath($upload_dir) . "\n\n";

// Check if we can write
if (is_writable($upload_dir)) {
    echo "✓ Directory is writable\n";
    
    // Try to write
    $result = file_put_contents($test_file, "Test");
    if ($result !== false) {
        echo "✓ Successfully wrote test file\n";
        echo "File created: " . $test_file . "\n";
    } else {
        echo "✗ Failed to write file\n";
        $error = error_get_last();
        echo "Error: " . ($error['message'] ?? 'Unknown') . "\n";
    }
} else {
    echo "✗ Directory is NOT writable\n";
}

// Check disk space
$free = disk_free_space($upload_dir);
if ($free !== false) {
    echo "Free space: " . round($free/1024/1024, 2) . " MB\n";
}
?>
