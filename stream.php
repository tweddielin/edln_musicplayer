<?php
$file = isset($_GET['file']) ? $_GET['file'] : '';
$allowed = ['CosmicCalling.wav', 'jaapstam_v0.5.wav']; // Add your filenames

if (!in_array($file, $allowed)) {
    die('Access denied');
}

$path = '/volume1/music_streaming/' . $file; // Use your actual path
if (!file_exists($path)) {
    die('File not found');
}

// Get file size for Content-Length header
$fileSize = filesize($path);

// Set complete headers
header('Content-Type: audio/wav');
header('Content-Length: ' . $fileSize);
header('Accept-Ranges: bytes');
header('Content-Disposition: inline; filename="' . $file . '"');
header('X-Content-Type-Options: nosniff');

// Output file
readfile($path);
exit;
?>
