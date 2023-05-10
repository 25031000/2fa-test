<?php

// importando la conexion con la base de datos
require_once 'dbConnection/Connection.php';


// obteniendo los datos de la interfaz de usuario(dataSignup.html) por medio del metodo POST 
function getFirstname(){
    if(isset($_POST['first-name'])){
        $res = $_POST['first-name'];
        return $res;
    }else{
        echo 'You must enter your firstname';
    }
}

function getLastname(){
    if(isset($_POST['last-name'])){
        $res = $_POST['last-name'];
        return $res;
    }else{
        echo 'You must enter your lastname';
    }
}

function getLocalidad(){
    if(isset($_POST['localidad'])){
        $res = $_POST['localidad'];
        return $res;
    }else{
        echo 'You must enter your localidad';
    }
}

function getStreetAdress(){
    if(isset($_POST['street-address'])){
        $res = $_POST['street-address'];
        return $res;
    }else{
        echo 'You must enter your street adress';
    }
}


function getNeighborhood(){
    if(isset($_POST['neighborhood'])){
        $res = $_POST['neighborhood'];
        return $res;
    }else{
        echo 'You must enter your neighborhood';
    }
}


function getPostalcode(){
    if(isset($_POST['postal-code'])){
        $res = $_POST['postal-code'];
        return $res;
    }else{
        echo 'You must enter your postal code';
    }
}

function getAgree(){
    if(isset($_POST['agree'])){
        $res = $_POST['agree'];
        $type = gettype($res);
        if($type === 'string'){
            return 'true';
        }
    }else{
        echo '';
    }
}

function getEmail(){
    if(isset($_POST['email'])){
        $res = $_POST['email'];
        return $res;
    }else{
        echo 'You must enter your email address';
    }
}

//guardando los datos obtenidos en variables
$firstName = getFirstname(); 
$lastName = getLastname();
$localidad = getLocalidad();
$streetAdress = getStreetAdress();
$neighborhood = getNeighborhood();
$postalCode = getPostalcode();
$agree = getAgree();
$email = getEmail();

//funcion para insertar en base de datos la informacion del usuario

function insert($firstName, $lastName, $localidad, $streetAdress, $neighborhood, $postalCode, $agree, $email){

    //consulta a la base de datos
    $sql = "SELECT * FROM usuario WHERE email_address = :email";
    $con = new Connection();
    $statement = $con->conne()->prepare($sql);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->execute(); 

    //capturing email from the database
    $res = $statement->fetch();
    $address = $res[8];
    //validation to know if the user already exists
    if($address === $email){
        echo "you are already registered";
    }else{
        try {
            $sql = "INSERT INTO usuario(nombre, apellido, localidad, direccion, barrio, codigo_postal, permiso_2fa, email_address) VALUES(:nombre, :apellido, :localidad, :direccion, :barrio, :codigo_postal, :permiso_2fa, :email_address)";
            $con = new Connection();
            $sentencia = $con->conne()->prepare($sql);
            $sentencia -> bindParam(":nombre", $firstName);
            $sentencia ->bindParam(":apellido", $lastName);
            $sentencia ->bindParam(":localidad", $localidad);
            $sentencia ->bindParam(":direccion", $streetAdress);
            $sentencia ->bindParam(":barrio", $neighborhood);
            $sentencia ->bindParam(":codigo_postal", $postalCode);
            $sentencia ->bindParam(":permiso_2fa", $agree);
            $sentencia ->bindParam(":email_address", $email);
            $exec = $sentencia -> execute();
            if($exec){
                header('location: main.html');
                echo "insertion success!!";
    
            }else{
                echo "it was an error";
            }
        } catch (\Throwable $th) {
            echo "Something was wrong: " . $th;
        }
    }
    }

    //called the function
insert($firstName, $lastName, $localidad, $streetAdress, $neighborhood, $postalCode, $agree, $email);

?>