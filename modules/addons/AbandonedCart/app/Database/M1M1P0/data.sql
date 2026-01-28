UPDATE `tblemailtemplates`
SET `message` = '<p>Dear {$client_name},</p>
<p>Thank you for visiting our marketplace!</p>
<p>We have noticed that you have added some items to your cart, but the transaction has not been completed for some reason.</p>
<p>Items in your cart:</p>
<p>{if isset($products)} Products: {foreach key=num item=product from=$products} <br/>- {$product.name} {/foreach} {/if}</p>
<p>{if isset($addons)} Addons: {foreach key=num item=addon from=$addons} <br/>- {$addon.name} {/foreach}{/if}</p>
<p>{if isset($domains)} Domains: {foreach key=num item=domain from=$domains} <br/>- {$domain} {/foreach} {/if}</p>
<p>In case you still have any doubts, please do not hesitate and just ask a question. We are here to help you make the right decision and complete the order.</p>
<p>Continue your shopping <a href="{if isset($cart_url)}{$cart_url}{else}{$whmcs_url}"{/if}">here.</a></p>
<p>Regards,</p>
<p>{$signature}</p><br>
<p>{if isset($email_unsubscribe_url)}If you no longer wish to receive similar emails, simply <a href="{$email_unsubscribe_url}">click here</a> to unsubscribe.</p>{/if}'
WHERE `name` = 'Abandoned Cart - Logged In Client Notification';

UPDATE `tblemailtemplates`
SET `message` = '<p>Dear Customer,</p>
<p>Thank you for visiting our marketplace!</p>
<p>We have noticed that you have added some items to your cart, but the transaction has not been completed for some reason.</p>
<p>Items in your cart:</p>
<p>{if isset($products)} Products: {foreach key=num item=product from=$products} <br/>- {$product.name} {/foreach} {/if}</p>
<p>{if isset($addons)} Addons: {foreach key=num item=addon from=$addons} <br/>- {$addon.name} {/foreach}{/if}</p>
<p>{if isset($domains)} Domains: {foreach key=num item=domain from=$domains} <br/>- {$domain} {/foreach} {/if}</p>
<p>In case you still have any doubts, please do not hesitate and just ask a question. We are here to help you make the right decision and complete the order.</p>
<p>Create an account here <a href="{$whmcs_url}/register.php">{$whmcs_url}register.php</a></p>
<p>Continue your shopping <a href="{if isset($cart_url)}{$cart_url}{else}{$whmcs_url}"{/if}">here.</a></p>
<p>Regards,</p>
<p>{$signature}</p><br>
<p>{if isset($email_unsubscribe_url)}If you no longer wish to receive similar emails, simply <a href="{$email_unsubscribe_url}">click here</a> to unsubscribe.</p>{/if}'
WHERE `name` = 'Abandoned Cart - Open Ticket for Guest';