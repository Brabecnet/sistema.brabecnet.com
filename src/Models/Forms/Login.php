<?php

namespace App\Models\Forms;

use App;
use aryelgois\Gump\Form;

/**
 * ...
 */
class Login extends Form
{
    /**
     * Filters applied after the validation
     *
     * @const string[]
     */
	const GUMP_FILTERS_POST = [
		'document' => 'brazilian_document',
		'password' => 'date,Y-m-d,d/m/Y', // temporarily use birthday for testing
		//'password' => 'sha1',
	];

    /**
     * Validation rules that data must meet
     *
     * @const string[]
     */
	const GUMP_RULES = [
		'document' => 'required|brazilian_document',
		'password' => 'required|date,d/m/Y',//max_len,60|min_len,6',
	];

    /**
     * ...
     *
     * @return boolean For success or failure
     */
    public function checkLogin()
    {
        $result = false;
        if ($this->isValid()) {

			$where = $this->getValidated();
			$where['birthday'] = $where['password'];
			unset($where['password']);

            $user = new App\Models\Database\Person($where);
			if ($user->isValid()) {
				$_SESSION['user'] = $user;
				return true;
			}
        }
        return $result;
    }
}
