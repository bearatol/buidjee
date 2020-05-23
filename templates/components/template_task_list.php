<?
if (!empty($_GET['page']))
   $page = $_GET['page'];
else
   $page = 1;
$coun = 3;  //quantity tasks for output 
$art = ($page * $coun) - $coun;
$all_quantity = OTHER\Task::all_quantity($only_user_task ? $arUser["login"] : '');
if ($all_quantity > $coun) {
   $str_pag = ceil($all_quantity / $coun); //quantity pages 
}

if (!empty($_GET['sort']))
   $sort = $_GET['sort'];
else
   $sort = 'id';

$arResult_list = OTHER\Task::getList($only_user_task ? $arUser["login"] : '', $art, $coun, $sort);
?>

<div class="task_list">
   <? if (!empty($arResult_list)) : ?>
      <a class="btn btn-primary mt-4" href="/user/create/">Create new-></a>
      <?/*                  sort                  */ ?>
      <?if(!$only_user_task):?>
         <div class="sort content mt-4">
            <h4>Sort:</h2>
            <div class="sort_list">
               <? $sort_active = !empty($_GET['sort']) && $_GET['sort'] == 'login' ? true : false; ?>
               <a href="<?= OTHER\some_functions::setGET('sort', 'login', $sort_active); ?>" class="btn <?= $sort_active ? 'btn-dark' : 'btn-primary' ?>">
                  by name
               </a>
               <? $sort_active = !empty($_GET['sort']) && $_GET['sort'] == 'email' ? true : false; ?>
               <a href="<?= OTHER\some_functions::setGET('sort', 'email', $sort_active); ?>" class="btn <?= $sort_active ? 'btn-dark' : 'btn-primary' ?>">
                  by email
               </a>
               <? $sort_active = !empty($_GET['sort']) && $_GET['sort'] == 'status' ? true : false; ?>
               <a href="<?= OTHER\some_functions::setGET('sort', 'status', $sort_active); ?>" class="btn <?= $sort_active ? 'btn-dark' : 'btn-primary' ?>">
                  by status
               </a>
            </div>
         </div>
      <?endif;?>
      <?/*                 /sort                  */ ?>
      <? foreach ($arResult_list as $iKey => $iValue) : ?>
         <? $task_text = strip_tags($iValue['task_text']); ?>
         <div class="item">
            <div class="top">
               <span class="name"><i><?= $iValue['login'] ?></i></span>
               <span class="num"><b><?= $iKey + 1 + $art ?></b></span>
            </div>
            <div class="center input-group">
               <? if ($arUser["login"] == 'admin' || $arUser["login"] == $iValue['login']) : ?>
                  <textarea class="form-control" data-id="<?= $iValue['id'] ?>">
                     <?= $task_text ?>
                  </textarea>
               <? else : ?>
                  <div class="text">
                     <?= $task_text ?>
                  </div>
               <? endif; ?>
            </div>
            <div class="bot input-group">
               <span class="mail">
                  <i><?= !empty($iValue['email']) ? $iValue['email'] : '' ?></i>
               </span>
               <span class="status">
                  <? if ($arUser["login"] == 'admin' || $arUser["login"] == $iValue['login']) : ?>
                     <select class="custom-select" data-id="<?= $iValue['id'] ?>">
                        <option value="active" <?= $iValue['status'] == 'active' ? 'selected' : '' ?>>active</option>
                        <option value="close" <?= $iValue['status'] == 'close' ? 'selected' : '' ?>>close</option>
                     </select>
                  <? else : ?>
                     <b><?= $iValue['status'] ?></b>
                  <? endif; ?>

               </span>
            </div>
         </div>
      <? endforeach; ?>
      <?/*                  pagination                  */ ?>
      <? if ($str_pag) : ?>
         <ul class="pagination justify-content-center mt-4">
            <? for ($i = 1; $i <= $str_pag; $i++) : ?>
               <? if ($page == $i) : ?>
                  <li class="page-item active">
                     <a class="page-link"><?= $i ?></a>
                  </li>
               <? else : ?>
                  <li class="page-item">
                     <a class="page-link" href="<?= OTHER\some_functions::setGET('page', $i); ?>">
                        <?= $i ?>
                     </a>
                  </li>
               <? endif; ?>
            <? endfor; ?>
         </ul>
      <? endif; ?>
      <?/*                 /pagination                  */ ?>
   <? else : ?>
      <p>
         Task not found. <a class="btn btn-primary" href="/user/create/">Create new-></a>
      </p>
   <? endif; ?>
</div>