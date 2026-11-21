<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ProjectStatus: string implements HasLabel
{
    case Completed = 'completed'; // مكتمل
    case Ongoing = 'ongoing';     // جاري

    public function getLabel(): string
    {
        return match ($this) {
            self::Completed => 'Completed',
            self::Ongoing => 'Ongoing',
        };
    }
}
