<?php

/**
 * Class model_advertisements
 */
class model_advertisements extends CI_Model
{

    /**
     * Create advertisement
     *
     * @param array $data Data array
     *
     * @return int  created advertisement ID
     */
    function create_advertisement($data)
    {
        $this->db->insert('advertisements', $data);
    }

}