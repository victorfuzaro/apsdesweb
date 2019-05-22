<!DOCTYPE html>
<head>
</head>
<body>
<?php
// deleta o game de acordo com o ID recebido
        $id = $_POST['id'];
        $con = mysqli_connect("localhost", "root", "", "aulaphp");
        $sql = "DELETE FROM quiz where ID = $id";
        $sql_2 = "SET @count = 0";
        $sql_3 = "UPDATE quiz SET quiz.id = @count:= @count + 1"; 
        $sql_check = "SELECT count(id) from quiz";
        $auto_increment = "ALTER TABLE quiz AUTO_INCREMENT = 1";
        // faz a exclusão da linha
        $check_result = mysqli_query($con,$sql_check);
        mysqli_query($con, $sql);
        // reordena a coluna ID que é auto incrementada.
        mysqli_query($con,$sql_2);
        mysqli_query($con,$sql_3);
        mysqli_query($con,$auto_increment);
        mysqli_close($con);  
?>
</body>