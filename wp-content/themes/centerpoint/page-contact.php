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

<div class="full-text">
	<div class="main-wrap">
		<h1 class="large">Get In Touch</h1>
	</div><!--end main-wrap-->
</div><!--end intro-->

<div class="contact-content">

<div class="main-wrap">

	<div class="form-fields col-md-6">
		<h1>Contact Us</h1>
		<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
			<input type=hidden name="oid" value="00D61000000db8f">
			<input type=hidden name="retURL" value="http://www.centerpointeducation.org">
			<input type=hidden id="lead_source" name="lead_source" value="Website">
			 
			<!-- ======================================================================== -->
			<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
			<!--  these lines if you wish to test in debug mode.                          -->
			<!--  <input type="hidden" name="debug" value=1>                              -->
			<!--  <input type="hidden" name="debugEmail" value="abarr@parcconline.org">   -->
			<!-- ======================================================================== -->

			 <div class="form-group">
			    <label for="first_name">First Name<span class="required">*</span></label>
			    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="">
			 </div>
			 
			 <div class="form-group">
			    <label for="last_name">Last Name<span class="required">*</span></label>
			    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="">
			 </div>
			 
			<div class="form-group">
			    <label for="title">Title<span class="required">*</span></label>
			    <input type="text" class="form-control" id="title" name="title" placeholder="">
			 </div>

			 <div class="form-group">
			    <label for="company">School or District<span class="required">*</span></label>
			    <input type="text" class="form-control" id="company" name="company" placeholder="">
			 </div>
			
			<div class="form-group">
				<label for="country_code">Country</label>
				<select class="form-control" id="country_code" name="country_code">
					<option value="">--None--</option>
					<option value="NZ">NZ</option>
					<option value="US">US</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="state_code">State/Province<span class="required">*</span></label>
				<select  class="form-control" id="state_code" name="state_code">
				<option value="">--None--</option>
				<option value="AL">AL</option>
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
				</select>
			</div>
			 
			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="">
			</div>

			<div class="form-group">
			    <label for="phone">Phone<span class="required">*</span></label>
			    <input type="text" class="form-control" id="phone" name="phone" placeholder="">
			</div>
			
			<div class="form-group">
			Preferred Method of Contact:
				<label class="checkbox-inline">
					<input type="checkbox" id="00N6100000Gnsna" value="phone" name="00N6100000Gnsna">Phone
				</label>
				<label class="checkbox-inline">
				 	<input type="checkbox" id="00N6100000Gnsnf" value="email" name="00N6100000Gnsnf">Email 
				</label>
			</div>

			<div class="form-group">
				<p>I would like to learn more about:</p>
					<div class="checkbox">
				       <label for="00N6100000GnsnB">
				         <input id="00N6100000GnsnB" name="00N6100000GnsnB" type="checkbox" value="1"> Diagnostic Assessments: Previ Learn
				       </label>
				    </div>
				    <div class="checkbox">
				       <label for="00N6100000GnsnG">
				         <input id="00N6100000GnsnG" name="00N6100000GnsnG" type="checkbox" value="1"> Professional Learning: Previ ProEd
				       </label>
				    </div>
				    <div class="checkbox">
				       <label for="00N6100000GnsnL">
				         <input id="00N6100000GnsnL" name="00N6100000GnsnL" type="checkbox" value="1"> Instructional Resources: Previ PLC
				       </label>
				    </div>
				    <div class="checkbox">
				       <label for="00N6100000GnsnQ">
				         <input id="00N6100000GnsnQ" name="00N6100000GnsnQ" type="checkbox" value="1"> Custom Assessment Services
				       </label>
				    </div>
			</div>
			
			<div class="form-group">
				<label for="00N6100000GnsnV">Questions or Comments?:</label>
					<textarea class="form-control" rows="4" maxlength="255" id="00N6100000GnsnV" name="00N6100000GnsnV"></textarea>
			</div>
			 
			<input type="submit" name="submit">
			
			<p><small><span class="required">*</span>Required</small></p>

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

</div><!--end contact-content-->

<?php get_footer(); ?>