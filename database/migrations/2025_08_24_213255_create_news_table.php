public function up()
{
    Schema::create('news', function (Blueprint $table) {
        $table->id();
        $table->string('title');             // หัวข้อข่าว
        $table->text('content');             // เนื้อหา
        $table->string('image')->nullable(); // รูปภาพ
        $table->date('published_at');        // วันที่เผยแพร่
        $table->timestamps();
    });
}
