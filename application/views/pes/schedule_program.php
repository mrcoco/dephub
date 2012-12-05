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
        var id = (<?php echo $id_max ?>+1); //id adalah count jadwal dari program ini
        
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
            businessHours :{start: 5, end: 22, limitDisplay: true },
            daysToShow : 7,
            readonly:true,
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
                return calEvent.readOnly = true;
//                calEvent.readOnly = true;
//                return false;
            },
            resizable : function(calEvent, $event) {
                return calEvent.readOnly = true;
//                calEvent.readOnly = true;
//                return false;
            },
            eventNew : function(calEvent, $event){
                if (calEvent.readOnly) {
                    return false;
                }
                var $dialogContent = $("#event_edit_container");
                resetForm($dialogContent);
                var startField = $dialogContent.find("select[name='mulai']").val(calEvent.start);
                var endField = $dialogContent.find("select[name='selesai']").val(calEvent.end);
                var titleField;
                var jenisTempat;
                var id_ruangan;
                var lokasi;
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
                            console.log(id);
                            calEvent.id = id;
                            id++;
                            calEvent.start = new Date(startField.val());
                            calEvent.end = new Date(endField.val());
                            mulai=$dialogContent.find("select[name='mulai'] option:selected").text();
                            selesai=$dialogContent.find("select[name='selesai'] option:selected").text();
                            pil_jenis=$dialogContent.find("select[name='jenis'] option:selected").val();
                            if(pil_jenis=='materi'){
                                titleField=$dialogContent.find("select[name='nama']");
                                calEvent.title = titleField.find('option:selected').text();
                                jenis_tempat = $dialogContent.find("select[name='jenis_tempat']").val();
                                if(jenis_tempat=='kelas'){
                                    id_ruangan = $dialogContent.find("select[name='id_ruangan']").val();
                                }else if(jenis_tempat=='luar kelas'){
                                    lokasi = $dialogContent.find("input[name='lokasi']").val();
                                }
                            }else if(pil_jenis=='non materi'){
                                titleField=$dialogContent.find("input[name='nama']");
                                calEvent.title = titleField.val();
                            }
                            data_post = {
                                id_program : idprogram,
                                jam_mulai : mulai,
                                jam_selesai : selesai,
                                tanggal : $dialogContent.find(".date_holder").text(),
                                jenis : pil_jenis,
                                materi : titleField.val()
                            }
                            
                            if(kegiatan.val()=='materi'){
                                data_post.jenis_tempat=jenis_tempat;
                                if(jenis_tempat=='kelas'){
                                    data_post.id_ruangan=id_ruangan;
                                    data_post.lokasi='';
                                }else if(jenis_tempat=='luar kelas'){
                                    data_post.id_ruangan=0;
                                    lokasi = $dialogContent.find("input[name='lokasi']").val();
                                }
                                
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
                            console.log(data_post);
                            $.post("<?php echo base_url() ?>program/ajax_save",data_post,function(data){
                                console.log(data);
                            });
                            
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
                if (calEvent.readOnly) {
                    return;
                }
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
                $.post("<?php echo base_url() ?>program/ajax_update_waktu", data_post);
            },
            eventResize : function(calEvent, $event) {

                if (calEvent.readOnly) {
                    return;
                }
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
                $.post("<?php echo base_url() ?>program/ajax_update_waktu", data_post);
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
                
                data_where={
                    where_start : calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
                    where_end : calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds(),
                    where_date : calEvent.start.getFullYear()+'-'+(calEvent.start.getMonth()+1)+'-'+calEvent.start.getDate(),
                    id_program: idprogram
                }
                
                $.post("<?php echo base_url() ?>program/ajax_get_data_schedule", data_where,function(data){
                    json=$.parseJSON(data);
                    id_schedule=json['id'];
                    $dialogContent.find("select[name='jenis']").val(json['jenis']);
                }).then(function(){
                    if(json['jenis']=='materi'){
                        row_nama=$dialogContent.find("select[name='nama']");
                        row_nama.parent().parent().removeClass('hide');
                        row_nama.val(json['id_materi']);
                        
                        row_tempat=$dialogContent.find("select[name='jenis_tempat']");
                        row_tempat.parent().parent().removeClass('hide');
                        row_tempat.val(json['jenis_tempat']);
                        
                        if(json['jenis_tempat']=='kelas'){
                            row_kelas=$dialogContent.find("select[name='id_ruangan']");
                            row_kelas.parent().parent().removeClass('hide');
                            row_kelas.val(json['id_ruangan']);
                        }else if(json['jenis_tempat']=='luar kelas'){
                            row_lokasi=$dialogContent.find("input[name='lokasi']");
                            row_lokasi.parent().parent().removeClass('hide');
                            row_lokasi.val(json['lokasi']);
                        }
                        
                        $.get("<?php echo base_url() ?>pes/front/ajax_get_form_pemateri_pembimbing/"+json['id'],function(data){
                            $dialogContent.find('#form_event').append(data);
                            jum_col_pmbcr=$dialogContent.find('.nama_pmbcr').length+1;
                            jum_col_pndmpng=$dialogContent.find('.nama_pndmpng').length+1;
                        });
                        
                        $.getJSON('<?php echo base_url() ?>program/ajax_pembicara/'+row_nama.val(), function(data){
                            data_json=data;
                            $('.nama_pmbcr').autocomplete({
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
                        })
                        
                    }else if(json['jenis']=='non materi'){
                        row_nama=$dialogContent.find("input[name='nama']");
                        row_nama.parent().parent().removeClass('hide');
                        row_nama.val(json['nama_kegiatan']);
                        
                    }
                    
                    $dialogContent.dialog({
                        modal: true,
                        width: 'auto',
                        height: 500,
                        title: "Lihat - " + calEvent.title,
                        close: function() {
                            $dialogContent.dialog("destroy");
                            $dialogContent.hide();
                            $('#calendar').weekCalendar("removeUnsavedEvents");
                        },
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
            $dialogContent.empty();
            form = $('#example').children().clone();
            $dialogContent.append(form);
        }

        function getEventData() {
            return {events : 
                    [
                    <?php foreach ($data_json as $d) { ?>
                                        {"id": <?php echo $d['id'] ?>,"start": new Date(<?php echo $d['start'] ?>),"end": new Date(<?php echo $d['end'] ?>),"title": "<?php echo $d['title'] ?>"},
                    <?php } ?>
                    ]
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
    
                    $('#event_edit_container #jenis').live('change',function(){
                        if($(this).val()=='materi'){
                            $('#event_edit_container .pil_materi').removeClass('hide');
                            $('#event_edit_container .pil_libur').removeClass('hide');
                            $('#event_edit_container .pil_tempat').removeClass('hide');
                            $('#event_edit_container .pil_libur').addClass('hide');
                            jum_col_pmbcr=1;
                            jum_col_pndmpng=1;
                            append_pembicara(false,null,false);
                            append_pendamping();
                        }else{
                            $('#event_edit_container .pil_materi').removeClass('hide');
                            $('#event_edit_container .pil_libur').removeClass('hide');
                            $('#event_edit_container .pil_materi').addClass('hide');
                            $('#event_edit_container .pil_tempat').addClass('hide');
                            jum_col_pmbcr=0;
                            jum_col_pndmpng=0;
                            $('#event_edit_container #form_event .tr_widyaiswara').remove();
                        }
                    });


                    $('#event_edit_container #nama').live('change',function(){
                        
                        if(this.nodeName.toLowerCase()=='select'){
                            id=$(this).attr('id');
                            val=$(this).val();
                            input=$(this).siblings("input[type='text']");
                            $.getJSON('<?php echo base_url() ?>program/ajax_pembicara/'+val, function(data){
                                data_json=data;
                                console.log(data_json);
                            }).then(function(){
                                $('#event_edit_container .nama_pmbcr').autocomplete({
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
                        }
                    });
                    
                    $('#event_edit_container #jenis_tempat').live('change',function(){
                        console.log('Masuk '+$(this).val());
                        if($(this).val()=='kelas'){
                            $('#event_edit_container .pil_kelas').removeClass('hide');
                            $('#event_edit_container .lokasi').removeClass('hide');
                            $('#event_edit_container .lokasi').addClass('hide');
                        }else if($(this).val()=='luar kelas'){
                            $('#event_edit_container .pil_kelas').removeClass('hide');
                            $('#event_edit_container .lokasi').removeClass('hide');
                            $('#event_edit_container .pil_kelas').addClass('hide');
                        }
                    });
    
                    function append_pembicara(is_add,parent,autocomplete){
                        text = $('.sample1 > table > tbody').children().clone();
                        if(!is_add){
                            $('#event_edit_container #form_event').append(text);
                        }else{
                            parent.after(text);
                        }
                        console.log('Sebelum : '+jum_col_pmbcr);
                        jum_col_pmbcr++;
                        console.log('Sesudah : '+jum_col_pmbcr);
                        if(autocomplete){
                            $('.nama_pmbcr').autocomplete({
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
                        }
                    }
                    function append_pendamping(){
                        text = $('.sample2 > table > tbody').children().clone();
                        $('#event_edit_container #form_event').append(text);
                        jum_col_pndmpng++;
                    }
    
                    $('.add_pmbcr').live('click',function(){
                        console.log(jum_col_pmbcr);
                        if((jum_col_pmbcr-1)>0){
                            $(this).text('Hapus');
                            $(this).attr('class','del_pmbcr btn btn-mini btn-danger');
                        }
                        parent = $(this).parent().parent();
                        append_pembicara(true,parent,true);
                    });
                    $('.del_pmbcr').live('click',function(){
                        $(this).parent().parent().remove();
                    });
    
                    $('.add_pndmpng').live('click',function(){
                        console.log(jum_col_pndmpng);
                        if((jum_col_pndmpng-1)>0){
                            $(this).text('Hapus');
                            $(this).attr('class','del_pndmpng btn btn-mini btn-danger');
                        }
                        append_pendamping();
                    });
                    $('.del_pndmpng').live('click',function(){
                        $(this).parent().parent().remove();
                    });
                    $('.nama_pmbcr').attr('disabled','');
                    $('.nama_pmbcr').attr('disabled','');
</script>
<p align="center" class="lead">
    <?php echo $diklat['name']. ' Angkatan '.$program['angkatan'] ?><br />
    Kementrian Perhubungan Tahun <?php echo $program['tahun_program'] ?><br />
</p>
<div id='calendar'></div>
<?php $pil = array(-1 => '-- Pilih --', 1 => 'non widyaiswara', 2 => 'widyaiswara', 3 => 'dosen tamu') ?>

<div class="sample1 hide">
    <table>
        <tr class="tr_widyaiswara">
            <td>Pengajar</td>
            <td>: <input disabled type="text" class="nama_pmbcr" name="nama_pmbcr"/><input type="hidden" name="id_pmbcr[]"/></td>
        </tr>
    </table>
</div>
<div class="sample2 hide">
    <table>
        <tr class="tr_widyaiswara">
            <td>Pendamping</td>
            <td>: <input disabled type="text" name="pendamping[]"/></td>
        </tr>
    </table>
</div>

<div id="example" class="hide">
    <form id="main_form">
        <input type="hidden" id="id_program" name="id_program" value="<?php echo $program['id'] ?>"/>
        <table id="form_event">
            <tr>
                <td width="20%">Tanggal</td>
                <td>
                    : <span class="date_holder"></span>
                </td>
            </tr>
            <tr>
                <td>Jam mulai</td>
                <td>: <select id="mulai" name="mulai" disabled><option value="">Pilih jam mulai</option></select>
                </td>
            </tr>
            <tr>
                <td>Jam selesai</td>
                <td>: <select id="selesai" name="selesai" disabled><option value="">Pilih jam selesai</option></select>
                </td>
            </tr>
            <tr>
                <td>Jenis acara</td>
                <td>: 
                    <select id="jenis" name="jenis" disabled>
                        <option value="">Pilih jenis acara</option>
                        <option value="materi">Materi</option>
                        <option value="non materi">Non Materi</option>
                    </select>
                </td>
            </tr>
            <tr class="pil_materi hide">
                <td>Nama acara</td>
                <td>: <?php echo form_dropdown('nama',$pil_materi,'','id="nama" disabled')?></td>
            </tr>
            <tr class="pil_tempat hide">
                <td>Jenis tempat</td>
                <td>: 
                    <select id="jenis_tempat" name="jenis_tempat" disabled>
                        <option value="">Pilih tempat</option>
                        <option value="kelas">Kelas</option>
                        <option value="luar kelas">Luar Kelas</option>
                    </select>
                </td>
            </tr>
            <tr class="pil_kelas hide">
                <td>Nama ruangan</td>
                <td>: <?php echo form_dropdown('id_ruangan',$kelas,$program['kelas'],' disabled')?></td>
            </tr>
            <tr class="lokasi hide">
                <td>Lokasi</td>
                <td>: <input type="text" name="lokasi" disabled/></td>
            </tr>
            <tr class="pil_libur hide">
                <td>Nama kegiatan</td>
                <td>: <?php echo form_input('nama','','id="nama" disabled')?></td>
            </tr>
        </table>
    </form>
</div>
<div id="event_edit_container"></div>
<div class="form-actions">
    <a class="btn btn-success" href="<?php echo base_url() ?>program/print_schedule/<?php echo $program['id'] ?>">Cetak Jadwal</a>  
</div>