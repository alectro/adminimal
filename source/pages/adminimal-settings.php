<div class="wrap">

  <h1><?php _e('Adminimal settings', 'adminimal') ?></h1>
    <h2><?php _e('WordPress Toolbar', 'adminimal'); ?></h2>
    <p><?php _e('Do you also want to show WordPress Toolbar when viewing the site?', 'adminimal'); ?><br />
    <small><?php _e('Choosing \'Show\' will show both, adminimal toolbar and WordPress Toolbar.', 'adminimal'); ?></small></p>


  <form method="post" action="options.php">
  <?php settings_fields( 'adminimal-settings-group' ); ?>
  <?php do_settings_sections( 'adminimal-settings-group' ); ?>

  <?php
  if (esc_attr( get_option('adm_hideshow') ) == 0) {
      $checkHide = ' checked';
      $checkShow = '';
  } elseif (esc_attr( get_option('adm_hideshow') ) == 1) {
      $checkHide = '';
      $checkShow = ' checked';
  } else {
      $checkHide = ' checked';
      $checkShow = '';
  }
  ?>

  <fieldset>
    <div class="form-field">
      <label>
        <input type="radio" id="toolbar-hide" name="adm_hideshow" value="0"<?php echo $checkHide; ?>>
        <span><?php _e('Hide', 'adminimal'); ?></span>
      </label>
    </div>

    <div class="form-field">
      <label>
        <input type="radio" id="toolbar-show" name="adm_hideshow" value="1"<?php echo $checkShow; ?>>
        <span><?php _e('Show', 'adminimal'); ?></span>
      </label>
    </div>
  </fieldset>

  <div class="submit">
    <?php submit_button('', 'primary', esc_attr( get_option('adm_hideshow') ), '' ); ?>

  </div>
</form>


</div>
