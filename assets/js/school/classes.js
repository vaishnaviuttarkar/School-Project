$(document).ready(function() {
    $('#class_list').DataTable();
});

function edit_class(srno) {
    var base_url=$('#base_url').val();

    Swal.fire({
        title: "Do you want to edit?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#000",
        confirmButtonText: "Edit",
        }).then((result) => {

        setCookie('c_srno',srno,300);
        window.location.href=base_url+"/School/edit_class";
    });
}


function delete_entry(srno) {
    var base_url=$('#base_url').val();

    // alert(base_url+"/School/ajax_class_delete?srno="+srno);
    Swal.fire({
        title: "Do you want to delete?",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Delete",
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
              url: base_url+"/School/ajax_class_delete?srno="+srno,
              type: "GET",
              dataType: "JSON",
              success: function(data) {
                  // Handle the received data
                  var myObjectString = JSON.stringify(data);
                  var myarray = jQuery.parseJSON(myObjectString);
                  if(myarray.result>0)
                  {
                      alert("Deleted succesfully");
                      window.location.href=base_url+"/School/classes";
                  }
              },
          });
        }
    });

}


function setCookie(cName, cValue, expDays) {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}
