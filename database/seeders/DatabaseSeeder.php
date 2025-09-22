<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusSeeder::class,
            EntityTypeSeeder::class,
            EntitySeeder::class,
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            NumberPaintElementSeeder::class,
            AssignmentTypeSeeder::class,
            BodyworkSeeder::class,
            BrandSeeder::class,
            ColorSeeder::class,
            DocumentTransmittedSeeder::class,
            VehicleGenreSeeder::class,
            VehicleEnergySeeder::class,
            VehicleAgeSeeder::class,
            VehicleModelSeeder::class,
            ExpertiseTypeSeeder::class,
            GeneralStateSeeder::class,
            HourlyRateSeeder::class,
            OtherCostTypeSeeder::class,
            PaintTypeSeeder::class,
            PaintingPriceSeeder::class,
            PaintProductPriceSeeder::class,
            ReceiptTypeSeeder::class,
            ShockPointSeeder::class,
            SupplySeeder::class,
            TechnicalConclusionSeeder::class,
            VehicleStateSeeder::class,
            WorkFeeSeeder::class,
            WorkforceTypeSeeder::class,
            PhotoTypeSeeder::class,
            PaymentTypeSeeder::class,
            PaymentMethodSeeder::class,
            DepreciationTableSeeder::class,
            AscertainmentTypeSeeder::class,
            ClaimNatureSeeder::class,
            RemarkSeeder::class,
            UserActionTypeSeeder::class,
            AppSettingSeeder::class,
        ]);
    }
}
