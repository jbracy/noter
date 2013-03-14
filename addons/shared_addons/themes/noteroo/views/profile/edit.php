	<?php if (validation_errors()):?>
	<div class="error-box">
		<?php echo validation_errors();?>
	</div>
	<?php endif;?>

	<table style="width:100%;">
	<?php echo form_open_multipart('edit-profile', array('id'=>'user_edit','onsubmit'=>'return check_ad_free()')); ?>
		<tr>
			<td>
				<?php echo lang('profile_display_name'); ?>
			</td>
			<td>
				<?php echo form_input(array('name' => 'display_name', 'id' => 'display_name', 'value' => set_value('display_name', $display_name))); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo lang('user_email_label') ?>
			</td>
			<td>
				<?php echo form_input('email', $_user->email); ?>
			</td>
		</tr>
			<?php foreach($profile_fields as $field): ?>
				<tr>
					<td>
						<?php if ($field['field_slug'] == "address_line1"): ?>
							Address
						<?php elseif ($field['field_slug'] == "address_line2"): ?>
														
						<?php else: 
							echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];
							if ($field['required']) echo '<span>*</span>'; 
						endif; ?>
					</td>
					<td>
						<?php if ($field['field_slug'] == "ad_free"):
							$yes = array(
								'name'        => 'ad_free',
								'id'          => 'ad_free',
								'value'       => 'yes',
								'checked'     => TRUE
								);
							$no = array(
								'name'        => 'ad_free',
								'value'       => 'no',
								'checked'     => FALSE
								);
							if ($field['value'] != 'no'){	
							echo form_radio($yes); ?>Yes
							<?php echo form_radio($no); ?>No
							<?php
							}
							else{ 
							$yes['checked']=FALSE;
							$no['checked']=TRUE;
							echo form_radio($yes); ?>Yes
							<?php echo form_radio($no); ?>No
							
						<?php
						}
						else:
 							echo $field['input'];
						endif ?>
					</td>
				</tr>
			<?php endforeach; ?>

		<tr>
			<td>
				Change Password
			</td>
			<td>
				<?php echo form_password('password', '', 'autocomplete="off"'); ?>
			</td>
		</tr>

	<?php if (Settings::get('api_enabled') and Settings::get('api_user_keys')): ?>
		
	<script>
	jQuery(function($) {
		
		$('input#generate_api_key').click(function(){
			
			var url = "<?php echo site_url('api/ajax/generate_key') ?>",
				$button = $(this);
			
			$.post(url, function(data) {
				$button.prop('disabled', true);
				$('span#api_key').text(data.api_key).parent('td').show();
			}, 'json');
			
		});
		
	});
	</script>
		
		<tr>
			<td <?php $api_key or print('style="display:none"') ?>><?php echo sprintf(lang('api:key_message'), '<span id="api_key">'.$api_key.'</span>'); ?></td>
			<td>
				<input type="button" id="generate_api_key" value="<?php echo lang('api:generate_key') ?>" />
			</td>
		</tr>
	
	<?php endif; ?>
	</table>
	<?php echo form_submit('', lang('profile_save_btn')); ?>
	<?php echo form_close(); ?>