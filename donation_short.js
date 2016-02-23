function CalculateTotal()
{
	var Donation = document.DonationForm.OtherAmount.value;
	var NumberOfPayments = document.DonationForm.NumberOfPayments.value;

	document.DonationForm.total.value = CurrencyFormatted(Donation*NumberOfPayments);
	document.DonationForm.payments.value = NumberOfPayments;
	document.DonationForm.PaymentCurrency.value = document.DonationForm.OtherCurrency.options[document.DonationForm.OtherCurrency.selectedIndex].value;

	document.DonationForm.BigTotal.value = document.DonationForm.OtherCurrency.options[document.DonationForm.OtherCurrency.selectedIndex].value + CurrencyFormatted(Donation*NumberOfPayments);
	return true;

}
function CalculatePayments()
{
	var NumberOfPayments = document.DonationForm.NumberOfPayments.value;

	document.DonationForm.payments.value = NumberOfPayments 
	return true;

}
function CalculatePayment()
{
	var TotalDonation = document.DonationForm.Amount.value;
	var NumberOfPayments = document.DonationForm.NumberOfPayments.value;

	var MonthlyPayment = CurrencyFormatted(TotalDonation/NumberOfPayments);

	document.DonationForm.payment.value = MonthlyPayment;
	return true;

}

function ValidateDonationForm()
{
    var FirstName = document.DonationForm.FirstName;
    var LastName = document.DonationForm.LastName;
    var Address = document.DonationForm.Address;
    var City = document.DonationForm.City;
    var ZIP = document.DonationForm.ZIP;
    var State = document.DonationForm.State;
    var Country = document.DonationForm.Country;
    var Email = document.DonationForm.Email;
    var Telephone = document.DonationForm.Telephone;
    var CardNum = document.DonationForm.CardNum;
    var CardType = document.DonationForm.CreditCardType.options[document.DonationForm.CreditCardType.selectedIndex].value;
    var NameOnCard = document.DonationForm.NameOnCard;
    var tmpMonth = document.DonationForm.ValidMonth.options[document.DonationForm.ValidMonth.selectedIndex].value;
    var tmpYear = document.DonationForm.ValidYear.options[document.DonationForm.ValidYear.selectedIndex].value;
//    tmpYear = tmpYear ++ 2000;
//	var todaydate = new Date();
//year can't be less than current year, so only check month if expiration is this year.
//	if( tmpYear = todaydate.getYear() )
//	{
//		if( parseInt(month.value) < parseInt(todaydate.getMonth() ) )
//		{
//	     alert("This card has expired");
//	     CardNum.focus();
//	     return false;
//	     }
//	 }

    if (FirstName.value == "")
    {
        window.alert("Please enter your First Name");
        FirstName.focus();
        return false;
    }
    
    if (LastName.value == "")
    {
        window.alert("Please enter your Last Name");
        LastName.focus();
        return false;
    }
    
    if (Address.value == "")
    {
        window.alert("Please enter your Address");
        Address.focus();
        return false;
    }
    if (City.value == "")
    {
        window.alert("Please enter your City");
        City.focus();
        return false;
    }
    
    if (ZIP.value == "")
    {
        window.alert("Please enter your ZIP");
        ZIP.focus();
        return false;
    }
    
    if (Email.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        Email.focus();
        return false;
    }
    if (Email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        Email.focus();
        return false;
    }
    if (Email.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        Email.focus();
        return false;
    }

    if (Telephone.value == "")
    {
        window.alert("Please provide your Telephone.");
        Telephone.focus();
        return false;
    }

    if (NameOnCard.value == "")
    {
        window.alert("Please provide the name on the credit card.");
        NameOnCard.focus();
        return false;
    }

    if (CardNum.value == "")
    {
        window.alert("Please provide your Credit Card number.");
        CardNum.focus();
        return false;
    }

   Cno=CardNum.value;
   Cno = Cno.split(' ').join('');
   CardNum.value=Cno
   CCname = CardType;
   CardNum.focus();
   var ValidNumber = false;
   switch (CCname)
   { 
      case "VISA" :
         if (((Cno.length == 16) || (Cno.length == 13)) && (Cno.substring(0,1) == 4))
         { 
            ValidNumber = DOmod10(Cno);
         } 
      case "ISRA" :
        { 
            ValidNumber = true;
         } 
      case "MC" : 
           chr1 = Cno.substring(0,1); 
           chr2 = Cno.substring(1,2); 
           if ((Cno.length == 16) && (chr1 == 5) && ((chr2 >= 1) && (chr2 <= 5))) 
          {
              ValidNumber= DOmod10(Cno);
          } 
       case "AMEX" : 
          chr1 = Cno.substring(0,1); 
          chr2 = Cno.substring(1,2); 
          if ((Cno.length == 15) && (chr1 == 3) && ((chr2 == 4) || (chr2 == 7))) 
          {
              ValidNumber= DOmod10(Cno);
          }
      case "DINR" : 
         chr1 = Cno.substring(0,1); 
         chr2 = Cno.substring(1,2); 
         if ((Cno.length == 14) && (chr1 == 3) && ((chr2 == 0) || (chr2 == 6) || (chr2 == 8))) 
         {
              ValidNumber= DOmod10(Cno);
         }
      case "DISC" : 
         chr1to4 = Cno.substring(0,4); 
         if ((Cno.length == 16) && (chr1to4 == "6011")) 
        {
              ValidNumber= DOmod10(Cno);
        }
   }
	if (ValidNumber)
	{
	    return true;
    }
    else
    {
		window.alert("Credit Card number is not valid.");
	    CardNum.focus();
	    return false;
	}
}


function DOmod10(numstr) 
{ 
if (numstr.length > 19) 
{
   return (false); 
}
tot = 0;
len = numstr.length; 
mult = 1;
Totval = 0;
for (i = 0; i < len; i++)
{ 
   chrval = numstr.substring(len-i-1,len-i); 
   Totval = parseInt(chrval ,10)*mult; 
   if (Totval >= 10) 
   {
      tot += (Totval % 10) + 1; 
   }
   else 
   {
      tot += Totval; 
   } 
   if (mult == 1)
   { 
      mult++; 
   }
   else 
   {
      mult--; 
   }
} 
if ((tot % 10) == 0) 
{
   return true; 
}
else
{ 
   return false; 
} 
}



function CurrencyFormatted(amount)
{
	var i = parseFloat(amount);
	if(isNaN(i)) { i = 0.00; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	i = parseInt((i + .005) * 100);
	i = i / 100;
	s = new String(i);
	if(s.indexOf('.') < 0) { s += '.00'; }
	if(s.indexOf('.') == (s.length - 2)) { s += '0'; }
	s = minus + s;
	return s;
}




function showhide(layer_ref) {

if (state == '') {
state = 'none';
document.DonationForm.act.value='Open - Send Honor/Memory message to:';
}
else {
state = '';
document.DonationForm.act.value='Close - Send Honor/Memory message to:';
}
if (document.all) { //IS IE 4 or 5 (or 6 beta)
eval( "document.all." + layer_ref + ".style.display = state");
}
if (document.layers) { //IS NETSCAPE 4 or below
document.layers[layer_ref].display = state;
}
if (document.getElementById && !document.all) {
maxwell_smart = document.getElementById(layer_ref);
maxwell_smart.style.display = state;
}
}



function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}
