<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$request = Illuminate\Http\Request::create('/chat', 'POST', ['message' => 'apa saja yang pratama design sajikan?']);
$controller = new App\Http\Controllers\ChatbotController();

$start = microtime(true);
$response = $controller->chat($request);
$end = microtime(true);

echo "Time taken: " . ($end - $start) . " seconds\n";
echo "Response: " . $response->getContent() . "\n";
