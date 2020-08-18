<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel extends CI_Model {

    public function productList()
    {
        $data=array();
        $sql="SELECT 
                product_master.`ProductId`,
                product_master.`ProductName`,
                product_master.`Description`,
                product_master.`IsActive`,
                product_detail.`Price`,
                product_detail.`ProductCode`,
                product_detail.`InStock`,
                category_master.Description as Category,
                sub_category.`Description` AS SubCategory,
                vendor_master.`Name` AS Vendor,
                brand_master.`Name` AS Brand 
            FROM product_master 
                INNER JOIN product_detail ON product_master.`ProductId` = product_detail.`ProductId`
                left JOIN category_master ON product_master.`CategoryId` = category_master.`CategoryId` AND category_master.IsActive = 'Y'  
                left JOIN vendor_master ON product_master.`VendorId` = vendor_master.`VendorId` AND vendor_master.IsActive = 'Y' 
                left JOIN sub_category ON product_master.`SubCategoryId` = sub_category.`SubCategoryId` AND sub_category.IsActive = 'Y' 
                left JOIN brand_master ON product_master.`BrandId` = brand_master.`BrandId` AND brand_master.IsActive = 'Y' ";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = [
                    'ProductId'=>$rows->ProductId,
                    'ProductName'=>$rows->ProductName,
                    'Description'=>$rows->Description,
                    'IsActive'=>$rows->IsActive,
                    'Price'=>$rows->Price,
                    'ProductCode'=>$rows->ProductCode,
                    'InStock'=>$rows->InStock,
                    'Category'=>$rows->Category,
                    'SubCategory'=>$rows->SubCategory,
                    'Vendor'=>$rows->Vendor,
                    'Brand'=>$rows->Brand,
                    'ImgCount'=>$this->getActiveProductImageCountByProductId($rows->ProductId)
                ];
            }
            return $data;
             
        }
        else
        {
             return $data;
         }        
    }
    public function getProductDataById($ProductId)
    {
        $data = array();
       
        $this->db->select("product_master.*,product_detail.ProductDetailId,product_detail.ProductCode,product_detail.Price,product_detail.Size,product_detail.Color,product_detail.InStock,category_master.HavingSubCategory")
            ->from('product_master')
            ->join('product_detail','product_master.ProductId=product_detail.ProductId','INNER')
            ->join('category_master','product_master.CategoryId=category_master.CategoryId','INNER')
            ->where('product_master.ProductId',$ProductId)
            ->order_by('product_master.ProductName','ASC');
         
         $query = $this->db->get();
         // echo $this->db->last_query();
 
         if($query->num_rows()> 0)
		{
           $row = $query->row();
           return $data = $row;
             
        }
		else
		{
            return $data;
        }
    }

    public function insertProductMasterDetail($master,$detail)
    {
        $lastinsert_id = 0;
        try{
            $this->db->trans_begin();

           $this->db->insert('product_master', $master);
           $lastinsert_id = $this->db->insert_id();
            $details=array_merge($detail,array("ProductId"=>$lastinsert_id ));
            // pre($details);exit;
            $this->db->insert('product_detail', $details);

			if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return 0;
            } else {
                $this->db->trans_commit();
                return $lastinsert_id;
            }
        }
		catch (Exception $err) {
            echo $err->getTraceAsString();
        }
    }

    public function updateProductMasterDetail($master,$detail,$ProductId)
    {
        try {
            $this->db->trans_begin();
            //$this->db->where($where);
            $where=['ProductId'=>$ProductId];
			$this->db->update('product_master', $master,$where);
			$this->db->update('product_detail', $detail,$where);
			// echo $this->db->last_query(); exit;
			
            //$affectedRow = $this->db->affected_rows();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                
                return FALSE;
            } else {
                $this->db->trans_commit();
                
                return TRUE;
            }
        } catch (Exception $exc) {
             return FALSE;
        }
        
    }


    public function getOnlyActiveProductList()
    {
        $data = array();
       
        $this->db->select("product_master.ProductId,ProductName,ProductCode")
            ->from('product_master')
            ->join('product_detail','product_master.ProductId=product_detail.ProductId','INNER')
            ->order_by('ProductName','ASC');
         
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

    public function getActiveProductImageCountByProductId($ProductId)
    {
       
        $where=[
            'ProductId'=>$ProductId,
            'IsActive'=>'Y',
            'MediaType'=>'IMG'
        ];
		$this->db->select("*")
				->from('product_media')
                ->where($where);
		$query = $this->db->get();
		
		// echo "<br>".$this->db->last_query();
		
        return $totalCount = $query->num_rows();
    }



}// end of class