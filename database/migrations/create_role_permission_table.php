Schema::create('role_permission', function (Blueprint $table) {
    $table->id();
    $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
    $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
    $table->timestamps();
});
