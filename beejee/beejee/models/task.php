<?php

class Task extends Model
{
    public function getListCount()
    {
        $sgl = "select COUNT(tasks.id) AS count from tasks ";
        return $this->db->query($sgl);
    }

    public function getListAll()
    {
        $sql = "select * from tasks";
        return $this->db->query($sql);
    }

    public function getList($page,$pagination)
    {
        $sql = "select * from tasks limit $page,$pagination";
        return $this->db->query($sql);
    }

    public function getbyId($id)
    {
        $id = (int)$id;
        $sql = "select * from tasks where id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getLastId()
    {
        $sql = "select id from tasks ORDER BY id DESC limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getSortList($sort,$page,$pagination)
    {
        switch ($sort) {
            case 'active':
                $sql = "select * from tasks WHERE status = 0 limit $page,$pagination";
                break;
            case 'done':
                $sql = "select * from tasks WHERE status = 1 limit $page,$pagination";
                break;
            case 'user-name':
                $sql = "select * from tasks ORDER BY tasks.user limit $page,$pagination";
                break;
            case 'user-email':
                $sql = "select * from tasks ORDER BY tasks.user_email limit $page,$pagination";
                break;
        }
            return $this->db->query($sql);
    }

    public function save($data, $id=null)
    {
        if ( empty($data['name']) || empty($data['email']) || empty($data['title'] || empty($data['task'])) ){
            return false;
        }else {

            $id = (int)$id;
            $name = $this->db->escape($data['name']);
            $email = $this->db->escape($data['email']);
            $title = $this->db->escape($data['title']);
            $task = $this->db->escape($data['task']);
            if (isset($data['status'])){
                $status = $this->db->escape($data['status']);
            }

            if ( !$id ){
                $sql = "
               insert into tasks
               set user = '{$name}',
                   user_email = '{$email}',
                   title = '{$title}',
                   task = '{$task}'
           ";
            }else {
                $sql = "
               update tasks
               set user = '{$name}',
                   user_email = '{$email}',
                   title = '{$title}',
                   task = '{$task}',
                   status = '{$status}'
               where id = {$id}
           ";
            }
        }

        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $id = (int)$id;
        $sql = "delete from tasks where id = {$id}";
        return $this->db->query($sql);
    }


}

?>