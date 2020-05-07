<?php

namespace Sopague;

use \Sopague\Banks\Banks;
use \Sopague\Config\Callback;
use \Sopague\Consult\Consult;
use \Sopague\Deposit\Deposit;
use \Sopague\Exception\ParameterError;
use \Sopague\Recharge\Recharge;

class Sopague
{
    const URL = 'https://api.sopague.com/';

    private $api_code = null;
    public function __construct($api_code)
    {
        if (is_null($api_code)) {
            throw new ParameterError("Public Key required.");
        } else {
            $this->code = $api_code;
        }

        $this->Callback = new Callback($this);
        $this->ListBank = new Banks($this);
        $this->Recharge = new Recharge($this);
        $this->Deposit = new Deposit($this);
        $this->Consult = new Consult($this);
    }

}
