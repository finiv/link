<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\RegistrationLink\QueryService as RegistrationLinkQueryService;
use App\Services\RegistrationLink\CommandService as RegistrationLinkCommandService;
use App\Services\LuckyResult\CommandService as LuckyResultCommandService;
use App\Services\LuckyResult\QueryService as LuckyResultQueryService;

class DashboardController extends Controller
{
    public function __construct(
        private readonly RegistrationLinkQueryService $registrationLinkQueryService,
        private readonly RegistrationLinkCommandService $registrationLinkCommandService,
        private readonly LuckyResultCommandService  $luckyResultCommandService,
        private readonly LuckyResultQueryService  $luckyResultQueryService,
    ) {}

    public function showSuccessPage($link): View
    {
        return view('pages.success', ['link' => $link]);
    }

    public function accessPage($link): View
    {
        $registrationLink = $this->registrationLinkQueryService->find($link);

        if ($registrationLink->isPassed()) {
            abort(404);
        }

        return view('pages.access', ['user' => $registrationLink->user, 'link' => $link]);
    }

    public function generateNewLink($link): RedirectResponse
    {
        $newLink = $this->registrationLinkCommandService->updateLink(
            $this->registrationLinkQueryService->find($link)
        );

        return redirect()->route('access.page', ['link' => $newLink->unique_link]);
    }

    public function deactivateLink($link): RedirectResponse
    {
        $this->registrationLinkCommandService->deactivate(
            $this->registrationLinkQueryService->find($link)
        );

        return redirect()->route('register.form');
    }

    public function imFeelingLucky($link): View
    {
        $luckyResults = $this->luckyResultCommandService->iamfeelinglucky(
            $link = $this->registrationLinkQueryService->find($link)
        );

        return view('pages.lucky', ['luckyResults' => $luckyResults, 'link' => $link->unique_link]);
    }

    public function showHistory($link): View
    {
        $link = $this->registrationLinkQueryService->find($link);
        $history = $this->luckyResultQueryService->getHistory($link->user);

        return view('pages.history', ['history' => $history, 'link' => $link->unique_link]);
    }
}
