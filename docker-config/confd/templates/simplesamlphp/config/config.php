<?php

$config = [

    'baseurlpath' => 'https://{{ getenv "VIRTUAL_HOST" }}/simplesaml/',
    'certdir' => 'cert/',
    'loggingdir' => '/var/simplesamlphp/log',
    'datadir' => 'data/',
    'tempdir' => '/tmp/simplesaml',


    'debug' => true,
    'showerrors' => true,
    'errorreporting' => true,
    'debug.validatexml' => false,

    'auth.adminpassword' => '{{ getenv "ADMIN_PASSWORD" "realsecret"}}',
    'admin.protectindexpage' => false,
    'admin.protectmetadata' => false,

    'secretsalt' => '{{ getenv "SECRETSALT" "3u4kv78gcgl950qososrluqhemlszgtb" }}',

    'technicalcontact_name' => '{{ getenv "TECHNICALCONTACT_NAME" "sztaki aai staff" }}',
    'technicalcontact_email' => '{{ getenv "TECHNICALCONTACT_EMAIL" "aai@sztaki.hu" }}',

    'timezone' => 'Europe/Budapest',

    'logging.level' => SimpleSAML_Logger::{{ getenv "LOGGING_LEVEL" "NOTICE" }},
    'logging.handler' => 'errorlog',
    'logging.facility' => defined('LOG_LOCAL5') ? constant('LOG_LOCAL5') : LOG_USER,
    'logging.processname' => 'simplesamlphp',
    'logging.logfile' => 'simplesamlphp.log',

    'statistics.out' => [],
    'database.dsn' => 'mysql:host=localhost;dbname=saml',
    'database.username' => 'simplesamlphp',
    'database.password' => 'secret',
    'database.prefix' => '',
    'database.persistent' => false,
    'database.slaves' => [],


    'enable.saml20-idp' => false,
    'enable.shib13-idp' => false,
    'enable.adfs-idp' => false,
    'enable.wsfed-sp' => false,
    'enable.authmemcookie' => false,

    'module.enable' => [
      'aa' => true,
    ],

    'session.duration' => 8 * (60 * 60), // 8 hours.
    'session.datastore.timeout' => (4 * 60 * 60), // 4 hours
    'session.state.timeout' => (60 * 60), // 1 hour
    'session.cookie.name' => 'SimpleSAMLSessionID',
    'session.cookie.lifetime' => 0,
    'session.cookie.path' => '/',

    'session.cookie.domain' => null,
    'session.cookie.secure' => false,
    'enable.http_post' => false,
    'session.phpsession.cookiename' => null,
    'session.phpsession.savepath' => null,
    'session.phpsession.httponly' => true,
    'session.authtoken.cookiename' => 'SimpleSAMLAuthToken',
    'session.rememberme.enable' => false,
    'session.rememberme.checked' => false,
    'session.rememberme.lifetime' => (14 * 86400),
    'language.available' => [
        'en', 'hu'
    ],
    'language.rtl' => ['ar', 'dv', 'fa', 'ur', 'he'],
    'language.default' => 'hu',

    /*
     * Options to override the default settings for the language parameter
     */
    'language.parameter.name' => 'language',
    'language.parameter.setcookie' => true,

    /*
     * Options to override the default settings for the language cookie
     */
    'language.cookie.name' => 'language',
    'language.cookie.domain' => null,
    'language.cookie.path' => '/',
    'language.cookie.lifetime' => (60 * 60 * 24 * 900),
    'attributes.extradictionary' => null,
    'theme.use' => 'default',
    'default-wsfed-idp' => 'urn:federation:pingfederate:localhost',

    'idpdisco.enableremember' => true,
    'idpdisco.rememberchecked' => true,
    'idpdisco.validate' => true,
    'idpdisco.extDiscoveryStorage' => null,
    'idpdisco.layout' => 'dropdown',
    'shib13.signresponse' => false,

    'authproc.idp' => [],
    'authproc.sp' => [],
    'authproc.aa' => [
        50 => [
            'class'     => 'sqlattribs:AttributeFromSQL',
            'attribute' => '{{ getenv "ATTRIBUTE_FROM_SQL_ATTRIBUTE" "eppn"}}',
            'limit'     => ['{{ getenv "ATTRIBUTE_FROM_SQL_LIMIT"}}'],
            'replace'   => {{ getenv "ATTRIBUTE_FROM_SQL_REPLACE" "false"}},
            'database'  => [
                'dsn'       => 'mysql:host=localhost;dbname={{ getenv "ATTRIBUTE_FROM_SQL_DATABASE_DSN"}}',
                'username'  => '{{ getenv "ATTRIBUTE_FROM_SQL_DATABASE_USERNAME"}}',
                'password'  => '{{ getenv "ATTRIBUTE_FROM_SQL_DATABASE_PASSWORD"}}',
                'table'     => '{{ getenv "ATTRIBUTE_FROM_SQL_DATABASE_TABLE"}}',
            ],
        ],
    ],

    'metadata.sources' => [
        ['type' => 'flatfile'],
        [
           'type' => 'mdx',
           'server' => '{{ getenv "DYNAMIC_METADATA_PROVIDER" }}',
           {{ if getenv "DYNAMIC_METADATA_PROVIDER_FINGERPRINT" }}
           'validateFingerprint' => "{{ getenv "DYNAMIC_METADATA_PROVIDER_FINGERPRINT" }}",
           {{ end }}
           'cachedir' => '/tmp',
           'cachelength' => 86400
        ],
    ],


    'store.type'                    => 'phpsession',

    'store.sql.dsn'                 => 'sqlite:/path/to/sqlitedatabase.sq3',
    'store.sql.username' => null,
    'store.sql.password' => null,
    'store.sql.prefix' => 'SimpleSAMLphp',

    'memcache_store.servers' => [
        [
            ['hostname' => 'localhost'],
        ],
    ],
    'memcache_store.prefix' => null,
    'memcache_store.expires' => 36 * (60 * 60), // 36 hours.

    'metadata.sign.enable' => false,

    'metadata.sign.privatekey' => null,
    'metadata.sign.privatekey_pass' => null,
    'metadata.sign.certificate' => null,

    'proxy' => null,
    'trusted.url.domains' => [],

];
