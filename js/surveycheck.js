function checker(){
    
    var message = "Warning: ";
    var major = document.getElementsByClassName("checkbox"); //It works by somehow iterating through each element of a array that the class name called upon then it will check if the element is checked or not.  If it is then it will make the checked truth true and end the cycle.
    var majorcheck = false;
    for(var i = 0; major[i]; i++) {
	if(major[i].checked) {
	    majorcheck = true;
	    break;
	}

    }
	//Checked each radio box iteratively, if one of the radios is checked the true will propagate through the or statements.  Could not figure out a more elegant solution in the time allotted.  And I am really not good with forms.
    var gradecheck = document.getElementById("g1").checked||document.getElementById("g2").checked||document.getElementById("g3").checked||document.getElementById("g4").checked||document.getElementById("g5").checked;
	var pizzacheck = document.getElementById("p1").checked||document.getElementById("p2").checked||document.getElementById("p3").checked||document.getElementById("p4").checked||document.getElementById("p5").checked;

    if(majorcheck == false) {

	message += "You have failed to select a major; "
	
    }
    if(gradecheck == false) {

	message += "You have failed to select a grade; "

    }
    if(pizzacheck == false) {

	message += "You have failed to select a topping; "
	
    }

    if(message != "Warning: ")
    {
	message += "Please select these options in order for your survey to be completed."
      
	alert(message);
	window.location.replace("survey.php");
    }

    
}
