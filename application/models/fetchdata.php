<?php
class fetchdata extends CI_Model
{
   public function quotes()
   {
      $query =  $this->db->order_by('rand()')
         ->limit(1)
         ->get('webangel_quotes');
      return $query;
   }
   public function login($admin_email,$admin_password)
   {
      $q = $this->db->where(['admin_email' => $admin_email, 'admin_password' => $admin_password])
            ->from('webangel_admin')
            ->get();
         
        if ($q->num_rows()) {
            return $q->row()->admin_id; 
        } else {
            return false;
        }
   }
   
}
