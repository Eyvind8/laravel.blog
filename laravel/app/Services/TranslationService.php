<?php

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslationService
{
    /**
     * @var GoogleTranslate
     */
    private $translator;

    /**
     * TranslationService constructor.
     */
    public function __construct()
    {
        $this->translator = new GoogleTranslate();
        $this->translator->setSource('ru');
        $this->translator->setTarget('uk');
    }

    /**
     * Перевести текст с русского на украинский.
     *
     * @param string $text
     * @return string
     */
    public function translateFromRussianToUkrainian(string $text): string
    {
        return $this->translator->translate($text);
    }
}
