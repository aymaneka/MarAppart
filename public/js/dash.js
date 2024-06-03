

function remove_appart(id){
    var delete_id_input = document.getElementById("appar-delete-id");
    delete_id_input.value = id;
}
function remove_chara(id){
    var chara_id_input = document.getElementById("chara-delete-id");
    chara_id_input.value = id;
}

function edit(id){
    console.log(id);
    $.ajax({
        url:'/characteristic.edit/'+ id,
        type: 'GET',
        dataType: 'json',
        success: function(data){
            // console.log(data)
            $('#exampleModalLabel').text('Edit Characteristic');
            $('#update_btn').text('Update');
            $('form').attr('action', 'characteristic.update/' + data.id);
            // $("input[name='_method']").val("PUT");
            $('input[name="characteristic"]').val(data.name);
            // $('input[name="characteristic_id"]').val(data.id);
            $('#exampleModal').modal('show');
        }
    });
}
function addChra(){


     $('#exampleModalLabel').text('Add Characteristic');
     $('form').attr('action', 'characteristic.store');
     $('#update_btn').text('Save');
     $("input[name='_method']").val("POST");



}