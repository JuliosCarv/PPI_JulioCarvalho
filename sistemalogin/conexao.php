<?php 

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'colletosports';
    //conexao com o banco de dados
    $connect = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    function login($connect){
        if (!$connect) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }
        
        if(isset($_POST['email']) && isset($_POST['senha'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $sql = "SELECT * FROM usuario WHERE email = '$email'";
            $result = mysqli_query($connect, $sql);
            
            if(mysqli_num_rows($result) > 0){
                $usuario = mysqli_fetch_assoc($result);
                
                if($usuario['senha'] == $senha){
                    if($email == 'juliosouza490@gmail.com' && $senha == 'julio123'){
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        header("Location: index.php");
                        exit();
                    }
                } else {
                    echo "Usuário não encontrado!";
                }
            } else {
                echo "Usuário não encontrado!";
            }
        }
    }

    function logout (){
        session_start();
        session_unset();
        session_destroy();
        header("location: login.php");
    }

    /*Seleciona (busca) no BD apenas um resultado com base no ID*/
    function buscaUnica($connect, $tabela, $id){
        $query = "SELECT * FROM $tabela WHERE id =" . (int) $id;  
        $execute = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($execute);
        return $result;
    }

    /*Seleciona (busca) no BD todos os resultado com base no WHERE*/
    function buscar($connect, $tabela, $where = 1, $order = ""){
        if (!empty($order)){
            $order = "ORDER BY $order";
        }
        $query = "SELECT * FROM $tabela WHERE $where $order";
        $execute = mysqli_query($connect, $query);
        $results = mysqli_fetch_all($execute, MYSQLI_ASSOC);
        return $results;
    }

    

    
?>