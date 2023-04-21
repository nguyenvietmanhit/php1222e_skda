<!--models/Category.php-->
<!--categories: id, name, avatar, created_at -->
<?php
require_once 'models/Model.php';
class Category extends Model {
    public function insertData($name, $avatar) {
        //B1:
        $sql_insert = "INSERT INTO categories(name, avatar)
        VALUES (:name, :avatar)";
        //B2:
        $obj_insert = $this->connection->prepare($sql_insert);
        //B3:
        $inserts = [
            ':name' => $name,
            ':avatar' => $avatar
        ];
        //B4:
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }

    public function getAll() {
        //B1:
        $sql_select_all = "SELECT * FROM categories";
        //B2:
        $obj_select_all = $this->connection->prepare($sql_select_all);
        //B3:
        //B4:
        $obj_select_all->execute();
        //B5:
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}
?>
