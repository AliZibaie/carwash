<?php

use App\enums\DaysEnum;
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
            $table->id();
            $table->time('start_at');
            $table->integer('code');
            $table->enum('day',$days );
            $table->time('end_at');
            $table->enum('place_id', [1, 2]);
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
