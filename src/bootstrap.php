<?php

declare(strict_types=1);

const ROOT = __DIR__ . '/..';

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string
{
    return '/assets/' . ltrim($path, '/');
}

function lang(): string
{
    return $GLOBALS['lang'] ?? 'fr';
}

function url_to(string $page = 'home', ?string $lang = null, array $query = []): string
{
    $lang = $lang ?? lang();
    $path = $page === 'home' ? '/' . $lang : '/' . $lang . '/' . $page;
    if ($query) {
        $path .= '?' . http_build_query($query);
    }
    return $path;
}

function csrf_secret(): string
{
    $secret = getenv('CSRF_SECRET');
    return is_string($secret) && $secret !== '' ? $secret : 'profit-local-csrf';
}

function csrf_token(): string
{
    $expires = (string) (time() + 7200);
    return $expires . '.' . hash_hmac('sha256', $expires, csrf_secret());
}

function csrf_ok(?string $token): bool
{
    if (!is_string($token) || !str_contains($token, '.')) {
        return false;
    }
    [$expires, $signature] = explode('.', $token, 2);
    if ($expires === '' || !ctype_digit($expires) || (int) $expires < time()) {
        return false;
    }
    return hash_equals(hash_hmac('sha256', $expires, csrf_secret()), $signature);
}
