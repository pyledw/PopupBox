<link rel="stylesheet" type="text/css" href="css/popupStyles.css" />
<div id="popupContent" style="width:400px;">
<h1 class="popupHeader">Login Please</h1>

<form class="formStyle" width="" height="" method="post" action="loginRedirect.php">
        Username:<input id="userName" type="text" name="userName">
        Password:<input type="password" name="Password">
        1.Tenant - 2.Landlord - 3.Administrator
        <select id="select" name="userType">
            <option name="1">1</option>
            <option name="2">2</option>
            <option name="3">3</option>
        </select>
        <br/>
        Remember Me: <input type="checkbox" name="rememberMe">
        <br/>
        <button id="submit" type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
</form>
</div>