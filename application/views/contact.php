	<!-- Contact -->
	
	<div class="row">
	
		<div class="span12">
		
			<div id="map_canvas"></div>
		
		</div>
	
	</div>
	
	<div class="row">
	
		<div class="span6">
			
			<div class="checkout-box">
			
				<h2>Contact Us</h2>
				
				<p>If you would like to send us an email please fill out the form below.</p>
				
				<form action="checkout-2.html" method="post">
				
					<p>
						<label for="field-name">Name <span class="mand">*</span></label>
						<input type="text" id="field-name" name="field-name" />
					</p>
				
					<p>
						<label for="field-email">Email <span class="mand">*</span></label>
						<input type="text" id="field-email" name="field-email" />
					</p>
				
					<p>
						<label for="field-message">Message <span class="mand">*</span></label>
						<textarea id="field-message" name="field-message"></textarea>
					</p>
				
					<p class="buttons">
						<button class="btn btn-primary" type="submit">Send</button>
					</p>
				
				</form>
				
			</div>
			
		</div>
	
		<div class="span6">
			
			<div class="checkout-box">
			
				<h2>Where Are We?</h2>
			
				<p class="address">
					Address 1<br />
					Address 2<br />
					City<br />
					County<br />
					Postcode<br />
					Country
				</p>
			
				<h2>Or Call Us...</h2>
				
				<p class="tel">01010 101 0100</p>
				
			</div>
			
		</div>
	
	</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url();?>media/js/contact.js"></script>

