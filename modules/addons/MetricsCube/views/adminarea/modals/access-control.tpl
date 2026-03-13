<div class="lu-modal lu-modal--lg lu-modal--access" id="access-control">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content">
            <div class="lu-modal__top lu-top">
                <h2 class="lu-top__title lu-h4">Edit Permissions Per Admin Role</h2>
                <div class="lu-top__toolbar">
                    <button class="lu-close lu-btn lu-btn--sm lu-btn--icon lu-btn--link" data-dismiss="lu-modal"
                            aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>


            <div class="lu-modal__body" id="accordion">
                <div class="lu-modal__desc">
                    <span>
                        Role and Permissions
                    </span>
                    <span>
                        Full Access
                    </span>
                </div>

                {foreach from=$permissions item=permission}
                    <div class="collapse-card">
                        <span class="collapse-card__title">
                            {$permission['role_name']}
                        </span>
                        <div class="collapse-card__body" data-collapse-body>
                            <div class="collapse-card__header" >
                                <span class="collapse-card__wrapper collapsed" data-main-collapse data-toggle="collapse" data-target="#permissionsRole-{$permission['role_id']}" aria-expanded="false" aria-controls="permissionsRole-{$permission['role_id']}">
                                    <svg class="chevron chevron__main" width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                        <path d="M4 6.6665L8 10.6665L12 6.6665" stroke="white" stroke-width="1.3" stroke-linecap="round"></path>
                                    </svg>
                                    <span class="collapse-card__subtitle">
                                        Permissions:
                                        <span class="collapse-card__list" data-permissions-list></span>
                                    </span>
                                </span>
                                <div class="collapse-card__switch">
                                    <label class="switch" data-acl-switch>
                                        <input type="hidden" name="permissionsRole-{$permission['role_id']}" value="0"/>
                                        <input type="checkbox" name="permissionsRole-{$permission['role_id']}" value="1" />
                                        <span class="switch__container">
                                            <span class="switch__on">
                                                On
                                            </span>
                                            <span class="switch__handle"></span>
                                            <span class="switch__off">
                                                Off
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <form name='acl-settings'>
                                <div id="permissionsRole-{$permission['role_id']}" class="collapse-container collapse" data-collapse-container aria-labelledby="permissionsRole-{$permission['role_id']}"
                                data-parent="#accordion">
                                    <div class="collapse-card__collapse">
                                        {foreach from=$permission['actions'] item=action}
                                            <ul class="dropdown-menu__items dropdown-menu__items--acl">
                                                <li class="dropdown-menu__item dropdown-menu__item--checkbox" data-action-container>
                                                    <div class="d-flex">
                                                        {if count($action['actions'])>0}
                                                            <svg class="chevron collapsed" width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" data-toggle="collapse" data-target="#permissionOption-{$permission['role_id']}-{$action['action_id']}" aria-expanded="true" aria-controls="permissionOption-{$permission['role_id']}-{$permission['action_id']}">
                                                                <path d="M4 6.6665L8 10.6665L12 6.6665" stroke="white" stroke-width="1.3" stroke-linecap="round"></path>
                                                            </svg>
                                                        {/if}
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="permissions[{$permission['role_id']}][{$action['action_id']}]" {if $action['action_allowed']}checked{/if} data-action>
                                                            <span class="checkbox__indicator"></span>
                                                            <span class="checkbox__text" data-checkbox-text>{$action['action_name']}</span>
                                                        </label>
                                                    </div>

                                                    {* {$action['action_name']}
                                                    <input type="checkbox" {if $action['action_allowed']}checked{/if}
                                                            name="permissions[{$permission['role_id']}][{$action['action_id']}]"
                                                            value="1"> *}
                                                    {if count($action['actions'])>0}
                                                        <ul class="dropdown-menu__items collapse" id="permissionOption-{$permission['role_id']}-{$action['action_id']}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                            {foreach from=$action['actions'] item=subaction}
                                                                    <li class="dropdown-menu__item dropdown-menu__item--checkbox dropdown-menu__item--subaction" >
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="permissions[{$permission['role_id']}][{$subaction['action_id']}]" {if $subaction['action_allowed']}checked{/if} data-subaction>
                                                                            <span class="checkbox__indicator"></span>
                                                                            <span class="checkbox__text" data-checkbox-text>{$subaction['action_name']}</span>
                                                                        </label>
                                                                        {* {$subaction['action_name']}
                                                                        <input type="checkbox"
                                                                                {if $subaction['action_allowed']}checked{/if}
                                                                                name="permissions[{$permission['role_id']}][{$subaction['action_id']}]"
                                                                                value="1"> *}
                                                                    </li>
                                                            {/foreach}
                                                        </ul>
                                                    {/if}
                                                </li>
                                            </ul>
                                        {/foreach}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="lu-modal__actions">
                <button class="lu-btn lu-btn--secondary" type="button" name="saveACL"
                        aria-label="Save Changes">
                    <span class="lu-btn__text">Save Changes</span>
                </button>
                <button class="lu-btn lu-btn--secondary lu-btn--outline" type="button" data-dismiss="lu-modal"
                        aria-label="Close">
                    <span class="lu-btn__text">Cancel</span>
                </button>
            </div>
        </div>
    </div>
</div>