<?php

use Illuminate\Database\Seeder;
use App\WaterPump;
use App\WaterPumpInfrastructure;

class WaterPumpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat Water Pump
        $waterPump1 = new WaterPump();
        $waterPump1->name = "Pompa Air 2022";
        $waterPump1->type = "JKL 12";
        $waterPump1->status = "Terpasang"; // Terpasang, Belum Terpasang, Perbaikan
        $waterPump1->save();

        // Membuat Water Pump
        $waterPump2 = new WaterPump();
        $waterPump2->name = "Pompa Air 2023";
        $waterPump2->type = "JKL 13";
        $waterPump2->status = "Terpasang"; // Terpasang, Belum Terpasang, Perbaikan
        $waterPump2->save();

        // Membuat Water Pump
        $waterPump3 = new WaterPump();
        $waterPump3->name = "Pompa Air 2024";
        $waterPump3->type = "JKL 14";
        $waterPump3->status = "Belum Terpasang"; // Terpasang, Belum Terpasang, Perbaikan
        $waterPump3->save();

        // Membuat Water Pump
        $waterPump3 = new WaterPump();
        $waterPump3->name = "Pompa Air 2025";
        $waterPump3->type = "JKL 14";
        $waterPump3->status = "Perbaikan"; // Terpasang, Belum Terpasang, Perbaikan
        $waterPump3->save();

        // Membuat Water Pump infras
        $waterPumpInfras = new WaterPumpInfrastructure();
        $waterPumpInfras->name = "Tirto Weleri";
        $waterPumpInfras->location = "Weleri Kendal";
        $waterPumpInfras->capacity = 1000;
        $waterPumpInfras->swl_dwl = '13 / 100';
        $waterPumpInfras->mt = 200;
        $waterPumpInfras->kw = 120;
        $waterPumpInfras->overhead = 30;
        $waterPumpInfras->lt = 12000;
        $waterPumpInfras->water_pump_id = $waterPump1->id;
        $waterPumpInfras->save();

        $waterPumpInfras2 = new WaterPumpInfrastructure();
        $waterPumpInfras2->name = "Tirto Rowosari";
        $waterPumpInfras2->location = "Rowosari Kendal";
        $waterPumpInfras2->capacity = 1000;
        $waterPumpInfras2->swl_dwl = '12 / 100';
        $waterPumpInfras2->mt = 200;
        $waterPumpInfras2->kw = 120;
        $waterPumpInfras2->overhead = 30;
        $waterPumpInfras2->lt = 12000;
        $waterPumpInfras2->water_pump_id = $waterPump2->id;
        $waterPumpInfras2->save();

    }
}
