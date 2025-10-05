Schema::create('user_role', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
    $table->timestamps();
});
