<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\View\View;

class ContactSubmissionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $serviceOptions = Service::query()
            ->where('is_active', true)
            ->ordered()
            ->pluck('name')
            ->all();

        $validated = $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'email:rfc', 'max:255'],
            'Number' => ['required', 'string', 'max:255'],
            'Interest' => ['required', 'string', 'max:191', Rule::in($serviceOptions)],
            'Message' => ['required', 'string', 'max:5000'],
        ]);

        ContactSubmission::query()->create([
            'name' => $validated['Name'],
            'email' => $validated['Email'],
            'company' => $validated['Number'],
            'service_interest' => $validated['Interest'],
            'message' => $validated['Message'],
            'ip_address' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
        ]);

        return redirect()->route('contact.thank-you');
    }

    public function thankYou(): View
    {
        return view('pages.contact-thank-you');
    }
}
