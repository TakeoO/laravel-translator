<?php

namespace Takeoo\Translator\Service;


use Illuminate\Filesystem\Cache;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Support\Facades\App;
use Takeoo\Service\Service;
use Takeoo\Translator\Model\Orm\TranslationSource;
use Takeoo\Translator\Storage\TranslationStorage;

class TranslationService extends Service
{
    public function translate(string $message, string $locale = null, string $textDomain = "default")
    {

        $translations = $this->getTranslations($locale, $textDomain);
        $locale = $locale ?: App::getLocale();


    }


    public function getLocale()
    {
        return Cache::get("locale") ?: App::getLocale();
    }


    private function getTranslations(string $locale = "en", string $textDomain = "default")
    {
       if(!TranslationStorage::hasLoadedTranslations()){
            $translations = TranslationSource::with("translation")->get();
            var_dump($translations);
       }

    }
}