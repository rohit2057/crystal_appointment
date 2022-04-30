$(document).ready(function(){
    $(document).on('click','#updatebtn',function(){
        var user_id = $(this).val();
        $.ajax({
            type:"GET",
            url:"getOfficerDetail/"+user_id,
            success:function(response){

                // if(response.workdays[0].day_of_week == 'sunday')
                // {
                //     $('#newsunday').prop("checked", true);;
                // }

                $('#officer_id').val(response.officer.officer_id);
                $('#new_first_name').val(response.officer.first_name);
                $('#new_last_name').val(response.officer.last_name);
                $('#new_post').val(response.officer.post);
                $('#new_work_start_time').val(response.officer.work_start_time);
                $('#new_work_end_time').val(response.officer.work_end_time);

            }

        });
    });
});