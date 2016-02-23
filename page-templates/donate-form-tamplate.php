<?php
/**
 * Template Name: Donate Form Template
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
$ism_campaign_code = (isset($_POST['ism_campaign_code'])) ? $_POST['ism_campaign_code']: '';
if(isset($_REQUEST['donate_amount']))  
$donate_amount =  $_REQUEST['donate_amount'];

//send email to admin
if(isset($_POST['FormType'])){
	//print_r($_POST); 
 	get_template_part( 'page-templates/donate-email-template' );
	wp_redirect( home_url('/donation-information/donation-thank-you/') ); exit;
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
    <div class="donate-banner" style="background-image: url('<?php echo $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>');"> <span id="DonatePageHeaderText">
      <h2><?php echo get_the_title($_POST['child_id']); ?></h2>
      <p>To donate by phone or mail <a href="<?php echo esc_url( home_url( '/international-offices/' ) ); ?>"> click here</a></p>
      <p>Having trouble with this form? <a href="mailto:dov@aleh-israel.org?subject=I'm%20having%20trouble%20with%20the%20aleh.org%20donation%20page"> Let us know</a> and someone will get back to you shortly.&nbsp;</p>
      </span></div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs 12">
      	<p></p>
        <p style="font-size: 13px;">ALEH has become a global community based on the principles of sensitivity, inclusion, commitment and kindness, making a difference in the lives of Israeli children with severe cognitive, developmental and physical disabilities and building a better, more caring world.</p>
        <p style="font-size: 13px;"><strong>By donating to ALEH, YOU will help us meet our goal</strong> of enabling each child, regardless of the severity of the disability, to realize his or her potential and live a quality life on par with the rest of society.</p>
        <p style="font-size: 13px;">Thank you for your partnership and generosity!</p>
        <form action="https://donate.aleh.org/includes/Donation_Process.asp" method="POST" name="DonationForm" onsubmit="return ValidateDonationForm();">
          <input name="Description" type="hidden" value="General Donation To ALEH" />
          <table style="border-collapse: collapse; border: none; width: 800px; margin-top: 10px; color: #474c4c;">
            <tr>
              <td align="right" colspan="3"><h3 style="float: left; font-size: 20px; color: #19798a; font-weight: bold"> Any amount helps us greatly!</h3>
                <br /></td>
              <td align="right"><span id="siteseal"> 
                <script src="https://seal.starfieldtech.com/getSeal?sealID=ois5N6dT1HJk5VjqXss3dajsD97tXMDsNzsa13DUlwNiC0gWtLOMOXwfN" type="text/javascript"></script> 
                </span></td>
            </tr>
            <tr>
              <td align="center" colspan="3" style="height: 22px"><select name="OtherCurrency" onchange="return CalculateTotal()" size="1" title="Select the currency for your donation">
                  <option value="ILS">New Israeli Shekels (₪)</option>
                  <option selected="" value="USD">US Dollars ($)</option>
                  <option value="GBP">British Pounds (GBP)</option>
                  <option value="CAD">Canadian Dollars ($)</option>
                  <option value="EUR">Euros (€)</option>
                  <option value="AUD">AUD ($)</option>
                  <option value="ZAR">South African Rand (R)</option>
                </select>
                <input maxlength="7" name="OtherAmount" onchange="return CalculateTotal()" onkeypress="return numbersonly(this, event)" size="20" title="Enter the amount of your donation" value="<?php echo $donate_amount; ?>" />
                <br />
                <input name="DonationLevelID" type="hidden" value="0" /></td>
              <td align="center" style="height: 22px">&nbsp;</td>
            </tr>
<tr>
              <td align="right" valign="top">Each month for </td>
              <td>&nbsp;</td>
              <td><select class="filed3" name="NumberOfPayments" onchange="return CalculateTotal()" size="1">
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
                months, process my card in the above amount.
                <input name="total" type="hidden" value="" />
                <input name="PaymentCurrency" type="hidden" value="" />
</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" colspan="3"><h3 style="float: left; font-size: 20px; color: #19798a; font-weight: bold"> Donor Information</h3></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><p dir="ltr"><span class="text">First Name</span></p></td>
              <td><font color="#CC3333">*</font></td>
              <td><input id="1" maxlength="50" name="FirstName" size="20" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><p dir="ltr"><span class="text">Middle Name</span></p></td>
              <td>&nbsp;</td>
              <td><input id="11" maxlength="50" name="MiddleName" size="20" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><p dir="ltr"><span class="text">Last Name</span></p></td>
              <td><font color="#CC3333">*</font></td>
              <td><input id="12" maxlength="50" name="LastName" size="20" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><span class="text">Address</span></td>
              <td><font color="#CC3333">*</font></td>
              <td><input id="2" maxlength="50" name="Address" size="20" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px">City</td>
              <td><font color="#CC3333">*</font></td>
              <td><input id="20" maxlength="50" name="City" size="20" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px">ZIP/Postal Code</td>
              <td><font color="#CC3333">*</font></td>
              <td><input id="zip" maxlength="50" name="ZIP" size="10" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px">Country</td>
              <td><font color="#CC3333">*</font></td>
              <td><b>
                <select name="country" size="1">
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
                  <option>Bosnia And Herzegowina</option>
                  <option>Botswana</option>
                  <option>Bouvet Island</option>
                  <option>Brazil</option>
                  <option>British Indian Ocean Territory</option>
                  <option>Brunei Darussalam</option>
                  <option>Bulgaria</option>
                  <option>Burkina Faso</option>
                  <option>Burundi</option>
                  <option>Cambodia</option>
                  <option>Cameroon</option>
                  <option>Canada</option>
                  <option>Cape Verde</option>
                  <option>Cayman Islands</option>
                  <option>Central African Republic</option>
                  <option>Chad</option>
                  <option>Chile</option>
                  <option>China</option>
                  <option>Christmas Island</option>
                  <option>Cocos (Keeling) Islands</option>
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
                  <option>France, Metropolitan</option>
                  <option>French Guiana</option>
                  <option>French Polynesia</option>
                  <option>French Southern Territories</option>
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
                  <option>Heard And Mc Donald Islands</option>
                  <option>Honduras</option>
                  <option>Hong Kong</option>
                  <option>Hungary</option>
                  <option>Iceland</option>
                  <option>India</option>
                  <option>Indonesia</option>
                  <option>Iran</option>
                  <option>Iraq</option>
                  <option>Ireland</option>
                  <option>Israel</option>
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
                  <option>Lao People's Republic</option>
                  <option>Latvia</option>
                  <option>Lebanon</option>
                  <option>Lesotho</option>
                  <option>Liberia</option>
                  <option>Libyan Arab Jamahiriya</option>
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
                  <option>Netherlands Antilles</option>
                  <option>New Caledonia</option>
                  <option>New Zealand</option>
                  <option>Nicaragua</option>
                  <option>Niger</option>
                  <option>Nigeria</option>
                  <option>Niue</option>
                  <option>Norfolk Island</option>
                  <option>Northern Mariana Islands</option>
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
                  <option>Saint Kitts And Nevis</option>
                  <option>Saint Lucia</option>
                  <option>Saint Vincent And The Grenadines</option>
                  <option>Samoa</option>
                  <option>San Marino</option>
                  <option>Sao Tome And Principe</option>
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
                  <option>South Georgia &amp; South Sandwich Islands </option>
                  <option>Spain</option>
                  <option>Sri Lanka</option>
                  <option>St Helena</option>
                  <option>St Pierre and Miquelon</option>
                  <option>Sudan</option>
                  <option>Suriname</option>
                  <option>Svalbard And Jan Mayen Islands</option>
                  <option>Swaziland</option>
                  <option>Sweden</option>
                  <option>Switzerland</option>
                  <option>Syrian Arab Republic</option>
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
                  <option>Turks And Caicos Islands</option>
                  <option>Tuvalu</option>
                  <option>Uganda</option>
                  <option>Ukraine</option>
                  <option>United Arab Emirates</option>
                  <option>United Kingdom</option>
                  <option selected="">United States</option>
                  <option>United States Minor Outlying Islands </option>
                  <option>Uruguay</option>
                  <option>Uzbekistan</option>
                  <option>Vanuatu</option>
                  <option>Vatican City State</option>
                  <option>Venezuela</option>
                  <option>Viet Nam</option>
                  <option>Virgin Islands (British)</option>
                  <option>Virgin Islands (U.S.)</option>
                  <option>Wallis And Futuna Islands</option>
                  <option>Western Sahara</option>
                  <option>Yemen</option>
                  <option>Zaire</option>
                  <option>Zambia</option>
                  <option>Zimbabwe</option>
                  <option>Other-Not Shown</option>
                </select>
                </b></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px">State/Province</td>
              <td><font color="#CC3333">*</font></td>
              <td><select name="State" size="1">
                  <option value="-- Please Select -- ">-- Please Select 
                  --</option>
                  <option value=" ">Non-US Address</option>
                  <option>Non-US</option>
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>American Samoa</option>
                  <option>Arizona</option>
                  <option>Arkansas</option>
                  <option>California</option>
                  <option>Colorado</option>
                  <option>Connecticut</option>
                  <option>Delaware</option>
                  <option>District Of Columbia</option>
                  <option>Federated States Of Micronesia</option>
                  <option>Florida</option>
                  <option>Georgia</option>
                  <option>Guam</option>
                  <option>Hawaii</option>
                  <option>Idaho</option>
                  <option>Illinois</option>
                  <option>Indiana</option>
                  <option>Iowa</option>
                  <option>Kansas</option>
                  <option>Kentucky</option>
                  <option>Louisiana</option>
                  <option>Maine</option>
                  <option>Marshall Islands</option>
                  <option>Maryland</option>
                  <option>Massachusetts</option>
                  <option>Michigan</option>
                  <option>Minnesota</option>
                  <option>Mississippi</option>
                  <option>Missouri</option>
                  <option>Montana</option>
                  <option>Nebraska</option>
                  <option>Nevada</option>
                  <option>New Hampshire</option>
                  <option>New Jersey</option>
                  <option>New Mexico</option>
                  <option>New York</option>
                  <option>North Carolina</option>
                  <option>North Dakota</option>
                  <option>Northern Mariana Islands</option>
                  <option>Ohio</option>
                  <option>Oklahoma</option>
                  <option>Oregon</option>
                  <option>Palau</option>
                  <option>Pennsylvania</option>
                  <option>Puerto Rico</option>
                  <option>Rhode Island</option>
                  <option>South Carolina</option>
                  <option>South Dakota</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Utah</option>
                  <option>Vermont</option>
                  <option>Virgin Islands</option>
                  <option>Virginia</option>
                  <option>Washington</option>
                  <option>West Virginia</option>
                  <option>Wisconsin</option>
                  <option>Wyoming</option>
                  <option>Alberta</option>
                  <option>British Columbia</option>
                  <option>Manitoba</option>
                  <option>New Brunswick</option>
                  <option>Newfoundland and Labrador</option>
                  <option>Northwest Territories</option>
                  <option>Nova Scotia</option>
                  <option>Nunavut</option>
                  <option>Ontario</option>
                  <option>Prince Edward Island</option>
                  <option>Quebec</option>
                  <option>Saskatchewan</option>
                  <option>Yukon</option>
                </select></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><span class="text">Telephone</span></td>
              <td><font color="#CC3333">*</font></td>
              <td><input id="5" maxlength="50" name="Telephone" size="20" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><span class="text">E-mail</span></td>
              <td><font color="#CC3333">*</font></td>
              <td><input maxlength="100" name="Email" size="20" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><span class="text">Your Birthday</span></td>
              <td>&nbsp;</td>
              <td><select name="BirthdayDate">
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
                <b>We'd love to send you a card!</b></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right">Tzedakah Box</td>
              <td>&nbsp;</td>
              <td><input name="DonationBox" type="checkbox" value="ON" />&nbsp;&nbsp;If checked we will send you an ALEH Tzedakah (Charity) Box.</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" colspan="3"><h3 style="margin-bottom: 0px float:left; font-size: 20px; color: #19798a; font-weight: bold"> Payment Information</h3>
                <p style="margin-top: 0px; font-style: italic">Please 
                  note: Credit card donations can only be processed from <strong>$5</strong> and up</p></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px">Credit card type:</td>
              <td>&nbsp;</td>
              <td><select name="CreditCardType" size="1">
                  <option value="ISRA">Isracard</option>
                  <option selected="" value="VISA">Visa</option>
                  <option value="MC">Mastercard</option>
                  <option value="AMEX">American Express</option>
                  <option value="DINR">Diners</option>
                  <option value="DISC">Discover</option>
                </select></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><span class="text">Credit Card Number :</span></td>
              <td><font color="#CC3333"><span class="text">*</span></font></td>
              <td><input maxlength="16" name="CardNum" size="20" value="" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px">CVV</td>
              <td>&nbsp;</td>
              <td><input id="70" maxlength="4" name="CVV" size="20" style="width: 39px" value="" />
                <a class="Popup" href="javascript:CVV(225,225,0,0);"> What's This?</a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><nobr class="text">Expiration date:</nobr></td>
              <td><font color="#CC3333"><span class="text">*</span></font></td>
              <td><select id="ValidMonth" class="filed3" name="ValidMonth" size="1">
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
                  <option value="16">2016</option>
                  <option value="17">2017</option>
                  <option value="18">2018</option>
                  <option value="19">2019</option>
                  <option value="20">2020</option>
                  <option value="21">2021</option>
                  <option value="22">2022</option>
                  <option value="23">2023</option>
                  <option value="24">2024</option>
                </select></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="width: 291px"><nobr> <span class="text">Name on credit card:</span></nobr></td>
              <td><font color="#CC3333"><span class="text">*</span></font></td>
              <td><nobr>
                <input maxlength="50" name="NameOnCard" />
                </nobr></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" colspan="3"><h3 id="donate-page-send-ack-part" style="cursor: hand; cursor: pointer; font-size: 20px; color: #19798a; font-weight: bold"> Click here to send an acknowledgement of this donation 
                  to another person </h3></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" colspan="3"><div id="ACK" class="switchcontent" style="display: none;">
                  <table>
                    <tr>
                      <td align="right">Donation is</td>
                      <td>&nbsp;</td>
                      <td><select class="RightDonationColumn" name="DonationHonorCodeID" size="1">
                          <option selected="" value="0">not applicable </option>
                          <option value="1">In Honor Of</option>
                          <option value="2">In Memory Of</option>
                        </select></td>
                    </tr>
                    <tr>
                      <td align="right">Name to honor/memorialize</td>
                      <td>&nbsp;</td>
                      <td><input id="16" class="RightDonationColumn" maxlength="50" name="HonorName" /></td>
                    </tr>
                    <tr>
                      <td align="center" colspan="3">Send an acknowledgement 
                        to:</td>
                    </tr>
                    <tr>
                      <td align="right"><p dir="ltr"><span class="text">First Name:</span></p></td>
                      <td><font color="#CC3333">*</font></td>
                      <td><input id="13" class="RightDonationColumn" maxlength="50" name="FirstName2" /></td>
                    </tr>
                    <tr>
                      <td align="right"><p dir="ltr"><span class="text">Last Name:</span></p></td>
                      <td><font color="#CC3333">*</font></td>
                      <td><input id="15" class="RightDonationColumn" maxlength="50" name="LastName2" /></td>
                    </tr>
                    <tr>
                      <td align="right"><span class="text">Address:</span></td>
                      <td><font color="#CC3333">*</font></td>
                      <td><input id="21" class="RightDonationColumn" maxlength="50" name="Address2"/></td>
                    </tr>
                    <tr>
                      <td align="right">City</td>
                      <td>&nbsp;</td>
                      <td><input id="22" class="RightDonationColumn" maxlength="50" name="City2" /></td>
                    </tr>
                    <tr>
                      <td align="right">State:</td>
                      <td><font color="#CC3333">*</font></td>
                      <td><select class="RightDonationColumn" name="State2" size="1">
                          <option value="-- Please Select -- ">-- 
                          Please Select --</option>
                          <option value=" ">Non-US Address </option>
                          <option>Non-US</option>
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>American Samoa</option>
                          <option>Arizona</option>
                          <option>Arkansas</option>
                          <option>California</option>
                          <option>Colorado</option>
                          <option>Connecticut</option>
                          <option>Delaware</option>
                          <option>District Of Columbia</option>
                          <option>Federated States Of Micronesia </option>
                          <option>Florida</option>
                          <option>Georgia</option>
                          <option>Guam</option>
                          <option>Hawaii</option>
                          <option>Idaho</option>
                          <option>Illinois</option>
                          <option>Indiana</option>
                          <option>Iowa</option>
                          <option>Kansas</option>
                          <option>Kentucky</option>
                          <option>Louisiana</option>
                          <option>Maine</option>
                          <option>Marshall Islands</option>
                          <option>Maryland</option>
                          <option>Massachusetts</option>
                          <option>Michigan</option>
                          <option>Minnesota</option>
                          <option>Mississippi</option>
                          <option>Missouri</option>
                          <option>Montana</option>
                          <option>Nebraska</option>
                          <option>Nevada</option>
                          <option>New Hampshire</option>
                          <option>New Jersey</option>
                          <option>New Mexico</option>
                          <option>New York</option>
                          <option>North Carolina</option>
                          <option>North Dakota</option>
                          <option>Northern Mariana Islands </option>
                          <option>Ohio</option>
                          <option>Oklahoma</option>
                          <option>Oregon</option>
                          <option>Palau</option>
                          <option>Pennsylvania</option>
                          <option>Puerto Rico</option>
                          <option>Rhode Island</option>
                          <option>South Carolina</option>
                          <option>South Dakota</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Utah</option>
                          <option>Vermont</option>
                          <option>Virgin Islands</option>
                          <option>Virginia</option>
                          <option>Washington</option>
                          <option>West Virginia</option>
                          <option>Wisconsin</option>
                          <option>Wyoming</option>
                          <option>Alberta</option>
                          <option>British Columbia</option>
                          <option>Manitoba</option>
                          <option>New Brunswick</option>
                          <option>Newfoundland and Labrador </option>
                          <option>Northwest Territories</option>
                          <option>Nova Scotia</option>
                          <option>Nunavut</option>
                          <option>Ontario</option>
                          <option>Prince Edward Island</option>
                          <option>Quebec</option>
                          <option>Saskatchewan</option>
                          <option>Yukon</option>
                        </select></td>
                    </tr>
                    <tr>
                      <td align="right">ZIP</td>
                      <td>&nbsp;</td>
                      <td><input id="zip2" class="RightDonationColumn" maxlength="50" name="ZIP2" /></td>
                    </tr>
                    <tr>
                      <td align="right">Country</td>
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
                          <option>Bosnia And Herzegowina</option>
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
                          <option>Cocos (Keeling) Islands</option>
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
                          <option>France, Metropolitan</option>
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
                          <option>Israel</option>
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
                          <option>Lao People's Republic</option>
                          <option>Latvia</option>
                          <option>Lebanon</option>
                          <option>Lesotho</option>
                          <option>Liberia</option>
                          <option>Libyan Arab Jamahiriya</option>
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
                          <option>Netherlands Antilles</option>
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
                          <option>Saint Kitts And Nevis</option>
                          <option>Saint Lucia</option>
                          <option>Saint Vincent And The Grenadines </option>
                          <option>Samoa</option>
                          <option>San Marino</option>
                          <option>Sao Tome And Principe</option>
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
                          <option>St Pierre and Miquelon</option>
                          <option>Sudan</option>
                          <option>Suriname</option>
                          <option>Svalbard And Jan Mayen Islands </option>
                          <option>Swaziland</option>
                          <option>Sweden</option>
                          <option>Switzerland</option>
                          <option>Syrian Arab Republic</option>
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
                          <option>United Arab Emirates</option>
                          <option>United Kingdom</option>
                          <option selected="">United States </option>
                          <option>United States Minor Outlying Islands </option>
                          <option>Uruguay</option>
                          <option>Uzbekistan</option>
                          <option>Vanuatu</option>
                          <option>Vatican City State</option>
                          <option>Venezuela</option>
                          <option>Viet Nam</option>
                          <option>Virgin Islands (British) </option>
                          <option>Virgin Islands (U.S.)</option>
                          <option>Wallis And Futuna Islands </option>
                          <option>Western Sahara</option>
                          <option>Yemen</option>
                          <option>Zaire</option>
                          <option>Zambia</option>
                          <option>Zimbabwe</option>
                          <option>Other-Not Shown</option>
                        </select>
                        </b></td>
                    </tr>
                    <tr>
                      <td align="right">Relationship</td>
                      <td>&nbsp;</td>
                      <td><input id="23" class="RightDonationColumn" maxlength="50" name="Relationship" /></td>
                    </tr>
                    <tr>
                      <td align="right">Special Occasion</td>
                      <td>&nbsp;</td>
                      <td><input id="24" class="RightDonationColumn" maxlength="150" name="Occasion" /></td>
                    </tr>
                    <tr>
                      <td align="right"><p dir="ltr">Date of this Occasion</p></td>
                      <td>&nbsp;</td>
                      <td><input id="25" class="RightDonationColumn" maxlength="50" name="OccasionDate" /></td>
                    </tr>
                  </table>
                </div></td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="right">Comments<br />
                <div style="font-style: italic; font-size: x-small; text-align: right">
                  <input maxlength="4" name="remLen" readonly size="4" style="width: 45px; font-size: xx-small" tabindex="-1" type="text" value="200" />
                  characters left</div></td>
              <td>&nbsp;</td>
              <td><textarea cols="37" name="Comments" onkeydown="textCounter(this,document.DonationForm.remLen,200);" onkeyup="textCounter(this,document.DonationForm.remLen,200);" rows="4"></textarea></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" colspan="3"><h3 class="donate-page-gift-aid-uk" style="cursor: hand; cursor: pointer; font-size: 20px; color: #19798a; font-weight: bold;"> Gift Aid (UK Only)
                  <input id="gift-aid-toggle" name="GiftAidIt" type="checkbox" value="ON" />
                </h3>
                <div id="GIFT" class="switchcontent" style="padding: 0px 10px; text-align: left; display: none;">
                  <label for="GiftAidIt"><strong>Gift Aid Declaration 
                    for past, present &amp; future donations - ALEH 
                    Charitable Foundation</strong>.<br>
                    Please treat 
                    as Gift Aid donations all qualifying gifts of money 
                    made by me today, in the past 4 years or in the 
                    future. I confirm I have paid or will pay an amount 
                    of Income Tax and/or Capital Gains Tax for each 
                    tax year (6 April to 5 April) that is at least equal 
                    to the amount of tax that all the charities or Community 
                    Amateur Sports Clubs that I donate to will reclaim 
                    on my gifts for that tax year. I understand that 
                    other taxes such as VAT and Council Tax do not qualify. 
                    I understand the charity will reclaim 25p of tax 
                    on every 1 that I give. Please notify us if you 
                    (a) Want to cancel this declaration (b) Change your 
                    name or home address (c) No longer pay sufficient 
                    tax on your income and/or capital gains. If you 
                    pay Income Tax at the higher or additional rate 
                    and want to receive the additional tax relief due 
                    to you, you must include all your Gift Aid donations 
                    on your Self Assessment tax return or ask HM Revenue 
                    and Customs to adjust your tax code.</label>
                </div></td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td><h3 style="font-size: 22px; color: #474c4c; font-weight: bold;"> Donation Amount:</h3></td>
              <td>&nbsp;</td>
              <td><input name="BigTotal" readonly size="11" style="font-size: xx-large" type="text" value="<?php echo $donate_amount; ?>"/><br>(in <input name="payments" readonly size="11" style="border: 1px solid #FFFFFF; width: 18px;" type="text" /> payments)</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" style="text-align: center"><input height="75" name="submit" src="<?php echo get_template_directory_uri(); ?>/images/donate-icon.png" style="box-shadow: 4px 5px 7px" type="image" width="250" /></td>
              <td style="text-align: center">&nbsp;</td>
            </tr>
          </table>
          <input name="Currency" type="hidden" value="USD" />
          <input name="FormType" type="hidden" value="QUICKDONATION" />
          <input name="ProjectID" type="hidden" value="0" />
          <input name="BID" type="hidden" value="2" />
          <input name="iLanguageID" type="hidden" value="1" />
          <input name="CampaignCode" type="hidden" value="DONATE" />
        </form>
      </div>
    </div>
  </div>
</div>
<div class="donate-footer">
  <div class="donate-secure">
    <div class="container">
      <div class="row">
        <div class="col-xs-8">
          <p class="donate-form-footer-links" style="font-size: 12px; color: #fff; text-align: left; padding-top: 22px;"> Browse the ALEH website: <a href="http://www.aleh.org" style="color: white">ALEH Home</a>&nbsp;| <a href="<?php echo esc_url( home_url( '/' ) ); ?>international-offices/contact-form/" style="color: white"> Contact Us</a> | <a href="<?php echo esc_url( home_url( '/' ) ); ?>privacy-policy/" style="color: white"> Privacy Policy</a><br/>
            All donations made to ALEH are fully tax-deductible. 
            Donations made in USD, CAD, or GBP will be processed by their 
            respective ALEH office in the USA, Canada, or England. Donations 
            in all other currencies will be processed by ALEH's Israel office.</p>
        </div>
        <div class="col-xs-4 secure-right"> <span id="siteseal"> 
          <script src="https://seal.starfieldtech.com/getSeal?sealID=ois5N6dT1HJk5VjqXss3dajsD97tXMDsNzsa13DUlwNiC0gWtLOMOXwfN" type="text/javascript"></script></span> </div>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float: left; margin-top: 5px; margin-bottom: 5px" target="paypal">
          <input name="cmd" type="hidden" value="_xclick" />
          <input name="business" type="hidden" value="dov@alehnf.org" />
          <input name="item_name" type="hidden" value="General Donation to ALEH" />
          <input name="item_number" type="hidden" value="DON-DONATE" />
          <input name="currency_code" type="hidden" value="USD" />
          <input name="cn" type="hidden" value="Comments" />
          <input name="image_url" type="hidden" value="https://www.aleh.org/images/Aleh_logo_149x62.gif" />
          <input name="return" type="hidden" value="<?php echo esc_url( home_url( '/' ) ); ?>donation-information/donation-thank-you/" />
          <input align="left" border="0" name="submit" src="<?php echo get_template_directory_uri(); ?>/images/secure-donate.png" style="margin-top: 23px; margin-left: 15px;" type="image" />
        </form>
      </div>
    </div>
  </div>
</div>
<div class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
        <p style="color: #474c4c; font-size: 12px; margin-left: -35px; margin-top: 40px"> Campaign Code: <?php echo $ism_campaign_code; ?></p>
      </div>
      <div class="col-xs-10">
        <h1 style="color: #056c27; font-size: 30px;">They need ALEH. ALEH 
          needs you!</h1>
      </div>
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function(e) {
	jQuery('#donate-page-send-ack-part').click(function(){
		jQuery('#ACK').toggle();
	});
	jQuery('.donate-page-gift-aid-uk #gift-aid-toggle').change(function(){
			if (this.checked) {
				jQuery('#GIFT').show();
			} else {
				jQuery('#GIFT').hide();
			}
	});
});
</script>
</body>
</html>
<?php //get_footer(); ?>