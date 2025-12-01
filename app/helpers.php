<?php

if (!function_exists('localePrefix')) {
    function localePrefix()
    {
        return app()->getLocale(); // يرجع اللغة الحالية مثل "en" أو "ar"
    }
}
