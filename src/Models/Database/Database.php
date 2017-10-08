<?php

namespace App\Models\Database;

use Medoo\Medoo;

/**
 * ...
 */
abstract class Database
{
    /**
     * Key for getting database_name from config
     *
     * @const string
     */
    const DATABASE_NAME_KEY = 'app';

    /**
     * Interface for a database
     *
     * @var Medoo\Medoo
     */
    protected $database;

    /**
     * Used by children classes to keep fetched data
     *
     * @var mixed[]
     */
    protected $data;

    /**
     * Used by children classes to tell if they are valid
     *
     * @var boolean
     */
    protected $valid;

    /**
     * Creates a new Database object
     */
    public function __construct()
    {
        $this->database = self::connect(static::DATABASE_NAME_KEY);
    }

    /**
     * Returns which properties should be serialized
     *
     * @return string[]
     */
    public function __sleep()
    {
        return ['data', 'valid'];
    }

    /**
     * Recreates the object after unserialization
     */
    public function __wakeup()
    {
        self::__construct();
    }

    /**
     * ...
     *
     * @return mixed[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * ...
     *
     * @return integer|false
     */
    public function getId()
    {
        return $this->data['id'] ?? false;
    }

    /**
     * Tells if the object is valid
     *
     * @return boolean If object was created successfuly or not
     * @return null    If validation is not implemented
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * Connects to a database using Medoo\Medoo
     *
     * @param string $database_name_key Key for a database_name from config file
     *
     * @return Medoo\Medoo
     */
    protected static function connect($database_name_key)
    {
        $config = require APP_ROOT . '/config/database.php';

        $options = $config['options'];
        $options['database_name'] = $config['databases'][$database_name_key];

        return new Medoo($options);
    }
}
