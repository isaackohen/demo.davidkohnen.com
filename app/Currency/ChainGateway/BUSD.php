<?php

namespace App\Currency\–°hainGateway;

class BUSD extends –°hainGatewaySupport
{
    public function id(): string
    {
        return 'cg_busd';
    }

    public function walletId(): string
    {
        return 'busd';
    }

    public function name(): string
    {
        return 'BUSD';
    }

    public function alias(): string
    {
        return 'busd';
    }

    public function displayName(): string
    {
        return 'BUSD';
    }

    public function style(): string
    {
        return '#4a90e2';
    }

    public function tokenPrice()
    {
        return '1.00';
    }
}
