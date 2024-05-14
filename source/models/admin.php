<?php
require_once('connection.php');
class Admin
{
    public $username;
    public $password;
    public $createAt;
    public $updateAt;
    public $init=0;

    public function __construct($username, $password, $init, $createAt, $updateAt)
    {
        $this->username = $username;
        $this->password = $password;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->init = $init;
    }

    static function insert($username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db = DB::getInstance();
        $req = $db->query("INSERT INTO admin (username, password, init, createAt, updateAt) VALUES ('$username', '$password', 0, NOW(), NOW());");
        return $req;
    }

    static function getInit($username){
        $db = DB::getInstance();
        $req = $db->query("SELECT init FROM admin WHERE username = '$username'");
        $result = $req->fetch_assoc();
        return $result['init'];
    }


    static function delete($username)
    {
        
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM admin WHERE username = '$username';");
        echo '<script>alert("'.$username.'")</script>';
        return $req;
    }

    static function validation($username, $password)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM admin WHERE username = '$username'");
        if (@password_verify($password, $req->fetch_assoc()['password']))
            return true;
        else
            return false;
    }

    static function changePassword($username, $oldpassword, $newpassword)
    {
        if (Admin::validation($username, $oldpassword)) {
            $password = password_hash($newpassword, PASSWORD_DEFAULT);
            $db = DB::getInstance();
            $req = $db->query(
                "UPDATE admin
                SET password = '$password', updateAt = NOW()
                WHERE username = '$username';"
            );
            return $req;
        } else {
            return false;
        }
    }

    static function changePassword_($username, $newpassword)
    {
        $password = password_hash($newpassword, PASSWORD_DEFAULT);
        $db = DB::getInstance();
        $req = $db->query(
            "UPDATE admin
            SET password = '$password', updateAt = NOW()
            WHERE username = '$username';"
        );
        return $req;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM admin");
        $admins = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $admin) {
            $admins[] = new Admin(
                $admin['username'],
                $admin['password'],
                $admin['createAt'],
                $admin['updateAt'],
                $admin['init']
            );
        }
        return $admins;
    }
}
