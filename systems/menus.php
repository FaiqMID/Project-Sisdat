<?php
include_once("config/Config.php");
include_once("libs/database.php");
$Sql = "SELECT a.MENUSCODE AS MENUSCODE, a.MENUS, a.ICON, a.TYPEID, a.ORDERBY AS ORDERBY FROM tmenus a, tmenugroup b WHERE a.MENUID=b.MENUID AND b.GROUPID=".$_SESSION['groupid']."
union
SELECT  a.MENUSCODE  AS MENUSCODE, a.MENUS, a.ICON, a.TYPEID, a.ORDERBY AS ORDERBY FROM tmenus a, tmembermenu c WHERE a.MENUID=c.ROOTMENUID AND c.MEMBERID IN 
(SELECT a.MENUID FROM tmenus a, tmenugroup b, tmembermenu c WHERE a.MENUID=b.MENUID AND a.MENUID=c.MEMBERID AND b.GROUPID=".$_SESSION['groupid'].")
GROUP BY a.MENUSCODE, a.MENUS, a.TYPEID
ORDER BY MENUSCODE, ORDERBY";    
//echo $Sql;
$menu = $Conn[0]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
$isrootfirst = true;

?>
 	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <?php
		while($R=$Conn[2]->Row($menu)){
		 if ($R['TYPEID']== 1){
		  if ($isrootfirst== false){
			  echo "</ul>
					</li>";
		  }
		  $isrootfirst= false;
		?>
		  <li class="nav-item <?php if(isset($_GET['module']) && substr($_GET['module'],0,3)==$R['MENUSCODE']) { echo "menu-open"; } ?>">
            <a  href="#" class="nav-link <?php if(isset($_GET['module']) && substr($_GET['module'],0,3)==$R['MENUSCODE']) { echo "active"; } ?>">
              <i class="nav-icon fas <?php echo $R['ICON']; ?>"></i>
              <p>
		     <?php echo $R['MENUS']; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			  <?php
			  }
			  if ($R['TYPEID']== 2){
			  ?>
              <li class="nav-item">
                <a href="./?module=<?php echo $R['MENUSCODE'];?>" class="nav-link <?php if(isset($_GET['module']) && $_GET['module']==$R['MENUSCODE']) { echo "active"; } ?>">
                  <i class="far <?php echo $R['ICON'];?> nav-icon"></i>
                  <p><?php echo $R['MENUS'] ?></p>
                </a>
              </li>
			<?php 
			   }
			}
			?>
            </ul>
          </li>
		  <li class="nav-item">
			<a href="#" class="nav-link" data-toggle="modal" data-target="#myModal">
			  <i class="fas fa-sign-out-alt nav-icon"></i>
			  <p>Logout</p>
			</a>
		  </li>
        </ul>
      </nav>