<?php
/**
 * Template Name: Donate Form Hebrew Template
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
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link href="http://gmpg.org/xfn/11" rel="profile" />
<link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri(); ?>/donate.css" rel="stylesheet" />
<!-- Responsive -->
<link href="<?php echo get_template_directory_uri(); ?>/responsive.css" rel="stylesheet" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scrolltofixed.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/custom.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/donation_short.js"></script>
</head>

<body <?php body_class(); ?>>
<div class="donate-wrapper">
  <div class="header">
    <div class="header-top" style="height: auto;">
      <div class="container">
        <div class="row">
          <div class="col-xs-10"> </div>
          <div class="col-xs-2">
            <h3 style="float: left; color: #f67803; font-size: 40px; font-weight: bold; display: none;"> Donate</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="donate-banner"> <span id="DonatePageHeaderText">
      <h2>
        <?php //echo get_the_title($_POST['child_id']); ?>
      </h2>
      <p>לשליחת תרומות, אנא מלאו את פרטיכם למטה. ניתן לתרום בטלפון או באימייל 
        או <a href="<?php echo esc_url( home_url( '/international-offices/' ) ); ?>"> לחץ כאן</a></p>
      <p>נתקלת בבעיה בשליחת הטופס? <a href="mailto:dov@aleh-israel.org?subject=I'm%20having%20trouble%20with%20the%20aleh.org%20donation%20page"> יידע אותנו</a> ונחזור אליכם בהקדם.&nbsp;</p>
      </span></div>
  </div>
  <div class="donate-form">
    <div class="container">
      <div class="row">
        <div class="col-xs 12">
          <p></p>
            <p style="font-size: 13px; text-align:right;">רשת עלה כיום מהווה קהילה גלובלית, שפעילותה מתבססת על עקרונות של מקצועיות, רגישות, הכלה, מחויבות וחסד.
פעילותה של עלה מחוללת את השינוי  בחייהם של ילדים ואנשים רבים בישראל, עם מוגבלות שכלית התפתחותית קשה ולעיתים גם עם מורכבויות רפואיות.
אנו עושים הכל על מנת לאפשר להם לחיות בעולם אכפתי וטוב יותר, המותאם לצרכיהם המיוחדים.
על ידי תרומה לעלה, תוכל לסייע לנו לעמוד במטרתנו לאפשר לכל ילד, תלמיד או בוגר, על אף מוגבלותו - לממש את הפוטנציאל הטמון בו, ואת
זכותו לחיות חיים איכותיים כחלק בלתי נפרד מהחברה תודה על שותפותך ועל נדיבות ליבך.<br>
            
על ידי תרומה לעלה, תוכל לסייע לנו לעמוד במטרתנו לאפשר לכל ילד, תלמיד או בוגר, על אף מוגבלותו - לממש את הפוטנציאל הטמון בו, ואת זכותו לחיות חיים איכותיים
<br>
.כחלק בלתי נפרד מהחברה</p>

          <form action="https://donate.aleh.org/includes/Donation_Process.asp" method="POST" name="DonationForm" onsubmit="return ValidateDonationForm();">
            <input name="Description" type="hidden" value="General Donation To ALEH">
            <table style="border-collapse: collapse; border: none; width: 100%; margin-top: 30px;">
              <tr>
                <td align="right" colspan="5"><h3 style="float: right; font-size: 20px; color: #19798a; font-weight: bold"> עמותת "עלה" מעריכה ומוקירה כל תרומה</h3>
                  <br /></td>
              </tr>
              <tr>
                <td align="right" colspan="5" style="height: 22px"><select name="OtherCurrency" onchange="return CalculateTotal()" size="1" title="Select the currency for your donation">
                    <option value="ILS">שקל ישראלי (₪)</option>
                    <option selected="" value="USD">US Dollars ($) </option>
                    <option value="GBP">British Pounds (GBP) </option>
                    <option value="CAD">Canadian Dollars ($) </option>
                    <option value="EUR">Euros (€)</option>
                    <option value="AUD">AUD ($)</option>
                    <option value="ZAR">South African Rand (R) </option>
                  </select>
                  <input maxlength="7" name="OtherAmount" onchange="return CalculateTotal()" onkeypress="return numbersonly(this, event)" size="20" title="Enter the amount of your donation" value="<?php echo $donate_amount; ?>" />
                  <br />
                  <input name="DonationLevelID" type="radio" value="0" />
                  נא שיקלו תרומה חודשית </td>
              </tr>
              <tr>
                <td align="right" valign="top" width="291">&nbsp;</td>
                <td width="1">&nbsp;</td>
                <td align="right" colspan="3">כל חודש עבור
                  <select class="filed3" name="NumberOfPayments" onchange="return CalculateTotal()" size="1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                  </select>
                  חודשים, נא לחייב את פרטי הכרטיס שכתובים 
                  למטה<br />
                  <input name="total" type="hidden" value="" />
                  <input name="PaymentCurrency" type="hidden" value="" />
                  (סך הכל
                  <input name="payments" readonly size="11" style="border: 1px solid #FFFFFF; width: 18px;" type="text" />
                  פעמים את סכום התרומה שנבחרה)</td>
              </tr>
              <tr>
                <td align="right" colspan="5"><h3 align="right" style="font-size: 20px; color: #19798a; font-weight: bold"> מידע תורם</h3></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right" width="425"><input id="1" maxlength="50" name="FirstName" size="20" /></td>
                <td width="10"><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px" width="296"><p dir="ltr"><font color="#CC3333">*</font><span class="text">שם 
                    פרטי</span></p></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input id="12" maxlength="50" name="LastName" size="20" /></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><p dir="ltr"><font color="#CC3333">*</font><span class="text">שם 
                    משפחה</span></p></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input id="2" maxlength="50" name="Address" size="20" /></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font><span class="text">כתובת</span></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input id="20" maxlength="50" name="City" size="20" /></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font>עיר</td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input id="zip" maxlength="50" name="ZIP" size="10" /></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font>מיקוד מיקוד</td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><select name="country" size="1">
                    <option>ישראל</option>
                    <option>-אחר שאינו מוצג</option>
                  </select></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font>מדינה </td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input id="5" maxlength="50" name="Telephone" size="20" /></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font><span class="text">טלפון</span></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input maxlength="100" name="Email" size="20" /></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font><span class="text">דואר 
                  אלקטרוני</span></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><select name="BirthdayDate">
                    <option selected="" value="0">--</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                    <option>29</option>
                    <option>30</option>
                    <option>31</option>
                  </select>
                  <select name="BirthdayMonth">
                    <option selected="" value="0">--</option>
                    <option value="1">Jan</option>
                    <option value="2">Feb</option>
                    <option value="3">Mar</option>
                    <option value="4">Apr</option>
                    <option value="5">May</option>
                    <option value="6">Jun</option>
                    <option value="7">Jul</option>
                    <option value="8">Aug</option>
                    <option value="9">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                  </select>
                  <b>נשמח לשלוח לך כרטיס!</b></td>
                <td>&nbsp;</td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font><span class="text">יום 
                  ההולדת שלך</span></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input name="DonationBox" type="checkbox" value="ON" />
                  <strong>בבקשה שלחו לי קופת צדקה </strong></td>
                <td>&nbsp;</td>
                <td align="right"><font color="#CC3333">*</font>קופת 
                  צדקה</td>
              </tr>
              <tr>
                <td align="right" colspan="5"><h3 style="margin-bottom: 0px font-size:20px; color: #19798a; font-weight: bold"> פרטי תשלום</h3>
                  <p style="margin-top: 0px; font-style: italic">שימו 
                    לב: תרומות בכרטיס אשראי מתקבלות רק <strong>מ 5 ש"ח</strong> ומעלה</p></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><select name="CreditCardType" size="1">
                    <option value="ISRA">Isracard</option>
                    <option selected="" value="VISA">Visa</option>
                    <option value="MC">Mastercard</option>
                    <option value="AMEX">American Express</option>
                    <option value="DINR">Diners</option>
                    <option value="DISC">Discover</option>
                  </select></td>
                <td>&nbsp;</td>
                <td align="right" style="width: 291px"><font color="#CC3333">*</font>סוג כרטיס אשראי</td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input maxlength="16" name="CardNum" size="20" value="" /></td>
                <td><font color="#CC3333"></font></td>
                <td align="right" style="width: 291px"><span class="text"><font color="#CC3333">*</font>מספר 
                  כרטיס אשראי</span></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><select id="ValidMonth" class="filed3" name="ValidMonth" size="1">
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
                <td><font color="#CC3333"><span class="text"> </span></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333"><span class="text">*</span></font><nobr class="text">תוקף</nobr></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><nobr>
                  <input maxlength="50" name="NameOnCard" />
                  </nobr></td>
                <td><font color="#CC3333"><span class="text"> </span></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333"><span class="text">*</span></font><nobr><span class="text">שם 
                  בעל כרטיס אשראי</span></nobr></td>
              </tr>
              <tr>
                <td align="right" style="width: 291px">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><nobr>
                  <input maxlength="10" name="IDNUM" />
                  </nobr></td>
                <td><font color="#CC3333"><span class="text"> </span></font></td>
                <td align="right" style="width: 291px"><font color="#CC3333"><span class="text">*</span></font><nobr><span class="text">תעודת זהות</span></nobr></td>
              </tr>
              <tr>
                <td align="right" colspan="5"><h3 id="donate-page-send-ack-part" style="cursor: hand; cursor: pointer; font-size: 20px; color: #19798a; font-weight: bold"> לחץ כאן כדי לשלוח כרטיס הכרה בתרומה זו לאדם אחר </h3></td>
              </tr>
              <tr>
                <td align="center" colspan="5"><div id="ACK" class="switchcontent" style="display: none;">
                    <table>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><select class="RightDonationColumn" name="DonationHonorCodeID" size="1">
                            <option selected="" value="0"> </option>
                            <option value="1">לכבוד</option>
                            <option value="2">לזכרו של</option>
                          </select></td>
                        <td align="right">תרומה זו</td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input id="16" class="RightDonationColumn" maxlength="50" name="HonorName" /></td>
                        <td align="right">שם המכובד/ המונצח</td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td><font color="#CC3333">*</font></td>
                        <td><input id="21" class="RightDonationColumn" maxlength="50" name="Address2" /></td>
                        <td align="right"><span class="text">כתובת</span></td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input id="22" class="RightDonationColumn" maxlength="50" name="City2" /></td>
                        <td align="right">עיר</td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><b>
                          <select class="RightDonationColumn" name="country2" size="1">
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                            <option>American Samoa</option>
                            <option>Andorra</option>
                            <option>Angola</option>
                            <option>Anguilla</option>
                            <option>Antarctica</option>
                            <option>Antigua And Barbuda</option>
                            <option>Argentina</option>
                            <option>Armenia</option>
                            <option>Aruba</option>
                            <option>Australia</option>
                            <option>Austria</option>
                            <option>Azerbaijan</option>
                            <option>Bahamas</option>
                            <option>Bahrain</option>
                            <option>Bangladesh</option>
                            <option>Barbados</option>
                            <option>Belarus</option>
                            <option>Belgium</option>
                            <option>Belize</option>
                            <option>Benin</option>
                            <option>Bermuda</option>
                            <option>Bhutan</option>
                            <option>Bolivia</option>
                            <option>Bosnia And Herzegowina </option>
                            <option>Botswana</option>
                            <option>Bouvet Island</option>
                            <option>Brazil</option>
                            <option>British Indian Ocean Territory </option>
                            <option>Brunei Darussalam</option>
                            <option>Bulgaria</option>
                            <option>Burkina Faso</option>
                            <option>Burundi</option>
                            <option>Cambodia</option>
                            <option>Cameroon</option>
                            <option>Canada</option>
                            <option>Cape Verde</option>
                            <option>Cayman Islands</option>
                            <option>Central African Republic </option>
                            <option>Chad</option>
                            <option>Chile</option>
                            <option>China</option>
                            <option>Christmas Island</option>
                            <option>Cocos (Keeling) Islands </option>
                            <option>Colombia</option>
                            <option>Comoros</option>
                            <option>Congo</option>
                            <option>Cook Islands</option>
                            <option>Costa Rica</option>
                            <option>Cote D'Ivoire</option>
                            <option>Croatia</option>
                            <option>Cuba</option>
                            <option>Cyprus</option>
                            <option>Czech Republic</option>
                            <option>Denmark</option>
                            <option>Djibouti</option>
                            <option>Dominica</option>
                            <option>Dominican Republic</option>
                            <option>East Timor</option>
                            <option>Ecuador</option>
                            <option>Egypt</option>
                            <option>El Salvador</option>
                            <option>Equatorial Guinea</option>
                            <option>Eritrea</option>
                            <option>Estonia</option>
                            <option>Ethiopia</option>
                            <option>Falkland Islands</option>
                            <option>Faroe Islands</option>
                            <option>Fiji</option>
                            <option>Finland</option>
                            <option>France</option>
                            <option>France, Metropolitan </option>
                            <option>French Guiana</option>
                            <option>French Polynesia</option>
                            <option>French Southern Territories </option>
                            <option>Gabon</option>
                            <option>Gambia</option>
                            <option>Georgia</option>
                            <option>Germany</option>
                            <option>Ghana</option>
                            <option>Gibraltar</option>
                            <option>Greece</option>
                            <option>Greenland</option>
                            <option>Grenada</option>
                            <option>Guadeloupe</option>
                            <option>Guam</option>
                            <option>Guatemala</option>
                            <option>Guinea</option>
                            <option>Guinea-Bissau</option>
                            <option>Guyana</option>
                            <option>Haiti</option>
                            <option>Heard And Mc Donald Islands </option>
                            <option>Honduras</option>
                            <option>Hong Kong</option>
                            <option>Hungary</option>
                            <option>Iceland</option>
                            <option>India</option>
                            <option>Indonesia</option>
                            <option>Iran</option>
                            <option>Iraq</option>
                            <option>Ireland</option>
                            <option selected="">ישראל</option>
                            <option>Italy</option>
                            <option>Jamaica</option>
                            <option>Japan</option>
                            <option>Jordan</option>
                            <option>Kazakhstan</option>
                            <option>Kenya</option>
                            <option>Kiribati</option>
                            <option>North Korea</option>
                            <option>South Korea</option>
                            <option>Kuwait</option>
                            <option>Kyrgyzstan</option>
                            <option>Lao People's Republic </option>
                            <option>Latvia</option>
                            <option>Lebanon</option>
                            <option>Lesotho</option>
                            <option>Liberia</option>
                            <option>Libyan Arab Jamahiriya </option>
                            <option>Liechtenstein</option>
                            <option>Lithuania</option>
                            <option>Luxembourg</option>
                            <option>Macau</option>
                            <option>Macedonia</option>
                            <option>Madagascar</option>
                            <option>Malawi</option>
                            <option>Malaysia</option>
                            <option>Maldives</option>
                            <option>Mali</option>
                            <option>Malta</option>
                            <option>Marshall Islands</option>
                            <option>Martinique</option>
                            <option>Mauritania</option>
                            <option>Mauritius</option>
                            <option>Mayotte</option>
                            <option>Mexico</option>
                            <option>Micronesia</option>
                            <option>Moldova</option>
                            <option>Monaco</option>
                            <option>Mongolia</option>
                            <option>Montserrat</option>
                            <option>Morocco</option>
                            <option>Mozambique</option>
                            <option>Myanmar</option>
                            <option>Namibia</option>
                            <option>Nauru</option>
                            <option>Nepal</option>
                            <option>Netherlands</option>
                            <option>Netherlands Antilles </option>
                            <option>New Caledonia</option>
                            <option>New Zealand</option>
                            <option>Nicaragua</option>
                            <option>Niger</option>
                            <option>Nigeria</option>
                            <option>Niue</option>
                            <option>Norfolk Island</option>
                            <option>Northern Mariana Islands </option>
                            <option>Norway</option>
                            <option>Oman</option>
                            <option>Pakistan</option>
                            <option>Palau</option>
                            <option>Panama</option>
                            <option>Papua New Guinea</option>
                            <option>Paraguay</option>
                            <option>Peru</option>
                            <option>Philippines</option>
                            <option>Pitcairn</option>
                            <option>Poland</option>
                            <option>Portugal</option>
                            <option>Puerto Rico</option>
                            <option>Qatar</option>
                            <option>Reunion</option>
                            <option>Romania</option>
                            <option>Russian Federation</option>
                            <option>Rwanda</option>
                            <option>Saint Kitts And Nevis </option>
                            <option>Saint Lucia</option>
                            <option>Saint Vincent And The Grenadines </option>
                            <option>Samoa</option>
                            <option>San Marino</option>
                            <option>Sao Tome And Principe </option>
                            <option>Saudi Arabia</option>
                            <option>Senegal</option>
                            <option>Seychelles</option>
                            <option>Sierra Leone</option>
                            <option>Singapore</option>
                            <option>Slovakia</option>
                            <option>Slovenia</option>
                            <option>Solomon Islands</option>
                            <option>Somalia</option>
                            <option>South Africa</option>
                            <option>South Georgia &amp; South Sandwich 
                            Islands</option>
                            <option>Spain</option>
                            <option>Sri Lanka</option>
                            <option>St Helena</option>
                            <option>St Pierre and Miquelon </option>
                            <option>Sudan</option>
                            <option>Suriname</option>
                            <option>Svalbard And Jan Mayen Islands </option>
                            <option>Swaziland</option>
                            <option>Sweden</option>
                            <option>Switzerland</option>
                            <option>Syrian Arab Republic </option>
                            <option>Taiwan</option>
                            <option>Tajikistan</option>
                            <option>Tanzania</option>
                            <option>Thailand</option>
                            <option>Togo</option>
                            <option>Tokelau</option>
                            <option>Tonga</option>
                            <option>Trinidad And Tobago</option>
                            <option>Tunisia</option>
                            <option>Turkey</option>
                            <option>Turkmenistan</option>
                            <option>Turks And Caicos Islands </option>
                            <option>Tuvalu</option>
                            <option>Uganda</option>
                            <option>Ukraine</option>
                            <option>United Arab Emirates </option>
                            <option>United Kingdom</option>
                            <option>United States</option>
                            <option>United States Minor Outlying 
                            Islands</option>
                            <option>Uruguay</option>
                            <option>Uzbekistan</option>
                            <option>Vanuatu</option>
                            <option>Vatican City State</option>
                            <option>Venezuela</option>
                            <option>Viet Nam</option>
                            <option>Virgin Islands (British) </option>
                            <option>Virgin Islands (U.S.) </option>
                            <option>Wallis And Futuna Islands </option>
                            <option>Western Sahara</option>
                            <option>Yemen</option>
                            <option>Zaire</option>
                            <option>Zambia</option>
                            <option>Zimbabwe</option>
                            <option>Other-Not Shown</option>
                          </select>
                          </b></td>
                        <td align="right">מדינהaaaaaa</td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input id="23" class="RightDonationColumn" maxlength="50" name="Relationship" /></td>
                        <td align="right">קשר</td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input id="24" class="RightDonationColumn" maxlength="150" name="Occasion" /></td>
                        <td align="right">אירוע מיוחד</td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input id="25" class="RightDonationColumn" maxlength="50" name="OccasionDate" /></td>
                        <td align="right"><p dir="ltr">תאריך של אירוע זה</p></td>
                      </tr>
                    </table>
                  </div></td>
              </tr>
              <tr>
                <td align="right"><br /></td>
                <td>&nbsp;</td>
                <td align="right"><textarea cols="37" name="Comments" onkeydown="textCounter(this,document.DonationForm.remLen,200);" onkeyup="textCounter(this,document.DonationForm.remLen,200);" rows="4"></textarea></td>
                <td>&nbsp;</td>
                <td>הערות
                  <div style="font-style: italic; font-size: x-small; text-align: right">
                    <input maxlength="4" name="remLen" readonly size="4" style="width: 45px; font-size: xx-small" tabindex="-1" type="text" value="200" />
                    תווים שנותרו</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right"><input name="BigTotal" readonly size="11" style="font-size: xx-large" type="text" value="<?php echo $donate_amount; ?>" /></td>
                <td>&nbsp;</td>
                <td><h3 style="font-size: 24px; color: #474c4c; font-weight: bold; text-align: right;"> :סכום תרומה</h3></td>
              </tr>
              <tr>
                <td align="left" colspan="5"><input height="75" name="submit2" src="<?php echo get_template_directory_uri(); ?>/images/donate-hebrew-form-btn.jpg" style="box-shadow: 4px 5px 7px" type="image" width="250" /></td>
              </tr>
            </table>
            <input name="Currency" type="hidden" value="USD" />
            <input name="FormType" type="hidden" value="QUICKDONATION" />
            <input name="ProjectID" type="hidden" value="0" />
            <input name="BID" type="hidden" value="2" />
            <input name="iLanguageID" type="hidden" value="1" />
            <input name="CampaignCode" type="hidden" value="DONATE" />
<span id="siteseal"><script type="text/javascript" src="https://seal.starfieldtech.com/getSeal?sealID=X16hYbGIy6D3q5JGLteYDd8Q0CD3JvpWoRQfS4hEeMnhCdkE3XIJoP9vulYb"></script></span>
          </form>
        </div>
      </div>
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
            <h5 style="color: #fff; font-size: 24px; float: left; margin-top: 60px; margin-left: 15px;"> תרומתך מאובטחת ע”י</h5>
            </span></div>
          <div class="col-xs-7">
            <p style="font-size: 12px; color: #fff; text-align: right; padding-top: 22px;"> חפש באתר ע.ל.ה: ע.ל.ה בית | צור קשר | מדיניות פרטיות | שלח 
              לחבר כל התרומות לע.ל.ה הם לניכוי מס במלואו. תרומות בדולר, 
              דולר קנדי​​, או GBP יעובדו על ידי משרד ע.ל.ה שלהם בארצות 
              הברית, קנדה, או אנגליה. תרומות בכל מטבעות האחרים תעובד על 
              ידי משרדו של ע.ל.ה ישראל.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-xs-10">
            <h1 style="color: #056c27; font-size: 35px; text-align: center"> !הם צריכים את עלה. עלה צריך אותך</h1>
          </div>
          <div class="col-xs-2">
            <p style="color: #474c4c; font-size: 20px; margin-left: 0px; float: right; margin-top: 40px;"> קמפיין קוד</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function(e) {
	jQuery('#donate-page-send-ack-part').click(function(){
		jQuery('#ACK').toggle();
	});
	jQuery('.donate-page-gift-aid-uk').click(function(){
		jQuery('#GIFT').toggle();
	});
});
</script>
</body>
</html>
<?php //get_footer(); ?>