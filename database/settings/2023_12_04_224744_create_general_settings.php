<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', config('eatci.name'));
        $this->migrator->add('general.contract_unit_price', config('eatci.contract_unit_price'));
        $this->migrator->add('general.support_email', config('eatci.support_email'));
        $this->migrator->add('general.currency', config('eatci.currency'));
        $this->migrator->add('general.pay_tax', config('eatci.pay_tax'));
        $this->migrator->add('general.tax_rate', config('eatci.tax_rate'));
        $this->migrator->add('general.logo_url');
        $this->migrator->add('general.storage_prefix');
        $this->migrator->add('general.contract_reference_prefix', 'ATD');
        $this->migrator->add('general.slip_reference_prefix', 'PROD');
        $this->migrator->add('general.transaction_reference_prefix', 'TRA');
        $this->migrator->add('general.order_reference_prefix', 'ODR');
    }
};
