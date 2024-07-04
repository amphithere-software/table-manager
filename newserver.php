<!DOCTYPE html>
<head>
<link rel="icon" href="cat-avatar.png">
<link rel="stylesheet" type="text/css" href="stylesheet.css" />

<script>

function validate() {


  var status_num = /^[0-1]{1}$/;
  var letters = /^[A-Za-z ]{1,25}$/;
  var letters_numbers = /^[A-Za-z0-9 ]{1,25}$/;
  var passwordLetters = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
  var ip_address = /^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/;
  var status = document.getElementById("status").value;
  var ip = document.getElementById("ip_address").value;
  var memory = document.getElementById("memory").value;
  var name = document.getElementById("name").value;
  var type = document.getElementById("type").value;
  

  if (!status.match(status_num)) {
    alert("Not a valid status");
    return false;
  }

  if (!ip.match(ip_address)) {
    alert("Not a valid IP Address");
    return false;
  }

  if (!memory.match(letters_numbers)) {
    alert("Not a valid memory");
    return false;
  }

  if (!name.match(letters)) {
    alert("Not a valid name");
    return false;
  }

  if (!type.match(letters)) {
    alert("Not a valid type");
    return false;
  }


}


</script>

</head>
<h1 id="headerTitle">New Server</h1>

<div>
  <form class="form-container" method="post" action="dbconnect.php" onsubmit="return validate()">

    <label for="email"><b>Status</b></label>
    <input type="text" placeholder="status" name="status" id="status" required>

    <label for="email"><b>IP Address</b></label>
    <input type="text" placeholder="ip_address" name="ip_address" id="ip_address" required>

    <label for="email"><b>Memory</b></label>
    <input type="text" placeholder="memory" name="memory" id="memory" required>

    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="name" name="name" id="name" required>

    <label for="email"><b>Type</b></label>
    <input type="text" placeholder="type" name="type" id="type" required>

    <button type="submit" name="submit" class="btn">Create</button>
    <button type="button" class="btn cancel" onclick="window.location.href='dbconnect.php'">Close</button>
  </form>
</div>