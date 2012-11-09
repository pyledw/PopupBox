<!-- This document contains all the footer information as well as the closing page elements. -->

</div><!-- Tag for closing the wrapper -->

    <!-- This Portion contains the footer links. -->
   <div id="bottomNav">
            <ul>
                    <li>About LeaseHood</li>
                    <li>
                            <ul>
                                    <li><a href="support.php">Contact LeaseHood</a></li>
                                    <li><a href="inyourhood.php">LeaseHood in Your Hood</a></li>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Linkedin</a></li>
                            </ul>
                    </li>
            </ul>
            <ul>
                    <li>Landlords/Managers</li>
                    <li>
                            <ul>
                                    <li><a href="newListing1.php">List a Property</a></li>
                                    <li><a href="myHood.php">My Properties</a></li>
                                    <li><a href="#">Tips for Success</a></li>
                            </ul>
                    </li>
            </ul>
            <ul>
                    <li>Applicants and Renters</li>
                    <li>
                            <ul>
                                    <li><a href="searchHomes.php">Find a Property</a></li>
                                    <li><a href="myHood.php.php">My Account</a></li>
                                    <li><a href="#">Tips for Success</a></li>
                                    
                            </ul>
                    </li>

            </ul>
            <ul>
                    <li>About LeaseHood</li>
                    <li>
                            <ul>
                                    <li><a href="#">Philosophy/Mission</a></li>
                                    <li><a href="affiliations.php">Licensing & Affiliations</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                            </ul>
                    </li>

            </ul>
        </div>
<?



include_once 'config.inc.php';
if ($cfg['show_buildinfo'] && file_exists('build-date.txt'))  { ?>
	<br />
	<span style='text-align: center; font-size: 60%;'>Built: 
<?php	include 'build-date.txt'; ?>
	</span>
<?php  	}?>

    </body>
</html>
