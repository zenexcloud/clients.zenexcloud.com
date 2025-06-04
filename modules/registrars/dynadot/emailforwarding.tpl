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
    Specify email aliases and forward them to already existing email addresses. Enter * as a username to specify
    a wildcard (also known as catch-all email forwarding).
</div>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Email Forwarding</h3>
        <form method="post"
              action="clientarea.php?action=domaindetails&domainid={$domainid}&modop=custom&a=EmailForwarding">
            <input type="hidden" name="submitType" value="save">
            <input type="hidden" name="recordType" value="email">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Alias</th>
                    <th>Email</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody id="emailBody">
                {foreach item=record from=$records}
                    <tr>
                        <td><input type="text" name="alias[]" value={$record['alias']} class="form-control"></td>
                        <td><input type="text" name="email[]" value={$record['email']} class="form-control"></td>
                        <td class="delete-record">
                            <button type="button" class="btn btn-danger" onclick="deleteRecord(this)">
                                Delete
                            </button>
                        </td>
                    </tr>
                {/foreach}
                <tr style="display: none" id="emailHtml">
                    <td><input type="text" name="alias[]" value="" class="form-control"></td>
                    <td><input type="text" name="email[]" value="" class="form-control"></td>
                    <td class="delete-record">
                        <button type="button" class="btn btn-danger" onclick="deleteRecord(this)">
                            Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="text-right text-muted">
                <button type="button" class="btn btn-default btn-sm" onclick="addRecord()">
                    Add Record
                </button>
            </p>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function addRecord() {
        var selector = "#emailHtml";
        $(selector).clone(true).insertBefore(selector).removeAttr("style").removeAttr("id");
    }

    function deleteRecord(e) {
        var tr = $(e).parent("td").parent("tr");
        tr.remove();
    }
</script>