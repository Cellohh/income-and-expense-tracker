<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            if (!Schema::hasColumn('incomes', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
    
            if (!Schema::hasColumn('incomes', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }
    
    
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
    
};
