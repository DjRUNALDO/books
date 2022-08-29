<?php

class Connection {

    private static $servername = "ec2-44-210-36-247.compute-1.amazonaws.com";
    private static $username = "ybaicgsrrcbbho";
    private static $password = "2b1369250c9bac19ecda65fc517c37bd1fc6af20dca7196b2224675dbc71ca4d";
    private static $dbname = "d6v4q6ps1megm8";
    private static $erro = "";
    private static $data = null;
    private static $conn = null;

    public static function getError() {
        $message = self::$erro;
        self::$erro = "";
        return $message;
    }

    public static function getData() {
        $data = self::$data;
        self::$data = null;
        return $data;
    }

    public static function getLastId() {
        return self::$conn
                ->query("SELECT LAST_INSERT_ID();")
                ->fetchColumn();
    }

    public static function isConnected() {
        if (self::$conn == null) {
            return self::connect();
        }
        return true;
    }

    public static function exec($sql) {
        if (self::isConnected()) {
            try {
                return self::$conn->query($sql);
            } catch (PDOException $ex) {
                self::$erro = "Erro ao executar: " . $ex->getMessage();
            } catch (Exception $ex) {
                self::$erro = "Erro genérico: " . $ex->getMessage();
            }
        }
        return false;
    }

    public static function execWithReturn($sql) {
        if (self::isConnected()) {
            try {
                $result = self::$conn->query($sql);
                return self::fetchResult($result);
            } catch (PDOException $ex) {
                self::$erro = "Erro ao consultar: " . $ex->getMessage();
            } catch (Exception $ex) {
                self::$erro = "Erro genérico: " . $ex->getMessage();
            }
        }
        return false;
    }
    
    public function __destruct() {
        self::$conn = null;
    }

    private static function fetchResult($result){
        if ($result->rowCount() > 0) {
            $result->setFetchMode(PDO::FETCH_ASSOC);
            self::$data = $result->fetchAll();
            return true;
        } else {
            self::$erro = "Nenhum registro encontrado!";
            return false;
        }
    }
    
    private static function connect() {
        try {
            self::$conn = new PDO("pgsql:host=" . self::$servername .
                    ";dbname=" . self::$dbname . ";port=5432",
                    self::$username,
                    self::$password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            self::$erro = "Falha na conexão com o banco de dados: " . $e->getMessage();
            self::$conn = null;
            return false;
        }
    }

}
