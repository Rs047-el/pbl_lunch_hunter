<?php
class Model
{
    protected $table;
    protected $db;

    protected static $conf = [
        'host'   => 'mysql',
        'user'   => 'root',
        'pass'   => 'root',
        'dbname' => 'test'
    ];

    protected static $codes = [
        'user_type' => ['1' => '社員', '9' => '管理者']
    ];

    public function __construct()
    {
        $conf = self::$conf;

        $dsn = "mysql:host={$conf['host']};dbname={$conf['dbname']};charset=utf8";

        try {
            $this->db = new PDO($dsn, $conf['user'], $conf['pass']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit("DB接続エラー: " . $e->getMessage());
        }
    }
}
