<link rel="stylesheet" type="text/css" href="css/mainStyle.css" />
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<link rel="stylesheet" type="text/css" href="css/popupStyles.css" />
<div id="popupContent" style="width:400px;">
<h1 class="popupHeader">Salary/Rent Calculator</h1>
<form>
        Percent of monthly  salary dedicated to housing: <input id="percent" type="text" name="percent" /><br/>
        Salary: <input id="salary" type="text" name="salary" /><br/><br/>
        Calculated rent available per month:<br/>
        <input type="text" id="result" />
        <font type="none" class="button" id="submit">Calculate</font>
        <font type="clear" class="button" id="clear">Clear</font>
</form>
</div>
<script>
$(document).ready(function(){
    $("#submit").click(function(){
        var percent = $('#percent').val(); 
        alert(percent);
        var salary = $('#salary').val();
        alert(salary);
        var total = salary * percent;
        alert(total);
        $('#result').val(total);
    });
});
    
</script>