<!-- This page will show all the Pricing information about Leasehood -->

<?php
        $title = "Pricing";
	include 'Header.php';
        include 'formElements.php';
?>
<h1 class="Title">Pricing</h1>

    <hr class="Title" />

</head>
<body>
    <h3>JQuery Popup Dialogs</h3>
    
    <input type="button" id="btnShowSimple" value="Simple Dialog" />
    <input type="button" id="btnShowModal" value="Modal Dialog" />
    
    <br /><br />       
    
    <div id="output"></div>
    
    <div id="overlay" class="web_dialog_overlay"></div>
    
    <div id="dialog" class="web_dialog">
        <table style="width: 100%; border: 0px;" cellpadding="3" cellspacing="0">
            <tr>
                <td class="web_dialog_title">Test Pop up</td>
                <td class="web_dialog_title align_right">
                    <a href="#" id="btnClose">Close</a>
                </td>
            </tr>
        </table>
        <?php
            include 'popupTest.php';
        ?>
    </div>
    </form>

        <?php
            createForm("", "", "test Form", "form.php");
            createDropdownMenu("drop1","drop1", array("1","2","3","4","5"), "Number: ");
        ?>

</form>

<h2>This is a heading</h2>
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<button id="show" onclick="bPopup()" class="button">show</button>
<button id="hide" class="button">hide</button>



<?php
	include 'Footer.php';
?>