<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>assets/libs/css/smoothness/jquery-ui-1.8.11.custom.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>assets/css/jquery.weekcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>assets/css/calendar_default.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>assets/css/calendar_demo.css' />
<style>
    .ui-button {
        margin-left: -1px;
    }
    .ui-button-icon-only .ui-button-text {
        padding: 0.35em;
    } 
    .ui-autocomplete-input {
        margin: 0;
        padding: 0.4em 0 0.4em 0.45em;
    }
</style>

<script type='text/javascript' src='<?php echo base_url() ?>assets/libs/jquery-ui-1.8.11.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>assets/libs/date.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>assets/js/jquery.weekcalendar.js'></script>

<script>
    var data_json;
    $(document).ready(function(){
        var mindate = new Date('<?php echo $program['tanggal_mulai'] ?>');
        var maxdate = new Date('<?php echo $program['tanggal_akhir'] ?>');
        var $calendar = $('#calendar');
        var id = 1;
        
        $calendar.weekCalendar({
            dateFormat: 'd M Y',
            use24Hour: true,
            displayOddEven:true,
            timeslotsPerHour : 4,
            allowCalEventOverlap : true,
            overlapEventsSeparate: true,
            firstDayOfWeek : 0,
            minDate:mindate,
            maxDate:maxdate,
            businessHours :{start: 0, end: 24, limitDisplay: true },
            daysToShow : 7,
            //      switchDisplay: {'1 day': 1, '3 next days': 3, 'work week': 5, 'full week': 7},
            title: function(daysToShow) {
                return daysToShow == 1 ? '%date%' : '%start% - %end%';
            },
            height : function($calendar) {
                return $(window).height() - $("h1").outerHeight() - 1;
            },
            eventRender : function(calEvent, $event) {
                if (calEvent.end.getTime() < new Date().getTime()) {
                    $event.css("backgroundColor", "#aaa");
                    $event.find(".wc-time").css({
                        "backgroundColor" : "#999",
                        "border" : "1px solid #888"
                    });
                }
            },
            draggable : function(calEvent, $event) {
                return calEvent.readOnly != true;
            },
            resizable : function(calEvent, $event) {
                return calEvent.readOnly != true;
            },
            eventNew : function(calEvent, $event){
                var $dialogContent = $("#event_edit_container");
                resetForm($dialogContent);
                var startField = $dialogContent.find("select[name='mulai']").val(calEvent.start);
                var endField = $dialogContent.find("select[name='selesai']").val(calEvent.end);
                var titleField = $dialogContent.find("input[name='nama']");
                var kegiatan = $dialogContent.find("select[name='jenis']");
                var p1 = $dialogContent.find("input[name='id_p1']");
                var p2 = $dialogContent.find("input[name='id_p2']");
                var p3 = $dialogContent.find("input[name='id_p3']");
                var pendamping1 = $dialogContent.find("input[name='pendamping1']");
                var pendamping2 = $dialogContent.find("input[name='pendamping2']");
                //var bodyField = $dialogContent.find("textarea[name='body']");


                $dialogContent.dialog({
                    width: 'auto',
                    height: 500,
                    modal: true,
                    title: "Buat Kegiatan Baru",
                    close: function() {
                        $dialogContent.dialog("destroy");
                        $dialogContent.hide();
                        $('#calendar').weekCalendar("removeUnsavedEvents");
                    },
                    buttons: {
                        save : function() {
                            calEvent.id = id;
                            id++;
                            calEvent.start = new Date(startField.val());
                            calEvent.end = new Date(endField.val());
                            calEvent.title = titleField.val();
                            text_body='Pe';
                            //                            calEvent.body = bodyField.val();
                            $calendar.weekCalendar("removeUnsavedEvents");
                            $calendar.weekCalendar("updateEvent", calEvent);
                            $dialogContent.dialog("close");
                        },
                        cancel : function() {
                            $dialogContent.dialog("close");
                        }
                    }
                }).show();

                $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
                setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));

            },
            eventDrop : function(calEvent, $event) {
        
            },
            eventResize : function(calEvent, $event) {
            },
            eventClick : function(calEvent, $event) {

                if (calEvent.readOnly) {
                    return;
                }

                var $dialogContent = $("#event_edit_container");
                resetForm($dialogContent);
                var startField = $dialogContent.find("select[name='mulai']").val(calEvent.start);
                var endField = $dialogContent.find("select[name='selesai']").val(calEvent.end);
                var titleField = $dialogContent.find("input[name='nama']").val(calEvent.title);
                //                var bodyField = $dialogContent.find("textarea[name='body']");
                //                bodyField.val(calEvent.body);

                $dialogContent.dialog({
                    width: 'auto',
                    height: 500,
                    modal: true,
                    title: "Edit - " + calEvent.title,
                    close: function() {
                        $dialogContent.dialog("destroy");
                        $dialogContent.hide();
                        $('#calendar').weekCalendar("removeUnsavedEvents");
                    },
                    buttons: {
                        save : function() {

                            calEvent.start = new Date(startField.val());
                            calEvent.end = new Date(endField.val());
                            calEvent.title = titleField.val();
                            //                            calEvent.body = bodyField.val();

                            $calendar.weekCalendar("updateEvent", calEvent);
                            $dialogContent.dialog("close");
                        },
                        "delete" : function() {
                            $calendar.weekCalendar("removeEvent", calEvent.id);
                            $dialogContent.dialog("close");
                        },
                        cancel : function() {
                            $dialogContent.dialog("close");
                        }
                    }
                }).show();

                var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
                var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
                $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
                setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
                $(window).resize().resize(); //fixes a bug in modal overlay size ??

            },
            eventMouseover : function(calEvent, $event) {
            },
            eventMouseout : function(calEvent, $event) {
            },
            noEvents : function() {

            },
            data : function(start, end, callback) {
                callback(getEventData());
            }
        });

        function resetForm($dialogContent) {
            form = $('#example').children().clone();
            $dialogContent.html(form);
            $('.tr_widyaiswara').hide();
        }

        function getEventData() {
            var year = new Date().getFullYear();
            var month = new Date().getMonth();
            var day = new Date().getDate();

            return {
                events : []
            };
        }


        /*
         * Sets up the start and end time fields in the calendar event
         * form for editing based on the calendar event being edited
         */
        function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {

            $startTimeField.empty();
            $endTimeField.empty();

            for (var i = 0; i < timeslotTimes.length; i++) {
                var startTime = timeslotTimes[i].start;
                var endTime = timeslotTimes[i].end;
                var startSelected = "";
                if (startTime.getTime() === calEvent.start.getTime()) {
                    startSelected = "selected=\"selected\"";
                }
                var endSelected = "";
                if (endTime.getTime() === calEvent.end.getTime()) {
                    endSelected = "selected=\"selected\"";
                }
                $startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
                $endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");

                $timestampsOfOptions.start[timeslotTimes[i].startFormatted] = startTime.getTime();
                $timestampsOfOptions.end[timeslotTimes[i].endFormatted] = endTime.getTime();

            }
            $endTimeOptions = $endTimeField.find("option");
            $startTimeField.trigger("change");
        }

        var $endTimeField = $("select[name='end']");
        var $endTimeOptions = $endTimeField.find("option");
        var $timestampsOfOptions = {start:[],end:[]};

        //reduces the end time options to be only after the start time options.
        $("select[name='start']").change(function() {
            var startTime = $timestampsOfOptions.start[$(this).find(":selected").text()];
            var currentEndTime = $endTimeField.find("option:selected").val();
            $endTimeField.html(
            $endTimeOptions.filter(function() {
                return startTime < $timestampsOfOptions.end[$(this).text()];
            })
        );

            var endTimeSelected = false;
            $endTimeField.find("option").each(function() {
                if ($(this).val() === currentEndTime) {
                    $(this).attr("selected", "selected");
                    endTimeSelected = true;
                    return false;
                }
            });

            if (!endTimeSelected) {
                //automatically select an end date 2 slots away.
                $endTimeField.find("option:eq(1)").attr("selected", "selected");
            }

        });
        $('#calendar').weekCalendar("gotoWeek",mindate);
        $('.wc-today').hide();
    });
    
    $('#jenis').live('change',function(){
        if($(this).val()=='materi'){
            $('.tr_widyaiswara').show();
        }else{
            $('.tr_widyaiswara').hide();
        }
    });


    $('.autocom').live('change',function(){

        id=$(this).attr('id');
        val=$(this).val();

        input=$(this).siblings("input[type='text']");
        $.getJSON('<?php echo base_url() ?>penyelenggaraan/schedule/ajax_pembicara/'+val, function(data){
            data_json=data;
        }).then(function(){
            $( '.nama_'+id ).autocomplete({
                source: data_json[2],
                change: function(event, ui){
                    if(ui.item){
                        nama=$(this).val();
                        pid=$(this).siblings('input[type="hidden"]');
                        pid.val(data_json[1][nama]);
                    }else{
                        alert('Anda harus memilih dari daftar nama yang disediakan');
                        $(this).val('');
                        $(this).focus();
                    }
                }
            });
        });
    });
</script>

JADWAL TENTATIVE <?php echo strtoupper($program['name']) ?>
<br/>
KEMENTRIAN PERHUBUNGAN TAHUN <?php echo $program['tahun_program'] ?>
<br/>
<br/>
<div id='calendar'></div>
<div id="example" class="hide">
    <form id="main_form">
        <input type="hidden" id="id_program" name="id_program" value="<?php echo $program['id'] ?>"/>
        <table id="form_event">
            <tr>
                <td width="180">Tanggal</td>
                <td>
                    : <span class="date_holder"></span>
                </td>
            </tr>
            <tr>
                <td>Jam mulai</td>
                <td>: <select id="mulai" name="mulai"><option value="">Pilih jam mulai</option></select>
                </td>
            </tr>
            <tr>
                <td>Jam selesai</td>
                <td>: <select id="selesai" name="selesai"><option value="">Pilih jam selesai</option></select>
                </td>
            </tr>
            <tr>
                <td>Jenis acara</td>
                <td>: 
                    <select id="jenis" name="jenis">
                        <option value="">Pilih jenis acara</option>
                        <option value="materi">Materi</option>
                        <option value="kegiatan">Kegiatan</option>
                        <option value="libur">Libur</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama acara</td>
                <td>: <input type="text" name="nama" /></td>
            </tr>
            <?php $pil = array(-1 => '-- Pilih --', 1 => 'non widyaiswara', 2 => 'widyaiswara', 3 => 'dosen tamu') ?>
            <tr class="tr_widyaiswara">
                <td>Pembicara 1</td>
                <td>: <?php echo form_dropdown('jenis_pembicara1', $pil, '', 'id="p1" class="autocom"') ?> <input type="text" class="nama_p1" name="nama_p1"/><input type="hidden" name="id_p1"/></td>
            </tr>
            <tr class="tr_widyaiswara">
                <td>Pembicara 2</td>
                <td>: <?php echo form_dropdown('jenis_pembicara2', $pil, '', 'id="p2" class="autocom"') ?> <input type="text" class="nama_p2" name="nama_p2"/><input type="hidden" name="id_p2"/></td>
            </tr>
            <tr class="tr_widyaiswara">
                <td>Pembicara 3</td>
                <td>: <?php echo form_dropdown('jenis_pembicara3', $pil, '', 'id="p3" class="autocom"') ?> <input type="text" class="nama_p3" name="nama_p3"/><input type="hidden" name="id_p3"/></td>
            </tr>
            <tr>
                <td>Pendamping 1</td>
                <td>: <input type="text" name="pendamping1" id="pendamping1"/></td>
            </tr>
            <tr>
                <td>Pendamping 2</td>
                <td>: <input type="text" name="pendamping2" id="pendamping2"/></td>
            </tr>
        </table>
    </form>
</div>

<div id="event_edit_container"></div>