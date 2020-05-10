<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>broneeri</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="jquerykalender/jquery.datetimepicker.css">



    
</head>

<body>
<div class="container" id ="katse">
    <div class="broneering">
        <div id="date-range12-container">

        <input type="text" id="datetimepicker3"/>


        
</div>
<form method="post" name="myemailform" action="kontakt.php">
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

jQuery('#datetimepicker3').datetimepicker({
  format:'d.m.Y H:i',
  inline:true,
  lang:'et'
});


</script>

</html>