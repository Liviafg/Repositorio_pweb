<?php 

    require "classe_usuario.php";

    $usuario = new Usuario ($_POST['nome'], $_POST['nome_usuario'], $_POST['email'], $_POST['senha']);
    $nome = $usuario->getNome();
    $nome_usuario = $usuario->getNome_usuario();
    $email = $usuario->getEmail();
    $username = "root";
    $password = "";

try {
$conexao = new PDO('mysql:host=localhost;dbname=prova_pweb', $username, $password);
} else {
    echo "conexao falhou, tente novamente.";
}

    $mostrar_nome = "$nome \n"; 
    $mostrar_nome_usuario = "$nome_usuario \n";
    $mostrar_email = "$email \n";

    echo nl2br ($mostrar_nome); 
    echo nl2br ($mostrar_nome_usuario);
    echo nl2br ($mostrar_email);  

    $criptografia = md5($usuario->getSenha());

    echo nl2br ($criptografia);

	$sql = "INSERT INTO prova_pweb (nome, nome_usuario, email, senha) VALUES
				('".$usuario->getNome()." ','". $usuario->getNome_usuario()." ', ' ". $usuario->getEmail()." ', '".$usuario->getSenha()."')";
    echo ($sql);

    var_dump($sql);
 

	$sql = "ALTER TABLE prova_pweb MODIFY COLUMN id INT auto_increment";

    $dados = $nome;
    $dados = $nome_usuario;
    $dados = $email;
    $dados = $senha; 

?>

<html>                         
 <table> 

<tr> 

 <td>

<?php 

while ($dados = mysql_fetch_array($query)) {

var_dump($dados);

}

 </td>

</tr> 

 </table>

</html>

?>

<?php 

while ($nome_usuario != '') {

    $nome_usuario = $nome_usuario + ($sql ='1 row'); 

if ($nome_usuario = _SESSION['$nome_usuario'] > 1) {
    
    echo 'nome de usuario ja inserido, tente de novo';
    unset ($nome_usuario);
    $usuario->setNome_usuario();
} else {
    echo "nome de usuario nao existente, voce tem nome unico e foi logado."
}
}
?>