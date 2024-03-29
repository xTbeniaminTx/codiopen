<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class MY_Model extends CI_Model
{
    public function count($champ = array(), $valeur = null) // Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
    {
        return (int) $this->db->where($champ, $valeur)
            ->from($this->table)
            ->count_all_results();
    }

    public function create($options_echappees = array(), $options_non_echappees = array())
    {
        //	Vérification des données à insérer
        if(empty($options_echappees) AND empty($options_non_echappees))
        {
            return false;
        }

        return (bool) $this->db->set($options_echappees)
            ->set($options_non_echappees, null, false)
            ->insert($this->table);
    }

    public function update($where, $options_echappees = array(), $options_non_echappees = array())
    {
        //	Vérification des données à mettre à jour
        if(empty($options_echappees) AND empty($options_non_echappees))
        {
            return false;
        }

        //	Raccourci dans le cas où on sélectionne l'id
        if(is_integer($where))
        {
            $where = array('id' => $where);
        }

        return (bool) $this->db->set($options_echappees)
            ->set($options_non_echappees, null, false)
            ->where($where)
            ->update($this->table);

    }

    public function delete($where)
    {
        if(is_integer($where))
        {
            $where = array('id' => $where);
        }

        return (bool) $this->db->where($where)
            ->delete($this->table);
    }

    public function read($select = '*', $where = array(), $nb = null, $debut = null)
    {
        return $this->db->select($select)
            ->from($this->table)
            ->where($where)
            ->limit($nb, $debut)
            ->get()
            ->result();
    }

}