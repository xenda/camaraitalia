            <table class="widefat">
                <thead>
                    <tr>
                        <th><?php _e('ICanlocalize account setup', 'sitepress') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                              
                            <?php if(!$sitepress->icl_account_configured()): ?>
                            
                                <h3 id="icl_create_account_form"><?php echo __('Configure your ICanLocalize account', 'sitepress') ?></h3>             

                                <?php if(isset($_POST['icl_form_errors']) || ($icl_account_ready_errors && !$sitepress->icl_account_configured() )):  ?>
                                <div class="icl_form_errors">
                                    <?php echo $_POST['icl_form_errors'] ?>
                                    <?php if($icl_account_ready_errors):  ?>
                                    <?php echo __('Before you create an ICanLocalize account you need to fix these:', 'sitepress'); ?>
                                    <ul>
                                    <?php foreach($icl_account_ready_errors as $err):?>        
                                    <li><?php echo $err ?></li>    
                                    <?php endforeach ?>
                                    </ul>   
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            
                                <form id="icl_create_account" method="post" action="admin.php?page=<?php echo ICL_PLUGIN_FOLDER  ?>/menu/content-translation.php#icl_create_account_form" <?php if($_POST['icl_acct_option2']):?>style="display:none"<?php endif?>>
                                <?php wp_nonce_field('icl_create_account', 'icl_create_account_nonce') ?>    

                                <p style="line-height:1.5"><?php _e('Creating an account in ICanLocalize is free. You will only need to pay when sending posts and pages for translation.', 'sitepress'); ?></p>
                                
                                <table class="form-table icl-account-setup">
                                    <tbody>
                                    <tr class="form-field">
                                        <th scope="row"><?php echo __('First name', 'sitepress')?></th>
                                        <td><input name="user[fname]" type="text" value="<?php echo $_POST['user']['fname']?$_POST['user']['fname']:$current_user->first_name ?>" /></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row"><?php echo __('Last name', 'sitepress')?></th>
                                        <td><input name="user[lname]" type="text" value="<?php echo  $_POST['user']['lname']?$_POST['user']['lname']:$current_user->last_name ?>" /></td>
                                    </tr>        
                                    <tr class="form-field">
                                        <th scope="row"><?php echo __('Email', 'sitepress')?></th>
                                        <td><input name="user[email]" type="text" value="<?php echo  $_POST['user']['email']?$_POST['user']['email']:$current_user->data->user_email ?>" /></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php if(!$sitepress_settings['content_translation_setup_complete']): ?>        
                                    <p class="submit">                                        
                                        <a href="javascript:;" onclick="jQuery('#icl_create_account').hide();jQuery('#icl_configure_account').fadeIn();"><?php echo __('I already have an account at ICanLocalize', 'sitepress') ?></a>
                                        <div style="text-align:right">
                                            <?php //Hidden button for catching "Enter" key ?>                                            
                                            <input id="icl_content_trans_setup_finish_enter" class="button-primary" name="icl_content_trans_setup_finish_enter" value="<?php echo __('Add project to my account and finish', 'sitepress') ?>" type="submit" style="display:none"/>

                                            <input class="button" name="icl_content_trans_setup_cancel" value="<?php echo __('Cancel', 'sitepress') ?>" type="button" />
                                            <input id="icl_content_trans_setup_back_2" class="button-primary" name="icl_content_trans_setup_back_2" value="<?php echo __('Back', 'sitepress') ?>" type="submit" />
                                            <input id="icl_content_trans_setup_finish" class="button-primary" name="icl_content_trans_setup_finish" value="<?php echo __('Create account and Finish', 'sitepress') ?>" type="submit" />
                                        </div>
                                    </p>
                                    <div class="icl_progress"><?php _e('Saving. Please wait...', 'sitepress'); ?></div>
                                <?php else: ?>
                                    <p class="submit">
                                        <input type="hidden" name="create_account" value="1" />
                                        <input class="button" name="create account" value="<?php echo __('Create account', 'sitepress') ?>" type="submit" 
                                            <?php if($icl_account_ready_errors):  ?>disabled="disabled"<?php endif; ?> />
                                        <a href="javascript:;" onclick="jQuery('#icl_create_account').hide();jQuery('#icl_configure_account').fadeIn();"><?php echo __('I already have an account at ICanLocalize', 'sitepress') ?></a>                                        
                                    </p>
                                    <div class="icl_progress"><?php _e('Saving. Please wait...', 'sitepress'); ?></div>
                                <?php endif; ?>
                                </form> 
                
                                <form id="icl_configure_account" action="admin.php?page=<?php echo ICL_PLUGIN_FOLDER  ?>/menu/content-translation.php#icl_create_account_form" method="post" <?php if(!$_POST['icl_acct_option2']):?>style="display:none"<?php endif?>>
                                <?php wp_nonce_field('icl_configure_account','icl_configure_account_nonce') ?>    
                                <table class="form-table icl-account-setup">
                                    <tbody>
                                    <tr class="form-field">
                                        <th scope="row"><?php echo __('Email', 'sitepress')?></th>
                                        <td><input name="user[email]" type="text" value="<?php echo  $_POST['user']['email']?$_POST['user']['email']:$current_user->data->user_email ?>" /></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row"><?php echo __('Password', 'sitepress')?></th>
                                        <td><input name="user[password]" type="password" /></td>
                                    </tr>        
                                    </tbody>
                                </table>
                                <?php if(!$sitepress_settings['content_translation_setup_complete']): ?>        
                                    <p class="submit">                                        
                                        <a href="javascript:;" onclick="jQuery('#icl_configure_account').hide();jQuery('#icl_create_account').fadeIn();"><?php echo __('Create a new ICanLocalize account', 'sitepress') ?></a>                                        
                                        <div style="text-align:right">
                                            <?php //Hidden button for catching "Enter" key ?>
                                            <input id="icl_content_trans_setup_finish_enter" class="button-primary" name="icl_content_trans_setup_finish_enter" value="<?php echo __('Add project to my account and finish', 'sitepress') ?>" type="submit" style="display:none"/>
                                            
                                            <input class="button" name="icl_content_trans_setup_cancel" value="<?php echo __('Cancel', 'sitepress') ?>" type="button" />
                                            <input id="icl_content_trans_setup_back_2" class="button-primary" name="icl_content_trans_setup_back_2" value="<?php echo __('Back', 'sitepress') ?>" type="submit" />
                                            <input id="icl_content_trans_setup_finish" class="button-primary" name="icl_content_trans_setup_finish" value="<?php echo __('Add project to my account and finish', 'sitepress') ?>" type="submit" />
                                        </div>
                                    </p>
                                    <div class="icl_progress"><?php _e('Saving. Please wait...', 'sitepress'); ?></div>                                        
                                <?php else: ?>
                                    <p class="submit">                                        
                                        <input type="hidden" name="create_account" value="0" />                                        
                                        <input class="button" name="configure account" value="<?php echo __('Add this project to my account', 'sitepress') ?>" type="submit" 
                                            <?php if($icl_account_ready_errors):  ?>disabled="disabled"<?php endif; ?> />
                                        <a href="javascript:;" onclick="jQuery('#icl_configure_account').hide();jQuery('#icl_create_account').fadeIn();"><?php echo __('Create a new ICanLocalize account', 'sitepress') ?></a>                                        
                                    </p>                                    
                                    <div class="icl_progress"><?php _e('Saving. Please wait...', 'sitepress'); ?></div>
                                <?php endif; ?>
                                </form>    
                                
                            <?php else: // if account configured ?>   

                                <form id="icl_create_account" method="post" action="admin.php?page=<?php echo ICL_PLUGIN_FOLDER  ?>/menu/content-translation.php#icl_create_account_form" <?php if($_POST['icl_acct_option2']):?>style="display:none"<?php endif?>>
                                <?php wp_nonce_field('icl_view_website_access_data','icl_view_website_access_data_nonce') ?>    
                                <p class="submit">                                    
                                    <?php echo __('Your ICanLocalize account is configured.', 'sitepress')?>
                                    <a href="javascript:;" onclick="jQuery('#icl_create_account').hide();jQuery('#icl_configure_account').fadeIn();"><?php echo __('Show access settings &raquo;', 'sitepress') ?></a>
                                </p>
                                </form> 
                
                                <form id="icl_configure_account" action="admin.php?page=<?php echo ICL_PLUGIN_FOLDER  ?>/menu/content-translation.php#icl_create_account_form" method="post" <?php if(!$_POST['icl_acct_option2']):?>style="display:none"<?php endif?>>
                                <?php wp_nonce_field('icl_change_website_access_data','icl_change_website_access_data_nonce') ?>
                                <?php echo __('Your ICanLocalize account access settings:', 'sitepress')?>
                                <table class="form-table icl-account-setup">
                                    <tbody>
                                    <tr class="form-field">
                                        <th scope="row"><?php echo __('Website ID', 'sitepress') ?></th>
                                        <td><input name="access[website_id]" type="text" value="<?php echo  $_POST['access']['website_id']?$_POST['access']['website_id']:$sitepress_settings['site_id'] ?>" /></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row"><?php echo __('Access key', 'sitepress') ?></th>
                                        <td><input name="access[access_key]" type="text" value="<?php echo  $_POST['access']['access_key']?$_POST['access']['access_key']:$sitepress_settings['access_key'] ?>"/></td>
                                    </tr>        
                                    </tbody>
                                </table>
                                <p class="submit">                                         
                                    <input type="hidden" name="create_account" value="0" />
                                    <input class="button" name="configure account" value="<?php echo __('Save', 'sitepress') ?>" type="submit" 
                                        <?php if($icl_account_ready_errors):  ?>disabled="disabled"<?php endif; ?> />
                                    <a href="javascript:;" onclick="jQuery('#icl_configure_account').hide();jQuery('#icl_create_account').fadeIn();"><?php echo __('These access settings are OK.', 'sitepress') ?></a>
                                </p>
                                </form>    
                
                                
                            <?php endif; ?>
         
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <?php if($sitepress->icl_account_configured() ): ?>
             <p class="alignright">   
             <input type="button" class="icl_account_setup_toggle button-primary" value="<?php _e('Close', 'sitepress')?>" />   
             </p>
             
            <?php if($sitepress_settings['content_translation_setup_complete']): ?>
                <p><input id="icl_disable_content_translation" type="button" class="button-secondary" 
                    value="<?php echo __('Disable professional translation','sitepress') ?>" /></p>
            <?php endif; ?>        

             <div class="clear"></div>
                          
             <?php endif; ?>
             
