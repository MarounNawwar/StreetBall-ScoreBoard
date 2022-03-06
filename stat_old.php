<?php 

  require("script.php"); 
  require("script1.php"); 
  require("script2.php"); 
  require("modifyScore.php");

if(filesize("messages2.json")==0){
  header("Location: index.php");
}else{

  $stat_json = json_decode(file_get_contents("messages2.json"));

  $stat = array(
    "Team1" => array(
      "Name" => $stat_json->{'Team1'}->{'Name'},
      "Player1" => array(
        "Name" => $stat_json->{'Team1'}->{'Player1'}->{'Name'},
        "Score" => $stat_json->{'Team1'}->{'Player1'}->{'Score'},
        "Fouls" => $stat_json->{'Team1'}->{'Player1'}->{'Fouls'}
      ),
      "Player2" => array(
        "Name" => $stat_json->{'Team1'}->{'Player2'}->{'Name'},
        "Score" => $stat_json->{'Team1'}->{'Player2'}->{'Score'},
        "Fouls" => $stat_json->{'Team1'}->{'Player2'}->{'Fouls'}
      ),
      "Player3" => array(
        "Name" => $stat_json->{'Team1'}->{'Player3'}->{'Name'},
        "Score" => $stat_json->{'Team1'}->{'Player3'}->{'Score'},
        "Fouls" => $stat_json->{'Team1'}->{'Player3'}->{'Fouls'}
      ),
      "Player4" => array(
        "Name" => $stat_json->{'Team1'}->{'Player4'}->{'Name'},
        "Score" => $stat_json->{'Team1'}->{'Player4'}->{'Score'},
        "Fouls" => $stat_json->{'Team1'}->{'Player4'}->{'Fouls'}
      ),
      "Total_Score" => ""
    ),
    "Team2" => array(
      "Name" => $stat_json->{'Team2'}->{'Name'},
      "Player1" => array(
        "Name" => $stat_json->{'Team2'}->{'Player1'}->{'Name'},
        "Score" => $stat_json->{'Team2'}->{'Player1'}->{'Score'},
        "Fouls" => $stat_json->{'Team2'}->{'Player1'}->{'Fouls'}
      ),
      "Player2" => array(
        "Name" => $stat_json->{'Team2'}->{'Player2'}->{'Name'},
        "Score" => $stat_json->{'Team2'}->{'Player2'}->{'Score'},
        "Fouls" => $stat_json->{'Team2'}->{'Player2'}->{'Fouls'}
      ),
      "Player3" => array(
        "Name" => $stat_json->{'Team2'}->{'Player3'}->{'Name'},
        "Score" => $stat_json->{'Team2'}->{'Player3'}->{'Score'},
        "Fouls" => $stat_json->{'Team2'}->{'Player3'}->{'Fouls'}
      ),
      "Player4" => array(
        "Name" => $stat_json->{'Team2'}->{'Player4'}->{'Name'},
        "Score" => $stat_json->{'Team2'}->{'Player4'}->{'Score'},
        "Fouls" => $stat_json->{'Team2'}->{'Player4'}->{'Fouls'}
      ),
      "Total_Score" => ""
    )
  );

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="How to store form data in a json file with php">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>StreetBall Stats</title>
</head>

<body>
  <h1> MEDIAMANIA</h1>

  <div class="score-input-container">
    <div class="container team-input">
      <button data-decrease>-</button>
      <input data-value type="text" value="0" disabled />
      <button data-increase>+</button>
    </div>
    <div class="container team-input">
      <button data-decrease>-</button>
      <input data-value type="text" value="1" />
      <button data-increase>+</button>
    </div>
  </div>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script>
    $(function() {
      $('[data-decrease]').click(decrease);
      $('[data-increase]').click(increase);
      $('[data-value]').change(valueChange);
    });

    function decrease() {
      var value = $(this).parent().find('[data-value]').val();
      if (value > 1) {
        value--;
        $(this).parent().find('[data-value]').val(value);
      }
    }

    function increase() {

      value = $(this).parent().find('[data-value]').val();
      if (value < 100) {
        value = parseInt(value) + 3;
        $(this).parent().find('[data-value]').val(value);
      }
    }

    function valueChange() {
      var value = $(this).val();
      if (value == undefined || isNaN(value) == true || value <= 0) {
        $(this).val(1);
      } else if (value >= 101) {
        $(this).val(100);
      }
    }
  </script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
  <div class="timer">
    <span class="minute">00</span>:<span class="second">10</span>
  </div>
  <div class="control">
    <button onClick="timer.start(1000)">Start</button>
    <button onClick="timer.stop()">Stop</button>
    <button onClick="timer.reset(600)">Reset</button>
    <button onClick="timer.mode(1)">Count up</button>
    <button onClick="timer.mode(0)">Count down</button>
  </div>
  <script>
    function _timer(callback) {
      var time = 1; //  The default time of the timer
      var mode = 1; //    Mode: count up or count down
      var status = 0; //    Status: timer is running or stoped
      var timer_id; //    This is used by setInterval function

      // this will start the timer ex. start the timer with 1 second interval timer.start(1000)
      this.start = function(interval) {
        interval = typeof interval !== "undefined" ? interval : 1000;

        if (status == 0) {
          status = 1;
          timer_id = setInterval(function() {
            switch (mode) {
              default:
                if (time) {
                  time--;
                  generateTime();
                  if (typeof callback === "function") callback(time);
                }
                break;

              case 1:
                if (time < 86400) {
                  time++;
                  generateTime();
                  if (typeof callback === "function") callback(time);
                }
                break;
            }
          }, interval);
        }
      };

      //  Same as the name, this will stop or pause the timer ex. timer.stop()
      this.stop = function() {
        if (status == 1) {
          status = 0;
          clearInterval(timer_id);
        }
      };

      // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
      this.reset = function(sec) {
        sec = typeof sec !== "undefined" ? sec : 0;
        time = sec;
        generateTime(time);
      };

      // Change the mode of the timer, count-up (1) or countdown (0)
      this.mode = function(tmode) {
        mode = tmode;
      };

      // This methode return the current value of the timer
      this.getTime = function() {
        return time;
      };

      // This methode return the current mode of the timer count-up (1) or countdown (0)
      this.getMode = function() {
        return mode;
      };

      // This methode return the status of the timer running (1) or stoped (1)
      this.getStatus; {
        return status;
      }

      // This methode will render the time variable to hour:minute:second format
      function generateTime() {
        var second = time % 60;
        var minute = Math.floor(time / 60) % 60;


        second = second < 10 ? "0" + second : second;
        minute = minute < 10 ? "0" + minute : minute;


        $("div.timer span.second").html(second);
        $("div.timer span.minute").html(minute);

      }
    }

    // example use
    var timer;

    $(document).ready(function(e) {
      timer = new _timer(function(time) {
        if (time == 0) {
          timer.stop();
          alert("time out");
        }
      });
      timer.reset(0);
      timer.mode(0);
    });
  </script>

  <div class="SCR1">
    <h3><?php echo $stat["Team1"]["Name"] ?></h3></br>
    <label><?php echo $stat["Team1"]["Player1"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
    </br>
    <label><?php echo $stat["Team1"]["Player2"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
    </br>
    <label><?php echo $stat["Team1"]["Player3"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
    </br>
    <label><?php echo $stat["Team1"]["Player4"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
  </div>
  <div class="SCR2">
    <h3><?php echo $stat["Team2"]["Name"] ?></h3><br/>
    <label><?php echo $stat["Team2"]["Player1"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
    </br>
    <label><?php echo $stat["Team2"]["Player2"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
    </br>
    <label><?php echo $stat["Team2"]["Player3"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
    </br>
    <label><?php echo $stat["Team2"]["Player4"]["Name"] ?></label>
    <input type="TEXT" name="TEAM1NAME" value="">
  </div>
  <form method="post" action="">
    <input type="submit" name="updateScore" value="Update Test">
    </form>
</body>

</html>