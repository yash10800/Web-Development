<?php ob_start();
    session_start();
    ?>
<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Pract.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <style>
            body{
            margin:50px;
            padding: 0;
            background-color: black;
        }
        input{
            height: 50px;
            width: 350px;
            border-top: none;
            border-left: none;
            border-right: none;
            border: 2px solid black;
            border-radius: 10px;
            font-size: 25px;
            margin-top: 10px;
            text-align: center;
        }
        input:invalid {
            background: hsla(0, 90%, 70%, 1);
        }

        input:valid {
            background: hsla(100, 90%, 70%, 1);
        }

        input:focus {
            background: hsla(100, 90%, 70%, 1);
        }

        input:required {
            border-color: none;
        }
        .error{
            color: orange;
            font-size: 25px;
            height: 50px;
            margin-top: 100px;
        }
        label{
            font-size: 50px;
            color: white;
            margin-bottom: 30px;
        }
        .button1,#span{
            height: 40px;
            width: 150px;
            margin-top: 30px;
            border-radius: 10px;
            margin-left:10px;
            color: white;
            font-size: 22px;
            font-weight: bold;
            font-family:monospace;
            background:black;
            border: 2px solid white;
        
        }
        </style>
    </head>
    <body>
        <center>
            <label>Login</label>
        <div ng-app="myapp" class="main">
            <form name="myForm" action="" method="post">
            <center>
                <div class="error">
                    <span ng-show="myForm.username.$error.required && myForm.username.$dirty">Username Required</span>
                    <span ng-show="!myForm.username.$error.required && (myForm.username.$error.minlength || myForm.username.$error.maxlength) && myForm.username.$dirty">Username must be between 5 and 20 characters.</span>
                    <span ng-show="myForm.password.$error.required && myForm.password.$dirty">Password Required</span>
                    <span ng-show="!myForm.password.$error.required && (myForm.password.$error.minlength || myForm.password.$error.maxlength) && myForm.password.$dirty">Passwords must be between 8 and 20 characters.</span>
                    <span ng-show="!myForm.password.$error.required && !myForm.password.$error.minlength && !myForm.password.$error.maxlength && myForm.password.$error.pattern && myForm.password.$dirty">Must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol.)</span>
                </div>
            </center>
                <div class="data">
                    <input type="text" id="username" name="username" ng-model="formData.username" placeholder="Username" autocomplete="off" ng-minlength="5" ng-maxlength="20" ng-pattern="/^[A-z0-9]*$/" required  /><br>
                    <input type="password" id="password" name="password" ng-model="formData.password" ng-minlength="8" autocomplete="off" placeholder="Enter Password" ng-maxlength="20" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" required  /><br>
                <div>
                <div style="display:flex;margin-left:550px">
                    <div><input type="submit" class="button1" value="Login" style="background:black" name="login"></div>
                    <div id="span" style="height:32px;padding-top:5px"><a href="signup.php" style="text-decoration:none;font-size:22px;color:white">Sign up</a></div>
                </div>
                
            </center>
             </form> 
             <div style="margin-top:100px">
             <?php
                //For Database Connection make a different file and include that file. No Duplicate Code.
                
                include('dbconnect.php');
                //Use if isset from the submit name
                if(isset($_POST['login'])){
                    // Use mysqli_real_escape_string for inserting into database
                $username=$_POST['username'];
                $password=$_POST['password'];

                //No need for error Reporting
                //error_reporting(0);

                $query2="SELECT login_id,password FROM login";
                //echo"<label style='margin-left:30%;font-size:40px;color:red'>You've Registered Successfully</label>";
                $u=array();
                $p=array();
                $temp="";
                $username2=$connection->query($query2) or die("error");
                while($row = $username2->fetch_assoc()){
                    $temp = $row["login_id"];
                    array_push($u,"$temp");
                    $temp = $row["password"];
                    array_push($p,"$temp");
                }
                $count=0;
                for($j=0;$j<sizeof($u);$j++){
                    if($username==$u[$j]){
                        $count=1;
                    break;
                    }
                }
                if($count==0){
                   // header("login.php");
                    echo "<label style='font-size:30px;text-align:center;color:red;margin-top:100px'><center>OOps....you have entered wrong username or please register first</center></label>";
                }
                elseif($count==1 && $password!=$p[$j]){
                   // header("login.php");
                    echo "<label style='font-size:30px;text-align:center;color:red;margin-top:100px'><center>OOps....you have entered wrong password please check password</center></label>";
                }
                elseif($count==1 && $password==$p[$j]){
                    $_SESSION['username']=$username;
                    $_SESSION['password']=$password;
                   header("Location: yash_ho.php");
                   
                }
                }
            
            ?>
            </div>

            </div>
        </center>
        
        <script>
            var app = angular.module('myapp', ['UserValidation']);
            angular.module('UserValidation', []).directive('validPasswordC', function () {
                return {
                    require: 'ngModel',
                    link: function (scope, elm, attrs, ctrl) {
                        ctrl.$parsers.unshift(function (viewValue, $scope) {
                            var noMatch = viewValue != scope.myForm.password.$viewValue
                            ctrl.$setValidity('noMatch', !noMatch)
                        })
                    }
                }
            })
        </script>
    </body>
</html>