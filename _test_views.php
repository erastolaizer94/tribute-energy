<?php
require __DIR__ . "/vendor/autoload.php";
$app = require __DIR__ . "/bootstrap/app.php";
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());
foreach (["about","features","pricing","projects","partners","careers"] as $v) {
    try {
        view("pages." . $v)->render();
        echo "OK: pages.$v" . PHP_EOL;
    } catch (\Exception $e) {
        echo "FAIL: pages.$v - " . $e->getMessage() . PHP_EOL;
    }
}
