<?php
    class Post{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getPosts(){
             $this->db->query('SELECT *,
                                 posts.id as `post_id`,
                                 users.id as `user_id`,
                                 posts.created_at as `post_created_at`,
                                 users.created_at as `user_created_at`
                                 FROM posts
                                 INNER JOIN users 
                                 ON posts.user_id = users.id
                                 ORDER BY posts.created_at DESC');

             return $this->db->resultSet();
        }

        public function addPost($post){
            $this->db->query("INSERT INTO `posts`(`title`, `user_id`, `body`) VALUES(:title, :user_id, :body)");

            // Bind values
            $this->db->bind(':title', $post['title']);
            $this->db->bind(':user_id', $post['user_id']);
            $this->db->bind(':body', $post['body']);

            // Execute
            return $this->db->execute();
        }

        public function getPostById($id){
            $this->db->query("SELECT * FROM `posts` WHERE `id` = :id");

            // Bind value
            $this->db->bind(':id', $id);

            return $this->db->single();
        }

        public function updatePost($post){
            $this->db->query("UPDATE posts SET title = :title, body = :body WHERE id = :id");

            // Bind values
            $this->db->bind(':title', $post['title']);
            $this->db->bind(':body', $post['body']);
            $this->db->bind(':id', $post['id']);

            // Execute
            return $this->db->execute();
        }

        public function deletePost($id){
            $this->db->query("DELETE FROM posts WHERE id = :id");

            // Bind value
            $this->db->bind(':id', $id);

            // Execute
            return $this->db->execute();
        }
    }