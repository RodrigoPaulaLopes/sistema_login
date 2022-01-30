<?php
    require_once "../db/Conexao.php";
    require_once "../classes/Usuario.php";
    class UsuarioDao extends Conexao{
        
        public function mostrarTodos(){
            try{

                $stm = $this->conn->query('SELECT * FROM usuario ORDER BY name');
                $rs = $stm->fetchall(PDO::FETCH_ASSOC);
                $usuarios = [];
    
                foreach($rs as $usuario){
                    array_push($usuarios, $usuario);
                }
    
                return $usuarios;
            }catch(PDOException $e){
                echo "Erro no banco: ".$e->getMessage();
            }

        }
        public function login($email, $senha){
            try{

                $stm = $this->conn->prepare('SELECT * FROM usuario WHERE email = :email AND password = :password');
                $stm->bindValue(':email', $email);
                $stm->bindValue(':password', $senha);
                $stm->execute();
                $row = $stm->rowCount();
                $rs = $stm->fetch(PDO::FETCH_ASSOC);
                $usuarios = [];
                
                if($row > 0){
                    foreach($rs as $usuario){
                        array_push($usuarios, $usuario);
                    }
        
                    return $usuarios;
                }else{
                    $msg = "nenhum usuario encontrado";
                    return $msg;
                }
            }catch(PDOException $e){
                echo "Erro no banco: ".$e->getMessage();
            }

        }

      
    }
    ?>