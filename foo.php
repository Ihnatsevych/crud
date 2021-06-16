<?php
include 'db.php';

class car{

    public function Create()
    {
        global $pdo;
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $cars = $_POST['cars'];
            $sql = "INSERT INTO cars (owner_id, cars) VALUES (?,?)";
            $query = $pdo->prepare($sql);
            $query->execute([$name, $cars]);
            if ($query) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }


    public function Read(){
        global $pdo;
        $get_cars = $pdo->prepare("SELECT cars.id, users.name, users.user_id, cars.cars FROM cars INNER JOIN users on cars.owner_id=users.user_id");
        $get_cars->execute();
        $all_cars = $get_cars->fetchAll(PDO::FETCH_OBJ);
        return $all_cars;
    }
    public function Update(){
        global $pdo;
        if(isset($_POST['edit'])){
            $name = $_POST['name'];
            $cars = $_POST['cars'];
            $get_id = $_GET['id'];
            $sql = ("UPDATE cars SET owner_id=?, cars=? WHERE id=?");
            $query = $pdo->prepare($sql);
            $query->execute([$name,$cars,$get_id]);
            if($query){
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }

        }
    }
    public function Delete(){
        global $pdo;
        if(isset($_POST['delete'])){
            $get_id = $_GET['id'];
            $sql = ("DELETE FROM cars WHERE id=?");
            $query = $pdo->prepare($sql);
            $query->execute([$get_id]);
            if($query){
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
        }
    }

}
class user{
    public function Create()
    {
        global $pdo;
        if (isset($_POST['add_user'])) {
            $name = $_POST['name'];
            $sql = ("INSERT INTO users (name) VALUES (?)");
            $query = $pdo->prepare($sql);
            $query->execute([$name]);
            if ($query) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
    public function Read(){
        global $pdo;
        $get_users = $pdo->prepare("SELECT name, user_id FROM users");
        $get_users->execute();
        $all_users = $get_users->fetchAll(PDO::FETCH_OBJ);
        return $all_users;
    }
}
$car = new car();
$user = new user();

$car->Create();
$user->Create();
$all_users = $user->Read();
$all_cars = $car->Read();
$car->Update();
$car->Delete();
