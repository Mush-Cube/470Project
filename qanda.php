#!/usr/local/php5/bin/php-cgi

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="qanda_css.css"/>
    <title>CookieCoders - (FAQ)</title>
</head>

<body>
<!-- Message Bar -->
   <div id="MessageBar">
       <span>Student Project -- not a commercial site</span>
   </div>

<!-- Banner Logo -->
    <header id="header">
        <br><a href="http://web.csulb.edu/~rsanche3/finalproject/index.html" title="Home"> <img id="logoImg" src="Images/banner.png" alt="Company Logo" /> </a>
    </header>

<!-- Navigation Bar -->
    <div class="topnav" id="myTopnav"> <a href="index.html">Home</a> <a href="programdescription.html">Program Description</a> <a href="registration.php">Register</a> <a class="active" href="qanda.php">FAQ</a> <a href="about.html">About</a> </div>
    <div id="Wrapper">

<!-- FAQ Section -->
    <h1>Frequently Asked Questions:</h1>
    <div id="questions-answers">
    <ul>
<li><b>What do the summer programs hope to achieve?</b><br> 
    Our goal for the summer program is to educate the enrolled students on the foundations of software development through game making. The students will learn those core values and hopefully nurture a fascination on the subject.<br><br></li>
<li><b>Who will be participating?</b><br>
    As of right now, core employees of Cookie Coders and other volunteers will be present on the scene.<br><br></li>
<li><b>How will it work?</b><br>
    Students will enter the venue around 10am on July 4th to be processed in until the event begins around 1pm. From there we will begin the program and culminate on July 11th at 5pm. The students will be giving on the first day an orientation, a basic run down on the tools they will be using, and their first project to complete. As the days go one they will work on different projects.<br><br></li>
<li><b>What do the enrolled students get for participation?</b><br>
    If the student fully participates in this program he/she will get available learning experiences and get to take whatever they worked on in this program home if they wish to continue developing their ideas.<br><br></li>
<li><b>Where will these ideas be presented?</b><br>
    Most ideas will be presented through powerpoint presentations. We are giving out binders to all of our participating students filled with resources to aid them when working. We also have mentors going around helping students independently if problems arise.<br><br></li>
<li><b>What will happen with the ideas developed at the event?</b><br>
    Once students go through orientation on the first day, we will give them a quick run down on the tools they will be using for the next couple of days. Our goal is to have daily challenges for the students to solve. Some assignments are done independently and some require working in teams. As the event closes, the students will have the basic foundations of software development and skills to make their own games and programs at home.<br><br></li>
<li><b>Where and when will the event take place?</b><br>
    Cookie Coder's Game Development - Summer 2017 will take place at the Los Angeles Convention Center on July 4 - July 11, 2017.<br><br></li>
<li><b>How do I register?</b><br>
    To register for the event, we have a webpage <a href="http://web.csulb.edu/~rsanche3/finalproject/registration.php">here</a>. The only thing required as of right now is your full name, address, and age. We may ask for more information as the event gets closer.<br><br></li>
<li><b>Is there a hashtag for the event?</b><br>
    Yes! #CookieCodersSummer2017<br><br></li>
<li><b>Who are the primary sponsors?</b><br>
    As of right now, we do not have established sponsors for the event. That said, we have potential sponsors who are interested in sponsoring the event and future events. Those details will be revealed as time goes on.<br></li>
</ul></div>
    </div>

<!-- Validating Form Variables -->
<?php
    // define variables and set to empty values
    $nameErr = $phoneErr = $emailErr = $commentErr = $privacyErr = '';
    $name = $phone = $email = $comment = $privacy = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) {
            $nameErr = "Name is required";
        }
        elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
            $nameErr = "Please enter only letters and whitespaces";
        }
        else {
            $name = test_input($_POST["name"]);
        }

        if(empty($_POST["phone"])) {
            $phoneErr = "Phone is required";
        }
        elseif(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $_POST["phone"])) {
            $nameErr = "Please enter a valid phone number";
        }
        else {
            $phone = test_input($_POST["phone"]);
        }

        if(empty($_POST["email"])) {
            $emailErr = "Email is required";
        }
        // Check if e-mail address is well-formed
        elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Please enter a valid email format";
        }
        else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["comment"])) {
            $_POST["comment"] = "None";
        }
        elseif(strlen($POST["comment"] > 200)) {
            $commentErr = "Please limit characters less than or equal to 200";
            $comment = '';
        }
        else {
            $comment = test_input($_POST["comment"]);
        }

        if(empty($_POST['privacy'])) {
            $privacyErr = "If you agree to the terms, please check the box";
        }
        else {
            $privacy = $_POST['privacy'];
        }
    }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!-- Storing to Database -->
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST" && ($name != '') && ($phone != '') && ($email != '') && ($comment != '') && ($_POST["privacy"] == 'on')) 
   {
        $servername = "[SERVERNAME]";
        $username = "[USRNAME]";
        $password = "[PS]";
        $dbname = "[DBNAME]";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $userName = mysqli_real_escape_string($conn,$name);
        $userPhone = mysqli_real_escape_string($conn,$phone);
        $userEmail = mysqli_real_escape_string($conn,$email);
        $userComment = mysqli_real_escape_string($conn,$comment);
        $privacyConfirm = mysqli_real_escape_string($conn,$privacy);

        $sql = "INSERT INTO inquiry (name, phone, email, comments, privacy) 
                VALUES ('$userName','$userPhone', '$userEmail', '$userComment', 
                        '$privacyConfirm')";

        if ($conn->query($sql) === TRUE) {
            echo "<p id='sqlRecord'>Submission Successful!</p>";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
   }
?>

<!-- Form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2>Have additional questions not mentioned above?</h2>
<p id="form-description">Feel free to leave a question for us to answer. Our volunteers will respond as quickly as possible.</p>
<p class="required-field-text"><span class="error">* Required field</span></p>
    <div class=text>
        <p><label for="name">Full Name<br/>
                <input type="text" name="name" id="name" placeholder="Jane Smith" class="required" size="35" maxlength="45" value="<?php echo $name;?>"/></label>
                <span class="error">* <?php echo $nameErr;?></span></p>
        <p><label for="phone">Phone<br/>
                <input type="tel" name="phone" id="phone" placeholder="123-456-7890" pattern="^\d{3}-\d{3}-\d{4}$" maxlength="13" value="<?php echo $phone;?>"/></label>
                <span class="error">* <?php echo $phoneErr;?></span></p>
        <p><label for="email">E-mail<br/>
                <input type="email" name="email" id="email" placeholder="jane.smith@gmail.com" maxlength="45" class="required" size="35" value="<?php echo $email;?>"/></label>
                <span class="error">* <?php echo $emailErr;?></span></p>
    </div>
    <div class="comments">
        <label>Additional Comments<br/>
            <textarea rows="3" cols="60" name="comment" placeholder="Enter no more than 200 characters" maxlength="200"><?php echo $comment; ?></textarea></label>
                <br><span id="chars">200</span> characters remaining
                <span class="error"><?php echo "<br>". $commentErr;?></span>
    </div><br/>
    <div class="rectangle">
        <label> I accept the <a href="PrivacyPolicy.html" target="_blank" id="privacyPolicy"> Privacy Policy</a>
            <input type="checkbox" name="privacy" class="required" id="privacy"
                <?php echo (empty($_POST['privacy'])) ? '':'checked'; ?>></label>
            <span class="error">* <?php echo $privacyErr; ?></span>
    </div>
    <input type="submit" name="submit" value="Submit" class="button" id="submit-button"/>
    <input type="reset" value="Clear Form" class="button" id="reset-button"/>
</form>

<img id="faq-image" src="Images/faq-kid.png" alt="Have a Question?">
<br><br>

<footer>Copyright &copy; 2017 - CookieCoders Organization
<div id="contact">
        <p> Contact: Jennifer Nguyen | Email: jennifer.nguyen27@student.csulb.edu
        </p>
    <!-- <!Code for last update> -->
    <?php
        echo "Last modified: " . date ("F d Y H:i:s", getlastmod());
    ?>
</div>
</footer>

<!-- JQuery Script for Textarea Character Count -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    var maxLength = 200;
        $('textarea').keyup(function() {
          var length = $(this).val().length;
          var length = maxLength-length;
          $('#chars').text(length);
    });
</script>
</body>
</html>
