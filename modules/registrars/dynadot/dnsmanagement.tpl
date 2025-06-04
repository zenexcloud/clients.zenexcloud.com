{if $saveSuccess}
    <div class="alert alert-success text-center">
        Changes Saved Successfully!
    </div>
{/if}
{if $saveError}
    <div class="alert alert-danger text-center">
        {$saveError}
    </div>
{/if}
{if $getError}
    <div class="alert alert-danger text-center">
        {$getError}
    </div>
{/if}
<div class="alert alert-info">
    Point your domain to a website by pointing to an IP Address, or forward to another site, and more.
    Changes can take several hours to propagate through the internet.
</div>
<form method="post"
      action="clientarea.php?action=domaindetails&domainid={$domainid}&modop=custom&a=DnsManagement">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Domain Record (required)</h3>
            <input type="hidden" name="submitType" value="saveDnsRecord">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Record Type</th>
                    <th>IP Address or Target Host</th>
                    <th>Extend</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody id="domainRecordBody">
                {foreach item=mainRecord from=$mainRecords}
                    <tr>
                        <td>
                            <select name="dnsRecordType[]" class="form-control" onchange="changeInput(this,false)">
                                <option value="a" {if $mainRecord['recordType']=="A"}selected="selected"{/if}>
                                    A
                                </option>
                                <option value="aaaa" {if $mainRecord['recordType']=="AAAA"}selected="selected"{/if}>
                                    AAAA
                                </option>
                                <option value="cname" {if $mainRecord['recordType']=="CNAME"}selected="selected"{/if}>
                                    CNAME
                                </option>
                                <option value="forward"
                                        {if $mainRecord['recordType']=="Forward"}selected="selected"{/if}>
                                    Forward
                                </option>
                                <option value="txt" {if $mainRecord['recordType']=="TXT"}selected="selected"{/if}>
                                    TXT
                                </option>
                                <option value="mx" {if $mainRecord['recordType']=="MX"}selected="selected"{/if}>
                                    MX
                                </option>
                                <option value="stealth"
                                        {if $mainRecord['recordType']=="Stealth" || $mainRecord['recordType']=="Stealth Forward"}selected="selected"{/if}>
                                    Stealth Forward
                                </option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="dnsRecordAddress[]" value={$mainRecord['recordAddress']} size="40"
                                   class="form-control">
                        </td>
                        <td>
                            {if $mainRecord['recordType']=="Forward"}
                                <select name="extend[]" class="form-control">
                                    <option value="1" {if $mainRecord['extend']=="1"}selected="selected"{/if}>
                                        301
                                    </option>
                                    <option value="2" {if $mainRecord['extend']=="2"}selected="selected"{/if}>
                                        302
                                    </option>
                                </select>
                            {elseif $mainRecord['recordType']=="MX"||$mainRecord['recordType']=="Stealth" || $mainRecord['recordType']=="Stealth Forward"}
                                <input type="text" name="extend[]" class="form-control" value={$mainRecord['extend']}>
                            {else}
                                <input type="text" value="N/A" class="form-control" disabled>
                                <input type="hidden" name="extend[]" value="N/A">
                            {/if}
                        </td>
                        <td class="delete-record">
                            <button type="button" class="btn btn-danger" onclick="deleteRecord(this)">
                                Delete
                            </button>
                        </td>
                    </tr>
                {/foreach}
                <tr style="display: none" id="domainRecordHtml">
                    <td>
                        <select name="dnsRecordType[]" class="form-control" onchange="changeInput(this,false)">
                            <option value="a">A</option>
                            <option value="aaaa">AAAA</option>
                            <option value="cname">CNAME</option>
                            <option value="forward">Forward</option>
                            <option value="txt">TXT</option>
                            <option value="mx">MX</option>
                            <option value="stealth">Stealth Forward</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="dnsRecordAddress[]" value="" size="40" class="form-control">
                    </td>
                    <td>
                        <input type="text" value="N/A" class="form-control" disabled>
                        <input type="hidden" name="extend[]" value="N/A">
                    </td>
                    <td class="delete-record">
                        <button type="button" class="btn btn-danger" onclick="deleteRecord(this)">
                            Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="text-right text-muted">
                <button type="button" class="btn btn-default btn-sm" onclick="addRecord('domainRecord')">
                    Add Record
                </button>
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Subdomain Records (optional)</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Subdomain</th>
                    <th>Record Type</th>
                    <th>IP Address or Target Host</th>
                    <th>Extend</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody id="subDomainRecordBody">
                {foreach item=subRecord from=$subRecords}
                    <tr>
                        <td>
                            <input type="text" name="subDnsName[]" value={$subRecord['subName']} size="10"
                                   class="form-control">
                        </td>
                        <td>
                            <select name="subDnsRecordType[]" class="form-control" onchange="changeInput(this,true)">
                                <option value="a" {if $subRecord['subRecordType']=="A"}selected="selected"{/if}>
                                    A
                                </option>
                                <option value="aaaa" {if $subRecord['subRecordType']=="AAAA"}selected="selected"{/if}>
                                    AAAA
                                </option>
                                <option value="cname" {if $subRecord['subRecordType']=="CNAME"}selected="selected"{/if}>
                                    CNAME
                                </option>
                                <option value="forward"
                                        {if $subRecord['subRecordType']=="Forward"}selected="selected"{/if}>
                                    Forward
                                </option>
                                <option value="txt" {if $subRecord['subRecordType']=="TXT"}selected="selected"{/if}>
                                    TXT
                                </option>
                                <option value="mx" {if $subRecord['subRecordType']=="MX"}selected="selected"{/if}>
                                    MX
                                </option>
                                <option value="stealth"
                                        {if $subRecord['subRecordType']=="Stealth" || $subRecord['subRecordType']=="Stealth Forward"}selected="selected"{/if}>
                                    Stealth Forward
                                </option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="subDnsRecordAddress[]"
                                   value={$subRecord['subRecordAddress']} size="40"
                                   class="form-control">
                        </td>
                        <td>
                            {if $subRecord['subRecordType']=="Forward"}
                                <select name="subExtend[]" class="form-control">
                                    <option value="1" {if $subRecord['subExtend']=="1"}selected="selected"{/if}>
                                        301
                                    </option>
                                    <option value="2" {if $subRecord['subExtend']=="2"}selected="selected"{/if}>
                                        302
                                    </option>
                                </select>
                            {elseif $subRecord['subRecordType']=="MX"||$subRecord['subRecordType']=="Stealth" || $subRecord['subRecordType']=="Stealth Forward"}
                                <input type="text" name="subExtend[]" class="form-control"
                                       value={$subRecord['subExtend']}>
                            {else}
                                <input type="text" value="N/A" class="form-control" disabled>
                                <input type="hidden" name="subExtend[]" value="N/A">
                            {/if}
                        </td>
                        <td class="delete-record">
                            <button type="button" class="btn btn-danger" onclick="deleteRecord(this)">
                                Delete
                            </button>
                        </td>
                    </tr>
                {/foreach}
                <tr style="display: none" id="subDomainRecordHtml">
                    <td>
                        <input type="text" name="subDnsName[]" value="" size="10" class="form-control">
                    </td>
                    <td>
                        <select name="subDnsRecordType[]" class="form-control" onchange="changeInput(this,true)">
                            <option value="a">A</option>
                            <option value="aaaa">AAAA</option>
                            <option value="cname">CNAME</option>
                            <option value="forward">Forward</option>
                            <option value="txt">TXT</option>
                            <option value="mx">MX</option>
                            <option value="stealth">Stealth Forward</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="subDnsRecordAddress[]" value="" size="40" class="form-control">
                    </td>
                    <td>
                        <input type="text" value="N/A" class="form-control" disabled>
                        <input type="hidden" name="subExtend[]" value="N/A">
                    </td>
                    <td class="delete-record">
                        <button type="button" class="btn btn-danger" onclick="deleteRecord(this)">
                            Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="text-right text-muted">
                <button type="button" class="btn btn-default btn-sm" onclick="addRecord('subDomainRecord')">
                    Add Record
                </button>
            </p>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</form>

<div style="display: none;">
    <div id="forward">
        <select name="extend[]" class="form-control">
            <option value="1">301</option>
            <option value="2">302</option>
        </select>
    </div>
    <div id="mx">
        <input type="text" name="extend[]" value="" size="10" class="form-control"
               placeholder="Priority">
    </div>
    <div id="stealth">
        <input type="text" name="extend[]" value="" size="10" class="form-control"
               placeholder="Title">
    </div>
    <div id="n_a">
        <input type="text" value="N/A" class="form-control" disabled>
        <input type="hidden" name="extend[]" value="N/A">
    </div>
</div>

<script>
    function addRecord(selectorName) {
        var selector = "#" + selectorName + "Html";
        $(selector).clone(true).insertBefore(selector).removeAttr("style").removeAttr("id");
    }

    function deleteRecord(e) {
        var tr = $(e).parent("td").parent("tr");
        tr.remove();
    }

    function changeInput(e, isSubdomain) {
        var tr = $(e).parent("td").parent("tr");
        var last = tr.children().last();
        tr.children().eq(-2).remove();
        var td = $("<td></td>");
        var val = $(e).val();
        var html;
        if (val === "forward") {
            html = $("#forward").html();
        } else if (val === "mx") {
            html = $("#mx").html();
        } else if (val === "stealth") {
            html = $("#stealth").html();
        } else {
            html = $("#n_a").html();
        }
        if (isSubdomain) {
            html = html.replaceAll('name="extend[]"', 'name="subExtend[]"');
        }
        td.append(html);
        last.before(td);
    }
</script>