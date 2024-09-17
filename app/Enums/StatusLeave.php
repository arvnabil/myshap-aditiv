<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusLeave: string implements HasLabel
{
    case Pending = 'Pending';
    case Approved = 'Approved';
    case Charge = 'Charge';
    case Rejected = 'Rejected';

    public function getLabel(): ?string
    {
        // return $this->name;

        // or

        return match ($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Charge => 'Charge',
            self::Rejected => 'Rejected',
        };
    }
}
