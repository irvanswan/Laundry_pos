<!-- Sidebar -->

<!-- Query Menu -->
<?php
$role_id = $this->session->userdata('role_id');
$queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` =  $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC";
$menu = $this->db->query($queryMenu)->result_array();
// var_dump($menu);
// die;
?>
<!-- ./Query Menu -->

<div class="sidebar" data-color="blue">
    <!-- Logo -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            KL
        </a>
        <a href="#" class="simple-text logo-normal">
            Kuy Laundry
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">

            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                      FROM `user_sub_menu` JOIN `user_menu`
                        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                      WHERE `user_sub_menu`.`menu_id` = $menuId
                      AND `user_sub_menu`.`is_active` = 1";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?> "></i>
                            <?= $sm['title'] ?>
                        </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <li>
                    <a href="<?= base_url('auth/logout') ?>" onclick="return confirm('Apakah anda yakin ingin keluar?');">
                        <i class="now-ui-icons media-1_button-power"></i>
                        <p>Logout</p>
                    </a>
                </li>
        </ul>
    </div>
</div>
<!-- End of Sidebar -->