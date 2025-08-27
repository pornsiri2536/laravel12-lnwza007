public function up(): void
{
    Schema::create('tourism_news', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('image')->nullable();
        $table->string('link')->nullable();
        $table->timestamps();
    });
}
