<?php

require_once("Template.php");
session_start();
$page = new Template("Survey");
$page -> addHeadElement("<link rel=\"stylesheet\" href=\"css/style.css\">");
$page -> addHeadElement("<meta charset=\"UTF-8\">");
$page -> addHeadElement("<script src=\"js/surveycheck.js\"></script>");
if(!empty($_SESSION['current_user'])) {
	$page -> addHeadElement("<h1>Hello, {$_SESSION['current_user']}</h1>");
}
$page -> finalizeTopSection();
$page -> finalizeBottomSection();

print $page->getTopSection();

print"

    <h1>Survey</h1>

    <nav>
      <a href='privacy.php'>Privacy Policy</a>
      <a href='index.php'>Home</a>
      <a href='albumform.php'>Album Form</a>";
	if($_SESSION['user_role'] == "admin") {
		Print "<a href='survey_data.php'>Survey Data</a>";
	}
	if(!empty($_SESSION['current_user'])) {
		Print "<a href='logout.php'>Log Out</a>";
	}
	print'</nav>

    <article>

      <p> Below I will be asking some questions that you may answer.</p>

      <form name="college" action=action.php onsubmit="return checker();" method="POST">

	<h2>What is your Major?</h2>
	<input type="checkbox" name="major" value="CIS-AppDev" class="checkbox">CIS-AppDev<br>
	<input type="checkbox" name="major" value="CIS-Networking" class="checkbox">CIS-Networking<br>
	<input type="checkbox" name="major" value="WDMD" class="checkbox">WDMD<br>
	<input type="checkbox" name="major" value="WD" class="checkbox">WD<br>
	<input type="checkbox" name="major" value="HTI" class="checkbox">HTI<br>
	<input type="checkbox" name="major" value="Other" class="checkbox">Other
	<h2>What Grade do you expect to receive in CNMT310?</h2>
	<input type="radio" name="grade" id="g1" value="A">A<br>
	<input type="radio" name="grade" id="g2" value="B">B<br>
	<input type="radio" name="grade" id="g3" value="C">C<br>
	<input type="radio" name="grade" id="g4" value="D">D<br>
	<input type="radio" name="grade" id="g5" value="F">F
	<h2>What is your favorite pizza toppings?</h2>
	<input type="radio" name="pizza" id="p1" value="pineapple">Pineapple<br>
	<input type="radio" name="pizza" id="p2" value="cheese">Cheese<br>
	<input type="radio" name="pizza" id="p3" value="anchovies">Anchovies<br>
	<input type="radio" name="pizza" id="p4" value="onions">Onions<br>
	<input type="radio" name="pizza" id="p5" value="pepperoni">Pepperoni<br><br>

	<input type="submit" value="Submit">
      </form>

    </article>
';
  
  print $page->getBottomSection();

?>
