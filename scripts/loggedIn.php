
<ul class="nav navbar-nav navbar-right pull-right">
    <li><div  style="margin-right: 20px;" class="btn-group">
        <button class="btn btn-success login-button-margin" id="loggedInUser" ><?php echo $_SESSION['name']; ?></button>
        <button class="btn dropdown-toggle login-button-margin btn-success" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="index.php">Rooster Tax</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="editProfile.php">Edit Profile</a></li>
            <li><a href="scripts/logout.php">Logout</a></li>
        </ul>
        </div>
    </li>
</ul>


<script>

    $(document).ready(function(){
        $("#loggedInUser").click(function(){
            window.open('home.php','_self');
        });
    });

</script>



