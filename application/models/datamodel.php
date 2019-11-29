<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Datamodel extends CI_Model
{
function update_image($id,$gambar,$gambar,$gambar,$gambar,$gambar,$gambar)
{
$url = 'http://localhost/proyekakhir/uploads/';
$dt = array(
'pic1'=>$url.$gambar[0],
'pic2'=>$url.$gambar[1],
'pic3'=>$url.$gambar[2],
'pic4'=>$url.$gambar[3],
'pic5'=>$url.$gambar[4],
'pic6'=>$url.$gambar[5]
);
$this->db->where('id',$id);
return $this->db->update('imagegallery',$dt);
}