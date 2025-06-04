<section class="contact-wrp">
    <div class="container">
        {if $sent}
            {include file="$template/includes/alert.tpl" type="success" msg="{lang key='contactsent'}" textcenter=true}
        {/if}
        {if $errormessage}
            {include file="$template/includes/alert.tpl" type="error" errorshtml=$errormessage}
        {/if}
        <div class="titlebar">
            <h2>{$LANG.title_contact}</h2>
            <p>{$LANG.titleDes_contact}</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="cnt-infbx">
                    <div class="cnt-lf-dt">
                        <h3>{$LANG.phoneNumber_contact}</h3>
                        <p>{$LANG.phoneNumberDes_contact}</p>
                    </div>
                    <div class="cnt-icbx">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="cnt-infbx">
                    <div class="cnt-lf-dt">
                        <h3>{$LANG.email_contact}</h3>
                        <p>{$LANG.emailDes_contact}</p>
                    </div>
                    <div class="cnt-icbx">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="cnt-infbx">
                    <div class="cnt-lf-dt">
                        <h3>{$LANG.addressOffice_contact}</h3>
                        <p>{$LANG.addressOfficeDes_contact}</p>
                    </div>
                    <div class="cnt-icbx">
                        <i class="fas fa-location-arrow"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group">
            <a href="{$WEB_ROOT}/submitticket.php" class="btn-main">{$LANG.salesTicket_contact}</a>
            <a href="#" class="btn-main live-btn">{$LANG.liveChat_contact}</a>
        </div>
        <div class="cnt-frm-block">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="cnt-img">
                        <img src="{$WEB_ROOT}/templates/{$template}/images/contact-img.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="cnt-frm">
                        <h3>{$LANG.submitYourInquiry_contact}</h3>
                        {if !$sent}
                            <form method="post" action="contact.php" role="form">
                                <input type="hidden" name="action" value="send" />
                                <div class="form-group">
                                    <input type="text"  name="name" value="{$name}" id="inputEmail" placeholder="{lang key='supportticketsclientname'}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="{$email}" name="" placeholder="{lang key='supportticketsclientemail'}" class="form-control" id="inputEmail">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" value="{$subject}" placeholder="{lang key='supportticketsticketsubject'}" id="inputSubject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="{lang key='contactmessage'}" rows="3" id="inputMessage">{$message}</textarea>
                                </div>
                                {if $captcha}
                                    <div class="text-center margin-bottom">
                                        {include file="$template/includes/captcha.tpl"}
                                    </div>
                                {/if}
                                <button type="submit" class="btn-main {$captcha->getButtonClass($captchaForm)}">{lang key='contactsend'}</button>
                            </form>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>