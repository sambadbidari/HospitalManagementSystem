<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse">       
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="">
                        <i>Welcome! </i> <?php echo $_SESSION["admin_name"]?>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/htdocs/new/function/logout.php">
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>