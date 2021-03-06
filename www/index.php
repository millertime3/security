<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>
        </title>
        <link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet" href="css/my.css" />
        <script src="js/jquery.min.js">
        </script>
        <script src="js/jquery.mobile-1.2.0.min.js">
        </script>
        <script src="js/my.js">
        </script>
        <!-- User-generated css -->
        <style>
        </style>
        <!-- User-generated js -->
        <script>
            try {

    $(function() {

    });

  } catch (error) {
    console.error("Your javascript has an error: " + error);
  }
        </script>
    </head>
    <body>
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set">
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>
                            Alarm is active
                        </h3>
                        <div data-role="fieldcontain">
                            <label for="selectmenu1">
                            </label>
                            <select onChange="changeManualOverride(this)" name="">
                                <option value="true">
                                    Turn off
                                </option>
                                <option value="false">
                                    Turn on Auto
                                </option>
                            </select>
                        </div>
                        <input id="kill" type="submit" data-theme="a" data-icon="delete" data-iconpos="left" value="Kill Security" onClick='killSecurity(this)' />
                        <input id="start" type="submit" data-theme="b" data-icon="check" data-iconpos="left" value="Start Security" onClick='startSecurity()' />
                    </div>
                    <div data-role="collapsible">
                        <h3>
                            Door Status
                        </h3>
<input type="button" id="doorReal" onclick="toggleRealTimeDoorCheck()" value="Real Time off"/>
<?
function buildDoor($input,$name,$remote) {
return '

                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>
                                    '.$name.'
                                </legend>
                                <input id="radio1" name="radio" value="radio1" type="radio" />
                                <label id="door'.$input.'" for="radio1">
                                    #
                                </label>
                            </fieldset>
			</div>
<script>
checkDoorStatus("door'.$input.'",'.$input.',"'.$remote.'");
</script>
'
;
}
echo buildDoor(22,'Front Door','false');
echo buildDoor(23,'Back Door','false');
echo buildDoor(18,'Basement Door','false');
echo buildDoor(24,'Garage Door','false');
echo buildDoor(15,'Big Garage Door','garage');
?>
		</div>
<?

function output($cmd,$title,$id) {
return '
                   <div data-role="collapsible">
                        <h3 onclick=\'getOutput("'.$cmd.'","'.$id.'")\'>
                           '. $title . '
                        </h3>
                        <div data-role="fieldcontain" id="'.$id.'">
                        </div>
                    </div>
';
}//end of log function
echo output('/getCmd/securitylog.php','Security Log','seclog');
echo output('/getCmd/top.php','Top','top');



?>
                    <div data-role="collapsible" >
                        <h3 onclick="checkLightStatus()">
                            Lights
                        </h3>
<?
function buildLight($input,$name) {
return '

                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label for="toggleswitch'.$input.'">
                                    '. $name .'
                                </label>
                                <select id="switch'. $input .'" data-theme="" data-role="slider" onChange="onLightChange(this,'.$input.')">
                                    <option value="off">
                                        Off
                                    </option>
                                    <option value="on">
                                        On
                                    </option>
                                </select>
                            </fieldset>
                        </div>
 
';
}
echo buildLight(8,"Basement");
echo buildLight(7,"Basement Stairs");
?>
                    </div>

<div data-role="collapsible" >
                        <h3>
                            Garage
                        </h3>
                        <div data-role="fieldcontain">
                            <fieldset data-role="controlgroup">
                                <label >
                                </label>
                                <select  data-role="slider" onChange="toggleGarage()">
                                    <option value="off">
                                        toggle
                                    </option>
                                    <option value="on">
                                        toggle
                                    </option>
                                </select>
                            </fieldset>
                        </div>
</div>
                </div>
            </div>
        </div>
    </body>
</html>
