<form method="post" action="<?=$_SERVER["PHP_SELF"]?>?cmd=1">
    <div class="mb-3">
        <label for="partner">Partner</label>
        <input type="number" value="174388014" name="partner" id="partner">
    </div>
    <div class="mb-3">
        <label for="token">Token</label>
        <input type="text" value="5c9e4f73481dc072bfb662ca2133cffc" name="token" id="token">
    </div>
    <div class="mb-3">
        <label for="daterange">Date (start/end)</label>
        <!-- MM:DD:YYYY -->
        <input type="text" name="daterange" value="09/10/2021 - 09/10/2021" />
    </div>
    <div class="mb-3">
        <label>Dimensions: </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" checked type="checkbox" id="prod" name="dimension[]" value="prod">
            <label class="form-check-label" for="prod">prod</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" checked type="checkbox" id="segId" name="dimension[]" value="segId">
            <label class="form-check-label" for="segId">segId</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" checked type="checkbox" id="adType" name="dimension[]" value="adType">
            <label class="form-check-label" for="adType">adType</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" checked type="checkbox" id="country" name="dimension[]" value="country">
            <label class="form-check-label" for="country">country</label>
        </div>

    </div>

    <div class="mb-3">
        <label>Send</label>
        <input type="submit" value="Send">
    </div>
</form>

<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>

<!--
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>
-->