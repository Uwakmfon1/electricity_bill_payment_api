<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::create([
            'name' => 'KEDCO',
            'logo_url' => 'https://kedco.ng/public/wp-content/uploads/2024/04/kedco_logokk.png',
            'description' => 'Kano Electricity Distribution Company Plc',
        ]);

        Provider::create([
            'name' => 'PHED',
            'logo_url' => 'https://phed.com.ng/assets/image001.png',
            'description' => 'Port Harcourt Electricity Distribution Company',
        ]);

        Provider::create([
            'name' => 'EKEDC',
            'logo_url' => 'https://ekedp.com/front/assets/images/resources/logo-1.png',
            'description' => 'Eko Electricity Distribution Company',
        ]);
    }
}
