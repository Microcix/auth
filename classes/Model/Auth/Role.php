<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Default auth role
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Model_Auth_Role extends ORM {

	// Relationships
	protected $_has_many = array(
		'users' => array('model' => 'User','through' => 'roles_users'),
	);

	public function rules()
	{
		return array(
			'name' => array(
				array('not_empty'),
				array('min_length', array(':value', 4)),
				array('max_length', array(':value', 32)),
			),
			'description' => array(
				array('max_length', array(':value', 255)),
			)
		);
	}
        
    public function create_field($values, $expected) {
        //$this->ml_add_date = date('Y-m-d');
        //$this->ml_add_time = date('H:i:s');
        
        return $this->values($values, $expected)->create();
    }
    
    public function update_field($values, $expected) {
        //$this->ml_update_date = date('Y-m-d');
        //$this->ml_update_time = date('H:i:s');
        
        return $this->values($values, $expected)->update();
    }
        

} // End Auth Role Model
