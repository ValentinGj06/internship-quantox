<?php

class m0001_users {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                userType INT NOT NULL,
                email VARCHAR(255) NOT NULL,
                name VARCHAR(255) NOT NULL,
                password VARCHAR(512) NOT NULL
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}