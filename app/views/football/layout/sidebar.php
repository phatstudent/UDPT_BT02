<aside>
    <div class="sidebar left ">
        <div class="user-panel">

            <?php if(isset($_SESSION['user_name'])): ?>
                <div class="pull-left image">
                <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?=$_SESSION['user_name']?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            <?php endif; ?>
        </div>
        <ul class="list-sidebar bg-defoult">
            <li> <a href="#" data-toggle="collapse" data-target="#players" class="collapsed active"> <i class="fa fa-th-large"></i> <span class="nav-label"> Players </span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="players">
                    <li><a href="<?=ROOT?>players">Show all</a></li>
                    <li><a href="<?=ROOT?>players/AddPlayer">Add players</a></li>
                </ul>
            </li>
            <li> <a href="#" data-toggle="collapse" data-target="#clubs" class="collapsed active"> <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Clubs</span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="clubs">
                    <li><a href="<?=ROOT?>players">Show all</a></li>
                    <li><a href="#">Manage clubs</a></li>
                </ul>
            </li>
            <!-- <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa fa-chevron-left pull-right"></span></a>
                <ul class="sub-menu collapse" id="tables">
                    <li><a href=""> Static Tables</a></li>
                    <li><a href=""> Data Tables</a></li>
                    <li><a href=""> Foo Tables</a></li>
                    <li><a href=""> jqGrid</a></li>
                </ul>
            </li>
            <li> <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a> </li>
            <li> <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a> </li>
            <li> <a href=""><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span> </a></li>
            <li> <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span></a> </li> -->
        </ul>
    </div>
</aside>

<!-- <script>
    jQuery(function($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });
    });
</script> -->