<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourismSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tourism_places')->insert([
            [
                "name" => "วัดเจดีย์หอย",
                "image" => "https://www.tripgether.com/wp-content/uploads/2024/08/jedeehoi-13-2.jpg",
                "description" => "วัดที่มีเจดีย์สร้างจากซากหอยอายุหลายล้านปี ภายในวัดยังมีพิพิธภัณฑ์ซากหอยโบราณและพื้นที่ให้กราบไหว้พระพุทธรูปอันศักดิ์สิทธิ์ เป็นแลนด์มาร์กสำคัญของจังหวัดปทุมธานี",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "ตลาดน้ำคลองลัดมะยม",
                "image" => "https://cms.dmpcdn.com/travel/2024/07/08/1909ef30-3cea-11ef-be17-cd34bf335bbe_webp_original.webp",
                "description" => "ตลาดน้ำชื่อดังใกล้กรุงเทพฯ มีอาหารพื้นบ้านอร่อย ของฝากมากมาย ผักผลไม้สดจากสวน และกิจกรรมนั่งเรือชมบรรยากาศริมน้ำ เหมาะสำหรับมาเที่ยวกับครอบครัว",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "พิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ",
                "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Khlong_Ha%2C_Khlong_Luang_District%2C_Pathum_Thani_12120%2C_Thailand_-_panoramio.jpg/500px-Khlong_Ha%2C_Khlong_Luang_District%2C_Pathum_Thani_12120%2C_Thailand_-_panoramio.jpg",
                "description" => "แหล่งเรียนรู้ด้านวิทยาศาสตร์ที่ใหญ่ที่สุดในประเทศไทย ภายในมีนิทรรศการแบบ Interactive การทดลองวิทยาศาสตร์ และกิจกรรมเสริมทักษะ เหมาะสำหรับครอบครัวและนักเรียน",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "เกาะเกร็ด",
                "image" => "https://roijang.com/wp-content/uploads/2023/08/shutterstock_1972740416.jpg",
                "description" => "ชุมชนเกาะกลางน้ำเจ้าพระยา มีชื่อเสียงด้านเครื่องปั้นดินเผา วัดวาอาราม ร้านอาหารพื้นบ้าน และของฝากมากมาย เหมาะสำหรับการเที่ยวเชิงวัฒนธรรม",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "วัดสิงห์",
                "image" => "https://cms.dmpcdn.com/travel/2021/01/06/2abcd040-4fee-11eb-89e4-35f1a97d3869_original.jpg",
                "description" => "วัดเก่าแก่ริมแม่น้ำเจ้าพระยา มีสถาปัตยกรรมงดงาม โดยเฉพาะพระอุโบสถที่มีจิตรกรรมฝาผนังแบบไทยดั้งเดิม บรรยากาศเงียบสงบ เหมาะแก่การปฏิบัติธรรม",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "น้ำตกวังก้านเหลือง จ.ลพบุรี",
                "image" => "https://api.tourismthailand.org/upload/live/content_article/22069-19087.jpeg",
                "description" => "แหล่งท่องเที่ยวทางธรรมชาติที่มีน้ำให้เล่นตลอดทั้งปี เกิดจากแหล่งน้ำผุดจำนวนหลายจุดที่ผุดขึ้นมาจากลำห้วยมะกอก ไหลลงมารวมกันบริเวณสันหินปูน ทำให้เกิดเป็นน้ำตกกว้างประมาณ 20 เมตร และไหลลดหลั่นกันไปเป็นชั้น ๆ ถึงจะมีขนาดไม่ใหญ่มากแต่ความสวยงามไม่แพ้ที่อื่นแน่นอน บรรยากาศดี ล้อมรอบไปด้วยป่าไม้ และที่นี่น้ำยังใสเห็นปลากำลังแหวกว่ายชัดเจนเลย แถมมีหลายชั้นให้เดินชมความงามกันแบบชิลล์ ๆ เพราะทางเดินไม่ชัน เดินสะดวกสบายมาก ๆ ส่วนใครอยากมานอนค้างก็มีจุดบริการนำเต้นท์มากางกันได้",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
