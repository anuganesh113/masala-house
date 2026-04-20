<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "Laravel Upload Test\n";
echo "==================\n\n";

// Test different paths
$paths = [
    'public_path("uploads")' => public_path('uploads'),
    'Storage::disk("public")->path("")' => storage_path('app/public'),
    'Storage::disk("local")->path("")' => storage_path('app'),
];

foreach ($paths as $name => $path) {
    echo "$name:\n";
    echo "  Path: $path\n";
    echo "  Exists: " . (file_exists($path) ? '✅' : '❌') . "\n";
    echo "  Writable: " . (is_writable($path) ? '✅' : '❌') . "\n";
    
    // Try to write a test file
    $test_file = $path . '/laravel_test_' . time() . '.txt';
    $result = file_put_contents($test_file, 'Laravel test');
    if ($result) {
        echo "  ✅ Can write files\n";
        unlink($test_file); // Clean up
    } else {
        echo "  ❌ Cannot write files\n";
    }
    echo "\n";
}

// Check Laravel's Storage facade
echo "Storage Disk Config:\n";
try {
    $public_path = Storage::disk('public')->path('');
    echo "  Public disk path: $public_path\n";
    echo "  Public disk writable: " . (is_writable($public_path) ? '✅' : '❌') . "\n";
} catch (Exception $e) {
    echo "  ❌ Error: " . $e->getMessage() . "\n";
}
?>
