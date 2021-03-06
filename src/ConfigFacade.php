<?php
namespace Hirak\Prestissimo;

use Composer\Composer;
use Composer\Config;

class ConfigFacade
{
    public static function getUserAgent()
    {
        static $ua;
        if ($ua) {
            return $ua;
        }

        return $ua = sprintf(
            'Composer/%s (%s; %s; %s)',
            Composer::VERSION === '@package_version@' ? 'source' : Composer::VERSION,
            php_uname('s'),
            php_uname('r'),
            self::getPHPVersion()
        );
    }

    /**
     * @codeCoverageIgnore
     */
    private static function getPHPVersion()
    {
        if (defined('HHVM_VERSION')) {
            return 'HHVM ' . HHVM_VERSION;
        }
        return 'PHP ' . PHP_VERSION;
    }
}
