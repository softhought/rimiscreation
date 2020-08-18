<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorymodel extends CI_Model{
   
    public function getCategoryList()
    {
        $data = array();
       
        $this->db->select("*")
            ->from('category_master')
            ->order_by('AppearanceSerial','ASC');
         
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
   
    public function getOnlyActiveCategoryList()
    {
        $data = array();
       $where=[
        "IsActive"=>'Y'
       ];
        $this->db->select("CategoryId,Description,HavingSubCategory,IsCustomizable")
            ->from('category_master')
            ->where($where)
            ->order_by('Description','ASC');
         
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


    public function getOnlyListOfCatagoryhavingSubCatagoryAndActive()
    {
        $data = array();
        $where=[
            "IsActive"=>'Y',
            "HavingSubCategory"=>'Y'
           ];
        $this->db->select("CategoryId,Description,HavingSubCategory,IsCustomizable")
            ->from('category_master')
            ->where($where)
            ->order_by('Description','ASC');
         
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