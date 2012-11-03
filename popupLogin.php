<?php
    session_start();
    session_destroy();
    session_start();
    $currentPage = $_GET[URL];
    echo $currentPage;
?>
<form id="newApplicationForm" method="post" action="loginRedirect.php">
    <input name="URL" value="<?php echo $currentPage; ?>" style="display: none;" />
            <table class="tableForm">
                <tr>
                    <td>
                       <input title="Username" class="required" id="userName" type="text" name="userName">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input title="Password" class="required" type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        Remember Me: <input type="checkbox" name="rememberMe">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="submit" type="submit" class="button">Save and Continue</button>
                        <button type="reset" class="button">Clear</button>
                    </td>
                </tr>
</table>

</form>


<script>
$(document).ready(function(){
    $("#newApplicationForm").validate({
        ignoreTitle: true
        
    });
  });

   $(function(){
         $.fn.formLabels();
   });
</script>
