<?php

class conf {

    static public $Host = '123.231.237.203';
    static public $Port = 389;
    static public $RDN = "dc=ns1,dc=ppsdma,dc=bpsdm,dc=dephub,dc=go,dc=id";
    static public $AdminUsername = "cn=admin";
    static public $AdminPassword = "d0d0lgarUT";
    static public $OrganizationalUnit = "ou=people";
    static public $UserAttribute = "uid="; // bisa juga cn
    static public $GIDNumber = 502;

}

class LDAP {

    private $Host;
    private $Port;
    private $RDN;
    private $AdminUsername;
    private $Filter;
    private $AdminPassword;
    private $Connection;
    private $Bind;
    private $OrganizationalUnit;
    private $UserAttribute;

    public function __construct() {

        $this->OrganizationalUnit = conf::$OrganizationalUnit;
        $this->UserAttribute = conf::$UserAttribute;


        $array = array('Host' => conf::$Host,
            'Port' => conf::$Port,
            'RDN' => conf::$RDN,
            'AdminUsername' => conf::$AdminUsername,
            'AdminPassword' => conf::$AdminPassword);

        foreach ($array as $k => $v) {

            $this->{$k} = $v;

            $funct = "set" . ucfirst($k);
            $this->{$funct}($v);
        }
        $this->setFilter("(|($this->UserAttribute*))");
    }

    public function getHost() {
        return $this->Host;
    }

    public function getPort() {
        return $this->Port;
    }

    public function getRDN() {
        return $this->RDN;
    }

    public function getAdminUsername() {
        return $this->AdminUsername;
    }

    public function getAdminPassword() {
        return $this->AdminPassword;
    }

    public function getFilter() {
        return $this->Filter;
    }

    public function setHost($Host) {
        $this->Host = $Host;
    }

    public function setPort($Port) {
        $this->Port = $Port;
    }

    public function setRDN($RDN) {
        $this->RDN = $RDN;
    }

    public function setAdminUsername($user) {
        $this->AdminUsername = $user;
    }

    public function setAdminPassword($AdminPassword) {
        $this->AdminPassword = $AdminPassword;
    }

    public function setFilter($Filter) {
        $this->Filter = $Filter;
    }

    public function connect() {

        $this->Connection = ldap_connect($this->Host, $this->Port)
                or die("Could not connect to {$this->Host}");
    }

    public function disconnect() {
        return ldap_close($this->Connection);
    }

    public function getUserLdapInfo($user) {
        $infos = array();
        $dn = $this->OrganizationalUnit . "," . $this->RDN;
        $Filter = "(uid=" . $user . ")";
        $sr = ldap_search($this->Connection, $dn, $Filter);
        $data = ldap_get_entries($this->Connection, $sr);

        for ($z = 0; $z < count($data[0]['objectclass']) - 1; $z++) {
            $infos[key($data[0])] = $data[0]['objectclass'][$z];
        }
        for ($i = 0; $i < $data["count"]; $i++) {
            for ($j = 1; $j < $data[$i]["count"]; $j++) {
                $infos[$data[$i][$j]] = $data[$i][$data[$i][$j]][0];
            }
        }
        return $infos;
    }

    public function verifyUser($user, $passwd) {
        $userdata = $this->getUserLdapInfo($user);
        $conn = ldap_connect($this->Host, $this->Port);
        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        var_dump($userdata);
        $user = "cn=" . $userdata['cn'] . ',' . $this->OrganizationalUnit . ',' . $this->RDN;
        return (@ldap_bind($conn, $user, $passwd)) ? true : false;
    }

}

function auth_with_ldap($user, $pass) {
    $test = new LDAP();
    $test->connect();
    return $test->verifyUser($user, $pass);
    $test->disconnect();
}