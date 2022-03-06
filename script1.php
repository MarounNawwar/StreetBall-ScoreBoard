<?php 
	// First of all we have to check if the form is submitted via the POST
	// method.
	if(isset($_POST['info'])){
		// If the form is submitted we are gonna create a new associative array
		// to hold the values we will store.
		$new_message = array(
			"TEAM1NAME" => $_POST['TEAM1NAME'],
			"PLAYER1" => $_POST['PLAYER1'],
			"PLAYER2" => $_POST['PLAYER2'],
			"PLAYER3" => $_POST['PLAYER3'],
			"PLAYER4" => $_POST['PLAYER4'],
			"TEAM2NAME" => $_POST['TEAM2NAME'],
			"PLAYER5" => $_POST['PLAYER5'],
			"PLAYER6" => $_POST['PLAYER6'],
			"PLAYER7" => $_POST['PLAYER7'],
			"PLAYER8" => $_POST['PLAYER8']
		);
		
		// Before storing the $new_message[] array, we have to check if this is 
		// the first record.
		// We are doing this by checking the filesize.
		if(filesize("messages.json") == 0){
			// if this is the first record, we creating an array to hold out message.
			$first_record = array($new_message);
			// The only purpose of this step is to create an array inside the json 
			// file to hold our messages. You will see in sec.
			
			/* I'll assign the record to a generic variable for later use. */
			$data_to_save = $first_record; 
		}else{
			// If this is not the first record, and there are messages stored in the file.
			// We have to pull all those old messages so we can add the new one.
			// And also we have to decode the data we fetch.
			$old_records = json_decode(file_get_contents("messages.json"));

			// We know that all of our messages are stored inside an array,
			// because we created that array with the first record.
			// Now we can add to that array our new message.
			array_push($old_records, $new_message);

			/* and i'll assign the record to our generic variable. */
			$data_to_save = $old_records;
		}

		// Now our last step is to store the data to the file (messages.json).
		if(!file_put_contents("messages.json", json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX)){
			// if something went wrong, we are showing an error message.
			$error = "Error storing message, please try again";
		}else{
			// and if everything went ok, we show a success message.
			$success =  "Message is stored successfully";
		}
	}
