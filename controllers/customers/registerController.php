<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/preload.php';

    if($_POST['function'] == 'create') {
            $create = true;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['password-confirm'];
            // $phone_number = $_POST['phonenumber'];
            $datetime = date('Y-m-d H:i:s');
            $msg = 'Succesvol geregistreerd.';
            $stmt = $pdo->prepare("SELECT Email FROM klanten WHERE Email = ?;");
            $stmt->execute([$email]);
            $users = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($users){
            foreach($users as $user) {
                if($user == $email) {
                    $msg = 'Je kunt deze email niet meer gebruiken.';
                    $create = false;
                }
            }
        }

                    if($password !== $confirmPassword) {
                        $msg = 'Wachtwoorden komen niet overeen.';
                        $create = false;
                    }
        
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $msg = 'Email is niet geldig.';
                        $create = false;
                    }

                    // if(!preg_match( "/^(\+|00|0)(31\s?)?(6[\s-]?[1-9][0-9]{7}|[1-9][0-9][\s-]?[1-9][0-9]{6}|[1-9][0-9]{2}[\s-]?[1-9][0-9]{5})$/", $phone_number ) ){
                    //     $msg = 'Deze telefoon nummertje is niet geldig';
                    //     $create = false;
                    // }

                    $telefoon = 122;

                    if($create) {
                        $sql = "INSERT INTO `klanten` (Naam, Email, Telefoon, Wachtwoord, Gewijzigd) VALUES (?,?,?,?,?);";
                        $pdo->prepare($sql)->execute([
                            $name, $email, $telefoon, $password, $datetime
                        ]);
                    }
                
                
            

            setWith('msg', $msg);
            redirect('customers/register');
    } else {
        redirect('customers/login');
    }