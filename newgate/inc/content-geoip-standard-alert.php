<!-- include this file wherever you want to show the language dialog -->

<div class="geoip-alert" style='display:none;'>
	<div class="row">
		<div class="geoip-content columns-10 column-center">
			
			<a class="geoip-dismiss" href="#">×</a>
			
			<div class="geoip-container geoip-message-cookieset">
				<p><?php _e("Last time you were here, we set a preference for {{user_country}}, would you like to visit that site?", 'factorsgroup'); ?></p>				
				<div class='geoip-buttons'>
					<a class='geoip-staycountry button'>{{current_flag}} <?php _e('No thanks, stay here.', 'factorsgroup'); ?></a>
					<a class="geoip-gotocountry button">{{user_flag}} <?php _e('Okay, Take me to {{user_country_lang}}.', 'factorsgroup'); ?></a>
				</div>
				<small><?php _e("( We'll remember your choice for next time. )", "factorsgroup"); ?></small> 
			</div>
			
			<div class="geoip-container geoip-message-autoredirected">
				<p><?php _e("It looks like you're visiting from {{user_country}}, so we've taken you to the {{user_country_lang}} site.", 'factorsgroup'); ?></p>
				<div class='geoip-buttons'>
					<a class='geoip-staycountry button'>{{current_flag}} <?php _e('Okay, thanks', 'factorsgroup') ?></a>
					<a class="geoip-gotocountry button">{{user_flag}} <?php _e('No thanks, Take me back.', 'factorsgroup') ?></a>
				</div>
				<small><?php _e("( We'll remember your choice for next time. )", "factorsgroup"); ?></small> 
			</div>
			
			<div class="geoip-container geoip-message-redirect">
				<p><?php _e("It looks like you're visiting from {{user_country}}. Would you like to go to the {{user_country_lang}} site?", 'factorsgroup'); ?></p>
				<div class='geoip-buttons'>
					<a class='geoip-staycountry button'>{{current_flag}} <?php _e('No thanks, stay here.', 'factorsgroup'); ?></a>
					<a class="geoip-gotocountry button">{{user_flag}} <?php _e('Okay, Take me to {{user_country_lang}}.', 'factorsgroup'); ?></a>
				</div>
				<small><?php _e("( We'll remember your choice for next time. )", "factorsgroup"); ?></small>
			</div>

		</div>
	</div>
</div>

<style>
.geoip-alert {
	display: none;
	top: 0;
	left: 0;
	right: 0;
	padding: 1em;
	text-align: center;
	background: #D7E7F7;
	color: white;
	z-index: 1;
}
.geoip-alert div { text-align: center; }
.geoip-alert .button img { display: inline-block; }
.geoip-alert .button { 
	transition: background-color 300ms ease;
}
.geoip-alert .button:hover {
	transition: background-color 0s; 
	background: #009fbf;
}
.geoip-alert .geoip-content {
		position: relative;
		padding-right: 2em;
		padding-left: 1em;
}

.geoip-dismiss {
	position: absolute;
	right: -.5em;
	font-size: 1.5em;
	margin: 0;
	border: 2px solid #FF5A24;
	border-radius: 4px;
	padding: 1px 8px 0px;
	color: #FF5A24;
	font-weight: bold;
	text-decoration: none;		
}
.geoip-dismiss:hover {
		color: #009fbf;
		border-color: #009fbf;
	}
</style>