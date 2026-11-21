<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'services' => Service::active()->take(6)->get(),
            'sectors' => Sector::active()->get(),
            'projects' => Project::active()->featured()
                ->with(['sector', 'media'])
                ->latest()->take(3)->get(),
            'partners' => Partner::active()->with('media')->get(), // الشركاء المفعّلين، مع اللوجوهات
        ]);
    }
}
