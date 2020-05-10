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
            color:white;
        }
        input,select{
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
        input:invalid,select:invalid {
            background: hsla(0, 90%, 70%, 1);
        }
        input:valid,select:valid {
            background: hsla(100, 90%, 70%, 1);
        }
        input:focus,select:focus {
            background: hsla(100, 90%, 70%, 1);
        }
        input:required,select:required {
            border-color: none;
        }
        .error{
            color: orange;
            font-size: 25px;
            height: 50px;
            margin-top: 30px;
        }
        label{
            font-size: 50px;
            color: white;
            margin-bottom: 10px;
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
            <label>Sign up</label>
        <div ng-app="myapp" class="main">
            <form name="myForm" action="signup.php" method="post">
            <center>
                <div class="error">
                    <span ng-show="myForm.email.$error.required && myForm.email.$dirty">Email Required</span>
                    <span ng-show="!myForm.email.$error.required && myForm.email.$error.email && myForm.email.$dirty">Invalid Email</span>
                    <span ng-show="myForm.name.$error.required && myForm.name.$dirty">Name Required</span>
                    <span ng-show="!myForm.name.$error.required && myForm.name.$dirty && myForm.name.$error.pattern">Name should contain only latters</span>
                    <span ng-show="myForm.username.$error.required && myForm.username.$dirty">Username Required</span>
                    <span ng-show="!myForm.username.$error.required && (myForm.username.$error.minlength || myForm.username.$error.maxlength) && myForm.username.$dirty">Username must be between 5 and 20 characters.</span>
                    <span ng-show="myForm.password.$error.required && myForm.password.$dirty">Password Required</span>
                    <span ng-show="!myForm.password.$error.required && (myForm.password.$error.minlength || myForm.password.$error.maxlength) && myForm.password.$dirty">Passwords must be between 8 and 20 characters.</span>
                    <span ng-show="!myForm.password.$error.required && !myForm.password.$error.minlength && !myForm.password.$error.maxlength && myForm.password.$error.pattern && myForm.password.$dirty">Must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol.)</span>
                    <span ng-show="myForm.password_c.$error.required && myForm.password_c.$dirty">Please confirm your password.</span>
                    <span ng-show="!myForm.password_c.$error.required && myForm.password_c.$error.noMatch && myForm.password.$dirty">Passwords do not match.</span>
                </div>
            </center>
            <center>
                <div class="data">
                    <select name="role">
                        <option value="m">Manager</option>
                        <option value="u">User</option>
                    </select><br>
                    <input type="email" id="email" name="email" ng-model="formData.email" required placeholder="Email" autocomplete="off"><br>
                    <input type="text" id="name" name="name" ng-model="formData.name" required placeholder="name" autocomplete="off" ng-pattern="/^[A-Za-z]*$/"><br>
                    <input type="text" id="username" name="username" ng-model="formData.username" placeholder="Username" autocomplete="off" ng-minlength="5" ng-maxlength="20" ng-pattern="/^[A-z0-9]*$/" required  /><br>
                    <input type="password" id="password" name="password" ng-model="formData.password" ng-minlength="8" autocomplete="off" placeholder="Enter Password" ng-maxlength="20" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" required  /><br>
                    <input type="password" id="password_c" name="password_c" ng-model="formData.password_c" autocomplete="off" placeholder="Comfirm Password" valid-password-c required  /><br>
                <div style="display:flex;margin-left:550px">
                    <div><input type="submit" class="button1" value="Sign up" style="background:black" name="signup"></div>
                    <div id="span" style="height:32px;padding-top:5px"><a href="login.php" style="text-decoration:none;font-size:22px;color:white">Login</a></div>
                </div>
               
            </center>
             </form>
             <?php
                    //For Database Connection make a different file and include that file. No Duplicate Code.
                    include('dbconnect.php');
                    if(isset($_POST['signup'])){
                    //Use if isset from the submit name

                        // Use mysqli_real_escape_string for inserting into database
                    $role=$_POST['role'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $email=$_POST['email'];
                    $name=$_POST['name'];
                    //No need for error Reporting
                    //error_reporting(0);
                    
                    $query1="INSERT INTO login VALUES('$username','$password','$name','$email','$role')";
                    //$query2="SELECT username FROM login";
                    $connection->query($query1) or die("error");
                    if($role=="m"){
                        $query2="INSERT INTO manager VALUES('$username','$password','$name','$email')";
                        $connection->query($query2) or die("error2");
                    }
                    elseif($role=="u"){
                        $query2="INSERT INTO user VALUES('$username','$password','$name','$email')";
                        $connection->query($query1) or die("error3");
                    }
                    echo"<label style='font-size:30px;color:red'>You've Registered Successfully</label>";
                    // $username2=$connection->query($query2);
                    // while($row = $username2->fetch_assoc()){
                    //     echo $row["username"];
                    // }
                    }
            ?>

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