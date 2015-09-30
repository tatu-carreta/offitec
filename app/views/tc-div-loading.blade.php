<script type="text/javascript">
    function ShowLoading() {
        $("#divLoading").show();
        return true;
        // These 2 lines cancel form submission, so only use if needed.
        //window.event.cancelBubble = true;
        //e.stopPropagation();
    }
</script>
<div id="divLoading" style="position: fixed; top: 5%; left: 40%; z-index: 5000; width: 422px; text-align: center; background: #EDDBB0; border: 1px solid #000;display: none;">
    <img src="{{URL::to('images/loading_bar.gif')}}">
    <p>Loading..</p>
</div>