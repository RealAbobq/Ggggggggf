<?php
  //catalog by pig
require_once 'core/config.php';
  $title = "$sitename - Catalog";
include 'core/header.php';
include 'core/nav.php';
//selected by default are these 3  
$mthing = "Recently Updated";
$tthing = "Hats";
$t2thing = "All-Time";
  
if($_GET['m'] == "TopFavorites"){
$mthing = "Top Favorites";
}
  
if($_GET['m'] == "BestSelling"){
$mthing = "Best Selling";
}

if($_GET['m'] == "RecentlyUpdated"){
$mthing = "Recently Updated";
}
  
  if($_GET['m'] == "ForSale"){
$mthing = "For Sale";
}
  


  // bthing is for accurate urls

if(!$_GET['c']){
$tthing = "Hats";
$bthing = "1";
}

if($_GET['c'] == "7"){
$tthing = "Heads";
  $bthing = "7";
}

if($_GET['c'] == "8"){
$tthing = "Faces";
$bthing = "8";
}

  
if($_GET['c'] == "1"){
$tthing = "Hats";
$bthing = "1";
}
if($_GET['c'] == "2"){
$tthing = "T-Shirts";
$bthing = "2";
}
  
if($_GET['c'] == "5"){
$tthing = "Shirts";
$bthing = "5";
}
  
  if($_GET['c'] == "6"){
$tthing = "Pants";
$bthing = "6";
}
  
if($_GET['c'] == "4"){
$tthing = "Decals";
$bthing = "4";
}
  
  if($_GET['c'] == "3"){
$tthing = "Models";
$bthing = "3";
}
  
  if($_GET['c'] == "20"){
$tthing = "Places";
$bthing = "20";
}
  
  

if($_GET['t'] == "PastDay"){
$t2thing = "Past Day";
$bthing2 = "PastDay";
}

if($_GET['t'] == "PastWeek"){
$t2thing = "Past Week";
$bthing2 = "PastWeek";
}
  
if($_GET['t'] == "PastMonth"){
$t2thing = "Past Month";
$bthing2 = "PastMonth";
}
  
  if($_GET['t'] == "AllTime"){
$t2thing = "All-Time";
$bthing2 = "AllTime";
}
  ?>
<?php       
            if($tthing == "Heads"){ $type2 = "head"; }           
            if($tthing == "Faces"){ $type2 = "face"; }
            if($tthing == "Hats"){ $type2 = "hat"; }
            if($tthing == "T-Shirts"){ $type2 = "tshirt"; }
            if($tthing == "Shirts"){ $type2 = "shirt"; }
            if($tthing == "Pants"){ $type2 = "pants"; }
            if($tthing == "Decals"){ $type2 = "decal"; }
            if($tthing == "Models"){ $type2 = "model"; } 
?>
<?php
  if($_SESSION["loggedin"] != 'true'){
$yourl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
header("Location: /Login/Default.aspx?ReturnUrl=".$yourl); exit;}
?>
<?php
  
  $resultsperpage = 20;

            if($tthing == "Heads"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }                       
            if($tthing == "Faces"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }
            if($tthing == "Hats"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }
            if($tthing == "T-Shirts"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }
            if($tthing == "Shirts"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }
            if($tthing == "Pants"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }
            if($tthing == "Decals"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }
            if($tthing == "Models"){ $check = mysqli_query($link, "SELECT * FROM catalog WHERE `type` = '".$type2."'"); }
            if($tthing == "Places"){ $check = mysqli_query($link, "SELECT * FROM games"); }
  
                    $usercount = mysqli_num_rows($check);

                    $numberofpages = ceil($usercount/$resultsperpage);

if(!isset($_GET['p'])) {
                        $page = 1;
                    }else{
                        $page = (int)addslashes($_GET['p']);
                    }
$prev = $page - 1; $next = $page + 1;
  
    ?>
<div id="CatalogContainer" style="margin-top: 10px;">
 
        <div class="pt-3"></div>
 <div class="DisplayFilters">
      <h2>Catalog</h2>
      <div id="BrowseMode">
          <h4><a id="ctl00_cphRoblox_rbxCatalog_CafePressHyperLink" href="/my/accountbalance/trade">Trade Currency!</a></h4>
        <h4>Browse</h4>
        <?php $sel = '<img id="ctl00_cphRoblox_rbxGames_MostPopularBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>'; ?>
        <ul>
          <li><?php if($mthing == "Top Favorites"){ echo $sel; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=TopFavorites&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($mthing == "Top Favorites"){?><b><?}?>Top Favorites<?php if($mthing == "Top Favorites"){?></b><?}?></a></li>
          <li><?php if($mthing == "Best Selling"){ echo $sel; }?><a id="ctl00_cphRoblox_rbxGames_hlTopFavorites" href="Catalog.aspx?m=BestSelling&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($mthing == "Best Selling"){?><b><?}?>Best Selling<?php if($mthing == "Best Selling"){?></b><?}?></a></li>
          <li><?php if($mthing == "Recently Updated"){ echo $sel; }?><a id="ctl00_cphRoblox_rbxGames_hlRecentlyUpdated" href="Catalog.aspx?m=RecentlyUpdated&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($mthing == "Recently Updated"){?><b><?}?>Recently Updated<?php if($mthing == "Recently Updated"){?></b><?}?></a></li>
          <li><?php if($mthing == "For Sale"){ echo $sel; }?><a id="ctl00_cphRoblox_rbxGames_hlRecentlyUpdated" href="Catalog.aspx?m=ForSale&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($mthing == "For Sale"){?><b><?}?>For Sale<?php if($mthing == "For Sale"){?></b><?}?></a></li>
        </ul>
      </div>
      <div id="Category">
        <h4>Category</h4>
        <?php $sel2 = '<img id="ctl00_cphRoblox_rbxGames_TimespanNowBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>'; ?>
            <ul>
            <li><?php if($tthing == "Heads"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=7&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Heads"){?><b><?}?>Heads<?php if($tthing == "Heads"){?></b><?}?></a></li>
            <li><?php if($tthing == "Faces"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=8&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Faces"){?><b><?}?>Faces<?php if($tthing == "Faces"){?></b><?}?></a></li>
            <li><?php if($tthing == "Hats"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=1&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Hats"){?><b><?}?>Hats<?php if($tthing == "Hats"){?></b><?}?></a></li>
            <li><?php if($tthing == "T-Shirts"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=2&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "T-Shirts"){?><b><?}?>T-Shirts<?php if($tthing == "T-Shirts"){?></b><?}?></a></li>
            <li><?php if($tthing == "Shirts"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=5&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Shirts"){?><b><?}?>Shirts<?php if($tthing == "Shirts"){?></b><?}?></a></li>
            <li><?php if($tthing == "Pants"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=6&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Pants"){?><b><?}?>Pants<?php if($tthing == "Pants"){?></b><?}?></a></li>
            <li><?php if($tthing == "Decals"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=4&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Decals"){?><b><?}?>Decals<?php if($tthing == "Decals"){?></b><?}?></a></li>
            <li><?php if($tthing == "Models"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=3&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Models"){?><b><?}?>Models<?php if($tthing == "Models"){?></b><?}?></a></li>
            <li><?php if($tthing == "Places"){ echo $sel2; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=20&t=<?=str_replace(' ', '', $bthing2);?>"><?php if($tthing == "Places"){?><b><?}?>Places<?php if($tthing == "Places"){?></b><?}?></a></li>
            </ul>
        <?php if($mthing == "Recently Updated"){ ?><?php }else{ ?>
        <div id="ctl00_cphRoblox_rbxCatalog_Timespan">
        <h4>Time</h4>
          <?php $sel3 = '<img id="ctl00_cphRoblox_rbxGames_TimespanNowBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>'; ?>
        <ul>
          <li><?php if($t2thing == "Past Day"){ echo $sel3; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=PastDay"><?php if($t2thing == "Past Day"){?><b><?}?>Past Day<?php if($t2thing == "Past Day"){?></b><?}?></a></li>
          <li><?php if($t2thing == "Past Week"){ echo $sel3; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=PastWeek"><?php if($t2thing == "Past Week"){?><b><?}?>Past Week<?php if($t2thing == "Past Week"){?></b><?}?></a></li>
          <li><?php if($t2thing == "Past Month"){ echo $sel3; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=PastMonth"><?php if($t2thing == "Past Month"){?><b><?}?>Past Month<?php if($t2thing == "Past Month"){?></b><?}?></a></li>
          <li><?php if($t2thing == "All-Time"){ echo $sel3; }?><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=AllTime"><?php if($t2thing == "All-Time"){?><b><?}?>All-Time<?php if($t2thing == "All-Time"){?></b><?}?></a></li>
        </ul>
      </div>
          <?php } ?>
      </div>
      
    </div>
  
    <div class="Assets">
      <span id="ctl00_cphRoblox_rbxCatalog_AssetsDisplaySetLabel" class="AssetsDisplaySet"><?php if($mthing == "Top Favorites"){?>Favorite<?php }else{ ?><?=$mthing?><?php } ?> <?=$tthing?><?php if($mthing == "Recently Updated"){ ?><?php }else{ ?>, <?php if($t2thing == "All-Time"){?>All Time<?php }else{ ?><?=$t2thing?><?php } ?><?php } ?></span>
              <?php if(mysqli_num_rows($check) == 0) { ?>
        <br><table width="735" cellspacing="0" border="0" align="Center">   <tbody>
    <tr>
     No items were found.         </tr>
   </tbody>
  </table><?php }else{ ?><div id="ctl00_cphRoblox_rbxCatalog_HeaderPagerPanel" class="HeaderPager">
        <?php if($page > 1){if($numberofpages > 0){?><a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>&p=<?=$prev;?>"><span class="NavigationIndicators"><<</span> Previous</a><?}}?>

            <span id="ctl00_cphRoblox_rbxGames_HeaderPagerLabel">Page <?=$page;?> of <?=$numberofpages;?>:</span>
            
            <?php if($page < $numberofpages){?><a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>&p=<?=$next;?>">Next <span class="NavigationIndicators">&gt;&gt;</span></a><?}?>
        </div>
      <table id="ctl00_cphRoblox_rbxCatalog_AssetsDataList" cellspacing="0" align="Center" border="0" width="735">
    <?php
    if($bthing == '7') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='head' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
            
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
                <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>
                </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php if($row['islimited'] !== 'no') {?><div class="AssetCreator">         <span class="Label" style="color:red;">Remaining:</span>         <span class="Detail">?</span>
        </div><?php } ?><?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
                <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '8') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='face' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
                   <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php if($row['islimited'] !== 'no') {?><div class="AssetCreator">         <span class="Label" style="color:red;">Remaining:</span> 
         <span class="Detail">?</span>
        </div><?php } ?>
                <?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
                <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '1') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='hat' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
                   <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php if($row['islimited'] !== 'no') {?><div class="AssetCreator">         <span class="Label" style="color:red;">Remaining:</span>         <span class="Detail">?</span>
        </div><?php } ?><?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
               <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '2') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='tshirt' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
               <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php if($row['islimited'] !== 'no') {?><div class="AssetCreator">         <span class="Label" style="color:red;">Remaining:</span>         <span class="Detail">?</span>
        </div><?php } ?><?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
                <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '5') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='shirt' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
              <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php if($row['islimited'] !== 'no') {?><div class="AssetCreator">         <span class="Label" style="color:red;">Remaining:</span>         <span class="Detail">?</span>
        </div><?php } ?><?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
                <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '6') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='pants' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
              <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
                <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '4') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='decal' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
                <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php if($row['islimited'] !== 'no') {?><div class="AssetCreator">         <span class="Label" style="color:red;">Remaining:</span>         <span class="Detail">?</span>
        </div><?php } ?><?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
                <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '3') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM catalog WHERE `type`='model' ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creatorid']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/Item.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/itemThumb.php?id=<?php echo $row['id']; ?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
                <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                <?php
            $ownedq = "SELECT * FROM owned_items WHERE itemid = '".$row['id']."'";
            $ownedr = mysqli_query($link, $ownedq);
            $ownedc = mysqli_num_rows($ownedr);
                  ?>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail"><?=$ownedc;?></span></div>
                <?php if($row['islimited'] !== 'no') {?><div class="AssetCreator">         <span class="Label" style="color:red;">Remaining:</span>         <span class="Detail">?</span>
        </div><?php } ?><?php
  $favorites = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE itemid='".$row['id']."'"));
  ?>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail"><?=$favorites;?> time<?php if($favorites > 1 || $favorites < 1) { echo "s"; } ?></span></div>
                
                
                
                <?php if($row['isoffsale'] == '0') {?><div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_Div3" class="AssetPrice"><?php if($row['price'] == '0') {?><span class="PriceForFree">Free</span><?php }else{?><span class="<?php if($row['buywith'] == 'tix') {echo 'PriceInTickets';} else {echo 'PriceInRobux';} ?>"><?php if($row['buywith'] == 'tix') {echo $tcatalog;} else {echo $rcatalog;} ?>: <?php echo $row['price']; ?></span><?php } ?></div>
              </div><?php } ?>
          </div>
        </td>
</a>
<?php }} } ?>
        <?php
    if($bthing == '20') {
            $thispagefirstresult = ($page-1)*$resultsperpage;
            $sql = "SELECT * FROM games ORDER BY id DESC LIMIT ".$thispagefirstresult.",".$resultsperpage;
            $result = mysqli_query($link, $sql);
            $resultCheck = mysqli_num_rows($result);
              
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $visitq = mysqli_query($link, "SELECT * FROM `gamesvisits` WHERE gameid = '".$row['id']."'");
                  $visits = mysqli_num_rows($visitq);
                  $creatorq = mysqli_query($link, "SELECT * FROM users WHERE id='".$row['creator_id']."'") or die(mysqli_error($link));
                  $creator = mysqli_fetch_assoc($creatorq);
                  ?>
                  
<a href="/PlaceItem.aspx?ID=<?php echo $row['id']; ?>">
<td valign="top" style="display:inline-block;  padding: 11px;cursor:pointer;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="<?=filterstring(htmlentities($row['name']));?>" href="/PlaceItem.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/thumbs/index.php?id=<?=htmlentities($row['id']);?>" width="120" height="120" border="0" id="img" alt="" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                
                <strong><?php if($row['isPinned'] > 0){?>📌 <?php } ?><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="/PlaceItem.aspx?ID=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
               <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail">
                                <?php
                                $timestamp = strtotime($row['creation_date']);
                                $currentTimestamp = time();
                                $timeDifference = $currentTimestamp - $timestamp;

                                // Calculate the time difference for each row individually
                                if ($timeDifference >= 31536000) {
                                    // More than a year
                                    $timeAgo = floor($timeDifference / 31536000);
                                    echo $timeAgo . ' year' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 2419200) {
                                    // More than a month
                                    $timeAgo = floor($timeDifference / 2419200);
                                    echo $timeAgo . ' month' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 604800) {
                                    // More than a week
                                    $timeAgo = floor($timeDifference / 604800);
                                    echo $timeAgo . ' week' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 86400) {
                                    // More than a day
                                    $timeAgo = floor($timeDifference / 86400);
                                    echo $timeAgo . ' day' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 3600) {
                                    // More than an hour
                                    $timeAgo = floor($timeDifference / 3600);
                                    echo $timeAgo . ' hour' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } elseif ($timeDifference >= 60) {
                                    // More than a minute
                                    $timeAgo = floor($timeDifference / 60);
                                    echo $timeAgo . ' minute' . ($timeAgo > 1 ? 's' : '') . ' ago';
                                } else {
                                    // Less than a minute
                                    echo $timeDifference . ' second' . ($timeDifference > 1 ? 's' : '') . ' ago';
                                }
                                ?>

    
                        
                    </span></div>
                <div class="GameCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_hlGameCreator" href="/User.aspx?ID=<?=htmlentities($row['creator_id']);?>"><?=$creator['username'];?></a></span></div>
                <div class="AssetsSold"><span class="Label">Number Owned:</span> <span class="Detail">0</span></div>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail">? times</span></div>
                <?php if($row['isAlwaysOnline'] > 0){?><div><div class="GameCurrentPlayers"><span class="Label" style="color:purple;">Always Online</span></div></div><?php } ?>
                
                
                
                              </div>
          </div>
        </td>
</a>
<?php }} } ?>
</table>
        <div id="ctl00_cphRoblox_rbxCatalog_FooterPagerPanel" class="HeaderPager">
            
            <?php if($page > 1){if($numberofpages > 0){?><a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>&p=<?=$prev;?>"><span class="NavigationIndicators"><<</span> Previous</a><?}}?>

            <span id="ctl00_cphRoblox_rbxGames_HeaderPagerLabel">Page <?=$page;?> of <?=$numberofpages;?>:</span>
            
            <?php if($page < $numberofpages){?><a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="Catalog.aspx?m=<?=str_replace(' ', '', $mthing);?>&c=<?=str_replace(' ', '', $bthing);?>&t=<?=str_replace(' ', '', $bthing2);?>&p=<?=$next;?>">Next <span class="NavigationIndicators">&gt;&gt;</span></a><?}?>
        </div><?php } ?>
    </div>
    <div style="clear: both;"/>
</div>

        </div>

<? include 'core/footer.php'; ?>






