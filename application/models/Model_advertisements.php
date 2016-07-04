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

    function adv_count($user)
    {
        $this->db->select('id');
        if($user)
            $this->db->where('user_id',$user);
        return $this->db->get('advertisements')->num_rows();
    }
    
    function adv_list($user, $limit, $page)
    {
        $this->db->select('advertisements.*,users.name');
        $this->db->join('users','user_id = users.id','left');
        if($user)
            $this->db->where('user_id',$user);
        $this->db->order_by('created','desc');
        $this->db->limit($limit);
        $this->db->offset($page);
        return $this->db->get('advertisements')->result_array();
    }

}