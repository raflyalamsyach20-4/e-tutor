<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\TeachingSchedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifyUpcomingClasses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:upcoming-classes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications to tutors and participants 1 hour before class starts.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $oneHourLater = $now->copy()->addHour();
        $targetTime = $oneHourLater->format('H:i');

        // We check for classes starting in exactly 1 hour (allowing a small window if needed, but here we match HH:mm)
        // Since HH:mm might be slightly off due to seconds, we check for equality of HH:mm
        
        $schedules = TeachingSchedule::where('tanggal', $now->toDateString())->get();

        foreach ($schedules as $schedule) {
            // Parse start time from "08:00 - 10:00"
            $timeParts = explode('-', $schedule->waktu);
            $startTime = trim($timeParts[0]); // "08:00"

            if ($startTime === $targetTime) {
                $this->sendNotifications($schedule);
            }
        }

        $this->info('Upcoming class notifications processed.');
    }

    protected function sendNotifications($schedule)
    {
        // 1. Notify Tutor
        $this->createNotification(
            $schedule->user_id,
            'Pengingat Kelas (Tutor)',
            "Kelas Anda dengan topik '{$schedule->topik_pembahasan}' akan dimulai dalam 1 jam.",
            $schedule->id
        );

        // 2. Notify Registered Participants
        $registrations = $schedule->pendaftaran()->where('status', 'approved')->get();
        foreach ($registrations as $reg) {
            $this->createNotification(
                $reg->user_id,
                'Pengingat Kelas (Peserta)',
                "Kelas '{$schedule->topik_pembahasan}' yang Anda ikuti akan dimulai dalam 1 jam.",
                $schedule->id
            );
        }
    }

    protected function createNotification($userId, $title, $message, $scheduleId)
    {
        // Check if notification already exists to avoid duplicates
        $exists = Notification::where('user_id', $userId)
            ->where('related_schedule_id', $scheduleId)
            ->where('type', 'class_reminder')
            ->exists();

        if (!$exists) {
            Notification::create([
                'user_id' => $userId,
                'title' => $title,
                'message' => $message,
                'type' => 'class_reminder',
                'related_schedule_id' => $scheduleId,
            ]);
        }
    }
}
