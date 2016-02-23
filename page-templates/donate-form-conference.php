<?php
/**
 * Template Name: Donate Form - Conference
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

//get_header(); 
//print_r($_POST);
$donate_amount = (isset($_POST['donate_amount'])) ? $_POST['donate_amount']: 0;

//send email to admin
if(isset($_POST['FormType'])){
	//print_r($_POST); 
 	get_template_part( 'page-templates/donate-email-template' );
	wp_redirect( home_url('/donation-information/donation-thank-you/?lang=he') ); exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta content="width=device-width" name="viewport" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link href="http://gmpg.org/xfn/11" rel="profile" />
<link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri(); ?>/donate.css" rel="stylesheet" />
<!-- Responsive -->
<link href="<?php echo get_template_directory_uri(); ?>/responsive.css" rel="stylesheet" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/custom.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/donation_short.js"></script>
</head>

<body <?php body_class(); ?>>
<div>
	<div class="header">
		<div class="container">
			<div class="row" style="text-align: center">
				<img alt="עלה כניסים" height="236" src="https://aleh.org/wp-content/uploads/2015/05/ALEHConferenceLogo.jpg" width="1063" /><div class="header-top" style="height: auto;">
					<span style="font-size:x-large;font-weight:bold">תשלום דמי הרישום לכנס עלה הראשון</span> <br/><span style="font-size:large;font-weight:bold">&acute;</span><span style="font-size:large;font-weight:bold">החיים בסביבת חידושים - טכנולוגיה בסביבה רב-חושית&acute;</span> <br />
					למדיניות, לו"ז 
					ומידע אודות הכנס 
					<a href="http://www.heb.aleh-conferences.com/#!registration-fees-and-policies/c2h6">יש ללחוץ כאן לבקר באתר של עלה כנסים</a><br>
					</div>
			</div>
		</div>
	</div>
	<div class="donate-form">
		<div class="container">
			<form action="https://donate.aleh.org/includes/Donation_Process.asp" method="POST" name="DonationForm" onsubmit="return ValidateDonationForm();" style="direction:rtl">
				<input name="Description" type="hidden" value="General Donation To ALEH" />
						<h3 style="font-size: 40px; color: #19798a; font-weight: bold">נא סמנו למה תרצו לשלם: 
						</h3>
<fieldset >
						<input name="DonationLevelID" type="radio" value="516" /><b>250 
								₪ - יום הכנס הראשון</b> | 26 באוקטובר 2015 – מלון 
								המלך דוד, ירושלים<br />
						<input name="DonationLevelID" type="radio" value="517" /><b>250 
								₪ - יום הכנס השני</b> | 27 באוקטובר 2015 – הכפר 
								השיקומי עלה נגב נחלת ערן<br />
						<input name="DonationLevelID" type="radio" value="518" /><b>355 
								₪</b> - <b>יום הכנס השני + הסעה מאורגנת</b> | 27 
								באוקטובר 2015 – הכפר השיקומי עלה נגב נחלת ערן + 
								הסעה מאורגנת ממלון המלך דוד וחזרה<br />
						<input name="DonationLevelID" type="radio" value="519" /><b>500 
								₪ - שני ימי הכנס</b> | 26 ו27 באוקטובר 2015 – מלון 
								המלך דוד, ירושלים והכפר השיקומי עלה נגב נחלת ערן<br/>
						<input checked="true" name="DonationLevelID" type="radio" value="520" /><b>605 
								₪ - שני ימי הכנס + הסעה מאורגנת</b> | 26 ו27 באוקטובר 
								2015 – מלון המלך דוד, ירושלים והכפר השיקומי עלה 
								נגב נחלת ערן + הסעה מאורגנת ממלון המלך דוד וחזרה</fieldset>
				<table style="border-collapse: collapse; border: 1px; margin-top: 30px;width:100%" >
					<tr>
						<td>						<h3 style="font-size: 40px; color: #19798a; font-weight: bold">פרטי המשתתף\ת</h3></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="right" style="width: 291px" width="296">
						<p dir="ltr"><font color="#CC3333">*</font>שם פרטי</p>
						</td>
						<td align="right">
						<input id="1" maxlength="50" name="FirstName" size="20" /></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<p dir="ltr"><font color="#CC3333">*</font>שם משפחה</p>
						</td>
						<td align="right">
						<input id="12" maxlength="50" name="LastName" size="20" /></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333">*</font>כתובת</td>
						<td align="right">
						<input id="2" maxlength="50" name="Address" size="20" /></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333">*</font>עיר</td>
						<td align="right">
						<input id="20" maxlength="50" name="City" size="20" /></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333">*</font>מיקוד </td>
						<td align="right">
						<input id="zip" maxlength="50" name="ZIP" size="10" /></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333">*</font>מדינה </td>
						<td align="right"><select name="country" size="1">
						<option>ישראל</option>
						<option>-אחר שאינו מוצג</option>
						</select> </td>
					</tr>
					<tr>
						<td align="right" style="width: 291px; height: 24px;">
						<font color="#CC3333">*</font><span class="text">טלפון</span></td>
						<td align="right" style="height: 24px">
						<input id="5" maxlength="50" name="Telephone" size="20" /></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333">*</font><span class="text">דואר 
								אלקטרוני</span></td>
						<td align="right">
						<input maxlength="100" name="Email" size="20" /></td>
					</tr>
					<tr>
						<td><h3 style="margin-bottom: 0px; font-size:40px; color: #19798a; font-weight: bold">פרטי תשלום</h3>
</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333">*</font>סוג כרטיס אשראי</td>
						<td align="right">
						<select name="CreditCardType" size="1">
						<option value="ISRA">Isracard</option>
						<option selected="" value="VISA">Visa</option>
						<option value="MC">Mastercard</option>
						<option value="AMEX">American Express</option>
						<option value="DINR">Diners</option>
						<option value="DISC">Discover</option>
						</select></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<span class="text"><font color="#CC3333">*</font>מספר 
								כרטיס אשראי</span></td>
						<td align="right">
						<input maxlength="16" name="CardNum" size="20" value="" /></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333"><span class="text">*</span></font><nobr class="text">תוקף</nobr></td>
						<td align="right">
						<select id="ValidMonth" class="filed3" name="ValidMonth" size="1">
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						</select>
						<select id="ValidYear" class="filed3" name="validYear" size="1">
						<option value="14">2014</option>
						<option value="15">2015</option>
						<option value="16">2016</option>
						<option value="17">2017</option>
						<option value="18">2018</option>
						<option value="19">2019</option>
						<option value="20">2020</option>
						<option value="21">2021</option>
						</select></td>
					</tr>
					<tr>
						<td align="right" style="width: 291px">
						<font color="#CC3333"><span class="text">*</span></font><nobr><span class="text">שם 
								בעל כרטיס אשראי</span></nobr></td>
						<td align="right"><nobr>
						<input maxlength="50" name="NameOnCard" /> </nobr></td>
					</tr>
					</table><input name="Submit1" type="submit" value="שלם את דמי הרישום " style="font-size:large" />
				
				<input name="Currency" type="hidden" value="ILS" />
				<input name="FormType" type="hidden" value="QUICKDONATION" />
				<input name="ProjectID" type="hidden" value="0" />
				<input name="BID" type="hidden" value="2" />
				<input name="iLanguageID" type="hidden" value="2" />
				<input name="CampaignCode" type="hidden" value="CONF2015" />
			</form>
		</div>
	</div>
	<div class="donate-footer">
		<div class="donate-secure">
			<div class="container">
				<div class="row">
					<div class="col-xs-5 secure-right">
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float: left; margin-top: 5px; margin-bottom: 5px" target="paypal">
							<input name="cmd" type="hidden" value="_xclick" />
							<input name="business" type="hidden" value="dov@alehnf.org" />
							<input name="item_name" type="hidden" value="General Donation to ALEH" />
							<input name="lc" type="hidden" value="he_IL" />
							<input name="item_number" type="hidden" value="IL-DONATE" />
							<input name="currency_code" type="hidden" value="ILS" />
							<input name="cn" type="hidden" value="Comments" />
							<input name="image_url" type="hidden" value="https://www.aleh.org/images/Aleh_logo_149x62.gif" />
							<input name="return" type="hidden" value="https://aleh.org.il/hebrewdonationthankyou/" />
							<input align="right" border="0" name="submit" src="<?php echo get_template_directory_uri(); ?>/images/secure-donate.png" style="margin-top: 23px; margin-left: 15px;" type="image" />
						</form>
						<span>
						<h5 style="color: #fff; font-size: 24px; float: left; margin-top: 60px; margin-left: 15px;">
						תרומתך מאובטחת ע”י</h5>
						</span></div>
					<div class="col-xs-7">
						<p style="font-size: 12px; color: #fff; text-align: right; padding-top: 22px;">
						חפש באתר ע.ל.ה: ע.ל.ה בית | צור קשר | מדיניות פרטיות | שלח 
						לחבר כל התרומות לע.ל.ה הם לניכוי מס במלואו. תרומות בדולר, 
						דולר קנדי​​, או GBP יעובדו על ידי משרד ע.ל.ה שלהם בארצות 
						הברית, קנדה, או אנגליה. תרומות בכל מטבעות האחרים תעובד על 
						ידי משרדו של ע.ל.ה ישראל.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

</html>
<?php //get_footer(); ?>