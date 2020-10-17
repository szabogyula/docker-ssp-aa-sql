<?php
/**
 * SAML 2.0 AA configuration for simpleSAMLphp.
 *
 */

$metadata['https://{{ getenv "ENTITY_ID_DOMAIN_PART"}}/aa'] = array(
        /*
         * The hostname of the server (VHOST) that will use this SAML entity.
         *
         * Can be '__DEFAULT__', to use this entry by default.
         */
        'host' => '__DEFAULT__',

        /* X.509 key and certificate. Relative to the cert directory. */
        'privatekey' => 'server.pem',
        'certificate' => 'server.crt',

        'OrganizationName' => '{{ getenv "ORGANIZATION_NAME"}}',
        'OrganizationDisplayName' => '{{ getenv "ORGANIZATION_DISPLAY_NAME"}}',
        'OrganizationURL' => '{{ getenv "ORGANIZATION_URL"}}',

);
