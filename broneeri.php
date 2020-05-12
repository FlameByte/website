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
                                <input type="text" id="price_id" name="hind" readonly/>
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
   set_price(); 
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
    set_price();  
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

var getDaysArray = function(start, end) {
for(var arr=[],dt=new Date(start); dt<=end; dt.setDate(dt.getDate()+1)){
arr.push(new Date(dt));
}
return arr;
};

function set_price(){
    var test = $("#date_timepicker_start").val()
    var test2 = $("#date_timepicker_end").val()
    if(test != "" && test2 != ""){
        var dates = getDaysArray(new Date(test), new Date(test2));
        var price = 0;
        for(var i = 0; i< dates.length;i++){
            var date = dates[i];
            //kui on kindel kuu ja päev, siis hind suureneb.
            if(date.getMonth() == 11){
                if(date.getDate() == 30 || date.getDate() == 31){
                    price += 185;
                    continue;
                }
            }else if(date.getMonth() == 0){
                if(date.getDate() == 1 || date.getDate() == 2){
                    price += 185;
                    continue;
                }
            }
            if(date.getDay() == 5 || date.getDay() == 6 || date.getDay() == 0){
                price +=142;
            }else {
                price += 245;
            }
        }
        $("#price_id").val("€"+price);
    }
    
    
}




</script>

</html>