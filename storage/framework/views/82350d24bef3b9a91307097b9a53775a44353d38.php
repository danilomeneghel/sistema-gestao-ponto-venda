<?php $__env->startSection('adminlte_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/iCheck/square/red.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/css/auth.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_class', 'login-page'); ?>

<?php $__env->startSection('body'); ?>
    <div class="login-box">
        <div class="logo-login">
          <img src="<?php echo e(asset('images/logo.png')); ?>" width="350">
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Gestão de Ponto de Venda</p>
            <form action="<?php echo e(url(config('adminlte.login_url', 'login'))); ?>" method="post">
                <?php echo csrf_field(); ?>


                <div class="form-group has-feedback <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
                    <input type="text" name="username" class="form-control" value="<?php echo e(old('username')); ?>"
                           placeholder="Usuário">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php if($errors->has('username')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('username')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group has-feedback <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                    <input type="password" name="password" class="form-control"
                           placeholder="Senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <!-- <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> <?php echo e(trans('adminlte::adminlte.remember_me')); ?>

                            </label>
                        </div>
                    </div> -->
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="row" style="padding:8px 0px">
              <div class="col-xs-6">
                <div class="pull-left">
                  <a ui-sref="forgot_password" href="<?php echo e(route('password.request')); ?>">Esqueceu sua senha?</a>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="pull-right">
                  <a ui-sref="register" class="text-center" href="<?php echo e(route('register')); ?>">Criar uma conta</a>
                </div>
              </div>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <script src="<?php echo e(asset('vendor/adminlte/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/danilo/Documentos/Sistemas/sistema-gestao-ponto-venda/resources/views/vendor/adminlte/login.blade.php ENDPATH**/ ?>