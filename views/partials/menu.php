<?php
if(!defined('RESTRICTED')){
  define('RESTRICTED',1);
}
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/scripts/functions.php');
?>
<link rel="stylesheet" type="text/css" href="<?php $path?>/dist/css/menu.css">
<?php
foreach(selectUsers() as $userRows) {
    $userLevel = $userRows['loginLevel'];
    if($userLevel == 0){
?>
<div class="menu">
  <nav class="menu__nav">
    <ul class="menu__list r-list">
      <li class="menu__group">
        <a href="#0" class="menu__link r-link"><i class='bx bxs-user-detail'></i> <?php echo $lang['menu_user_about_me']?></a>
      </li>
      <li class="menu__group">
        <a href="#0" class="menu__link r-link"><i class='bx bxs-church'></i> <?php echo $lang['menu_user_church']?></a>
      </li>
      <li class="menu__group">
        <a href="#0" class="menu__link r-link"><i class='bx bxs-label' ></i> <?php echo $lang['menu_user_status']?></a>
      </li>
      <li class="menu__group">
        <a href="#0" class="menu__link r-link"><i class='bx bxs-bell-ring'></i> <?php echo $lang['menu_user_church_notifications']?></a>
      </li>
      <li class="menu__group">
        <a href="#0" class="menu__link r-link"><i class='bx bxs-info-circle' ></i> <?php echo $lang['menu_about_soft']?></a>
      </li>
      <li class="menu__group">
        <a href="#0" class="menu__link r-link"><i class='bx bx-detail'></i> <?php echo $lang['menu_user_privacy_policy']?></a>
      </li>
      <li class="menu__group" style="padding-top: 10%;">
        <a href="#0" class="menu__link r-link"><i class='bx bxs-exit' ></i> <?php echo $lang['menu_logout']?></a>
      </li>
    </ul>
  </nav>
  <button class="menu__toggle r-button" type="button">
    <span class="menu__hamburger m-hamburger">
      <span class="m-hamburger__label">
        <span class="menu__toggle-hint screen-reader">Open menu</span>
      </span>
    </span>
  </button>
</div>

<?php
    } elseif($userLevel == 1){
        echo "Level 1";
?>

<?php
    } elseif($userLevel == 2){
        echo "Level 2";
?>


<?php
    }
}
 ?>


<script type="text/javascript">
(function(){
  'use strict';

  class Menu {
    constructor(settings) {
      this.menuRootNode = settings.menuRootNode;
      this.isOpened = false;
    }
    
    changeMenuState(menuState) {
      return this.isOpened = !menuState;
    }
    
    changeToggleHint(toggleHint, toggleNode) {
      toggleNode.textContent = toggleHint;
      return toggleHint; 
    }
  }

  const menuClassesNames = {
    rootClass: 'menu',
    activeClass: 'menu_activated',
    toggleClass: 'menu__toggle',
    toggleHintClass: 'menu__toggle-hint'
  }
  
  const jsMenuNode = document.querySelector(`.${menuClassesNames.rootClass}`);
  const demoMenu = new Menu ({
    menuRootNode: jsMenuNode
  });
  
  function getCurrentToggleHint(currentMenuState) {
    return (currentMenuState !== true) ? 'Open menu' : 'Close menu';
  }
  
  function toggleMenu(event) {
    
      let currentMenuState = demoMenu.changeMenuState(demoMenu.isOpened);
      let toggleHint = getCurrentToggleHint(currentMenuState);
      
      demoMenu.changeToggleHint(
        toggleHint, 
        demoMenu.menuRootNode.querySelector(`.${menuClassesNames.toggleHintClass}`)
      );
      demoMenu.menuRootNode.classList.toggle(`${menuClassesNames.activeClass}`);
      
      return currentMenuState;  
  }
  
  jsMenuNode.querySelector(`.${menuClassesNames.toggleClass}`).addEventListener('click', toggleMenu);
})();
</script>