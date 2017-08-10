<?php
class Home_model extends CI_Model
{
    function checkRecord($table, $where)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    function getRecords($table, $select_fields='', $where='', $order='', $limit='')
    {
        if(count($select_fields) > 0){
            $this->db->select(implode(',', $select_fields));
        }
        if(count($where) > 0){
            foreach ($where as $key => $value) {
                if($key=='null'){
                    $this->db->where("$value");
                }else{
                    $this->db->where($key, $value);
                }
            }
        }
        if(!empty($order)){
            $this->db->order_by("$order");
        }
        if(!empty($limit)){
            $this->db->limit("$limit");
        }
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function saveRecord($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function updateRecord($table, $fields, $data)
    {
        foreach ($fields as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    function deleteRecord($table, $fields)
    {
        foreach ($fields as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
    
    function updateVersion(){
        
        $date = date('Y-m-d H:i:s');
        $this->db->query("update version set version = version + 1, updated_at = '$date'");
        return $this->db->affected_rows();
    }
    
    function getSchedules($day)
    {
        $query = $this->db->query("select day, time, title, description from schedule where day = '$day' order by time ASC");
        
        return $query->result_array();
    }
}
