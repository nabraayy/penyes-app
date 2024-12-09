<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear los roles iniciales (Admin y User).
     */
    private function createRoles()
    {
        Role::insert([
            ['name' => 'Admin'],
            ['name' => 'User'],
        ]);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Crear la tabla 'roles'
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insertar roles predeterminados (Admin, User) en la tabla 'roles'
        $this->createRoles();

        // Agregar la columna 'role_id' en la tabla 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('password')->default(2); // Referencia al rol 'User' por defecto
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); // Clave foránea con relación a 'roles'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Eliminar la columna 'role_id' de la tabla 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);  // Eliminar la restricción de clave foránea
            $table->dropColumn('role_id');     // Eliminar la columna 'role_id'
        });

        // Eliminar la tabla 'roles'
        Schema::dropIfExists('roles');
    }
};
