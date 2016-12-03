<?php

class AdminModel extends Model
{
    public function generate()
    {
        $date = date("Y M j G:i:s");
        $db = $_POST['darab'];
        $email = 'RicsiE';
        $oemail = $email;
        $i = 0;


        do {
            $email = $oemail.$i;
            $i++;
        } while ($this->cheackName($email) == false);


        for ($i = 0; $i < $db; $i++) {
            $stmt = $this->db->prepare("INSERT INTO users (username,email,pass,regDate) VALUES (:username,:email,:pass,:regDate)");
            $stmt->execute(array(
                'username' => 'RicsiU' . rand(1, 1000),
                'email' => $email,
                'pass' => 123,
                'regDate' => $date
            ));

            $lastInsertId = $this->db->lastInsertId();

            $stmt = $this->db->prepare("INSERT INTO persetting (city,job,school,bday,height,weight,eColor,hColor,smoking,looklike,hChild,userId)
                                        VALUES (:city,:job,:school,:bday,:height,:weight,:eColor,:hColor,:smoking,:looklike,:hChild,:userId)");
            $stmt->execute(array(
                'city' => '',
                'job' => '',
                'school' => '',
                'bday' => '',
                'height' => rand(50, 100),
                'weight' => rand(50, 100),
                'eColor' => '',
                'hColor' => '',
                'smoking' => '',
                'looklike' => '',
                'hChild' => '',
                'userId' => $lastInsertId
            ));
            $stmt = $this->db->prepare("INSERT INTO looking (tol,ig,oCity,oEColor,oHColor,oLooklike,online,hPicture,oSmoking,hChild,userId)
                                        VALUES (:tol,:ig,:oCity,:oEColor,:oHColor,:oLooklike,:online,:hPicture,:oSmoking,:hChild,:userId)");
            $stmt->execute(array(
                'tol' => '',
                'ig' => '',
                'oCity' => '',
                'oEColor' => '',
                'oHColor' => '',
                'oLooklike' => '',
                'online' => '',
                'hPicture' => '',
                'oSmoking' => '',
                'hChild' => '',
                'userId' => $lastInsertId
            ));
        }
        return true;
    }


    public function kilistaz()
    {
        $stmt = $this->db->prepare("SELECT * FROM users,persetting,looking WHERE users.id=persetting.userId AND users.id=looking.userId");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    private function cheackName($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(array(
            'email' => $email
        ));
        if ($stmt->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }
}


