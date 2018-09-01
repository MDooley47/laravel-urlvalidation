<?php
namespace MDooley47\UrlValidator;

use MDooley47\UrlValidator\Rules\Scheme;
use MDooley47\UrlValidator\Rules\User;
use MDooley47\UrlValidator\Rules\Pass;
use MDooley47\UrlValidator\Rules\Host;
use MDooley47\UrlValidator\Rules\Subdomain;
use MDooley47\UrlValidator\Rules\Domain;
use MDooley47\UrlValidator\Rules\Tld;
use MDooley47\UrlValidator\Rules\Port;
use MDooley47\UrlValidator\Rules\Path;
use MDooley47\UrlValidator\Rules\Query;
use MDooley47\UrlValidator\Rules\Fragment;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

/**
 * Class UrlValidatorServiceProvider
 * @package MDooley47\UrlValidator
 */
class UrlValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('scheme', '\MDooley47\UrlValidator\Rules\Scheme@passes', Scheme::message());
        Validator::extend('user', '\MDooley47\UrlValidator\Rules\User@passes', User::message());
        Validator::extend('pass', '\MDooley47\UrlValidator\Rules\Pass@passes', Pass::message());
        Validator::extend('host', '\MDooley47\UrlValidator\Rules\Host@passes', Host::message());
        Validator::extend('subdomain', '\MDooley47\UrlValidator\Rules\Subdomain@passes', Subdomain::message());
        Validator::extend('domain', '\MDooley47\UrlValidator\Rules\Domain@passes', Domain::message());
        Validator::extend('tld', '\MDooley47\UrlValidator\Rules\Tld@passes', Tld::message());
        Validator::extend('port', '\MDooley47\UrlValidator\Rules\Port@passes', Port::message());
        Validator::extend('path', '\MDooley47\UrlValidator\Rules\Path@passes', Path::message());
        Validator::extend('query', '\MDooley47\UrlValidator\Rules\Query@passes', Query::message());
        Validator::extend('fragment', '\MDooley47\UrlValidator\Rules\Fragment@passes', Fragment::message());
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}