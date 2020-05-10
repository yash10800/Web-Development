<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
            body{
                background: black;
                color:white;
            }
            .nav{
                color: white;
                font-size: 25px;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                font-weight: bold;
                font-style: italic;
                margin-top: 20px;
                position: fixed;
            }
        </style>
    </head>
    <body>
    
        <div class="nav">
            <img src="">
            <label style="margin-left: 800px;">HOME</label>
            <label style="margin-left: 80px;">BOOK</label>
            <label style="margin-left: 80px;">ABOUT</label>
            <label style="margin-left: 80px;">CONTACT US</label>
        </div>
        <div class="slide">
            <div class="img1">
                <img src=""><label></label>
            </div>
            <div class="img2">
                <img src=""><label></label>
            </div>
            <div class="img3">
                <img src=""><label></label>
            </div>
            <div class="img4">
                <img src=""><label></label>
            </div>
        </div>
        <div class="book">
            
            <label style="color: orange;font-size: 40px;font-weight: 300;margin-top:50px;margin-bottom:100px"><center>Book Your Tickets From Here</center></label><br>
            <label style="color: white;font-size: 30px;margin-left:280px">From Place</label>
            <label style="color: white;font-size: 30px;margin-left:150px">To Place</label>
            <label style="color: white;font-size: 30px;margin-left:150px">Price Range</label>
            <label style="color: white;font-size: 30px;margin-left:110px">Vehical Type</label>
            
            <form action="#" method="post">
            <center>
            <select name="fromplace" style="width: 250px;height: 50px;background: black;border: 4px solid cyan;border-radius: 10px;text-align: center;color: white;font-size: 30px;margin-top: 20px;margin-left: 20px;">
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Vadodara">Vadodara</option>
                <option value="Bhavnagar">Bhavnagar</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Bharuch">Bharuch</option>
                </select>

            <select name="toplace" style="width: 250px;height: 50px;background: black;border: 4px solid cyan;border-radius: 10px;text-align: center;color: white;font-size: 30px;margin-top: 20px;margin-left: 20px;">
                <option value="Manali">Manali</option>
                <option value="Rajastan">Rajastan</option>
                <option value="Kerala">Kerala</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Kachh">Kachh</option>
            </select>

            <select name="price" style="width: 250px;height: 50px;background: black;border: 4px solid cyan;border-radius: 10px;text-align: center;color: white;font-size: 30px;margin-top: 20px;margin-left: 20px;">
                <option value="5000">5000-7000</option>
                <option value="7000">7000-9000</option>
                <option value="9000">9000-11000</option>
                <option value="11000">11000-13000</option>
                <option value="13000">13000-15000</option>
            </select>

            <select name="vehical" style="width: 250px;height: 50px;background: black;border: 4px solid cyan;border-radius: 10px;text-align: center;color: white;font-size: 30px;margin-top: 20px;margin-left: 20px;">
                <option value="Red">Mini Bus</option>
                <option value="Green">Enova</option>
                <option value="Blue">Travellor</option>
                <option value="Pink">verna</option>
                <option value="Yellow">Bullet</option>
            </select><br></center>
            <div style="margin-top:50px">
            <label style="color: white;font-size: 30px;margin-left:530px">Departure Date</label>
            <label style="color: white;font-size: 30px;margin-left:100px">Arrival Date</label><br>
            <div>
            <center>
            <input type="date" name="dd" style="width: 250px;height: 50px;background: black;border: 4px solid cyan;border-radius: 10px;text-align: center;color: white;font-size: 30px;margin-top: 20px;margin-left: 20px;">
            <input type="date" name="ad" style="width: 250px;height: 50px;background: black;border: 4px solid cyan;border-radius: 10px;text-align: center;color: white;font-size: 30px;margin-top: 20px;margin-left: 20px;"><br>
                
            <input type="submit" name="submit" value="Procced" style="width: 150px;height: 40px;background: cyan;border: 4px solid orange;border-radius: 10px;text-align: center;color: black;font-size: 20px;margin-top: 50px;margin-left: 20px;" />


                </form>

                <?php
                if(isset($_POST['submit'])){
                $fromplace = $_POST['fromplace'];
                $toplace = $_POST['toplace'];
                $price = $_POST['price']; 
                $vehical = $_POST['vehical']; // Storing Selected Value In Variable
                $dd=$_POST['dd'];
                $ad=$_POST['ad'];
           
                }
                ?>
                    <center>

                    </cenetr>
                
</div>
            
        </form>
        </center>
        </div>
        <div class="fill">
           
        </div>
        <div class="about">

        </div>
        <div class="contact">

        </div>
    </body>
</html>