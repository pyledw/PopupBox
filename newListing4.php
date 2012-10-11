<?php
    $title = "New Listing Part 2";
    include 'Header.php';
?>
    <h1 class="Title">New House Listing - Applicant Screening Restrictions  </h1>
    <hr class="Title">
    <div id="mainContent">
        <form class="formStyle" width="90%" height="90%" method="post" action="newListing5.php">
          
            Will you allow a resident(s) with a criminal history?
            Yes<input type="radio" name="criminalHistory"  value="Y" />
            No<input type="radio" name="criminalHistory"checked='checked'  value="N" /><br/>
            Will you allow only residents with a minimum salary?
            Yes<input type="radio" name="minSalary"  value="Y" />
            No<input type="radio" name="minSalary"checked='checked'  value="N" /><br/>
            Will you allow only non-smoking residents?
            Yes<input type="radio" name="smoking"  value="Y" />
            No<input type="radio" name="smoking"checked='checked'  value="N" /><br/>
            Will you allow an applicant with a slightly different move-in date availability to submit a PFO?  If so, please specifiy:
            Yes<input type="radio" name="moveInDate"  value="Y" />
            No<input type="radio" name="moveInDate"checked='checked'  value="N" /><br/>
            Would you like to limit the number of occupants in your property?
            Yes<input type="radio" name="numberOfOccupants"  value="Y" />
            No<input type="radio" name="numberOfOccupants"checked='checked'  value="N" /><br/>
            Will you allow cats?
            Yes<input type="radio" name="cats"  value="Y" />
            No<input type="radio" name="cats"checked='checked'  value="N" /><br/>
            Will you allow dogs?
            Yes<input type="radio" name="dogs"  value="Y" />
            No<input type="radio" name="dogs"checked='checked'  value="N" /><br/>
            Required Pet Deposit
            Yes<input type="radio" name="petdeposit"  value="Y" />
            No<input type="radio" name="petdeposit"checked='checked'  value="N" /><br/>
            Is Pet Deposit Refundable?
            Yes<input type="radio" name="petDepositrefundable"  value="Y" />
            No<input type="radio" name="petDepositRefundable"checked='checked'  value="N" /><br/>
            Prohibited breeds<input type="text" name="prohibitedBreeds"/>

            <button type="submit" class="button">Save and Continue</button>
            <button type="reset" class="button">Clear</button>
  
        </form>
    </div>
<?php
    include 'Footer.php';
?>