<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <div class="main">
        <div class="container">
            <div id="edit_form"></div>
            <section id="table"></section>
        </div>
    </div>

    <form id="create_form">
        <span id="message" style="display: none;"></span>
        <h3>Create User</h3>
        <input id="username" name="username" type="text" placeholder="Username">
        <input id="firstname" name="firstname" type="text" placeholder="First Name">
        <input id="lastname" name="lastname" type="text" placeholder="Last Name">
        <input id="password" name="password" type="password" placeholder="Create Password">
        <input id="confirm_password" name="create_password" type="password" placeholder="Confirm Password">
        <button id="create" type="submit">Submit</button>
    </form>
    
    <script src="js/main.js"></script>
</body>
</html>