{include file="adminarea/header.tpl"}
<div id="mc-container">
    <div class="lu-mc-app">
        <div class="lu-mc-app__body">
            <div class="lu-mc-app__content">
                <a class="lu-mc-app__logo lu-logo" href="#">
                    <img src="{$helper->img('logo.svg')}" alt="metrics cube">
                </a>
                <div class="lu-alert lu-alert--faded lu-alert--danger lu-alert--border-left lu-alert--sections lu-m-b-0x">{$errors}</div>
            </div>
        </div>
        {include file="adminarea/banner.tpl"}
    </div>
    {include file="adminarea/modals/id.tpl"}
    <div id="main-loader" class="lu-preloader-container is-hidden">
        <div class="lu-preloader lu-preloader--lg"></div>
    </div>
</div>
{include file="adminarea/footer.tpl"}
<script type="text/javascript" src="{$helper->script('requests.js')}"></script>
