<?php
    function donorExists($email){
        global $pdo;

        $stmt = $pdo->prepare('SELECT COUNT(`id`) FROM `donors` WHERE `email`=:email');
        $stmt->execute(['email'=>$email]);
        $count = $stmt->fetch();
        return $count["COUNT(`id`)"]?true:false;
    }
    function getIdByEmail($email){
        global $pdo;

        $stmt = $pdo->prepare('SELECT `id` FROM `donors` WHERE `email`=:email');
        $stmt->execute(['email'=>$email]);
        $donor = $stmt->fetch();
        return $donor['id'];
    }
    function registerDonor($data){
        global $pdo;

        $fields = array('fname','lname','email','mobile','address','city','state','zip');
        $sql = 'INSERT INTO `donors` ('.implode(',',$fields).') VALUES(:'.implode(',:',$fields).') ';
        $params = array();
        foreach($fields as $field){
            if($data[$field] == ""){
                $param[$field] = NULL;
            }else{
                $param[$field] = $data[$field];
            }
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($param);
        return $pdo->lastInsertId();
    }
    function getDonorById($id){
        global $pdo;

        try{
            $stmt = $pdo->prepare('SELECT * FROM `donors` WHERE `id`=?');
            $stmt->execute(array($id));
            $donor = $stmt->fetch();
        }catch(PDOException $e){
            return $e->getMessage();
        }
        return $donor;
    }

?>
