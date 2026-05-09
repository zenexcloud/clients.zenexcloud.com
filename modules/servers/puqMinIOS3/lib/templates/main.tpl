<div class="row">

    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-hdd"></span> Disk Settings</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Disk space size</label>
                    <input type="number"
                           name="packageconfigoption[24][disk_space_size]"
                           class="form-control"
                           value="{$package_options.disk_space_size|default:''}"
                           min="0">
                    <span class="help-block">Allocated disk space for MinIO in selected unit</span>
                </div>
                <div class="form-group">
                    <label>Unit</label>
                    <select name="packageconfigoption[24][unit]" class="form-control">
                        <option value="MB" {if $package_options.unit == 'MB'}selected{/if}>MegaByte</option>
                        <option value="GB" {if $package_options.unit == 'GB'}selected{/if}>GigaByte</option>
                        <option value="TB" {if $package_options.unit == 'TB'}selected{/if}>TeraByte</option>
                        <option value="PB" {if $package_options.unit == 'PB'}selected{/if}>PetaByte</option>
                    </select>
                    <span class="help-block">Unit of measure for disk space</span>
                </div>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-alert"></span> Disk Notifications</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Notification at %</label>
                    <input type="number"
                           name="packageconfigoption[24][notification_disk_limit_percentage]"
                           class="form-control"
                           value="{$package_options.notification_disk_limit_percentage|default:''}"
                           min="1" max="100">
                    <span class="help-block">Threshold to notify the user about low disk space</span>
                </div>
                <div class="form-group">
                    <label>Notification email template</label>
                    <select name="packageconfigoption[24][notification_disk_limit_email]" class="form-control">
                        <option value="">None</option>
                        {foreach from=$email_templates item=tpl}
                            <option value="{$tpl}"
                                    {if $tpl == $package_options.notification_disk_limit_email}selected{/if}>{$tpl}</option>
                        {/foreach}
                    </select>
                    <span class="help-block">Email template for disk limit notifications</span>
                </div>
                <div class="form-group">
                    <label>Suspension email template</label>
                    <select name="packageconfigoption[24][suspend_exceeding_template]" class="form-control">
                        <option value="">None</option>
                        {foreach from=$email_templates item=tpl}
                            <option value="{$tpl}"
                                    {if $tpl == $package_options.suspend_exceeding_template}selected{/if}>{$tpl}</option>
                        {/foreach}
                    </select>
                    <span class="help-block">Email template when disk limit is exceeded</span>
                </div>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-folder-open"></span> Default Bucket</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Create default bucket</label>
                    <select name="packageconfigoption[24][create_default_bucket]" class="form-control">
                        <option value="yes"
                                {if $package_options.create_default_bucket == 'yes'}selected{/if}>Yes
                        </option>
                        <option value="no"
                                {if $package_options.create_default_bucket == 'no'}selected{/if}>No
                        </option>
                    </select>
                    <span class="help-block">Once the user is created, a default bucket will be created</span>
                </div>
                <div class="form-group">
                    <label>Default bucket postfix</label>
                    <input type="text"
                           name="packageconfigoption[24][default_bucket_postfix]"
                           class="form-control"
                           value="{$package_options.default_bucket_postfix|default:''}">
                    <span class="help-block">Will be appended to the end of bucket name.<br>Only small letters and numbers and symbol "-"</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> User</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Username rule</label>
                    <input type="text"
                           name="packageconfigoption[24][username_rule]"
                           class="form-control"
                           value="{$package_options.username_rule|default:''}">
                    <span class="help-block">
                        Username template using macros.<br><br>

                        <strong>Base macros:</strong><br>
                        <code>{literal}{client_id}{/literal}</code> – Client ID<br>
                        <code>{literal}{service_id}{/literal}</code> – Service ID<br><br>

                        <strong>Random macros:</strong><br>
                        <code>{literal}{random_digit_x}{/literal}</code> – Random digits, where <code>x</code> is length <br>(example: <code>{literal}{random_digit_4}{/literal}</code>)<br>
                        <code>{literal}{random_letter_x}{/literal}</code> – Random letters (A–Z, a–z), where <code>x</code> is length <br>(example: <code>{literal}{random_letter_6}{/literal}</code>)<br><br>

                        <strong>Date & time macros:</strong><br>
                        <code>{literal}{unixtime}{/literal}</code>,
                        <code>{literal}{year}{/literal}</code>,
                        <code>{literal}{month}{/literal}</code>,
                        <code>{literal}{day}{/literal}</code>,
                        <code>{literal}{hour}{/literal}</code>,
                        <code>{literal}{minute}{/literal}</code>,
                        <code>{literal}{second}{/literal}</code><br><br>

                        <strong>Example:</strong><br>
                        <code>{literal}{client_id}-{service_id}-{random_digit_4}{/literal}</code>
                    </span>
                </div>

                <div class="form-group">
                    <label>Password rule</label>
                    <input type="text"
                           name="packageconfigoption[24][password_rule]"
                           class="form-control"
                           value="{$package_options.password_rule|default:''}">
                    <span class="help-block">
                        Password generation rule in format <code>length:charset</code>.<br>
                        Example:<br>
                        <code>12:1234567890</code><br>
                        This will generate a 12-character password using the provided characters.
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-time"></span> History & Group</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Save history (days)</label>
                    <input type="number"
                           name="packageconfigoption[24][save_usage_history]"
                           class="form-control"
                           value="{$package_options.save_usage_history|default:''}">
                    <span class="help-block">Number of days to keep usage statistics in WHMCS</span>
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <input type="text"
                           name="packageconfigoption[24][group]"
                           class="form-control"
                           value="{$package_options.group|default:''}">
                    <span class="help-block">Group assigned to the user in MinIO</span>
                </div>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-dashboard"></span> Client Area</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Link to instruction</label>
                    <input type="text"
                           name="packageconfigoption[24][link_to_instruction]"
                           class="form-control"
                           value="{$package_options.link_to_instruction|default:''}">
                    <span class="help-block">A link to the instruction will be reflected in the client area.</span>
                </div>
                <div class="form-group">
                    <label>Show password</label>
                    <select name="packageconfigoption[24][show_password]" class="form-control">
                        <option value="show_button" {if $package_options.show_password == 'show_button'}selected{/if}>
                            Show button
                        </option>
                        <option value="plain_text" {if $package_options.show_password == 'plain_text'}selected{/if}>
                            Plain text
                        </option>
                        <option value="no" {if $package_options.show_password == 'no'}selected{/if}>No</option>
                    </select>
                    <span class="help-block">Defines how the password is displayed in the client area</span>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-file"></span> IAM Policies</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Raw Policy</label>
                            <textarea class="form-control"
                                      name="packageconfigoption[24][raw_policy]"
                                      rows="15">{$package_options.raw_policy|default:''}</textarea>
                            <span class="help-block">&lt;USER_ID&gt; - Macro to be replaced with actual user ID</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Raw Policy (Disk Limit)</label>
                            <textarea class="form-control"
                                      name="packageconfigoption[24][raw_policy_disk_limit]"
                                      rows="15">{$package_options.raw_policy_disk_limit|default:''}</textarea>
                            <span class="help-block">Policy applied when disk limit is reached.<br>&lt;USER_ID&gt; - Macro to be replaced with actual user ID</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>