<?php 
class Product_model extends CI_Model {

       
        public function get_products()
        {
                $this->db->select('id, title, price, image');
                $query = $this->db->get('product_master', 20);
                return $query->result();
        }


        // get product details
        public function get_product_detail($id)
        {
                $query = $this->db->get_where('product_master', array('id' => $id));
                return $query->row();
        }

        public function getProductByIds($arr) {
                $this->db->select('*');
                $this->db->where_in('id', $arr);
                $query = $this->db->get('product_master');
                return $query->result();
        }

        public function addToCart($arr){
                $this->db->insert('user_cart', $arr);
                return $this->db->insert_id();
        }

}
