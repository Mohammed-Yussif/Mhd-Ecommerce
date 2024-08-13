<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('show_breadcrumb')->default(true)->after('viewed')->comment('show breadcrumb');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            //
            $table->dropColumn('show_breadcrumb');
        });
    }
};
