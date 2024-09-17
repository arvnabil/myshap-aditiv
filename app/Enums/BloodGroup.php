<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum BloodGroup: string implements HasLabel
{
    case A = 'A';
    case Aplus = 'A+';
    case Aminus = 'A-';
    case B = 'B';
    case Bplus = 'B+';
    case Bminus = 'B-';
    case O = 'O';
    case Oplus = 'O+';
    case Ominus = 'O-';

    public function getLabel(): ?string
    {
        // return $this->name;

        // or

        return match ($this) {
            self::A => 'A',
            self::Aplus => 'A+',
            self::Aminus => 'A-',
            self::B => 'B',
            self::Bplus => 'B+',
            self::Bminus => 'B-',
            self::O => 'O',
            self::Oplus => 'O+',
            self::Ominus => 'O-',
        };
    }
}
