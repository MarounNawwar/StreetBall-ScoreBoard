<?php

require("script.php");
require("script1.php");
require("script2.php");
require("modifyScore.php");

if (filesize("messages2.json") == 0) {
    header("Location: index.php");
} else {

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

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="How to store form data in a json file with php">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>StreetBall Stats</title>
    </head>

    <body>
        <h1> MEDIAMANIA</h1>



        <div class="row mt-4">
            <div class="col-4 col-md-3 text-center">
                <h3 class="Teams-Title"><?php echo $stat["Team1"]["Name"] ?></h3>
                <h2 class="Teams-Score"><?php echo $stat_json->{'Team1'}->{'Total_Score'} ?></h2>
            </div>
            <div class="col-4 col-md-6 text-center p-0">
                <div class="row">
                    <div class="col-3 control">
                        <div class="col-12">
                            <button class="ctrl" onClick="startTimer(1000)">Start</button>
                        </div>
                        <div class="col-12">
                            <button class="ctrl" onClick="stopTimer()">Stop</button>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="timer timer2 w-100 text-center">
                            <span class="minute">10</span>:<span class="second">00</span>

                        </div>
                        <div class="timer smallTimer w-100 text-center">
                            <span class="S_timer">24</span>
                        </div>
                    </div>
                    <div class="col-3 p-0 control">
                        <div class="col-12">
                            <button class="ctrl" onClick="resetTimer(600)">Reset</button>
                        </div>
                        <div class="col-12">
                            <button class="ctrl" onClick="resetSTimer(24)">Clock</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-4 col-md-3 text-center">
                <h3 class="Teams-Title"><?php echo $stat["Team2"]["Name"] ?></h3>
                <h2 class="Teams-Score"><?php echo $stat_json->{'Team2'}->{'Total_Score'} ?></h2>
            </div>
        </div>
        <form method="post" action="modifyScore.php">
            <div class="row">
                <div class="col-lg-4 col-md-12 p-3">
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-4 col-form-label col-form-label-sm text-right"><?php echo $stat_json->{'Team1'}->{'Player1'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player1ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player1FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-4 col-form-label col-form-label-sm text-right"><?php echo $stat_json->{'Team1'}->{'Player2'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player2ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player2FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-4 col-form-label col-form-label-sm text-right"><?php echo $stat_json->{'Team1'}->{'Player3'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player3ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player3FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-4 col-form-label col-form-label-sm text-right"><?php echo $stat_json->{'Team1'}->{'Player4'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player4ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team1Player4FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-3">
                    <div class="row">
                        <div class="col-6 pt-0">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Points</th>
                                        <th scope="col">Fouls</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player1'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player1'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player1'}->{'Fouls'} ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player2'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player2'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player2'}->{'Fouls'} ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player3'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player3'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player3'}->{'Fouls'} ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player4'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player4'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team1'}->{'Player4'}->{'Fouls'} ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 pt-0">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Points</th>
                                        <th scope="col">Fouls</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player1'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player1'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player1'}->{'Fouls'} ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player2'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player2'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player2'}->{'Fouls'} ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player3'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player3'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player3'}->{'Fouls'} ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player4'}->{'Name'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player4'}->{'Score'} ?></td>
                                        <td><?php echo $stat_json->{'Team2'}->{'Player4'}->{'Fouls'} ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center pt-2">
                            <input type="submit" class="btn btn-primary btn-lg active" style="background-color: #ffa500; border-color:  #ffa500;" name="updateScore" value="Update">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center pt-2">
                            <a href="index.php" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">Exit</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 p-3">
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-2 col-form-label col-form-label-sm"><?php echo $stat_json->{'Team2'}->{'Player1'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player1ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player1FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-2 col-form-label col-form-label-sm"><?php echo $stat_json->{'Team2'}->{'Player2'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player2ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player2FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-2 col-form-label col-form-label-sm"><?php echo $stat_json->{'Team2'}->{'Player3'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player3ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player3FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="PlayerTextName col-sm-2 col-form-label col-form-label-sm"><?php echo $stat_json->{'Team2'}->{'Player4'}->{'Name'} ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player4ScoreAdd" max="3" placeholder="Score">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-lg" name="Team2Player4FoulAdd" min="-1" max="1" placeholder="Fouls">
                        </div>
                    </div>
                </div>
            </div>
            <input id="timerSec" type="hidden" value="600" name="timer">
        </form>
        <script src="jquery-3.2.1..min.js" crossorigin="anonymous"></script>
        <script src="popper.js" crossorigin="anonymous"></script>
        <script src="bootstrap.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
        <script>
            var timerRemaining = <?php echo(isset($_GET['timer'])) ? intval($_GET['timer']) : 600; ?>
        </script>
        <script src="main.js"></script>
    </body>
    </html>
<?php
}
?>