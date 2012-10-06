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
    var jum_col_pmbcr;
    var jum_col_pndmpng;
    $(document).ready(function(){
        var idprogram = <?php echo $program['id'] ?>;
        var mindate = new Date('<?php echo $program['tanggal_mulai'] ?>');
        var maxdate = new Date('<?php echo $program['tanggal_akhir'] ?>');
        var $calendar = $('#calendar');
        var id = <?php echo $id_max?>; //id adalah count jadwal dari program ini
        $calendar.weekCalendar({
            dateFormat: 'd M Y',
            use24Hour: true,
            displayOddEven:true,
            timeslotsPerHour : 4,
            allowCalEventOverlap : false,
            overlapEventsSeparate: false,
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
                //return false;
            },
            resizable : function(calEvent, $event) {
                return calEvent.readOnly != true;
                //return false;
            },
            eventNew : function(calEvent, $event){
                var $dialogContent = $("#event_edit_container");
                resetForm($dialogContent);
                var startField = $dialogContent.find("select[name='mulai']").val(calEvent.start);
                var endField = $dialogContent.find("select[name='selesai']").val(calEvent.end);
                var titleField = $dialogContent.find("input[name='nama']");
                var kegiatan = $dialogContent.find("select[name='jenis']");

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
                            mulai=$dialogContent.find("select[name='mulai'] option:selected").text();
                            selesai=$dialogContent.find("select[name='selesai'] option:selected").text();
                            pil_jenis=$dialogContent.find("select[name='jenis'] option:selected").val();
                            data_post = {
                                    id_program : idprogram,
                                    jam_mulai : mulai,
                                    jam_selesai : selesai,
                                    tanggal : $dialogContent.find(".date_holder").text(),
                                    jenis : pil_jenis,
                                    materi : calEvent.title
                                }
                            
                            if(kegiatan.val()=='materi'){
                                arr_pmbcr = [];
                                arr_pndmpng = [];
                                $dialogContent.find("input[name^='id_pmbcr']").each(function(index){
                                    arr_pmbcr.push($(this).val());
                                });
                                $dialogContent.find("input[name^='pendamping']").each(function(index){
                                    arr_pndmpng.push($(this).val());
                                });
                                
                                data_post.id_pembicara = arr_pmbcr;
                                data_post.pendamping=arr_pndmpng;
                            }
                            
                            $.post("<?php echo base_url()?>penyelenggaraan/schedule/ajax_save",data_post);
                            
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
                //console.log($event.end);
                //console.log(calEvent.end);
                data_post={
                    old_start : $event.start.getHours()+':'+$event.start.getMinutes()+':'+$event.start.getSeconds(),
                    old_end : $event.end.getHours()+':'+$event.end.getMinutes()+':'+$event.end.getSeconds(),
                    old_date : $event.start.getFullYear()+'-'+($event.start.getMonth()+1)+'-'+$event.start.getDate(),
                    new_start : calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
                    new_end : calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds(),
                    new_date : calEvent.start.getFullYear()+'-'+(calEvent.start.getMonth()+1)+'-'+calEvent.start.getDate(),
                    title : calEvent.title,
                    id_program: idprogram
                }
                $.post("<?php echo base_url()?>penyelenggaraan/schedule/ajax_update_waktu", data_post);
            },
            eventResize : function(calEvent, $event) {
                data_post={
                    old_start : $event.start.getHours()+':'+$event.start.getMinutes()+':'+$event.start.getSeconds(),
                    old_end : $event.end.getHours()+':'+$event.end.getMinutes()+':'+$event.end.getSeconds(),
                    old_date : $event.start.getFullYear()+'-'+($event.start.getMonth()+1)+'-'+$event.start.getDate(),
                    new_start : calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
                    new_end : calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds(),
                    new_date : calEvent.start.getFullYear()+'-'+(calEvent.start.getMonth()+1)+'-'+calEvent.start.getDate(),
                    title : calEvent.title,
                    id_program: idprogram
                }
                $.post("<?php echo base_url()?>penyelenggaraan/schedule/ajax_update_waktu", data_post);
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
                var kegiatan = $dialogContent.find("select[name='jenis']");
                var json;
                var id_schedule;
                //bagian ajax buat ngeload data lainnya
                data_where={
                    where_start : calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
                    where_end : calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds(),
                    where_date : calEvent.start.getFullYear()+'-'+(calEvent.start.getMonth()+1)+'-'+calEvent.start.getDate(),
                    title : calEvent.title,
                    id_program: idprogram
                }
                $.post("<?php echo base_url()?>penyelenggaraan/schedule/ajax_get_data_schedule", data_where,function(data){
                    json=$.parseJSON(data);
                    id_schedule=json['id'];
                    $dialogContent.find("select[name='jenis']").val(json['jenis']);
                }).then(function(){
                    if(json['jenis']=='materi'){
                        $.get("<?php echo base_url()?>penyelenggaraan/schedule/ajax_get_form_pemateri_pembimbing/"+json['id'],function(data){
                            $dialogContent.find('#form_event').append(data);
                            jum_col_pmbcr=0;
                            jum_col_pndmpng=0;
                        });
                    }
                    $dialogContent.dialog({
                        modal: true,
                        width: 'auto',
                        height: 500,
                        title: "Edit - " + calEvent.title,
                        close: function() {
                        $dialogContent.dialog("destroy");
                        $dialogContent.hide();
                        $('#calendar').weekCalendar("removeUnsavedEvents");
                        },
                        buttons: {
                            save : function() {
                                //fungsi ajax buat ngupdate db
                                calEvent.start = new Date(startField.val());
                                calEvent.end = new Date(endField.val());
                                calEvent.title = titleField.val();
                                mulai=$dialogContent.find("select[name='mulai'] option:selected").text();
                                selesai=$dialogContent.find("select[name='selesai'] option:selected").text();
                                pil_jenis=$dialogContent.find("select[name='jenis'] option:selected").val();
                                data_post = {
                                        idschedule : id_schedule,
                                        id_program : idprogram,
                                        jam_mulai : mulai,
                                        jam_selesai : selesai,
                                        tanggal : $dialogContent.find(".date_holder").text(),
                                        jenis : pil_jenis,
                                        materi : calEvent.title
                                    }

                                if(kegiatan.val()=='materi'){
                                    arr_pmbcr = [];
                                    arr_pndmpng = [];
                                    $dialogContent.find("input[name^='id_pmbcr']").each(function(index){
                                        arr_pmbcr.push($(this).val());
                                    });
                                    $dialogContent.find("input[name^='pendamping']").each(function(index){
                                        arr_pndmpng.push($(this).val());
                                    });

                                    data_post.id_pembicara = arr_pmbcr;
                                    data_post.pendamping=arr_pndmpng;
                                }
                                $.post("<?php echo base_url()?>penyelenggaraan/schedule/ajax_edit_all",data_post,function(data){
                                    console.log(data);
                                });
                                $calendar.weekCalendar("updateEvent", calEvent);
                                $dialogContent.dialog("close");
                            },
                            "delete" : function() {
                                //fungsi ajax buat delete db
                                $.get("<?php echo base_url()?>penyelenggaraan/schedule/ajax_delete_schedule/"+id_schedule,function(data){
                                    console.log(data);
                                });
                                $calendar.weekCalendar("removeEvent", calEvent.id);
                                $dialogContent.dialog("close");
                            },
                            cancel : function() {
                                $dialogContent.dialog("close");
                            }
                        }
                    }).show()
                });

                var startField = $dialogContent.find("select[name='mulai']").val(calEvent.start);
                var endField = $dialogContent.find("select[name='selesai']").val(calEvent.end);
                $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
                setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
                $(window).resize().resize(); //fixes a bug in modal overlay size ??
            },
            data : function(start, end, callback) {
                callback(getEventData());
            }
        });

        function resetForm($dialogContent) {
            form = $('#example').children().clone();
            $dialogContent.html(form);
        }

        function getEventData() {
            <?php $d=$data_json[0]?>
            return {events : 
                [
                <?php foreach($data_json as $d){?>
                {"id": <?php echo $d['id']?>,"start": new Date(<?php echo $d['start']?>),"end": new Date(<?php echo $d['end']?>),"title": "<?php echo $d['title']?>"},
                <?php } ?>
                ]};
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
            jum_col_pmbcr=1;
            jum_col_pndmpng=1;
            append_pembicara(false,null);
            append_pendamping();
        }else{
            jum_col_pmbcr=0;
            jum_col_pndmpng=0;
            $('#event_edit_container #form_event .tr_widyaiswara').remove();
        }
    });


    $('.jenis').live('change',function(){

        id=$(this).attr('id');
        val=$(this).val();
        input=$(this).siblings("input[type='text']");
        $.getJSON('<?php echo base_url() ?>penyelenggaraan/schedule/ajax_pembicara/'+val, function(data){
            data_json=data;
        }).then(function(){
            console.log(data_json[1]);
            input.autocomplete({
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
    
    function append_pembicara(is_add,parent){
        text = $('.sample1 > table > tbody').children().clone();
        if(!is_add){
            $('#event_edit_container #form_event').append(text);
        }else{
            parent.after(text);
        }
        jum_col_pmbcr++;
    }
    function append_pendamping(){
        text = $('.sample2 > table > tbody').children().clone();
        $('#event_edit_container #form_event').append(text);
        jum_col_pndmpng++;
    }
    
    $('.add_pmbcr').live('click',function(){
        if((jum_col_pmbcr-1)>0){
            $(this).text('Hapus');
            $(this).attr('class','del_pmbcr');
        }
        parent = $(this).parent().parent();
        append_pembicara(true,parent);
    });
    $('.del_pmbcr').live('click',function(){
        $(this).parent().parent().remove();
    });
    
    $('.add_pndmpng').live('click',function(){
        if((jum_col_pndmpng-1)>0){
            $(this).text('Hapus');
            $(this).attr('class','del_pndmpng');
            append_pendamping();
        }
    });
    $('.del_pndmpng').live('click',function(){
        $(this).parent().parent().remove();
    });
</script>

JADWAL TENTATIVE <?php echo strtoupper($program['name']) ?>
<br/>
KEMENTRIAN PERHUBUNGAN TAHUN <?php echo $program['tahun_program'] ?>
<br/>
<br/>
<div id='calendar'></div>
<?php $pil = array(-1 => '-- Pilih --', 1 => 'non widyaiswara', 2 => 'widyaiswara', 3 => 'dosen tamu') ?>

<div class="sample1 hide">
    <table>
        <tr class="tr_widyaiswara">
            <td>Pembicara</td>
            <td>: <?php echo form_dropdown('jenis_pembicara', $pil, '', 'id="p1" class="jenis"') ?> <input type="text" class="nama_pmbcr" name="nama_pmbcr"/><input type="hidden" name="id_pmbcr[]"/> <span class="add_pmbcr">Tambah</span></td>
        </tr>
    </table>
</div>
<div class="sample2 hide">
    <table>
        <tr class="tr_widyaiswara">
            <td>Pendamping</td>
            <td>: <input type="text" name="pendamping[]"/> <span class="add_pndmpng">Tambah</span></td>
        </tr>
    </table>
</div>

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
                <td>: <input type="text" name="nama" id="nama"/></td>
            </tr>
        </table>
    </form>
</div>
<div id="event_edit_container"></div>