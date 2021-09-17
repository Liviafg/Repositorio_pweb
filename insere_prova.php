<?php 

if(!isset($_SESSION)) {
    session_start ();
}

$_SESSION['nome'] = $usuario->getNome(); 
$_SESSION['nome_usuario'] = $usuario->getNome_usuario();
$_SESSION['email'] = $usuario->getEmail();
$_SESSION['senha'] = $usuario->getSenha();
    $id = session_id(); 


    require "classe_usuario.php";

    $usuario = new Usuario ($_POST['nome'], $_POST['nome_usuario'], $_POST['email'], $_POST['senha']);
    $nome = $usuario->getNome();
    $nome_usuario = $usuario->getNome_usuario();
    $email = $usuario->getEmail();

    $username = "root";
    $password = "";

$conexao = new PDO('mysql:host=localhost;dbname=questao_recuperacao', $username, $password);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conexao->prepare('SELECT nome, nome_usuario, email, senha FROM usuarios_rec WHERE  
        nome = :nome AND
        nome_usuario = :nome_usuario AND
        email = :email AND
        senha = :senha'
);

                $stmt->bindValue(':nome', $usuario->getNome(), PDO::PARAM_STR);

                $stmt->bindValue(':nome_usuario', $usuario->getNome_usuario(), PDO:: PARAM_STR);

                $stmt->bindValue(':email', $usuario->getEmail(), PDO:: PARAM_STR);

                $stmt->bindValue(':senha',$usuario->getSenha(), PDO:: PARAM_STR);


    $stmt->execute();

    $resultado = $stmt->fetchAll();


    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
}

    $mostrar_nome = "$nome \n"; 
    $mostrar_nome_usuario = "$nome_usuario \n";
    $mostrar_email = "$email \n";

    $criptografia = md5($usuario->getSenha());

    echo nl2br ($criptografia);

    $sql = "INSERT INTO usuarios_rec (nome, nome_usuario, email, senha) VALUES
                ('".$usuario->getNome()." ','". $usuario->getNome_usuario()." ', ' ". $usuario->getEmail()." ', '".$usuario->getSenha()."')";
    echo ($sql);

    var_dump($sql);

?>

<html>                         
 <table> 

<tr> 


 <td>

<?php echo $_SESSION['nome_usuario']; 
echo $_SESSION['nome'];
echo $_SESSION['email'];
echo nl2br ($criptografia);

?>

 </td>

</tr> 

 </table>

</html>

?>

<?php 

while ($nome_usuario != '') {

    $nome_usuario = $nome_usuario + ($sql ='1 row'); 

if ($nome_usuario = _SESSION['nome_usuario'] > 1) {
    
    echo 'nome de usuario ja inserido, tente de novo';
    unset ($nome_usuario);
    $usuario->setNome_usuario();
} else {
    echo "nome de usuario nao existente, voce tem nome unico e foi logado."
}
}
?>
