<?php

namespace app\models;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;

class User extends UserModel
{
    public int $id = 0;
    public string $userType = '';
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public static function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return ['userType', 'name', 'email', 'password'];
    }

    public function rules()
    {
        return [
            'userType' => [self::RULE_REQUIRED],
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'passwordConfirm' => [[self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }

    public function getDisplayName(): string
    {
        return $this->name;
    }

    public function getDisplayType(): string
    {
        return $this->userType;
    }

    public function userTypeTree($parent_id = 0, $sub_mark = ''){
        $db = Application::$app->db;

        $statement = $db->prepare("SELECT * FROM user_type WHERE parent_id = $parent_id ORDER BY id ASC");
        $statement->execute();

        if($statement->rowCount() > 0){
            while($row = $statement->fetch()){
                echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
                $this->userTypeTree($row['id'], $sub_mark.'&nbsp;&nbsp;&nbsp;');
            }
        }
    }
}