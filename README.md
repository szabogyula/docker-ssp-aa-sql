Environment variables:

```
    VIRTUAL_HOST: "aal.local"
    ENTITY_ID_DOMAIN_PART: "aa.local"
    
    ADMIN_PASSWORD: "realsecret"
    SECRETSALT: "3u4kv78gcgl950qososrluqhemlszgtb"
    LOGGING_LEVEL: "NOTICE",
    
    TECHNICALCONTACT_NAME: "aai staff"
    TECHNICALCONTACT_EMAIL: "aai@aa.local"
    ORGANIZATION_NAME: "AA Local"
    ORGANIZATION_DISPLAY_NAME: "AA Local"
    ORGANIZATION_URL: "https://aa.local"
            
    DYNAMIC_METADATA_PROVIDER: "https://mdx.eduid.hu"
    DYNAMIC_METADATA_PROVIDER_FINGERPRINT: "ValIdaTeFingerPrInt" # optional

    ATTRIBUTECOLLECTOR_DSN: "mysql:host=localhost;dbname=dbname;port=3306"
    ATTRIBUTECOLLECTOR_USERNAME: "username"
    ATTRIBUTECOLLECTOR_PASSWORD: "password"
    ATTRIBUTECOLLECTOR_TABLE: "table"
    ATTRIBUTECOLLECTOR_TABLE_UID_COLUMN_NAME: "where_the_uid_values_are_stored"
    
    # cert
    SSP_CERT: ""
    SSP_PRIVATE_KEY: ""
```

Cert MUST self signed, and ROOT (CA) certificate.