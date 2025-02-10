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
        $userModel = config('rolesgroup.user_model');  // Get the user model class name
        $userModelInstance = new $userModel();  // Create an instance of the model
        $tableName = $userModelInstance->getTable();  // Get the table name dynamically

        Schema::create('user_groups', function (Blueprint $table) use ($tableName) {
        $table->id();
        $table->timestamps();
        $table->foreignId('user_id')->constrained($tableName, 'id')->onDelete('cascade');
        $table->foreignId('group_id')->constrained('groups','id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_groups');
    }
};
