<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <?php
                if ($user_session->get_is_admin()){
                    require_once('view/templates/main-admin.phtml');
                } elseif ($user_session->get_grad_student()){
                    require_once ('view/templates/main-grad-student.phtml');
                } else {
                    require_once ('view/templates/main-login.phtml');
                }
            ?>
        </div>
    </div>
</div>