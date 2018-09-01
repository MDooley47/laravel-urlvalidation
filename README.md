# laravel-urlvalidator

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
```

Or you can use it in a normal Validator like so
```php
\Illuminate\Support\Facades\Validator::make(
    [
        'url' => 'https://user:pass@sub.domain.tld/path?query=true#fragment'
    ],
    [
        'url' => 'required|url|scheme:https|user:user|pass:pass|subdomain:sub|domain:domain|tld:tld|path:path|query:query=true|fragment:fragment|host:sub.domain.tld',
    ]
);
```

## Limitations
Right now the subdomain, domain, and tld will **only** match `sub.domain.tld` urls. It will not work with `sub.sub.domain.tld` or `sub.domain.sld.tld`.

These validators also do not work with regex. At this time it is just simple comparisons.
