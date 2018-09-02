# laravel-urlvalidator

## Install
You can install the package with composer:

```bash
composer require mdooley47/laravel-urlvalidator
```

## How to Use

Adds more robust ways to validate URLs.

You can use the `\MDooley47\UrlValidator\UrlValidator::match` method to validate urls like so:
```php
\MDooley47\UrlValidator\UrlValidator::match(
    'https://user:pass@sub.domain.tld/path?query=true#fragment',
    [
        'scheme' => 'https',
        'user' => 'user',
        'pass' => 'pass',
        'subdomain' => 'sub',
        'domain' => 'domain',
        'tld' => 'tld',
        'path' => '/path',
        'query' => 'query=true',
        'fragment' => 'fragment',
        'host' => 'sub.domain.tld',
    ]);
// Returns Validator->passes()

// You can pass a string in place of the $options array.
// This will default to using the host validator.
// Since we use Str::is, that means we can match a pattern.
\MDooley47\UrlValidator\UrlValidator::match(
    'https://user:pass@sub.domain.tld/path?query=true#fragment',
    'sub.*.tld'
    );
```

Or you can use it in a normal Validator like so
```php
\Illuminate\Support\Facades\Validator::make(
    [
        'url' => 'https://user:pass@sub.domain.tld/path?query=true#fragment'
    ],
    [
        'url' => 'required|url|scheme:https|user:user|pass:pass|subdomain:sub|domain:domain|tld:tld|path:/path|query:query=true|fragment:fragment|host:sub.domain.tld',
    ]
);
```

## How it Works
Because we use Str::is we have powerful matching options such as using an asterisks (*) as a wild card.
As a result of using Str::is, for subdomain matching we use the pattern: `${value}.*`, for domain matching we use `*.${value}.*` and for tld matching we use `*.${value}`. The `$value` variable the the pattern you pass in.