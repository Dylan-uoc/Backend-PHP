<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;min-height: 3.5rem">
    <div class="container-fluid mt-2 mb-2">
        <div class="col-lg-12">
            <div class="col-md-1 float-left" style="display: flex;">

            </div>
            <div class="col-md-4 float-left text-white">
                <large><b>School Faculty Scheduling System</b></large>
            </div>
            <div class="float-right">
                <div class=" dropdown mr-4">
                    <a href="#" class="text-white dropdown-toggle" id="account_settings" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ $usuario->name }}</a>
                    <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                        <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i
                                class="fa fa-cog"></i> Manage Account</a>
                        <a class="dropdown-item" href="/logout"><i class="fa fa-power-off"></i>
                            Logout</a>
                    </div>
                </div>
            </div>
        </div>

</nav>
