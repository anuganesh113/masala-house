<?php
$base_upload_dir = 'uploads/';
echo "Testing write permissions in all subfolders of: " . realpath($base_upload_dir) . "\n";
echo str_repeat("=", 60) . "\n\n";

// Get all subdirectories
$subfolders = glob($base_upload_dir . '*', GLOB_ONLYDIR);

if (empty($subfolders)) {
    echo "No subfolders found in uploads/\n";
    // Test the main uploads folder
    testFolder($base_upload_dir);
} else {
    echo "Found " . count($subfolders) . " subfolders:\n";
    foreach ($subfolders as $folder) {
        testFolder($folder);
    }
}

function testFolder($folder) {
    $test_file = $folder . '/test_' . date('Y-m-d_H-i-s') . '_' . uniqid() . '.txt';
    $folder_name = basename($folder);
    
    echo "📁 Testing: $folder_name\n";
    echo "   Path: $folder\n";
    
    // Check if folder exists
    if (!file_exists($folder)) {
        echo "   ❌ Folder does not exist!\n\n";
        return;
    }
    
    // Check permissions
    $perms = substr(sprintf('%o', fileperms($folder)), -4);
    $is_writable = is_writable($folder);
    
    echo "   Permissions: $perms\n";
    echo "   Writable: " . ($is_writable ? "✅ YES" : "❌ NO") . "\n";
    
    if ($is_writable) {
        // Try to write a file
        $content = "Test file created at " . date('Y-m-d H:i:s') . "\n";
        $content .= "Created by: " . get_current_user() . "\n";
        $content .= "PHP User: " . (function_exists('exec') ? exec('whoami') : 'unknown') . "\n";
        
        $result = file_put_contents($test_file, $content);
        
        if ($result !== false) {
            echo "   ✅ Successfully wrote test file\n";
            echo "   📄 File: " . basename($test_file) . "\n";
            echo "   Size: " . $result . " bytes\n";
            
            // Verify file exists
            if (file_exists($test_file)) {
                echo "   ✅ File verification successful\n";
            }
        } else {
            echo "   ❌ Failed to write file\n";
            $error = error_get_last();
            echo "   Error: " . ($error['message'] ?? 'Unknown error') . "\n";
        }
    } else {
        echo "   ❌ Cannot write to this folder\n";
    }
    
    echo "\n";
}

// Summary
echo str_repeat("=", 60) . "\n";
echo "Test complete!\n";

// Check disk space
$free_space = disk_free_space($base_upload_dir);
if ($free_space !== false) {
    echo "Free disk space: " . round($free_space/1024/1024, 2) . " MB\n";
}
?>
