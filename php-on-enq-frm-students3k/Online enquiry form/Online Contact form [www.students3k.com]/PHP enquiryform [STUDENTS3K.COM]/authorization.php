<?php

require_once 'phpgen_settings.php';
require_once 'components/page.php';
require_once 'components/security/security_info.php';
require_once 'components/security/datasource_security_info.php';
require_once 'components/security/tablebased_auth.php';
require_once 'components/security/user_grants_manager.php';

require_once 'database_engine/mysql_engine.php';

$grants = array('guest' => 
        array()
    ,
    'defaultUser' => 
        array('enqform' => new DataSourceSecurityInfo(false, false, false, false))
    );

$appGrants = array('guest' => new DataSourceSecurityInfo(false, false, false, false),
    'defaultUser' => new DataSourceSecurityInfo(true, false, false, false));

$dataSourceRecordPermissions = array();

function SetUpUserAuthorization()
{
    global $grants;
    global $appGrants;
    global $dataSourceRecordPermissions;
    $userAuthorizationStrategy = new TableBasedUserAuthorization(new MyConnectionFactory(), GetGlobalConnectionOptions(), 'users', 'userid', 'userid', new HardCodedUserGrantsManager($grants, $appGrants));
    GetApplication()->SetUserAuthorizationStrategy($userAuthorizationStrategy);

GetApplication()->SetDataSourceRecordPermissionRetrieveStrategy(
    new HardCodedDataSourceRecordPermissionRetrieveStrategy($dataSourceRecordPermissions));
}

function GetIdentityCheckStrategy()
{
    return new TableBasedIdentityCheckStrategy(new MyConnectionFactory(), GetGlobalConnectionOptions(), 'users', 'userid', 'pass', ENCRYPTION_NONE);
}

?>