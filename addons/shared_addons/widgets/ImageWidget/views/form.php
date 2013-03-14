<ul>
  <li>
    <label>Image</label>
    <?php echo form_dropdown('image_id', $image_select, $options['image_id']); ?>
  </li>
  <li>
    <label>Link</label>
    <?php echo form_input('link', $options['link']); ?>
  </li>
  <li>
    <label>Link Target</label>
    <?php echo form_dropdown('link_target', $link_select, $options['link_target']); ?>
  </li>
</ul>