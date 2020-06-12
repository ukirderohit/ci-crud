<?php
class HobbiesModel extends CI_Model{
    /**
     * Returns a hobby related to particular user.
     * @return array
     */
    public function get_hobbies():array
    {
        $this->db->select('b.id, b.hobby');
        $this->db->from('hobby b');
        $this->db->join('userhobby a', 'a.hid = b.id');
        $this->db->where('a.userid',$this->session->userdata('id'));
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Returns all the users with their hobbies
     * this is for admin.
     * @return array
     */
    public function get_users():array
    {
        $this->db->select('u.username, h.id, h.hobby');
        $this->db->from('user u');
        $this->db->join('userhobby uh', 'u.id = uh.userid', 'left outer');
        $this->db->join('hobby h', 'h.id = uh.hid', 'left outer');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Returns all the user and their count of hobbies
     * for admin
     * @return array
     */
    public function get_count():array
    {
        $this->db->select('u.username, count(h.id) as maxhobby');
        $this->db->from('user u');
        $this->db->join('userhobby uh', 'u.id = uh.userid', 'left outer');
        $this->db->join('hobby h', 'h.id = uh.hid', 'left outer');
        $this->db->join('subhobby sh', 'sh.hobbyid=h.id ', 'left outer');
        $this->db->group_by('u.id');
        $this->db->order_by('count(h.id) desc');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Returns all sub hobbies for particular user/admin
     * @param string $id contains hobby id
     * @return array
     */
    public function get_subhobbies(string $id=''):array
    {
        $this->db->select('a.hid, s.id as subid, s.subhobby');
        $this->db->from('subhobby s');
        $this->db->join('userhobby a', 'a.hid = s.hobbyid');
        if (!$this->session->userData('role')==='Admin') {
            $this->db->where('a.userid',$this->session->userdata('id'));
        }
        if ($id) {
            $this->db->where('s.hobbyid',$id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Inserts dynamic records for hobby and sub hobbies
     * @return bool
     */
    public function insert_hobbies():bool
    {
        $hobby = array(
            'hobby' => $this->input->post('hobby'),
         );
        $this->db->insert('hobby', $hobby);
        $insert_id = $this->db->insert_id();
        $hobby = array(
          'userid' => $this->session->userdata('id'),
          'hid' => $insert_id
        );
        $subHobbyArr = $this->input->post('subhobby');
        foreach ($subHobbyArr as $subh) {
            $subhobby = array(
                'subhobby' => $subh,
                'hobbyid' => $insert_id,
            );
            $this->db->insert('subhobby', $subhobby);
        }

        return $this->db->insert('userhobby', $hobby);
    }

    /**
     * Inserts dynamic records for sub hobbies
     * @param $id string this will be hobbyid
     * @return void
     */
    public function insertSubHobby(string $id):void
    {
        $subHobbyArr = $this->input->post('subhobby');
        foreach ($subHobbyArr as $subh) {
            $subhobby = array(
                'subhobby' => $subh,
                'hobbyid' => $id,
            );
            $this->db->insert('subhobby', $subhobby);
        }
    }

    /**
     * Updating hobby and sub hobby
     * @param $id string hobbyid
     * @return void
     */
    public function update_hobbies(string $id):void
    {
        $data=array(
            'hobby' => $this->input->post('hobby'),
        );
        if($id==0){
            $this->db->insert('hobby',$data);
        }else{
            $this->db->where('id',$id);
            $this->db->update('hobby',$data);

            $subHobbyArr = $this->input->post('subhobby');

            foreach ($subHobbyArr as $key=>$val) {
                $subhobby = array(
                    'subhobby' => $val[0],
                );
                $this->db->where('id', $key);
                $this->db->update('subhobby', $subhobby);
            }
        }
    }
}
?>