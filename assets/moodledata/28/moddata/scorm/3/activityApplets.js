/**
 *  ==================================================
 *  SoftChalk LessonBuilder
 *  Copyright 2003-2007 SoftChalk LLC
 *  All Rights Reserved.
 *
 *  http://www.softchalk.com
 *  ==================================================
 *  File date: January 3, 2007
 */

/*
 * other = 0 as a safety
 * 1 is not used
 *
 * FLASH_CARD_ACTIVITY = 2;
 * SEEK_A_WORD_ACTIVITY = 3;
 * DRAG_N_DROP_ACTIVITY = 4;
 * ORDERING_ACTIVITY = 5;
 * CROSSWORD_ACTIVITY = 6;
 * LABELING_ACTIVITY = 7;
 * SORTING_ACTIVITY = 8;
 * HOT_SPOT_ACTIVITY = 9;
 */


function newWin(myFile, myID, winSpecs) {
	var act_id = myID.substring(3);
	if (q_done_a[act_id] && !show_restart_a[act_id]) {
		alert("This activity has been completed.\nOnly one access is allowed.");
	}
	else {
		activityWin = window.open(myFile, myID, winSpecs);
	}
}


// Chris' debugging method not needed
// but keep method name to avoid javascript errors
function readit() {}


function cookit() {

	// 0 is id:act_type (followed by the word "score")
	// 1 is percent
	// 2 is not used
	// 3 is drag/fill-in attempts, currently not used
	//alert("0 = " + cookit.arguments[0] + "\n1 = " + cookit.arguments[1] + "\n2 = " + cookit.arguments[2] + "\n3 = " + cookit.arguments[3]);

	var arg1 = cookit.arguments[0];

	if (arg1.length < 6) {
		alert("Error parsing ID number.\nThis activity can not be scored.");
		return;
	}


	var act_id = null;
	var act_type = null;

	var v = arg1.substring(0, arg1.length - 5);
	var c = v.indexOf(":");

	if (c != -1) {
		act_id = v.substring(0, c);
		act_type = v.substring(c + 1);
	}
	else {
		alert("Error parsing cookit arguments.\nThis activity can not be scored.");
		return;
	}


	// bail if the activity has no points,
	// or if only one attempt is allowed
	if (!opener.scoreQa[act_id] || (opener.q_done_a[act_id] && !opener.show_restart_a[act_id])) {
		// must set this here for newWin() above
		opener.q_done_a[act_id] = true;
		return;
	}


	// get the activity's point value
	var act_value = eval("opener.a_value" + act_id);


	// if first attempt at activity,
	// set attempted_points, set q_done_a to true
	if (!opener.q_done_a[act_id]) {
		opener.attempted_q++;
		opener.attempted_points += act_value;
		opener.q_done_a[act_id] = true;
	}


	// remove previous score from total score
	opener.my_score -= opener.score_a[act_id];


	// get current score
	opener.score_a[act_id] = 0;

	var act_percent = cookit.arguments[1];

	// set to one decimal place
	if (act_percent > 0) {
  	opener.score_a[act_id] = Math.round(((act_value * act_percent) / 100) * 10) / 10;
  }


	// add current score to total score
	opener.my_score += opener.score_a[act_id];

	// set to one decimal place
  if (opener.my_score > 0) {
  	opener.my_score = Math.round(opener.my_score * 10) / 10;
  }


	// update floating score window
	opener.main.stayTopLeft();
	opener.main.document.getElementById("floatingscore").style.visibility = "visible";
	opener.main.document.getElementById("my_score_span").innerHTML = "Score:<br><b>" + opener.my_score + ' of ' + opener.total_points;


	//SCORM data
	if (opener.scorm) {
		var q_type = 7;
		var student_answer = "n/a";

		var correct = "no";
		if (act_percent == "100") {
			correct = "yes";
		}

		//alert("my_status = " + opener.my_status + "\ntotal_points = " + opener.total_points + "\nmy_score = " + opener.my_score + "\napplet_id = " + act_id + "\nq_type = " + q_type + "\nstudent_answer = " + student_answer + "\ncorrect = " + correct);
		opener.sendScorm(act_id, q_type, act_type, student_answer, correct, act_percent);
	}
}
