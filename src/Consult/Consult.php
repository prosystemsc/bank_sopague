<?php

namespace Sopague\Consult;

use GuzzleHttp\Client as Client;
use \Sopague\Exception\HttpError;
use \Sopague\Sopague;

class Consult
{
    public function __construct(Sopague $Sopague)
    {
        $this->public_id = $Sopague->code;
    }

    public function merchant()
    {
        $url = Sopague::URL;
        $client = new Client(['base_uri' => $url, 'http_errors' => false]);
        $headers = [
            'Content-Type: application/json',
        ];
        $data = ['public_id' => $this->public_id];
        $params = [
            'headers' => $headers,
            'json' => $data,
        ];
        $response = $client->get('user/info', $params);

        $body = json_decode($response->getBody());
        if ($response->getStatusCode() == 200) {
            return $body;
        } else {
            if (isset($body->message)) {
                return $body;
            } else {
                throw new HttpError("Unable to decode JSON response from Sopague: HTTP " . $response->getStatusCode());
            }
        }

    }

    public function ted($reference)
    {
        $url = Sopague::URL;
        $client = new Client(['base_uri' => $url, 'http_errors' => false]);

        $response = $client->get('recharge/ted/' . $reference);

        $body = json_decode($response->getBody());
        if ($response->getStatusCode() == 200) {
            return $body;
        } else {
            if (isset($body->message)) {
                return $body;
            } else {
                throw new HttpError("Unable to decode JSON response from Sopague: HTTP " . $response->getStatusCode());
            }
        }

    }

}
