var url = $("#url").val();
var baseUrl = $("#baseUrl").val();

//section for jquery
$(document).ready(function () {
    let btn = document.getElementById('create');
        date = new Date().getHours();
        (date >= 13 && date <= 22)? btn.disabled = false: btn.disabled = true;
    $(".search-query").bind("keyup change", function () {
        event.preventDefault();
        var filter = datasearch();
        getData(1, filter);
    });
});

function datasearch(answer) {
    data = answer
        ? {
              search: $("#search").val(),
          }
        : {
              search: $("#search").val(),
          };

    return data;
}

const home = {
    create: function () {
        let restaurant = document.getElementById('restaurant_id');
        let ubication = document.getElementById('ubication_zone_id');
        let user = document.getElementById('user_id');
        let table = document.getElementById('ubication_table_id');
        let hour = document.getElementById('hour_id');
        let exist = document.getElementById('edit');
        let editId = document.getElementById('editId');
        exist.value = 'save';
        editId.value = ''

        restaurant.innerHTML = `<option value="">Select a option</option>`
        ubication.innerHTML = `<option value="">Select a option</option>`
        user.innerHTML = `<option value="">Select a option</option>`
        table.innerHTML = `<option value="">Select a option</option>`
        hour.innerHTML = `<option value="">Select a option</option>`
        let date = document.getElementById('date');
        date.value = '';

        ubication.disabled = true;
        user.disabled = true;
        table.disabled = true;
        date.disabled = true;
        hour.disabled = true;

       $.ajax({
           method: "GET",
           url:`${url}/create`
       })
       .done((data)=>{
           data.restaurans.forEach(element => {
                restaurant.innerHTML += `<option value=${element.id}>${element.name}</option>`
           });
           data.ubication_zones.forEach(element => {
            ubication.innerHTML += `<option value=${element.id}>${element.name}</option>`
       });
       data.users.forEach(element => {
        user.innerHTML += `<option value=${element.id}>${element.name}, ${element.RFC}</option>`
   });
       });
    },
    ubication: function () {
        let date = document.getElementById('date');
        date.value = '';
        let hour = document.getElementById('hour_id');
        hour.innerHTML = `<option value="">Select a option</option>`
        let ubication = document.getElementById('ubication_zone_id');
        ubication.disabled = false;
    },
    tables: function () {
        let restaurant = document.getElementById('restaurant_id');
        let table = document.getElementById('ubication_table_id');
        let ubication = document.getElementById('ubication_zone_id');
        let hour = document.getElementById('hour_id');
        let date = document.getElementById('date');
        date.value = '';
        hour.innerHTML = `<option value="">Select a option</option>`
        table.innerHTML = `<option value="">Select a option</option>`
        table.disabled = false;
        let id = restaurant.value
        let ubication_zone_id = ubication.value
        $.ajax({
            method: "GET",
            url:`${url}/ubicationtable`,
            data: {'id': id,'ubication_zone_id':ubication_zone_id}
        })
        .done((data)=>{
            data.tables.forEach((element) => {
                 table.innerHTML += `<option value=${element.id}>${element.table_number}</option>`
            });

        });

    },
    users: function ()
    {   let date = document.getElementById('date');
        let hour = document.getElementById('hour_id');
        date.value = ''
        hour.innerHTML = `<option value="">Select a option</option>`
        let user = document.getElementById('user_id');
        user.disabled = false;
    },
    dateE: function ()
    {
        let date = document.getElementById('date');
        let hour = document.getElementById('hour_id');
        date.disabled = false;
        hour.disabled = false;
    },
    date: function ()
    {

        let restaurant = document.getElementById('restaurant_id');
        let ubication = document.getElementById('ubication_zone_id');
        let table = document.getElementById('ubication_table_id');
        let date = document.getElementById('date');
        let hour = document.getElementById('hour_id');
        hour.innerHTML = `<option value="">Select a option</option>`
        let ubication_table_id = table.value;
        let ubication_zone_id = ubication.value
        let dateS = date.value;
        hour.disabled = false;
        $.ajax({
            method: "GET",
            url:`${url}/date`,
            data: {'id': ubication_table_id,'ubication_zone_id':ubication_zone_id,'date':dateS}
        })
        .done((data)=>{

            data.forEach(element => {
                hour.innerHTML += `<option value=${element.id}>${element.in} - ${element.out}</option>`
            });

        });

    },
    store: function (id = '') {
        let exist = document.getElementById('edit');
        let editId = document.getElementById('editId');
        (exist.value == 'update')? state ='update': state ='save'
        let clickEvent = new Event('click');
        let button = document.getElementById('closeM');
        var form = $('#formR').serialize();
        console.log(form)
        var my_url = url + '/store';
        var type = "POST";

        if (state == 'update') {
          var my_url = url + '/' + editId.value;
          var type = "PUT";
        }
        actions.save(type, my_url, state, form);
        button.dispatchEvent(clickEvent)
        //document.location.reload(true)
      },

      showRev: function (id)
      {
        let restaurant = document.getElementById('restaurant_id');
        let ubication = document.getElementById('ubication_zone_id');
        let user = document.getElementById('user_id');
        let table = document.getElementById('ubication_table_id');
        let hour = document.getElementById('hour_id');
        let date = document.getElementById('date');
        let exist = document.getElementById('edit');
        let editId = document.getElementById('editId');
        let invoce = document.getElementById('invoce');
        exist.value = 'update';
        invoce.checked = false
        ubication.disabled = false;
        restaurant.innerHTML = `<option value="">Select a option</option>`
        ubication.innerHTML = `<option value="">Select a option</option>`
        user.innerHTML = `<option value="">Select a option</option>`
        table.innerHTML = `<option value="">Select a option</option>`
        hour.innerHTML = `<option value="">Select a option</option>`
        restaurant.disabled = false;
        ubication.disabled = false;
        user.disabled = false;
        table.disabled = false;
        hour.disabled = false;
        $.ajax({
            method: "GET",
            url:`${url}/show/${id}`,

        })
        .done((data)=>{
            editId.value = data.reservation.id;
            (data.reservation.invoce) ? invoce.checked = true: null;
            data.restaurant.forEach(element => {
                restaurant.innerHTML += `<option value=${element.id} ${(element.id == data.reservation.restaurant_id)? 'selected':null} >${element.name}</option>`
            });
            data.ubication_zone.forEach(element => {
                ubication.innerHTML += `<option value=${element.id} ${(element.id == data.reservation.ubication_zone_id)? 'selected':null}>${element.name}</option>`
           });
           data.ubication_table.forEach((element) => {
            table.innerHTML += `<option value=${element.id} ${(element.id == data.reservation.ubication_table_id)? 'selected':null}>${element.table_number}</option>`
       });
       user.innerHTML += `<option value=${data.reservation.user.id} selected>${data.reservation.user.name}, ${data.reservation.user.RFC}</option>`
       date.value = data.reservation.day;
       hour.innerHTML += `<option value=${data.reservation.hour.id} selected>${data.reservation.hour.in} - ${data.reservation.hour.out}</option>`
       data.hour.forEach(element => {
        hour.innerHTML += `<option value=${element.id}>${element.in} - ${element.out}</option>`
    });
    });
      },

      delete: function (id) {
        Swal.fire({
          title: "Do you want to Delete the Reservation?",
          text: "The Reservation will be Eliminated",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
          if (result.value) {
            var my_url = url + '/' + id;
            actions.delete(my_url);
          }
        })

      },

};
