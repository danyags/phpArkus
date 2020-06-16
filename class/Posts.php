<?php
class Posts
{
	public $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}
	
	function addPost($params)
	{
		$sql = "INSERT INTO `tb_post` (`description`, `postDate`) VALUES (?, ?)";
		$data = $this->db->pdoQuery($sql,$params)->getLastInsertId();
		return $data;
	}
	
	function getPosts()
	{
		$data = $this->db->pdoQuery("CALL spGetPosts()")->results();
		return $data;
	}
}
?>