<?php get_header(); ?>

<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];
?>

<?php if(get_post_thumbnail_id()): ?> 
	<div class="featured-image">
		<img src="<?php echo $thumb_url; ?>">
	</div><!--end featured-image-->
<?php endif; ?>

<div class="main-wrap">

	<div class="form-fields col-md-6">
		<h1>Contact Us</h1>
		<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
			<input type=hidden name="oid" value="00D61000000db8f">
			<input type=hidden name="retURL" value="http://www.centerpointeducation.org">
			 
			<!-- ======================================================================== -->
			<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
			<!--  these lines if you wish to test in debug mode.                          -->
			<!--  <input type="hidden" name="debug" value=1>                              -->
			<!--  <input type="hidden" name="debugEmail" value="abarr@parcconline.org">   -->
			<!-- ======================================================================== -->
			 
			<label for="first_name">First Name</label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" /><br>
			 
			<label for="last_name">Last Name</label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br>
			 
			<label for="title">Title</label><input  id="title" maxlength="40" name="title" size="20" type="text" /><br>
			 
			<label for="company">Company</label><input  id="company" maxlength="40" name="company" size="20" type="text" /><br>
			 
			<label for="country_code">Country</label><select  id="country_code" name="country_code"><option value="">--None--</option><option value="NZ">NZ</option>
			<option value="US">US</option>
			</select><br>
			 
			<label for="state_code">State/Province</label><select  id="state_code" name="state_code"><option value="">--None--</option><option value="AL">AL</option>
			<option value="AK">AK</option>
			<option value="AZ">AZ</option>
			<option value="AR">AR</option>
			<option value="CA">CA</option>
			<option value="CO">CO</option>
			<option value="CT">CT</option>
			<option value="DE">DE</option>
			<option value="DC">DC</option>
			<option value="FL">FL</option>
			<option value="GA">GA</option>
			<option value="HI">HI</option>
			<option value="ID">ID</option>
			<option value="IL">IL</option>
			<option value="IN">IN</option>
			<option value="IA">IA</option>
			<option value="KS">KS</option>
			<option value="KY">KY</option>
			<option value="LA">LA</option>
			<option value="ME">ME</option>
			<option value="MD">MD</option>
			<option value="MA">MA</option>
			<option value="MI">MI</option>
			<option value="MN">MN</option>
			<option value="MS">MS</option>
			<option value="MO">MO</option>
			<option value="MT">MT</option>
			<option value="NE">NE</option>
			<option value="NV">NV</option>
			<option value="NH">NH</option>
			<option value="NJ">NJ</option>
			<option value="NM">NM</option>
			<option value="NY">NY</option>
			<option value="NC">NC</option>
			<option value="ND">ND</option>
			<option value="OH">OH</option>
			<option value="OK">OK</option>
			<option value="OR">OR</option>
			<option value="PA">PA</option>
			<option value="RI">RI</option>
			<option value="SC">SC</option>
			<option value="SD">SD</option>
			<option value="TN">TN</option>
			<option value="TX">TX</option>
			<option value="UT">UT</option>
			<option value="VT">VT</option>
			<option value="VA">VA</option>
			<option value="WA">WA</option>
			<option value="WV">WV</option>
			<option value="WI">WI</option>
			<option value="WY">WY</option>
			</select><br>
			 
			<label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" /><br>
			 
			<label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>
			 
			Phone:<input  id="00N6100000Gnsna" name="00N6100000Gnsna" type="checkbox" value="1" /><br>
			 
			Email:<input  id="00N6100000Gnsnf" name="00N6100000Gnsnf" type="checkbox" value="1" /><br>
			 
			Diagnostic Assessments: Previ Learn:<input  id="00N6100000GnsnB" name="00N6100000GnsnB" type="checkbox" value="1" /><br>
			 
			Professional Learning: Previ ProEd:<input  id="00N6100000GnsnG" name="00N6100000GnsnG" type="checkbox" value="1" /><br>
			 
			Instructional Resources: Previ PLC:<input  id="00N6100000GnsnL" name="00N6100000GnsnL" type="checkbox" value="1" /><br>
			 
			Custom Assessment Services:<input  id="00N6100000GnsnQ" name="00N6100000GnsnQ" type="checkbox" value="1" /><br>
			 
			Questions or Comments?:<input  id="00N6100000GnsnV" maxlength="255" name="00N6100000GnsnV" size="20" type="text" /><br>
			 
			<label for="lead_source">Lead Source</label><select  id="lead_source" name="lead_source"><option value="">--None--</option><option value="DEAP Inquiry">DEAP Inquiry</option>
			<option value="DEAP Rostered">DEAP Rostered</option>
			<option value="Email Campaign">Email Campaign</option>
			<option value="Referral">Referral</option>
			<option value="Conference/Presentation">Conference/Presentation</option>
			<option value="Meeting">Meeting</option>
			<option value="Newsletter">Newsletter</option>
			<option value="Website">Website</option>
			<option value="Word of mouth">Word of mouth</option>
			<option value="Webinar">Webinar</option>
			<option value="RFP">RFP</option>
			<option value="Other">Other</option>
			</select><br>
			 
			<input type="submit" name="submit">
			 
			</form>
	</div><!--end form-fields-->

	<div class="contact-info col-md-6">
		
		<div class="info-block">
			<h2>Contact Office</h2>
			<p>To contact the main office, call 202-836-7500. For product and sales information, contact us at 844.637.7100 or email <a href="mailto:learn@centerpointeducation.org">learn@centerpointeducation.org</a>.</p>
		</div><!--end info-block-->
		<div class="info-block">
			<h2>Headquarters</h2>
			<p>1747 Pennsylvania Avenue NW</p>
			<p>6th Floor</p>
			<p>Washington, DC 20006</p>
		</div><!--end info-block-->
		<div class="info-block">
			<h2>Media Inquiries</h2>
			<p>Phone: 202-836-7500</p>
			<p>Email: <a href="mailto:media@centerpointeducation.org">media@centerpointeducation.org</a></p>
		</div><!--end info-block-->

	</div><!--end contact-info-->

	<div class="clearfix"></div>

</div><!--end main-wrap-->

<?php get_footer(); ?>