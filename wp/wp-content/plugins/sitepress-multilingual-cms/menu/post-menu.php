<?php $this->noscript_notice() ?>
<p style="float:left;">
<?php echo __('Language of this post', 'sitepress') ?>&nbsp;
<select name="icl_post_language" id="icl_post_language">
<?php foreach($active_languages as $lang):?>
<?php if(isset($translations[$lang['code']]->element_id) && $translations[$lang['code']]->element_id != $post->ID) continue ?>
<option value="<?php echo $lang['code'] ?>" <?php if($selected_language==$lang['code']): ?>selected="selected"<?php endif;?>><?php echo $lang['display_name'] ?>&nbsp;</option>
<?php endforeach; ?>
</select> 

<input type="hidden" name="icl_trid" value="<?php echo $trid ?>" />

<input type="hidden" name="icl_is_page" value="<?php echo $is_page ?>" />

</p>

<div id="translation_of_wrap">
    <?php if($selected_language != $default_language || (isset($_GET['lang']) && $_GET['lang']!=$default_language)): ?>
        <div style="clear:both;font-size:1px">&nbsp;</div>
        
        <p style="float:left;">
        <?php echo __('This is a translation of', 'sitepress') ?>&nbsp;
        <select name="icl_translation_of" id="icl_translation_of"<?php if($_GET['action'] != 'edit' && $trid) echo " disabled"?>>
            <?php if($source_language == null || $source_language == $default_language): ?>
                <?php if($trid): ?>
                    <option value="none"><?php echo __('--None--', 'sitepress') ?></option>
                    <?php
                        //get source
                        $src_language_id = $wpdb->get_var("SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE trid={$trid} AND language_code='{$default_language}'");
                        if(!$src_language_id) {
                            // select the first id found for this trid
                            $src_language_id = $wpdb->get_var("SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE trid={$trid}");
                        }
                        if($src_language_id && $src_language_id != $post->ID) {
                            $src_language_title = $wpdb->get_var("SELECT post_title FROM {$wpdb->prefix}posts WHERE ID = {$src_language_id}");
                        }
                    ?>
                    <?php if($src_language_title && !isset($_GET['icl_ajx'])): ?>
                        <option value="<?php echo $src_language_id ?>" selected="selected"><?php echo $src_language_title ?>&nbsp;</option>
                    <?php endif; ?>
                <?php else: ?>
                    <option value="none" selected="selected"><?php echo __('--None--', 'sitepress') ?></option>
                <?php endif; ?>
                <?php foreach($untranslated as $translation_of_id => $translation_of_title):?>
                    <?php if ($translation_of_id != $src_language_id): ?>
                        <option value="<?php echo $translation_of_id ?>"><?php echo $translation_of_title ?>&nbsp;</option>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <?php if($trid): ?>
                    <?php
                        // add the source language
                        $src_language_id = $wpdb->get_var("SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE trid={$trid} AND language_code='{$source_language}'");
                        if($src_language_id) {
                            $src_language_title = $wpdb->get_var("SELECT post_title FROM {$wpdb->prefix}posts WHERE ID = {$src_language_id}");
                        }
                    ?>
                    <?php if($src_language_title): ?>
                        <option value="<?php echo $src_language_id ?>" selected="selected"><?php echo $src_language_title ?></option>
                    <?php endif; ?>
                <?php else: ?>
                    <option value="none" selected="selected"><?php echo __('--None--', 'sitepress') ?></option>
                <?php endif; ?>
            <?php endif; ?>
        </select>

        </p>
    <?php endif; ?>
</div><!--//translation_of_wrap-->

<div style="clear:both;font-size:1px">&nbsp;</div>
       
<?php 
    $translations_count = count($translations) - 1;
    $language_count = count($active_languages) - 1;        
    
    if($post->ID && !$this->get_icl_translation_enabled() && !$this->settings['dismiss_page_estimate_hint'] && $post->post_type == 'page'
        && $language_count - $translations_count > 0){
        $estimate = ICL_PRO_TRANSLATION_COST_PER_WORD * count(explode(' ', strip_tags($post->post_content)));
        ?><p class="icl_sidebar" style="width:auto;"><img align="baseline" 
            src="<?php echo ICL_PLUGIN_URL ?>/res/img/icon16.png" width="16" height="16" style="margin-bottom:-4px" />&nbsp;<?php 
            printf(__('This page can be professionally translated for %s USD.<br /><a href="%s">Learn more</a> <a %s>dismiss</a>','sitepress'),
            $estimate, 'admin.php?page='.basename(ICL_PLUGIN_PATH).'/menu/content-translation.php', 'id="icl_dismiss_page_estimate_hint" href="#"')?></p><?php
    }
    do_action('icl_post_languages_options_before', $post->ID);
?>

<?php if($_GET['action'] == 'edit' && $trid): ?>
    <div id="icl_translate_options">
    <?php if($this->get_icl_translation_enabled() && current_user_can('manage_options')):?>
        <p class="icl_cyan_box"><img align="baseline" 
            src="<?php echo ICL_PLUGIN_URL ?>/res/img/icon16.png" width="16" height="16" style="margin-bottom:-4px" />&nbsp;
        <a href="admin.php?page=<?php echo basename(ICL_PLUGIN_PATH); ?>/menu/content-translation.php&post_id=<?php echo $post->ID ?><?php if($this->get_current_language() != $this->get_default_language()) echo '&amp;lang=' . $this->get_current_language(); ?>"><?php _e('Translate by ICanLocalize')?></a></p>
    <?php endif; ?>

    <?php
        // count number of translated and un-translated pages.
        $translations_found = 0;
        $untranslated_found = 0;
        foreach($active_languages as $lang) {
            if($selected_language==$lang['code']) continue;
            if(isset($translations[$lang['code']]->element_id)) {
                $translations_found += 1;
            } else {
                $untranslated_found += 1;
            }
        }
    ?>
    
    <?php if($untranslated_found > 0): ?>    
        <?php if($this->get_icl_translation_enabled()):?>
            <p style="clear:both;"><b><?php _e('or, translate manually:', 'sitepress'); ?> </b>
        <?php else: ?>
            <p style="clear:both;"><b><?php _e('Translate', 'sitepress'); ?></b>
        <?php endif; ?>
        <table>
        <?php foreach($active_languages as $lang): if($selected_language==$lang['code']) continue; ?>
        <tr>
            <?php if(!isset($translations[$lang['code']]->element_id)):?>
                <td><?php echo $lang['display_name'] ?></td>
                <?php
                    $add_link = get_option('siteurl') . "/wp-admin/" . $post->post_type . "-new.php?trid=" . $trid . "&lang=" . $lang['code'] . "&source_lang=" . $selected_language;
                ?>
                <td><a href="<?php echo $add_link?>"><?php echo __('add','sitepress') ?></a></td>
            <?php endif; ?>        
        </tr>
        <?php endforeach; ?>
        </table>
        </p>
    <?php endif; ?>
    <?php if($translations_found > 0): ?>    
        <p style="clear:both;">
            <b><?php _e('Translations', 'sitepress') ?></b> 
            (<a class="icl_toggle_show_translations" href="#" <?php if(!$this->settings['show_translations_flag']):?>style="display:none;"<?php endif;?>><?php _e('hide','sitepress')?></a><a class="icl_toggle_show_translations" href="#" <?php if($this->settings['show_translations_flag']):?>style="display:none;"<?php endif;?>><?php _e('show','sitepress')?></a>)                
        <table width="97%" cellspacing="1" id="icl_translations_table" <?php if(!$this->settings['show_translations_flag']):?>style="display:none;"<?php endif;?>>        
        <?php foreach($active_languages as $lang): if($selected_language==$lang['code']) continue; ?>
        <tr>
            <?php if(isset($translations[$lang['code']]->element_id)):?>
                <td><?php echo $lang['display_name'] ?></td>
                <td align="right" width="20%"><?php echo isset($translations[$lang['code']]->post_title)?'<a href="'.get_edit_post_link($translations[$lang['code']]->element_id).'" title="'.__('Edit','sitepress').'">'.apply_filters('the_title', __('edit','sitepress')).'</a>':__('n/a','sitepress') ?></td>
                
            <?php endif; ?>        
        </tr>
        <?php endforeach; ?>
        </table>
        
        <?php if($this->get_icl_translation_enabled()):?>
            <p style="clear:both;"><b><?php echo __('ICanlocalize translation status:', 'sitepress') ?></b> (<a href="javascript:;" 
            onclick="jQuery('#icl_translations_status').toggle();jQuery('#noupdate_but').toggle();if(jQuery(this).html()=='<?php echo __('hide','sitepress')?>') jQuery(this).html('<?php echo __('show','sitepress')?>'); else jQuery(this).html('<?php echo __('hide','sitepress')?>')"><?php echo __('show','sitepress')?></a>)</p>

            <?php icl_display_post_translation_status($post->ID, &$post_translation_statuses, true); ?>
            <table width="100%" id="icl_translations_status" style="display:none;">
            
            <?php foreach($active_languages as $lang): if($selected_language==$lang['code']) continue; ?>
            <tr>
                <?php if(isset($translations[$lang['code']]->element_id)):?>
                    <td><?php echo $lang['display_name'] ?></td>
                    <td class="icl_translation_status_msg">
                    <?php echo isset($post_translation_statuses[$lang['code']]) ? $post_translation_statuses[$lang['code']] : __('Not translated','sitepress'); ?>
                    </td>
                    
                <?php endif; ?>        
            </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
        
        
        
    <?php endif; ?>
    
    <br clear="all" style="line-height:1px;" />
    </div>
<?php endif; ?>

<?php if($this->get_icl_translation_enabled() 
        && !$wpdb->get_var("SELECT source_language_code FROM {$wpdb->prefix}icl_translations WHERE element_type='post' AND element_id={$post->ID}") 
        && !isset($_GET['source_lang'])):?>
<?php 
    $note = trim(get_post_meta($post->ID, '_icl_translator_note', true));
?>
<div id="icl_post_add_notes">
    <h4><a href="#"><?php _e('Note for the translators', 'sitepress')?></a></h4>
    <div id="icl_post_note">
        <textarea name="icl_tn_note" rows="5"><?php echo $note ?></textarea> 
        <table width="100%"><tr>
        <td><input id="icl_tn_clear" type="button" class="button" value="<?php _e('Clear', 'sitepress')?>" <?php if(!$note): ?>disabled="disabled"<?php endif; ?> /></td>            <td align="right"><input id="icl_tn_save"  type="button" class="button-primary" value="<?php _e('Close', 'sitepress')?>" /></td>
        </tr></table>
        <input id="icl_tn_cancel_confirm" type="hidden" value="<?php _e('Your changes to the note for the translators are not saved.', 'sitepress') ?>" />
    </div>
    <div id="icl_tn_not_saved"><?php _e('Note not saved yet', 'sitepress'); ?></div>
</div>    
<?php endif; ?>

<?php do_action('icl_post_languages_options_after') ?>