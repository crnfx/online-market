<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactService $contactService,
    ) {}

    public function send(ContactRequest $request): RedirectResponse
    {

        try {
            $filters = $request->getFilters();

            return $this->contactService->sendContactForm($filters);
        } catch (Exception $e) {
            Log::error('Contact mail sending errors: '.$e->getMessage());

            return back()->with('error', 'Произошла ошибка при отправке. Попробуйте позже.');
        }
    }
}
