<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Productmodel extends CI_Model{

   
    public function getproductByCatagoryId($CategoryId,$limit,$start)
    {
        $data=array();
        $sql="SELECT 
                category_master.CategoryId,
                category_master.Description as Catagory,
                category_master.HavingSubCategory,
                category_master.IsCustomizable,
                /*sub_category.SubCategoryId,
                sub_category.Description as SubCatagory,*/
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description as Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock,
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
                FROM
                category_master                
                Inner JOIN product_master 
                    ON category_master.CategoryId = product_master.CategoryId 
                    AND product_master.IsActive = 'Y' 
                /* LEFT JOIN sub_category 
                    ON category_master.CategoryId = sub_category.CategoryId 
                    AND sub_category.IsActive = 'Y' */
                LEFT JOIN product_detail 
                    ON product_master.ProductId = product_detail.ProductId 
                LEFT JOIN brand_master 
                    ON product_master.BrandId = brand_master.`BrandId` 
                    AND brand_master.IsActive = 'Y' 
                LEFT JOIN vendor_master 
                    ON product_master.VendorId = vendor_master.`VendorId` 
                    AND vendor_master.IsActive = 'Y' 
                WHERE category_master.IsActive = 'Y' 
                AND category_master.CategoryId = $CategoryId
                ORDER BY category_master.CategoryId  LIMIT $limit OFFSET $start ";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = [
                    'CategoryId'=>$rows->CategoryId,
                    'Catagory'=>$rows->Catagory,
                    'HavingSubCategory'=>$rows->HavingSubCategory,
                    'IsCustomizable'=>$rows->IsCustomizable,
                    // 'SubCategoryId'=>$rows->SubCategoryId,
                    // 'SubCatagory'=>$rows->SubCatagory,
                    'Product'=>$rows->Product,
                    'ProductName'=>$rows->ProductName,
                    'ProductId'=>$rows->ProductId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'InStock'=>$rows->InStock,
                    'BrandId'=>$rows->BrandId,
                    'Name'=>$rows->Name,
                    'Logo'=>$rows->Logo,
                    'LogoPath'=>$rows->LogoPath,
                    'VendorId'=>$rows->VendorId,
                    'BusinessName'=>$rows->BusinessName,
                    'BusinessAddress'=>$rows->BusinessAddress,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }
    public function getTotalProductCountByCatagoryId($CategoryId)
    {
        $totalCount=0;
        $sql="SELECT 
                category_master.CategoryId,
                category_master.Description as Catagory,
                category_master.HavingSubCategory,
                category_master.IsCustomizable,
                /* sub_category.SubCategoryId,
                sub_category.Description as SubCatagory,*/
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description as Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock,
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
                FROM
                category_master                
                Inner JOIN product_master 
                    ON category_master.CategoryId = product_master.CategoryId 
                    AND product_master.IsActive = 'Y' 
                /* LEFT JOIN sub_category 
                    ON category_master.CategoryId = sub_category.CategoryId 
                    AND sub_category.IsActive = 'Y' */
                LEFT JOIN product_detail 
                    ON product_master.ProductId = product_detail.ProductId 
                LEFT JOIN brand_master 
                    ON product_master.BrandId = brand_master.`BrandId` 
                    AND brand_master.IsActive = 'Y' 
                LEFT JOIN vendor_master 
                    ON product_master.VendorId = vendor_master.`VendorId` 
                    AND vendor_master.IsActive = 'Y' 
                WHERE category_master.IsActive = 'Y' 
                AND category_master.CategoryId = $CategoryId
                ORDER BY category_master.CategoryId ";

        $query=$this->db->query($sql);
        return $totalCount = $query->num_rows();

    }


    public function getproductBySubCatagoryId($SubCatagoryId,$limit,$start)
    {
        $data=array();
        $sql="SELECT 
                category_master.CategoryId,
                category_master.Description AS Catagory,
                category_master.HavingSubCategory,
                category_master.IsCustomizable,
                sub_category.SubCategoryId,
                sub_category.Description as SubCatagory,
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description AS Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock,
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
            FROM
                product_master  
                INNER JOIN category_master 
                ON product_master.CategoryId =category_master.CategoryId 
                AND product_master.IsActive = 'Y' 
                INNER JOIN sub_category ON product_master.SubCategoryId = sub_category.SubCategoryId    
                LEFT JOIN product_detail 
                ON product_master.ProductId = product_detail.ProductId 
                LEFT JOIN brand_master 
                ON product_master.BrandId = brand_master.`BrandId` 
                AND brand_master.IsActive = 'Y' 
                LEFT JOIN vendor_master 
                ON product_master.VendorId = vendor_master.`VendorId` 
                AND vendor_master.IsActive = 'Y' 
            WHERE product_master.`SubCategoryId` = $SubCatagoryId  LIMIT $limit OFFSET $start";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = [
                    'CategoryId'=>$rows->CategoryId,
                    'Catagory'=>$rows->Catagory,
                    'HavingSubCategory'=>$rows->HavingSubCategory,
                    'IsCustomizable'=>$rows->IsCustomizable,
                    'SubCategoryId'=>$rows->SubCategoryId,
                    'SubCatagory'=>$rows->SubCatagory,
                    'Product'=>$rows->Product,
                    'ProductName'=>$rows->ProductName,
                    'ProductId'=>$rows->ProductId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'InStock'=>$rows->InStock,
                    'BrandId'=>$rows->BrandId,
                    'Name'=>$rows->Name,
                    'Logo'=>$rows->Logo,
                    'LogoPath'=>$rows->LogoPath,
                    'VendorId'=>$rows->VendorId,
                    'BusinessName'=>$rows->BusinessName,
                    'BusinessAddress'=>$rows->BusinessAddress,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }


    public function getproductTotalCountBySubCatagoryId($SubCategoryId)
    {
        $totalCount=0;
        $sql="SELECT 
                category_master.CategoryId,
                category_master.Description AS Catagory,
                category_master.HavingSubCategory,
                category_master.IsCustomizable,
                sub_category.SubCategoryId,
                sub_category.Description as SubCatagory,
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description AS Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock,
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
            FROM
                product_master  
                INNER JOIN category_master 
                ON product_master.CategoryId =category_master.CategoryId 
                AND product_master.IsActive = 'Y' 
                INNER JOIN sub_category ON product_master.SubCategoryId = sub_category.SubCategoryId    
                LEFT JOIN product_detail 
                ON product_master.ProductId = product_detail.ProductId 
                LEFT JOIN brand_master 
                ON product_master.BrandId = brand_master.`BrandId` 
                AND brand_master.IsActive = 'Y' 
                LEFT JOIN vendor_master 
                ON product_master.VendorId = vendor_master.`VendorId` 
                AND vendor_master.IsActive = 'Y' 
            WHERE product_master.`SubCategoryId` = $SubCategoryId ";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();
        return $totalCount = $query->num_rows();
       

    }



    public function getSingleProductImageOnlyByProductId($ProductId)
    {
        $data = "";
        $where=[
            'ProductId'=>$ProductId,
            'IsActive'=>'Y',
            'MediaType'=>'IMG'
        ];
		$this->db->select("*")
				->from('product_media')
                ->where($where)
                ->order_by('SerialNo')
				->limit(1);
		$query = $this->db->get();
		
		// echo "<br>".$this->db->last_query();
		
		if($query->num_rows()> 0)
		{
           $row = $query->row();
           return $data = $row->MediaPath;
             
        }
		else
		{
            return $data;
        }

    }


    public function getSingleProductAllImageProductId($ProductId)
    {
        $data = "";
        $where=[
            'ProductId'=>$ProductId,
            'IsActive'=>'Y',
            'MediaType'=>'IMG'
        ];
		$this->db->select("*")
				->from('product_media')
                ->where($where)
                ->order_by('SerialNo');
		$query = $this->db->get();
		
		// echo "<br>".$this->db->last_query();
		
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
    
    public function getproductByProductId($ProductId)
    {
        $data=array();
        $sql="SELECT 
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description AS Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock, 
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
                FROM product_master
                                
            INNER JOIN product_detail  ON product_master.ProductId = product_detail.ProductId 
            LEFT JOIN brand_master ON product_master.BrandId = brand_master.`BrandId` 
                AND brand_master.IsActive = 'Y' 
            LEFT JOIN vendor_master  ON product_master.VendorId = vendor_master.`VendorId` 
                AND vendor_master.IsActive = 'Y' 
                WHERE product_master.IsActive = 'Y' AND product_master.ProductId = $ProductId  ";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data = [                    
                    'Product'=>$rows->Product,
                    'ProductName'=>$rows->ProductName,
                    'ProductId'=>$rows->ProductId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'InStock'=>$rows->InStock,
                    'BrandId'=>$rows->BrandId,
                    'Name'=>$rows->Name,
                    'Logo'=>$rows->Logo,
                    'LogoPath'=>$rows->LogoPath,
                    'VendorId'=>$rows->VendorId,
                    'BusinessName'=>$rows->BusinessName,
                    'BusinessAddress'=>$rows->BusinessAddress,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }

    public function getproductWithAllImgByProductId($ProductId)
    {
        $data=array();
        $sql="SELECT 
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description AS Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.Size,
                product_detail.Color,
                product_detail.InStock, 
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
                FROM product_master
                                
            INNER JOIN product_detail  ON product_master.ProductId = product_detail.ProductId 
            LEFT JOIN brand_master ON product_master.BrandId = brand_master.`BrandId` 
                AND brand_master.IsActive = 'Y' 
            LEFT JOIN vendor_master  ON product_master.VendorId = vendor_master.`VendorId` 
                AND vendor_master.IsActive = 'Y' 
                WHERE product_master.IsActive = 'Y' AND product_master.ProductId = $ProductId  ";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data = [                    
                    'Product'=>$rows->Product,
                    'ProductName'=>$rows->ProductName,
                    'ProductId'=>$rows->ProductId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'Size'=>$rows->Size,
                    'Color'=>$rows->Color,
                    'InStock'=>$rows->InStock,
                    'BrandId'=>$rows->BrandId,
                    'Name'=>$rows->Name,
                    'Logo'=>$rows->Logo,
                    'LogoPath'=>$rows->LogoPath,
                    'VendorId'=>$rows->VendorId,
                    'BusinessName'=>$rows->BusinessName,
                    'BusinessAddress'=>$rows->BusinessAddress,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId),
                    'AllImg'=>$this->getSingleProductAllImageProductId($rows->ProductId)

                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }

    public function getSingleProductByProductId($ProductId)
    {
        $data =array();
        $where=[
            'IsActive'=>'Y',
            'product_master.ProductId'=>$ProductId
        ];
		$this->db->select("product_master.*,product_detail.ProductDetailId,product_detail.ProductCode,product_detail.Price,product_detail.InStock")
                ->from('product_master')
                ->join('product_detail','product_master.ProductId=product_detail.ProductId','INNER')
                ->where($where);
		$query = $this->db->get();
		
		// echo "<br>".$this->db->last_query();exit;
        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data = [
                    'ProductId'=>$rows->ProductId,
                    'CategoryId'=>$rows->CategoryId,
                    'SubCategoryId'=>$rows->SubCategoryId,
                    'VendorId'=>$rows->VendorId,
                    'ProductName'=>$rows->ProductName,
                    'Description'=>$rows->Description,
                    'BrandId'=>$rows->BrandId, 
                    'ProductDetailId'=>$rows->ProductDetailId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'InStock'=>$rows->InStock,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }


    public function getSingleProductByProductIdForCartList($ProductId,$CartCount)
    {
        $data =array();
        $where=[
            'IsActive'=>'Y',
            'product_master.ProductId'=>$ProductId
        ];
		$this->db->select("product_master.*,product_detail.ProductDetailId,product_detail.ProductCode,product_detail.Price,product_detail.InStock")
                ->from('product_master')
                ->join('product_detail','product_master.ProductId=product_detail.ProductId','INNER')
                ->where($where);
		$query = $this->db->get();
		
		// echo "<br>".$this->db->last_query();exit;
        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $totalPrice=0;
                for ($i=0; $i < $CartCount; $i++) { 
                    $totalPrice+=$rows->Price;
                }
                $data = [
                    'ProductId'=>$rows->ProductId,
                    'CategoryId'=>$rows->CategoryId,
                    'SubCategoryId'=>$rows->SubCategoryId,
                    'VendorId'=>$rows->VendorId,
                    'ProductName'=>$rows->ProductName,
                    'Description'=>$rows->Description,
                    'BrandId'=>$rows->BrandId, 
                    'ProductDetailId'=>$rows->ProductDetailId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'CartCount'=>$CartCount,
                    'CartTotalPrice'=>$totalPrice,
                    'InStock'=>$rows->InStock,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }
    
    public function getProductTotalPriceProductId($ProductId)
    {
        $data =0;
        $where=[
            'IsActive'=>'Y',
            'product_master.ProductId'=>$ProductId
        ];
		$this->db->select("sum(product_detail.Price) as TotalCartAmount")
                ->from('product_master')
                ->join('product_detail','product_master.ProductId=product_detail.ProductId','INNER')
                ->where($where);
		$query = $this->db->get();
		
		// echo "<br>".$this->db->last_query();exit;
        if($query->num_rows()> 0)
        {
            $row = $query->row();
            return $data = $row->TotalCartAmount;
            
        }
        else
        {
            return $data;
        }  

    }


    public function GeAllActiveCatagorySubcatagoryList()
    {
        $data = array();
        $where=[
            'IsActive'=>'Y',
        ];
		$this->db->select("*")
				->from('category_master')
                ->where($where)
                ->order_by('AppearanceSerial');
		$query = $this->db->get();
		
		#echo "<br>".$this->db->last_query();
		
		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
            {
                $data[] = [
                    'CategoryId'=>$rows->CategoryId,
                    'Description'=>$rows->Description,
                    'HavingSubCategory'=>$rows->HavingSubCategory,
                    'IsCustomizable'=>$rows->IsCustomizable,
                    'AppearanceSerial'=>$rows->AppearanceSerial,
                    'SubCatagory'=>$this->getOnlyActiveSubcatagoryListByCatagoryId($rows->CategoryId)
                ];
            }
            return $data;
             
        }
		else
		{
            return $data;
        }
    }
    public function getOnlyActiveSubcatagoryListByCatagoryId($CategoryId)
    {
        $data = array();
        $where=[
            'IsActive'=>'Y',
            'CategoryId'=>$CategoryId
        ];
		$this->db->select("*")
				->from('sub_category')
                ->where($where)
                ->order_by('AppearanceSerial');
		$query = $this->db->get();
		
		#echo "<br>".$this->db->last_query();
		
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




    public function getAllProductOnlyByCatagryID($CategoryId)
    {
        $data=array();
        $sql="SELECT 
                category_master.CategoryId,
                category_master.Description as Catagory,
                category_master.HavingSubCategory,
                category_master.IsCustomizable,
                /*sub_category.SubCategoryId,
                sub_category.Description as SubCatagory,*/
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description as Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock,
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
                FROM
                category_master                
                Inner JOIN product_master 
                    ON category_master.CategoryId = product_master.CategoryId 
                    AND product_master.IsActive = 'Y' 
                /* LEFT JOIN sub_category 
                    ON category_master.CategoryId = sub_category.CategoryId 
                    AND sub_category.IsActive = 'Y' */
                LEFT JOIN product_detail 
                    ON product_master.ProductId = product_detail.ProductId 
                LEFT JOIN brand_master 
                    ON product_master.BrandId = brand_master.`BrandId` 
                    AND brand_master.IsActive = 'Y' 
                LEFT JOIN vendor_master 
                    ON product_master.VendorId = vendor_master.`VendorId` 
                    AND vendor_master.IsActive = 'Y' 
                WHERE category_master.IsActive = 'Y' 
                AND category_master.CategoryId = $CategoryId
                ORDER BY category_master.CategoryId";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = [
                    'CategoryId'=>$rows->CategoryId,
                    'Catagory'=>$rows->Catagory,
                    'HavingSubCategory'=>$rows->HavingSubCategory,
                    'IsCustomizable'=>$rows->IsCustomizable,
                    // 'SubCategoryId'=>$rows->SubCategoryId,
                    // 'SubCatagory'=>$rows->SubCatagory,
                    'Product'=>$rows->Product,
                    'ProductName'=>$rows->ProductName,
                    'ProductId'=>$rows->ProductId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'InStock'=>$rows->InStock,
                    'BrandId'=>$rows->BrandId,
                    'Name'=>$rows->Name,
                    'Logo'=>$rows->Logo,
                    'LogoPath'=>$rows->LogoPath,
                    'VendorId'=>$rows->VendorId,
                    'BusinessName'=>$rows->BusinessName,
                    'BusinessAddress'=>$rows->BusinessAddress,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }


    public function getAllProductOnlyBySubCatagoryId($SubCatagoryId)
    {
        $data=array();
        $sql="SELECT 
                category_master.CategoryId,
                category_master.Description AS Catagory,
                category_master.HavingSubCategory,
                category_master.IsCustomizable,
                sub_category.SubCategoryId,
                sub_category.Description as SubCatagory,
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description AS Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock,
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
            FROM
                product_master  
                INNER JOIN category_master 
                ON product_master.CategoryId =category_master.CategoryId 
                AND product_master.IsActive = 'Y' 
                INNER JOIN sub_category ON product_master.SubCategoryId = sub_category.SubCategoryId    
                LEFT JOIN product_detail 
                ON product_master.ProductId = product_detail.ProductId 
                LEFT JOIN brand_master 
                ON product_master.BrandId = brand_master.`BrandId` 
                AND brand_master.IsActive = 'Y' 
                LEFT JOIN vendor_master 
                ON product_master.VendorId = vendor_master.`VendorId` 
                AND vendor_master.IsActive = 'Y' 
            WHERE product_master.`SubCategoryId` = $SubCatagoryId ";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = [
                    'CategoryId'=>$rows->CategoryId,
                    'Catagory'=>$rows->Catagory,
                    'HavingSubCategory'=>$rows->HavingSubCategory,
                    'IsCustomizable'=>$rows->IsCustomizable,
                    'SubCategoryId'=>$rows->SubCategoryId,
                    'SubCatagory'=>$rows->SubCatagory,
                    'Product'=>$rows->Product,
                    'ProductName'=>$rows->ProductName,
                    'ProductId'=>$rows->ProductId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'InStock'=>$rows->InStock,
                    'BrandId'=>$rows->BrandId,
                    'Name'=>$rows->Name,
                    'Logo'=>$rows->Logo,
                    'LogoPath'=>$rows->LogoPath,
                    'VendorId'=>$rows->VendorId,
                    'BusinessName'=>$rows->BusinessName,
                    'BusinessAddress'=>$rows->BusinessAddress,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }



    public function getBestSellers()
    {
        $data=array();
        $sql="SELECT 
                category_master.CategoryId,
                category_master.Description as Catagory,
                category_master.HavingSubCategory,
                category_master.IsCustomizable,
                product_master.ProductName,
                product_master.ProductId,
                product_master.Description as Product,
                product_detail.ProductCode,
                product_detail.Price,
                product_detail.InStock,
                brand_master.BrandId,
                brand_master.Name,
                brand_master.Logo,
                brand_master.LogoPath,
                vendor_master.VendorId,
                vendor_master.BusinessName,
                vendor_master.BusinessAddress 
                FROM
                category_master                
                Inner JOIN product_master 
                    ON category_master.CategoryId = product_master.CategoryId 
                    AND product_master.IsActive = 'Y' 
                LEFT JOIN product_detail 
                    ON product_master.ProductId = product_detail.ProductId 
                LEFT JOIN brand_master 
                    ON product_master.BrandId = brand_master.`BrandId` 
                    AND brand_master.IsActive = 'Y' 
                LEFT JOIN vendor_master 
                    ON product_master.VendorId = vendor_master.`VendorId` 
                    AND vendor_master.IsActive = 'Y' 
                WHERE category_master.IsActive = 'Y' 
                ORDER BY category_master.CategoryId  LIMIT 50 OFFSET 1 ";

        $query=$this->db->query($sql);
        // echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = [
                    'CategoryId'=>$rows->CategoryId,
                    'Catagory'=>$rows->Catagory,
                    'HavingSubCategory'=>$rows->HavingSubCategory,
                    'IsCustomizable'=>$rows->IsCustomizable,
                    'Product'=>$rows->Product,
                    'ProductName'=>$rows->ProductName,
                    'ProductId'=>$rows->ProductId,
                    'ProductCode'=>$rows->ProductCode,
                    'Price'=>$rows->Price,
                    'InStock'=>$rows->InStock,
                    'BrandId'=>$rows->BrandId,
                    'Name'=>$rows->Name,
                    'Logo'=>$rows->Logo,
                    'LogoPath'=>$rows->LogoPath,
                    'VendorId'=>$rows->VendorId,
                    'BusinessName'=>$rows->BusinessName,
                    'BusinessAddress'=>$rows->BusinessAddress,
                    'Img'=>$this->getSingleProductImageOnlyByProductId($rows->ProductId)
                ];
            }
            return $data;
            
        }
        else
        {
            return $data;
        }  

    }
    



}// end of class