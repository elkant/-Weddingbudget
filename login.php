<?php
    require_once 'library/config.php';
    require_once 'library/functions.php';
            
        if(isset($_POST['submit'])) { 
            $username = $_POST['username'];

            $encrypted = encrypt(trim($_POST['password']));
            
            if(!isset($_SESSION['errormsg'])) $_SESSION['errormsg'] ="";
            
            $sql = "SELECT user_name, first_name, last_name, access_level, a.category_id, a.user_id, 
                    b.category_description, b.new_url, b.edit_url, b.delete_url
                    FROM tbl_users a 
                    INNER JOIN tbl_categories b
                    ON a.category_id = b.category_id
                    WHERE a.user_name LIKE '$username'
                    AND a.password LIKE '$encrypted'";
            $result = dbQuery($sql);
           
            if (dbNumRows($result) == 1) {
                if($result){            
                    while ($row = mysql_fetch_array($result)) {
                        $_SESSION['username'] = $row['user_name'];
                        $_SESSION['categorydesc'] = $row['category_description'];
                        $_SESSION['newurl'] = $row['new_url'];
                        $_SESSION['editurl'] = $row['edit_url'];
                        $_SESSION['deleteurl'] = $row['delete_url'];
                        $_SESSION['userid'] = $userid = $row['user_id'];
                        $_SESSION['accesslevel']= $accesslevel = $row['access_level'];                        
                    }
                    
                    $_SESSION['errormsg'] ="";
                      
                    if($accesslevel == 0){
                        updateLastLoginDate($userid);
                       $sqlfirm = "SELECT firm_id, firm_name FROM tbl_firms WHERE user_id = '$userid'";
                        $resultfirm = mysql_query($sqlfirm);
                        
                        if($resultfirm) {
                            while ($row = mysql_fetch_array($resultfirm)){
                            $_SESSION['firmid'] = $row['firm_id'];
                            $_SESSION['firmname'] = $row['firm_name'];
                            }
                           header("Location: userprofile/navbar.php");                    
                        }
                    } else {
                           header("Location: admin/navbar.php");
                    }
                }
            } else { 
                $_SESSION['errormsg'] ="Wrong Username or Password";
                header("Location: index.php");
            }
        }
        
        function updateLastLoginDate($userid){
        $sqlupdate = "UPDATE tbl_users SET last_login_date=NOW() WHERE user_id LIKE '$userid'";        
        dbQuery($sqlupdate);
        }
?>