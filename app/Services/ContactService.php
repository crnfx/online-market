<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function sendContactForm(array $filters = []): RedirectResponse
    {
        try {
            Mail::to(config('mail.admin_email', 'admin@example.com'))
                ->send(new ContactMail($filters));

            return back()->with('success', 'Сообщение успешно отправлено! Мы свяжемся с вами в ближайшее время.');
        } catch (\Exception $e) {
            Log::error('Contact form error: '.$e->getMessage());

            return back()->with('error', 'Произошла ошибка при отправке. Попробуйте позже.');
        }
    }
}
