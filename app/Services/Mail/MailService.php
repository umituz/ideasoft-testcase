<?php

namespace App\Services\Mail;

use App\Services\Log\LogService;
use Illuminate\Support\Facades\Mail;

class MailService
{
    private LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * @param $to
     * @param $subject
     * @param $message
     * @return void
     */
    public function send($to, $subject, $message): void
    {
        try {
            Mail::raw($message, function ($mail) use ($to, $subject) {
                $mail->to($to)->subject($subject);
            });

            $this->logService->logInfo("Email sent: '$subject' to '$to'");
        } catch (\Exception $exception) {
            $this->logService->logError($exception);
        }
    }
}
