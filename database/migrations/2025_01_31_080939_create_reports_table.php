<?php

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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->enum("spv", ["SPV 1", "SPV 2", "SPV 3"]);
            $table->enum("shift", ["Shift 1", "Shift 2", "Shift 3"]);
            $table->enum("work_section", ["Shift", "Non Shift", "Utility"]);
            $table->text("report");
            $table->enum("job_by", ["Shift Activity", "Work Order"]);
            $table->text("area");
            $table->text("image");
            $table->enum("remark", ["Done", "Pending"]);
            $table->text("pending_reason");
            $table->text("sparepart_name");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
