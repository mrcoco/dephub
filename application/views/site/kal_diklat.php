<script type='text/javascript' src='assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" language="javascript" src="assets/js/swfobject.js"></script>
        <div id='loading' style='display:none'>loading...</div>
        <div id='calendar'></div>
        <div class="form-actions">
            <button type="button" class="btn btn-primary" onclick="history.go(-1)">Kembali</button>
        </div>
<script type="text/javascript">
    $(function(){
        $('#calendar').fullCalendar({
            editable: false,
            events: "<?php echo base_url(); ?>site/json_event",
            loading: function(bool) {
                if (bool){
                    $('#loading').show();
                }
                else{
                    $('#loading').hide();
                }
            }
        });
        $('.fc-state-highlight').css('background','#C7DFFF');
    });
</script>