<ul id="nav" {if $cloudx_theme_settings.navigation_layout_theme eq 'top'} class="navbar-nav mr-auto top-bar-nav-active"{else}class="side-bar-nav-active"{/if}>
{foreach $navbar as $item}
    <li menuItemName="{$item->getName()}" class="d-block{if $item@first} no-collapse{/if}{if $item->hasChildren()} dropdown no-collapse{/if}{if $item->getClass()} {$item->getClass()}{/if} {if $cloudx_menu_extra_data[$item->getName()]['menu_class'] neq ''}{$cloudx_menu_extra_data[$item->getName()]['menu_class']}{/if}" id="{$item->getId()}">
        <a class="{if !isset($rightDrop) || !$rightDrop}pr-4{/if}{if $item->hasChildren()} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"{else}" href="{$item->getUri()}"{/if}{if $item->getAttribute('target')} target="{$item->getAttribute('target')}"{/if}>
            {if $item->hasIcon()}<i class="{$item->getIcon()}"></i>&nbsp;{/if}
            {$item->getLabel()}
            {if $item->hasChildren()}<i class="fal fa-angle-down"></i>{/if}
            {if $item->hasBadge()}&nbsp;<span class="badge">{$item->getBadge()}</span>{/if}
        </a>
        {if $item->hasChildren()}
            <ul class="dropdown-menu{if isset($rightDrop) && $rightDrop} dropdown-menu-right{/if}">
                {foreach $item->getChildren() as $childItem}
                    {if $childItem->getClass() && in_array($childItem->getClass(), ['dropdown-divider', 'nav-divider'])}
                        <div class="dropdown-divider"></div>
                    {else}
                        <li menuItemName="{$childItem->getName()}" class="{if $childItem->getClass()} {$childItem->getClass()}{/if} {if $cloudx_menu_extra_data[$childItem->getName()]['menu_class'] neq ''}{$cloudx_menu_extra_data[$childItem->getName()]['menu_class']}{/if}" id="{$childItem->getId()}">
                            <a href="{$childItem->getUri()}" class="dropdown-item px-2 py-0"{if $childItem->getAttribute('target')} target="{$childItem->getAttribute('target')}"{/if}>
                                {if $cloudx_menu_extra_data[$childItem->getName()]['icon'] neq '' && !isset($rightDrop) && !$rightDrop}
                                    <div class="navigation-icons-theme">
                                        {if $cloudx_menu_extra_data[$childItem->getName()]['icon_type'] eq '0'}
                                            <i class="{$cloudx_menu_extra_data[$childItem->getName()]['icon']}"></i>
                                        {elseif $cloudx_menu_extra_data[$childItem->getName()]['icon_type'] eq '1'}
                                            <img src="{$WEB_ROOT}/templates/{$template}/menu_icon/{$cloudx_menu_extra_data[$childItem->getName()]['icon']}"></i>
                                        {/if}
                                    </div>
                                {else}
                                    {if $childItem->hasIcon()}
                                        <div class="navigation-icons-theme">
                                            <i class="{$childItem->getIcon()}"></i>
                                        </div>
                                    {/if}
                                {/if}
                                <div class="navigation-label-theme">
                                    <span class="nav-bar-label">{$childItem->getLabel()}</span>
                                    {if $cloudx_menu_extra_data[$childItem->getName()]['badge'] neq '' && !isset($rightDrop) && !$rightDrop}
                                        <span class="badge">{$cloudx_menu_extra_data[$childItem->getName()]['badge']}</span>
                                    {else}
                                        {if $childItem->hasBadge()}<span class="badge">{$childItem->getBadge()}</span>{/if}
                                    {/if}
                                    {if $cloudx_menu_extra_data[$childItem->getName()]['label_short_desc'] neq '' && !isset($rightDrop) && !$rightDrop}
                                        <p class="top-menu-short-desc-theme">{$cloudx_menu_extra_data[$childItem->getName()]['label_short_desc']}</p>
                                    {/if}
                                </div>
                            </a>
                        </li>
                    {/if}
                {/foreach}
            </ul>
        {/if}
    </li>
{/foreach}
{if !isset($rightDrop) || !$rightDrop}
    <li class="d-none dropdown collapsable-dropdown">
        <a class="dropdown-toggle more-menu-nav" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {lang key='more'} <i class="fal fa-angle-down"></i>
        </a>
        <ul class="collapsable-dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenu"></ul>
    </li>
{/if}
</ul>


