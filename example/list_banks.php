<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = '0355f916e30abe355d6ec7fba895f5eb';

$Bank = new \Sopague\Sopague($api_code);
// LISTA DE BANCOS
$request = $Bank->ListBank->allBanks();

print_r($request);

?></pre>