<?php
$pages = ["about","features","pricing","projects","partners","careers"];
foreach ($pages as $v) {
    try {
        view("pages." . $v)->render();
        echo "OK: pages.$v" . PHP_EOL;
    } catch (\Exception $e) {
        echo "FAIL: pages.$v - " . $e->getMessage() . PHP_EOL;
    }
}
