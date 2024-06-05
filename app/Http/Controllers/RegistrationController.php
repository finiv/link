<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\User\CommandService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\RegistrationLink\CommandService as RegistrationLinkCommandService;

class RegistrationController extends Controller
{
    public function __construct(
        private readonly CommandService $userCommandService,
        private readonly RegistrationLinkCommandService $registrationLinkCommandService
    ) {}

    public function showForm(): View
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = $this->userCommandService->create($request->get('name'), $request->get( 'phone'));
        $uniqueLink = $this->registrationLinkCommandService->create($user);

        return redirect()->route('registration.success', ['link' => $uniqueLink]);
    }
}
