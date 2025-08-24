public function up()
{
    Schema::create('places', function (Blueprint $table) {
        $table->id();
        $table->string('name');              // ชื่อสถานที่
        $table->text('description');         // รายละเอียด
        $table->string('image')->nullable(); // รูปภาพ
        $table->timestamps();
    });
}

