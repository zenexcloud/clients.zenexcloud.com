{**********************************************************************
* DNSManager3 product developed. (2017-08-24)
* *
*
*  CREATED BY MODULESGARDEN       ->       http://modulesgarden.com
*  CONTACT                        ->       contact@modulesgarden.com
*
*
* This software is furnished under a license and may be used and copied
* only  in  accordance  with  the  terms  of such  license and with the
* inclusion of the above copyright notice.  This software  or any other
* copies thereof may not be provided or otherwise made available to any
* other person.  No title to and  ownership of the  software is  hereby
* transferred.
*
*
**********************************************************************}

{**
* @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
*}

<div id="{$mainContainer->getVueInstanceName()}" class="vue-app-main-container">
    <div class="lu-row"><i v-show="pageLoading" class="page_processing"></i></div>
    {if $errorFlashBag->peek('error')}
        <div class="lu-widget lu-error-container">
            <div class="lu-alert lu-alert--danger lu-alert--sm  lu-alert--faded lu-alert-full">
            <span class="lu-w-100 lu-d-flex lu-justify-content-between">
                <h2 class="lu-w-75">{$MGLANG->abtr('addonCA','error_while_making_request')}</h2>
                <i class="lu-zmdi lu-zmdi-alert-circle" style="font-size: 60px; width: 60px;"></i>
            </span>
                <div class="lu-alert__body" style="font-size: 17px">
                    <ul>
                        {foreach from=$errorFlashBag->get('error') item=message }
                            <li>{$message}</li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    {/if}
    {foreach from=$elements key=nameElement item=dataElement}
        {$dataElement->getHtml()}
    {/foreach}

    <div id="allDropDown"></div>
    <div class="lu-preloader-container lu-preloader-container--full-screen lu-preloader-container--overlay"
         v-show="pagePreLoader">
        <div class="lu-preloader lu-preloader--lg"></div>
    </div>
</div>

<div id="{$mainContainer->getVueInstanceName()}_modal" class="vue-app-main-modal-container"></div>

<div id="loadedTemplates"></div>
