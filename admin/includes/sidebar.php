<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="<?php if ($pageid == 1) {
                    echo "active";
                } ?>" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a class="<?php if ($pageid == 2) {
                    echo "active";
                } ?>" href="projects">
                    <i class="bi bi-file-earmark-person-fill"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li>
                <a class="<?php if ($pageid == 3) {
                    echo "active";
                } ?>" href="services">
                    <i class="bi bi-file-person-fill"></i>
                    <span>Services</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>