<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = 'cb9b8d0f2d518e2fed80e113603fdb0d';

$Bank = new \Sopague\Sopague($api_code);
// Transferir saldo cliente para comerciante
// INFORMAÇÕES DA CONTA PARA QUE IRAR RECEBER A RECARGA
$data = [
    'value' => 10,
    'two_factor' => '102030', // CÓDIGO AUTHENTICADOR
    'email' => 'saviocolodiano@gmail.com',
    'type' => 'cash',
];

$request = $Bank->Recharge->client($data);

print_r($request);

?></pre>