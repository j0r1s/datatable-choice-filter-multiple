<?php

namespace App\Enum;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum ColorEnum : string implements TranslatableInterface
{
    case RED = 'red';
    case GREEN = 'green';
    case BLUE = 'blue';

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return $translator->trans($this->value);
    }
}
