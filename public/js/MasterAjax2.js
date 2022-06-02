var url = $('#url').val();
clearload()

const actions2 = {
  save: function (type, my_url, state, form, actions = '', view = '') {
    var st = state;
    $('.btn-save').prop("disabled", true);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })


    no = $('#page_no_data').val();

    switch (actions) {
      case "file":
        $.ajax({
          type: type,
          url: my_url,
          data: form,
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          success: function (data) {
            console.log('Error:', data);
            $('.btn-save').prop("disabled", false);
            messages(data);
            if(st == 'add'){
                n = 1;
            }else{
              if (no) {
                n = no;
              } else {
                n = 1;
              }
            }

            getData(n, datasearch(data), data);

            $("#index_blade").show();
            $("#show_blade").hide();
            if (!view) {
              $("#FormModal").modal('hide');
            }


          },
          error: function (data) {
            $('.btn-save').prop("disabled", false);
            console.log('Error:', data);
            messageserror(data);
          }
        });
        break;
      case 'submod':
        $.ajax({
          type: type,
          url: my_url,
          data: form,
          dataType: 'json',
          success: function (data) {
            $('.btn-save').prop("disabled", false);
            console.log('Error:', data);
            //messages(data);
            returnsubmod(data);
          },
          error: function (data) {
            $('.btn-save').prop("disabled", false);
            console.log('Error:', data);
            messageserror(data);
          }
        });
        break;
      default:
        $.ajax({
          type: type,
          url: my_url,
          data: form,
          dataType: 'json',
          success: function (element) {
              data = element.data
            console.log('Error:', data);
            $('.btn-save').prop("disabled", false);
            //messages(data);
            if(element.st == '0'){
                Swal.fire({
                    title: "Error",
                    text: "No es hora lavoral",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    document.location.reload(true)
                  })
            }
            if(element.st == '1'){
                Swal.fire({
                    title: "Folio",
                    text: `Este es el folio ${data.folio}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    document.location.reload(true)
                  })
            }
            if (no) {
              n = no;
            } else {
              n = 1;
            }
            getData(n, datasearch(data), data);

            $("#index_blade").show();
            $("#show_blade").hide();
            if (!view) {
              $("#FormModal").modal('hide');
            }
          },
          error: function (data) {
            $('.btn-save').prop("disabled", false);
            console.log('Error:', data);
            messageserror(data);
          }
        });
    }
  },
  show: function (my_url, key = '', view = '',nv = '',) {
    if (key) {
      $('.btn-show-' + key).prop("disabled", true);
      $('.btn-detail-' + key).prop("disabled", true);
    } else {
      $('.btn-create').prop("disabled", true);
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: my_url,
      success: function (data) {
        if (key) {
          $('.btn-show-' + key).prop("disabled", false);
          $('.btn-detail-' + key).prop("disabled", false);
        } else {
          $('.btn-create').prop("disabled", false);
        }
        $("#card_show").empty().html('');
        $("#card_show2").empty().html('');

        if (nv == true) {
            $("#card_show2").empty().html(data);
            $("#show_blade2").show();
            $("#FormModal").modal('show');
        } else {
            $("#card_show").empty().html(data);
            $("#show_blade").show();
              if (!view) {
                $("#FormModal").modal('show');
            }else{
              $("#index_blade").hide();
            }

        }

      },
      error: function (data) {
        console.log('Error:', data);
        if (key) {
          $('.btn-show-' + key).prop("disabled", false);
          $('.btn-detail-' + key).prop("disabled", false);
        } else {
          $('.btn-create').prop("disabled", false);
        }
      }
    });
  },
  restored: function (my_url) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      type: "DELETE",
      url: my_url,
      success: function (data) {
        messages(data);
        getData(1, datasearch(data), data);
      },

      error: function (data) {
        console.log('Error:', data);
        messageserror(data);

      }
    });
  },
  delete: function (my_url) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      type: "DELETE",
      url: my_url,
      success: function (data) {
        messages(data);
        getData(1, datasearch(data), data);
        document.location.reload(true)
      },
      error: function (data) {
        console.log('Error:', data);
        messageserror(data);
        if (data.responseJSON.message == "CSRF token mismatch.") {
          location.replace("/")
        }
      }
    });
  },
  status: function (my_url, ) {
    no = $('#page_no_data').val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      type: "GET",
      url: my_url,
      success: function (data) {
        if (no) {
          n = no;
        } else {
          n = 1;
        }
        messages(data);
        getData(n, datasearch(data), data);
      },
      error: function (data) {
        console.log('Error:', data);
        messageserror(data);
        if (data.responseJSON.message == "CSRF token mismatch.") {
          location.replace("/")
        }
      }
    });
  },
  detail: function (my_url, action = '') {
    $('.btn-show-' + action).prop("disabled", true);
    $('.btn-detail-' + action).prop("disabled", true);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    var form = { action: action };
    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: my_url,
      data: form,
      success: function (data) {
        $('.btn-detail-' + action).prop("disabled", false);
        $('.btn-show-' + action).prop("disabled", false);
        $("#card_show").empty().html(data);
        $("#show_blade").show();
        $("#FormModal").modal('show');
      },
      error: function (data) {
        console.log('Error:', data);
        $('.btn-detail-' + action).prop("disabled", false);
        $('.btn-show-' + action).prop("disabled", false);
        //location.replace("/")
      }
    });
  },
  back: function () {
    $("#index_blade").show();
    $("#show_blade").hide();
  },
  status_item_id: function (my_url,id) {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      type: "GET",
      url: my_url,
      success: function (data) {
        messages(data);
        $("#search").val(id).trigger('change');
        $('#' + data.name).css("background-color", data.color);
      },
      error: function (data) {
        console.log('Error:', data);
        messageserror(data);
        if (data.responseJSON.message == "CSRF token mismatch.") {
          location.replace("/")
        }
      }
    });
  },
}
