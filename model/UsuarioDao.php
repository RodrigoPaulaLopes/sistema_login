<?php
    
    include  "../db/Conexao.php";
    include  "../classes/Usuario.php";
    

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
                
                $rs = $stm->fetch(PDO::FETCH_ASSOC);
                $usuarios = [];
                
                
                    foreach($rs as $usuario){
                        array_push($usuarios, $usuario);
                    }
        
                    return $usuarios;
                
            }catch(PDOException $e){
                echo "Erro no banco: ".$e->getMessage();
            }

        }
        public function inserirUsuarios(Usuario $usuario){

            $stm = $this->conn->prepare("INSERT INTO usuario (name, email, password, type, status) VALUES (:nome, :email, :password, :type, :status)");
            $stm->bindValue(":nome", $usuario->name);
            $stm->bindValue(":email", $usuario->email);
            $stm->bindValue(":password", $usuario->password);
            $stm->bindValue(":type", $usuario->type);
            $stm->bindValue(":status", $usuario->status);
    
            $stm->execute();
        }
        
        public function mostrarUsuario($id){
          
    
            $stm = $this->conn->query("SELECT * FROM usuario WHERE id = $id");
    
            return $stm->fetch();
    
        }
        public function excluirUsuarios($id){
            
    
            $stm = $this->conn->prepare("DELETE FROM usuario WHERE id = :id");
            $stm->bindValue(":id", $id);
            $stm->execute();
        }
        public function editarUsuarios(Usuario $usuario){
            
    
            $stm = $this->conn->prepare("UPDATE usuario SET name = :name, email = :email, password = :password, type = :type, status = :status WHERE id = :id");
            $stm->bindValue(':name', $usuario->name);
            $stm->bindValue(':email', $usuario->email);
            $stm->bindValue(':password', $usuario->password);
            $stm->bindValue(':type', $usuario->type);
            $stm->bindValue(':status', $usuario->status);
            $stm->bindValue(':id', $usuario->id);
    
            $stm->execute();
    
        
        }
    }
    ?>