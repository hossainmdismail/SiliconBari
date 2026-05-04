<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CareerSubmissionController extends Controller
{
    public function store(Request $request, Career $career): RedirectResponse
    {
        $validated = $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'email:rfc', 'max:255'],
            'Number' => ['required', 'string', 'max:255'],
            'Location' => ['required', 'string', 'max:255'],
            'Linkedin' => ['nullable', 'url', 'max:255'],
            'Portfolio' => ['nullable', 'url', 'max:255'],
            'Education' => ['required', 'string', 'max:255'],
            'University' => ['required', 'string', 'max:255'],
            'Experience' => ['required', 'string', 'max:255'],
            'Current-Company' => ['nullable', 'string', 'max:255'],
            'Resume' => ['required', 'file', 'mimes:pdf', 'max:5120'], // 5MB max
            'Coverletter' => ['nullable', 'string', 'max:5000'],
        ]);

        $resumePath = $request->file('Resume')->store('resumes', 'public');

        CareerSubmission::create([
            'career_id' => $career->id,
            'full_name' => $validated['Name'],
            'email' => $validated['Email'],
            'phone' => $validated['Number'],
            'current_location' => $validated['Location'],
            'linkedin_url' => $validated['Linkedin'],
            'portfolio_url' => $validated['Portfolio'],
            'highest_education' => $validated['Education'],
            'university' => $validated['University'],
            'years_of_experience' => $validated['Experience'],
            'current_company' => $validated['Current-Company'],
            'resume_path' => $resumePath,
            'cover_letter' => $validated['Coverletter'],
            'status' => 'pending',
        ]);

        return redirect()->route('careers.thank-you');
    }

    public function thankYou(): View
    {
        return view('pages.career-thank-you');
    }
}
