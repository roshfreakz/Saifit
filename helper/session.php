<script>
    var userData = JSON.parse(sessionStorage.getItem("userData"));
    // console.log(userData);
    if (userData == null) window.location.href = "login.php";
</script>