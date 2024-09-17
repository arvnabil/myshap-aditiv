<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusOvertimeItem: string implements HasLabel
{
    case Pending = 'Pending';
    case Approved = 'Approved';
    case Rejected = 'Rejected';

    public function getLabel(): ?string
    {
        // return $this->name;

        // or

        return match ($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
        };
    }
}
