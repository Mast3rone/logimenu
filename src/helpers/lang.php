<?php

// Variabile globale per tenere traccia della lingua corrente
$GLOBALS['active_lang'] = 'de';

function load_lang($default = 'de') {
    $lang = $_GET['lang'] ?? $_COOKIE['lang'] ?? $default;

    if (isset($_GET['lang'])) {
        setcookie('lang', $lang, time() + (60 * 60 * 24 * 90), "/");
    }

    // ⚠️ Salva la lingua anche in una variabile globale
    $GLOBALS['active_lang'] = $lang;

    $lang_file = __DIR__ . '/../lang/' . $lang . '.php';
    if (!file_exists($lang_file)) {
        $lang_file = __DIR__ . '/../lang/' . $default . '.php';
    }

    return include $lang_file;
}

function getCurrentLang(): string {
    // Prima controlla la variabile globale (set da load_lang)
    return $GLOBALS['active_lang'] ?? $_COOKIE['lang'] ?? 'de';
}

function getFlagUrl(string $lang = null): string {
    $lang = $lang ?? getCurrentLang();

    $flags = [
        'de' => 'https://flagcdn.com/w40/de.png',
        'en' => 'https://flagcdn.com/w40/gb.png',
        'it' => 'https://flagcdn.com/w40/it.png',
    ];

    return $flags[$lang] ?? $flags['de'];
}

