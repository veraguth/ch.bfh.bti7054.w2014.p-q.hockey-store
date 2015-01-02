<form id='register' action='register.php' method='post'
      accept-charset='UTF-8'>
    <fieldset >
        <legend>Register</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>

        <label for='firstName' >Vorname: </label>
        <input type='text' name='firstName' id='firstName' maxlength="50" />

        <label for='lastName' >Nachname: </label>
        <input type='text' name='lastName' id='lastName' maxlength="50" />

        <label for='streetAddress' >Strasse: </label>
        <input type='text' name='streetAddress' id='streetAddress' maxlength="50" />

        <label for='zipCode' >Postleizahlt </label>
        <input type='number' name='zipCode' id='zipCode' maxlength="4" />

        <label for='city' >Stadt </label>
        <input type='text' name='city' id='city' maxlength="50" />

        <label for='email' >Email Address*:</label>
        <input type='text' name='email' id='email' maxlength="50" />

        <label for='username' >UserName*:</label>
        <input type='text' name='username' id='username' maxlength="50" />

        <label for='password' >Password*:</label>
        <input type='password' name='password' id='password' maxlength="50" />
        <input type='submit' name='Submit' value='Submit' />

    </fieldset>


</form>


<?php
function RegisterUser()
{
if(!isset($_POST['submitted']))
{
return false;
}

$formvars = array();

if(!$this->ValidateRegistrationSubmission())
{
return false;
}

$this->CollectRegistrationSubmission($formvars);

if(!$this->SaveToDatabase($formvars))
{
return false;
}

if(!$this->SendUserConfirmationEmail($formvars))
{
return false;
}

$this->SendAdminIntimationEmail($formvars);

return true;
}
function CreateTable()
{


    if(!mysql_query($qry,$this->connection))
    {
        $this->HandleDBError("Error creating the table \nquery was\n $qry");
        return false;
    }
    return true;
}
?>

