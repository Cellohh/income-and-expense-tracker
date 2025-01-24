<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveExpenseNameFromExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('expenses', 'expense_name')) {
            Schema::table('expenses', function (Blueprint $table) {
                $table->dropColumn('expense_name'); // Remove the expense_name column
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->string('expense_name')->nullable(); // Add the expense_name column back
        });
    }
}

