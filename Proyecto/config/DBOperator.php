<?php

class PDOConfig {

    private static $instance;
    private $host = 'localhost';
    private $db_name = 'Catalogo';
    private $user = 'root';
    private $pass = '123456';
    private $assoc = PDO::FETCH_ASSOC;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new PDOConfig();
        }
        return self::$instance;
    }

    public function getDsn() {
        return 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8';
    }

    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getAssoc() {
        return $this->assoc;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setDbName($db_name) {
        $this->db_name = $db_name;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setAssoc($assoc) {
        $this->assoc = $assoc;
    }

}

class DBDriver {

    private $pdo;
    private $last_id = -1;
    private $config;
    private $success = false;

    public function __construct(PDOConfig $pdo_conf) {
        $this->pdo = new PDO($pdo_conf->getDsn(), $pdo_conf->getUser(), $pdo_conf->getPass());
        $this->config = $pdo_conf;
    }

    public function query($query) {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->query($query);
            if ($stmt) {
                $fetch = $stmt->fetchAll($this->config->getAssoc());
                $this->last_id = $this->pdo->lastInsertId();
            } else {
                $this->pdo->rollBack();
                $this->last_id = -1;
                return false;
            }
            $this->pdo->commit();
        } catch (PDOException $ex) {
            return false;
        }
        return $fetch;
    }

    public function set($query, $exec) {
        $stmt1 = $this->pdo->prepare($query);
        try {
            $this->pdo->beginTransaction();
            $this->success = $stmt1->execute($exec);
            if ($stmt1) {
                $fetch = $stmt1->fetchAll($this->config->getAssoc());
                $this->last_id = $this->pdo->lastInsertId();
                $this->row_count = $stmt1->rowCount();
            } else {
                $this->pdo->rollBack();
                $this->last_id = -1;
                return false;
            }
            $this->pdo->commit();
        } catch (PDOException $ex) {
            return false;
        }
        return $fetch;
    }

    public function getLastId() {
        return $this->last_id;
    }

    public function getRowCount() {
        return $this->row_count;
    }

    public function getSuccess() {
        return $this->success;
    }

}
