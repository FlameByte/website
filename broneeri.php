<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>broneeri</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="jquerykalender/jquery.datetimepicker.css">



    
</head>

<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "booking";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

function getDatesFromRange($start, $end, $format = 'Y-m-d') {
    $array = array();
    $interval = new DateInterval('P1D');
    
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
    
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
    foreach($period as $date) {
    $array[] = $date->format($format);
    }
    
    return $array;
    }


$query = "SELECT `start_date`, `end_date` from kalender";
$data = $conn->query($query);
    if ($data) {
    
    $arr = array();
    while($row = $data->fetch_assoc()){
        $dates = getDatesFromRange($row["start_date"], $row["end_date"], "Y-m-d");
        foreach($dates as $date){
            array_push($arr, $date);
            
        }
    }
    $arr2 = "";
    foreach($arr as $date){
        $arr2 .= "'".$date."',";
        }
        $arr2 = rtrim($arr2, ',');
    }
    

?>

<body>
<div class="container" id ="katse">
    <div class="broneering">
        <div id="date-range12-container">

   

        
</div>
<form method="post" name="myemailform" action="booking.php">
                                <p> Vali saabumispäev</p>
                                <p> Vali lahkumispäev</p>
                                <div class="form-group" id="kalendrid">
                                    <input type="text" id="date_timepicker_start" name="booking"/>
                                    <input type="text" id="date_timepicker_end" name="booking2"/>
                                </div>
                                <div class="form-group">
                                    <label for="Nimi">Nimi</label>
                                    <input type="text" class="form-control" id="nimi" placeholder="Sisestage Nimi"
                                        name="nimi">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                        placeholder="Sisestage E-mail" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="Teema">Teema</label>
                                    <input type="text" class="form-control" id="teema" aria-describedby="emailHelp"
                                        placeholder="" name="teema">
                                </div>
                                <div class="form-group">
                                    <label for="Lisainfo">Lisainfo</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="lisainfo"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" value="Send Form">Saada</button>
                            </form>
</div>





</body>

<script src="jquerykalender/jquery.js"></script>
<script src="jquerykalender/build/jquery.datetimepicker.full.min.js"></script>

<script>

$.datetimepicker.setLocale('et');

jQuery(function(){
 jQuery('#date_timepicker_start').datetimepicker({
  format:'Y-m-d',
  onSelectDate:function( ct ){
   this.setOptions({
    maxDate:jQuery('#date_timepicker_end').val()?jQuery('#date_timepicker_end').val():false
   })
  },
  inline:true,
  lang:'et',
  timepicker:false,
  defaultSelect:false,
  disabledDates: [ <?php echo $arr2; ?> ] , formatDate:'Y-m-d'
 });
 jQuery('#date_timepicker_end').datetimepicker({
  format:'Y-m-d',
  onSelectDate:function( ct ){
   this.setOptions({
    minDate:jQuery('#date_timepicker_start').val()?jQuery('#date_timepicker_start').val():false
   })
  },
  inline:true,
  lang:'et',
  timepicker:false,
  defaultSelect:false,
  disabledDates: [ <?php echo $arr2; ?> ] , formatDate:'Y-m-d'
 });
});






</script>

</html>