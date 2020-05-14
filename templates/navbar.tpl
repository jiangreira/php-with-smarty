<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="list.php">Laravel Practice</a>
    <span class="text-info d-none d-lg-block">Hi,{$smarty.session.username}</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item {if  $nowpage=='list'} active{/if} ">
                <a class="nav-link" href="list.php">List</a>
            </li>
            <li class="nav-item {if  $nowpage=='create'} active{/if} ">
                <a class="nav-link" href="create.php">Create</a>
            </li>
            <li class="nav-item {if  $nowpage=='charts'} active{/if} ">
                <a class="nav-link" href="charts.php">Charts</a>
            </li>
        </ul>
     

        <a class="btn btn-outline-info my-2 my-sm-0 mr-2" href="api/sign.api.php?sign=logout">Log Out</a>

    </div>

</nav>