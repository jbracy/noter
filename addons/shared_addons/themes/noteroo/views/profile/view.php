<br />
<!-- Container for the user's profile -->
<div id="user_profile_container">
	<!-- Details about the user, such as role and when the user was registered -->
	<div id="user_details">
		{{ if user:logged_in }}
			<table style="width:100%;">
				<?php if (validation_errors()): ?>
				<div class="error-box">
					<?php echo validation_errors(); ?>
				</div>
				<?php endif; ?>
				<?php echo form_open_multipart('edit-profile', array('id'=>'user_edit','onsubmit'=>'return check_ad_free()')); ?>
				{{ user:profile_fields }}
					{{ if slug == "username" OR slug == "group_name" OR name == "Last login" OR slug == "registered_on" OR slug == "updated_on" }}
					{{ elseif slug == "credit_card_number"}}
						<tr>
							<td>
								{{ name }}
							</td>
							<td>
								<?php echo form_password('{{ slug }}', '{{ value }}'); ?>
							</td>
						</tr>
					{{ elseif slug == "address_line1" OR slug == "address_line2"}}
						<tr>
							<td>
								{{ if slug=="address_line1" }}
									Address
								{{ endif }}
							</td>
							<td>
								<?php echo form_input('{{ slug }}', '{{ value }}'); ?>
							</td>
						</tr>
					{{ elseif slug=="ad_free" }}
						<tr>
							<td>
								{{ name }}
							</td>
							<td>
								<a href="">Click here to upgrade</a>
								<?php 
								$yes = array(
									'name'        => 'ad_free',
									'id'          => 'ad_free',
									'value'       => 'yes',
									'checked'     => TRUE
									);
								$no = array(
									'name'        => 'ad_free',
									'value'       => 'yes',
									'checked'     => FALSE
									);
								?>
								{{ if value == "Yes"}}
								<?php echo form_radio($yes); ?>Yes
								<?php echo form_radio($no); ?>No
								{{ else }}
								<?php $yes['checked']=FALSE; ?>
								<?php $no['checked']=TRUE; ?>
								<?php echo form_radio($yes); ?>Yes
								<?php echo form_radio($no); ?>No
								{{ endif }}
							</td>
						</tr>
					{{ elseif slug=="credit_card_type"}}
						<tr>
							<td>
								Credit Card Type
							</td>
							<td>
								{{ value }}
								<?php
								$opts = array('default'=>'Choose one','Discover'=>'Discover','Master Card'=>'Master Card','Visa'=>'Visa');
								echo form_dropdown('credit_card_type', $opts, '{{ value }}', 'id="cc_type"'); ?>
							</td>
						</tr>
					{{elseif slug=="dob"}}
						<tr>
							<td>
								{{ name }}
							</td>
							<td>
								<script>$(function() {$("#datepicker_dob" ).datepicker({ dateFormat: "yy-mm-dd", minDate: "-100Y"});});</script>
								<?php
								$data = array(
								              'name'        => '{{slug}}',
								              'id'          => 'datepicker_dob',
											  'class'		=> 'hasDatepicker',
								              'value'       => '{{value}}',
										);
								echo form_input($data); ?>
							</td>
						</tr>
					{{ else }}
						<tr>
							<td>
								{{ name }}
							</td>
							<td>
								<?php echo form_input('{{ slug }}', '{{ value }}'); ?>
							</td>
						</tr>
					{{ endif }}
				{{ /user:profile_fields }}

				<tr>
					<td>
						Change Password
					</td>
					<td>
						<?php echo form_password('password', '', 'autocomplete="off"'); ?>
					</td>
				</tr>
		</table>
		<?php echo form_submit('','Save changes');?>
		<?php echo form_close() ?>
		{{ endif }}
	</div>
</div>