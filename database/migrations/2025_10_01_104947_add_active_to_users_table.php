public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->boolean('active')->default(true);
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('active');
    });
}
