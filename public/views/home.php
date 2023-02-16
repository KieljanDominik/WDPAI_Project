<?php
    session_start();
    require_once __DIR__.'/../../src/models/User.php';
    require_once __DIR__."/../../src/controllers/ScheduleController.php";

    if(isset($_SESSION['user_session'])){
        $user = unserialize($_SESSION['user_session']);
    }

    $scheduleController = new ScheduleController();

    $schedules = $scheduleController->getAllSchedules();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunch</title>

    <link rel="stylesheet" href="/public/css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2282473dfd.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/ScheduleManager.js" defer></script>
</head>
<body>
    
    <div id="create-schedule-wrapper">
        <span id="header">Create new schedule</span>    

        <div class="create-schedule">
            <form action="createNewSchedule" method="POST">
                <label for="text">Text:</label>
                <input type="text" name="text">

                <h3>Date</h3>

                <label for="start">From:</label>
                <input type="date" name="start"> <br>
                <label for="end">To:</label>
                <input type="date" name="end">

                <h3>Hour</h3>

                <label for="start-time">From:</label>
                <input type="time" name="start-time"> </br>
                <label for="end-time">To:</label>
                <input type="time" name="end-time"> </br>

                <button class="back link" type="button" onclick="toggleCreateNewSchedule()">Cancel</i></button>
                <button class="action link" type="submit">Create</button>
            </form>
        </div>
        
    </div>

    <div class="container">
        <div id="up-panel">
            <button class="menu-button" onclick="toggleMenu()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div id="left-panel">
            <div class="logo">
                <img src="/public/img/logo.png">
            </div>
            <div class="button-wrapper">
                <button onclick="toggleCreateNewSchedule()">Create Schedule</button>

                <button <?php if(isset($_SESSION['user_session'])){
                        ?>style="display: none"<?php }
                else{ ?>
                    style="display: block" <?php
                }
                ?> onclick="location.href='/signIn'" type="button">Sign In</button>


                <button <?php if(isset($_SESSION['user_session'])){
                        ?>style="display: none"<?php }
                else{ ?>
                    style="display: block" <?php
                }
                ?> onclick="location.href='/signUp'" type="button">Sign Up</button>

                <button <?php if(!isset($_SESSION['user_session'])){
                        ?>style="display: none"<?php }
                else{ ?>
                    style="display: block" <?php
                }
                ?> onclick="location.href='/logout'" type="button">Logout</button>
            </div>
        </div>
        <div id="right-panel">

            <?php
                if($schedules==null){
                    echo "You have to create a new schedule!";
                }
                else{
                    foreach ($schedules as $schedule){
                        ?>
                        <div class="schedule-wrapper" id="<?php echo $schedule->getID() ?>">
                            <div class="text"><?php echo $schedule->getText() ?></div>
                            <div class="day">From: <?php echo $schedule->getStart()." To: ".$schedule->getEnd() ?></div>
                            <div class="time">From: <?php echo $schedule->getStartTime()." To: ".$schedule->getEndTime() ?></div>
                            <div class="picture"></div>

                            <button class="delete-schedule">X</button>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>

</body>

<script type="text/javascript">
    function toggleMenu(){
        var panel = document.getElementById("left-panel");
        if(panel.style.display=='' || panel.style.display=='none' || panel.style.display=='flex'){
            panel.setAttribute('style', 'display: initial !important');
        }
        else{
            panel.setAttribute('style', 'display: none !important');
        }
    }
</script>

<script type="text/javascript">
    function toggleCreateNewSchedule(){
        var panel = document.getElementById("create-schedule-wrapper");
        if(panel.style.display=='' || panel.style.display=='none'){
            panel.setAttribute('style', 'display: flex !important');
        }
        else{
            panel.setAttribute('style', 'display: none !important');
        }
    }
</script>
</html>