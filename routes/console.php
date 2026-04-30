<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('reminders:send-daily', function () {
    info("reminders:send-daily اجرا شد!");
    // اینجا منطق اجرای ریمایندر رو بنویس یا فقط dispatch کن:
    // SendDailyReminders::dispatch();
})->purpose('Send daily reminders');
