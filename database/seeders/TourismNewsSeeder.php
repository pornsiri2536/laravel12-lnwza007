<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourismNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ลบข้อมูลเดิมก่อน seeding เพื่อป้องกัน duplicate และ foreign key constraint
        DB::table('event_dates')->delete();
        DB::table('tourism_news')->delete();

        $newsImages = [
            'festival.jpg', 'candle.jpg', 'boat.jpg', 'lantern.jpg', 'flower.jpg',
            'durian.jpg', 'lotus.jpg', 'elephant.jpg', 'seafood.jpg', 'newyear.jpg'
        ];

        $newsData = [
            [
                "title" => "เทศกาลกินกุ้งแม่น้ำปทุมธานี 2025",
                "description" => "จังหวัดปทุมธานีจัดงานเทศกาลกินกุ้งแม่น้ำสุดยิ่งใหญ่ รวบรวมร้านอาหารชื่อดังและเมนูเด็ดมากมาย พร้อมกิจกรรมดนตรีสดและการแสดงพื้นบ้าน เพื่อส่งเสริมการท่องเที่ยวริมแม่น้ำเจ้าพระยา",
                "image" => "/assets/img/news/" . $newsImages[0],
                "link" => "https://www.thairath.co.th/news/local/central/1234567",
            ],
            [
                "title" => "งานแห่เทียนเข้าพรรษาวัดสิงห์",
                "description" => "ชาวบ้านและนักท่องเที่ยวร่วมสืบสานประเพณีแห่เทียนเข้าพรรษา ณ วัดสิงห์ จังหวัดปทุมธานี ภายในงานมีการตกแต่งขบวนเทียนอย่างสวยงาม พร้อมกิจกรรมทางวัฒนธรรมและการละเล่นพื้นบ้าน",
                "image" => "/assets/img/news/" . $newsImages[1],
                "link" => "https://www.matichon.co.th/local/987654",
            ],
            [
                "title" => "ประเพณีแข่งเรือยาวจังหวัดน่าน",
                "description" => "เทศกาลแข่งเรือยาวเป็นงานสำคัญสำหรับชุมชนท้องถิ่น โดยนำผู้คนมารวมตัวกันเพื่อเฉลิมฉลองวัฒนธรรมและประเพณีของตน",
                "image" => "/assets/img/news/" . $newsImages[2],
                "link" => "https://www.khaosod.co.th/around-thailand/news_123456",
                "event_period" => [
                    "start" => "2025-08-29",
                    "end"   => "2025-09-07"
                ]
            ],
            [
                "title" => "เทศกาลโคมไฟเชียงราย 2025",
                "description" => "เทศกาลโคมไฟเชียงรายประดับโคมไฟนับพันดวงทั่วเมือง สร้างบรรยากาศสวยงามและโรแมนติก พร้อมกิจกรรมการแสดงศิลปวัฒนธรรมพื้นบ้านและดนตรีสด",
                "image" => "/assets/img/news/" . $newsImages[3],
                "link" => "https://www.bangkokbiznews.com/news/123456",
                "event_period" => [
                    "start" => "2025-11-01",
                    "end"   => "2025-11-10"
                ]
            ],
            [
                "title" => "งานประเพณีตักบาตรดอกไม้สระบุรี",
                "description" => "ร่วมสืบสานวัฒนธรรมไทยในงานประเพณีตักบาตรดอกไม้จังหวัดสระบุรี มีพระสงฆ์จำนวนมากเดินบิณฑบาต และนักท่องเที่ยวสามารถร่วมถวายดอกไม้เพื่อความเป็นสิริมงคล",
                "image" => "/assets/img/news/" . $newsImages[4],
                "link" => "https://www.dailynews.co.th/news/123456",
            ],
        ];

        foreach ($newsData as $news) {
            try {
                $id = DB::table('tourism_news')->insertGetId([
                    'title'        => $news['title'],
                    'description'  => $news['description'],
                    'image'        => $news['image'],
                    'link'         => $news['link'],
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);

                if (isset($news['event_period'])) {
                    DB::table('event_dates')->insert([
                        'tourism_news_id' => $id,
                        'event_name'      => $news['title'],
                        'start_date'      => $news['event_period']['start'],
                        'end_date'        => $news['event_period']['end'],
                        'location'        => 'สถานที่จัดงาน',
                        'description'     => $news['description'],
                        'created_at'      => now(),
                        'updated_at'      => now(),
                    ]);
                }
            } catch (\Exception $e) {
                echo "Seeder error: " . $e->getMessage();
            }
        }
    }
}