<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function auth($usr,$pwd){
    require_once(APPPATH."/third_party/ldap_auth/ldap_ppsdma.php");
    return auth_with_ldap($usr, $pwd);
}
