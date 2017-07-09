<?php

class Page extends Model
{
    public function getList($only_published = false)
    {
    $sgl = "select * from pages where 1";
        if($only_published){
            $sgl .= "and is_published = 1";
        }
        return $this->db->query($sgl);

    }

    public function getbyAlias($alias)
    {
        $alias=$this->db->escape($alias);
        $sql = "select * from pages where alias = '{$alias}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getbyId($id)
    {
        $id = (int)$id;
        $sql = "select * from pages where id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function save($data, $id=null)
    {
        if ( empty($data['alias']) || empty($data['title']) || empty($data['content']) ){
            return false;
        }else {

            $id = (int)$id;
            $alias = $this->db->escape($data['alias']);
            $title = $this->db->escape($data['title']);
            $content = $this->db->escape($data['content']);
            $is_published = isset($data['is_published']) ? 1:0;


            if ( !$id ){
                $sql = "
               insert into pages
               set alias = '{$alias}',
                   title = '{$title}',
                   content = '{$content}',
                   is_published = '{$is_published}'
           ";
            }else {
                $sql = "
               update pages
               set alias = '{$alias}',
                   title = '{$title}',
                   content = '{$content}',
                   is_published = '{$is_published}'
               where id = {$id}
           ";
            }
        }

        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $id = (int)$id;
        $sql = "delete from pages where id = {$id}";
        return $this->db->query($sql);
    }
}
