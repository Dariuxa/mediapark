<?php

/**
 * Class model_users
 */
class model_users extends CI_Model
{

    /**
     * User registration insert
     *
     * @param array $data register user data
     */
    function register_user($data)
    {
        $this->db->insert('users', $data);
    }

    /**
     * Check users login and password
     *
     * @param string    $email      login email
     * @param string    $password   user password
     *
     * @return array    [id]
     */
    function check_login($email, $password)
    {
        return $this->db->select('id')->get_where('users',array('email'=>$email,'password'=>$password))->row_array();
    }
}