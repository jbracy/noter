<div class="pyro-widget-image">
<?php if (strlen($options['link']) > 0): ?>
  <a target="<?php echo $options['link_target']; ?>" href="<?php echo $options['link']; ?>"><img src="{{ files:image_url id="<?php echo $options['image_id']; ?>" }}" /></a>
<?php else: ?>
  <img src="{{ files:image_url id="<?php echo $options['image_id']; ?>" }}" />
<?php endif; ?>
</div>