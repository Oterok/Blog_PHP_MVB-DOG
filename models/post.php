<?php

class Post {

// definimos tres atributos
// los declaramos como públicos para acceder directamente $post->author
    public $id;
    public $title;
    public $author;
    public $content;
    public $image;
    public $created;
    public $modified;

    public function __construct($id, $title, $author, $content, $image, $created, $modified) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
        $this->image = $image;
        $this->created = $created;
        $this->modified = $modified;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');
// creamos una lista de objectos post y recorremos la respuesta de la
//consulta
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['author'], $post['content'],
                    $post['image'], $post['created'], $post['modified']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
// nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
// preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Post($post['id'], $post['title'], $post['author'], $post['content'],
                $post['image'], $post['created'], $post['modified']);
    }

}

?>