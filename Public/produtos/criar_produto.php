<?php 

    require_once __DIR__ . '/../../vendor/autoload.php';

    session_start();

    use App\Models\Produto;


    if(isset($_SESSION['usuario_id'])){

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $produto = new Produto();
        
        $_POST['id_usuario'] = $_SESSION['usuario_id'];

        if($produto->inserir($_POST)){
            header("Location: /Public/produtos/listar_produto.php");
            exit();
        }
        else{
            echo "Erro ao cadastrar o produto";
        }
    
    }

}
else {
    echo "nao entrou no 'session'";
}



