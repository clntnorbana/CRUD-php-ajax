$(document).ready(function () {
  displayUser();
  createUser();
  deleteUser();
  readUser();
  updateUser();
});

var msg = $("#message");

// hide message
function hideMessage() {
  setTimeout(() => {
    msg.hide();
  }, 3000);
}

// display data
function displayUser() {
  $.ajax({
    url: "includes/display.php",
    type: "POST",
    success: function (response) {
      response = $.parseJSON(response);
      if (response.status == 200) {
        $("#table").html(response.data);
      }
    },
  });
}

// create data
function createUser() {
  $(document).on("click", "#create", function (e) {
    e.preventDefault();

    let username = $("#username").val();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let password = $("#password").val();
    let confirmPassword = $("#confirm_password").val();

    $.ajax({
      url: "includes/create.php",
      type: "POST",
      data: {
        username: username,
        firstname: firstname,
        lastname: lastname,
        password: password,
        confirm_password: confirmPassword,
        create_user: true,
      },
      success: function (response) {
        response = $.parseJSON(response);

        if (response.status == 200) {
          displayUser();
          msg.show();
          msg.text(response.message);
          $("#create_form")[0].reset();
        }
        if (
          response.status == 400 ||
          response.status === 401 ||
          response.status == 402
        ) {
          msg.show();
          msg.text(response.error);
        }

        hideMessage();
      },
    });
  });
}

// delete data
function deleteUser() {
  $(document).on("click", "#delete", function () {
    let userId = $(this).val();

    $.ajax({
      url: "includes/delete.php",
      type: "POST",
      data: {
        delete_user: true,
        user_id: userId,
      },
      success: function (response) {
        response = $.parseJSON(response);

        if (response.status == 200) {
          msg.show();
          msg.text(response.message);
          displayUser();
        }
        if (response.status == 400) {
          msg.text(response.error);
        }

        hideMessage();
      },
    });
  });
}

// read data
function readUser() {
  $(document).on("click", "#edit", function () {
    let userId = $(this).val();

    $.ajax({
      url: "includes/read.php?user_id=" + userId,
      type: "GET",
      success: function (response) {
        response = $.parseJSON(response);

        if (response.status == 200) {
          $("#edit_form").html(response.data);
        }

        if (response.status == 400 || response.status == 404) {
          msg.text(response.error);
        }
      },
    });
  });
}

// update data
function updateUser() {
  $(document).on("click", "#update", function (e) {
    e.preventDefault();

    let userId = $("#edit-userid").val();
    let newUsername = $("#edit-username").val();
    let newFirstname = $("#edit-firstname").val();
    let newLastname = $("#edit-lastname").val();

    $.ajax({
      url: "includes/update.php",
      type: "POST",
      data: {
        user_id: userId,
        newUsername: newUsername,
        newFirstname: newFirstname,
        newLastname: newLastname,
        update_user: true,
      },
      success: function (response) {
        response = $.parseJSON(response);

        let update_msg = $("#update_message");

        if (response.status == 200) {
          displayUser();
          update_msg.show();
          update_msg.text(response.message);
        }
        if (response.status == 400 || response.status == 401) {
          update_msg.show();
          update_msg.text(response.error);
        }

        setTimeout(() => {
          update_msg.hide();
        }, 3000);
      },
    });
  });
}
