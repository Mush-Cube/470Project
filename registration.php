#!/usr/local/php5/bin/php-cgi

    <!---
    Name: Roberto Sanchez
    Date: May 13, 2017
    FileName: Registration.php
    Purpose: Get users register for the event into the data base
 -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="master.css">
        <link rel="stylesheet" href="registration.css">
        <title>CookieCoders - Register</title>
    </head>

    <body>
        <div id="MessageBar"> <span>Student Project -- not a commercial site</span> </div>
        <br>
        <header id="header">
            <a href="index.html" title="Home"> <img id="logoImg" src="Images/banner.png" alt="Company Logo" /> </a>
        </header>
        <div class="topnav" id="myTopnav"> <a href="index.html">Home</a> <a href="programdescription.html">Program Description</a> <a href="registration.php" class="active">Register</a> <a href="qanda.php">FAQ</a> <a href="about.html">About</a> </div>
        <div id="Wrapper">
            <div id="topBlock">
                <div id="TextBody1">
                    <h3>Registration is easy!</h3>
                    <p>Using the form below, you can also join in on the experience to change you life forever. This summer 2017, we are hosting our first ever Game Dev event for students in the Los Angeles Area. Registration form will be up until June 28, 2017. </p>
                    <p>The form will ask for your first and last name, phone number, email to get in touch with you about the following event. We will ask you for some educational background to get a better understanding to help you during this event. The following forms will just ask you about your location just better help you to get to the event.</p>

                </div>
                <div id="events">
                    <h2>List of Events</h2>
                    <ul>
                        <li><span style="font-weight:bold">Los Angeles, California - L.A. Convention Center 2017</span>
                            <br>1499 Bond St, Los Angeles, CA 90015 - July 4 - July 11</li>
                        <li> <span style="font-weight:bold">Portland, Oregon - Oregon Convention Center 2018</span>
                            <br> 777 NE Martin Luther King Jr Blvd, Portland, OR 97232 - July 3 - July 10</li>
                        <li>Coming Soon</li>
                        <li>Coming Soon</li>
                        <li>Coming Soon</li>
                        <li>Coming Soon</li>
                        <li>Coming Soon</li>
                        <li>Coming Soon</li>
                        <li>Coming Soon</li>
                    </ul>
                </div>
            </div>
            <div id="bottomBlock">
                <div id="forms">
                   <form method="post" id="innerform" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <h1 id="formTitle"> Registration is Free!</h1>
                        <h4>Let us get to know you a bit: </h4>
                        <div class="formFormat">
                            <p>
                                <label> First Name:
                                    <br>
                                    <input type="text" name="fname" required placeholder="First Name*" minlength="2" size="20" class="required" /> </label>
                                <span class="needed"><?php if($fnameErr == 1){
                                                        echo "Requires a valid first name";}?>*</span>
                                <br> </p>
                            <p>
                                <label> Last Name:
                                    <br>
                                    <input type="text" name="lname" required placeholder="Last Name*" minlength="2" size="20" class="required" /> </label>
                                <span class="needed"><?php if($lnameErr == 1){
                                                        echo "Requires a valid last name";}?>*</span>
                            </p>
                            <p>
                                <label> Phone:
                                    <br>
                                    <input type="tel" name="phone" pattern="^\d{3}-\d{3}-\d{4}$" placeholder="Phone Number*"> </label>
                                <span class="needed"><?php if($phoneErr == 1){
                                                        echo "Requires a valid phone number";}?>*</span>
                                <br>
                                <br>
                                <label>Email:
                                    <br>
                                    <input type="email" name="email" required placeholder="Email Address*" class="required"> </label>
                                <span class="needed"><?php if($emailErr == 1){
                                                        echo "Requires a valid email";}?>*</span>
                            </p>
                        </div>
                        <h4> Education History: (Optional)</h4>
                        <div class="formFormat">
                            <p>
                                <label> School Name:
                                    <br>
                                    <input type="text" name="schoolname"  placeholder="Current School Name*" > </label>
                                <label>
                                    <select name="classlevel" class="jumpmenu">
                                        <option value="NULL">Select Grade</option>
                                        <option value="6">Grade 6</option>
                                        <option value="7">Grade 7</option>
                                        <option value="8">Grade 8</option>
                                        <option value="9">Grade 9</option>
                                        <option value="10">Grade 10</option>
                                        <option value="11">Grade 11</option>
                                        <option value="12">Grade 12</option>
                                    </select>
                                </label>
                            </p>
                        </div>
                        <h4> Event:</h4>
                        <div class="formFormat">
                            <p>
                                <label>
                                    <select name="event" class="jumpmenu">
                                        <option value="NULL">Select Event</option>
                                        <option value="LAS17">Los Angeles - Summer 2017</option>
                                        <option value="PortS18">Portland - Summer 2018</option>
                                    </select>
                                </label>
                                <span class="needed"><?php if($eventErr == 1){
                                                        echo "Requires a valid event";}?>*</span>
                            </p>
                        </div>
                        <h4> Where you're from?</h4>
                        <div class="formFormat">
                            <p>
                                <label> Address:
                                    <br>
                                    <input type="text" name="address" class="required" size="40" minlength="5" placeholder="Address*" /> </label>
                                <span class="needed"><?php if($addressErr == 1){
                                                        echo "Requires a valid address";}?>*</span>
                            </p>
                            <p>
                                <label> City:
                                    <br>
                                    <input type="text" name="city" placeholder="City*" size="30" minlength="2" class="AddressForms" /> </label>
                                <span class="needed"><?php if($cityErr == 1){
                                                        echo "Requires a valid city";}?>*</span>
                            </p>
                            <p>
                                <label>Zipcode:
                                    <input type="text" name="zip" pattern="[0-9]{5}" maxlength="5" placeholder="ZipCode*" size="5" class="AddressForms" onchange="DeliveryCalculation()" /> </label>
                                <span class="needed"><?php if($zipErr == 1){
                                                        echo "Requires a valid zip code";}?>*</span>
                                <br>
                                <label> State
                                    <select name="state" class="jumpmenu">
                                        <option value="NULL">Select State</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District Of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </label>
                                <span class="needed"><?php if($stateErr == 1){
                                                        echo "Requires a valid state";}?>*</span>
                            </p>
                            <label> I accept the <a href="PrivacyPolicy.html" style="background-color:white">Privacy Policy</a>
                                <input type="checkbox" name="privacy" value="y"> </label>
                            <span class="needed"><?php if($privacyErr == 1){
                                                        echo "You did not agreed to the privacy statement";}?>*</span>
                            <br>
                            <input type="submit" name="submit" value="Submit" class="button" id="submit-button" />
                        </div>
                    </form>
                    <?php
                    // Initialization
                    $firstName    = '';
                    $lastName     = '';
                    $phone        = '';
                    $email        = '';
                    $schoolName   = '';
                    $classlevel   = '';
                    $event        = '';
                    $address      = '';
                    $city         = '';
                    $zipcode      = '';
                    $state        = '';
                    $privacy      = '';
                    // Reading in Input from User
                    $firstName    = $_POST['fname'];
                    $lastName     = $_POST['lname'];
                    $phone        = $_POST['phone'];
                    $email        = $_POST['email'];
                    $schoolName   = $_POST['schoolname'];
                    $classlevel   = $_POST['classlevel'];
                    $event        = $_POST['event'];
                    $address      = $_POST['address'];
                    $city         = $_POST['city'];
                    $zipcode      = $_POST['zip'];
                    $state        = $_POST['state'];
                    $privacy      = $_POST['privacy'];
                    // Validation Flags 
                    // NOTE: Incase any error found, don't upload to database
                    $GenFlag      = 0;
                    // NOTE: Singles out errors for displaying on page
                    $fnameErr     = 0;
                    $lnameErr     = 0;
                    $phoneErr     = 0;
                    $emailErr     = 0;
                    
                    $eventErr     = 0;
                    
                    $addressErr   = 0;
                    $cityErr      = 0;
                    $zipErr       = 0;
                    $stateErr     = 0;
                    
                    $privacyErr   = 0;
                    // NOTE: In case User did not leave school information
                    $NoEDU        = 0;
                    // Validation 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                         if(isset($_POST['accept'] )&& $_POST['accept']=='Yes'){
                            // NOTE: Validate First Name
                            if($fname == "" || strlen($fname) < 2 || strlen($fname) > 40)
                            {
                                $GenFlag = 1;
                                $fnameErr = 1;
                            }
                            // NOTE: Validate Last Name
                            if($lname == "" || strlen($lname) < 2 || strlen($lname) > 40)
                            {
                                $GenFlag = 1;
                                $lnameErr = 1;
                            }
                             // NOTE: Validate Phone Number
                            if($phone !=""){
                                if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)){
                                    // Valid Phone #
                                }
                                else{
                                    $GenFlag = 1;
                                    $phoneErr = 1;
                                }
                            }
                             // NOTE: Validate Email
                            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                                $GenFlag = 1;
                                $emailErr = 1;
                            }
                            if($schoolName == ''||$classlevel=="NULL")
                            {
                                $schoolName = "NULL";
                                $classlevel = "NULL";
                                $NoEDU = 1;
                            }
                            // NOTE: Validate Event
                            if($event == "NULL"){
                                $GenFlag = 1;
                                $eventErr = 1;
                            }
                            // NOTE: Validate Address
                            if(strlen($address) < 5 || $address == ""){
                                $GenFlag = 1;
                                $addressErr = 1;
                            }
                             // NOTE: Validate City
                            if($city == "" || strlen($city) < 2|| strlen($city)>40)
                            {
                                $GenFlag = 1;
                                $cityErr = 1;
                            }
                            // NOTE: Validate Zip
                            $intLength = strlen((string)$zip);
                            if( $intLength != 5 || !is_numeric($zip)){
                                $GenFlag = 1;
                                $zipErr = 1;
                            }
                            // NOTE: Validate State
                            if($state == "NULL")
                            {
                                $GenFlag = 1;
                                $stateErr = 1;
                            }
                         }else{
                            //User did not accept to our terms
                            $GenFlag = 1;
                            $privacyErr = 1;
                        }
                        //NOTE: IF USEr acecpted to the agreement, Store into database
                        if($GenFlag == 0){
                            // Create connection
                            $conn = new mysqli("cecs-db01.coe.csulb.edu", "cecs470m28", "ef8yah", "cecs470m28");
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            // NOTE: Sanatize all Inputs
                            $firstName    = mysqli_real_escape_string($conn,$firstName);
                            $lastName     = mysqli_real_escape_string($conn,$lastName);
                            $phone        = mysqli_real_escape_string($conn,$phone);
                            $email        = mysqli_real_escape_string($conn,$email);
                            $schoolName   = mysqli_real_escape_string($conn,$schoolName);
                            $classlevel   = mysqli_real_escape_string($conn,$classlevel);
                            $event        = mysqli_real_escape_string($conn,$event);
                            $address      = mysqli_real_escape_string($conn,$address);
                            $city         = mysqli_real_escape_string($conn,$city);
                            $zipcode      = mysqli_real_escape_string($conn,$zipcode);
                            $state        = mysqli_real_escape_string($conn,$state);
                            $privacy      = mysqli_real_escape_string($conn,$privacy);
                            // NOTE: pass through query
                            $sql = "INSERT INTO student (FirstName,LastName,Email, SchoolName, GradeLevel, Event, PhoneNumber, Address, City, State, ZipCode) 
                                    VALUES ('$firstName','$lastName', '$phone', '$email','$schoolName','$classlevel','$event','$address','$city','$zipcode','$state','$privacy')";

                            // NOTE: Close Connection
                             if ($conn->query($sql) === TRUE) {
                                echo "<p id='popuptext'>Registration Complete</p>";
                            } 
                            else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                            $conn->close();
                        }
                    }
                    
                    
                    ?>
                </div>
                <div id="maps">
                    <h4>Location:</h4>
                    <iframe width="600" height="450" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJBTqlcb_HwoARANqHr6D2Svc&key=AIzaSyCnE8l6rFddHnp22B4eXqWcdSFeZAtD5WI" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <footer> Copyright &copy; 2017 - CookieCoders Organization <?php
        echo "<br> Roberto Sanchez | Contact at: rsanchez92@live.com | Last modified: " . date ("F d Y H:i:s", getlastmod());
    ?></footer>
    </body>

    </html>