<div id="gkarr-join-form" style="padding-bottom: 1px;">
<?php 

$submit = $_GET['submit'];

if ($submit == "no") { ?>
    <p style="font-size: .65em; line-height: 0;">Please Try Again!</p>
<?php } ?>

<?php
if ($submit == "yes") { ?>
    <p style="font-size: .65em; line-height: 0;">You Joined!</p>
<?php } ?>

	        <form action="https://karrforcongress.com/wp-admin/admin-post.php" method="post">
            <input type="text" name="name" placeholder="Name (Required)" id="gkarr_input_join">
            <input type="text" name="email" placeholder="E-mail (Required)" id="gkarr_input_join">
			<input type="text" name="phone" placeholder="Phone (Optional)" id="gkarr_input_join">
            <input type="text" name="zip" placeholder="Zip Code (Required)" id="gkarr_input_join">
            <input type="hidden" name="action" value="gkarr_contact">
            <input type="hidden" name="data" value="gkarr_data">
            <input type="submit" value="JOIN US" id="gkarr_join_button">
            <p style="font-size: .5em; line-height: .9;">*By participating,  you consent to receiving e-mail and text/phone communications from Karr for Congress. Message & data rates may apply</p>
</form>
	</div>