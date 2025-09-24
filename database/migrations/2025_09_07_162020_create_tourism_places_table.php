public function up(): void
{
    Schema::create('tourism_places', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->string('image')->nullable();
        $table->timestamps();
    });
}
