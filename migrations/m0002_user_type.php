<?php

class m0002_user_type {
    public function up()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "CREATE TABLE user_type (
                id INT AUTO_INCREMENT PRIMARY KEY,
                parent_id INT NOT NULL DEFAULT 0,
                name VARCHAR(255) NOT NULL
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);

        // Populate user_type table with all types of users
		$SQL = "INSERT INTO `user_type`(`parent_id`, `name`) VALUES 
				(0, 'Front End Developer'),
				(0, 'Back End Developer'),
				(1, 'Angular'),
				(1, 'React'),
				(1, 'Vue'),
				(2, 'PHP'),
				(2, 'NodeJs'),
				(3, 'AngularJs'),
				(3, 'Angular 2'),
				(4, 'ReactNative'),
				(6, 'Symfony'),
				(6, 'Laravel'),
				(7, 'Express'),
				(7, 'NestJS'),
				(11, 'Silex'),
				(12, 'Lumen');";
        $db->pdo->exec($SQL);
        
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE user_type;";
        $db->pdo->exec($SQL);
    }
}