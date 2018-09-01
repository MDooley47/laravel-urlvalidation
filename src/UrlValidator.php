<?php

namespace MDooley47\UrlValidator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UrlValidator
{
    /**
     * @param string $url
     * @param array|string $options
     *
     * @return bool
     */
    public static function match($url, $options)
    {
        if (! is_array($options)) {
            $tmpString = $options;
            $options = null;
            $options['host'] = $tmpString;
        }

        // build the rules
        $rules = '';
        foreach ($options as $key => $value) {
            switch (Str::lower($key)) {
                case 'scheme':
                    $rules .= "|scheme:${value}";
                    break;
                case 'user':
                    $rules .= "|user:${value}";
                    break;
                case 'pass':
                    $rules .= "|pass:${value}";
                    break;
                case 'host':
                    $rules .= "|host:${value}";
                    break;
                case 'subdomain':
                    $rules .= "|subdomain:${value}";
                    break;
                case 'domain':
                    $rules .= "|domain:${value}";
                    break;
                case 'tld':
                    $rules .= "|tld:${value}";
                    break;
                case 'port':
                    $rules .= "|port:${value}";
                    break;
                case 'path':
                    $rules .= "|path:${value}";
                    break;
                case 'query':
                    $rules .= "|query:${value}";
                    break;
                case 'fragment':
                    $rules .= "|fragment:${value}";
                    break;
            }
        }

        $validate = Validator::make(['url' => $url], [
            'url' => 'required|url'.$rules,
        ]);

        return $validate->passes();
    }
}
