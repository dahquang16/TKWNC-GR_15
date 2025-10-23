<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use App\Models\EventRegistration;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $students = User::factory(10)->create([
            'role' => 'student'
        ]);

        $events = [
            [
                'title' => 'Hội thảo Công nghệ Thông tin 2024',
                'description' => 'Hội thảo về xu hướng công nghệ mới nhất trong năm 2024, với sự tham gia của các chuyên gia hàng đầu trong lĩnh vực IT.',
                'start_time' => Carbon::now()->addDays(7)->setTime(9, 0),
                'end_time' => Carbon::now()->addDays(7)->setTime(17, 0),
                'location' => 'Hội trường A - Tòa nhà Công nghệ',
                'max_participants' => 100,
                'is_active' => true,
            ],
            [
                'title' => 'Workshop Lập trình Web với Laravel',
                'description' => 'Workshop thực hành lập trình web sử dụng framework Laravel, phù hợp cho người mới bắt đầu.',
                'start_time' => Carbon::now()->addDays(14)->setTime(14, 0),
                'end_time' => Carbon::now()->addDays(14)->setTime(18, 0),
                'location' => 'Phòng Lab 201 - Tòa nhà Công nghệ',
                'max_participants' => 30,
                'is_active' => true,
            ],
            [
                'title' => 'Cuộc thi Hackathon 2024',
                'description' => 'Cuộc thi lập trình 48 giờ với chủ đề "Giải pháp số cho giáo dục". Giải thưởng hấp dẫn đang chờ đón!',
                'start_time' => Carbon::now()->addDays(21)->setTime(8, 0),
                'end_time' => Carbon::now()->addDays(23)->setTime(20, 0),
                'location' => 'Trung tâm Hội nghị - Tòa nhà Chính',
                'max_participants' => 50,
                'is_active' => true,
            ],
            [
                'title' => 'Seminar Kỹ năng Mềm cho Sinh viên',
                'description' => 'Seminar về các kỹ năng mềm cần thiết cho sinh viên: giao tiếp, làm việc nhóm, quản lý thời gian.',
                'start_time' => Carbon::now()->addDays(3)->setTime(9, 0),
                'end_time' => Carbon::now()->addDays(3)->setTime(12, 0),
                'location' => 'Hội trường B - Tòa nhà Hành chính',
                'max_participants' => 80,
                'is_active' => true,
            ],
            [
                'title' => 'Triển lãm Dự án Sinh viên',
                'description' => 'Triển lãm các dự án nghiên cứu và sáng tạo của sinh viên các khoa. Cơ hội giao lưu và học hỏi.',
                'start_time' => Carbon::now()->addDays(10)->setTime(8, 0),
                'end_time' => Carbon::now()->addDays(10)->setTime(17, 0),
                'location' => 'Sảnh chính - Tòa nhà Công nghệ',
                'max_participants' => null,
                'is_active' => true,
            ],
            [
                'title' => 'Sự kiện đã kết thúc - Workshop AI',
                'description' => 'Workshop về Trí tuệ nhân tạo và Machine Learning (đã kết thúc).',
                'start_time' => Carbon::now()->subDays(5)->setTime(9, 0),
                'end_time' => Carbon::now()->subDays(5)->setTime(17, 0),
                'location' => 'Phòng Lab 301 - Tòa nhà Công nghệ',
                'max_participants' => 25,
                'is_active' => true,
            ],
        ];

        foreach ($events as $eventData) {
            $event = Event::create($eventData);
            
            $randomStudents = $students->random(rand(2, 8));
            foreach ($randomStudents as $student) {
                EventRegistration::create([
                    'user_id' => $student->id,
                    'event_id' => $event->id,
                    'registered_at' => Carbon::now()->subDays(rand(1, 10)),
                ]);
            }
        }
    }
}
