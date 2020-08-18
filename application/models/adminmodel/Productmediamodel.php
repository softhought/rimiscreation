<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productmediamodel extends CI_Model{
   
  

   public function MediaList(){
        $data = array();
        
        $this->db->select("product_master.ProductName,product_detail.ProductCode,product_media.*")
            ->from('product_media')
            ->join('product_master','product_media.ProductId=product_master.ProductId','INNER')
            ->join('product_detail','product_master.ProductId=product_detail.ProductId','INNER')
            ->order_by('product_media.ProductMediaId desc, product_media.SerialNo asc');
        
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