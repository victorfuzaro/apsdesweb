<!DOCTYPE html>
<head>

</head>

<body>
        <?php
        // inserção de pergunta na tabela pergunta do banco de dados
        $pergunta = $_POST['pergunta'];
        $alternativa1 = $_POST['alternativa1'];
        $alternativa2 = $_POST['alternativa2'];
        $gameid = $_POST['gameid'];
        $con = mysqli_connect("localhost", "root", "", "aulaphp");
        $sql = "INSERT INTO pergunta (pergunta, r1, r2, gameid) VALUES('$pergunta','$alternativa1','$alternativa2', $gameid)";
        
        if (mysqli_query($con, $sql)){
            echo 'dados gravados';
        }else{
            echo 'ocorreu um erro.';
        }
         mysqli_close($con);  
        ?>
</body>