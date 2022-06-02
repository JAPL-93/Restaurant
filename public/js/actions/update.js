var url = $("#url").val();
var baseUrl = $("#baseUrl").val();

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
const update = {
    save: function (state, id = '') {
        var formData1 = document.getElementById('upuser');
    var form = new FormData(formData1);
        console.log(form)
        var my_url = url + '/create';
        $.ajax({
            type: "POST",
            url: my_url,
            data: form,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
               var myWindow = window.open();
               data.forEach(element => {
                   myWindow.document.write(`<br> Name: ${element.name} ${element.last_name}, RFC: ${element.RFC}  `)
               });
            },
            error: function (data) {
              $('.btn-save').prop("disabled", false);
              console.log('Error:', data);
              messageserror(data);
            }
          });
      },
}
