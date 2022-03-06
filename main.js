function SecondTimer(callback){
    var time = 24;
    var status = 0; 
    var timer_id;

    // this will start the timer ex. start the timer with 1 second interval timer.start(1000)
    this.start = function(interval) {
        interval = typeof interval !== "undefined" ? interval : 1000;
        if (status == 0) {
            status = 1;
            timer_id = setInterval(function() {
                if (time) {
                    time--;
                    displayTime();
                    if (typeof callback === "function") callback(time);
                }
            }, interval);
        }
    };

    this.stop = function() {
        if (status == 1) {
            status = 0;
            clearInterval(timer_id);
        }
    };

    this.reset = function(sec) {
        if (status == 1) {
            status = 0;
            clearInterval(timer_id);
        }
        sec = typeof sec !== "undefined" ? sec : 24;
        time = sec;
        displayTime(time);
    };

    // This methode return the current value of the timer
    this.getTime = function() {
        return time;
    };

    // This methode return the status of the timer running (1) or stoped (1)
    this.getStatus = function() {
        return status;
    }

    function displayTime() {
        $("div.smallTimer span.S_timer").html(time);
    }

}

function _timer(callback) {
    var time = 1; //  The default time of the timer
    var status = 0; //    Status: timer is running or stoped
    var timer_id; //    This is used by setInterval function
    var intrvl;
    var miniTimer = new SecondTimer(function(SecondaryTime) {
        if (SecondaryTime == 0) {
            status = 0;
            clearInterval(timer_id);
            miniTimer.reset();
            alert("24 Clock Finished");
        }
    });

    // this will start the timer ex. start the timer with 1 second interval timer.start(1000)
    this.start = function(interval) {
        intrvl = interval;
        miniTimer.start();
        interval = typeof interval !== "undefined" ? interval : 1000;
        if (status == 0) {
            status = 1;
            timer_id = setInterval(function() {
                if (time) {
                    time--;
                    generateTime();
                    if (typeof callback === "function") callback(time);
                }
            }, interval);
        }
    };

    //  Same as the name, this will stop or pause the timer ex. timer.stop()
    this.stop = function() {
        if (status == 1) {
            status = 0;
            miniTimer.stop();
            clearInterval(timer_id);
        }
    };

    // Reset the timer to zero or reset it to your own custom time ex. reset to zero second timer.reset(0)
    this.reset = function(sec) {
        sec = typeof sec !== "undefined" ? sec : 600;
        time = sec;
        miniTimer.reset();
        generateTime(time);
    };

    this.resetSTimer = function(sec) {
        miniTimer.reset(sec);
        clearInterval(timer_id);
        if (status == 1) {
            miniTimer.start();
            intrvl = typeof intrvl !== "undefined" ? intrvl : 1000;
            timer_id = setInterval(function() {
                    if (time) {
                        time--;
                        generateTime();
                        if (typeof callback === "function") callback(time);
                    }
            }, intrvl);
        }
    }

    // This methode return the current value of the timer
    this.getTime = function() {
        return time;
    };

    // This methode return the status of the timer running (1) or stoped (1)
    this.getStatus = function() {
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
        $("#timerSec").val(time);
        timerRemaining = time;

    }

}

var timer;
$(document).ready(function(e) {
    timer = new _timer(function(time) {
        if (time == 0) {
            timer.stop();
            alert("time out");
        }
    });
    if(timerRemaining != 600){
        timer.reset(timerRemaining);
        timer.start();
    }else{
        timer.reset(600);
    }
});

function startTimer(sec){
    timer.start(sec);
}

function stopTimer(){
    timer.stop();
}

function resetTimer(sec){
    timer.stop();
    timer.reset(sec);
}

function resetSTimer(sec){
    timer.resetSTimer();
}
