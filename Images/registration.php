#!/usr/local/php5/bin/php-cgi
<?php
    
    // Database Stuff
    $connection = mysqli_connect("URLDATABASE","USRNAME", "PASSWORD", "PS");
    $error = mysqli_connect_error();
    if ($error != null)
    {
      echo "Failed to Connect to DB....";
      // Outputs a message and terminates the current script
      exit($output);
    }
    // initialize variables
?>
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
    <header id="header">
        <a href="index.html" title="Home"> <img id="logoImg" src="Images/banner.png" alt="Company Logo" /> </a>
    </header>
    <div class="topnav" id="myTopnav"> <a href="index.html">Home</a> <a href="programdescription.html">Program Description</a> <a href="registration.php" class="active">Register</a> <a href="qanda.php">FAQ</a> <a href="about.html">About</a> </div>
    <div id="Wrapper">
        <div id="topBlock">
            <div id="TextBody1">
                <h3>Registration is easy!</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. </p>
                <p> Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. </p>
            </div>
            <div id="events">
                <h2>List of Events</h2>
                <ul>
                    <li>Los Angeles, California - L.A. Convention Center 2017
                        <br>1499 Bond St, Los Angeles, CA 90015 - July 4 - July 11</li>
                    <li>Portland, Oregon - Oregon Convention Center 2018
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
        <div id="bottomBlock"> </div>
        <div id="forms">
            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <h1 id="formTitle"> Registration is Free!</h1>
                <h4>Let us get to know you a bit: </h4>
                <p>
                    <label>
                        <input type="text" name="fname" required placeholder="First Name*" minlength="2" size="20" class="required" /> </label>
                    <label>
                        <input type="text" name="lname" required placeholder="Last Name*" minlength="2" size="20" class="required" /> </label>
                </p>
                <p>
                    <label>
                        <input type="tel" name="phone" pattern="^\d{3}-\d{3}-\d{4}$" placeholder="Phone Number*"> </label>
                    <label>
                        <input type="email" name="email" required placeholder="Email Address*" class="required"> </label>
                </p>
                <h4> Current Education level:</h4>
                <p>
                    <label>
                        <input type="text" name="schoolname" required placeholder="Current School Name*" class="required"> </label>
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
                <h4> Event:</h4>
                <p>
                    <label>
                        <select name="event" class="jumpmenu">
                            <option value="NULL">Select Event</option>
                            <option value="LAS17">Los Angeles - Summer 2017</option>
                            <option value="PortS18">Portland - Summer 2018</option>
                        </select>
                    </label>
                </p>
                <h4> Where you're from?</h4>
                <p>
                    <label>
                        <input type="text" name="address" class="required" size="40" minlength="5" placeholder="Address*" /> </label>
                </p>
                <p>
                    <label>
                        <input type="text" name="city" placeholder="City*" size="30" minlength="2" class="AddressForms" /> </label>
                </p>
                <p>
                    <label>
                        <input type="text" name="zip" pattern="[0-9]{5}" maxlength="5" placeholder="ZipCode*" size="5" class="AddressForms" onchange="DeliveryCalculation()" /> </label>
                    <label>
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
                </p>
                <p>I accept the <a href="PrivacyPolicy.html" style="background-color:white">Privacy Policy</a>
                    <input type="checkbox" name="privacy" value="y"> </p>
                <button type="submit " class="btn btn-primary ">Submit</button>
            </form>
        </div>
        <div id="maps">
            <h4>Location:</h4>
            <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJBTqlcb_HwoARANqHr6D2Svc&key=AIzaSyCnE8l6rFddHnp22B4eXqWcdSFeZAtD5WI" allowfullscreen></iframe>
        </div>
    </div>
        <footer> Copyright &copy; 2017 - CookieCoders Organization </footer>
        
</body>
</html>
