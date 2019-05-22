<!DOCTYPE html>
<head>

</head>

<body>
        <?php
        // insere os dados do game no banco de dados...
        $nome = $_POST['nome'];
        $data_string = $_POST['data_string'];
        $qtd = $_POST['qtd'];
        $con = mysqli_connect("localhost", "root", "", "aulaphp");
        $sql = "INSERT INTO quiz (nome, dtCriacao, qtd) VALUES('$nome','$data_string',$qtd)";

        if (mysqli_query($con, $sql)){
            echo 'dados gravados';
        }else{
            echo 'ocorreu um erro.';
        }
         mysqli_close($con);  
        ?>
</body>