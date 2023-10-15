<?php

use App\enums\DaysEnum;
use App\enums\StationsEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table ) {
            $days = [];
            foreach (DaysEnum::cases() as $day) {
                $days[] = $day->name;
            }
            $stations = [];
            foreach (StationsEnum::cases() as $station) {
                $stations[] = $station->name;
            }

            $table->id();
            $table->time('start_at');
            $table->bigInteger('code');
            $table->enum('day',$days);
            $table->time('end_at');
            $table->enum('station', $stations);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
