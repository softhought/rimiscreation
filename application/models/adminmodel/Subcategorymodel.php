<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategorymodel extends CI_Model{
   
    public function getSubCategoryList()
    {
        $data = array();
        $sql= "SELECT category_master.`CategoryId`,
                    category_master.`Description` AS CategoryDesc,
                    category_master.`IsCustomizable`,
                    sub_category.`SubCategoryId`,
                    sub_category.`Description` SubCatDesc,
                    sub_category.AppearanceSerial,
                    sub_category.IsActive
                FROM
                    sub_category 
                    INNER JOIN category_master 
                    ON sub_category.`CategoryId` = category_master.`CategoryId`  order by sub_category.AppearanceSerial asc";
        $query=$this->db->query($sql);
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


    public function getOnlyActiveSubCategoryList()
    {
        $data = array();
       
        $this->db->select("SubCategoryId,Description")
            ->from('sub_category')
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