{if $loggedin && $innerTemplate}
    {include file="$template/includes/alert.tpl" type="error" msg="{lang key='noPasswordResetWhenLoggedIn'}" textcenter=true}
{else}
    {if $successMessage}
    <section class="password-wrapper-forgot">
        <div class="row justify-content-center">
            <div class="card mw-540 mb-4 mt-4">
                <div class="card-body px-md-5 py-5">
                    {include file="$template/includes/alert.tpl" type="success" msg=$successTitle textcenter=true}
                    <p>{$successMessage}</p>
                </div>
            </div>
        </div>
    </section>
    {else}
        {if $innerTemplate}
            {include file="$template/password-reset-$innerTemplate.tpl"}
        {/if}
    {/if}
{/if}