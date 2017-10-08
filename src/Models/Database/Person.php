<?php

namespace App\Models\Database;

/**
 * ...
 */
class Person extends Database
{
    /**
     * ...
     *
     * @param mixed[] $where Medoo where clause
     */
    public function __construct($where)
    {
        parent::__construct();

        if ($person = $this->database->get('people', '*', $where)) {
            $where = ['id' => $person['id']];
            $client = $this->database->get('clients', '*', $where);
            $employee = $this->database->get('employee', '*', $where);
            unset($person['id'], $client['id'], $employee['id']);

            $this->data = $where;
            $this->data['person'] = $person;
            if ($client) {
                $this->data['client'] = $client;
            }
            if ($employee) {
                $this->data['employee'] = $employee;
            }

            $this->valid = true;
        }
    }

    /**
     * Checks if object repre
     *
     * @return boolean
     */
    public function isClient()
    {
        return isset($this->data['client']);
    }

    /**
     * ...
     *
     * @return boolean
     */
    public function isEmployee()
    {
        return isset($this->data['employee']);
    }
}
