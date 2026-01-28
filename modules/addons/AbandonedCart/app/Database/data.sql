INSERT INTO `tblemailtemplates`
(`type`,
 `name`,
 `subject`,
 `message`,
 `attachments`,
 `fromname`,
 `fromemail`,
 `disabled`,
 `custom`,
 `language`,
 `copyto`,
 `blind_copy_to`,
 `plaintext`)
SELECT 'general',
       'Abandoned Cart - Logged In Client Notification',
       'Abandoned cart reminder!',
       '<p>Dear {$client_name},</p>
<p>Thank you for visiting our marketplace!</p>
<p>We have noticed that you have added some items to your cart, but the transaction has not been completed for some reason.</p>
<p>Items in your cart:</p>
<p>{if isset($products)} Products: {foreach key=num item=product from=$products} <br/>- {$product.name} {/foreach} {/if}</p>
<p>{if isset($addons)} Addons: {foreach key=num item=addon from=$addons} <br/>- {$addon.name} {/foreach}{/if}</p>
<p>{if isset($domains)} Domains: {foreach key=num item=domain from=$domains} <br/>- {$domain} {/foreach} {/if}</p>
<p>In case you still have any doubts, please do not hesitate and just ask a question. We are here to help you make the right decision and complete the order.</p>
<p>Continue your shopping here: {if isset($cart_url)}<a href="{$cart_url}">{$cart_url}</a>{else}<a href="{$whmcs_url}">{$whmcs_url}</a>{/if}</p>
<p>Regards,</p>
<p>{$signature}</p>
<p>{if isset($email_unsubscribe_url)}If you no longer wish to receive similar emails, simply <a href="{$email_unsubscribe_url}">click here</a> to unsubscribe.</p>{/if}',
       '',
       '',
       '',
       '0',
       '1',
       '',
       '',
       '',
       '0'
FROM DUAL
WHERE NOT EXISTS(SELECT *
                 FROM `tblemailtemplates`
                 WHERE `name` = 'Abandoned Cart - Logged In Client Notification' LIMIT 1);

INSERT INTO `tblemailtemplates`
(`type`,
 `name`,
 `subject`,
 `message`,
 `attachments`,
 `fromname`,
 `fromemail`,
 `disabled`,
 `custom`,
 `language`,
 `copyto`,
 `blind_copy_to`,
 `plaintext`)
SELECT 'support',
       'Abandoned Cart - Open Ticket for Guest',
       'Abandoned cart reminder!',
       '<p>Dear Customer,</p>
<p>Thank you for visiting our marketplace!</p>
<p>We have noticed that you have added some items to your cart, but the transaction has not been completed for some reason.</p>
<p>Items in your cart:</p>
<p>{if isset($products)} Products: {foreach key=num item=product from=$products} <br/>- {$product.name} {/foreach} {/if}</p>
<p>{if isset($addons)} Addons: {foreach key=num item=addon from=$addons} <br/>- {$addon.name} {/foreach}{/if}</p>
<p>{if isset($domains)} Domains: {foreach key=num item=domain from=$domains} <br/>- {$domain} {/foreach} {/if}</p>
<p>In case you still have any doubts, please do not hesitate and just ask a question. We are here to help you make the right decision and complete the order.</p>
<p>Create an account here <a href="{$whmcs_url}/register.php">{$whmcs_url}register.php</a></p>
<p>Continue your shopping here: {if isset($cart_url)}<a href="{$cart_url}">{$cart_url}</a>{else}<a href="{$whmcs_url}">{$whmcs_url}</a>{/if}</p>
<p>Regards,</p>
<p>{$signature}</p>
<p>{if isset($email_unsubscribe_url)}If you no longer wish to receive similar emails, simply <a href="{$email_unsubscribe_url}">click here</a> to unsubscribe.</p>{/if}',
       '',
       '',
       '',
       '0',
       '1',
       '',
       '',
       '',
       '0'
FROM DUAL
WHERE NOT EXISTS(SELECT *
                 FROM `tblemailtemplates`
                 WHERE `name` = 'Abandoned Cart - Open Ticket for Guest' LIMIT 1)
