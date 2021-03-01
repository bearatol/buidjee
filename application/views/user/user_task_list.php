<h1>User page</h1>
<?php if (!empty($_SESSION["arUser"]["login"])) { ?>
    <div class="task_list">
        <?php if (!empty($ar_result_tasklist)) : ?>
            <a class="btn btn-primary mt-4" href="/user/create/">Create new-></a>
            <?php /*                  sort                  */ ?>

            <?php /*                 /sort                  */ ?>
            <?php foreach ($ar_result_tasklist as $iKey => $iValue) : ?>
                <?php $task_text = strip_tags($iValue['task_text']); ?>
                <div class="item">
                    <div class="top">
                        <span class="name"><i><?= $iValue['login'] ?></i></span>
                        <span class="num"><b><?= $iKey + 1 + $art ?></b></span>
                    </div>
                    <div class="center input-group">
                        <?php if ($_SESSION["arUser"]["login"] == 'admin' || $_SESSION["arUser"]["login"] == $iValue['login']) : ?>
                            <textarea class="form-control" data-id="<?= $iValue['id'] ?>">
                     <?= $task_text ?>
                  </textarea>
                        <?php else : ?>
                            <div class="text">
                                <?= $task_text ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="bot input-group">
               <span class="mail">
                  <i><?= !empty($iValue['email']) ? $iValue['email'] : '' ?></i>
               </span>
                        <span class="status">
                  <?php if ($_SESSION["arUser"]["login"] == 'admin' || $_SESSION["arUser"]["login"] == $iValue['login']) : ?>
                      <select class="custom-select" data-id="<?= $iValue['id'] ?>">
                        <option value="active" <?= $iValue['status'] == 'active' ? 'selected' : '' ?>>active</option>
                        <option value="close" <?= $iValue['status'] == 'close' ? 'selected' : '' ?>>close</option>
                     </select>
                  <?php else : ?>
                      <b><?= $iValue['status'] ?></b>
                  <?php endif; ?>

               </span>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php /*                  pagination                  */ ?>
            <?php if ($str_pag) : ?>
                <ul class="pagination justify-content-center mt-4">
                    <?php for ($i = 1; $i <= $str_pag; $i++) : ?>
                        <?php if ($page == $i) : ?>
                            <li class="page-item active">
                                <a class="page-link"><?= $i ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= OTHER\some_functions::setGET('page', $i); ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                </ul>
            <?php endif; ?>
            <? /*                 /pagination                  */ ?>
        <?php else : ?>
            <p>
                Task not found. <a class="btn btn-primary" href="/user/create/">Create new-></a>
            </p>
        <?php endif; ?>
    </div>

<?php } else { ?>
    Would you like to <a href="/user/?page=auth">login</a>?
<?php } ?>