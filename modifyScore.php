<?php

if (isset($_POST['updateScore'])) {

  $stats = json_decode(file_get_contents("messages2.json"));

  echo (intval($stats->{'Team1'}->{'Player1'}->{'Score'}) + intval($_POST['Team1Player1ScoreAdd']));

  $stat = array(
    "Team1" => array(
      "Name" => $stats->{'Team1'}->{'Name'},
      "Player1" => array(
        "Name" => $stats->{'Team1'}->{'Player1'}->{'Name'},
        "Score" => (intval($stats->{'Team1'}->{'Player1'}->{'Score'}) + intval(isset($_POST['Team1Player1ScoreAdd'])?$_POST['Team1Player1ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team1'}->{'Player1'}->{'Fouls'}) + intval(isset($_POST['Team1Player1FoulAdd'])?$_POST['Team1Player1FoulAdd']:0))
      ),
      "Player2" => array(
        "Name" => $stats->{'Team1'}->{'Player2'}->{'Name'},
        "Score" => (intval($stats->{'Team1'}->{'Player2'}->{'Score'}) + intval(isset($_POST['Team1Player2ScoreAdd'])?$_POST['Team1Player2ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team1'}->{'Player2'}->{'Fouls'}) + intval(isset($_POST['Team1Player2FoulAdd'])?$_POST['Team1Player2FoulAdd']:0))
      ),
      "Player3" => array(
        "Name" => $stats->{'Team1'}->{'Player3'}->{'Name'},
        "Score" => (intval($stats->{'Team1'}->{'Player3'}->{'Score'}) + intval(isset($_POST['Team1Player3ScoreAdd'])?$_POST['Team1Player3ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team1'}->{'Player3'}->{'Fouls'}) + intval(isset($_POST['Team1Player3FoulAdd'])?$_POST['Team1Player3FoulAdd']:0))
      ),
      "Player4" => array(
        "Name" => $stats->{'Team1'}->{'Player4'}->{'Name'},
        "Score" => (intval($stats->{'Team1'}->{'Player4'}->{'Score'}) + intval(isset($_POST['Team1Player4ScoreAdd'])?$_POST['Team1Player4ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team1'}->{'Player4'}->{'Fouls'}) + intval(isset($_POST['Team1Player4FoulAdd'])?$_POST['Team1Player4FoulAdd']:0))
      ),
      "Total_Score" => ''
    ),
    "Team2" => array(
      "Name" => $stats->{'Team2'}->{'Name'},
      "Player1" => array(
        "Name" => $stats->{'Team2'}->{'Player1'}->{'Name'},
        "Score" => (intval($stats->{'Team2'}->{'Player1'}->{'Score'}) + intval(isset($_POST['Team2Player1ScoreAdd'])?$_POST['Team2Player1ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team2'}->{'Player1'}->{'Fouls'}) + intval(isset($_POST['Team2Player1FoulAdd'])?$_POST['Team2Player1FoulAdd']:0))
      ),
      "Player2" => array(
        "Name" => $stats->{'Team2'}->{'Player2'}->{'Name'},
        "Score" => (intval($stats->{'Team2'}->{'Player2'}->{'Score'}) + intval(isset($_POST['Team2Player2ScoreAdd'])?$_POST['Team2Player2ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team2'}->{'Player2'}->{'Fouls'}) + intval(isset($_POST['Team2Player2FoulAdd'])?$_POST['Team2Player2FoulAdd']:0))
      ),
      "Player3" => array(
        "Name" => $stats->{'Team2'}->{'Player3'}->{'Name'},
        "Score" => (intval($stats->{'Team2'}->{'Player3'}->{'Score'}) + intval(isset($_POST['Team2Player3ScoreAdd'])?$_POST['Team2Player3ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team2'}->{'Player3'}->{'Fouls'}) + intval(isset($_POST['Team2Player3FoulAdd'])?$_POST['Team2Player3FoulAdd']:0))
      ),
      "Player4" => array(
        "Name" => $stats->{'Team2'}->{'Player4'}->{'Name'},
        "Score" => (intval($stats->{'Team2'}->{'Player4'}->{'Score'}) + intval(isset($_POST['Team2Player4ScoreAdd'])?$_POST['Team2Player4ScoreAdd']:0)),
        "Fouls" => (intval($stats->{'Team2'}->{'Player4'}->{'Fouls'}) + intval(isset($_POST['Team2Player4FoulAdd'])?$_POST['Team2Player4FoulAdd']:0))
      ),
      "Total_Score" => ''
    )
  );

  $stat["Team1"]["Total_Score"] = $stat["Team1"]["Player1"]["Score"] + $stat["Team1"]["Player2"]["Score"] + $stat["Team1"]["Player3"]["Score"] + $stat["Team1"]["Player4"]["Score"];
  $stat["Team2"]["Total_Score"] = $stat["Team2"]["Player1"]["Score"] + $stat["Team2"]["Player2"]["Score"] + $stat["Team2"]["Player3"]["Score"] + $stat["Team2"]["Player4"]["Score"];

  if (!file_put_contents("messages2.json", json_encode($stat, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX)) {
    $error = "Error storing message, please try again";
  } else {

    $timer = $_POST['timer'];
    header("Location: stat.php?timer=".$timer);
  }
}

function test(){
  echo "<script>alert('test')</script>";
}