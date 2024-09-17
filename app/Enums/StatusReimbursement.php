<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusReimbursement: string implements HasLabel
{
    case Process = 'Process';
    case Done = 'Done';

    public function getLabel(): ?string
    {
        // return $this->name;

        // or

        return match ($this) {
            self::Process => 'Process',
            self::Done => 'Done',
        };
    }
}
