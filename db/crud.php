<?php 
    class crud{
       
        private $db;
        
        function __construct($conn){
            $this->db = $conn;
        }


     
     public function insertRegistrant($fname,$mname,$lname,$dob,$trn,$nis,$address1,$address2,$parish,$gender,$email,$contact,$programmes,$avatar_path){
        try {
         
            $sql = "INSERT INTO registrant(firstname,middlename,lastname,dateofbirth,trn,nis,address1,address2,parish,gender,emailaddress,contactnumber,programmes_id,avatar_path) VALUES (:fname,:mname,:lname,:dob,:trn,:nis,:address1,:address2,:parish,:gender,:email,:contact,:programmes,:avatar_path)";
          
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':mname',$mname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':trn',$trn);
            $stmt->bindparam(':nis',$nis);
            $stmt->bindparam(':address1',$address1);
            $stmt->bindparam(':address2',$address2);
            $stmt->bindparam(':parish',$parish);
            $stmt->bindparam(':gender',$gender);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':programmes',$programmes);
            $stmt->bindparam(':avatar_path',$avatar_path);

            $stmt->execute();
            return true;
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editRegistrant($id,$fname, $mname, $lname, $dob, $trn, $nis, $address1, $address2, $parish, $gender, $email,$contact,$programmes){
        try{ 
             $sql = "UPDATE `registrant` SET `firstname`=:fname,`middlename`=:mname,`lastname`=:lname,`dateofbirth`=:dob,`trn`=:trn,`nis`=:nis,`address1`=:address1,`address2`=:address2,`parish`=:parish,`gender`=:gender,`emailaddress`=:email,`contactnumber`=:contact,`programmes_id`=:programmes WHERE registrant_id = :id ";
             $stmt = $this->db->prepare($sql);
             $stmt->bindparam(':id',$id);
             $stmt->bindparam(':fname',$fname);
             $stmt->bindparam(':mname',$mname);
             $stmt->bindparam(':lname',$lname);
             $stmt->bindparam(':dob',$dob); 
             $stmt->bindparam(':trn',$trn);
             $stmt->bindparam(':nis',$nis);
             $stmt->bindparam(':address1',$address1);
             $stmt->bindparam(':address2',$address2);
             $stmt->bindparam(':parish',$parish);
             $stmt->bindparam(':gender',$gender);
             $stmt->bindparam(':email',$email);
             $stmt->bindparam(':contact',$contact);
             $stmt->bindparam(':programmes',$programmes);

             $stmt->execute();
             return true;
        }catch (PDOException $e) {
         echo $e->getMessage();
         return false;
        }
         
     }

    public function getRegistrant(){
        try{
            $sql = "SELECT * FROM `registrant` a inner join programmes p on a.programmes_id = p.programmes_id";
            $result = $this->db->query($sql);
            return $result;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
       }
       
    }

    public function getRegistrantDetails($id){
        try{
             $sql = "select * from registrant a inner join programmes p on a.programmes_id = p.programmes_id 
             where registrant_id = :id";
             $stmt = $this->db->prepare($sql);
             $stmt->bindparam(':id', $id);
             $stmt->execute();
             $result = $stmt->fetch();
             return $result;
        }
        catch (PDOException $e) {
             echo $e->getMessage();
             return false;
         }
     }

     public function deleteRegistrant($id){
        try{
             $sql = "delete from registrant where registrant_id = :id";
             $stmt = $this->db->prepare($sql);
             $stmt->bindparam(':id', $id);
             $stmt->execute();
             return true;
         }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
         }
     }
    
    public function getProgrammes(){
        try{
            $sql = "SELECT * FROM `programmes`";
            $result = $this->db->query($sql);
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }

    public function getprogrammeById($id){
        try{
            $sql = "SELECT * FROM `programmes` WHERE programmes_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
}
?>