function copyUrl(vueController, params, event) {
    let element = $("[name='" + params.fieldname + "']");
    let temp = $("<input>");
    $("body").append(temp);
    temp.val(element.val()).select();
    document.execCommand("copy");
    temp.remove();
    vueController.addAlert('success', params.copyTextMessage);
}