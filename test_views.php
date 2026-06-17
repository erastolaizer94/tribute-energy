<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$views = ['pages.careers','pages.blog','pages.contact','pages.privacy','pages.cookie-policy','pages.gdpr','pages.about','pages.terms'];
foreach ($views as $v) {
    try {
        echo $v . ' : ';
        view($v)->render();
        echo "OK\n";
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage() . "\n";
    }
}
