<?php

namespace App\Currency\Local;

use App\Currency\Option\WalletOption;

class Inr extends LocalCurrency
{
    public function id(): string
    {
        return 'local_inr';
    }

    public function walletId(): string
    {
        return 'inr';
    }

    public function name(): string
    {
        return 'INR';
    }

    public function alias(): string
    {
        return 'inr';
    }


    public function conversionID(): string
    {
        return 1;
    }

    public function displayName(): string
    {
        return 'INR';
    }

    public function icon(): string
    {
        return 'inr';
    }

    public function style(): string
    {
        return '#bfbbbb';
    }
    public function iconId(): string
    {
        return 'https://games.cdn4.dk/currencyicons_3d_3/BNB.png?w=64&h=64';
    }

    protected function options(): array
    {
        return [
            new class extends WalletOption {
                public function id()
                {
                    return 'bulkcash_usd';
                }

                public function name(): string
                {
                    return 'USD';
                }
            },
        ];
    }

    public function tokenPrice()
    {
        return 0.013;
    }
}
