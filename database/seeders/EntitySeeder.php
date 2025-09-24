<?php

namespace Database\Seeders;

use App\Models\Entity;
use App\Models\Status;
use App\Models\EntityType;
use App\Enums\EntityCodeEnum;
use Illuminate\Database\Seeder;
use App\Actions\Entity\CreateEntityAction;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::CEACI->value,
            'name' => 'CEACI',
            'prefix' => null,
            'suffix' => null,
            'email' => 'support@ceaci.com',
            'address' => null,
            'telephone' => null,
            'service_description' => null,
            'footer_description' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::MAIN_ORGANIZATION)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::LCA->value,
            'name' => 'LCA',
            'prefix' => null,
            'suffix' => 'LCA',
            'email' => 'support@lca.com',
            'address' => null,
            'telephone' => null,
            'service_description' => null,
            'footer_description' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::ORGANIZATION)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::BCA_CI->value,
            'name' => 'BCA-CI',
            'prefix' => null,
            'suffix' => 'BCA',
            'email' => 'support@bca-ci.com',
            'address' => null,
            'telephone' => null,
            'service_description' => null,
            'footer_description' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::ORGANIZATION)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::SGA->value,
            'name' => 'SGA',
            'prefix' => null,
            'suffix' => 'SGA',
            'email' => 'support@sga.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::ORGANIZATION)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::NSIA->value,
            'name' => 'NSIA',
            'prefix' => 'A',
            'suffix' => null,
            'email' => 'support@nsia.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::AXA->value,
            'name' => 'AXA',
            'prefix' => 'B',
            'suffix' => null,
            'email' => 'support@axa.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::SANLAM_ALLIANZ->value,
            'name' => 'SANLAM-ALLIANZ',
            'prefix' => 'C',
            'suffix' => null,
            'email' => 'support@sanlamallianz.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::GNA->value,
            'name' => 'GNA',
            'prefix' => 'D',
            'suffix' => null,
            'email' => 'support@gna.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::ATLANTIQUE->value,
            'name' => 'ATLANTIQUE',
            'prefix' => 'E',
            'suffix' => null,
            'email' => 'support@atlantique.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::COMAR->value,
            'name' => 'COMAR',
            'prefix' => 'F',
            'suffix' => null,
            'email' => 'support@comar.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::AFG->value,
            'name' => 'AFG',
            'prefix' => 'G',
            'suffix' => null,
            'email' => 'support@afg.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::ATLANTA->value,
            'name' => 'ATLANTA',
            'prefix' => 'H',
            'suffix' => null,
            'email' => 'support@atlanta.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::ACTIVA->value,
            'name' => 'ACTIVA',
            'prefix' => 'I',
            'suffix' => null,
            'email' => 'support@activa.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::SIDAM->value,
            'name' => 'SIDAM',
            'prefix' => 'J',
            'suffix' => null,
            'email' => 'support@sidam.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::ASCOMA->value,
            'name' => 'ASCOMA',
            'prefix' => 'K',
            'suffix' => null,
            'email' => 'support@ascoma.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::OLEA->value,
            'name' => 'OLEA',
            'prefix' => 'L',
            'suffix' => null,
            'email' => 'support@olea.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::WTW->value,
            'name' => 'Willis Towers Watson',
            'prefix' => 'M',
            'suffix' => null,
            'email' => 'support@wtw.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::INSURER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        app(CreateEntityAction::class)->execute([
            'code' => EntityCodeEnum::CFAO->value,
            'name' => 'CFAO',
            'prefix' => 'N',
            'suffix' => null,
            'email' => 'support@cfao.com',
            'address' => null,
            'telephone' => null,
            'entity_type_code' => EntityType::firstWhere('code', \App\Enums\EntityTypeEnum::REPAIRER)->code,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
    }
}
