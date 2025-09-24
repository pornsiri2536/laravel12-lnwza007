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
        // Array of available news images
        $newsImages = [
            '11.jpg',
            '04.jpg',
            '61.jpg',
            '06.jpg',
            '110-1.jpg',
            '5555.jpg',
            '4444.jpg',
            '3333.jpg',
            '2222.jpg',
            'aaaa.jpg',
            'NU.jpg',
            'NU.png',
            'RM.jpg',
            'IY.jpg',
            'IU.jpg',
            'YU.jpg',
            'AU.jpg',
            'OO.jpg',
            'VJ.jpg',
            'Vijit.jpg',
            'TU.jpg'
        ];

        $newsData = [
            [
                "title" => "เทศกาลกินกุ้งแม่น้ำปทุมธานี 2025",
                "description" => "จังหวัดปทุมธานีจัดงานเทศกาลกินกุ้งแม่น้ำสุดยิ่งใหญ่ รวบรวมร้านอาหารชื่อดังและเมนูเด็ดมากมาย พร้อมกิจกรรมดนตรีสดและการแสดงพื้นบ้าน เพื่อส่งเสริมการท่องเที่ยวริมแม่น้ำเจ้าพระยา",
                "image" => "/assets/img/news/" . $newsImages[0],
                "link" => "https://example.com/tourism-news/1",
            ],
            [
                "title" => "งานแห่เทียนเข้าพรรษาวัดสิงห์",
                "description" => "ชาวบ้านและนักท่องเที่ยวร่วมสืบสานประเพณีแห่เทียนเข้าพรรษา ณ วัดสิงห์ จังหวัดปทุมธานี ภายในงานมีการตกแต่งขบวนเทียนอย่างสวยงาม พร้อมกิจกรรมทางวัฒนธรรมและการละเล่นพื้นบ้าน",
                "image" => "/assets/img/news/" . $newsImages[1],
                "link" => "https://example.com/tourism-news/2",
            ],
            [
                "title" => "ประเพณีแข่งเรือยาวจังหวัดน่าน",
                "description" => "เทศกาลแข่งเรือยาวเป็นงานสำคัญสำหรับชุมชนท้องถิ่น โดยนำผู้คนมารวมตัวกันเพื่อเฉลิมฉลองวัฒนธรรมและประเพณีของตน",
                "image" => "/assets/img/news/" . $newsImages[2],
                "link" => "https://example.com/tourism-news/3",
                "event_period" => [
                    "start" => "2025-08-29",
                    "end"   => "2025-09-07"
                ]
            ],
            [
                "title" => "เทศกาลโคมไฟเชียงราย 2025",
                "description" => "เทศกาลโคมไฟเชียงรายประดับโคมไฟนับพันดวงทั่วเมือง สร้างบรรยากาศสวยงามและโรแมนติก พร้อมกิจกรรมการแสดงศิลปวัฒนธรรมพื้นบ้านและดนตรีสด",
                "image" => "/assets/img/news/" . $newsImages[3],
                "link" => "https://example.com/tourism-news/4",
                "event_period" => [
                    "start" => "2025-11-01",
                    "end"   => "2025-11-10"
                ]
            ],
            [
                "title" => "งานประเพณีตักบาตรดอกไม้สระบุรี",
                "description" => "ร่วมสืบสานวัฒนธรรมไทยในงานประเพณีตักบาตรดอกไม้จังหวัดสระบุรี มีพระสงฆ์จำนวนมากเดินบิณฑบาต และนักท่องเที่ยวสามารถร่วมถวายดอกไม้เพื่อความเป็นสิริมงคล",
                "image" => "/assets/img/news/" . $newsImages[4],
                "link" => "https://example.com/tourism-news/5",
            ],
            [
                "title" => "เทศกาลชิมทุเรียนระยอง",
                "description" => "เทศกาลชิมทุเรียนและผลไม้เมืองระยอง 2025 มอบประสบการณ์อร่อยกับผลไม้สดจากสวน พร้อมร้านค้าและกิจกรรมบันเทิงสำหรับนักท่องเที่ยว",
                "image" => "/assets/img/news/" . $newsImages[5],
                "link" => "https://example.com/tourism-news/6",
                "event_period" => [
                    "start" => "2025-05-10",
                    "end"   => "2025-05-20"
                ]
            ],
            [
                "title" => "เทศกาลชมดอกบัวหลวงนครปฐม",
                "description" => "เทศกาลชมดอกบัวหลวงนครปฐมจัดขึ้นทุกปีเพื่อดึงดูดนักท่องเที่ยวมาชมความสวยงามของดอกบัว พร้อมกิจกรรมเวิร์คช็อปจัดดอกไม้และชิมอาหารพื้นบ้าน",
                "image" => "/assets/img/news/" . $newsImages[6],
                "link" => "https://example.com/tourism-news/7",
            ],
            [
                "title" => "เทศกาลหมู่บ้านช้างสุรินทร์",
                "description" => "งานหมู่บ้านช้างสุรินทร์จัดการแสดงช้างแสนรู้ กิจกรรมช้างแห่รอบเมือง และการแสดงวัฒนธรรมพื้นบ้านที่เป็นเอกลักษณ์",
                "image" => "/assets/img/news/" . $newsImages[7],
                "link" => "https://example.com/tourism-news/8",
                "event_period" => [
                    "start" => "2025-11-15",
                    "end"   => "2025-11-20"
                ]
            ],
            [
                "title" => "เทศกาลอาหารทะเลสมุทรสาคร",
                "description" => "เทศกาลอาหารทะเลจังหวัดสมุทรสาครรวมร้านอาหารทะเลชื่อดังหลายแห่งในพื้นที่ พร้อมเมนูเด็ดสดใหม่และการแสดงดนตรีตลอดงาน",
                "image" => "/assets/img/news/" . $newsImages[8],
                "link" => "https://example.com/tourism-news/9",
            ],
            [
                "title" => "เทศกาลปีใหม่กรุงเทพมหานคร 2025",
                "description" => "กรุงเทพมหานครจัดเทศกาลปีใหม่สุดยิ่งใหญ่ พร้อมพลุสุดอลังการ คอนเสิร์ตจากศิลปินชื่อดัง และกิจกรรมส่งท้ายปีเก่าต้อนรับปีใหม่",
                "image" => "/assets/img/news/" . $newsImages[9],
                "link" => "https://example.com/tourism-news/10",
                "event_period" => [
                    "start" => "2025-12-31",
                    "end"   => "2026-01-01"
                ]
            ],
        ];

        foreach ($newsData as $news) {
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
        }
    }
}