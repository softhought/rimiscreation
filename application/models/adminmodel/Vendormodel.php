<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendormodel extends CI_Model{
   
    public function VendorList()
    {
        $data=array();
        $this->db->select("*")
            ->from('vendor_master')
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

    
    public function getOnlyActiveVendorList()
    {
        $data = array();
       
        $this->db->select("VendorId,Name")
            ->from('vendor_master')
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