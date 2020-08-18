<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brandmodel extends CI_Model{
   
   public function BrandList(){
        $data = array();
        
        $this->db->select("*")
            ->from('brand_master')
            ->order_by('Name','ASC');
        
        $query = $this->db->get();
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = $rows;
            }
            return $data;
            
        }
        else
        {
            return $data;
        }
   }


    public function getOnlyActiveBrandList()
    {
        $data = array();
       
        $this->db->select("BrandId,Name")
            ->from('brand_master')
            ->order_by('Name','ASC');
         
         $query = $this->db->get();
         // echo $this->db->last_query();
 
         if($query->num_rows()> 0)
         {
             foreach ($query->result() as $rows)
             {
                 $data[] = $rows;
             }
             return $data;
              
         }
         else
         {
              return $data;
          }
    }










}//end of class