<?php 

if (get_locale() == 'en_GB' || get_locale() == 'en_US' ) {
?>

<h1>How do you use this plug-in?</h1>
<p>Add the shortcode below where you want to display the login form.</p>
<br>
<h2>Available shortcodes</h2>
<p>Enter your subdomain. For the subdomain https://testdomain.securelogin.nu the shortcode will look like this</p>
<code>
    [securelogin subdomain="testdomain"]
</code>
<p>If your SecureLogin environment runs on a custom domain you can use the following shortcode: [securelogin domain="<domain>.<extension>"]</p>
<code>
    [securelogin domain="testdomain.com"]
</code>
<br><br>
<h2>colours</h2>
<p>If you want to change the branding for the button you can add additional parameters. The shortcode should look like this: </p>
<code>
    [securelogin subdomain="testdomain" background="#A00" text="#FFF"]
</code>

<p><a href="http://www.w3schools.com/tags/ref_colorpicker.asp" title="HTML color codes" target="_blank">find your colour</a></p>

<?php
}else{
?>

<h1>Hoe gebruikt u deze plug-in?</h1>
<p>Voeg onderstaande shortcode toe op de plek waar het het login-formulier moet worden geplaatst.</p>
<br>
<h2>Welke mogelijkheden heb ik?</h2>
<p>Voer uw subdomein in. Voor het subdomein https://testdomein.securelogin.nu ziet de shortcode er als volgt uit.</p>
<code>
    [securelogin subdomain="testdomein"]
</code>
<p>Als u beschikt over een SecureLogin omgeving die gekoppeld is aan een eigen domeinnaam, dan kunt u de volgende shortcode gebruiken: [securelogin domain="<domain>.<extension>"]</p>
<code>
    [securelogin domain="testdomain.com"]
</code>
<br><br>
<br><br>
<h2>Kleuren</h2>
<p>Indien u de kleur van de knop wilt aanpassen van uw huisstijl, kunt u aanvullende opties meegeven op basis van kleurcodes. De shortcode ziet er dan als volgt uit:</p>
<code>
    [securelogin subdomein="testdomein" background="#A00" text="#FFF"]
</code>
<p><a href="http://www.w3schools.com/tags/ref_colorpicker.asp" title="HTML color codes" target="_blank">Vind uw kleur</a></p>

<?php }?>