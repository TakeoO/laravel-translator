<?php

namespace Takeoo\Translator\Storage;

use Takeoo\Translator\StdLib\Arr;

/**
 * Class TranslationStorage
 * @package Takeoo\Translator\Storage
 */
class TranslationStorage
{
    /** @var array */
    static $_translations = [];

    /** @var bool */
    static $loaded = false;

    /**
     * Wrapper function for ordering and setting translations
     *
     * @param array $translations
     */
    public static function setUnorderedTranslations(array $translations)
    {
        self::setTranslations(
            self::orderTranslations($translations)
        );
    }

    /**
     * Sets translations to object
     *
     * @param array $orderedTranslations
     */
    public static function setTranslations(array $orderedTranslations)
    {
        self::$_translations = $orderedTranslations;
    }

    /**
     * Orders translations to proper array for further usage
     * e.g.:
     *  [
     *    "text_domain" =>
     *       [
     *         "locale"  => [
     *              "TranslationsSource" => "Translation"
     *          ]
     *      ]
     *  ]
     *
     *
     * @param array $translations
     * @return array
     */
    private static function orderTranslations(array $translations)
    {
        $tempTranslations = Arr::getMultiIndexed($translations, "text_domain");
        $orderedTranslations = [];

        foreach ($tempTranslations as $key => $tempTranslation)
            $orderedTranslations[$key] = Arr::getMultiIndexed($tempTranslation, "locale");


        return $orderedTranslations;
    }


    /**
     * Gets translations for locale;
     *
     * @param string $locale
     * @param string $textDomain
     * @return mixed
     */
    public static function getLocaleTranslations(string $locale = "en", string $textDomain = "default")
    {
        $localeTranslations = [];

        if (!empty(self::$_translations) && isset($localeTranslations[$textDomain]) && !empty($localeTranslations[$textDomain])
            && isset($localeTranslations[$textDomain][$locale]) && !empty($localeTranslations[$textDomain][$locale])) {
            $localeTranslations = $localeTranslations[$textDomain][$locale];
        }

        return $localeTranslations;
    }

    /**
     * Checks if translations are loaded
     *
     * @return bool
     */
    public static function hasLoadedTranslations()
    {
        return self::$loaded;
    }
}