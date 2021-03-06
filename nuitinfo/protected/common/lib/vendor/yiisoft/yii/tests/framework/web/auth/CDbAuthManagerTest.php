<?php

require_once(dirname(__FILE__) . '/AuthManagerTestBase.php');

class CDbAuthManagerTest extends AuthManagerTestBase
{

    private $db;

    public function setUp()
    {

        if (!extension_loaded('pdo') || !extension_loaded('pdo_pgsql')) {
            $this->markTestSkipped('PDO and PostgreSQL extensions are required.');
        }

        $schemaFile = realpath(Yii::getPathOfAlias('system.web.auth.schema-pgsql') . '.sql');

        $this->db = new CDbConnection('pgsql:host=localhost;dbname=yii', 'test', 'test');
        try {
            $this->db->active = true;
        } catch (Exception $e) {
            $this->markTestSkipped(
                "Please read $schemaFile for details on setting up the test environment for PostgreSQL test case."
            );
        }

        $sqls = preg_replace('/\/\*.*\*\//s', '', file_get_contents($schemaFile));
        foreach (explode(';', $sqls) as $sql) {
            if (trim($sql) !== '') {
                $this->db->createCommand($sql)->execute();
            }
        }
        $this->db->active = false;

        $this->auth     = new CDbAuthManager;
        $this->auth->db = $this->db;
        $this->auth->init();
        $this->prepareData();
    }

    public function tearDown()
    {

        if ($this->db) {
            $this->db->active = false;
        }
    }
}
