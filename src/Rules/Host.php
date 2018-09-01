<?php

namespace MDooley47\UrlValidator\Rules;

use Illuminate\Support\Str;

/**
 * Class Host.
 */
class Host
{
    /**
     * Determine if the validation rule passes.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function passes($attribute, $value, $parameters, $validator)
    {
        // $validator->requireParameterCount(1, $parameters, 'host');

        return Str::lower(parse_url($value, PHP_URL_HOST)) == Str::lower($parameters[0]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public static function message()
    {
        return 'The :attribute must be :value.';
    }
}
