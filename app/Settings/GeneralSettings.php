<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;

    public string $support_email;

    public string $contract_unit_price;

    public string $currency;

    public bool $pay_tax;

    public float $tax_rate;

    public ?string $storage_prefix;

    public ?string $logo_url;

    public string $contract_reference_prefix;

    public int $contract_reference_length;

    public string $slip_reference_prefix;

    public string $transaction_reference_prefix;

    public string $order_reference_prefix;

    public static function group(): string
    {
        return 'general';
    }
}
